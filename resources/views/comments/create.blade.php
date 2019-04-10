@extends('layouts.app')
@section('content')
<br>
<br>
<br>
<div class="row justify-content-md-center">

<div class="col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-12">
  <h2>Create a Comments</h2>
{!!Form::open(['action' => ['CommentsController@store', $yarnthread->id], 'method' => 'POST'])!!}
<div class="form-group">
    {{Form::label('name', 'Name')}}
    {{Form::text('name', auth()->user()->name, ['class' => 'form-control', 'placeholder' => 'Name','maxlength' => 20, 'minlength' => 1])}}
</div>
<div class="form-group">
        {{Form::label('comment', 'Comment')}}
        {{Form::text('comment', '', ['class' => 'form-control', 'placeholder' => 'Leave a Comment','maxlength' => 120, 'minlength' => 4])}}
    </div>
{{Form::submit('Create Comment', ['class' => 'btn btn-primary'])}}
{!!Form::close()!!}
</div>
</div>
@endsection
