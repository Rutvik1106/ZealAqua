<?php

$conn = mysqli_connect('localhost', 'root', '', 'zealaqua');
if (isset($_GET['delete'])) {

    $eid = $_GET['delete'];

    $sql = "Delete from addrole where ID='$eid'";


    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo '<script>alert("User details has been deleted")</script>';
    } else {
        echo '<script>alert("User details has not been deleted")</script>';
    }


}

header('location: Client-Manager.php');

?>    