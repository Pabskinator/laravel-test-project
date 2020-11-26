<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    //render a list of resource

    public function index()
    {

        return view('articles.index', [
            'articles' => Article::latest()->get()
        ]);

    }

    //show a single resource

    public function show(Article $article)
    {
        return view('articles.show', [
           'article' => $article
        ]);
    }

    //shows a view to create resource

    public function create()
    {
        return view('articles.create');
    }

    //persist the new resource

    public function store()
    {

        request()->validate([
           'title' => 'required',
           'excerpt' => 'required',
           'body' => 'required',
        ]);

        $article = new Article();

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');
    }

    //show a view to edit an existing resource

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    //persist the edited resource

    public function update(Article $article)
    {

        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles/' . $article->id);
    }

    //delete a resource

    public function destroy()
    {

    }

}
