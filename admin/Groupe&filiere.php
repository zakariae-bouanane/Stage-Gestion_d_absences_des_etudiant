
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
    <link href="img/logo/download.jpg" rel="icon">
    <?php include 'includes/title.php';?>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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
                <h1 class="h3 mb-0 text-gray-800">Groupe & Filière</h1>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Groupe & Filière</li>
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
                        <h6 class="m-0 font-weight-bold text-primary fs-5">Groupe & Filière</h6>
                        
                        <div class="d-flex align-items-center ms-6 me-3 ">
                            <a style="text-decoration: none;" href="./AjouterGroupe&filiere.php" class="text-success fs-5 fw-bold">Ajouter <i class="fa-solid fa-users pl-2"></i><i class="fa-solid fa-add pl-1 fs-6"></i></a>
                        </div>
                    </div>
                    <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                        <tr>
                            <th>Filière</th>
                            <th >Groupe</th>
                        </tr>
                        </thead>
                        
                        <tbody>

                    <?php
                        $query = "SELECT * from filière";
                        $rs = $conn->query($query);
                        $num = $rs->num_rows;
                        
                        if($num > 0)
                        { 
                            while ($rows = $rs->fetch_assoc())                                   
                            {                    
                                $rs3 = $conn->query('SELECT COUNT(*) as total FROM `groupe` where id_fill ='.$rows['id_fill']);   
                                $tot = $rs3->fetch_assoc();
                                $colspan = $tot['total']+1;

                                echo"
                                <tr>
                                    <td class='fs-5' style=\"vertical-align: middle;border-bottom: 2px solid black;\" rowspan='$colspan'>".$rows['Nom_fill']."</td>                                    
                                "; 
                                
                                $rs2 = $conn->query('SELECT *  FROM `groupe` where id_fill ='.$rows['id_fill'].' ORDER BY anne');   
                                $myBool = true;
                                $c=0;
                                $len = mysqli_num_rows($rs2);

                                while($rows2 = $rs2->fetch_assoc())
                                {
                                    
                                    if($c == 0){
                                        echo"                                        
                                            <tr>
                                                <td class='fs-5' style=\"border-top:2px solid black;\">".$rows2['Nom_grp']."</td> 
                                            </tr>
                                        "; 
                                    }elseif($c == $len-1){
                                        echo"                                        
                                            <tr>
                                                <td class='fs-5' style=\"border-bottom:2px solid black;\">".$rows2['Nom_grp']."</td> 
                                            </tr>
                                        "; 
                                    }
                                    else{
                                        echo"
                                            <tr>
                                                <td class='fs-5'>".$rows2['Nom_grp']."</td> 
                                            </tr>
                                    "; 
                                    }
                                    $c++;
                                }

                                echo"
                                </tr>                                                             
                                "; 
                            }
                        }
                        else
                        {
                                echo   
                                "<div class='alert alert-danger' role='alert'>
                                    Aucun enregistrement n'a été trouvé !
                                </div>";
                        }
                        
                        ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
                </div>
            </div>
            <!--Row-->

            

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
        $(document).ready(function () {
        $('#dataTable').DataTable(); // ID From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });

        
    </script>
    </body>

    </html>