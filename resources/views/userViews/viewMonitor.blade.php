

@extends('layouts.userViewMaster')
@section('productcontents')
    <?php
    $brandArray = [];

    foreach ($ret as $monitor) {

        $brandArray[$monitor->getElectronicsId()] = $monitor->getBrandName();

    }
    $brandArray = array_values(array_unique($brandArray));

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

    foreach ($ret as $monitor) { ?>
    <div class='col-md-4 col-sm-6'>
        <div class="product">
            <div class="image">
                <a href="">
                    <img src="{{URL::to('img/monitor.png')}}" alt="" class="img-responsive image1">
                </a>
            </div>
            <!-- /.image -->
            <div class="text">
                <h3><a href="{{route('shopDetail',['type'=>2,'id'=>$monitor->getElectronicsId()])}}"><?php print $monitor->getBrandName(); ?></a></h3>
                <p class="price">$<?php print $monitor->getPrice();  ?></p>
            </div>
        </div>
    </div>
    <?php } ?>



@endsection

@section('sort')

    <!-- Button to Open the Modal -->
    <button type="submit" class="btn btn-primary">
        <a href="{{route('viewInventoryMonitor',['type'=>2,'st'=>'asc'])}}">Price (Ascending)</a>
    </button>

    <!-- Button to Open the Modal -->
    <button type="submit" class="btn btn-primary">
        <a href="{{route('viewInventoryMonitor',['type'=>2,'st'=>'desc'])}}">Price (Descending)</a>
    </button>

@endsection


@section('filter')

    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title">Brands</h3>
            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
        </div>

        <div class="panel-body">

            <form action="{{route('filterMonitor')}}" method="get">
                <?php foreach ($brandArray as $brand) { ?>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input name="brand[]" value='<?php echo $brand; ?>' type="checkbox"><?php echo $brand; ?>
                        </label>
                    </div>
                </div>
            <?php } ?>
            {{--<button class="btn btn-default btn-sm btn-template-main"><i class="fa fa-pencil"></i> Apply</button>--}}
        </div>
    </div>

    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title clearfix">Price</h3>
            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
        </div>

        <div class="panel-body">
            <div class="form-group">
                <p>
                    <label for="price">Price Range:</label>
                    <input type="text" id="price" name="price" readonly style="border:0; color:#f6931f; font-weight:bold;">
                </p>
                <div id="price-slider-range"></div>
            </div>
        </div>
    </div>

    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title clearfix">Display</h3>
            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
        </div>

        <div class="panel-body">
            <div class="form-group">
                <p>
                    <label for="display">Display Range:</label>
                    <input type="text" id="display" name="display" readonly style="border:0; color:#f6931f; font-weight:bold;">
                </p>
                <div id="display-slider-range"></div>
            </div>
        </div>
    </div>

    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="panel-title clearfix">Weight</h3>
            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
        </div>

        <div class="panel-body">
            <div class="form-group">
                <p>
                    <label for="weight">Weight</label>
                    <input type="text" id="weight" name="weight" readonly style="border:0; color:#f6931f; font-weight:bold;">
                </p>
                <div id="weight-slider-range"></div>
            </div>

            <button class="btn btn-default btn-sm btn-template-main"
                    type="submit"
            ><i class="fa fa-pencil"></i> Apply</button>

            </form>
        </div>
    </div>


    <div class="banner">
        <a href="#">
            apply more filters here
        </a>
    </div>




@endsection