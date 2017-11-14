

@extends('layouts.userViewMaster')
@section('productcontents')
    <?php
    function sort_asc($a, $b) {
        if($a->getPrice() == $b->getPrice()){ return 0 ; }
        return ($a->getPrice() < $b->getPrice()) ? -1 : 1;
    }
    function sort_desc($a, $b) {
        if($a->getPrice() == $b->getPrice()){ return 0 ; }
        return ($a->getPrice() > $b->getPrice()) ? -1 : 1;
    }
    //            sort($ret);
    if($st=='asc'){
        usort($ret, 'sort_asc');
    } elseif ($st=='desc') {
        usort($ret, 'sort_desc');
    }
    foreach ($ret as $tablet) { ?>
    <div class='col-md-4 col-sm-6'>
        <div class="product">
            <div class="image">
                <a href="">
                    <img src="{{URL::to('img/tablet.png')}}" alt="" class="img-responsive image1">
                </a>
            </div>
            <!-- /.image -->
            <div class="text">
                <h3><a href="{{route('shopDetail',['type'=>4,'id'=>$tablet->getElectronicsId()])}}"><?php print $tablet->getBrandName(); ?></a></h3>
                <p class="price">$<?php print $tablet->getPrice();  ?></p>

            </div>
        </div>
    </div>
    <?php } ?>

@endsection

@section('sort')

    <!-- Button to Open the Modal -->
    <button type="submit" class="btn btn-primary">
        <a href="{{route('viewInventoryTablet',['type'=>4,'st'=>'asc'])}}">Price (Ascending)</a>
    </button>

    <!-- Button to Open the Modal -->
    <button type="submit" class="btn btn-primary">
        <a href="{{route('viewInventoryTablet',['type'=>4,'st'=>'desc'])}}">Price (Descending)</a>
    </button>

@endsection