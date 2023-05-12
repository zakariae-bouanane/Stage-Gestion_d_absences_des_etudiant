
    <?php 
        
        include '../includes/Db_conn.php';
        include '../includes/session.php';
        
if(!isset($_GET['id'])){
    echo "<script type = \"text/javascript\">
        window.location = (\"SelectPage.php\");
        </script>";
}
    $query = "SELECT * FROM filière";
    $fill = $conn->query($query);



    $query1 = "SELECT * FROM groupe";
    $res1 = $conn->query($query1);
    

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
    <?php include 'includes/title.php';?>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
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
    <?php
        if($id == 0):
    ?>
            
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Importer</h1>
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./SelectPage.php">Select page</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Importer / Exporter</li>
                    </ol>
                </div>

            <div class="row">
                <div class="col-lg-12">
                <!-- Form Basic -->


                <!-- Input Group -->
            <div class="row">
                <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary fs-5"> Via Excel </h6>
                    <?php
                                        
                                        if (isset($_SESSION['exp_err'])) {
                                            $msg = $_SESSION['exp_err'] ;
                                                echo"
                                                    <div class=\"m-0 alert bg-warning align-self-end alert-dismissible fade show\" role=\"alert\">
                                                        <strong class='text-light'>$msg!</strong> 
                                                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                                                    </div>
                                                ";
                                                unset($_SESSION['exp_err']);
                                        }
                                        ?>
                    </div>
            
                    
            <div class="row p-3 text-center">
                    <div>
                        <span class="text-danger ml-2">*</span>
                        <select name="my_dropdown1" required onchange="updateDrop()" id="first_drop" class="form-select w-25 d-inline" aria-label="Default select example">
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
                            
                    <form method="post" class="d-inline" action="importExcel.php" enctype="multipart/form-data">                        
                            <span class="text-danger ml-2">*</span>        
                            <select name="groupe" required id="second_drop" class="form-select w-25 d-inline " aria-label="Default select example">
                                <option value="">-- Groupe --</option>
                                <?php
                                            while ($row = $res1->fetch_assoc()) {
                                                $id_g = $row['id_grp']; 
                                                $nom_g = $row['Nom_grp']; 
                                                $id_fill = $row['id_fill']; 
                                                    
                                                echo "<option name='$id_fill' value=$id_g> $nom_g </option>";
                                            }
                                ?>
                            </select>
                    </div>
<?php
if(isset($_SESSION['succ_message'])) {
    $message = $_SESSION['succ_message'];
    $clr = 'bg-success';
    unset($_SESSION['succ_message']); 
    
}elseif(isset($_SESSION['err_message'])) {
    $message = $_SESSION['err_message'];
    $clr = 'bg-danger';
    unset($_SESSION['err_message']); 

}elseif(isset($_SESSION['warning_message'])){
    $message = $_SESSION['warning_message'];
    $clr = 'bg-warning';
    unset($_SESSION['warning_message']);  
}
?>
                    <div class="p-4 text-center">                      
                        <div  class="col mr-4 pb-4">
                            <input type="file" style="margin-left: 121px;" name="excel" accept=".xlsx,.xlsm,.xlsb,.xltx">
                        </div>
                        <div class="col ">
                            <button type="submit" class="btn btn-success" name="import" title="( xlsx , xlsm , xlsb , xltx ) Only">import</button>
                        </div>
                    </div>

                    <?php if(isset($message)): ?>
                        <div class="col d-flex align-items-center justify-content-center">
                            <div  class=' mt-3 alert <?php echo $clr ?> alert-dismissible fade show' role='alert'>
                                    <strong class='text-light '><?php echo $message ?></strong> 
                                    <button type='button' class='btn-close btn-light' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>

                    <?php endif; ?>
                    
                    </div>
                    </div>
                </div>

        </form>

        <?php
            endif;
        ?>

        <?php
            if($id == 1):
        ?>

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Importer</h1>
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./SelectPage.php">Select page</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Importer</li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary p-3 fs-5"> Manuellement </h6>
                                        
                                    <?php
                                        
                                        if (isset($_SESSION['success']) && $_SESSION['success'] == 1) {
                                            // echo "<div class='w-25 mt-3 alert alert-success align-self-start' role='alert'>                                                   
                                            //     </div>";
                                                echo"
                                                    <div class=\"m-0 alert bg-success align-self-start alert-dismissible fade show\" role=\"alert\">
                                                        <strong class='text-light'> Ajouté avec succès !</strong> 
                                                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                                                    </div>
                                                ";
                                                unset($_SESSION['success']);
                                        }elseif (isset($_SESSION['success']) && $_SESSION['success'] == 2) {
                                            echo "<div class=\"m-0 alert bg-danger align-self-start alert-dismissible fade show\" role=\"alert\">
                                                        <strong class='text-light'> id_etudiant existe déjà !</strong> 
                                                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                                                </div>"; 
                                                unset($_SESSION['success']);
                                        }elseif (isset($_SESSION['success']) && $_SESSION['success'] == 0) {
                                            echo "<div class=\"m-0 alert bg-success align-self-start alert-dismissible fade show\" role=\"alert\">
                                                        <strong class='text-light'>Quelque chose s'est mal passé !</strong> 
                                                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                                                </div>"; 
                                                unset($_SESSION['success']);
                                        }
                                ?>
                            </div>

                            
                            <div class="container mt-3 pb-3 d-flex" style="justify-content: space-evenly;">   

                            <?php
                                    $query = "SELECT * FROM filière";
                                    $fill = $conn->query($query);
                                    $query1 = "SELECT * FROM groupe";
                                    $res1 = $conn->query($query1);
    
                            ?>

                            <form  method="post" class="text-center" action="saveStg.php">
                                
                                <div class="d-flex justify-content-center" >
                                            
                                        <select name="my_dropdown1" required onchange="updateDrop2()" id="first_drop2" class="text-center form-select" aria-label="Default select example">
                                            
                                            <option value="">-- Filière --</option>
                                            <?php
                                                        while ($row2 = $fill->fetch_assoc()) {
                                                            $id_f = $row2['id_fill']; 
                                                            $nom_f = $row2['Nom_fill']; 
                                                                
                                                            echo "<option value=$id_f> $nom_f </option>";
                                                        }
                                            ?>
                                        </select>

                                        <select name="groupe2" required id="second_drop2" class="text-center form-select " aria-label="Default select example">
                                            <option value="">-- Groupe --</option>
                                            <?php
                                                        while ($row = $res1->fetch_assoc()) {
                                                            $id_g = $row['id_grp']; 
                                                            $nom_g = $row['Nom_grp']; 
                                                            $id_fill = $row['id_fill']; 
                                                                
                                                            echo "<option name='$id_fill' value=$id_g> $nom_g </option>";
                                                        }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- cross-site request attacks Handler -->
                                    <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
                                        
                                    
                                        <div class=" mb-3 ">
                                            <input type="number" class="form-control  " minlength="6"  required placeholder="ID_etudiant" name="id_et">
                                        </div>
                                        <div class="mb-3">                                            
                                            <input type="number" class="form-control " required  placeholder="Matricule" name="matricule">
                                        </div>
                                        <div class="mb-3">                                            
                                            <input type="text" class="form-control " required  placeholder="Nom" name="nom">
                                        </div>
                                        <div class="mb-3">                                            
                                            <input type="text" class="form-control " required  placeholder="Prenom" name="prenom">
                                        </div>
                                        <div class="mb-3">                                            
                                            <input type="text" class="form-control " placeholder="Prenom2" name="prenom2">
                                        </div>
                                        <div class="mb-3 d-flex align-items-center">                                            
                                            <small>Date de Naissance</small><input type="date" class="form-control" required  name="datedenaissance">
                                        </div>

                                        <div class="mb-3">                                            
                                            <select name="actif" required class="form-select" id="">
                                                <option  >-- Actif ? --</option>
                                                <option value="oui">oui</option>
                                                <option value="non">non</option>
                                            </select>
                                        </div>
                                        
                                        <button type="submit" name="add" class="btn btn-primary mb-4">Add</button>                              
                                    
                                
                            
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>


                
            </div>
            

            </div>
            <!---Container Fluid end-->
    <?php
        endif;
    ?>

    <?php
        if($id == 2):
    ?>

            <!---Container Fluid2 start-->
            <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Exporter</h1>
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./SelectPage.php">Select page</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Exporter</li>
                        </ol>
                </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Form Basic -->
                            <?php
                                    $query2 = "SELECT * FROM filière";
                                    $fill1 = $conn->query($query2);
                                    $query11 = "SELECT * FROM groupe";
                                    $res3 = $conn->query($query11);
    
                            ?>
                            <!-- Exporter -->
                            <!-- Input Group -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card mb-4">
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary fs-5"> Excel</h6>
                                        </div>

                                        <div class="container p-3 d-flex justify-content-center">   
                                            <form action="ExportExcel.php"  method="post">                                                
                                                <div class="col">
                                                        <select onchange="updateDrop3()" id="first_drop3" class="text-center form-select" aria-label="Default select example">
                                                            <option value="">-- Filière --</option>
                                                            <?php
                                                                        while ($row2 = $fill1->fetch_assoc()) {
                                                                            $id_f = $row2['id_fill']; 
                                                                            $nom_f = $row2['Nom_fill']; 
                                                                                
                                                                            echo "<option value=$id_f> $nom_f </option>";
                                                                        }
                                                            ?>
                                                        </select>

                                                        <select name="groupe3" required id="second_drop3" class="text-center form-select " aria-label="Default select example">
                                                            <option value="">-- Groupe --</option>
                                                            <?php
                                                                        while ($row = $res3->fetch_assoc()) {
                                                                            $id_g = $row['id_grp']; 
                                                                            $nom_g = $row['Nom_grp']; 
                                                                            $id_fill = $row['id_fill']; 
                                                                                
                                                                            echo "<option name='$id_fill' value=\"$id_g-$nom_g\"> $nom_g </option>";
                                                                        }
                                                            ?>
                                                        </select>
                                                </div>        
                                                
                                                <div class="col mt-4 text-center">                                                    
                                                        <label for="export" class="fs-6 fw-bold">Télécharger sous forme de fichier excel : </label>
                                                        <input type="submit" class="btn btn-success" name="export" title="( .xls )" value="Export">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        
                    </div>
                

                </div>

        </div>

        <?php
            endif;
        ?>
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
        
        function updateDrop(){
                // Get the selected value from the first dropdown menu
                var selectedValue = document.getElementById("first_drop").value;                
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
        function updateDrop2(){
            // Get the selected value from the first dropdown menu
            var selectedValue = document.getElementById("first_drop2").value;
            // Hide all options in the second dropdown menu
            var options = document.getElementById("second_drop2").options;
            for (var i = 0; i < options.length; i++) {
                options[i].style.display = "none";           }
            // Show only the options that belong to the selected value in the first dropdown menu
            var selectedOptions = document.querySelectorAll(`option[name="${selectedValue}"]`);
            for (var i = 0; i < selectedOptions.length; i++) {
                selectedOptions[i].style.display = "block";
            }
            }
            function updateDrop3(){
            // Get the selected value from the first dropdown menu
            var selectedValue = document.getElementById("first_drop3").value;
            // Hide all options in the second dropdown menu
            var options = document.getElementById("second_drop3").options;
            for (var i = 0; i < options.length; i++) {
                options[i].style.display = "none";           }
            // Show only the options that belong to the selected value in the first dropdown menu
            var selectedOptions = document.querySelectorAll(`option[name="${selectedValue}"]`);
            for (var i = 0; i < selectedOptions.length; i++) {
                selectedOptions[i].style.display = "block";
            }
            }

        $(document).ready(function () {
        $('#dataTable').DataTable(); // ID From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>

    </body>




    </html>