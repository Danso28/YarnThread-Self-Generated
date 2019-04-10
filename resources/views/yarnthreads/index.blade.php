@extends('layouts.app')
@section('content')
<div class="container">
  <div class="jumbotron jumbotron-fluid">
  <h1 class="display-4">Yarn Thread</h1>
  <p class="lead">Yarn on Your Thread .</p>
</div>
</div>
<br>
<br>
<br>
<div class="container">
  @if(count($yarnthreads) > 0)
  <div class="row">
        @foreach ($yarnthreads as $d)
  <div class="col-xs-12 col-md-3 col-lg-3 col-sm-6">
    <a href="/yarnthreads/{{$d->id}}" class="">
    <h4>{{$d->yarnname}}</h4></a>
    <small>Created on {{$d->created_at}} </small>
    <br>
    <br>
  </div>
    @endforeach
  </div>
</div>
@else
<div class="container">
  <h3>There are no places to display</h3>
</div>
@endif
<br>
<br>
<br>
@if(!Auth::guest())
<div class="container">
<div class="row">
    <a href="/yarnthreads/create" class="btn btn-primary">Create a Yarn</a>
</div>
</div>

@endif
  </div>
</div>

@endsection
