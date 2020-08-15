<?php
session_start();

if (isset($_SESSION['loggedinclient']) && $_SESSION['loggedinclient'] === true) {

    $module = $_SESSION['client_role'];
//    $admin=$_SESSION['admin'];

    if ($module === "Admin") {

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
    <title>Role View</title>
    <?php include_once('Head.php'); ?>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">

<?php include_once('Topnavbar.php'); ?>
<?php include_once('Leftmenu.php'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- page users view start -->
            <section class="page-users-view">
                <div class="row">
                    <!-- account start -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">User Information</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                        <table>
                                            <?php
                                            $conn = mysqli_connect('localhost', 'root', '', 'zealaqua');
                                            $eid = $_GET['viewid'];
                                            $sql = "SELECT * from addrole where ID=$eid";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>

                                            <tr>
                                                <td class="font-weight-bold">Roll Name<br><br></td>
                                                <td><?php echo $row['RoleName']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Roll<br>Description</td>
                                                <td><?php echo $row['RoleInfo']; ?></td>
                                            </tr>


                                        </table>
                                        <?php } ?>
                                        <!--                                        <div class="col-12">-->
                                        <!--                                            <a href="Client-Manager-Edit.html" class="btn btn-primary mr-1"><i class="feather icon-edit-1"></i> Edit</a>-->
                                        <!--                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- account end -->
                    </div>
                </div>
            </section>

            <!-- page users view end -->

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>


<?php include_once('Footer.php'); ?>
</body>
<!-- END: Body-->


</html>