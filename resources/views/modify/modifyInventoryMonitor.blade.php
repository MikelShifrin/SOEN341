@extends('layouts.master')
@section('content')
<form action="{{route('addElectronicItem')}} " method="post">
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
        while($row = pg_fetch_assoc($ret)){
            print "<tr>";
            print "<th scope='row'>$i</th>";
            print "<td><input type='text' class='form-control' placeholder='".$row['brand']."'></td>";
            echo "<td><input type='text' class='form-control' placeholder='".$row['model_number']."'></td>";
            echo "<td><input type='text' class='form-control' placeholder='".$row['price']."'></td>";
            echo "<td><input type='text' class='form-control' placeholder='".$row['display_size']."'></td>";
            echo "<td><input type='text' class='form-control' placeholder='".$row['weight']."'></td>";
            $i = $i + 1;
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

</form>
@endsection
