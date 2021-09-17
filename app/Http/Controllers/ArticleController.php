<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController
{
    public function index() {
        $test = Article::All();
        dd($test);

        return view('article');
    }

    public function create() {
        return view ('articles.createArticle');
    }
}
