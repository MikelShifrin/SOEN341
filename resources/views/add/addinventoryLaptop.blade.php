@extends('layouts.master')
@section('content')
<div class="container ">
  <div class="jumbotron">
    <h1>Add Laptop</h1> 
<form action="{{route('addElectronicItem')}} " method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Brand Name</label>
    <input type="input" class="form-control" id=""  placeholder="Enter Brand Name" name='brandName'>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Model Number</label>
    <input type="input" class="form-control" id=""  placeholder="Enter Model Number" name='modelNumber'>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="input" class="form-control" id=""  placeholder="Enter Price" name='price'>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Weight</label>
    <input type="input" class="form-control" id=""  placeholder="Enter Weight" name='weight'>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Processor Type</label>
    <input type="input" class="form-control" id=""  placeholder="Enter Processor Type" name='processor_type'>
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Ram Size</label>
    <input type="input" class="form-control" id=""  placeholder="Enter Ram Size" name='ram_size'>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Number of CPU cores</label>
    <input type="input" class="form-control" id=""  placeholder="Enter number of cpu cores" name='number_of_cpu_cores'>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Hard Disk Size</label>
    <input type="input" class="form-control" id=""  placeholder="Enter the size of Hard Disk" name='hard_disk_size'>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Operating System</label>
    <input type="input" class="form-control" id=""  placeholder="Enter operating system" name='operatingSystem'>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Display Size</label>
    <input type="input" class="form-control" id=""  placeholder="Enter Display Size" name='displaySize'>
    <input type="hidden" class="form-control" id=""  placeholder="Enter Display Size" name='type' value="l">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Battery Info</label>
    <input type="input" class="form-control" id=""  placeholder="Enter battery Info" name='battery_info'>
  </div>
  {{csrf_field()}}
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
@endsection