
    <?php 
    // error_reporting(0);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/selectStatus.css">
    
    </head>
<style>

</style>
<?php
    if(isset($_GET['stg'])){
        $_SESSION['currentStg'] = $_GET['stg'];
        $stg = $_SESSION['currentStg'];
        $query2 = $conn->query("SELECT Nom,Prenom,Nom_grp ,count(*) as ta FROM `stagiaires` s INNER JOIN `groupe` g on s.id_g = g.id_grp INNER JOIN `absence` a on s.id_etudiant=a.id_stg WHERE s.id_etudiant = $stg");
        $row = $query2->fetch_assoc();
        $F_Nom = ucfirst($row['Nom']).' '.ucfirst($row['Prenom']);
        $grp = $row['Nom_grp'];
        $totalA = $row['ta'];
    }
?>
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
                <h1 class="h4 mb-0 text-gray-800"> Total d'absences par :</h1>

                <h1 class="h4 mb-0 text-gray-800 text-center">                    
                    Stagiaire : <span class="text-dark"><?php echo $F_Nom.' / '.$grp ?></span>            
                    <p class="fs-5">total absence : <span class="text-dark"><?php echo $totalA ?></span></p>
                </h1>
                
                <ol class="breadcrumb fs-6">
                    <li class="breadcrumb-item"><a href="./viewStatus.php"><- Stagiaires</a></li>                    
                </ol>
            </div>

            <div class="row">
<?php
    $query = $conn->query("SELECT DISTINCT year FROM `absence` ORDER BY year");
    
    foreach($query as $data)
        {
            $years[] = $data['year'];            
        }
?>
                <div class="col-lg-12 d-flex justify-content-start mb-5 flex-wrap">
                
                    <div class="card mb-4  m-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold fs-5 text-primary">Mois en :</h6>
                        </div>
                        

                        <div class="card-body d-flex justify-content-center flex-wrap">
                                <?php
                                    $stg = $_SESSION['currentStg'];
                                    foreach($years as $year)
                                    {
                                        $query2 = $conn->query("SELECT count(*) as total FROM `absence` where id_stg = $stg and year = $year");
                                        $row = $query2->fetch_assoc();
                                        $total_y = $row['total'];

                                            echo "
                                            <div class=\"ct\">
                                                <a href=\"./stgStats.php?stg=$stg&year=$year&type=0&header=$year\">
                                                    <div class=\"option\">
                                                        <div class=\"logo-ct\">
                                                            $year
                                                        </div>  
                                                        <div class='text-center '>
                                                            <p class='m-0 p-0'>Total Ab : $total_y</p>
                                                        </div>
                                                    </div>
                                                </a>  
                                            </div>
                                            ";
                                    }
                                ?>
                        </div>
                    </div>
                </div>

<!-- second -->
<?php
$mois = array(
    1 => "Jan",
    2 => "Fév",
    3 => "Mar",
    4 => "Avr",
    5 => "Mai",
    6 => "Jui",
    7 => "Juil",
    8 => "Août",
    9 => "Sept",
    10 => "Oct",
    11 => "Nov",
    12 => "Déc"
);
?>
                <div class="col-lg-12 d-flex justify-content-start mb-5 flex-wrap">
                    
                    <div class="card mb-4 m-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold fs-5 text-primary">Semaine en : </h6><b class="text-warning fs-5">(<?php echo date('Y')-1 .'-'.date('Y');?>)</b>
                        </div>
                        
                        <div class="card-body d-flex justify-content-center flex-wrap">
                                    <?php
                                        $curr_year = date('Y');
                                        $cur = $curr_year-1;
                                        foreach ($mois as $num => $nom) 
                                        {
                                            $query3 = $conn->query("SELECT count(*) as total FROM `absence` 
                                                                    where id_stg = $stg and year in ($curr_year,$cur) and month(sumain_du) = $num");
                                            $row = $query3->fetch_assoc();
                                            $total_m = $row['total'];
                                            echo "
                                            <div class=\"ct\">
                                                <a href=\"./stgStats.php?stg=$stg&month=$num&year=$curr_year&type=1&header=$nom\">
                                                    <div class=\"option2\">
                                                        <div class=\"month text-center\">
                                                            $nom
                                                        </div>   
                                                        <div class='text-center'>
                                                            <p class='m-0 p-0 text-muted'> TA : $total_m</p>
                                                        </div>                                
                                                    </div>
                                                </a>                                
                                            </div>
                                            ";
                                        }
                                    ?>                        
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <script src="./js/viewAbs.js"></script>
    <script src="./js/table2excel.js"></script>
    
    <!-- Page level plugins -->

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable(); // ID From dataTable 
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });

                ///////////////////////////////////////////////////

    </script>
<script>
    // function setCss(num , elem){    

    //     if(num == 1){
    //         elem.style.padding= "15px"
    //         elem.style.filter= "grayscale(0%)"
    //         elem.classList.add('activeSelect')
    //         elem.style.border= "2px solid green"
    //     }else if(num == 2){
    //         elem.style.padding= "15px"
    //         elem.style.filter= "grayscale(0%)"
    //         elem.classList.add('activeSelect')
    //         elem.style.border= "2px solid blue"
    //         // elem.children[1].children[0].style.color = '#00d4ff'
    //     }
    // }

    // function remCss(num , elem){
    //     if(num == 1){
    //         elem.style.padding= "10px"
    //         elem.style.filter= "grayscale(100%)"
    //         elem.classList.remove('activeSelect')
    //         elem.style.border= "2px solid grey"
    //     }else if(num == 2){
    //         elem.style.padding= "10px"
    //         elem.style.filter= "grayscale(100%)"
    //         elem.classList.remove('activeSelect')
    //         elem.style.border= "2px solid grey"
    //         // elem.children[1].children[0].style.color = '#00d4ff'

    //     }
    // }
</script>
    </body>

    </html>