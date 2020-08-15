<!-- php file for add role -->
<?php

$conn = mysqli_connect('localhost', 'root', '', 'zealaqua');
if (!$conn) {
    echo "Not Connected to server";
}
if (!mysqli_select_db($conn, 'zealaqua')) {
    echo "Database not selected";
}
$name = $_POST['name'];
$disc = $_POST['disc'];
$userlist = implode(",", $_POST['Userlist']);
$purchase = implode(",", $_POST['Purchase']);
$preprocess = implode(",", $_POST['Preprocess']);
$soacking = implode(",", $_POST['Soacking']);
$packing = implode(",", $_POST['Packing']);
$repacking = implode(",", $_POST['Repacking']);
$sql = "INSERT INTO addrole (RoleName,RoleInfo,Userlistp,Permission,preprocesspermission,Soackingp,Packingp,Repackingp) VALUES ('$name','$disc','$userlist','$purchase','$preprocess','$soacking','$packing','$repacking') ";

if (!mysqli_query($conn, $sql)) {
    echo $conn->error;

} else {
    echo "inserted";
}
header('location: Client-Manager.php');

?>