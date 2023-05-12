
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

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
                    <li class="breadcrumb-item"><a href="./Groupe&filiere.php">Groupe & Filière</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ajouter</li>
                </ol>
            </div>

            <div class="row">
                <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary fs-5">Groupe & Filière</h6>

                        <div class="d-flex align-items-center ms-6 me-3 ">
                            <a style="text-decoration: none;" href="./Groupe&filiere.php" class="text-danger fs-5 fw-bold">Retourner <i class="fa-solid fa-backward"></i></a>
                        </div>
                    </div>

                    <div class="form-group m-4">
                            <label class="fs-5 fw-bold"  for="fil"> Filiere :</label> <input class="" name="fil" type="text" id="fil" oninput="SetLabel(this)">
                            <button class="btn btn-success btn-sm mb-1" onclick="setTable()">Ajouter</button>
                    </div>


                    <div class="table-responsive">
                                <table class="table p-3 m-3 table-stripped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            <span class="label fs-5"></span>
                                            <span class="fs-5">1ère année</span> <span class="th"></span>                                                              
                                            
                                        </th>
                                        <th class="text-center">
                                        <span class="label fs-5"></span>
                                            <span class="fs-5">2ème année</span> <span class="th"></span> 
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <ul class="content">
                                                
                                            </ul>
                                        </td>

                                        <td>
                                            <ul class="content">
                                                
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                        <div class="d-flex justify-content-center m-3" id="sub">
                            <button class="btn btn-danger" onclick="submitData(event)">Soumettre</button>
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
        $('#dataTable').DataTable(); // class From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });

        
    </script>

<script src="./js/Grp&fil.js">
    
</script>
    </body>

    </html>