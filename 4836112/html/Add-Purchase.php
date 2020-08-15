<!-- php file for add Purchase -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zealaqua";
$dbh = new PDO('mysql:dbname=' . $dbname . ';host=' . $servername . ";port=3306", $username, $password);
$conn = mysqli_connect('localhost', 'root', '', 'zealaqua');
session_start();
//$admin=$_SESSION['admin'];
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


if (!$conn) {
    echo "Not Connected to server";
}
if (!mysqli_select_db($conn, 'zealaqua')) {
    echo "Database not selected";
}
if (isset($_POST['info'])) {

    $bookName = $_POST['bookName'];
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $farmerName = $_POST['farmerName'];
    $agent = $_POST['agent'];
    $vNo = $_POST['vNo'];
    $challanNo = $_POST['challanNo'];
    $vehicleNo = $_POST['vehicleNo'];
    $driver = $_POST['driver'];
    $lotNo = $_POST['lotNo'];
    $supervisorName = $_POST['supervisorName'];
    $manager = $_POST['manager'];


    $sql = "INSERT INTO purchasedetail (bookName,date1,date2,farmerName,agent,lotNo,vNo,challanNo,vehicleNo,driver,supervisorName,manager)
            VALUES ('$bookName','$date1','$date2','$farmerName','$agent','$lotNo','$vNo','$challanNo','$vehicleNo','$driver','$supervisorName','$manager')";

    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo '<script>alert("Details inserted")</script>';

    } else {
        echo '<script>alert("Details has not been inserted")</script>';
    }


}
if (isset($_POST['detail'])) {

    $lotno = $_POST['lotno'];
    $pounds = $_POST['pounds'];
    $itemName = $_POST['itemName'];
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


    $sql = "INSERT INTO purchase_info (lotNo,pounds,itemName,counts,soft,softQty,hard,hardQty,amount,rate,grade,ifqvariety,qty)
            VALUES ('$lotno','$pounds','$itemName','$counts','$soft','$softQty','$hard','$hardQty','$amount','$rate','$grade',
            '$ifqvariety','$qty')";

    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo '<script>alert("Details inserted")</script>';

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}


?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr" xmlns="http://www.w3.org/1999/html">
<!-- BEGIN: Head-->


