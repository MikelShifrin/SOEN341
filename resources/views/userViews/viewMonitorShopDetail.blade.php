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
    <?php  echo $item->getPrice();  ?>
@endsection

@section('basicdetail')
    <table class="table">
        <thead class="thead-default">
        <tr>

            <th>Brand</th>
            <th>Model Number</th>
            <th>Display Size</th>
        </tr>
        </thead>
        <tbody>
        <tr>

            <td><?php echo $item->getBrandName(); ?></td>
            <td><?php echo $item->getModelNumber(); ?></td>
            <td><?php echo $item->getSize(); ?></td>
        </tr>
        </tbody>
    </table>

@endsection

@section('specification')
    <table class="table">
        <thead class="thead-default">
        <tr>

            <th>Weight</th>
            <th>Price</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $item->getWeight(); ?></td>
            <td><?php echo $item->getPrice(); ?></td>

        </tr>
        </tbody>
    </table>

@endsection

@section('size')



@endsection

@section('electronictype')
    DISPLAY
@endsection

@section('mainimage')
    <img src="{{URL::to('img/monitor.png')}}" alt="" class="img-responsive">
@endsection

@section('thumbimage')
    <a href="{{URL::to('img/monitor.png')}}" class="thumb">
        <img src="{{URL::to('img/monitor.png')}}" alt="" class="img-responsive image1">
    </a>
@endsection