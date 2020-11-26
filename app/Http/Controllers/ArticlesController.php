<?php

namespace App\Http\Controllers;

use App\Models\Article;

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
        Article::create($this->validateArticle());

        return redirect(route('articles.index'));
    }

    //show a view to edit an existing resource

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    //persist the edited resource

    public function update(Article $article)
    {
        $article->update($this->validateArticle());

        return redirect($article->path());
    }

    //delete a resource

    public function destroy()
    {

    }

    /**
     * @return array
     */
    public function validateArticle(): array
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);
    }

}
