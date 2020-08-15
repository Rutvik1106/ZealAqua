<?php
include_once ('Head.php');
session_start();
?>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="zealaqua";
$dbh=new PDO('mysql:dbname='.$dbname.';host='.$servername.";port=3306",$username, $password);
$conn=OpenCon();
if(!$dbh){
    echo "Not Connected to server";
}
?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <?php include_once ('Head.php'); ?>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Header-->
<?php include_once 'Leftmenu.php'?>
<?php include_once 'Topnavbar.php'?>
<!-- END: Header-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Report</h2>
                    </div>
                </div>
            </div>
        </div>

        <form class="form" method="POST">
            <section id="multiple-column-form">
                <div class="col-md-6 col-12">
                    <div class="form-label-group">
                        <fieldset>Lot No.</fieldset>
                        <select class="form-control" name="view_lot" id="view_lot">
                            <option selected disabled value="">--- Select ---</option>
                            <?php
                            $sql = $dbh->prepare("SELECT lotNo FROM purchasedetail ORDER BY p_id DESC");
                            $sql->execute();
                            while ($r = $sql->fetch()) { ?>
                                <option value="<?php echo $r['lotNo']; ?>"><?php echo $r['lotNo']; ?></option>
                            <?php   }
                            ?>
                        </select>
                    </div>
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    </div>
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        <div type="submit" name="preproc_in" id="preproc_in" class="btn btn-primary btn-print mb-10 mb-md-10 " style="right:0px;color:white;margin-bottom: 10px">Pre-Processing<br>Inward</div>
                        <div type="submit" name="preproc_out" id="preproc_out" class="btn btn-primary btn-print mb-10 mb-md-10 " style="right:0px;color:white;margin-bottom: 10px;margin-left: 60px">Pre-Processing<br>Outward</div>

                    </div>
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    </div>
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        <div type="submit" name="soack" id="soack" class="btn btn-primary btn-print mb-10 mb-md-10 " style="color:white;margin-bottom: 10px">Soacking</div>
                        <div type="submit" id="purchase" name="purchase" class="btn btn-primary btn-print mb-10 mb-md-10 " style="right:0px;color:white;margin-bottom: 10px;margin-left: 100px">Purchase Details</div>

                    </div>
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        <div type="submit" name="pack" id="pack" class="btn btn-primary btn-print mb-10 mb-md-10 " style="right:0px;color:white;margin-bottom: 10px">Packing</div>
                        <div type="submit" name="repack" id="repack" class="btn btn-primary btn-print mb-10 mb-md-10 " style="right:0px;color:white;margin-left: 106px">Re-Packing</div>

                    </div>
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    </div>
                </div>


            </section>
        </form>

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card" id="purchaseid" style="display: none" >
                        <div class="card-header">
                            <h4 class="card-title center">Purchase Report</h4>
                        </div>

                        <section id="add-row">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card" id="input">
                                        <div class="card-content" >
                                            <div class="card-body">
                                                <div class="table-responsive" >
                                                    <table class="table add-rows" id="add-table">
                                                        <tr>
                                                            <th>Lot No</th>
                                                            <th>Date</th>
                                                            <th>Farmer</th>
                                                            <th>Vehicle No</th>
                                                            <th>Count</th>
                                                            <th>Quantity</th>
                                                        </tr>
                                                        <?php

                                                        if(isset($_POST["purchase"]))
                                                        {
                                                            $value6=$_POST['view_lot'];
                                                            $query6= "SELECT pd.*,p.* from purchasedetail pd JOIN purchase_info p ON pd.lotNo=p.lotNo where pd.lotNo like '%$value6%' or pd.farmerName like '%$value6%' or
                                                                 pd.date1 like '%$value6%' or pd.vehicleNo like '%$value6%' or p.counts like '%$value6%' ";

                                                            $result6=mysqli_query($conn,$query6);
                                                            while($row=mysqli_fetch_array($result6))
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <td id="lotNo"><?php echo $row["lotNo"] ?></td>
                                                                    <td id="date1"><?php echo $row["date1"] ?></td>
                                                                    <td id="farmerName"><?php echo $row["farmerName"] ?></td>
                                                                    <td id="vehicleNo"><?php echo $row["vehicleNo"] ?></td>
                                                                    <td id="counts"><?php echo $row["counts"] ?></td>
                                                                    <td id="qty"><?php echo $row["qty"] ?></td>
                                                                </tr>
                                                            <?php  }}
                                                        ?>

                                                        <tbody id="tbody"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <!--Pre-process in report -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card" id="prein" style="display: none" >
                        <div class="card-header">
                            <h4 class="card-title center">Pre-Process Inward Report</h4>
                        </div>

                        <section id="add-row">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card" id="input2">
                                        <div class="card-content" >
                                            <div class="card-body">
                                                <div class="table-responsive" >
                                                    <table class="table add-rows" id="add-table">
                                                        <tr>
                                                            <th>Sr No</th>
                                                            <th>Lot No</th>
                                                            <th>Item Name</th>
                                                            <th>Grade</th>
                                                            <th>Variety</th>
                                                            <th>Quantity</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                        <?php

                                                        if(isset($_POST["preproc_in"]))
                                                        {
                                                            $value2=$_POST['view_lot'];
                                                            $query2= "SELECT * from pre_process_in where lotno like '%$value2%' or ifqVariety like '%$value2%' or itemName like '%$value2%' ";


                                                            //echo "$query6";
                                                            $result2=mysqli_query($conn,$query2);
                                                            while($row=mysqli_fetch_array($result2))
                                                            {

                                                                ?>

                                                                <tr>
                                                                    <td><?php echo $row["srno"] ?></td>
                                                                    <td><?php echo $row["lotno"] ?></td>
                                                                    <td><?php echo $row["itemName"] ?></td>
                                                                    <td><?php echo $row["grade"] ?></td>
                                                                    <td><?php echo $row["ifqVariety"] ?></td>
                                                                    <td><?php echo $row["qty"] ?></td>
                                                                    <td><?php echo $row["amount"] ?></td>
                                                                </tr>
                                                            <?php  }}
                                                        ?>

                                                        <tbody id="tbody"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <!--Preprocee out report -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card" id="preout" style="display: none">
                        <div class="card-header">
                            <h4 class="card-title center">Pre-Process Out Report</h4>
                        </div>

                        <section id="add-row">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card" id="input3">
                                        <div class="card-content" >
                                            <div class="card-body">
                                                <div class="table-responsive" >
                                                    <table class="table add-rows" id="add-table">
                                                        <tr>
                                                            <th>Sr No</th>
                                                            <th>Lot No</th>
                                                            <th>Item Name</th>
                                                            <th>Grade</th>
                                                            <th>Variety</th>
                                                            <th>Quantity</th>
                                                            <th>Waste Quantity</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                        <?php

                                                        if(isset($_POST["preproc_out"]))
                                                        {
                                                            $value3=$_POST['view_lot'];
                                                            $query3= "SELECT * from pre_process_out where lotno like '%$value3%' or ifqVariety like '%$value3%'  or itemName like '%$value3%' ";


                                                            //echo "$query3";
                                                            $result3=mysqli_query($conn,$query3);
                                                            while($row=mysqli_fetch_array($result3))
                                                            {

                                                                ?>

                                                                <tr>
                                                                    <td><?php echo $row["srno"] ?></td>
                                                                    <td><?php echo $row["lotno"] ?></td>
                                                                    <td><?php echo $row["itemName"] ?></td>
                                                                    <td><?php echo $row["grade"] ?></td>
                                                                    <td><?php echo $row["ifqVariety"] ?></td>
                                                                    <td><?php echo $row["qty"] ?></td>
                                                                    <td><?php echo $row["wasteqty"] ?></td>
                                                                    <td><?php echo $row["amount"] ?></td>
                                                                </tr>
                                                            <?php  }}
                                                        ?>

                                                        <tbody id="tbody"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <!--Soacking report -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card" id="soackid" style="display: none">
                        <div class="card-header">
                            <h4 class="card-title center">Soacking Report</h4>
                        </div>

                        <section id="add-row">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card" id="input4">
                                        <div class="card-content" >
                                            <div class="card-body">
                                                <div class="table-responsive" >
                                                    <table class="table add-rows" id="add-table">
                                                        <tr>
                                                            <th>Sr No</th>
                                                            <th>Lot No</th>
                                                            <th>Variety</th>
                                                            <th>Grade</th>
                                                            <th>Quantity</th>
                                                            <th>Waste Quantity</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                        <?php

                                                        if(isset($_POST["soack"]))
                                                        {
                                                            $value1=$_POST['view_lot'];
                                                            $query1= "SELECT * FROM soack where lotno like '%$value1%' or ifqvariety like '%$value1%' ";


                                                            //echo "$query1";
                                                            $result1=mysqli_query($conn,$query1);
                                                            while($row=mysqli_fetch_array($result1))
                                                            {

                                                                ?>

                                                                <tr>
                                                                    <td><?php echo $row["srno"] ?></td>
                                                                    <td><?php echo $row["lotno"] ?></td>
                                                                    <td><?php echo $row["ifqvariety"] ?></td>
                                                                    <td><?php echo $row["grade"] ?></td>
                                                                    <td><?php echo $row["qty"] ?></td>
                                                                    <td><?php echo $row["wasteqty"] ?></td>
                                                                    <td><?php echo $row["amount"] ?></td>
                                                                </tr>
                                                            <?php  }}
                                                        ?>

                                                        <tbody id="tbody"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <!--Packing report -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card" id="packid" style="display: none">
                        <div class="card-header">
                            <h4 class="card-title center">Packing Report</h4>
                        </div>

                        <section id="add-row">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card" id="input5">
                                        <div class="card-content" >
                                            <div class="card-body">
                                                <div class="table-responsive" >
                                                    <table class="table add-rows" id="add-table">
                                                        <tr>
                                                            <th>Sr No</th>
                                                            <th>Date</th>
                                                            <th>Lot No</th>
                                                            <th>Variety</th>
                                                            <th>Grade</th>
                                                            <th>Net KG</th>
                                                            <th>Frozen KG</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                        <?php

                                                        if(isset($_POST["pack"]))
                                                        {
                                                            $value4=$_POST['view_lot'];
                                                            $query4= " SELECT * from pack where lotno like '%$value4%' or variety like '%$value4%'  or lotdate like '%$value4%' ";


                                                            //echo "$query4";
                                                            $result4=mysqli_query($conn,$query4);
                                                            while($row=mysqli_fetch_array($result4))
                                                            {

                                                                ?>

                                                                <tr>
                                                                    <td><?php echo $row["srno"] ?></td>
                                                                    <td><?php echo $row["lotdate"] ?></td>
                                                                    <td><?php echo $row["lotno"] ?></td>
                                                                    <td><?php echo $row["varitey"] ?></td>
                                                                    <td><?php echo $row["grade"] ?></td>
                                                                    <td><?php echo $row["netkg"] ?></td>
                                                                    <td><?php echo $row["frozenkg"] ?></td>
                                                                    <td><?php echo $row["amount"] ?></td>
                                                                </tr>
                                                            <?php  }}
                                                        ?>

                                                        <tbody id="tbody"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <!--Repacking report -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card" id="repackid" style="display: none">
                        <div class="card-header">
                            <h4 class="card-title center">Re-Packing Report</h4>
                        </div>

                        <section id="add-row">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card" id="input6">
                                        <div class="card-content" >
                                            <div class="card-body">
                                                <div class="table-responsive" >
                                                    <table class="table add-rows" id="add-table">
                                                        <tr>
                                                            <th>Sr No</th>
                                                            <th>Date</th>
                                                            <th>Lot No</th>
                                                            <th>Variety</th>
                                                            <th>Grade</th>
                                                            <th>Brand</th>
                                                            <th>Glaze</th>
                                                            <th>Slab</th>
                                                            <th>Net KG</th>
                                                            <th>Frozen KG</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                        <?php

                                                        if(isset($_POST["repack"]))
                                                        {
                                                            $value5=$_POST['view_lot'];
                                                            $query5= "SELECT * from repack where lotno like '%$value5%' or varitey like '%$value5%'  or lotdate like '%$value5%' or brandco like '%$value5%' ";


                                                            //echo "$query5";
                                                            $result5=mysqli_query($conn,$query5);
                                                            while($row=mysqli_fetch_array($result5))
                                                            {

                                                                ?>

                                                                <tr>
                                                                    <td><?php echo $row["srno"] ?></td>
                                                                    <td><?php echo $row["lotdate"] ?></td>
                                                                    <td><?php echo $row["lotno"] ?></td>
                                                                    <td><?php echo $row["varitey"] ?></td>
                                                                    <td><?php echo $row["grade"] ?></td>
                                                                    <td><?php echo $row["brandco"] ?></td>
                                                                    <td><?php echo $row["glaze"] ?></td>
                                                                    <td><?php echo $row["slab"] ?></td>
                                                                    <td><?php echo $row["netkg"] ?></td>
                                                                    <td><?php echo $row["frozenkg"] ?></td>
                                                                    <td><?php echo $row["amount"] ?></td>
                                                                </tr>
                                                            <?php  }}
                                                        ?>

                                                        <tbody id="tbody"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>


