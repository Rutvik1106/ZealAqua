<?php
if(!empty($_POST['loat_no'])){
    $data = array();

    //database details
    $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName     = 'zealaqua';

    //create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if($db->connect_error){
        die("Unable to connect database: " . $db->connect_error);
    }

    //get user data from the database
    $query = $db->query("SELECT * FROM repack WHERE lotno = {$_POST['loat_no']}");

    if($query->num_rows > 0){
        $userData = $query->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $userData;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($data);
}
?>