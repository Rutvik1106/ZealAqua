<?php
//database details
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'zealaqua';

//create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}
//purchase
if(!empty($_POST['l_t6'])){
    $data = array();

    //get user data from the database
    $query = $db->query("SELECT pd.*,p.* from purchasedetail pd JOIN purchase_info p ON pd.lotNo=p.lotNo where lotNo = {$_POST['l_t6']}");

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

//preprocess in
if(!empty($_POST['l_t2'])){
    $data = array();

    //get user data from the database
    $query = $db->query("SELECT * FROM pre_process_in WHERE lotno = {$_POST['l_t2']}");

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

//preprocess out
if(!empty($_POST['l_t3'])){
    $data = array();

    //get user data from the database
    $query = $db->query("SELECT * FROM pre_process_out WHERE lotno = {$_POST['l_t3']}");

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

//soack
if(!empty($_POST['l_t1'])){
    $data = array();

    //get user data from the database
    $query = $db->query("SELECT * FROM soack WHERE lotno = {$_POST['l_t1']}");

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

//pack
if(!empty($_POST['l_t4'])){
    $data = array();

    //get user data from the database
    $query = $db->query("SELECT * FROM pack WHERE lotno = {$_POST['l_t4']}");

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

//repack
if(!empty($_POST['l_t5'])){
    $data = array();

    //get user data from the database
    $query = $db->query("SELECT * FROM repack WHERE lotno = {$_POST['l_t5']}");

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