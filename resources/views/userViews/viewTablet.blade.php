

@extends('layouts.userViewMaster')
@section('productcontents')
    <?php
    $brandArray = [];
    $processorArray = [];
    $hdsArray = [];
    $osArray = [];
    $cameraArray = [];
    foreach ($ret as $tablet) {

        $brandArray[$tablet->getElectronicsId()] = $tablet->getBrandName();
        $processorArray[$tablet->getElectronicsId()] = $tablet->getProcessorType();
        $hdsArray[$tablet->getElectronicsId()] = $tablet->getHardDiskSize();
        $osArray[$tablet->getElectronicsId()] = $tablet->getOperatingSystem();
        $cameraArray[$tablet->getElectronicsId()] = $tablet->getCameraInfo();

    }
    $brandArray = array_values(array_unique($brandArray));
    $processorArray = array_values(array_unique($processorArray));
    $hdsArray = array_values(array_unique($hdsArray ));
    $osArray = array_values(array_unique($osArray ));
    $cameraArray = array_values(array_unique($cameraArray ));


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


@section('filter')

    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title">Brands</h3>
            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
        </div>

        <div class="panel-body">

            <form action="{{route('filterTablet')}}" method="get">
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
            <h3 class="panel-title clearfix">Processor Type</h3>
            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
        </div>

        <div class="panel-body">
            <?php foreach ($processorArray as $processor) { ?>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input name="processor[]" value='<?php echo $processor; ?>' type="checkbox"><?php echo $processor; ?>
                    </label>
                </div>

            </div>
            <?php } ?>
        </div>
    </div>

    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title clearfix">Hard Disk Size(GB)</h3>
            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
        </div>

        <div class="panel-body">
            <?php foreach ($hdsArray as $hds) { ?>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input name="hds[]" value='<?php echo $hds; ?>' type="checkbox"><?php echo $hds; ?>
                    </label>
                </div>

            </div>
            <?php } ?>
        </div>
    </div>



    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title clearfix">RAM</h3>
            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
        </div>

        <div class="panel-body">
            <div class="form-group">
                <p>
                    <label for="ram">RAM Size:</label>
                    <input type="text" id="ram" name="ram" readonly style="border:0; color:#f6931f; font-weight:bold;">
                </p>
                <div id="ram-slider-range"></div>
            </div>
        </div>
    </div>




    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title clearfix">Operating System</h3>
            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
        </div>

        <div class="panel-body">
            <?php foreach ($osArray as $os) { ?>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input name="os[]" value='<?php echo $os; ?>' type="checkbox"><?php echo $os; ?>
                    </label>
                </div>

            </div>
            <?php } ?>
        </div>
    </div>

    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="panel-title clearfix">Display Size</h3>
            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
        </div>

        <div class="panel-body">
            <div class="form-group">
                <p>
                    <label for="display">Display Size:</label>
                    <input type="text" id="display" name="display" readonly style="border:0; color:#f6931f; font-weight:bold;">
                </p>
                <div id="display-slider-range"></div>
            </div>
        </div>
    </div>

    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="panel-title clearfix">Battery Size</h3>
            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
        </div>

        <div class="panel-body">
            <div class="form-group">
                <p>
                    <label for="batter">Battery Size:</label>
                    <input type="text" id="battery" name="battery" readonly style="border:0; color:#f6931f; font-weight:bold;">
                </p>
                <div id="battery-slider-range"></div>
            </div>
        </div>
    </div>

    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title clearfix">Camera</h3>
            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
        </div>

        <div class="panel-body">
            <?php foreach ($cameraArray as $camera) { ?>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input name="camera[]" value='<?php echo $camera; ?>' type="checkbox"><?php echo $camera; ?>
                    </label>
                </div>

            </div>
            <?php } ?>
        </div>
    </div>


    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="panel-title clearfix">Weight</h3>
            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
        </div>

        <div class="panel-body">
            <div class="form-group">

                <div class="form-group">
                    <p>
                        <label for="weight">Weight</label>
                        <input type="text" id="weight" name="weight" readonly style="border:0; color:#f6931f; font-weight:bold;">
                    </p>
                    <div id="weight-slider-range"></div>

                </div>
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