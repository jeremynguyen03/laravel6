@extends('layout')
@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
@endsection
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <form method="POST" action="{{ route('articles.update', $article->id) }}">
                @csrf
                @method('PUT')
                <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>
                <div class="field">
                    <label for="" class="label">Title</label>
                    <div class="control">
                        <input type="text" class="input" name="title" id="title"
                               value="{{ old('title') ? old('title') : $article->title }}">
                        @error('title')
                        <p>xxx</p>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label for="" class="label">Excerpt</label>
                    <div class="control">
                        <textarea type="text" class="input" name="excerpt"
                                  id="excerpt">{{ old('excerpt') ? old('excerpt') : $article->excerpt }}</textarea>
                        @error('excerpt')
                        <p>xxx</p>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label for="" class="label">Body</label>
                    <div class="control">
                        <textarea type="text" class="input" name="body"
                                  id="body">{{ old('body') ? old('body') : $article->body }}</textarea>
                        @error('body')
                        <p>xxx</p>
                        @enderror
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
