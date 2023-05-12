<?php
  error_reporting(0);
  include './includes/Db_conn.php' ;

  session_start();
  
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/Logo_ofppt.png" rel="icon">
  <title>Système D'absence</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

  <style>
    
  </style>
</head>

<body >
  <!-- Login Content -->
  <div id="bg">
    <div class="top">
      <div class="logo">        
          <h2>OFPPT</h2>
      </div>
    </div>
  </div>

  

  <div class="container-login container">    
    <div class="row justify-content-center">      
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-lg my-5 mywidth">
          <div class="card-body p-0">
            <div class="row">            
              <div class="col-lg-12">
                <div class="login-form ">               
                
                  
              <form class="user" method="Post" action="">
                      

                  <div class="form-group d-flex justify-content-center">
                            <select required onchange="setInpRole(this.value)" name="userType" class="form-control mb-3 w-75 text-center ">
                                    
                                    <option value="Administrator">Gestionnaire (email)</option>
                                    <option value="Stagiaire">Stagiaire (identifiant)</option>
                              </select>
                        </div>

                        <div class="form-group form-field ">
                          <input type="text" class="form-control mybtn" required name="username" id="loginINp" placeholder="Email or ID">
                        </div>

                        <div class="form-group form-field">
                          <input type="password" name="password" required class="form-control mybtn" id="exampleInputPassword" placeholder="Password">
                        </div>

                        <div class="form-group">
                          <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label text-light" for="customCheck">Remember Me</label>
                          </div>
                        </div>

                        
                          <div class="d-flex justify-content-center inp-div">
                              <input type="submit"  class="btn w-50" value="Connexion" name="login" />
                          </div>
                        
                      </form>
<script>
  function setInpRole(val){
      switch(val){
        case 'Administrator':
          document.getElementById('loginINp').type = 'email'
          document.getElementById('loginINp').placeholder = "Entrer L'email"
          break
          
        case'Stagiaire':
          document.getElementById('loginINp').type = 'text'        
          document.getElementById('loginINp').placeholder = "Entrer votre identifiant"        
          break
      }
  }
</script>
<?php

  if(isset($_POST['login'])){

    $userType = $_POST['userType'];
    $email = $conn->real_escape_string($_POST['username']);    
    $password = $conn->real_escape_string($_POST['password']);
    

    if($userType == "Administrator"){
      $password = md5($password);
      $query = "SELECT * FROM admins WHERE email = '$email' AND pass = '$password'";
      $rs = $conn->query($query);
      $num = $rs->num_rows;
      $rows = $rs->fetch_assoc();

      if($num > 0){

        $_SESSION['userId'] = $rows['id'];
        $_SESSION['full_name'] = $rows['full_name'];
        $_SESSION['email'] = $rows['email'];
        //Csrf Token
        $_SESSION['token'] = md5(uniqid(mt_rand(), true));

        echo "<script type = \"text/javascript\">
        window.location = (\"admin/index.php\")
        </script>";
      
      }else{

        echo "<div class='alert alert-danger mt-4' role='alert'>
        Invalid Email/Password!
        </div>";

      }
    }
    else if($userType == "Stagiaire"){
      
      $query2 = "SELECT * FROM stagiaires WHERE login = '$email' AND password = '$password'";
      $rs2 = $conn->query($query2);
      $num = $rs2->num_rows;
      $rows = $rs2->fetch_assoc();     
      

      if($num > 0){
        
        $_SESSION['userId'] = $rows['id_etudiant'];
        $_SESSION['Nom'] = $rows['Nom'];
        $_SESSION['Prenom'] = $rows['Prenom'];
        $_SESSION['Prenom2'] = $rows['Prenom2'];
        $_SESSION['DatedeNaissance'] = $rows['DatedeNaissance'];
        $_SESSION['id_g'] = $rows['id_g'];
        $_SESSION['login'] = $rows['login'];
        $_SESSION['password'] = $rows['password'];

        echo "<script type = \"text/javascript\">
        window.location = (\"Stagiaire/index.php\")
        </script>";
      }

      else{

        echo "<div class='alert alert-danger mt-4' role='alert'>
        Invalid Username/Password!
        </div>";

      }
    }else{

      echo "<div class='alert alert-danger mt-4' role='alert'>
      Invalid Username/Password!
      </div>";

  }
  
  
  }

?>

                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>