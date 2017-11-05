@extends('layouts.master')
@section('content')

<div class="jumbotron">
  <h1 class="display-3">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  @if(isset($return))
    <div class="alert alert-success" role="alert">
      <strong>Oh yes!</strong>
      {{$return}}
    </div>
  @endif
</div>

@endsection