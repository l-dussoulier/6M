<?php

namespace App\Http\Controllers;

use App\Models\Drop;
use Illuminate\Http\Request;

class DropController
{
    public function index() {
        $listeDrops = Drop::All();
        return view('drops.listeDrops', compact('listeDrops'));
    }

    public function create() {
        return view ('drops.createDrop');
    }

    public function store(Request $request) {

        //$request->validate([
         //   'titre' => 'required|string|max:255',
          //  'description' => 'required|string|max:1000'
        //]);

        if(Drop::find($request->get('id')) == null){
            // création d'un drop
            $drop = new Drop();
            $drop->name = $request->get('name');
            $drop->dateFin = $request->get('dateFin');
            $drop->description = $request->get('description');
            $drop->save();
        }else {
            // edition
            $drop = Drop::find($request->get('id'));
            $drop->name = $request->get('name');
            $drop->dateFin = $request->get('dateFin');
            $drop->description = $request->get('description');
            $drop->save();
        }
        // possible de rendre le code plus obtimisé



        return view('dashboard');

    }

    public function edit($id)
    {
        $currentDrop = Drop::where('id', $id)->first();

        return view('drops.edit', compact('currentDrop'));
    }

    public function delete($id)
    {
        $deleteDrop = Drop::where('id',$id)->first();
        $deleteDrop->delete();

        return redirect('dashboard/drops');
    }
}
