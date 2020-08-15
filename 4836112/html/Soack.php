<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zealaqua";
$pdo = new PDO('mysql:dbname=' . $dbname . ';host=' . $servername . ";port=3306", $username, $password);
if (!$pdo) {
    echo "<script>alert('Not Connected to server');</script>";
}
//$admin=$_SESSION['admin'];
if (isset($_SESSION['loggedinclient']) && $_SESSION['loggedinclient'] === true) {
    $module = $_SESSION['client_role'];
    if ($module === "Soacking" or $module === "Admin") {

    } else {
        echo "<script>
  alert('Unauthorized Access:)');
window.location.href='dashboard.php';
</script>";
    }
} else {
    echo "<script>
  alert('Please login:)');
window.location.href='CustomerLogin.php';
</script>";
}


?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr" xmlns="http://www.w3.org/1999/html">
<!-- BEGIN: Head-->


<head>
    <title> Soaking </title>
    <?php include_once('Head.php'); ?>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">
<?php include_once('Topnavbar.php'); ?>
<?php include_once('Leftmenu.php'); ?>

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Soack</h2>
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
                            $sql = $pdo->prepare("SELECT lotNo FROM purchasedetail ORDER BY p_id DESC");
                            $sql->execute();
                            while ($r = $sql->fetch()) { ?>
                                <option value="<?php echo $r['lotNo']; ?>"><?php echo $r['lotNo']; ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div type="button" id="view" name="view" class="btn btn-primary mr-1 mb-1"
                     style="right:0px;color:white;">View
                </div>
            </section>
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card" id="viewDetails" style="display: none">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Book Name</fieldset>
                                                    <input type="text" id="bookName" name="bookName" readonly
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>VNo</fieldset>
                                                    <input type="text" id="vNo" readonly class="form-control"
                                                           name="vNo">
                                                    <!--                                                    <label for="last-name-column">Plot No.</label>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Date</fieldset>
                                                    <input type="date" id="date1" readonly class="form-control"
                                                           name="date1">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Challan No</fieldset>
                                                    <input type="text" id="challanNo" readonly class="form-control"
                                                           name="challanNo">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Date</fieldset>
                                                    <input type="date" id="date2" readonly class="form-control"
                                                           name="date2">
                                                 </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>A/c Name</fieldset>
                                                    <select class="form-control" name="acName">
                                                        <option selected disabled value="">--- Select ---</option>
                                                        <option>abc</option>
                                                        <option>pqr</option>
                                                        <option>xyz</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Agent</fieldset>
                                                    <input type="text" id="agent" readonly class="form-control"
                                                           name="agent">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>(%)</fieldset>
                                                    <input type="text" id="email-id-column" class="form-control"
                                                           name="percentage" placeholder="%">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Lot No.</fieldset>
                                                    <input type="text" id="lotNo" class="form-control" name="lotNo"
                                                           readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="button_Id" style="display: none">


                            <div type="button" id="detailsIn" name="detailsIn" class="btn btn-primary mr-1 mb-1"
                                 style="right:-20px;color:white;">Details In
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card" id="info" style="display: none">
                            <div class="card-header">
                                <h4 class="card-title">Details In</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">

                                                    <fieldset>LotNo</fieldset>
                                                    <input type="text" id="TdLotNo" class="form-control"
                                                           placeholder="LotNo" name="TdLotNo">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>IFQ Variety</fieldset>
                                                    <select class="form-control" name="ifqvariety" id="ifqvariety">
                                                        <?php
                                                        $sql = $pdo->prepare("SELECT ifqVariety FROM `pre_process_out` GROUP BY ifqVariety;");
                                                        $sql->execute();
                                                        while ($r = $sql->fetch()) { ?>
                                                            <option><?php echo $r['ifqVariety']; ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Grade</fieldset>
                                                    <select class="form-control" name="grade" id="grade">
                                                        <?php
                                                        $sql = $pdo->prepare("SELECT grade FROM `pre_process_out` GROUP BY grade;");
                                                        $sql->execute();
                                                        while ($r = $sql->fetch()) { ?>
                                                            <option><?php echo $r['grade']; ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Proc. Qty(kg)</fieldset>
                                                    <input type="text" id="procqty"
                                                           class="form-control" placeholder="Proc. (kg)"
                                                           name="procqty" id="procqty">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Qty(kg)</fieldset>
                                                    <input type="text" id="qty"
                                                           class="form-control" placeholder="Qty(kg)" name="qty"
                                                           id="qty">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Waste Qty(kg)</fieldset>
                                                    <input type="text" id="wasteqty"
                                                           class="form-control" placeholder="wasteQty(kg)"
                                                           name="wasteqty">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Rate</fieldset>
                                                    <input type="text" id="Rate"
                                                           class="form-control" placeholder="Rate" name="Rate">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Amount</fieldset>
                                                    <input type="text" id="Amount"
                                                           class="form-control" placeholder="Amount" name="Amount">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Narration</fieldset>
                                                    <input type="text" id="narration"
                                                           class="form-control" placeholder="Narration"
                                                           name="narration">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Out Grade</fieldset>
                                                    <select class="form-control" name="outgrade">
                                                        <option selected disabled id="outgrade">-----Select
                                                            Option-----
                                                        </option>
                                                        <option>1015</option>
                                                        <option>1115</option>
                                                        <option>1215</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Out Qty(kg)</fieldset>
                                                    <input type="text" id="outqty"
                                                           class="form-control" placeholder="Out Qty(kg)" name="outqty">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div style="text-align: center;">
                                                    <button type="submit" name="submit"
                                                            class="btn btn-primary mr-1 mb-1">Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>


<?php include_once('Footer.php'); ?>
</body>
<!-- END: Body-->


</html>
<?php
if(isset($_POST['submit'])){
    $lot=$_POST['TdLotNo'];
    $qty=$_POST['qty'];
    $wqty=$_POST['wasteqty'];
    $ifqvariety=$_POST['ifqvariety'];
    $rate=$_POST['Rate'];
    $amount=$_POST['Amount'];
    $narration=$_POST['narration'];
    $outgrade=$_POST['outgrade'];
    $outqty=$_POST['outqty'];
    $pound=$_POST['pounds'];
    $grade=$_POST['grade'];
    $procqty=$_POST['procqty'];

    $query = $pdo->prepare("SELECT * FROM `soack` WHERE pound='$pound' AND lotno='$lot'");
    $query->execute();
    if($query->rowCount() > 0){
        echo "<script>alert('This Pound is Already Exist for This Lot Number')</script>";
    }else{
        $sql="INSERT INTO `soack`( `pound`,`lotno`,`qty`, `ifqvariety`,`wasteQty`, `rate`, `amount`,`grade`, `narration`, `outgrade`, `outqty`,`procqty`) 
            VALUES ('$pound','$lot','$qty','$ifqvariety','$wqty','$rate','$amount','$grade','$narration','$outgrade','$outqty','$procqty'); ";
        $stmt=$pdo->prepare($sql);
        $stmt->execute();
        $rowcount=$stmt->rowCount();
        if($rowcount>0){
            echo "<script>alert('Data is inserted Successfully')</script>";
        }else{
            echo "<script>alert('Data is not inserted Successfully')</script>";
        }

    }

}
?>
<script>
    $(document).ready(function () {
        $('#view').on('click',function () {
            $('#viewDetails').css({"display":"none"});
            var lt=$('#view_lot').val();
            $.ajax({
                type:'POST',
                url:'getData.php',
                dataType:'JSON',
                data:{l_t:lt},
                success:function(data){
                    if(data.status == 'ok'){
                        $('#bookName').val(data.result.bookName);
                        $('#vNo').val(data.result.vNo);
                        $('#date1').val(data.result.date1);
                        $('#date2').val(data.result.date2);
                        $('#challanNo').val(data.result.challanNo);
                        $('#agent').val(data.result.agent);
                        $('#lotNo').val(data.result.lotNo);
                        $('#viewDetails').css({"display":"block"});
                        $('#button_Id').css({"display":"block"});
                    }else{
                        alert("Lot Number Not Found....");
                    }
                }
            });
        });
    });

    $(document).ready(function(){
        $('#detailsIn').on('click',function(){
            $('#info').css({"display":"none"});
            var loatno = $('#lot_no').val();
            var poundSoack=$('#pounds').val();

            $.ajax({
                type:'POST',
                url:'getData.php',
                dataType: "json",
                data:{lotNo:loatno,poundSoack:poundSoack},
                success:function(data){

                    if(data.status == 'ok'){

                        $('#TdLotNo').val(data.result.lotno);
                        $('#ifqvariety').val(data.result.ifqVariety);
                        $('#grade').val(data.result.grade);
                        $('#wasteqty').val(data.result.wasteqty);
                        $('#Rate').val(data.result.rate);
                        $('#Amount').val(data.result.amount);
                        $('#qty').val(data.result.qty);
                        $('#procqty').val(data.result.procqty);
                        $('#info').css({"display":"block"});
                    }else{
                        alert("Lot Number Not Found....");
                    }
                }
            });
        });
    });
</script>