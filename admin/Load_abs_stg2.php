<?php
include '../includes/Db_conn.php';
session_start();

$grp = $_GET['grp'];
$sem = $_GET['sem'];
    


$sql = "SELECT * from absence where sumain_du='$sem' and id_grp=$grp";

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