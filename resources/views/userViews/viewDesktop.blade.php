

@extends('layouts.userViewMaster')
@section('productcontents')
<?php

foreach ($ret as $desktop) { ?>
<div class='col-md-4 col-sm-6'>
    <div class="product">
        <div class="image">
        <a href="">
            <img src="{{URL::to('img/desktop.png')}}" alt="" class="img-responsive image1">
        </a>
    </div>
    <!-- /.image -->
    <div class="text">
        <h3><a href="{{route('shopDetail',['type'=>1,'id'=>1])}}"><?php print $desktop->getBrandName(); ?></a></h3>
        <p class="price">$<?php print $desktop->getPrice();  ?></p>

    </div>
    </div>
</div>
<?php } ?>



@endsection