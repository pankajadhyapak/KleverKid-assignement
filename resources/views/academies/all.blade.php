@extends('layout')
@section('page_header')
    <div class="page-header">
        <div class="container">
            <h2>Create New Academy </h2>
        </div>
    </div>
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">All Academy</h3>
        </div>
        <div class="panel-body">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Academy Name</th>
            <th>Email </th>
            <th>Latitude and Longitude</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($academies as $academy)
            <tr>
                <th scope="row">{{ $academy->id }}</th>
                <td>{{ $academy->user_name }}</td>
                <td>{{ $academy->academy_name }}</td>
                <td>{{ $academy->email }}</td>
                <td>{{ $academy->latitude }} , {{ $academy->longitude }}</td>
                <td>
                    <form method="post" action="{{ route('academies.destroy', $academy->id) }}" onsubmit="return confirm('Do you really want to Delete ?')">
                        {{ method_field("DELETE") }}
                        {{csrf_field()}}
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    </div>
@stop