<!-- BEGIN: Vendor JS-->

<!-- END: Page JS-->

</body>
<!-- END: Body-->



</html>
<?php
include_once ('Footer.php');
?>
<script>
    //purchase
    $(document).ready(function () {
        $('#purchase').on('click',function () {
            $('#purchaseid').css({"display":"block"});
            $('#prein').css({"display":"none"});
            $('#preout').css({"display":"none"});
            $('#soackid').css({"display":"none"});
            $('#packid').css({"display":"none"});
            $('#repackid').css({"display":"none"});

            var lt6=$('#view_lot').val();
            alert(lt6);
            $.ajax({
                type:'POST',
                url:'reportData.php',
                dataType:'JSON',
                data:{l_t6:lt6},

                success:function(data){
                    alert('Receive');
                    if(data.status == 'ok'){
                        $('#lotNo').val(data.result.lotNo);
                        $('#date1').val(data.result.date1);
                        $('#farmerName').val(data.result.farmerName);
                        $('#vehicleNo').val(data.result.vehicleNo);
                        $('#counts').val(data.result.counts);
                        $('#qty').val(data.result.qty);

                    }else{
                        alert("Lot Number Not Found....");
                    }
                }
            });
        });
    });
    //preprocess in
    $(document).ready(function () {
        $('#preproc_in').on('click',function () {
            $('#prein').css({"display":"block"});
            $('#purchaseid').css({"display":"none"});
            $('#preout').css({"display":"none"});
            $('#soackid').css({"display":"none"});
            $('#packid').css({"display":"none"});
            $('#repackid').css({"display":"none"});
            var lt2=$('#view_lot').val();
            $.ajax({
                type:'POST',
                url:'reportData.php',
                dataType:'JSON',
                data:{l_t2:lt2},
                success:function(data){
                    if(data.status == 'ok'){



                    }else{
                        alert("Lot Number Not Found....");
                    }
                }
            });
        });
    });
    //preproess out
    $(document).ready(function () {
        $('#preproc_out').on('click',function () {
            $('#preout').css({"display":"block"});
            $('#prein').css({"display":"none"});
            $('#purchaseid').css({"display":"none"});
            $('#soackid').css({"display":"none"});
            $('#packid').css({"display":"none"});
            $('#repackid').css({"display":"none"});
            var lt3=$('#view_lot').val();
            $.ajax({
                type:'POST',
                url:'reportData.php',
                dataType:'JSON',
                data:{l_t3:lt3},
                success:function(data){
                    if(data.status == 'ok'){



                    }else{
                        alert("Lot Number Not Found....");
                    }
                }
            });
        });
    });
    //soacking
    $(document).ready(function () {
        $('#soack').on('click',function () {
            $('#soackid').css({"display":"block"});
            $('#prein').css({"display":"none"});
            $('#preout').css({"display":"none"});
            $('#purchaseid').css({"display":"none"});
            $('#packid').css({"display":"none"});
            $('#repackid').css({"display":"none"});
            var lt1=$('#view_lot').val();
            $.ajax({
                type:'POST',
                url:'reportData.php',
                dataType:'JSON',
                data:{l_t1:lt1},
                success:function(data){
                    if(data.status == 'ok'){



                    }else{
                        alert("Lot Number Not Found....");
                    }
                }
            });
        });
    });
    //packing
    $(document).ready(function () {
        $('#pack').on('click',function () {
            $('#packid').css({"display":"block"});
            $('#prein').css({"display":"none"});
            $('#preout').css({"display":"none"});
            $('#soackid').css({"display":"none"});
            $('#purchaseid').css({"display":"none"});
            $('#repackid').css({"display":"none"});
            var lt4=$('#view_lot').val();
            $.ajax({
                type:'POST',
                url:'reportData.php',
                dataType:'JSON',
                data:{l_t4:lt4},
                success:function(data){
                    if(data.status == 'ok'){



                    }else{
                        alert("Lot Number Not Found....");
                    }
                }
            });
        });
    });

    //repacking
    $(document).ready(function () {
        $('#repack').on('click',function () {
            $('#repackid').css({"display":"block"});
            $('#prein').css({"display":"none"});
            $('#preout').css({"display":"none"});
            $('#soackid').css({"display":"none"});
            $('#packid').css({"display":"none"});
            $('#purchaseid').css({"display":"none"});
            var lt5=$('#view_lot').val();
            $.ajax({
                type:'POST',
                url:'reportData.php',
                dataType:'JSON',
                data:{l_t5:lt5},
                success:function(data){
                    if(data.status == 'ok'){



                    }else{
                        alert("Lot Number Not Found....");
                    }
                }
            });
        });
    });

</script>