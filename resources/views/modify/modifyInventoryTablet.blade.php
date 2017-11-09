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
            <th>Weight</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        while($row = pg_fetch_assoc($ret)){
            print "<tr>";
            print "<td scope='row'>$i</td>";
            print "<td><input type ='radio' name ='radio'
            value ='".$row['electronics_id']."' id='".$i."'
//            data-toggle='modal' data-id='".$i."' data-target='#myModal'
            /></td>";
            print "<td>".$row['brand']."</td>";
            echo "<td>".$row['model_number']."</td>";
            echo "<td>".$row['price']."</td>";
            echo "<td>".$row['processor_type']."</td>";
            echo "<td>".$row['ram_size']."</td>";
            echo "<td>".$row['number_of_cpu_cores']."</td>";
            echo "<td>".$row['hard_disk_size']."</td>";
            echo "<td>".$row['operating_system']."</td>";
            echo "<td>".$row['display_size']."</td>";
            echo "<td>".$row['battery_info']."</td>";
            echo "<td>".$row['camera_info']."</td>";
            echo "<td>".$row['length']."</td>";
            echo "<td>".$row['height']."</td>";
            echo "<td>".$row['width']."</td>";
            echo "<td>".$row['weight']."</td>";
           
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

            <form action="{{route('modifyTablet',['type'=>4])}}" method="post">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Tablet</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="m1">Brand</label>
                    <input type="text" name="Brand" class="form-control" id="m1" style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m2">Model Number</label>
                    <input type="text" name="Model Number" class="form-control" id="m2"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m3">Price</label>
                    <input type="number" name="Price" class="form-control" id="m3"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                <label for="m4">Processor Type</label>
                <input type="number" name="Processor Type" class="form-control" id="m4"  style="width: 75%;float: right" placeholder="">
            </div>

                <div class="form-group">
                    <label for="m5">Ram Size</label>
                    <input type="number" name="Ram Size" class="form-control" id="m5"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m6">Cpu Cores</label>
                     <input type="number" name="Cpu Cores" class="form-control" id="m6"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m7">Hard Disk Size</label>
                    <input type="text" name="Hard Disk Size" class="form-control" id="m7"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m8">Operating System </label>
                <input type="number" class="form-control" name="Operating System" id="m8"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m9">Display Size</label>
                    <input type="number" name="Display Size" class="form-control" id="m9"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m10">Battery Info</label>
                    <input type="number" name="Battery Info" class="form-control" id="m10"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m11">Camer Info</label>
                    <input type="number" name="Camer Info" class="form-control" id="m11"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m11">Length</label>
                    <input type="number" name="Length" class="form-control" id="m12"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m11">Height</label>
                    <input type="number" name="Height" class="form-control" id="m13"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m11">Width</label>
                    <input type="number" name="Width" class="form-control" id="m14"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m11">Weight</label>
                    <input type="number" name="Weight" class="form-control" id="m15"  style="width: 75%;float: right" placeholder="">
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
                document.getElementById("m4").value = rowIdArray['Processor Type'];
                document.getElementById("m5").value = rowIdArray['Ram Size'];
                document.getElementById("m6").value = rowIdArray['Cpu Cores'];
                document.getElementById("m7").value = rowIdArray['HDisk Size'];
                document.getElementById("m8").value = rowIdArray['Operating System'];
                document.getElementById("m9").value = rowIdArray['Display Size'];
                document.getElementById("m10").value = rowIdArray['Battery Info'];
                document.getElementById("m11").value = rowIdArray['Camera Info'];
                document.getElementById("m12").value = rowIdArray['Length'];
                document.getElementById("m13").value = rowIdArray['Height'];
                document.getElementById("m14").value = rowIdArray['Width'];
                document.getElementById("m15").value = rowIdArray['Weight'];
                document.getElementById("hiddenId").value = document.getElementById(id).value;

                $("#myModal").modal()
            }
        });


</script>

@endsection
