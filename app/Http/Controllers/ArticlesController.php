<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index()
    {

        return view('articles.index', [
            'articles' => Article::latest()->get()
        ]);

    }

    public function show($id)
    {

        return view('articles.show', [
           'article' => Article::findOrFail($id)
        ]);

    }

}
