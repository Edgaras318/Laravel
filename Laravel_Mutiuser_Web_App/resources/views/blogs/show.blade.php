@extends('layout')
    @section('content')

        @csrf
    <!-- Portfolio Item Row -->
    <div class="row">

      <div class="col-md-8">

        <img class="img-fluid" src="/images/{{$blogs->featured_image}}"  alt="">
        <img class="img-fluid" src="/images/pixelated{{$blogs->featured_image}}"  alt="">

        {{-- height ="250" width="250" --}}
      </div>
      <div class="col-md-4">
        <h3 class="my-3">{{$blogs->title}}</h3>
        <p>{{$blogs->description}}</p>
        <hr>
        <p style="color:red"><i>Written on {{$blogs->created_at}} by {{$blogs->user->email}}</i></p>
        <hr>
        @auth
          {{-- @if(Auth::user()->id == $blogs->user_id) --}}
          @can('view', $blogs)
        <a href="/blogs/{{$blogs->id}}/edit" class="btn btn-info">Edit</a>
        {{-- <a href="/blogs/{{$blogs->id}}/delete" class="btn btn-danger">Delete</a> --}}
        <p>
        {!!Form::open(['action' => ['BlogController@destroy', $blogs->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
        <br>
        {{-- @endif --}}
        @endcan
        @endauth
        <a href="{{action('BlogController@downloadPDF', $blogs->id)}}" class="btn btn-info">Download PDF</a></td>
      </div>
    </div>
        @endsection
                {{-- <a href="/blogs/{{$blogs->id}}/delete" class="btn btn-danger">Delete</a> --}}
