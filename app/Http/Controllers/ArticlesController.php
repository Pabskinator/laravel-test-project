<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;

class ArticlesController extends Controller
{

    //render a list of resource

    public function index()
    {
        if(request('tag')){
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        }else{
            $articles = Article::latest()->get();
        }

        return view('articles.index', compact('articles'));
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
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    //persist the new resource

    public function store()
    {
//        Article::create($this->validateArticle());

        $this->validateArticle();

        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1;
        $article->save();

        $article->tags()->attach(request('tags'));

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
            'tags' => 'exists:tags,id'
        ]);
    }

}
