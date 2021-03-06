@extends('layouts.admin')

@section('title')
	{{-- expr --}}
@stop

@section('content')
	@include('partials.admin._pageFormHeader', [
				'icon' => 'pencil',
				'item' => 'users',
				'action' => 'Create a'
		])

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				@include('errors._list')
				@include('flash::message')
				<div class="panel panel-default">
					<div class="panel-heading"><h3>All fields required</h3></div>
					<div class="panel-body">
					{{-- Form --}}
						<form action="{{ route('users.store') }}" method="post">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" placeholder="Enter Name" class="form-control">
							</div>

							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email" id="email" placeholder="Enter Email" class="form-control">
							</div>

							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" id="password" placeholder="Choose Password" class="form-control">
							</div>

							<div class="form-group">
								<label for="password-confirm">Confirm Password</label>
								<input type="password" name="password-confirmation" id="password-confirm" placeholder="Confirm Password" class="form-control">
							</div>

							<div class="form-group">
								<label for="role">Role</label>
								<select name="role_id[]" id="role" class="form-control" multiple>
									<option value="" selected disabled>Select Role</option>
									@foreach ($roles as $role)
										<option value="{{$role->id}}">{{$role->name}}</option>
									@endforeach
								</select>
							</div>

							<button class="btn btn-success">Create user</button>
						</form>
					</div>
				</div>

			</div>
		</div>
@stop