<?php

include '../includes/Db_conn.php';
include '../includes/session.php';

if(isset($_POST['filieres']))
{

    $fil = $_POST['filieres'];
    $grp = json_decode(stripslashes($_POST['groupes']));

    $conn->query("INSERT INTO `filière`(`Nom_fill`) VALUES('$fil')");
    $lastId = $conn->insert_id;

    foreach($grp as $item){
        $parts = explode('_',$item);

        $grpNom = $parts[0];
        $anne = $parts[1];

        $conn->query("INSERT INTO `groupe`(`Nom_grp`,`id_fill`,`anne`) VALUES('$grpNom','$lastId','$anne')");
        
    }
}

?>