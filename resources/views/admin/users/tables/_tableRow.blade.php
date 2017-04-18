@php
$i = 1;
@endphp
@foreach ($users as $user)
<tr>
	<td>
		{{ $i++ }}
	</td>
	<td>
		<a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
			<i class="fa fa-pencil-square-o"></i>
		</a>
		<button class="btn btn-danger btn-sm">
			<i class="fa fa-trash-o"></i>
		</button>
	</td>
	<td>
		{{ $user->name }}
	</td>
	<td>
		{{ $user->email }}
	</td>
	<td>
		@foreach ($user->roles as $role)
		{{$role->name}}
		@endforeach
	</td>
	<td>
		{{ $user->joined }}
	</td>
</tr>
@endforeach