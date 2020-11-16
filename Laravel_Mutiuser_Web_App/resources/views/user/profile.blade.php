@extends('layout')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-10 col-md-offset-1">
        {{-- <img src="/upload/avatars/{{$user->avatar }}" style="width:250px; height:250px; float:left; border-radius:50%; margin-right:" > --}}
        <img src="/uploads/avatars/{{Auth::user()->avatar}}" style="float:left;">
        {{--  --}}
        <h2>Welcome {{Auth::user()->name }} to your Profile!</h2>
        <form enctype="multipart/form-data" action="/user/profile" method="POST">
            <label>Update Profile Image</label>
            <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="pull-right btn btn-sm btn-primary">
        </form>
        <p></p>
        <div class="change-btns">
        <a class="btn btn-primary" href="/user/edit">Change Profile
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
          <p></p>
          <a class="btn btn-primary" href="/user/password">Change Password
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
          {{-- <p></p>
          <a class="btn btn-primary" href="">Change Name
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div> --}}
    </div>
    </div>
</div>
@endsection
