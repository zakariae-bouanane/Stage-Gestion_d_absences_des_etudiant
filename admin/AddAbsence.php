
<?php 
error_reporting(0);
include '../includes/Db_conn.php';
include '../includes/session.php';



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../img/logo/download.jpg" rel="icon">
  <?php include 'includes/title.php';?>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/check-style.css">
  <link rel="stylesheet" href="./css/my-style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    
  </style>
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
      <?php include "Includes/sidebar.php";?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include "Includes/topbar.php";?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gérer les Absences</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Gérer les Absences</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-2 font-weight-bold fs-5  text-primary">Sélectionner un Groupe</h6>
                    
                </div>
                <div class="card-body">
<?php
$query = "SELECT * FROM filière";
$fill = $conn->query($query);

$query1 = "SELECT * FROM groupe";
$res1 = $conn->query($query1);
?>
                  
                    <div class="form-group row mb-3 text-center">
                  
                          <div class="mb-2">
                            <span class="text-danger ml-2">*</span>
                              <select name="my_dropdown1" required onchange="updateDrop()" id="first_drop" class="form-select w-25 d-inline mr-4" aria-label="Default select example">
                                      <option value="">--Filière--</option>
                                      <?php
                                                  while ($row1 = $fill->fetch_assoc()) {
                                                      $id_f = $row1['id_fill']; 
                                                      $nom_f = $row1['Nom_fill']; 
                                                          
                                                      echo "<option value=$id_f> $nom_f </option>";
                                                  }
                                      ?>
                                  </select>
                          </div>
                        
<?php
  if(isset($_GET['groupe']) and isset($_GET['abs_semain'])){
    $_SESSION['grp'] = $_GET['groupe'];

    $date = $_GET['abs_semain']; // input date in YYYY-MM-DD format
    $day_of_week = date('N', strtotime($date)); // get the day of the week as a number (1=Monday, 2=Tuesday, etc.)
    if ($day_of_week == 1) { // if the input date is a Monday
      $_SESSION['abs_sem'] = $date; // then the output is the same date
    } else { // otherwise
      $_SESSION['abs_sem'] = date('Y-m-d', strtotime('last monday', strtotime($date))); // get the last Monday before the input date
    }

  }
?>                      
                  <form method="get">
                          
                              <span class="text-danger ml-2">*</span>
                                  <select name="groupe" required id="second_drop" class="form-select w-25 d-inline " aria-label="Default select example">
                                      <option value="">-- Groupe --</option>
                                      <?php
                                                  while ($row = $res1->fetch_assoc()) {
                                                      $id_g = $row['id_grp']; 
                                                      $nom_g = $row['Nom_grp']; 
                                                      $id_fill = $row['id_fill']; 
                                                          
                                                      if($id_g==$_SESSION['grp']){
                                                        echo "<option selected name='$id_fill' value=$id_g> $nom_g </option>";
                                                      }else{
                                                        echo "<option name='$id_fill' value=$id_g> $nom_g </option>";
                                                      }
                                                      
                                                  }
                                      ?>
                                  </select>
                              
                            
                            <!-- entere date section -->
                                <div class="container mt-4 mb-4 text-center">
                                  
                                  <div class="row d-flex align-items-center justify-content-center">
                                      <label for="" class="input-group-text w-25 "><b>Entrez la date</b></label>
                                      
                                  </div>
                                  <div class="row  d-flex align-items-center justify-content-center">
                                      <input type="date" value="<?php echo $_SESSION['abs_sem']; ?>" required name="abs_semain" class="form-control w-25" id="">
                                  </div>
                                  
                                </div>
                              <!-- entre end -->
                        </div>
                        <div class="col text-center">
                          <button type="submit" name="view" class="btn btn-primary">Sélectionner</button>
                        </div>
                  </form>

                </div>
              </div>
