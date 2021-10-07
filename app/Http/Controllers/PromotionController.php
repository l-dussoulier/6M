<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Drop;
use App\Models\DropArticles;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController
{
    public function index() {
        $listePromotions = Promotion::All();

        return view('promotions.listePromotions',compact('listePromotions'));
    }

    public function create() {

        $listeDrop = Drop::All();
        return view ('promotions.createPromotion',compact('listeDrop'));
    }

    public function store(Request $request) {

        //$request->validate([
        //   'titre' => 'required|string|max:255',
        //  'description' => 'required|string|max:1000'
        //]);

        if(Promotion::find($request->get('id')) == null){
            // création d'un article
            $promotion = new Promotion();
            $promotion->libelle = $request->get('libelle');
            $promotion->description = $request->get('description');
            $promotion->code = $request->get('code');
            $promotion->NbUtilisation = $request->get('NbUtilisation');
            $promotion->DateValidite = $request->get('validite');


            $promotion->drop_id = $request->get('drop');

            $promotion->save();


        }else {

            // edition
            $promotion = Promotion::find($request->get('id'));
            $promotion->libelle = $request->get('libelle');
            $promotion->description = $request->get('description');
            $promotion->code = $request->get('code');
            $promotion->NbUtilisation = $request->get('NbUtilisation');
            $promotion->DateValidite = $request->get('validite');

            $promotion->drop_id = $request->get('drop');

            $promotion->save();

        }
        // possible de rendre le code plus obtimisé



        return view('dashboard');

    }

    public function edit($id)
    {
        $currentPromotion = Promotion::where('id', $id)->first();
        $listeDrop = Drop::All();

        return view('promotions.edit', compact('currentPromotion'),compact('listeDrop'));
    }

    public function delete($id)
    {
        $deletePromotion = Promotion::where('id',$id)->first();
        $deletePromotion->delete();

        return redirect('dashboard/promotions');
    }

}


