@extends('layouts.master')
@section('content')
<div class="container ">
	<div class="jumbotron">
    <h1>Add Monitor</h1> 
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
    <label for="exampleInputEmail1">Size in cms</label>
    <input type="input" class="form-control" id=""  placeholder="Enter Size" name='size'>
    <input type="hidden" class="form-control" id=""  placeholder="Enter Display Size" name='type' value="m">
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
        x = document.forms["myForm"]["size"].value;
        if (x == "") {
            alert("Size must be filled out");
            document.forms["myForm"]["size"].focus();
            return false;
        }
        if( isNaN(x)) {
            alert('Display size should be numeric');
            document.forms["myForm"]["size"].focus();
            return false;
        }


    }
</script>