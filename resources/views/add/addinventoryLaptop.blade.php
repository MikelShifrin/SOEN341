@extends('layouts.master')
@section('content')
<div class="container ">
  <div class="jumbotron">
    <h1>Add Laptop</h1> 
<form action="{{route('addElectronicItem')}} " onsubmit="return validateForm()" method="post" name="myForm">
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

<script>
    function validateForm() {
        var x = document.forms["myForm"]["brandName"].value;
        if (x == "") {
            alert("Brand name must be filled out");
            document.forms["myForm"]["brandName"].focus();
            return false;
        }
        if( /[^a-zA-Z0-9\-\/]/.test(x) ) {
            alert('Brand name is not alphanumeric');
            document.forms["myForm"]["brandName"].focus();
            return false;
        }
        x = document.forms["myForm"]["modelNumber"].value;
        if (x == "") {
            alert("Model number must be filled out");
            document.forms["myForm"]["modelNumber"].focus();
            return false;
        }
        if( /[^a-zA-Z0-9\-\/]/.test(x) ) {
            alert('Model Number is not alphanumeric');
            document.forms["myForm"]["modelNumber"].focus();
            return false;
        }

        x = document.forms["myForm"]["price"].value;
        if (x == "") {
            alert("Price must be filled out");
            document.forms["myForm"]["price"].focus();
            return false;
        }
        if( isNaN(x)) {
            alert('Price should be numeric');
            document.forms["myForm"]["price"].focus();
            return false;
        }
        x = document.forms["myForm"]["weight"].value;
        if (x == "") {
            alert("weight must be filled out");
            document.forms["myForm"]["weight"].focus();
            return false;
        }
        if( isNaN(x)) {
            alert('weight should be numeric');
            document.forms["myForm"]["weight"].focus();
            return false;
        }

        x = document.forms["myForm"]["processor_type"].value;
        if (x == "") {
            alert("Processor type must be filled out");
            document.forms["myForm"]["processor_type"].focus();
            return false;
        }
        if( /[^a-zA-Z0-9\-\/]/.test(x) ) {
            alert('Processor Type is not alphanumeric');
            document.forms["myForm"]["processor_type"].focus();
            return false;
        }
        x = document.forms["myForm"]["ram_size"].value;
        if (x == "") {
            alert("Ram Size must be filled out");
            document.forms["myForm"]["ram_size"].focus();
            return false;
        }
        if( isNaN(x)) {
            alert('Ram Size should be an Integer');
            document.forms["myForm"]["ram_size"].focus();
            return false;
        }
        if( !isNaN(x)) {
            if(x.indexOf(".")!=-1) {
                alert('Ram Size should be an Integer');
                document.forms["myForm"]["ram_size"].focus();
                return false;
            }
        }
        x = document.forms["myForm"]["number_of_cpu_cores"].value;
        if (x == "") {
            alert("No of CPU cores must be filled out");
            document.forms["myForm"]["number_of_cpu_cores"].focus();
            return false;
        }
        if( isNaN(x)) {
            alert('Number of CPU cores should be integer');
            document.forms["myForm"]["number_of_cpu_cores"].focus();
            return false;
        }
        if( !isNaN(x)) {
            if(x.indexOf(".")!=-1) {
                alert('Number of CPU cores should be integer');
                document.forms["myForm"]["number_of_cpu_cores"].focus();
                return false;
            }
        }
        x = document.forms["myForm"]["hard_disk_size"].value;
        if (x == "") {
            alert("Hard Disk Size must be filled out");
            document.forms["myForm"]["hard_disk_size"].focus();
            return false;
        }
        if( isNaN(x)) {
            alert('Hard disk size should be integer');
            document.forms["myForm"]["hard_disk_size"].focus();
            return false;
        }
        if( !isNaN(x)) {
            if(x.indexOf(".")!=-1){
                alert('Hard disk size should be integer');
                document.forms["myForm"]["hard_disk_size"].focus();
                return false;
            }
        }

        x = document.forms["myForm"]["operatingSystem"].value;
        if (x == "") {
            alert("Operating System must be filled out");
            document.forms["myForm"]["operatingSystem"].focus();
            return false;
        }
        if( /[^a-zA-Z0-9\-\/]/.test(x) ) {
            alert('Operating System is not alphanumeric');
            document.forms["myForm"]["operatingSystem"].focus();
            return false;
        }
        x = document.forms["myForm"]["displaySize"].value;
        if (x == "") {
            alert("Display Size must be filled out");
            document.forms["myForm"]["displaySize"].focus();
            return false;
        }
        if( isNaN(x)) {
            alert('Display size should be integer');
            document.forms["myForm"]["displaySize"].focus();
            return false;
        }
        if( !isNaN(x)) {
            if(x.indexOf(".")!=-1){
                alert('Dispaly size should be integer');
                document.forms["myForm"]["displaySize"].focus();
                return false;
            }
        }
        x = document.forms["myForm"]["battery_info"].value;
        if (x == "") {
            alert("Battery info must be filled out");
            document.forms["myForm"]["battery_info"].focus();
            return false;
        }
        if( isNaN(x)) {
            alert('Battery info should be integer');
            document.forms["myForm"]["battery_info"].focus();
            return false;
        }
        if( !isNaN(x)) {
            if(x.indexOf(".")!=-1){
                alert('Battery info should be integer');
                document.forms["myForm"]["battery_info"].focus();
                return false;
            }
        }
    }
</script>