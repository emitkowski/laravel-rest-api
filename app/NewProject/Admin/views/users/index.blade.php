@extends('layouts.admin')

@section('main')

{{ HTML::script('/js/admin/users.js') }}

<h1>Customers</h1>

<table id="users">
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Logins</th>
        <th>Last Login</th>
        <th>Joined On</th>
        <th>Basic Actions</th>
        <th>Custom Actions</th>
    </tr>
    </thead>
    <tbody></tbody>
</table>

@stop