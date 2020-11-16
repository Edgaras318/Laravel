@extends('layout')
@section('content')
    <!-- Project One -->
    <link href="/css/app.css" rel="stylesheet">

    @if(count($blogs) > 0)
    @foreach($blogs as $blog)
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <div class="hover-animation">
      <img class="img-back" src="/images/pixelated{{$blog->featured_image}}">
      <img class="img-front" src="/images/{{$blog->featured_image}}">
          {{-- height ="250" width="250" --}}
      </div>
    </div>
      <div class="col-md-8 col-sm-8">

      <h3><a href="/blogs/{{$blog->id}}">{{$blog->title }}</a></h3>
        <p>{{Str::words($blog->description, 5) }}</p>
      <p style="color:red"><i>Written on {{$blog->created_at}} by {{$blog->user->email}}</i></p>
        <a class="btn btn-primary" href="/blogs/{{$blog->id}}">View Post
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </div>

    <hr>
    @endforeach
    {{$blogs->links()}}
    @else 
    <p> No posts found </p>
    @endif
    <!-- /.row -->



  </div>
  <!-- /.container -->
@endsection