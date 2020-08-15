<?php
$conn = mysqli_connect('localhost', 'root', '', 'zealaqua');
session_start();
$permission = $_SESSION['role_permission'];


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
//echo print_r($permission);
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <title>Uesr List</title>
    <?php include_once('Head.php'); ?>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static" data-open="click"
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
                        <h2 class="content-header-title float-left mb-0">User List</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Zero configuration table -->
            <section id="basic-datatable">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="fonticon-wrap">
                                <a href="Create-Client.php">
                                    <?php if (in_array("Create", $permission)){ ?>
                                    <button type="submit" style="margin-bottom: 15px;margin-right: 13px"
                                            class="btn btn-primary btn-print mb-10 mb-md-10 col-lg-2 col-md-4 col-sm-6 float-right">
                                        <i class="feather icon-plus"></i>
                                        Add User
                                    </button>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                            <tr>
                                                <th>CLIENT NAME</th>
                                                <th>DEPARTMENT NAME</th>
                                                <th>ADDRESS</th>
                                                <th>ROLE</th>
                                                <th>CONTACT NUMBER</th>
                                                <th>ACTION</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                            $conn = mysqli_connect('localhost', 'root', '', 'zealaqua');
                                            $sql = "SELECT * from user_info ";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td class="product-name"><?php echo $row['username'] ?></td>
                                                <td class="product-name"><?php echo $row['department'] ?></td>
                                                <td class="product-name"><?php echo $row['address'] ?></td>
                                                <td class="product-name"><?php echo $row['role'] ?></td>
                                                <td class="product-name"><?php echo $row['contact_no'] ?></td>
                                                <td class="product-action">
                                                    <?php if (in_array("Read", $permission)) { ?><span
                                                            class="action-edit "><a
                                                                href="User-View.php?viewid=<?php echo $row['c_id']; ?>"><i
                                                                    class="feather icon-eye"></i></a></span><?php } ?>
                                                    <?php if (in_array("Write", $permission)) { ?><span
                                                            class="action-edit "><a
                                                                href="User-Edit.php?editid=<?php echo $row['c_id']; ?>"> <i
                                                                    class="feather icon-edit"></i></a></span><?php } ?>
                                                    <?php if (in_array("Delete", $permission)) { ?><span
                                                            class="action-delete "><a
                                                                href="User-Delete.php?delete=<?php echo $row['c_id']; ?>" class="btn-del" ><i
                                                                    class="feather icon-trash"></i></span><?php } ?>
                                                    <script>
                                                        $('.btn-del').on('click',function (e) {
                                                            e.preventDefault();
                                                            const href=$(this).attr('href');
                                                            swal.fire({
                                                                title: "Are you sure?",
                                                                text: "Record will be Deleted?",
                                                                type: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonColor: "#3085d6",
                                                                confirmButtonText: "Delete",
                                                                cancelButtonText: "No",
                                                            }).then((result)=>{
                                                                if(result.value){
                                                                    document.location.href=href;
                                                                }
                                                            })
                                                        })
                                                    </script>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="drag-target"></div>
        </div>
    </div>
</div>
<?php include_once ('Footer.php'); ?>
</body>
<!-- END: Body-->
</html>
