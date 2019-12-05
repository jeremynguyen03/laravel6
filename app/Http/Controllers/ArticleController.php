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
            'articles' => Article::all()
        ]);
    }

    public function create()
    {
        return view('articles.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:255',
            'excerpt' => 'required',
            'body' => 'required',
        ]);
        Article::create($validatedData);

        return view('articles.index');
    }

    public function show($id)
    {
        return view('articles.show', [
            'article' => Article::find($id)
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:255',
            'excerpt' => 'required',
            'body' => 'required',
        ]);
        Article::update($validatedData);

        return view('articles.show', $id);
    }

    public function destroy($id)
    {
        //
    }

}
