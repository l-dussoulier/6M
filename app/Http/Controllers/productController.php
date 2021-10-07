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

class ProductController
{
    public function index(Request $request) {

         $drop = $request->post('drop');
        //dd($request->query('drop'));
        // verification id drop existe
        $article = Article::where('id_drop',$drop)->first();

        $s = taille::where('id_article',$article->id)->where('name','S')->first();
        $m = taille::where('id_article',$article->id)->where('name','M')->first();
        $l = taille::where('id_article',$article->id)->where('name','L')->first();
        $xl = taille::where('id_article',$article->id)->where('name','XL')->first();

        return view('produit.produit', compact('article','s','m','l','xl'));
    }


}
