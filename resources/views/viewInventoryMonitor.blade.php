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
        while($row = pg_fetch_assoc($ret)){
            print "<tr>";
            print "<th scope='row'>$i</th>";
            print "<td>".$row['brand']."</td>";
            echo "<td>".$row['model_number']."</td>";
            echo "<td>".$row['price']."</td>";
            echo "<td>".$row['display_size']."</td>";
            echo "<td>".$row['weight']."</td>";
            $i = $i + 1;
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
@endsection