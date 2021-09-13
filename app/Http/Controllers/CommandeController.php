<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Support\Facades\Auth;

class CommandeController
{
    public function index() {

        $user = Auth::user();
        dd($user->name);

        return view('commande');
    }
}
