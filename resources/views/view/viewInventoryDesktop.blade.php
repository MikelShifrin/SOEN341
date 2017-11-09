@extends('layouts.master')
@section('content')

<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
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
        foreach ($ret as $desktop) {

//            print ($desktop->getDesktopId());


//        while($row = pg_fetch_assoc($ret)){
            print "<tr>";
            print "<th scope='row'>$i</th>";
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
//        }
        }
        ?>
    </tbody>
</table>
@endsection