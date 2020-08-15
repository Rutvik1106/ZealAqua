<?php
$conn = mysqli_connect('localhost', 'root', '', 'zealaqua');
session_start();
//$admin=$_SESSION['admin'];
if (isset($_SESSION['loggedinclient']) && $_SESSION['loggedinclient'] === true) {

    $module = $_SESSION['client_role'];
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
    <title> Add Role</title>
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
                        <h2 class="content-header-title float-left mb-0">New Role</h2>
                    </div>
                </div>
            </div>
        </div>

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form method="post" action="addRole.php" name="role">

                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" required
                                                           data-validation-required-message="This field is required"
                                                           id="emailTo" class="form-control"
                                                           placeholder="Role Name" name="name">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" required
                                                           data-validation-required-message="This field is required"
                                                           id="emailSubject" class="form-control"
                                                           placeholder="Description" name="disc">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-clipboard"></i>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- php file for checkbox -->
                                            <div class="col-12" style="top: 50px;">
                                                <div class="table-responsive border rounded px-1 ">
                                                    <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i
                                                                class="feather icon-lock mr-50 "></i>Permission</h6>
                                                    <table class="table table-borderless">
                                                        <thead>
                                                        <tr>
                                                            <th>Module</th>
                                                            <th>Read</th>
                                                            <th>Write</th>
                                                            <th>Create</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Userlist</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox" name="Userlist[]"
                                                                           value="Read" id="users-checkbox21"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                           for="users-checkbox21"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox" name="Userlist[]"
                                                                           value="Write"
                                                                           id="users-checkbox22"
                                                                           class="custom-control-input"><label
                                                                            class="custom-control-label"
                                                                            for="users-checkbox22"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox" name="Userlist[]"
                                                                           value="Create"
                                                                           id="users-checkbox23"
                                                                           class="custom-control-input"><label
                                                                            class="custom-control-label"
                                                                            for="users-checkbox23"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox" name="Userlist[]"
                                                                           value="Delete"
                                                                           id="users-checkbox24"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                           for="users-checkbox24"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Purchase</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox" name="Purchase[]"
                                                                           value="Read" id="users-checkbox1"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                           for="users-checkbox1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox" name="Purchase[]"
                                                                           value="Write"
                                                                           id="users-checkbox2"
                                                                           class="custom-control-input"><label
                                                                            class="custom-control-label"
                                                                            for="users-checkbox2"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox" name="Purchase[]"
                                                                           value="Create"
                                                                           id="users-checkbox3"
                                                                           class="custom-control-input"><label
                                                                            class="custom-control-label"
                                                                            for="users-checkbox3"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox" name="Purchase[]"
                                                                           value="Delete"
                                                                           id="users-checkbox4"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                           for="users-checkbox4"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Preprocess</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox"
                                                                           name="Preprocess[]"
                                                                           value="Read" id="users-checkbox5"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                           for="users-checkbox5"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox"
                                                                           name="Preprocess[]"
                                                                           value="Write"
                                                                           id="users-checkbox6"
                                                                           class="custom-control-input"><label
                                                                            class="custom-control-label"
                                                                            for="users-checkbox6"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox"
                                                                           name="Preprocess[]"
                                                                           value="Create"
                                                                           id="users-checkbox7"
                                                                           class="custom-control-input"><label
                                                                            class="custom-control-label"
                                                                            for="users-checkbox7"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox"
                                                                           name="Preprocess[]"
                                                                           value="Delete"
                                                                           id="users-checkbox8"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                           for="users-checkbox8"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Soacking</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox"
                                                                           name="Soacking[]"
                                                                           value="Read" id="users-checkbox9"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                           for="users-checkbox9"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox"
                                                                           name="Soacking[]"
                                                                           value="Write"
                                                                           id="users-checkbox10"
                                                                           class="custom-control-input"><label
                                                                            class="custom-control-label"
                                                                            for="users-checkbox10"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox"
                                                                           name="Soacking[]"
                                                                           value="Create"
                                                                           id="users-checkbox11"
                                                                           class="custom-control-input"><label
                                                                            class="custom-control-label"
                                                                            for="users-checkbox11"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox"
                                                                           name="Soacking[]"
                                                                           value="Delete"
                                                                           id="users-checkbox12"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                           for="users-checkbox12"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Packing</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox"
                                                                           name="Packing[]"
                                                                           value="Read" id="users-checkbox13"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                           for="users-checkbox13"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox"
                                                                           name="Packing[]"
                                                                           value="Write"
                                                                           id="users-checkbox14"
                                                                           class="custom-control-input"><label
                                                                            class="custom-control-label"
                                                                            for="users-checkbox14"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox"
                                                                           name="Packing[]"
                                                                           value="Create"
                                                                           id="users-checkbox15"
                                                                           class="custom-control-input"><label
                                                                            class="custom-control-label"
                                                                            for="users-checkbox15"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox"
                                                                           name="Packing[]"
                                                                           value="Delete"
                                                                           id="users-checkbox16"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                           for="users-checkbox16"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Repacking</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox"
                                                                           name="Repacking[]"
                                                                           value="Read" id="users-checkbox17"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                           for="users-checkbox17"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox"
                                                                           name="Repacking[]"
                                                                           value="Write"
                                                                           id="users-checkbox18"
                                                                           class="custom-control-input"><label
                                                                            class="custom-control-label"
                                                                            for="users-checkbox18"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox"
                                                                           name="Repacking[]"
                                                                           value="Create"
                                                                           id="users-checkbox19"
                                                                           class="custom-control-input"><label
                                                                            class="custom-control-label"
                                                                            for="users-checkbox19"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox ml-50">
                                                                    <input type="checkbox"
                                                                           name="Repacking[]"
                                                                           value="Delete"
                                                                           id="users-checkbox20"
                                                                           class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                           for="users-checkbox20"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-12">
                                        <div style="text-align: center;">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1" name="submit">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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