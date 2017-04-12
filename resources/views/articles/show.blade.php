@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            	<div class="panel panel-default">
                <div class="panel-heading">{{ $article->title }}</div>

                <div class="panel-body">
                    {{ $article->body }}
                </div>

                <div class="panel-footer">
                    <p>BY: {{ $article->user->name }}</p>
                    <p>Category: {{ $article->category->name }}</p>
                    <p>Status: 
                        @if ( $article->published == 0 )
                            {{ 'Draft' }}
                         @else
                         {{ 'Published' }}    
                        @endif
                    </p>

                    <a href="{{  route('articles.edit', $article->id)  }}">Edit article</a>

                    <form action="{{ route('articles.destroy', $article->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-default">Delete</button>
                    </form>

                    <form action="{{ route('articles.status', $article->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <select name="published" id="">
                            <option value="" disabled>Select status</option>
                            <option value="0" {{ selected($article->published, 0) }}>Draft</option>
                            <option value="1" {{ selected($article->published, 1) }}>Published</option>
                        </select>
                          <button type="submit" class="btn btn-default">Change</button>
                    </form>



                  
                </div>

            </div>
        </div>
    </div>
</div>
@stop