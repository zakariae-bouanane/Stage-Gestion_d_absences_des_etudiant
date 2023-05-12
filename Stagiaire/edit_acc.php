<?php
    include '../includes/Db_conn.php';
    session_start();

    if(isset($_POST['login']) && isset($_POST['pass'])){
        $login = $conn->real_escape_string($_POST['login']);
        $pass = $conn->real_escape_string($_POST['pass']);
        $id = $_SESSION['userId'];

        $query = "UPDATE `stagiaires` SET `login`= '$login' , `password` = '$pass' where `id_etudiant` = '$id'";
        $conn->query($query);

        $_SESSION['login'] = $login;
        $_SESSION['password'] = $pass;

        $_SESSION['msg'] = 'Updated successfully !';
        header('location:stg_acc.php');
    }else{
        $_SESSION['msg'] = 'Inputs must not be empty !';
        header('location:stg_acc.php');
    }
    
?>