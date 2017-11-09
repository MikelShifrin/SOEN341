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
        print "<tr>";
        print "<td scope='row'>$i</td>";
        print "<td><input type ='radio' name ='radio'
            value ='".$desktop->getElectronicsId()."' id='".$i."'
//            data-toggle='modal' data-id='".$i."' data-target='#myModal'
            /></td>";
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


<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{route('modifyDesktop',['type'=>1])}}" method="post">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Desktop</h4>
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
                    <label for="m3"> Price: </label>
                    <input type="number" name="price" class="form-control" id="m3"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m4"> Length: </label>
                    <input type="number" name="length" class="form-control" id="m4"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m5"> Height: </label>
                    <input type="number" name="height" class="form-control" id="m5"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m6"> Width: </label>
                     <input type="number" name="width" class="form-control" id="m6"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m7"> Processor Type: </label>
                    <input type="text" name="processorType" class="form-control" id="m7"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m8"> RAM Size:  </label>
                <input type="number" class="form-control" name="ramSize" id="m8"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m9"> CPU Cores:  </label>
                    <input type="number" name="cpuCores" class="form-control" id="m9"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m10"> Hard Disk Size:  </label>
                    <input type="number" name="hardDiskSize" class="form-control" id="m10"  style="width: 75%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m11"> Weight: </label>
                    <input type="number" name="weight" class="form-control" id="m11"  style="width: 75%;float: right" placeholder="">
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
                document.getElementById("m4").value = rowIdArray['Length'];
                document.getElementById("m5").value = rowIdArray['Height'];
                document.getElementById("m6").value = rowIdArray['Width'];
                document.getElementById("m7").value = rowIdArray['Processor Type'];
                document.getElementById("m8").value = rowIdArray['RAM Size'];
                document.getElementById("m9").value = rowIdArray['CPU Cores'];
                document.getElementById("m10").value = rowIdArray['Hard Disk Size'];
                document.getElementById("m11").value = rowIdArray['weight'];
                document.getElementById("hiddenId").value = document.getElementById(id).value;

                $("#myModal").modal()
            }
        });


</script>
@endsection
