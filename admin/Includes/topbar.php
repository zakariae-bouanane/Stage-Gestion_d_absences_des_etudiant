
<?php 

  $query = "SELECT * FROM admins WHERE id = ".$_SESSION['userId']."";
  $rs = $conn->query($query);
  $num = $rs->num_rows;
  $rows = $rs->fetch_assoc();
  $fullName = $rows['full_name'];

?>
<head>
  <style>
    
  </style>
</head>

<nav class="navbar navbar-expand bg-gradient-blue d-flex justify-content-between navbar-light topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars text-info"></i>
          </button>
        <div class="text-white big" style="margin-left:100px;"></div>
          <ul class="navbar-nav ml-auto">           
        
          <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="../img/user-icn.png" style="max-width: 60px;margin-right: 10px;">
                
                <span class="ml-2 d-none d-lg-inline my-blue small"><b>Bienvenue <?php echo $fullName;?></b></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="Groupe&filiere.php">
                  <!-- <i class="fas fa-user fa-sm fa-fw "></i> -->
                  <i class="fa-solid fa-users-rectangle mr-2 text-dark-400"></i>
                  Groupe & Filière
                </a><!--
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">
                <i class="fas fa-power-off fa-fw mr-2 text-danger"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>