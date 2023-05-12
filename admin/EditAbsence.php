
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
                <li class="breadcrumb-item"><a href="./AddAbsence.php">Ajouter l'absences</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gérer les Absences</li>
                </ol>
            </div>

            <div class="row">
                <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    
    
            <form method="post" action="absence_add.php">      <!-- Input Group -->
                <div class="row" >
                <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-2 font-weight-bold fs-5 text-primary">Supprimer l'absence</h6>

                        <div class="d-flex">
                            <div class="d-flex align-items-center ms-4 me-3">
                               <a style="text-decoration: none;" href="./AddAbsence.php" class="text-success fs-5 fw-bold">Ajouter <i class="fa-solid fa-calendar"></i> <i class="fa-solid fa-add pl-1 fs-6"></i></a>
                            </div> 
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

    function removeAbs(elem)
        {
            if(confirm("Vérifier avant d'effectuer des modifications")){
                var xhttp ;
                let name = elem.name;

                xhttp = new XMLHttpRequest();

                xhttp.onreadystatechange = function()
                {
                    if (this.readyState == 4 && this.status == 200) {                    
                        elem.setAttribute('disabled', '')
                }}
                console.log(name);
                xhttp.open("GET" , `EditedAbsence.php?abs=${name}` , true)
                xhttp.send()
            }else{
                elem.checked = true;
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


    if (val !== null) {
    var xhttp ;

    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(xhttp.responseText);
            
            boxes = document.getElementsByClassName('boxes')
            
            Array.from(boxes).map((e)=>{
                data.map((i)=>{
                    if(e.name == i){
                        e.checked = true 
                        e.setAttribute('onclick','removeAbs(this)')
                    }                    
                })
                if(e.checked == false ){
                    
                        e.setAttribute('disabled', '')
                        
                    
                }
            })
    }}

    xhttp.open("GET" , `Load_Abs_stg2.php?grp=${val}&sem=${val2}` , true)
    xhttp.send()
    }

    

    </script>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>

    </html>