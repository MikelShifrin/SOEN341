@extends('layouts.master')

@section('content')
<div class="container ">
	<div class="jumbotron">
    <h1>Add Desktop</h1> 
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
    <label for="exampleInputEmail1">Length</label>
    <input type="input" class="form-control" id=""  placeholder="Length" name='length'>
    <input type="hidden" class="form-control" id=""  placeholder="Enter Display Size" name='type' value="d">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">width</label>
    <input type="input" class="form-control" id=""  placeholder="Enter width" name='width'>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">height</label>
    <input type="input" class="form-control" id=""  placeholder="Enter height" name='height'>
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
        x = document.forms["myForm"]["length"].value;
        if (x == "") {
            alert("length must be filled out");
            document.forms["myForm"]["length"].focus();
            return false;
        }
        if( isNaN(x)) {
            alert('length should be numeric');
            document.forms["myForm"]["length"].focus();
            return false;
        }
        x = document.forms["myForm"]["width"].value;
        if (x == "") {
            alert("width must be filled out");
            document.forms["myForm"]["width"].focus();
            return false;
        }
        if( isNaN(x)) {
            alert('width should be numeric');
            document.forms["myForm"]["width"].focus();
            return false;
        }
        x = document.forms["myForm"]["height"].value;
        if (x == "") {
            alert("height must be filled out");
            document.forms["myForm"]["height"].focus();
            return false;
        }
        if( isNaN(x)) {
            alert('height should be numeric');
            document.forms["myForm"]["height"].focus();
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


    }
</script>