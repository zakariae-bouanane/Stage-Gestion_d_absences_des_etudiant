
<?php 
  error_reporting(0);
  if(isset($_SESSION['userId'])){
      $query = "SELECT * FROM stagiaires WHERE id_etudiant = ".$_SESSION['userId']."";
      $rs = $conn->query($query);
      $num = $rs->num_rows;
      $rows = $rs->fetch_assoc();
      $fullName = $rows['Nom'].' '.$rows['Prenom'].' '.$rows['Prenom2'];
  }

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
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
        
        
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="../img/user-icn.png" style="max-width: 60px;margin-right: 10px;">
                <span class="ml-2 d-none d-lg-inline my-blue small"><b>Bienvenue <?php echo $fullName;?></b></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
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