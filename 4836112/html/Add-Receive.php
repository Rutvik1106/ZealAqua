<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zealaqua";
$dbh = new PDO('mysql:dbname=' . $dbname . ';host=' . $servername . ";port=3306", $username, $password);
$conn = mysqli_connect('localhost', 'root', '', 'zealaqua');

if (!$conn) {
    echo "Not Connected to server";
}
if (!mysqli_select_db($conn, 'zealaqua')) {
    echo "Database not selected";
}


session_start();

if (isset($_SESSION['loggedinclient']) && $_SESSION['loggedinclient'] === true) {

    $module = $_SESSION['client_role'];
//    $admin=$_SESSION['admin'];

    if ($module === "Admin" or $module === "Purchase") {

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


if (isset($_POST['update'])) {

    $bookName = $_POST['bookName'];
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $farmerName = $_POST['farmerName'];
    $agent = $_POST['agent'];
    $vNo = $_POST['vNo'];
    $challanNo = $_POST['challanNo'];
    $vehicleNo = $_POST['vehicleNo'];
    $driver = $_POST['driver'];
    $srNo = implode(",", $_POST['srNo']);
    $itemName = implode(",", $_POST['item']);
    $count = implode(",", $_POST['counts']);
    $soft = implode(",", $_POST['soft']);
    $softQty = implode(",", $_POST['softQty']);
    $hard = implode(",", $_POST['hard']);
    $hardQty = implode(",", $_POST['hardQty']);
    $supervisorName = $_POST['supervisorName'];
    $manager = $_POST['manager'];
    $id = $_POST['lotNo'];

    $sql = "UPDATE purchasedetail set bookName='$bookName',date1='$date1',date2='$date2',farmerName='$farmerName',agent='$agent',
vNo='$vNo',challanNo='$challanNo',vehicleNo='$vehicleNo',driver='$driver',srNo='$srNo',itemName='$itemName',counts='$count',soft='$soft',
softQty='$softQty',hard='$hard',hardQty='$hardQty',supervisorName='$supervisorName',manager='$manager' where lotNo='$id'";


    if (!mysqli_query($conn, $sql)) {
        echo "Not Inserted";


    } else {
        echo " Inserted";
    }
    header('location: Raw-Material.php');
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->


<head>
    <title>Receive</title>
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
                        <h2 class="content-header-title float-left mb-0">Add Receive</h2>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST">
            <section id="multiple-column-form">
                <div class="col-md-6 col-12">
                    <div class="form-label-group">
                        <fieldset>Lot No.</fieldset>

                        <input type="text" id="view_lot" class="form-control" name="view_lot" placeholder="Lot No">
                        <br>
                        <div type="button" id="view" name="view" class="btn btn-primary mr-1 mb-1"
                             style="right:0px;color:white;">View
                        </div>

                    </div>
                </div>
            </section>
            <section id="multiple-column-form">

                <div class="row match-height">
                    <div class="col-12">
                        <div class="card" id="viewDetails" style="display: none">
                            <div class="card-header">
                                <h4 class="card-title">Party Info</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!--                                <form class="form">-->
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
                                                    <fieldset>Date</fieldset>
                                                    <input type="date" id="date2" readonly class="form-control"
                                                           name="date2">
                                                    <!--                                                    <label for="city-column">Date</label>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Vehicle No</fieldset>
                                                    <input type="text" id="vehicleNo" readonly class="form-control"
                                                           name="vehicleNo">
                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Farmer Name</fieldset>
                                                    <input type="text" id="farmerName" readonly class="form-control"
                                                           name="farmerName">
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
                                                    <fieldset>Driver</fieldset>
                                                    <input type="text" id="driver" readonly class="form-control"
                                                           name="driver">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Lot No</fieldset>
                                                    <input type="text" id="lotNo" readonly class="form-control"
                                                           name="lotNo">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Supervisor Name</fieldset>
                                                    <input type="text" id="supervisorName" readonly class="form-control"
                                                           name="supervisorName" placeholder="Supervisor Name">
                                                    <!--                                                    <label for="company-column">Palce</label>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Manager Name</fieldset>
                                                    <input type="text" id="manager" readonly class="form-control"
                                                           name="manager" placeholder="Manager Name">
                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Pounds</fieldset>
                                                    <select class="form-control" name="pounds" id="pounds">
                                                        <?php
                                                        $sql = $dbh->prepare("SELECT pounds FROM `purchase_info` GROUP BY pounds;");
                                                        $sql->execute();
                                                        while ($r = $sql->fetch()) { ?>
                                                            <option><?php echo $r['pounds']; ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                    <!--                                                    <label for="first-name-column">Serial No.</label>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-label-group">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="button_Id" style="display: none">
                            <div type="button" name="receiveDetails" id="receiveDetails"
                                 class="btn btn-primary mr-1 mb-1" style="right:-40px;color:white;">Receive details
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card" id="receive" style="display: none">
                            <div class="card-header">
                                <h4 class="card-title">Receive Details</h4>
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
                                                                    <fieldset>Item Name</fieldset>
                                                                    <input type="text" id="itemName"
                                                                           class="form-control" placeholder="ItemName"
                                                                           name="itemName">
                                                                    <!--                                                    <label for="last-name-column">Plot No.</label>-->
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Counts</fieldset>
                                                                    <input type="number" id="counts"
                                                                           class="form-control" placeholder="counts"
                                                                           name="counts">
                                                                    <!--                                                    <label for="last-name-column">Plot No.</label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Soft(%)</fieldset>
                                                                    <input type="number" id="soft" class="form-control"
                                                                           name="soft" placeholder="(%)">
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Soft Qty</fieldset>
                                                                    <input type="number" id="softQty"
                                                                           class="form-control" name="softQty"
                                                                           placeholder="softQty">
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Hard(%)</fieldset>
                                                                    <input type="number" id="hard" class="form-control"
                                                                           name="hard" placeholder="(%)">
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Hard Qty</fieldset>
                                                                    <input type="number" id="hardQty"
                                                                           class="form-control" name="hardQty"
                                                                           placeholder="hardQty">
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Grade</fieldset>
                                                                    <input type="text" id="grade" class="form-control"
                                                                           name="grade" placeholder="Grade">
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>IFQ Variety</fieldset>
                                                                    <input type="text" id="ifqvariety"
                                                                           class="form-control" name="ifqvariety"
                                                                           placeholder="IFQ Variety">
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Qty(kg)</fieldset>
                                                                    <input type="text" id="qty" class="form-control"
                                                                           name="qty" placeholder="Qty(kg)">
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Amount</fieldset>
                                                                    <input type="number" id="amount"
                                                                           class="form-control" name="amount"
                                                                           placeholder="Amount">
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Rate</fieldset>
                                                                    <input type="number" id="rate" class="form-control"
                                                                           name="rate" placeholder="Rate">
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
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

<!-- END: Content-->
<?php include_once('Footer.php'); ?>
</body>
<!-- END: Body-->
</html>
<?php
if (isset($_POST['submit'])) {
    $lot = $_POST['lotNo'];
    $pound = $_POST['pounds'];
    $it = $_POST['itemName'];
    $counts = $_POST['counts'];
    $soft = $_POST['soft'];
    $softQty = $_POST['softQty'];
    $hard = $_POST['hard'];
    $hardQty = $_POST['hardQty'];
    $amount = $_POST['amount'];
    $rate = $_POST['rate'];
    $grade = $_POST['grade'];
    $ifqvariety = $_POST['ifqvariety'];
    $qty = $_POST['qty'];

    $sql = "UPDATE `purchase_info` SET `itemName`='$it',`counts`='$counts',`soft`='$soft',`softQty`='$softQty',`hard`='$hard',
    `hardQty`='$hardQty',`amount`='$amount',`rate`='$rate',`grade`='$grade',`ifqvariety`='$ifqvariety',`qty`='$qty' WHERE `lotNo`='$lot' AND`pounds`='$pound'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $rowcount = $stmt->rowCount();
    if ($rowcount > 0) {
        echo "<script>alert('You Have Updated Data Successfully')</script>";
    } else {
        echo "<script>alert('Data is Not Updated ')</script>";
    }
    $pdo = null;

}
?>

<script>
    $(document).ready(function () {
        $('#view').on('click', function () {
            $('#viewDetails').css({"display": "none"});
            var lt = $('#view_lot').val();
            $.ajax({
                type: 'POST',
                url: 'getData.php',
                dataType: 'JSON',
                data: {l_t: lt},
                success: function (data) {
                    if (data.status == 'ok') {
                        $('#bookName').val(data.result.bookName);
                        $('#vNo').val(data.result.vNo);
                        $('#date1').val(data.result.date1);
                        $('#date2').val(data.result.date2);
                        $('#challanNo').val(data.result.challanNo);
                        $('#vehicleNo').val(data.result.vehicleNo);
                        $('#farmerName').val(data.result.farmerName);
                        $('#agent').val(data.result.agent);
                        $('#driver').val(data.result.driver);
                        $('#lotNo').val(data.result.lotNo);
                        $('#supervisorName').val(data.result.supervisorName);
                        $('#manager').val(data.result.manager);
                        $('#viewDetails').css({"display": "block"});
                        $('#button_Id').css({"display": "block"});
                    } else {
                        alert("Lot Number Not Found....");
                    }
                }
            });
        });
    });

    $(document).ready(function () {
        $('#receiveDetails').on('click', function () {
            $('#receive').css({"display": "none"});
            var p = $('#pounds').val();
            var ln = $('#lotNo').val();
            $.ajax({
                type: 'POST',
                url: 'getData.php',
                dataType: 'JSON',
                data: {pound: p, lot: ln},
                success: function (dataReceive) {
                    if (dataReceive.status == 'ok') {
                        $('#itemName').val(dataReceive.result.itemName);
                        $('#counts').val(dataReceive.result.counts);
                        $('#soft').val(dataReceive.result.soft);
                        $('#softQty').val(dataReceive.result.softQty);
                        $('#hard').val(dataReceive.result.hard);
                        $('#hardQty').val(dataReceive.result.hardQty);
                        $('#amount').val(dataReceive.result.amount);
                        $('#rate').val(dataReceive.result.rate);
                        $('#grade').val(dataReceive.result.grade);
                        $('#ifqvariety').val(dataReceive.result.ifqvariety);
                        $('#qty').val(dataReceive.result.qty);
                        $('#receive').css({"display": "block"});
                    } else {
                        alert("Please Select Valid Pound.....");
                    }
                }
            });
        });
    });
</script>