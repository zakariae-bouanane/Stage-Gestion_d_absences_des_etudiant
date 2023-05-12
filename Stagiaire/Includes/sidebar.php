<?php


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
          <i class="fas fa-user"></i>
          <span>Compte</span>
        </a>
        <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="light-blue py-2 collapse-inner rounded">
            <h6 class="collapse-header text-dark">Account</h6>
            <a class="collapse-item" href="stg_acc.php">Mon compte</a>
            
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
          <span>Mon absences</span>
        </a>
        <div id="collapseBootstrapcon" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="light-blue py-2 collapse-inner rounded">
            <h6 class="collapse-header  text-dark">L'absences</h6>
            <a class="collapse-item" href="voir_stg_absence.php">Suivre Mon absences</a>
            
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

            <a class="collapse-item" href="viewOneStat.php?stg=<?php echo $_SESSION['userId']; ?>">Les Statistiques</a>
            
            
          </div>
        </div>
      </li>
    </ul>