<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ArticleController extends Controller
{
    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles();
        } else {
            $articles = Article::latest()->get();
        }

        return view('articles.index', ['articles' => $articles]);
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

        return redirect(route('articles.index'));
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

        return redirect(route('articles.show', $article->id));
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(route('articles.index'));
    }

}