<head>
    <title> Purchase </title>
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
                        <h2 class="content-header-title float-left mb-0">Add Purchase</h2>
                    </div>

                </div>


            </div>
        </div>

        <div class="col-12 col-lg-12 col-md-12 col-sm-12">

            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 ">
                    <div class="fonticon-wraps">

                        <button type="submit" name="partyInfo" onclick="showInfo()"
                                style="margin-bottom: 15px;margin-left: 15px"
                                class="btn btn-primary btn-print mb-10 mb-md-10 col-lg-2 col-md-4 col-sm-6 float-left">

                            Party Info

                        </button>
                    </div>
                    <div class="fonticon-wrap">
                        <button type="submit" name="purchaseDetails" onclick="showDetail()"
                                style="margin-bottom: 15px;margin-left: 15px"
                                class="btn btn-primary btn-print mb-10 mb-md-10 col-lg-2 col-md-4 col-sm-6 float-left">

                            Purchase Details

                        </button>
                    </div>

                </div>
            </div>
        </div>


        <section id="multiple-column-form">
            <form class="form" method="POST">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card" id="info" style="display: none;">
                            <script>

                                function showInfo() {
                                    var x = document.getElementById('info');
                                    var y = document.getElementById('detail');
                                    if (x.style.display === "none") {
                                        x.style.display = "block";
                                        y.style.display = "none";
                                    } else {
                                        x.style.display = "none";
                                    }

                                }
                            </script>
                            <div class="card-header">
                                <h4 class="card-title">Party Info</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Book Name</fieldset>
                                                    <select class="form-control" name="bookName">
                                                        <option selected disabled value="">--- Select ---</option>
                                                        <?php
                                                        $sql = $dbh->prepare("SELECT bookName FROM info");
                                                        $sql->execute();
                                                        while ($r = $sql->fetch()) { ?>
                                                            <option value="<?php echo $r['bookName']; ?>"><?php echo $r['bookName']; ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                    <!--                                                    <label for="first-name-column">Serial No.</label>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>VNo</fieldset>
                                                    <input type="text" id="last-name-column" class="form-control"
                                                           placeholder="Vno." name="vNo">
                                                    <!--                                                    <label for="last-name-column">Plot No.</label>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Date1</fieldset>
                                                    <input type="date" id="city-column" class="form-control pickadate"
                                                           placeholder="mm-dd-yy" name="date1">
                                                    <!--                                                    <label for="city-column">Date</label>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Challan No</fieldset>
                                                    <input type="text" id="last-name-column" class="form-control"
                                                           placeholder="challanNo" name="challanNo">
                                                    <!--                                                    <label for="last-name-column">Plot No.</label>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Date</fieldset>
                                                    <input type="date" id="city-column" class="form-control pickadate"
                                                           placeholder="mm-dd-yy" name="date2">
                                                    <!--                                                    <label for="city-column">Date</label>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Vehicle No</fieldset>
                                                    <input type="text" id="email-id-column" class="form-control"
                                                           name="vehicleNo" placeholder="vehicleNo">
                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Farmer Name</fieldset>
                                                    <input type="text" id="email-id-column" class="form-control"
                                                           name="farmerName" placeholder="farmerName">
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Agent</fieldset>
                                                    <input type="text" id="email-id-column" class="form-control"
                                                           name="agent" placeholder="agent">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Driver</fieldset>
                                                    <input type="text" id="email-id-column" class="form-control"
                                                           name="driver" placeholder="driver">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Supervisor Name</fieldset>
                                                    <input type="text" id="company-column" class="form-control"
                                                           name="supervisorName" placeholder="Supervisor Name">
                                                    <!--                                                    <label for="company-column">Palce</label>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Manager Name</fieldset>
                                                    <input type="text" id="email-id-column" class="form-control"
                                                           name="manager" placeholder="Manager Name">
                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Lot No.</fieldset>

                                                    <input type="text" id="lot" class="form-control" name="lotNo"
                                                           placeholder="Lot No">

                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div style="text-align: center;">
                                                    <button type="submit" name="info" class="btn btn-primary mr-1 mb-1">
                                                        Submit
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
            </form>
        </section>

        <section id="multiple-column-form">
            <form class="form" method="POST">
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'zealaqua');
                $sql = "SELECT lotNo from purchasedetail ORDER BY p_id DESC LIMIT 1";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card" id="detail" style="display: none">
                            <script>

                                function showDetail() {
                                    var x = document.getElementById('info');
                                    var y = document.getElementById('detail');
                                    if (y.style.display === "none") {
                                        y.style.display = "block";
                                        x.style.display = "none";
                                    } else {
                                        y.style.display = "none";
                                    }


                                }
                            </script>
                            <div class="card-header">
                                <h4 class="card-title">Purchase Details</h4>
                            </div>
                            <section id="add-row">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card" id="input">

                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Lot No.</fieldset>
                                                                    <input type="text" id="lotno" class="form-control"
                                                                           name="lotno"
                                                                           value="<?php echo $row['lotNo'] ?>">
                                                                    <!--                                                    <label for="last-name-column">Plot No.</label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Pounds</fieldset>
                                                                    <select class="form-control" name="pounds">
                                                                        <option selected disabled value="">--- Select
                                                                            ---
                                                                        </option>
                                                                        <option>A</option>
                                                                        <option>B</option>
                                                                        <option>C</option>
                                                                    </select>
                                                                    <!--                                                    <label for="first-name-column">Serial No.</label>-->
                                                                </div>
                                                            </div>
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
                                                                    <select class="form-control" name="grade"
                                                                            id="grade">
                                                                        <option selected disabled value="">--- Select
                                                                            ---
                                                                        </option>
                                                                        <?php
                                                                        $sql = $dbh->prepare("SELECT grade FROM grade");
                                                                        $sql->execute();
                                                                        while ($r = $sql->fetch()) { ?>
                                                                            <option value="<?php echo $r['grade']; ?>"><?php echo $r['grade']; ?></option>
                                                                        <?php }
                                                                        ?>
                                                                    </select>
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>IFQ Variety</fieldset>
                                                                    <select class="form-control" name="ifqvariety"
                                                                            id="ifqvariety">
                                                                        <option selected disabled value="">--- Select
                                                                            ---
                                                                        </option>
                                                                        <?php
                                                                        $sql = $dbh->prepare("SELECT variety FROM variety");
                                                                        $sql->execute();
                                                                        while ($r = $sql->fetch()) { ?>
                                                                            <option value="<?php echo $r['variety']; ?>"><?php echo $r['variety']; ?></option>
                                                                        <?php }
                                                                        ?>
                                                                    </select>
                                                                    <!--                                                    <label for="email-id-column">Vehicle No.</label>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-label-group">
                                                                    <fieldset>Qty(kg)</fieldset>
                                                                    <input type="text" id="Qty" class="form-control"
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

                                                            <?php
                                                            }
                                                            ?>
                                                            <div class="col-12">
                                                                <div style="text-align: center;">
                                                                    <button type="submit" name="detail"
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
            </form>
        </section>


    </div>
</div>
<!-- END: Content-->
<!---->
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>


<?php include_once('Footer.php'); ?>

</body>
<!-- END: Body-->


</html>

