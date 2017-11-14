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
            <th>Camera</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $item->getRamSize(); ?></td>
            <td><?php echo $item->getNumberOfCpuCores(); ?></td>
            <td><?php echo $item->getHardDiskSize(); ?></td>
            <td><?php echo $item->getOperatingSystem(); ?></td>
            <td><?php echo $item->getCameraInfo(); ?></td>
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
            <th>Length</th>
            <th>Width</th>
            <th>Height</th>
            <th>Weight</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $item->getDisplaySize(); ?></td>
            <td><?php echo $item->getBatteryInfo(); ?></td>
            <td><?php echo $item->getLength(); ?></td>
            <td><?php echo $item->getWidth(); ?></td>
            <td><?php echo $item->getHeight(); ?></td>
            <td><?php echo $item->getWeight(); ?></td>
        </tr>
        </tbody>
    </table>


@endsection

@section('electronictype')
    TABLET
@endsection

@section('mainimage')
    <img src="{{URL::to('img/tablet.png')}}" alt="" class="img-responsive">
@endsection


@section('thumbimage')
    <a href="{{URL::to('img/tablet.png')}}" class="thumb">
        <img src="{{URL::to('img/tablet.png')}}" alt="" class="img-responsive image1">
    </a>
    @endsection