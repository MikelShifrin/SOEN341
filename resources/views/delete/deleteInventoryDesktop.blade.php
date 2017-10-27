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
        while($row = pg_fetch_assoc($ret)){
            print "<tr>";
            print "<th scope='row'>$i</th>";
            print "<td><input type ='checkbox' name ='check_list[]'
            value ='" . "desktop_id = " . $row['desktop_id']
            . " electronics_id = " . $row['electronics_id'] . "' /> </td>";
            print "<td>".$row['brand']."</td>";
            echo "<td>".$row['model_number']."</td>";
            echo "<td>".$row['price']."</td>";
            echo "<td>".$row['length']."</td>";
            echo "<td>".$row['height']."</td>";
            echo "<td>".$row['width']."</td>";
            echo "<td>".$row['processor_type']."</td>";
            echo "<td>".$row['ram_size']."</td>";
            echo "<td>".$row['number_of_cpu_cores']."</td>";
            echo "<td>".$row['hard_disk_size']."</td>";
            echo "<td>".$row['weight']."</td>";
            $i = $i + 1;
            echo "</tr>";
        }
        ?>
    </tbody>
  </table>
  {{csrf_field()}}
  <br/>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
