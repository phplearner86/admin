@extends('layouts.admin')

@section('title', '| All users')


@section('content')

	{{-- Page Header --}}
	
		@include('partials.admin._pageTableHeader', [
				'icon' => 'list',
				'item' => 'users'
		])
	 

 	{{-- Table --}}
	 @if (count($users))

	 	@include('admin.users.tables._table')

	 @else
	 	<p>No users registered!</p>
	 @endif


@stop