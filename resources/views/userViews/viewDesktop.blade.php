
@extends('layouts.userViewMaster')

@section('productcontents')


<?php
$brandArray = [];
$processorArray = [];
$hdsArray = [];
foreach ($ret as $desktop) {

    $brandArray[$desktop->getElectronicsId()] = $desktop->getBrandName();
    $processorArray[$desktop->getElectronicsId()] = $desktop->getProcessorType();
    $hdsArray[$desktop->getElectronicsId()] = $desktop->getHardDiskSize();

}
$brandArray = array_values(array_unique($brandArray));
$processorArray = array_values(array_unique($processorArray));
$hdsArray = array_values(array_unique($hdsArray ));

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

@section('filter')

    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title">Brands</h3>
            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
        </div>

        <div class="panel-body">

            <form action="{{route('filterDesktop')}}" method="get">
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
            <h3 class="panel-title clearfix">Hard Disk Size(GB)</h3>
            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
        </div>

        <div class="panel-body">
            <div class="form-group">
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