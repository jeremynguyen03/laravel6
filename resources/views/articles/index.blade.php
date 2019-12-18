@extends('layout')
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            @forelse($articles as $article)
                <div id="content">
                    <div class="title">
                        <h2>
                            <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                        </h2>
                        <p>
                            <img src="images/banner.jpg" alt="" class="image image-full"/>
                        </p>
                        {{ $article->excerpt }}
                    </div>
                </div>
            @empty
            <p>There are no articles yet!</p>
            @endforelse
        </div>
    </div>
@endsection
