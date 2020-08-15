  <!-- php file for update -->
  <?php
  $conn = mysqli_connect('localhost', 'root', '', 'zealaqua');
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
  if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $info = $_POST['disc'];
      $eid = $_GET['editid'];
      $c = $_POST['Purchase'];
      $d = implode(",", $c);
      $g = $_POST['Preprocess'];
      $h = implode(",", $g);
      $k = $_POST['Soacking'];
      $l = implode(",", $k);
      $o=$_POST['Packing'];
      $p=implode(",", $o);
      $s=$_POST['Repacking'];
      $t=implode(",",$s);
      $w=$_POST['Userlist'];
      $x=implode(",",$w);
      $sql = "UPDATE addrole set RoleName='$name',RoleInfo='$info',Userlistp='$x',Permission='$d',preprocesspermission='$h',Soackingp='$l',Packingp='$p',Repackingp='$t' where ID='$eid'";
      $query = mysqli_query($conn, $sql);
      if ($query) {
          echo '<script>alert("Service has been updated")</script>';
          header('location: Client-Manager.php');
      } else {
          echo $conn->error;
      }

  }
  ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
   <title>Edit Role</title>
    <?php include_once ('Head.php'); ?>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<?php include_once ('Topnavbar.php'); ?>
<?php include_once ('Leftmenu.php'); ?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Edit Role</h2>
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
                                <form class="form" method="post">
                                <!-- php file for select query -->
                                 <?php
                                    $conn=mysqli_connect('localhost','root','','zealaqua');
                                    $eid=$_GET['editid'];
                                    $sql="SELECT * from addrole where ID=$eid";


                                     $result=mysqli_query($conn,$sql);
                                     

                                      while($row=mysqli_fetch_assoc($result)) {
                                 
                                 ?>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <input type="text" id="first-name-column" value="<?php echo $row['RoleName']; ?>" class="form-control" placeholder="Role Name" name="name">
                                                    <label for="first-name-column">Role Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <input type="text" id="last-name-column" class="form-control" value="<?php echo $row['RoleInfo']; ?>"  placeholder="Role Description" name="disc">
                                                    <label for="last-name-column">Role Description</label>
                                                </div>

                                            </div>
                                           <!-- php file for checkbox -->
                                            <?php
                                            $conn = mysqli_connect('localhost', 'root', '', 'zealaqua');
                                            $eid = $_GET['editid'];
                                            $sql = "SELECT * from addrole where ID=$eid";
                                            $result = mysqli_query($conn, $sql);
                                            $check = mysqli_fetch_array($result);
//                                            $pre = mysqli_fetch_array($result);
                                            $a = $check['Permission'];
                                            $b = explode(",", $a);
                                            $e = $check['preprocesspermission'];
                                            $f = explode(",", $e);
                                            $i=$check['Soackingp'];
                                            $j=explode(",", $i);
                                            $m=$check['Packingp'];
                                            $n=explode(",", $m);
                                            $q=$check['Repackingp'];
                                            $r=explode(",", $q);
                                            $u=$check['Userlistp'];
                                            $v=explode(",",$u);
                                            ?>
                                      
                                            <div class="col-12">
                                                <div class="table-responsive border rounded px-1 ">
                                                    <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Permission</h6>
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
                                                        <td>Userlist</td>
                                                        <td>

                                                            <div class="custom-control custom-checkbox"><input type="checkbox" name="Userlist[]" value="Read" id="users-checkbox21" class="custom-control-input"
                                                                    <?php
                                                                    if(in_array("Read", $v)){
                                                                        // echo "checked";
                                                                        echo 'checked';
                                                                    }
                                                                    ?>
                                                                >
                                                                <label class="custom-control-label" for="users-checkbox21"></label>
                                                            </div>
                                                        </td>
                                                        <td>

                                                            <div class="custom-control custom-checkbox"><input type="checkbox" name="Userlist[]" value="Write" id="users-checkbox22" class="custom-control-input"
                                                                    <?php
                                                                    if(in_array("Write", $v)){
                                                                        echo "checked";
                                                                    }
                                                                    ?>
                                                                >
                                                                <label class="custom-control-label" for="users-checkbox22"></label>
                                                            </div>
                                                        </td>
                                                        <td>

                                                            <div class="custom-control custom-checkbox"><input type="checkbox" name="Userlist[]" value="Create" id="users-checkbox23" class="custom-control-input"
                                                                    <?php
                                                                    if(in_array("Create", $v)){
                                                                        echo "checked";
                                                                    }
                                                                    ?>
                                                                ><label class="custom-control-label" for="users-checkbox23"></label>
                                                            </div>
                                                        </td>
                                                        <td>


                                                            <div class="custom-control custom-checkbox"><input type="checkbox" name="Userlist[]" value="Delete" id="users-checkbox24" class="custom-control-input"
                                                                    <?php
                                                                    if(in_array("Delete", $v)){
                                                                        echo "checked";
                                                                    }
                                                                    ?>
                                                                >
                                                                <label class="custom-control-label" for="users-checkbox24"></label>
                                                            </div>
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Purchase</td>
                                                            <td>
                                                                
                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Purchase[]" value="Read" id="users-checkbox1" class="custom-control-input"
                                                                    <?php
                                                                  if(in_array("Read", $b)){
                                                                    // echo "checked";
                                                                    echo 'checked';
                                                                  }
                                                                ?>
                                                                >
                                                                    <label class="custom-control-label" for="users-checkbox1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                
                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Purchase[]" value="Write" id="users-checkbox2" class="custom-control-input"
                                                                    <?php
                                                                  if(in_array("Write", $b)){
                                                                    echo "checked";
                                                                  }
                                                                ?>
                                                                >
                                                                <label class="custom-control-label" for="users-checkbox2"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                
                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Purchase[]" value="Create" id="users-checkbox3" class="custom-control-input"
                                                                    <?php
                                                                  if(in_array("Create", $b)){
                                                                    echo "checked";
                                                                  }
                                                                ?>
                                                                    ><label class="custom-control-label" for="users-checkbox3"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                               

                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Purchase[]" value="Delete" id="users-checkbox4" class="custom-control-input"
                                                                     <?php
                                                                  if(in_array("Delete", $b)){
                                                                    echo "checked";
                                                                  }
                                                                ?>
                                                                    >
                                                                    <label class="custom-control-label" for="users-checkbox4"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Preprocess</td>
                                                            <td>

                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Preprocess[]" value="Read" id="users-checkbox5" class="custom-control-input"
                                                                        <?php
                                                                        if(in_array("Read", $f)){
                                                                            // echo "checked";
                                                                            echo 'checked';
                                                                        }
                                                                        ?>
                                                                    >
                                                                    <label class="custom-control-label" for="users-checkbox5"></label>
                                                                </div>
                                                            </td>
                                                            <td>

                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Preprocess[]" value="Write" id="users-checkbox6" class="custom-control-input"
                                                                        <?php
                                                                        if(in_array("Write", $f)){
                                                                            echo "checked";
                                                                        }
                                                                        ?>
                                                                    >
                                                                    <label class="custom-control-label" for="users-checkbox6"></label>
                                                                </div>
                                                            </td>
                                                            <td>

                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Preprocess[]" value="Create" id="users-checkbox7" class="custom-control-input"
                                                                        <?php
                                                                        if(in_array("Create", $f)){
                                                                            echo "checked";
                                                                        }
                                                                        ?>
                                                                    ><label class="custom-control-label" for="users-checkbox7"></label>
                                                                </div>
                                                            </td>
                                                            <td>


                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Preprocess[]" value="Delete" id="users-checkbox8" class="custom-control-input"
                                                                        <?php
                                                                        if(in_array("Delete", $f)){
                                                                            echo "checked";
                                                                        }
                                                                        ?>
                                                                    >
                                                                    <label class="custom-control-label" for="users-checkbox8"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Soacking</td>
                                                            <td>

                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Soacking[]" value="Read" id="users-checkbox9" class="custom-control-input"
                                                                        <?php
                                                                        if(in_array("Read", $j)){
                                                                            // echo "checked";
                                                                            echo 'checked';
                                                                        }
                                                                        ?>
                                                                    >
                                                                    <label class="custom-control-label" for="users-checkbox9"></label>
                                                                </div>
                                                            </td>
                                                            <td>

                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Soacking[]" value="Write" id="users-checkbox10" class="custom-control-input"
                                                                        <?php
                                                                        if(in_array("Write", $j)){
                                                                            echo "checked";
                                                                        }
                                                                        ?>
                                                                    >
                                                                    <label class="custom-control-label" for="users-checkbox10"></label>
                                                                </div>
                                                            </td>
                                                            <td>

                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Soacking[]" value="Create" id="users-checkbox11" class="custom-control-input"
                                                                        <?php
                                                                        if(in_array("Create", $j)){
                                                                            echo "checked";
                                                                        }
                                                                        ?>
                                                                    ><label class="custom-control-label" for="users-checkbox11"></label>
                                                                </div>
                                                            </td>
                                                            <td>


                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Soacking[]" value="Delete" id="users-checkbox12" class="custom-control-input"
                                                                        <?php
                                                                        if(in_array("Delete", $j)){
                                                                            echo "checked";
                                                                        }
                                                                        ?>
                                                                    >
                                                                    <label class="custom-control-label" for="users-checkbox12"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Packing</td>
                                                            <td>

                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Packing[]" value="Read" id="users-checkbox13" class="custom-control-input"
                                                                        <?php
                                                                        if(in_array("Read", $n)){
                                                                            // echo "checked";
                                                                            echo 'checked';
                                                                        }
                                                                        ?>
                                                                    >
                                                                    <label class="custom-control-label" for="users-checkbox13"></label>
                                                                </div>
                                                            </td>
                                                            <td>

                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Packing[]" value="Write" id="users-checkbox14" class="custom-control-input"
                                                                        <?php
                                                                        if(in_array("Write", $n)){
                                                                            echo "checked";
                                                                        }
                                                                        ?>
                                                                    >
                                                                    <label class="custom-control-label" for="users-checkbox14"></label>
                                                                </div>
                                                            </td>
                                                            <td>

                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Packing[]" value="Create" id="users-checkbox15" class="custom-control-input"
                                                                        <?php
                                                                        if(in_array("Create", $n)){
                                                                            echo "checked";
                                                                        }
                                                                        ?>
                                                                    ><label class="custom-control-label" for="users-checkbox15"></label>
                                                                </div>
                                                            </td>
                                                            <td>


                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Packing[]" value="Delete" id="users-checkbox16" class="custom-control-input"
                                                                        <?php
                                                                        if(in_array("Delete", $n)){
                                                                            echo "checked";
                                                                        }
                                                                        ?>
                                                                    >
                                                                    <label class="custom-control-label" for="users-checkbox16"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Repacking</td>
                                                            <td>

                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Repacking[]" value="Read" id="users-checkbox17" class="custom-control-input"
                                                                        <?php
                                                                        if(in_array("Read", $r)){
                                                                            // echo "checked";
                                                                            echo 'checked';
                                                                        }
                                                                        ?>
                                                                    >
                                                                    <label class="custom-control-label" for="users-checkbox17"></label>
                                                                </div>
                                                            </td>
                                                            <td>

                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Repacking[]" value="Write" id="users-checkbox18" class="custom-control-input"
                                                                        <?php
                                                                        if(in_array("Write", $r)){
                                                                            echo "checked";
                                                                        }
                                                                        ?>
                                                                    >
                                                                    <label class="custom-control-label" for="users-checkbox18"></label>
                                                                </div>
                                                            </td>
                                                            <td>

                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Repacking[]" value="Create" id="users-checkbox19" class="custom-control-input"
                                                                        <?php
                                                                        if(in_array("Create", $r)){
                                                                            echo "checked";
                                                                        }
                                                                        ?>
                                                                    ><label class="custom-control-label" for="users-checkbox19"></label>
                                                                </div>
                                                            </td>
                                                            <td>


                                                                <div class="custom-control custom-checkbox"><input type="checkbox" name="Repacking[]" value="Delete" id="users-checkbox20" class="custom-control-input"
                                                                        <?php
                                                                        if(in_array("Delete", $r)){
                                                                            echo "checked";
                                                                        }
                                                                        ?>
                                                                    >
                                                                    <label class="custom-control-label" for="users-checkbox20"></label>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    <?php } ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-12">
                                        <button type="submit" name="submit" id="submit"
                                                class="btn btn-primary mr-1 mb-1">Update
                                        </button>
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

<?php include_once ('Footer.php'); ?>

</body>
<!-- END: Body-->



</html>