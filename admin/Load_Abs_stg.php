<?php
include '../includes/Db_conn.php';
session_start();


    
if( isset($_GET['semain_de']) && isset($_GET['grp'])){
    $grp = $_GET['grp'];
    $semain = $_GET['semain_de'];
    $sql = "SELECT * from absence where id_grp = $grp and sumain_du='$semain'";
}else{  
    $sql = "SELECT * from absence where id_grp = $grp ";
}


    $res = $conn->query($sql);

    $data = array();
    while($row = $res->fetch_assoc()){
        $data[] = $row['full_when_string'];
    }

    
    $json_data = json_encode($data);

    // Return the JSON string as the response to the AJAX request
    header('Content-Type: application/json');
    
    echo $json_data;
    
?>