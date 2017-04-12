	<table class="table" id="myTable">

		<thead>
			<th>#</th>
			<th>Action</th>
			<th>Name</th>
			<th>Email</th>
			<th>Role</th>
			<th>Joined</th>
		</thead>

		<tbody>
			@include('admin.users.tables._tableRow')
		</tbody>

	</table>