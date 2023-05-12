<?php

include '../includes/Db_conn.php';
session_start();

    if(isset($_GET['abs']))
        {
            $abs = $_GET['abs'];          
            $grp = $_SESSION['grp'];

            $parts = explode('_',$abs);
            $sem = $parts[7];


            $conn->query("DELETE FROM `absence` WHERE full_when_string = '$abs' AND id_grp = $grp AND sumain_du='$sem'");

        }
?>