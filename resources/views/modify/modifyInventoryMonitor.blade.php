@extends('layouts.master')
@section('content')
   
    <table class="table table-striped" id="view">
        <thead>
        <tr>
            <th>#</th>
            <th>Modify</th>
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
            print "<td scope='row'>$i</td>";
            print "<td><input type ='radio' name ='radio' value ='".$monitor->getElectronicsId()."' id='".$i."'
//            data-toggle='modal' data-id='".$i."' data-target='#myModal'
            /></td>";
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

    <!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{route('modifyMonitor',['type'=>2])}}" method="post">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Monitor</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="m1">Brand: </label>
                    <input type="text" name="brand" class="form-control" id="m1" style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m2"> Model Number: </label>
                    <input type="text" name="modelNumber" class="form-control" id="m2"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m3"> Price </label>
                    <input type="number" name="price" class="form-control" id="m3"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m4"> Display Size </label>
                    <input type="number" name="displaySize" class="form-control" id="m4"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m5"> Weight </label>
                    <input type="number" name="weight" class="form-control" id="m5"  style="width: 75%;float: right" placeholder="">
                </div>

                {{ csrf_field() }}
                <input type="hidden" id="hiddenId" name="hiddenElectronicsId">

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button id="update-btn" type="submit" class="btn btn-primary" style="">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
    $('input:radio[name="radio"]').change(
        function(){
            if ($(this).is(':checked')) {
                // append goes here
                var id = $(this).attr('id');
                //console.log($(this).attr('id'));
//                var table = document.getElementById("view");
//                var row = table.rows.namedItem(id);
                console.log((document.getElementById(id).value));
                var array = [];
                var headers = [];
                $('#view th').each(function(index, item) {
                    headers[index] = $(item).html();
                });
                $('#view tr').has('td').each(function() {
                    var arrayItem = {};
                    $('td', $(this)).each(function(index, item) {
                        arrayItem[headers[index]] = $(item).html();
                    });
                    array.push(arrayItem);
                });

//                console.log(array[id-1])

                var rowIdArray = [];
                rowIdArray = array[id-1];

                document.getElementById("m1").value = rowIdArray['Brand'];
                document.getElementById("m2").value = rowIdArray['Model Number'];
                document.getElementById("m3").value = rowIdArray['Price'];
                document.getElementById("m4").value = rowIdArray['Display Size'];
                document.getElementById("m5").value = rowIdArray['weight'];
                document.getElementById("hiddenId").value = document.getElementById(id).value;

                $("#myModal").modal()
            }
        });


</script>
@endsection
