<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zealaqua";

$dbh = new PDO('mysql:dbname=' . $dbname . ';host=' . $servername . ";port=3306", $username, $password);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
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
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $department = $_POST['department'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $contact_no = $_POST['contact_no'];
    $password = $_POST['password'];


    if (strlen($contact_no) != 10) {
        echo "<script>
            alert('Contact number Must be of 10 digits.');
            </script>";
    } else {


        $sql = "INSERT INTO user_info (username,department,address,role,contact_no,Password) 
            VALUES ('$username', '$department', '$address', '$role', '$contact_no','$password')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    header('location:Create-User-list.php');
}

$conn->close();
?>


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <title>Add User</title>
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
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Create User</h2>
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
                                <form class="form" method="POST">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <div class="controls">
                                                        <label for="first-name-column">Name</label>
                                                        <div class="position-relative has-icon-left">

                                                            <input type="text" id="first-name-column"
                                                                   class="form-control" placeholder=" Name"
                                                                   name="username"
                                                                   required
                                                                   data-validation-required-message="This field is required">

                                                            <div class="form-control-position">
                                                                <i class="feather icon-user" ></i>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <div class="controls">
                                                        <label for="first-name-column">Department</label>
                                                        <div class="position-relative has-icon-left">

                                                            <input type="text" id="last-name-column"
                                                                   class="form-control" placeholder="Department"
                                                                   name="department">

                                                            <div class="form-control-position">
                                                                <i class="feather icon-layers"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <div class="controls">
                                                        <label for="city-column">Address</label>
                                                        <div class="position-relative has-icon-left">

                                                            <input type="text" id="city-column" class="form-control"
                                                                   placeholder="Address" name="address">

                                                            <div class="form-control-position">
                                                                <i class="feather icon-mail"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <div class="controls">
                                                        <label>Role</label>
                                                        <select class="form-control" name="role">
                                                            <option selected disabled value="">--- Select ---</option>
                                                            <?php
                                                            $sql = $dbh->prepare("SELECT RoleName, Id FROM addrole");
                                                            $sql->execute();
                                                            while ($r = $sql->fetch()) { ?>
                                                                <option value="<?php echo $r['RoleName']; ?>"><?php echo $r['RoleName']; ?></option>
                                                            <?php }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <div class="controls">
                                                        <label>Contact No</label>
                                                        <div class="position-relative has-icon-left">

                                                            <input type="text" id="company-column" class="form-control"
                                                                   name="contact_no" placeholder="Contact No">

                                                            <div class="form-control-position">
                                                                <i class="feather icon-phone"></i>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <div class="controls">
                                                        <label for="first-name-column">Create Password</label>
                                                        <div class="position-relative has-icon-left">

                                                            <input type="password" id="last-name-column"
                                                                   class="form-control" placeholder="Password"
                                                                   name="password"
                                                                   required
                                                                   data-validation-required-message="Password must be contain 8 characters">

                                                            <div class="form-control-position">
                                                                <i class="feather icon-lock"></i>
                                                            </div>
                                                        </div>

                                                    </div>
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<?php include_once('Footer.php'); ?>
</body>
<!-- END: Body-->

</html>
