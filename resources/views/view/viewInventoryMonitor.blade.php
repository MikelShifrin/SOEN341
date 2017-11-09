@extends('layouts.master')
@section('content')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Brand</th>
            <th>Model Number</th>
            <th>Price</th>
            <th>Display Size</th>
            <th>weight</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach ($ret as $monitor) {
            print "<tr>";
            print "<th scope='row'>$i</th>";
            print "<td>".$monitor->getBrandName()."</td>";
            echo "<td>".$monitor->getModelNumber()."</td>";
            echo "<td>".$monitor->getPrice()."</td>";
            echo "<td>".$monitor->getSize()."</td>";
            echo "<td>".$monitor->getWeight()."</td>";
            $i = $i + 1;
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
@endsection