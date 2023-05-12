<?php
include '../includes/Db_conn.php';
session_start();



    
if( isset($_GET['semain_de']) && isset($_GET['id_s'])){
    $semain = $_GET['semain_de'];
    $id = $_GET['id_s'];

    $sql = "SELECT * from absence where sumain_du='$semain' and id_stg=$id";
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