<?php
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

//Soacking.....
if(!empty($_POST['lotNo']) && !empty($_POST['poundSoack'])){

    $pn=$_POST['poundSoack'];
    $slt=$_POST['lotNo'];
    $data = array();

    //get user data from the database
    $query = $db->query("SELECT * FROM pre_process_out WHERE pounds='$pn' AND lotno = '$slt'");
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

//Add-Receive(1)....
if(!empty($_POST['l_t'])){
    $data = array();

    //get user data from the database
    $query = $db->query("SELECT * FROM purchasedetail WHERE lotno = {$_POST['l_t']}");

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


//Add-Receive(2)...
if(!empty($_POST['pound']) && !empty($_POST['lot'])){
    $pn=$_POST['pound'];
    $l=$_POST['lot'];
    $dataReceive = array();

    //get user data from the database   SELECT * FROM purchase_info WHERE lotNo={$_POST['lot']} AND pounds = {$_POST['pound']}
    $query = $db->query("SELECT * FROM `purchase_info` WHERE pounds='$pn' AND lotNo=".$_POST['lot']."");

    if($query->num_rows > 0){
        $userData = $query->fetch_assoc();
        $dataReceive['status'] = 'ok';
        $dataReceive['result'] = $userData;
    }else{
        $dataReceive['status'] = 'err';
        $dataReceive['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($dataReceive);
}


//Packing..
if(!empty($_POST['loat_no_pack'])){
    $lnp=$_POST['loat_no_pack'];
    $data = array();

    //get user data from the database
    $query = $db->query("SELECT * FROM pack WHERE lotno = '$lnp'");

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

//Pre-Process-in
if(!empty($_POST['lot_pre_in'])){
    $lnp=$_POST['lot_pre_in'];

    $data = array();

    //get user data from the database
    $query = $db->query("SELECT * FROM `purchase_info` WHERE lotNo='$lnp'");

    if($query->num_rows > 0){
          while($row = mysqli_fetch_assoc($query)){
            $myObj=NULL;
            $myObj->lotno=$row['lotNo'];
            $myObj->pound=$row['pounds'];
            $myObj->variety=$row['ifqvariety'];
            $myObj->grade=$row['grade'];
            array_push($userData,json_encode($myObj));
        }
        $data['status'] = 'ok';
        $data['result'] = "ok";
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    //returns data as JSON format
    echo json_encode($data);
}

//Pre-Process-out

if(!empty($_POST['lot_pre_out']) && !empty($_POST['pound'])){
    $lnp=$_POST['lot_pre_out'];
    $pn=$_POST['pound'];
    $data = array();

    //get user data from the database
    $query = $db->query("SELECT * FROM `pre_process_in` WHERE lotno = '$lnp' AND pound='$pn' ");

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