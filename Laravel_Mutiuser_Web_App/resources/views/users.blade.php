@extends('layout')
@section('content')
<a href="{{action('UserController@export')}}" class="btn btn-info">Download Users Excel</a></td>
<hr>
@foreach($users as $user)
        <h3>{{$user->name }}</h3>
        <p>{{$user->email }}</p>
    @endforeach
@endsection