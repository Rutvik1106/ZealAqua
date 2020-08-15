<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="zealaqua";
$pdo=new PDO('mysql:dbname='.$dbname.';host='.$servername.";port=3306",$username, $password);

if(!$pdo){
    echo "<script>alert('Not Connected to server');</script>";
}
//$admin=$_SESSION['admin'];
if (isset($_SESSION['loggedinclient']) && $_SESSION['loggedinclient'] === true) {

    $module = $_SESSION['client_role'];
    if ($module === "Packing" or $module === "Admin") {

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
    <title> Packing </title>
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
                        <h2 class="content-header-title float-left mb-0">Packing</h2>
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
                                                    <fieldset>Serial No.</fieldset>
                                                    <input type="text" id="SerialNo" class="form-control"
                                                           placeholder="Serial No." name="SerialNo">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>LotNo</fieldset>
                                                    <select class="form-control" name="TdLotNo" id="TdLotNo">
                                                        <option selected disabled></option>
                                                        <option>201</option>
                                                        <option>211</option>
                                                        <option>210</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Lot Date</fieldset>
                                                    <input type="date" id="LotDate" class="form-control"
                                                           placeholder="mm-dd-yy" name="LotDate">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Grade</fieldset>
                                                    <select class="form-control" name="grade" id="grade">
                                                        <option selected disabled value="">--- Select ---</option>
                                                        <option>1215</option>
                                                        <option>1015</option>
                                                        <option>812</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Variety</fieldset>
                                                    <select class="form-control" name="variety" id="variety">
                                                        <option selected disabled value="">--- Select ---</option>
                                                        <option>HL V EZPL</option>
                                                        <option>HL</option>
                                                        <option>V PD</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Brand Co.</fieldset>
                                                    <select class="form-control" name="brandCo" id="brandCo">
                                                        <option selected disabled value="">--- Select ---</option>
                                                        <option>BML</option>
                                                        <option>DRAGON</option>
                                                        <option>SONZ</option>
                                                        <option>JUMBLE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Glaze(In %)</fieldset>
                                                    <input type="text" id="Glaze" class="form-control"
                                                           placeholder="Glaze(%)" name="Glaze">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Freezer</fieldset>
                                                    <select class="form-control" name="freezer" id="freezer">
                                                        <option selected disabled value="">--- Select ---</option>
                                                        <option>IQF</option>
                                                        <option>BLOCK</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Pack1</fieldset>
                                                    <input type="text" id="Pack1" class="form-control"
                                                           placeholder="Pack1" name="Pack1">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Pack2</fieldset>
                                                    <input type="text" id="Pack2" class="form-control"
                                                           placeholder="Pack2" name="Pack2">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Slab(In kg)</fieldset>
                                                    <input type="text" id="Slab" class="form-control"
                                                           placeholder="Slab(kg)" name="Slab">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Net Kg.</fieldset>
                                                    <input type="text" id="NetKg" class="form-control"
                                                           placeholder="Net Kg." name="NetKg">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Frozen Kg.</fieldset>
                                                    <input type="text" id="FrozenKg" class="form-control"
                                                           placeholder="Frozen Kg." name="FrozenKg">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Mc Cartoon</fieldset>
                                                    <input type="text" id="McCartoon" class="form-control"
                                                           placeholder="Mc Cartoon" name="McCartoon">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Dummy Final</fieldset>
                                                    <select class="form-control" name="DummyFinal" id="DummyFinal">
                                                        <option selected disabled value="">--- Select ---</option>
                                                        <option>DUMMY</option>
                                                        <option>FINAL</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Narration</fieldset>
                                                    <input type="text" id="Narration" class="form-control"
                                                           placeholder="Narration" name="Narration">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Rate</fieldset>
                                                    <input type="text" id="Rate" class="form-control"
                                                           placeholder="Rate" name="Rate">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <fieldset>Amount</fieldset>
                                                    <input type="text" id="Amount" class="form-control"
                                                           placeholder="Mc Cartoon" name="Amount">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div style="text-align: right;">
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
if (isset($_POST['submit'])) {
    $lot = $_POST['TdLotNo'];
    $LotDate = $_POST['LotDate'];
    $grade = $_POST['grade'];
    $variety = $_POST['variety'];
    $brandCo = $_POST['brandCo'];
    $Glaze = $_POST['Glaze'];
    $freezer = $_POST['freezer'];
    $Pack1 = $_POST['Pack1'];
    $Pack2 = $_POST['Pack2'];
    $Slab = $_POST['Slab'];
    $NetKg = $_POST['NetKg'];
    $FrozenKg = $_POST['FrozenKg'];
    $McCartoon = $_POST['McCartoon'];
    $DummyFinal = $_POST['DummyFinal'];
    $narration = $_POST['Narration'];
    $Rate = $_POST['Rate'];
    $Amount = $_POST['Amount'];

    $sql = "UPDATE `pack` SET `lotdate`='$LotDate' ,`grade`='$grade' ,`varitey`='$variety' ,`brandco`='$brandCo' ,`glaze`='$Glaze' ,
`freezer`='$freezer',`pack1`='$Pack1',`pack2`='$Pack2',`slab`='$Slab',`netkg`='$NetKg',`frozenkg`='$FrozenKg' ,`mccartoon`='$McCartoon',
`dummyfinal`='$DummyFinal',`narration`='$narration',`rate`='$Rate',`amount`='$Amount' WHERE `lotno`='$lot'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) {
        echo "<script>alert('You Have Updated Data Successfully');</script>";
    } else {
        echo "<script>alert('Data Not Updated Due To Some Problem');</script>";
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
                        $('#agent').val(data.result.agent);
                        $('#lotNo').val(data.result.lotNo);
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
        $('#detailsIn').on('click', function () {
            $('#info').css({"display": "none"});
            var loatno = $('#lotNo').val();
            $.ajax({
                type: 'POST',
                url: 'getData.php',
                dataType: "json",
                data: {loat_no_pack: loatno},
                success: function (data) {
                    if (data.status == 'ok') {
                        $('#SerialNo').val(data.result.srno);
                        $('#TdLotNo').val(data.result.lotno);
                        $('#info').css({"display": "block"});
                    } else {
                        alert("Lot Numner Not Found....");
                    }
                }
            });
        });
    });
</script>