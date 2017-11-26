
@extends('layouts.userViewMaster')


@section('productcontents')


    <?php



    foreach ($ret as $wish) {

    if($wish->getElectronics()->getType()=='d') {
        $type = 1;
    } elseif ($wish->getElectronics()->getType()=='m') {
        $type = 2;
    } elseif ($wish->getElectronics()->getType()=='l') {
        $type = 3;
    } else {
        $type = 4;
    }


    ?>
    <div class='col-md-4 col-sm-6'>
    <div class="product">
    <div class="image">
    <a href="">
    <img src="{{URL::to('img/wish.png')}}" alt="" class="img-responsive image1">
    </a>
    </div>
    <!-- /.image -->
    <div class="text">
    <h3>
    <a href="{{route('shopDetail',['type'=>$type,'id'=>$wish->getElectronics()->getElectronicsId()])}}">
    <?php print $wish->getElectronics()->getBrandName(); ?></a></h3>
    <p class="price">$<?php print $wish->getElectronics()->getPrice();  ?></p>

    </div>
    </div>
    </div>

    <?php } ?>



    @endsection