@extends('layouts.shopDetail')
@section('itemdetails')

    {{csrf_field()}}
@endsection

@section('brandName')
    <?php
    echo $item->getBrandName();
    ?>
@endsection

@section('price')
    <?php
    echo $item->getPrice();
    ?>
@endsection

@section('basicdetail')
    <table class="table">
        <thead class="thead-default">
        <tr>

            <th>Brand</th>
            <th>Model Number</th>
            <th>Processor Type</th>
        </tr>
        </thead>
        <tbody>
        <tr>

            <td><?php echo $item->getBrandName(); ?></td>
            <td><?php echo $item->getModelNumber(); ?></td>
            <td><?php echo $item->getProcessorType(); ?></td>
        </tr>
        </tbody>
    </table>

@endsection

@section('specification')
    <table class="table">
        <thead class="thead-default">
        <tr>

            <th>RAM Size</th>
            <th>CPU Cores</th>
            <th>Hard Disk Size</th>
            <th>Operating System</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $item->getRamSize(); ?></td>
            <td><?php echo $item->getNumberOfCpuCores(); ?></td>
            <td><?php echo $item->getHardDiskSize(); ?></td>
            <td><?php echo $item->getOperatingSystem(); ?></td>
        </tr>
        </tbody>
    </table>

@endsection

@section('size')
    <table class="table">
        <thead class="thead-default">
        <tr>

            <th>Display Size</th>
            <th>Battery Info</th>
            <th>Weight</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $item->getDisplaySize(); ?></td>
            <td><?php echo $item->getBatteryInfo(); ?></td>
            <td><?php echo $item->getWeight(); ?></td>
        </tr>
        </tbody>
    </table>


@endsection

@section('electronictype')
    LAPTOP
@endsection

@section('mainimage')
    <img src="{{URL::to('img/laptop.png')}}" alt="" class="img-responsive">
@endsection

@section('thumbimage')
    <a href="{{URL::to('img/laptop.png')}}" class="thumb">
        <img src="{{URL::to('img/laptop.png')}}" alt="" class="img-responsive image1">
    </a>
@endsection

@section('addtowishlist')



    @if(isset($Success))
        <i class="fa fa-shopping-cart"></i> Added to wish list

    @else
        <i class="fa fa-shopping-cart"></i><a href="{{route('AddtoWishList',['type'=>3,'item'=>$item->getElectronicsId()])}}" class=""> Add to Wishlist</a>
    @endif
    {{--<button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i>--}}
    {{--</button>--}}
@endsection