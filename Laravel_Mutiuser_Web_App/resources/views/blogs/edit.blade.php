@extends('layout')
@section('content')
        <h1>Edit Blog</h1>
        {!! Form::open(['action' => ['BlogController@update', $blogs->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
 <div class="form-group">
     {{Form::label('title','Title')}}
     {{Form::text('title',$blogs->title,['class' =>'form-control','placeholder'  => 'Title'])}}
 </div>
    <div class="form-group">
        {{Form::label('description','Description')}}
        {{Form::textarea('description', $blogs->description,['class' =>'form-control','placeholder'  => 'Description Text'])}}
    </div>
    <div class="form-group">

        {{Form::file('featured_image')}}

    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection
