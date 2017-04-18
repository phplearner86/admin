@extends('layouts.admin')

@section('title')
	{{-- expr --}}
@stop

@section('content')
	@include('partials.admin._pageFormHeader', [
				'icon' => 'pencil-square-o',
				'item' => 'users',
				'action' => 'Edit '
		])

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				
				<div class="panel panel-default">
					<div class="panel-body">
					{{-- Form --}}
						<form action="{{ route('users.update', $user->id) }}" method="post">
							{{ csrf_field() }}
							{{ method_field('PUT') }}
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
							</div>

							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control">
							</div>

							<!-- <div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" id="password" placeholder="Choose Password" class="form-control">
							</div>
							
							<div class="form-group">
								<label for="password-confirm">Confirm Password</label>
								<input type="password" name="password-confirmation" id="password-confirm" placeholder="Confirm Password" class="form-control">
							</div> -->

							<div class="form-group">
								<label for="role">Role</label>
								<select name="role_id[]" id="role" class="form-control" multiple>
									<option value="" disabled>Select Role</option>
									@foreach ($roles as $role)
										<option value="{{$role->id}}">{{ $role->name }}</option>
									@endforeach
								</select>
							</div>

							<button class="btn btn-success">Save changes</button>
						</form>
					</div>
				</div>

			</div>
		</div>
@stop