@extends('layout')
@section('content')
        <h1>Create Blog</h1>

        {!! Form::open(['action' => 'BlogController@store', 'files' => true, 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        {!! Form::open(['action' => 'BlogController@store', 'files' => true, 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
 <div class="form-group">
     {{Form::label('title','Title')}}
     {{Form::text('title','',['class' =>'form-control','placeholder'  => 'Title'])}}
 </div>
    <div class="form-group">
        {{Form::label('description','Description')}}
        {{Form::textarea('description','',['class' =>'form-control','placeholder'  => 'Description Text'])}}
    </div>
    <div class="form-group">
        {{Form::label('featured_image','Upload Featured Image')}}
        {{Form::file('featured_image')}}

    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection