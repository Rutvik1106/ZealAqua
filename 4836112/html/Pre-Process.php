<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zealaqua";
$dbh = new PDO('mysql:dbname=' . $dbname . ';host=' . $servername . ";port=3306", $username, $password);

if (!$dbh) {
    echo "Not Connected to server";
}

if (isset($_SESSION['loggedinclient']) && $_SESSION['loggedinclient'] === true) {

    $module = $_SESSION['client_role'];
//    $admin=$_SESSION['admin'];

    if ($module === "Preprocess" or $module === "Admin") {

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
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <title>Preprocessing</title>
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
                        <h2 class="content-header-title float-left mb-0">Pre-Process</h2>
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
                                                    <fieldset>Purchase Date</fieldset>
                                                    <input type="date" id="date1" readonly class="form-control"
                                                           name="date1">
                                                    <!--                                                    <label for="city-column">Date</label>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Challan No</fieldset>
                                                    <input type="text" id="challanNo" readonly class="form-control"
                                                           name="challanNo">
                                                    <!--                                                    <label for="last-name-column">Plot No.</label>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Receive Date</fieldset>
                                                    <input type="date" id="date2" readonly class="form-control"
                                                           name="date2">
                                                    <!--                                                    <label for="city-column">Date</label>-->
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
                            <div type="button" id="detailsInbutton" name="detailsInbutton"
                                 class="btn btn-primary mr-1 mb-1" style="right:-20px;color:white;">Details In
                            </div>
                            <div type="button" id="detailsOutbutton" name="detailsOutbutton"
                                 class="btn btn-primary mr-1 mb-1" style="right:-40px;color:white;">Details Out
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card" id="DetailsIn" style="display: none">
                            <div class="card-header">
                                <h4 class="card-title">Details In</h4>
                            </div>
                            <section id="add-row">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card" id="input">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table add-rows" id="add-table">
                                                            <tr>
                                                                <th size="5">Lot No</th>
                                                                <th size="5">Pound</th>
                                                                <th size="10">Variety</th>
                                                                <th size="5">Grade</th>
                                                                <th size="5">Qty</th>
                                                            </tr>
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
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card" id="Detailsout" style="display: none">
                            <div class="card-header">
                                <h4 class="card-title">Details Out</h4>
                            </div>
                            <section id="add-row">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">

                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>LotNo</fieldset>
                                                                    <input type="text" id="lotnoout"
                                                                           class="form-control" placeholder="LotNo"
                                                                           name="lotnoout">
                                                                    <!--                                                    <label for="last-name-column">Plot No.</label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Item Name</fieldset>
                                                                    <input type="text" id="itemnameout"
                                                                           class="form-control" name="itemnameout"
                                                                           placeholder="Item Name">
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Grade</fieldset>
                                                                    <input type="text" id="Gradeout"
                                                                           class="form-control" name="Gradeout"
                                                                           placeholder="Grade">
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>IFQ Variety</fieldset>
                                                                    <input type="text" id="ifqvarietyout"
                                                                           class="form-control" name="ifqvarietyout"
                                                                           placeholder="IFQ Variety">
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Qty(kg)</fieldset>
                                                                    <input type="text" id="Qtyout" class="form-control"
                                                                           name="Qtyout" placeholder="Qty(kg)">
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Waste Qty(kg)</fieldset>
                                                                    <input type="text" id="WastQtyout"
                                                                           class="form-control" name="WastQtyout"
                                                                           placeholder="Wast Qty(kg)">
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Rate</fieldset>
                                                                    <input type="text" id="Rateout" class="form-control"
                                                                           name="Rateout" placeholder="Rate">
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Amount</fieldset>
                                                                    <input type="text" id="Amountout"
                                                                           class="form-control" name="Amountout"
                                                                           placeholder="Amount">
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Narration</fieldset>
                                                                    <input type="text" id="Narrationout"
                                                                           class="form-control" name="Narrationout"
                                                                           placeholder="Narration">
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div style="text-align: right;">
                                                                    <button type="submit" name="submitout"
                                                                            id="submitout"
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
                        </div>
                    </div>
                </div>
            </section>

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
<!-- BEGIN: Vendor JS-->
<!-- END: Page JS-->
</body>
<!-- BEGIN: Vendor JS-->
<?php include_once('Footer.php'); ?>
<!-- END: Body-->
</html>
<?php

if (isset($_POST['submitout'])) {
    $lot = $_POST['lotnoout'];
    $pound = $_POST['pounds'];
    $it = $_POST['itemnameout'];
    $grade = $_POST['Gradeout'];
    $ifqvariety = $_POST['ifqvarietyout'];
    $Qty = $_POST['Qtyout'];
    $WQty = $_POST['WastQtyout'];
    $Rate = $_POST['Rateout'];
    $Amount = $_POST['Amountout'];
    $Narration = $_POST['Narrationout'];
    $sql = "INSERT INTO `pre_process_out`( `lotno`, `pounds`, `itemName`, `grade`, `ifqVariety`, `qty`, `wasteqty`, `rate`, `amount`, `narration`) VALUES ('$lot','$pound','$it','$grade','$ifqvariety','$Qty','$WQty','$Rate','$Amount','$Narration') ";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $rowcount = $stmt->rowCount();
    if ($rowcount > 0) {
        echo "<script>alert('Data is inserted Successfully')</script>";
    } else {
        echo "<script>alert('Data is not inserted Successfully')</script>";
    }
    $dbh = null;

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


    $(document).ready(function () {
        $('#detailsInbutton').on('click', function () {
            $('#DetailsIn').css({"display": "none"});
            var lot_pre = $('#view_lot').val();

            $.ajax({
                type: 'POST',
                url: 'getData.php',
                dataType: 'JSON',
                data: {lot_pre_in: lot_pre},
                success: function (dataReceive) {

                    if (dataReceive.status == 'ok') {
                        alert("Data Recieved ");
                        $('#view_lot').val(dataReceive.result.lotNo);
                        $('#pounds').val(dataReceive.result.pounds);
                        $('#Rate').val(dataReceive.result.rate);
                        $('#Amount').val(dataReceive.result.amount);
                        $('#Detailsout').css({"display": "none"});
                        $('#DetailsIn').css({"display": "block"});
                    } else {
                        alert("Either Lot or Pound is Invalid.....");
                    }
                }
            });
        });
    });

    $(document).ready(function () {
        $('#detailsOutbutton').on('click', function () {
            $('#Detailsout').css({"display": "none"});
            var lot_pre = $('#lotNo').val();
            var p = $('#pounds').val();
            alert(lot_pre);
            alert(p);
            $.ajax({
                type: 'POST',
                url: 'getData.php',
                dataType: 'JSON',
                data: {lot_pre_out: lot_pre, pound: p},
                success: function (dataReceive) {
                    alert('Receive');
                    if (dataReceive.status == 'ok') {
                        $('#lotnoout').val(dataReceive.result.lotno);
                        $('#itemnameout').val(dataReceive.result.itemName);
                        $('#Gradeout').val(dataReceive.result.grade);
                        $('#ifqvarietyout').val(dataReceive.result.ifqVariety);
                        $('#Qtyout').val(dataReceive.result.qty);
                        $('#Rateout').val(dataReceive.result.rate);
                        $('#Amountout').val(dataReceive.result.amount);
                        $('#DetailsIn').css({"display": "none"});
                        $('#Detailsout').css({"display": "block"});
                    } else {
                        alert("Either Lot or Pound is Invalid.....");
                    }
                }
            });
        });
    });
</script>