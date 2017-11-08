@extends('layouts.master')
@section('content')

<div class="jumbotron">
  <h1 class="display-3">Welcome!</h1>
  <p class="lead"></p>
  @if(isset($return))
    <div class="alert alert-success" role="alert">
      <strong>Well Done!</strong>
      {{$return}}
    </div>
  @endif
</div>

@endsection