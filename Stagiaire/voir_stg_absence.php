
    <?php 
    
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
    <title>Dashboard</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/4f3ff79e41.js" crossorigin="anonymous"></script>
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    </head>
<style>
    .boxes{
        font-family: 'Poppins', sans-serif;
        font-family: 'Alkatra', cursive;
        font-weight: bolder;
        color: #56ff00;
        -webkit-text-stroke: 1px #40bf20;
    }
</style>
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
                <h1 class="h3 mb-0 text-gray-800">Suivre Vos Absences</h1>
                <ol class="breadcrumb fs-6">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Suivre Vos Absences</li>
                </ol>
            </div>

            <div class="row">
                <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold fs-5 text-primary">Sélectionner un Groupe </h6>
<?php
    // $query = "SELECT * FROM filière";
    // $fill = $conn->query($query);

    // $query1 = "SELECT * FROM groupe";
    // $res1 = $conn->query($query1);

    if(isset($_GET['semain_de'])){        
        $_SESSION['semain_de'] = $_GET['semain_de'];
    }
?>

                    </div>
                    <div class="card-body">
                    
                        <div class="form-group row mb-3">
                            <div class="col  text-center">
                            <?php
                                            if(isset($_SESSION['id_g'])){
                                                $gp1 = $_SESSION['id_g'];
                                                $sql = "SELECT Nom_grp from groupe where id_grp=$gp1";
                                                $res = $conn->query($sql);
                                                $row = $res->fetch_assoc();
                                                $nom_grp = $row['Nom_grp'];
                                            }
                                        ?>        

                                        <h2 class="font-monospace"> <b>Groupe :</b> <?php if(isset($nom_grp)){
                                            if(isset($_SESSION['semain_de'])){
                                                echo$nom_grp;echo ' / '.$_SESSION['semain_de'];
                                            }else{
                                                echo$nom_grp;echo ' / ';
                                            }
                                            } ?></h2>
                            
                            
                                    
                                <hr class="" style="border-top: 5px solid cyan ;">

                                <div class="col text-center">
                                    <span class="text-danger ml-2">*</span>
                                    <select required class="form-select w-25 d-inline" onchange="setYear(this.value)" value="" name="semain_de" id="year">
                                        <option value="">Année de formation ?</option>
                                            <?php
                                                $sql = "SELECT distinct `year` from absence";
                                                $res2 = $conn->query($sql);

                                                while($row = $res2->fetch_assoc()){
                                                    $year = $row['year'];
                                                    echo "<option value=$year> $year </option>";
                                                }
                                            ?>
                                    </select>
                            
                            <form method="GET">            
                                </div>
                                <div class="col text-center">
                                    <span class="text-danger ml-2">*</span>
                                    <select required class="form-select w-25 d-inline " value="" name="semain_de" id="week">
                                        <option value="">Semaine du ?</option>
                                            <?php
                                                $stg = $_SESSION['userId'];
                                                $sql = "SELECT distinct sumain_du from absence where id_stg = $stg";
                                                $res = $conn->query($sql);

                                                while($row = $res->fetch_assoc()){
                                                    $sem = $row['sumain_du'];
                                                    echo "<option value=$sem> $sem </option>";
                                                }
                                            ?>
                                    </select>
                                    
                                </div>
                                
                            
                        </div>
                            
                            
                        </div>
                        <div class="col text-center">
                            <button type="submit" name="view" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                    </div>
                </div>

                <!-- Input Group -->
        <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold fs-5 text-primary">List des Absences</h6>
                        </div>
                            <div class=" p-3">
                                <div class="row">
                                    <div class="row text-center m-4 ">
                                        
                                        
                                    </div>
                                </div>

                                
                                <?php
                                    if (isset($_SESSION['semain_de']) && isset($_SESSION['userId'])) {                                        
                                        echo '<input type="hidden" id="semain" value="'.$_SESSION['semain_de'].'">';
                                        echo '<input type="hidden" id="id_stg" value="'.$_SESSION['userId'].'">';
                                    }
                                ?>

                        <?php if(isset($_SESSION['semain_de'])): ?>
                                <div class="row table-responsive">
                                        <table  class="table  table-hover table-striped table-bordered text-center ">
                                            <thead>
                                            
                                            
                                            <tr>
                                                <th class="fs-5 text-primary">Jour</th>
                                                <th class="p-0 pb-2 font-monospace">8-10</th>
                                                <th class="p-0 pb-2 font-monospace">10-12</th>
                                                <th class="p-0 pb-2 font-monospace">2-4</th>
                                                <th class="p-0 pb-2 font-monospace">4-6</th>                                                

                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                        <?php
                                                if(isset($_SESSION['id_g']) && isset($_SESSION['userId']))
                                                        {
                                                            $grp = $_SESSION['id_g'];
                                                            $id_et = $_SESSION['userId'];
                                                            $sem = $_SESSION['semain_de'];
                                                            
                                                            $query = "SELECT * from stagiaires where id_g = $grp and id_etudiant = $id_et";
                                                            $res = $conn -> query($query);
                                                        }

                                                            while($row = $res->fetch_assoc()){

                                                                $id = $row['id_etudiant'];
                                                                $row['Nom'] = str_replace(' ', '-', $row['Nom']);

                                                                $fName = $row['Nom'].'_'.$row['Prenom'].'_'.(!empty($row['Prenom2']) ? '_'.$row['Prenom2'] : '*');

                                                                $fName_no_ = str_replace( '*',' ',str_replace( '_', ' ', $fName));
                                                            echo "
                                                            <tr >
                                                                <th > Lundi </th>
                                                                
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"lundi_matin_8_10_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"lundi_matin_10_12_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"lundi_après-midi_2_4_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"lundi_après-midi_4_6_{$fName}_{$sem}_$id\">P</td>
                                                            </tr>  
                                                            
                                                            <tr >
                                                                <th > Mardi </th>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"mardi_matin_8_10_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"mardi_matin_10_12_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"mardi_après-midi_2_4_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"mardi_après-midi_4_6_{$fName}_{$sem}_$id\">P</td>
                                                            </tr>  
                                                            
                                                            <tr >

                                                                <th > Mercredi </th>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"mercredi_matin_8_10_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"mercredi_matin_10_12_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"mercredi_après-midi_2_4_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"mercredi_après-midi_4_6_{$fName}_{$sem}_$id\">P</td>
                                                            </tr> 

                                                            <tr >
                                                                <th > Jeudi </th>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"jeudi_matin_8_10_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"jeudi_matin_10_12_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"jeudi_après-midi_2_4_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"jeudi_après-midi_4_6_{$fName}_{$sem}_$id\">P</td>
                                                            </tr> 

                                                            <tr >
                                                                <th > Vendredi </th>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"vendredi_matin_8_10_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"vendredi_matin_10_12_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"vendredi_après-midi_2_4_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"vendredi_après-midi_4_6_{$fName}_{$sem}_$id\">P</td>
                                                            </tr> 
                                                            <tr >
                                                                <th > Samedi </th>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"samedi_matin_8_10_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"samedi_matin_10_12_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"samedi_après-midi_2_4_{$fName}_{$sem}_$id\">P</td>
                                                                <td style=\"text-align: center; vertical-align: middle;\"><h4 class='boxes' name=\"samedi_après-midi_4_6_{$fName}_{$sem}_$id\">P</td>
                                                                </tr> 

                                                            
                                                                ";
                                                            }
                                        ?>
                                            
                                            
                                            <!-- Add more rows as needed -->
                                            </tbody>
                                        </table> 
                                </div>
                                <?php
                                endif;
                                ?>
                            </div>
                    </div>
                </div>
        </div>
            </div>
            

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
    <script src="./js/view_stg_Abs.js"></script>
    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable(); // ID From dataTable 
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });

                ///////////////////////////////////////////////////

    
    </script>
    </body>

    </html>