<?php
session_start();

if (isset($_SESSION['loggedinclient']) && $_SESSION['loggedinclient'] === true) {

    $module = $_SESSION['client_role'];
    $permission = $_SESSION['role_permission'];
//    $admin=$_SESSION['admin'];
    if ($module === "Purchase" or $module === "Admin") {

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
    <title>Raw Material</title>
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
                        <h2 class="content-header-title float-left mb-0">Purchase List</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Zero configuration table -->
            <section id="basic-datatable">

                <?php if (in_array("Create", $permission)) { ?>

                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">

                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 ">
                                <div class="fonticon-wrap">
                                    <a href="Add-Receive.php">
                                        <button type="submit" name="addReceive"
                                                style="margin-bottom: 15px;margin-left: 15px"
                                                class="btn btn-primary btn-print mb-10 mb-md-10 col-lg-2 col-md-4 col-sm-6 float-right">
                                            <i class="feather icon-plus"></i>
                                            Add Receive
                                        </button>
                                    </a>
                                </div>
                                <div class="fonticon-wrap">
                                    <a href="Add-Purchase.php">
                                        <button type="submit" name="addPurchase"
                                                style="margin-bottom: 15px;margin-left: 15px"
                                                class="btn btn-primary btn-print mb-10 mb-md-10 col-lg-2 col-md-4 col-sm-6 float-right">
                                            <i class="feather icon-plus"></i>
                                            Add Purchase
                                        </button>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>Lot No.</th>
                                            <th>Book Name</th>
                                            <th>VNo</th>
                                            <th>Date</th>
                                            <th>Challan no</th>
                                            <th>Date</th>
                                            <th>Farmer Name</th>
                                            <th>Agent</th>
                                            <th>Vehicle No</th>
                                            <th>Driver</th>
                                            <!--                                            <th>ACTION</th>-->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $conn = mysqli_connect('localhost', 'root', '', 'zealaqua');

                                        $sql = "SELECT * from purchasedetail ";
                                        $result = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td class="product-name"><?php echo $row['lotNo'] ?></td>
                                                <td class="product-name"><?php echo $row['bookName'] ?></td>
                                                <td class="product-name"><?php echo $row['vNo'] ?></td>
                                                <td class="product-name"><?php echo $row['date1'] ?></td>
                                                <td class="product-name"><?php echo $row['challanNo'] ?></td>
                                                <td class="product-name"><?php echo $row['date2'] ?></td>
                                                <td class="product-name"><?php echo $row['farmerName'] ?></td>
                                                <td class="product-name"><?php echo $row['agent'] ?></td>
                                                <td class="product-name"><?php echo $row['vehicleNo'] ?></td>
                                                <td class="product-name"><?php echo $row['driver'] ?></td>

                                                <!--                                                <td class="product-action">-->
                                                <!--                                                        <span class="action-edit ">-->
                                                <!---->
                                                <!--                                                         --><?php
                                                //                                                         if (in_array("Read", $permission)) {
                                                //                                                             ?>
                                                <!--                                                             <a href="Purchase-View.php?viewid=-->
                                                <?php //echo $row['p_id']; ?><!--"><i-->
                                                <!--                                                                         class="feather icon-eye"></i></a>-->
                                                <!--                                                         --><?php //}
                                                //                                                         ?>
                                                <!--                                                     </span>-->
                                                <!--                                                    <span class="action-edit ">-->
                                                <!--                                                         --><?php
                                                //                                                         if (in_array("Write", $permission)) {
                                                //                                                             ?>
                                                <!--                                                             <a href="Purchase-Edit.php?editid=-->
                                                <?php //echo $row['p_id']; ?><!--"> <i-->
                                                <!--                                                                         class="feather icon-edit"></i></a>-->
                                                <!--                                                         --><?php //}
                                                //                                                         ?>
                                                <!--                                                        </span>-->
                                                <!--                                                    <span class="action-edit ">-->
                                                <!--                                                         --><?php
                                                //                                                         if (in_array("Delete", $permission)){
                                                //                                                         ?>
                                                <!--                                                             <a href="Purchase-delete.php?delete=-->
                                                <?php //echo $row['p_id']; ?><!--"> <i-->
                                                <!--                                                                         class="feather icon-trash" name="delete"></i>-->
                                                <!--                                                         --><?php //}
                                                //                                                         ?>
                                                <!--                                                        </span>-->
                                                <!---->
                                                <!--                                                </td>-->
                                            </tr>
                                        <?php } ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="drag-target"></div>

    </div>
</div>
</div>
<?php include_once ('Footer.php'); ?>
</body>
<!-- END: Body-->


</html>