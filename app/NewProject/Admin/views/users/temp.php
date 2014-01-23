<!-- <p>{{ link_to_route('users.create', 'Add new user') }}</p> -->

<!-- @if ($users->totalItems > 0)
    <?php echo $paginator->links(); ?>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>User ID</th>
				<th>Email</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Status</th>
				<th>Logins</th>
				<th>Login Attempts</th>
				<th>Last Login</th>
				<th>Last Failed Login</th>
				<th>Created</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($users->items as $user)
				<tr>
					<td>{{{ $user->id }}}</td>
					<td>{{{ $user->email }}}</td>
					<td>{{{ $user->first_name }}}</td>
					<td>{{{ $user->last_name }}}</td>
					<td>{{{ $user->getStatus()->status }}}</td>
					<td>{{{ $user->logins }}}</td>
					<td>{{{ $user->loginattempts }}}</td>
					<td>{{{ $user->last_login }}}</td>
					<td>{{{ $user->lastfailedlogin }}}</td>
					<td>{{{ $user->getFormattedCreatedAttribute() }}}</td>
                    <td>{{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>

    <?php echo $paginator->links(); ?>
@else
	There are no users
@endif