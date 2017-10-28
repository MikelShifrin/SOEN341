@extends('layouts.master')
@section('content')
<form action="{{route('deleteElectronicItem')}} " method="post">
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
            print "<td><input type ='checkbox' name ='check_list[]'
            value ='" . "display_id = " . $row['display_id']
            . " electronics_id = " . $row['electronics_id'] . "' /> </td>";
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
    {{csrf_field()}}
    <br/>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
