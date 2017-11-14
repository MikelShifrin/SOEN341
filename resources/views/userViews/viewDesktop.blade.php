

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
        <h3><a href="{{route('shopDetail',['type'=>1,'id'=>$desktop->getElectronicsId()])}}"><?php print $desktop->getBrandName(); ?></a></h3>
        <p class="price">$<?php print $desktop->getPrice();  ?></p>

    </div>
    </div>
</div>
<?php } ?>

@endsection

@section('sort')

    <!-- Button to Open the Modal -->
    <button type="submit" class="btn btn-primary">
        <a href="{{route('viewInventoryDesktop',['type'=>1,'st'=>'asc'])}}">Price (Ascending)</a>
    </button>

    <!-- Button to Open the Modal -->
    <button type="submit" class="btn btn-primary">
        <a href="{{route('viewInventoryDesktop',['type'=>1,'st'=>'desc'])}}">Price (Descending)</a>
    </button>

@endsection