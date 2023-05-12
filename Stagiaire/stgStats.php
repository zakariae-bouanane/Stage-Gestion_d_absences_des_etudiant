
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/selectStatus.css"> -->
    <style>
        .chart {
            width: 700px;
        }

        @media screen and (max-width: 768px) {
            .chart{
                width: 500px;
            }
        }


        /* Large devices (laptops/desktops, 992px and up) */
        @media screen and (max-width: 600px) {
            .chart{
                width: 280px;
            }
        }

    </style>
    </head>
    <?php
    if(isset($_SESSION['currentStg']) && isset($_GET['year'])){
        $mois = array(
        'Jan'=> "Janvier",
        'Fév'=> "Février",
        'Mar'=> "Mars",
        'Avr'=> "Avril",
        'Mai'=> "Mai",
        'Jui'=> "Juin",
        'Juil'=> "Juillet",
        'Août'=> "Août",
        'Sept'=> "Septembre",
        'Oct'=> "Octobre",
        'Nov'=> "Novembre",
        'Déc'=> "Décembre"        
        );
        $stg = $_SESSION['userId'];
        $header = $_GET['header'];

        foreach($mois as $key => $value){
            if($header == $key){
                $header = $value;
            }
        }
    }
?>
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
                <h1 class="h3 mb-0 text-gray-800"> Statistiques : </h1>

                <h1 class="h4 mb-0 text-gray-800 text-center">                    
                    Stagiaire : <span class="text-dark"><?php echo $F_Nom.' / '.$grp ?></span>            
                    <p class="fs-5">total absence : <span class="text-dark"><?php echo $totalA ?></span></p>
                    <span class="text-dark"><?php echo $header ; ?></span>         
                </h1>

                <ol class="breadcrumb fs-6">
                    <li class="breadcrumb-item"><a href="./viewOneStat.php?stg=<?php echo$stg;?>">Select</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Statistiques</li>
                </ol>
            </div>

            <div class="row">
<?php 
    if(isset($_GET['type'])){

        $stg = $_GET['stg'];

        if($_GET['type']==0)
        {            
            $year = $_GET['year'];

            $query = $conn->query("
                SELECT 
                    MONTHNAME(sumain_du) as monthname,
                    count(*) as TotalAbs
                FROM absence
                WHERE id_stg = $stg and year = $year
                GROUP BY MONTHNAME(sumain_du)
                ORDER BY sumain_du
                ;");
        }       
        elseif($_GET['type']==1)
        {
            $mois = $_GET['month'];
            $year = $_GET['year'];

            $query = $conn->query("
                SELECT 
                    sumain_du as monthname,
                    count(*) as TotalAbs
                FROM absence
                WHERE id_stg = $stg and month(sumain_du) = $mois and year in ($year,$year-1)
                GROUP BY sumain_du
                ;
            ");
        }
    
        foreach($query as $data)
        {
            $month[] = $data['monthname'];
            $TotalAbs[] = $data['TotalAbs'];
        }
    

    }
?>
                <div class="col-lg-12 d-flex justify-content-center mb-5 flex-wrap">
                
                    <div class="card mb-4 m-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold fs-5 text-primary">Statistiques :</h6>
                        </div>

                        <div class="card-body d-flex justify-content-center ">
                            <div class="chart">
                                <canvas id="myChart">

                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>

<!-- second -->
                
            
            
<script>
    // === include 'setup' then 'config' above ===
    const labels = <?php echo json_encode($month) ?>;
    const data = {
        labels: labels,
        datasets: [{
        label: 'Total Absence',
        data: <?php echo json_encode($TotalAbs) ?>,
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
        ],
        borderWidth: 1
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        },
    };

    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
    </script>
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

    </body>

    </html>