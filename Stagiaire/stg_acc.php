
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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
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
                <h1 class="h3 mb-0 text-gray-800">Account</h1>
                <ol class="breadcrumb fs-6">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Account</li>
                </ol>
            </div>
<?php
if(isset($_SESSION['msg'])){
    $message = $_SESSION['msg'];
    unset($_SESSION['msg']);    
}
?>
            <div class="row">
                <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold fs-5 text-primary">Edit Account</h6>
                    
                <?php if(isset($message)): ?>
                        <div class="alert mb-0 <?php echo 'bg-warning'; ?> d-flex align-items-center" role="alert">
                            <div class="me-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                </svg>
                            </div>
                        
                        <div>
                            <?php echo $message; ?>
                        </div>
                        </div>
                <?php endif; ?>
<?php
    // $query = "SELECT * FROM filière";
    // $fill = $conn->query($query);

    // $query1 = "SELECT * FROM groupe";
    // $res1 = $conn->query($query1);

    // if(isset($_GET['grp']) && $_GET['semain_de']){
    //     $_SESSION['view_grp'] = $_GET['grp'];
    //     $_SESSION['semain_de'] = $_GET['semain_de'];
    //     echo  $_SESSION['semain_de'];
    //     echo  $_SESSION['view_grp'];
    // }
?>

                    </div>
                    <form method="POST" action="edit_acc.php">
                        <div class="card-body">
                    
                            <div class="container form-group mb-3 d-flex justify-content-center flex-wrap">
                                <div class="row text-center flex-wrap ">

                                        <div class="row input-group mb-3  ">
                                            <span class="input-group-text text-center bg-info" id="basic-addon1">Login</span>
                                            <input type="text" name="login" min='1000' max='100000' class="form-control" value="<?php echo $_SESSION['login']; ?>" placeholder="ID" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        
                                        <div class="row input-group mb-3  ">
                                            <span class="input-group-text text-center bg-info" id="basic-addon1">Pass</span>
                                            <input type="Password" name="pass" id="pass" class="form-control" value="<?php echo $_SESSION['password']; ?>" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                                            
                                        </div>
                                        
                                        <div class="col text-center d-flex justify-content-center">
                                            <button class="btn btn-info" onclick="show(event)"><i class="fa fa-eye"></i></button>
                                        </div>
                                        

                            
                                        
                                </div>                       
                            </div>
                            <hr>
                            <div class="col text-center">
                                <button onclick="confirmf(event)" name="edit" class="btn btn-primary">Edit</button>
                            </div>
                    
                    </div>
                    </form>
                </div>
                <script>
                    function confirmf(e){
                        let bool =  confirm(' Are you sure ? ')
                        if(!bool){
                            e.preventDefault()
                        }else{

                        }
                    }
                </script>

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

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable(); // ID From dataTable 
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });

                ///////////////////////////////////////////////////
        function show(e){
                let pass = document.getElementById('pass')
                e.preventDefault()
                if(pass.type == 'password'){
                    pass.type = 'text' 
                }else{
                    pass.type = 'password'
                }
        }
    </script>
    </body>

    </html>