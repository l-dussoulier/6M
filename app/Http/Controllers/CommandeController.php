<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commande;
use App\Models\Statut;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CommandeController
{
    public function index(Request $request) {

        //dd($request->query('drop'));
        $taille = $request->query('taille');
        // verification id drop existe
        $article = Article::where('id_drop',$request->query('drop'))->first();

        return view('Commandes.commande', compact('article'));
    }


    public function store(Request $request)
    {

        if ($request->get('article') != null){
            $art_id = explode("=",$request->get('article'));
            if ($art_id[1] != null)
            {
                $article = Article::where('id',(int)$art_id[1])->first();


                // check si stock est pas null
                // création d'une commande
                if ((int)$article->stock > 0){
                    $commandeRequest = new Commande();
                    $commandeRequest->nom = $request->get('nom');
                    $commandeRequest->prenom = $request->get('prenom');
                    $commandeRequest->adresse = $request->get('adresse');
                    $commandeRequest->codePostal = $request->get('cp');
                    $commandeRequest->ville = $request->get('ville');
                    $commandeRequest->telephone = $request->get('telephone');
                    $commandeRequest->numero_adresse = $request->get('numero_adresse');
                    $commandeRequest->article_id = $art_id[1];
                    $commandeRequest->statut_id = 2;
                    $commandeRequest->user_id = Auth::user()->id;

                    if (strtoupper($request->get('ville')) == "LIMOGES"){
                        $commandeRequest->fdp = 0.00;
                    }else {
                        $commandeRequest->fdp = 7.00;
                    }

                    //$commandeRequest->save();
                    Session::put('customer_data', $commandeRequest);
                    Session::save();

                    $article->stock = $article->stock - 1;
                    $article->save();

                    return redirect('/mollie-payment');
                }else {
                    return redirect('StockOut');
                }

            }
        }else {

            return redirect('');
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

