<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Drop;
use App\Models\Drop_Article;
use App\Models\Drop_Articles;
use App\Models\DropArticles;
use App\Models\taille;
use Illuminate\Http\Request;

class ArticleController
{
    public function index() {
        $listeArticles = Article::All();

        return view('articles.listeArticles',compact('listeArticles'));
    }

    public function create() {
        $listeDrop = Drop::All();
        return view ('articles.createArticle',compact('listeDrop'));
    }

    public function store(Request $request) {

        //$request->validate([
        //   'titre' => 'required|string|max:255',
        //  'description' => 'required|string|max:1000'
        //]);

        if(Article::find($request->get('id')) == null){
            // création d'un article
            $article = new Article();
            $article->libelle = $request->get('libelle');
            $article->description = $request->get('description');
            $article->numero = $request->get('numero');
            $article->prix = $request->get('prix');
            $article->id_drop = 5;

            $article->save();
            //tailles article
            $s = new taille();
            $s->id_article = $article->id;
            $s->name = "S";
            if ($request->get('s') != null ){
                $s->stock = $request->get('s');
            }
            else {
                $s->stock = 0;
            }


            $m = new taille();
            $m->id_article = $article->id;
            $m->name = "M";
            if ($request->get('m') != null ){
                $m->stock = $request->get('m');
            }
            else {
                $m->stock = 0;
            }

            $l = new taille();
            $l->id_article = $article->id;
            $l->name = "L";
            if ($request->get('l') != null ){
                $l->stock = $request->get('l');
            }
            else {
                $l->stock = 0;
            }

            $xl = new taille();
            $xl->id_article = $article->id;
            $xl->name = "XL";
            if ($request->get('xl') != null ){
                $xl->stock = $request->get('xl');
            }
            else {
                $xl->stock = 0;
            }


            $s->save();
            $m->save();
            $l->save();
            $xl->save();


        }else {

            // edition
            $article = Article::find($request->get('id'));
            $article->libelle = $request->get('libelle');
            $article->description = $request->get('description');
            $article->numero = $request->get('numero');
            $article->prix = $request->get('prix');
            $article->id_drop = $request->get('drop');
            $article->save();


            //tailles article
            $s =  taille::where('id_article',$article->id)->where('name','S')->first();
            $s->id_article = $article->id;
            $s->name = "S";
            if ($request->get('s') != null ){
                $s->stock = $request->get('s');
            }
            else {
                $s->stock = 0;
            }


            $m = taille::where('id_article',$article->id)->where('name','M')->first();
            $m->id_article = $article->id;
            $m->name = "M";
            if ($request->get('m') != null ){
                $m->stock = $request->get('m');
            }
            else {
                $m->stock = 0;
            }

            $l = taille::where('id_article',$article->id)->where('name','L')->first();
            $l->id_article = $article->id;
            $l->name = "L";
            if ($request->get('l') != null ){
                $l->stock = $request->get('l');
            }
            else {
                $l->stock = 0;
            }

            $xl = taille::where('id_article',$article->id)->where('name','XL')->first();
            $xl->id_article = $article->id;
            $xl->name = "XL";
            if ($request->get('xl') != null ){
                $xl->stock = $request->get('xl');
            }
            else {
                $xl->stock = 0;
            }


            $s->save();
            $m->save();
            $l->save();
            $xl->save();

        }
        // possible de rendre le code plus obtimisé



        return view('dashboard');

    }

    public function edit($id)
    {
        $currentArticle = Article::where('id', $id)->first();
        $listeDrop = Drop::All();
        $s = taille::where('id_article',$id)->where('name','S')->first();
        $m = taille::where('id_article',$id)->where('name','M')->first();
        $l = taille::where('id_article',$id)->where('name','l')->first();
        $xl = taille::where('id_article',$id)->where('name','XL')->first();

        return view('articles.edit', compact('currentArticle','s','m','l','xl'),compact('listeDrop'));
    }

    public function delete($id)
    {
        $deleteArticle = Article::where('id',$id)->first();
        $deleteArticle->delete();

        return redirect('dashboard/articles');
    }
}
