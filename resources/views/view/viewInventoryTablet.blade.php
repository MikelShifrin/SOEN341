@extends('layouts.master')
@section('content')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Brand</th>
            <th>Model Number</th>
            <th>Price</th>
            <th>Processor Type</th>
            <th>RAM Size</th>
            <th>CPU Cores</th>
            <th>Hard Disk Size</th>
            <th>Operating System</th>
            <th>Display Size</th>
            <th>Battery Info</th>
            <th>Camera Info</th>
            <th>Length</th>
            <th>Height</th>
            <th>Width</th>
            <th>weight</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach ($ret as $tablet) {
            print "<tr>";
            print "<th scope='row'>$i</th>";
            print "<td>".$tablet->getBrandName()."</td>";
            echo "<td>".$tablet->getModelNumber()."</td>";
            echo "<td>".$tablet->getPrice()."</td>";
            echo "<td>".$tablet->getProcessorType()."</td>";
            echo "<td>".$tablet->getRamSize()."</td>";
            echo "<td>".$tablet->getNumberOfCpuCores()."</td>";
            echo "<td>".$tablet->getHardDiskSize()."</td>";
            echo "<td>".$tablet->getOperatingSystem()."</td>";
            echo "<td>".$tablet->getDisplaySize()."</td>";
            echo "<td>".$tablet->getBatteryInfo()."</td>";
            echo "<td>".$tablet->getCameraInfo()."</td>";
            echo "<td>".$tablet->getLength()."</td>";
            echo "<td>".$tablet->getHeight()."</td>";
            echo "<td>".$tablet->getWidth()."</td>";
            echo "<td>".$tablet->getWeight()."</td>";
            $i = $i + 1;
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
@endsection