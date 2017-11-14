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
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $item->getRamSize(); ?></td>
            <td><?php echo $item->getNumberOfCpuCores(); ?></td>
            <td><?php echo $item->getHardDiskSize(); ?></td>
        </tr>
        </tbody>
    </table>

@endsection

@section('size')
    <table class="table">
        <thead class="thead-default">
        <tr>

            <th>Length</th>
            <th>Width</th>
            <th>Height</th>
            <th>Weight</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $item->getLength(); ?></td>
            <td><?php echo $item->getWidth(); ?></td>
            <td><?php echo $item->getHeight(); ?></td>
            <td><?php echo $item->getWeight(); ?></td>
        </tr>
        </tbody>
    </table>


    @endsection

@section('electronictype')
    DESKTOP
    @endsection


@section('mainimage')
    <img src="{{URL::to('img/desktop.png')}}" alt="" class="img-responsive">
@endsection

@section('thumbimage')
    <a href="{{URL::to('img/desktop.png')}}" class="thumb">
        <img src="{{URL::to('img/desktop.png')}}" alt="" class="img-responsive image1">
    </a>
@endsection