<?php
if(isset($_SESSION['succ_message'])) {
    $message = $_SESSION['succ_message'];
    $clr = 'alert-success';
    unset($_SESSION['succ_message']);    
}elseif(isset($_SESSION['err_message'])) {
  $message = $_SESSION['err_message'];
  $clr = 'alert-danger';
  unset($_SESSION['err_message']);    
}
?>
        <form method="post" action="absence_add.php">      <!-- Input Group -->
            <div class="row" >
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-2 font-weight-bold fs-5 text-primary">Ajouter l'absence</h6>
                  
                <div class="d-flex">   
                  
                    <?php if(isset($message)): ?>
                        <div class="alert mb-0 <?php echo $clr; ?> d-flex align-items-center" role="alert">
                            <div class="me-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                  <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                </svg>
                            </div>
                          
                          <div>
                              <?php echo $message; ?>
                          </div>
                        </div>
                      <?php endif; ?>

                  <?php if(isset($_SESSION['grp'])): ?>
                    <div class="d-flex align-items-center ms-4 me-3">
                      <a href="./EditAbsence.php" style="text-decoration: none;" class="text-danger fs-5 fw-bold"> Supprimer <i class="fa-solid fa-trash"></i></a>
                    </div> 
                  <?php endif; ?>          
                  </div>
                  
                </div>
        
        

                <div class="row text-center m-4 ">
                  <?php
                    if(isset($_SESSION['grp'])){
                        $gp = $_SESSION['grp'];
                        $sql = "SELECT Nom_grp from groupe where id_grp=$gp";
                        $res = $conn->query($sql);
                        $row = $res->fetch_assoc();
                        $nom_grp = $row['Nom_grp'];
                    }
                  ?>
                  <h2 class="font-monospace"> <b>Groupe :</b> <?php if(isset($nom_grp)){
                    echo$nom_grp;
                    if(isset($_SESSION['abs_sem'])){
                      echo ' / '.$_SESSION['abs_sem'];
                    }
                    } ; ?></h2>
                  
                </div>
                
<?php
      if (isset($_SESSION['grp']) && isset($_SESSION['abs_sem'])) {
        echo '<input type="hidden" id="my-variable" value="' . $_SESSION['grp'] . '">';
        echo '<input type="hidden" id="my-variable2" value="' . $_SESSION['abs_sem'] . '">';
    }
?>
                
        <div class="table-responsive p-3">
        <?php if(isset($_SESSION['grp'])): ?>
            <table class="table table-hover table-striped table-bordered text-center align-items-center" >
                    <thead>                    
                      <tr>    
                          <th></th>
                          <th colspan="4" class="p3">Lundi</th>
                          <th colspan="4" class="p3">Mardi</th>
                          <th colspan="4" class="p3">Mercredi</th>
                          <th colspan="4" class="p3">Jeudi</th>
                          <th colspan="4" class="p3">Vendredi</th>
                          <th colspan="4" class="p3">Samedi</th>
                      </tr>
                      <tr>
                      <th>Nom&Prenom</th>
                          
                          <th class="p-0 p2 p pb-2 font-monospace">8-10</th>
                          <th class="p-0 p2 p pb-2 font-monospace">10-12</th>
                          <th class="p-0 p2 p pb-2 font-monospace">2-4</th>
                          <th class="p-0 p2 p pb-2 font-monospace">4-6</th>

                          <th class="p-0 p2 p pb-2 font-monospace">8-10</th>  
                          <th class="p-0 p2 p pb-2 font-monospace">10-12</th>
                          <th class="p-0 p2 p pb-2 font-monospace">2-4</th>
                          <th class="p-0 p2 p pb-2 font-monospace">4-6</th>

                          <th class="p-0 p2 p pb-2 font-monospace">8-10</th>
                          <th class="p-0 p2 p pb-2 font-monospace">10-12</th>
                          <th class="p-0 p2 p pb-2 font-monospace">2-4</th>
                          <th class="p-0 p2 p pb-2 font-monospace">4-6</th>

                          <th class="p-0 p2 p pb-2 font-monospace">8-10</th>
                          <th class="p-0 p2 p pb-2 font-monospace">10-12</th>
                          <th class="p-0 p2 p pb-2 font-monospace">2-4</th>
                          <th class="p-0 p2 p pb-2 font-monospace">4-6</th>

                          <th class="p-0 p2 p pb-2 font-monospace">8-10</th>
                          <th class="p-0 p2 p pb-2 font-monospace">10-12</th>
                          <th class="p-0 p2 p pb-2 font-monospace">2-4</th>
                          <th class="p-0 p2 p pb-2 font-monospace">4-6</th>

                          <th class="p-0 p2 p pb-2 font-monospace">8-10</th>
                          <th class="p-0 p2 p pb-2 font-monospace">10-12</th>
                          <th class="p-0 p2 p pb-2 font-monospace">2-4</th>
                          <th class="p-0 p2 p pb-2 font-monospace">4-6</th>

                          
                      </tr>
                    </thead>

                    <tbody>
    <?php

      if(isset($_SESSION['grp']) ){
            
        $selectedGroup = $_SESSION['grp'];
        
        

            $query = "SELECT * from stagiaires where id_g = $selectedGroup";
            $res = $conn -> query($query);
            
                            while($row = $res->fetch_assoc()){
                                $sem = $_SESSION['abs_sem'];

                                $id = $row['id_etudiant'];
                                $row['Nom'] = str_replace(' ', '-', $row['Nom']);

                                $fName = $row['Nom'].'_'.$row['Prenom'].'_'.(!empty($row['Prenom2']) ? '_'.$row['Prenom2'] : '*');

                                $fName_no_ = str_replace( '*',' ',str_replace( '_', ' ', $fName));
                            echo "
                            <tr>
                                <td class='p4'> $fName_no_ </td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"lundi_matin_8_10_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"lundi_matin_10_12_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"lundi_après-midi_2_4_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"lundi_après-midi_4_6_{$fName}_{$sem}_$id\"></td>

                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"mardi_matin_8_10_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"mardi_matin_10_12_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"mardi_après-midi_2_4_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"mardi_après-midi_4_6_{$fName}_{$sem}_$id\"></td>
                                
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"mercredi_matin_8_10_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"mercredi_matin_10_12_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"mercredi_après-midi_2_4_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"mercredi_après-midi_4_6_{$fName}_{$sem}_$id\"></td>

                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"jeudi_matin_8_10_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"jeudi_matin_10_12_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"jeudi_après-midi_2_4_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"jeudi_après-midi_4_6_{$fName}_{$sem}_$id\"></td>

                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"vendredi_matin_8_10_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"vendredi_matin_10_12_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"vendredi_après-midi_2_4_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"vendredi_après-midi_4_6_{$fName}_{$sem}_$id\"></td>

                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"samedi_matin_8_10_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"samedi_matin_10_12_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"samedi_après-midi_2_4_{$fName}_{$sem}_$id\"></td>
                                <td style=\"text-align: center; vertical-align: middle;\" class='p'><input class='boxes form-check-input' type=\"checkbox\" name=\"samedi_après-midi_4_6_{$fName}_{$sem}_$id\"></td>

                            </tr>
                                ";
                            }
        }

        

        
    ?>
                    
                    
                    <!-- Add more rows as needed -->
                </tbody>
            </table>          
          </div>

            <div style="display: flex;justify-content:center;" class="">
                    <input  type="submit" name="submit" onclick="return confirm('Vérifier avant d\'effectuer des modifications')" class="btn btn-danger m-3 mx-6" value="Save">
            </div>
            <?php
              endif;
            ?>
      </div>
    </div>
    
    </div>
  </div>
