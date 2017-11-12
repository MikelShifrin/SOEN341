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
        <th>Length</th>
        <th>Height</th>
        <th>Width</th>
        <th>Processor Type</th>
        <th>RAM Size</th>
        <th>CPU Cores</th>
        <th>Hard Disk Size</th>
        <th>weight</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $i =1;
    foreach ($ret as $desktop){
            print "<tr>";
            print "<th scope='row'>$i</th>";
            print "<td><input type ='radio' name ='radio'
            value ='".$desktop->getElectronicsid(). "' /> </td>";
            print "<td>".$desktop->getBrandName()."</td>";
        echo "<td>".$desktop->getModelNumber()."</td>";
        echo "<td>".$desktop->getPrice()."</td>";
        echo "<td>".$desktop->getLength()."</td>";
        echo "<td>".$desktop->getHeight()."</td>";
        echo "<td>".$desktop->getWidth()."</td>";
        echo "<td>".$desktop->getProcessorType()."</td>";
        echo "<td>".$desktop->getRamSize()."</td>";
        echo "<td>".$desktop->getNumberOfCpuCores()."</td>";
        echo "<td>".$desktop->getHardDiskSize()."</td>";
        echo "<td>".$desktop->getWeight()."</td>";
        
            $i = $i + 1;
            echo "</tr>";
        }
        ?>
    </tbody>
  </table>
  <input type = 'hidden' name = 'type' value = '1'>
  {{csrf_field()}}
  <br/>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
