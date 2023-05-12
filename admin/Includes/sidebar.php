<?php
  

  $curr_admin_id = $_SESSION["userId"];
  $query = "SELECT isSuperAdmin from admins where id='$curr_admin_id'";
  $res = $conn->query($query);
  
  $rows = $res->fetch_assoc();

?>
<head>
  <style>
    #accordionSidebar{
      background-color: #1f2833;
    }
  </style>
</head>
<ul  class="navbar-nav sidebar vertical-side text-mine accordion" id="accordionSidebar">
      <a class="sidebar-brand one d-flex align-items-center justify-content-center" href="index.php">
        <div class="img-fluid" >          
            <img  src="./img/OFPPT.png" class="w-75 p-2 my-logo">       
          
        </div>
        
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Tableau de bord</span></a>
      </li> 
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
      Les Stagiaires
      </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
          aria-expanded="true" aria-controls="collapseBootstrap2">
          <i class="fas fa-user-graduate"></i>
          <span>Stagiaires</span>
        </a>
        <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="light-blue py-2 collapse-inner rounded">
            <h6 class="collapse-header text-dark">Gérer les stagiaires</h6>
            <a class="collapse-item fw-bold" href="viewStudents.php"><i class="fa-solid fa-eye me-1"></i> Les Stagiaires</a>
            <!-- <a class="collapse-item" href="excelhandler.php">Importer / Exporter</a> -->
            <a class="collapse-item fs-6" href="SelectPage.php"><i class="fa-solid fa-download "></i> / <i class="fa-solid fa-upload mr-2"></i> </a>
            
            <!-- <a class="collapse-item" href="#">Assets Type</a> -->
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
      Les Absences
      </div>
      </li>

      <li class="nav-item">
        <a class="nav-link  collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapcon"
          aria-expanded="true" aria-controls="collapseBootstrapcon">
          <i class="fa fa-calendar-alt"></i>
          <span>Absences</span>
        </a>
        <div id="collapseBootstrapcon" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="light-blue py-2 collapse-inner rounded">

            <h6 class="collapse-header  text-dark">Gérer les absences</h6>

            <a class="collapse-item fw-bold" href="ViewAbsence.php"><i class="fa-solid fa-eye me-1"></i> Les Absences</a>
            <a class="collapse-item fs-6" href="AddAbsence.php"><i class="fa-sharp fa-solid fa-plus fs-5 pt-1"></i> / <i class="fa-solid fa-trash mr-2"></i></a>           
            
          </div>
        </div>
      </li>


      <hr class="sidebar-divider">
      <div class="sidebar-heading">
      Les Statistiques
      </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapcon2"
          aria-expanded="true" aria-controls="collapseBootstrapcon2">
          <i class="fa-solid fa-chart-simple"></i>
          <span>Statistiques</span>
        </a>
        <div id="collapseBootstrapcon2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="light-blue py-2 collapse-inner rounded">

            <h6 class="collapse-header text-dark">Statistiques</h6>

            <a class="collapse-item fw-bold" href="viewStatus.php"><i class="fa-solid fa-eye me-1"></i> Les Statistiques</a>
            
            
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">


<?php if($rows['isSuperAdmin'] == 1): ?>

      <hr class="sidebar-divider" style="margin-top: 41px;">
      <div class="sidebar-heading ">
      Gestionnaires <b class="text-danger">(admin)</b>
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapassests"
          aria-expanded="true" aria-controls="collapseBootstrapassests">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Gérer les Gestionnaires</span>
        </a>
        <div id="collapseBootstrapassests" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="light-blue py-2 collapse-inner rounded">
            <h6 class="collapse-header  text-dark">Operations</h6>
            
              <a class="collapse-item text-danger fw-bold" href="ViewAdmins.php"><i class="fa-solid fs-6 fa-pen-to-square mr-1"></i> les Gestionnaires</a>
              
            
          </div>
        </div>
      </li>

<?php endif; ?>

      <hr class="sidebar-divider">
      
    </ul>