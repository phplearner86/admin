@extends('layouts.app')

@section('content')
  
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <form action="{{ route('articles.store') }}" method="post">

      {{ csrf_field() }}

        <div class="form-group">
          <label for="title">Title</label>
          <input name="title" type="text" class="form-control" id="title" placeholder="Article Title" value="{{ old('title') }}">
        </div>

        <div class="form-group">
          <label for="body">Body</label>
          <textarea name="body" class="form-control" id="body" cols="30" rows="5" placeholder="Article body"></textarea>
        </div>

        <div class="form-group">
          <label for="category">Category</label>
          <select name="category_id" id="category" class="form-control">
            <option value="" disabled selected>Select Category</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="">Date</label>
          <input type="date" name="published_at" class="form-control" value="{{  old('published_at') ?? date('Y-m-d') }}">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>

      </form>
    <p>{{ \Carbon\Carbon::now() }}</p>
    <p>{{ \Carbon\Carbon::today() }}</p>
    </div>
  </div>
</div>
@stop