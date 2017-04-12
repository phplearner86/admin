@extends('layouts.app')

@section('content')
  
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <form action="{{ route('articles.update', $article->id) }}" method="post">

      {{ csrf_field() }}
      {{ method_field('PUT') }}

        <div class="form-group">
          <label for="title">Title</label>
          <input name="title" type="text" class="form-control" id="title" placeholder="Article Title" value="{{ $article->title }}">
        </div>

        <div class="form-group">
          <label for="body">Body</label>
          <textarea name="body" class="form-control" id="body" cols="30" rows="5" placeholder="Article body">{{ $article->body }}</textarea>
        </div>

        <div class="form-group">
          <label for="category">Category</label>
          <select name="category_id" id="category" class="form-control">
            <option value="" disabled selected>Select Category</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ selected($article->category_id, $category->id) }}>{{ $category->name }}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="">Date</label>
          <input type="date" name="published_at" class="form-control" value="{{ $article->published_at->format('Y-m-d') }}">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
</form>
        <form action="{{ route('articles.destroy', $article->id) }}" method="post">

        {{ csrf_field() }}
        {{ method_field('DELETE') }}
          
@if (Auth::user()->id == $article->user_id)
            <button type="submit" class="btn btn-default">Delete</button>
          @endif
        </form>

      

    </div>
  </div>
</div>
@stop