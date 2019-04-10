@extends('layouts.app')
@section('content')
<br>
<br>
<br>

<div class="row justify-content-md-center">
<div class="col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-12">
  <h2>Edit Comment</h2>
{!!Form::open(['action' => ['CommentsController@update', $yarnthread->id, $comments->id], 'method' => 'PUT'])!!}
<div class="form-group">
    {{Form::label('name', 'Name')}}
    {{Form::text('name', $comments->name, ['class' => 'form-control','maxlength' => 20, 'minlength' => 1])}}
</div>
<div class="form-group">
        {{Form::label('comment', 'Comment')}}
        {{Form::text('comment', $comments->comment, ['class' => 'form-control','maxlength' => 100, 'minlength' => 4])}}
    </div>
{{Form::submit('Edit Comment', ['class' => 'btn btn-primary'])}}
{{Form::close()}}
</div>
</div>
@endsection
