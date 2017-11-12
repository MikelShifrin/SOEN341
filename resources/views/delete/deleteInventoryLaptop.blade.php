@extends('layouts.master')
@section('content')
<form action="{{route('deleteElectronicItem')}} " method="post">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Delete</th>
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
            <th>weight</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i =1;
    foreach ($ret as $laptop){
            print "<tr>";
            print "<th scope='row'>$i</th>";
            print "<td><input type ='radio' name ='radio'
            value ='".$laptop->getElectronicsid(). "' /> </td>";
            print "<td>".$laptop->getBrandName()."</td>";
            echo "<td>".$laptop->getModelNumber()."</td>";
            echo "<td>".$laptop->getPrice()."</td>";
            echo "<td>".$laptop->getProcessorType()."</td>";
            echo "<td>".$laptop->getRamSize()."</td>";
            echo "<td>".$laptop->getNumberOfCpuCores()."</td>";
            echo "<td>".$laptop->getHardDiskSize()."</td>";
            echo "<td>".$laptop->getOperatingSystem()."</td>";
            echo "<td>".$laptop->getDisplaySize()."</td>";
            echo "<td>".$laptop->getBatteryInfo()."</td>";
            echo "<td>".$laptop->getWeight()."</td>";
            $i = $i + 1;
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <input type = 'hidden' name = 'type' value = '3'>
   {{csrf_field()}}
  <br/>
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
