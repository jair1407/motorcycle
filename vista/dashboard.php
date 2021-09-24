<?php


session_start();
if(!isset($_SESSION['nombreUsuario'])){
    header('Location:../index.html');
}
$nombre=$_SESSION['nombreUsuario'];
$rol=$_SESSION['IdRol'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>MotorCycle</title>
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
  </script>
</head>

<body class="sb-nav-fixed" style="background-color:white;">
<?php 
include "layout/navbar.php";
?>
  <div id="layoutSidenav">
  <?php include 'sidebar.php'; ?>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">         
        <div class="container-fluid px-4">
        <img src="../assets/img/LOGOMOTORCYCLE.PNG" width="270px" height="80px">
                    </div>
          <ol class="breadcrumb mb-4"style="background-color:#white;" >
            <li class="breadcrumb-item active" style="font-family:Courier New, Courier, monospace, sans-serif;  color:dark ;"><b>Gestión de ventas</b></li>
          </ol>      

          <div class="row" >
            <div class="col-xl-3 col-md-6">
              <div class="card   mb-3" style="font-family:Courier New, Courier, monospace, sans-serif;">   
              <a href="../vista/registrarVenta.php" type="button"  class="btn btn-dark text-white" <?php if($rol!=1 && $rol!=3){ ?> style="display: none;" <?php } ?>><i class="fas fa-shopping-basket" ></i> Registrar venta</ion-icon></a>            
              </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
              <div class="card   mb-3 "style="font-family:Courier New, Courier, monospace, sans-serif;">
              <a href="../vista/listarVenta.php" type="button"  class="btn btn-dark text-white" <?php if($rol!=1 && $rol!=3){ ?> style="display: none;" <?php } ?>><i class="fas fa-list-ul"></i> Lista de venta</ion-icon></a>                             
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card   mb-3"style="font-family:Courier New, Courier, monospace, sans-serif;">
              <a href="../vista/listarClientes.php" type="button"  class="btn btn-dark  text-white" <?php if($rol!=1 && $rol!=3){ ?> style="display: none;" <?php } ?>><i class="fas fa-head-side-mask"></i> Lista de clientes</ion-icon></a>                            
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card   mb-3"style="font-family:Courier New, Courier, monospace, sans-serif;">
              <a href="../vista/listarServicios.php" type="button"  class="btn btn-dark text-white"><i class="fas fa-clipboard-list"></i> Lista de servicios</ion-icon></a>                              
              </div>
            </div>


            
          
          <div class="container-fluid" <?php if($rol!=1 && $rol!=3){ ?> style="display: none;" <?php } ?>>          
          <ol class="breadcrumb mb-4"style="background-color:#white;">
            <li class="breadcrumb-item active"style="color:dark;"><b>Gestión de compras</b></li>
          </ol>

          <div class="container-fluid">         

             

          <div class="row">
          <div class="col-xl-4 col-md-4">
              <div class="card   mb-3"style="font-family:Courier New, Courier, monospace, sans-serif;">   
              <a href="../vista/listarProductos.php" type="button"  class="btn btn-dark text-white"><i class="fas fa-boxes"<?php if($rol!=1 && $rol!=3){ ?> style="display: none;" <?php } ?>></i> Lista de producto</ion-icon></a>            
              </div>
            </div>
            
            <div class="col-xl-4 col-md-4">
              <div class="card   mb-3"style="font-family:Courier New, Courier, monospace, sans-serif;">
              <a href="../vista/listarMarcas.php" type="button"  class="btn btn-dark text-white"><i class="fas fa-bookmark"<?php if($rol!=1 && $rol!=3){ ?> style="display: none;" <?php } ?>></i> Lista de marcas</ion-icon></a>                             
              </div>
            </div>

            <div class="col-xl-4 col-md-4">
              <div class="card   mb-3"style="font-family:Courier New, Courier, monospace, sans-serif;">
              <a href="../vista/listarCategorias.php" type="button"  class="btn btn-dark text-white"><i class="fas fa-book"<?php if($rol!=1 && $rol!=3){ ?> style="display: none;" <?php } ?>></i> Lista de categoría</ion-icon></a>                            
              </div>
            </div>

            <div class="col-xl-6 col-md-4">
              <div class="card  mb-3"style="font-family:Courier New, Courier, monospace, sans-serif;">
              <a href="../vista/listarCompras.php" type="button"  class="btn btn-dark text-white"><i class="far fa-chart-bar"></i> Lista de compras</ion-icon></a>                              
              </div>
            </div>
       
          
          <div class="col-xl-6 col-md-6 ">
              <div class="card   mb-3"style="font-family:Courier New, Courier, monospace, sans-serif;">
              <a href="../vista/registrarCompras.php" type="button"  class="btn btn-dark text-white"><i class="fas fa-shopping-cart"></i> Realizar compra</ion-icon></a>                              
              </div>
            </div>
          
            <div class="container-fluid">          
          <ol class="breadcrumb mb-4"style="background-color:#white;">
          <li class="breadcrumb-item active"style="font-family:Courier New, Courier, monospace, sans-serif;color:dark;"><b>Gestión de usuarios</b></li>
          </ol>

          <div class="row">
          <div class="col-xl-6 col-md-4">
              <div class="card   mb-3"style="font-family:Courier New, Courier, monospace, sans-serif;">   
              <a href="../vista/listaUsuarios.php" type="button"  class="btn btn-dark text-white"><i class="fas fa-id-card"></i> Lista de usuarios</ion-icon></a>            
              </div>
            </div>

            <div class="col-xl-6 col-md-4">
              <div class="card   mb-3"style="font-family:Courier New, Courier, monospace, sans-serif;">   
              <!-- <a href="../vista/youtube" type="button"  class="btn btn-dark text-white"><i class="fa fa-question-circle"></i> Ayuda en linea</ion-icon></a> -->   
              <button type="button" class="btn btn-dark text-white" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-question-circle"></i>
                                                Ayuda en linea
                </button>        
              </div>

            </div>

                          <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ayuda en línea</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <a class="close-modal" rel="modal:close">X</a>
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      
                    </div>
                  </div>
                </div>
              </div>

          </div>
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto  amber darken-2">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted"style="font-family:Courier New, Courier, monospace, sans-serif;"><b>&copy; MOTORCYCLE 2021</b></div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>