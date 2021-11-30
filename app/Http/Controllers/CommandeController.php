<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commande;
use App\Models\Statut;
use App\Models\taille;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CommandeController
{
    public function index(Request $request) {
        $taille_name = $request->post('taille');
        $article_id = $request->post('article');

        // verification id drop existe
        $article = Article::where('id',(int)$article_id)->first();
        $taille = taille::where('id_article',$article_id)->where('name',$taille_name)->first();

            return view('Commandes.commande', compact('article','taille'));

    }


    public function store(Request $request)
    {

        if ($request->get('article') != null) {
            $article = Article::where('id', $request->get('article'))->first();


            // check si stock est pas null
            // création d'une commande
           // if ((int)$article->stock > 0) {
                $commandeRequest = new Commande();
                $commandeRequest->nom = $request->get('nom');
                $commandeRequest->prenom = $request->get('prenom');
                $commandeRequest->adresse = $request->get('adresse');
                $commandeRequest->codePostal = $request->get('cp');
                $commandeRequest->ville = $request->get('ville');
                $commandeRequest->telephone = "000";
                $commandeRequest->numero_adresse = "000";
                $commandeRequest->article_id = $request->get('article');

                $statut = Statut::all()->first();

                $commandeRequest->statut_id = $statut->id;
                $commandeRequest->user_id = Auth::user()->id;

                if (strtoupper($request->get('ville')) == "LIMOGES") {
                    $commandeRequest->fdp = 0.00;
                } else {
                    $commandeRequest->fdp = 7.00;
                }

                //$commandeRequest->save();
                Session::put('customer_data', $commandeRequest);
                Session::save();

                return redirect('/mollie-payment');


            //} else {
              //  dd("wesh");
               // return redirect('');
            //}

        }
    }

    public function listUser() {
        $commandesUser = Commande::all()->where('user_id',Auth::user()->id)->sortByDesc('created_at');


        return view('Commandes.demandeEnCoursUser', compact('commandesUser'));
    }


    // function administrateur
    public function list() {
        $commandes = Commande::all()->sortByDesc('created_at');

        return view('Commandes.demandeEnCours', compact('commandes'));
    }

    public function edit($id)
    {
        $currentCommande = Commande::where('id', $id)->first();
        //$user = User::where('id',$currentDraw->author_id)->first();

        return view('Commandes.edit', compact('currentCommande'));
    }

    public function delete($id)
    {
       $deleteCommande = Commande::where('id',$id)->first();
        $deleteCommande->delete();

        return redirect('dashboard/demandeEnCours');
    }
}

