@extends('layouts.app')
@section('content')
<br>
<br>
<br>


  <div class="row justify-content-md-center">
    <h2>Create a Yarn</h2>
<div class="col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3 col-sm-12">


      {!!Form::open(['action' => 'YarnThreadController@store', 'method' => 'POST'])!!}
      <div class="form-group">
          {{Form::label('yarnthread', 'Yarn Name')}}
          {{Form::text('yarnthread', '', ['class' => 'form-control', 'placeholder' => 'Yarn', 'maxlength' => 50, 'minlength' => 4])}}
      </div>

      {{Form::submit('Create Yarn Thread', ['class' => 'btn btn-primary'])}}
      {{Form::close()}}
      </div>
  </div>

@endsection
