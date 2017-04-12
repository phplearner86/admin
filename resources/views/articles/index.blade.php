@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach ($articles as $article)
            	<div class="panel panel-default">
                <div class="panel-heading"><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></div>

                <div class="panel-body">
                    {{ $article->body }}
                </div>

                <div class="panel-footer">
                    <p>BY: {{ $article->user->name }}</p>
                    <p>Category: {{ $article->category->name }}</p>
                    @if ($article->published_at)
                        <p>Date: {{ $article->published }}</p>
                    @endif
                </div>

            </div>
            @endforeach
        </div>
    </div>
    <div class="text-center">{{ $articles->links() }}</div>
</div>
@stop