</form>
        
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
    <?php include "Includes/footer.php";?>
      <!-- Footer -->
    
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
    <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
  
  <!-- Page level custom scripts -->
  <script>
    function confirmf(e){
          let bool =  confirm(' Are you sure ? ')
          if(!bool){
              e.preventDefault()
          }else{

          }
      }
      

    let tds = document.querySelectorAll('.p')
    let tds2 = document.querySelectorAll('.p4')
    let ths = document.querySelectorAll('.p2')
    let ths2 = document.querySelectorAll('.p3')
    
    var c = 0;
    //every 4 tds
    var c2 = 0;
    for(let k of ths2){
        k.style.border= '2px solid #00000073'
    }
    for(let k of tds2){
        k.style.borderTop= '2px solid #00000073'

    }

    for(let d of tds){
        d.style.borderBottom= '2px solid #00000073'
    }
    for(let j of ths){
        j.style.borderBottom = '2px solid #00000073'
    }

    for(let i of tds){        
        if(c == c2){
            i.style.borderLeft = '2px solid #00000073'
            c2 = c2+4;   
        }
        c++     
    }


    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });

    // set absence when groupe session is set
var val = document.getElementById("my-variable").value;
var val2 = document.getElementById("my-variable2").value;

console.log(val2)
console.log(val)

if (val !== null) {
  var xhttp ;

  xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200) {
          var data = JSON.parse(xhttp.responseText);
          
          boxes = document.getElementsByClassName('boxes')
        console.log(data);
          Array.from(boxes).map((e)=>{
              data.map((i)=>{
                  if(e.name == i){
                      e.checked = true
                      e.disabled = true
                  }
              })
          })
  }}

  xhttp.open("GET" , `Load_Abs_stg2.php?grp=${val}&sem=${val2}` , true)
  xhttp.send()
}

    
    function updateDrop(){
        // Get the selected value from the first dropdown menu
        var selectedValue = document.getElementById("first_drop").value
        // Hide all options in the second dropdown menu
        var options = document.getElementById("second_drop").options;
        for (var i = 0; i < options.length; i++) {
            options[i].style.display = "none";
        }
        // Show only the options that belong to the selected value in the first dropdown menu
        var selectedOptions = document.querySelectorAll(`option[name="${selectedValue}"]`);
        for (var i = 0; i < selectedOptions.length; i++) {
            selectedOptions[i].style.display = "block";
        }
}
  </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>

</html>