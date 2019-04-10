@extends('layouts.app')
@section('content')
<div class="container">
  <div class="jumbotron jumbotron-fluid">
    <h1 class="display-4">Yarn Thread</h1>
    <p class="lead">Yarn on Thread: {{$yarnthread->yarnname}}.</p>

</div>
</div>
<div class="container">
    <div class="row">
      <br>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="panel panel-info">
              <div class="panel-heading"><h3>{{$yarnthread->yarnname}}</h3></div>
            </div>
          </div>
          </div>
          <br>
          <br>
          <br>
          <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-12">
                      @foreach ($comments as $r)
                          <div class="well">
                          <h4>{{$r->name}}</h4>
                          <p>{{$r->comment}}</p>
                          @if (!Auth::guest())
                          @if (auth()->user()->id == $r->user_id)
                          <a class="btn btn-primary" href="/{{$yarnthread->id}}/comments/{{$r->id}}/edit ">Edit Comment</a>

                          {!!Form::open(['action' => ['CommentsController@destroy', $yarnthread->id, $r->id], 'method' => 'DELETE', 'class' => 'pull-right'])!!}
                                         {{Form::submit('Delete Comment', ['class' => 'btn btn-danger'])}}
                                     {!!Form::close()!!}
                          @endif
                          @endif
                          </div>
                      @endforeach
                   @if(!Auth::guest())

                  <a href="/{{$yarnthread->id}}/comments/create " class="btn btn-primary">Create a Comment</a>
                  <br>
                  <br>
                  <br>
                   @endif
                 </div>

              </div>
            </div>

@endsection
