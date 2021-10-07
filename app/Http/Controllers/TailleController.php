<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Drop;
use App\Models\Drop_Article;
use App\Models\Drop_Articles;
use App\Models\DropArticles;
use App\Models\taille;
use Illuminate\Http\Request;

class TailleController
{
    public function index() {
        $listeTailles = taille::All();

        return view('tailles.listeTailles',compact('listeTailles'));
    }

    public function create() {
        $listeArticles = Article::All();
        return view ('tailles.createTaille',compact('listeArticles'));
    }

    public function store(Request $request) {

        //$request->validate([
        //   'titre' => 'required|string|max:255',
        //  'description' => 'required|string|max:1000'
        //]);

        if(taille::find($request->get('id')) == null){
            // création d'une taille
            $taille = new taille();
            $taille->name = $request->get('libelle');
            $taille->id_article = $request->get('article');
            $taille->stock = $request->get('stock');

            $taille->save();


        }else {

            // edition
            $taille = taille::find($request->get('id'));
            $taille->name = $request->get('libelle');
            $taille->id_article = $request->get('article');
            $taille->stock = $request->get('stock');
            $taille->save();


        }
        // possible de rendre le code plus obtimisé



        return view('dashboard');

    }

    public function edit($id)
    {
        $currentTaille = taille::where('id', $id)->first();
        $listeArticle = Article::All();

        return view('tailles.edit', compact('currentTaille'),compact('listeArticle'));
    }

    public function delete($id)
    {
        $deleteTaille = taille::where('id',$id)->first();
        $deleteTaille->delete();

        return redirect('dashboard/tailles');
    }
}
