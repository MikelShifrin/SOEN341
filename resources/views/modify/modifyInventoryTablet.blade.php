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
        foreach ($ret as $tablet) {
            print "<tr>";
            print "<td scope='row'>$i</td>";
            print "<td><input type ='radio' name ='radio'
            value ='".$tablet->getElectronicsId()."' id='".$i."'
//            data-toggle='modal' data-id='".$i."' data-target='#myModal'
            /></td>";
            print "<td>".$tablet->getBrandName()."</td>";
            echo "<td>".$tablet->getModelNumber()."</td>";
            echo "<td>".$tablet->getPrice()."</td>";
            echo "<td>".$tablet->getProcessorType()."</td>";
            echo "<td>".$tablet->getRamSize()."</td>";
            echo "<td>".$tablet->getNumberOfCpuCores()."</td>";
            echo "<td>".$tablet->getHardDiskSize()."</td>";
            echo "<td>".$tablet->getOperatingSystem()."</td>";
            echo "<td>".$tablet->getDisplaySize()."</td>";
            echo "<td>".$tablet->getBatteryInfo()."</td>";
            echo "<td>".$tablet->getCameraInfo()."</td>";
            echo "<td>".$tablet->getLength()."</td>";
            echo "<td>".$tablet->getHeight()."</td>";
            echo "<td>".$tablet->getWidth()."</td>";
            echo "<td>".$tablet->getWeight()."</td>";
           
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
                    <input type="text" name="brand" class="form-control" id="m1" style="width: 65%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m2">Model Number</label>
                    <input type="text" name="modelNumber" class="form-control" id="m2"  style="width: 65%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m3">Price</label>
                    <input type="number" name="price" class="form-control" id="m3"  style="width: 65%;float: right" placeholder="">
                </div>

                <div class="form-group">
                <label for="m4">Processor Type</label>
                <input type="text" name="processorType" class="form-control" id="m4"  style="width: 65%;float: right" placeholder="">
            </div>

                <div class="form-group">
                    <label for="m5">Ram Size</label>
                    <input type="text" name="ramSize" class="form-control" id="m5"  style="width: 65%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m6">Cpu Cores</label>
                     <input type="text" name="cpuCores" class="form-control" id="m6"  style="width: 65%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m7">Hard Disk Size</label>
                    <input type="text" name="hardDiskSize" class="form-control" id="m7"  style="width: 65%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m8">Operating System </label>
                <input type="text" class="form-control" name="operatingSystem" id="m8"  style="width: 65%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m9">Display Size</label>
                    <input type="number" name="displaySize" class="form-control" id="m9"  style="width: 65%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m10">Battery Info</label>
                    <input type="number" name="batteryInfo" class="form-control" id="m10"  style="width: 65%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m11">Camer Info</label>
                    <input type="number" name="cameraInfo" class="form-control" id="m11"  style="width: 65%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m11">Length</label>
                    <input type="number" name="length" class="form-control" id="m12"  style="width: 65%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m11">Height</label>
                    <input type="number" name="height" class="form-control" id="m13"  style="width: 65%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m11">Width</label>
                    <input type="number" name="width" class="form-control" id="m14"  style="width: 65%;float: right" placeholder="">
                </div>

                <div class="form-group">
                    <label for="m11">Weight</label>
                    <input type="number" name="weight" class="form-control" id="m15"  style="width: 65%;float: right" placeholder="">
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
                document.getElementById("m5").value = rowIdArray['RAM Size'];
                document.getElementById("m6").value = rowIdArray['CPU Cores'];
                document.getElementById("m7").value = rowIdArray['Hard Disk Size'];
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
