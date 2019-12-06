<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::latest()->get()
        ]);
    }

    public function create()
    {
        return view('articles.create');
    }


    public function store()
    {
        Article::create(request()->validate([
            'title' => 'required|min:3|max:255',
            'excerpt' => 'required',
            'body' => 'required',
        ]));

        return redirect('/articles');
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Article $article)
    {
        $article->update(request()->validate([
            'title' => 'required|min:3|max:255',
            'excerpt' => 'required',
            'body' => 'required',
        ]));

        return redirect('/articles/' . $article->id);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('/articles');
    }

}
