<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />        
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <div id="layoutSidenav" class="fixed">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Inicio</div>
          <a class="nav-link" href="../vista/dashboard.php">
              <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
              Inicio
            </a>
            <div class="sb-sidenav-menu-heading">Gestión ventas</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Ventas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>                           

                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav" <?php if($rol!=1 && $rol!=3){ ?> style="display: none;" <?php } ?>>
                                <a class="nav-link" href="registrarVenta.php">Registrar ventas</a>
                                <a class="nav-link" href="listarVenta.php"> Lista de ventas</a>
                                </nav>

                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#jj" aria-expanded="false" aria-controls="pagesCollapseAuth"<?php if($rol!=1 && $rol!=3){ ?> style="display: none;" <?php } ?>>
                              
                                     Clientes
                                      <div class="sb-sidenav-collapse-arrow" ><i class="fas fa-angle-down"></i></div>
                                  </a>
                                  <div class="collapse" id="jj" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                      <nav class="sb-sidenav-menu-nested nav">
                                      <a class="nav-link" href="listarClientes.php"> Lista de clientes</a>
                                      </nav>
                                  </div>
                          </a>

                          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#kk" aria-expanded="false" aria-controls="pagesCollapseAuth">
                              
                              Servicios
                              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                          </a>
                          <div class="collapse" id="kk" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                              <nav class="sb-sidenav-menu-nested nav">
                                  <a class="nav-link" href="listarServicios.php">Lista de servicios</a>
                                  
                              </nav>
                          </div>
                  </a>

                            </div>
                            <div class="sb-sidenav-menu-heading" >Gestión de compras</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"<?php if($rol!=1 && $rol!=3){ ?> style="display: none;" <?php } ?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                Compras
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down" ></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Gestión de compras
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                          
                                        <a class="nav-link" href="listarProductos.php">Lista de productos</a>
                                        <a class="nav-link" href="listarMarcas.php">Lista de marcas</a>
                                        <a class="nav-link" href="listarCategorias.php">Lista de categorías</a>

                                        </nav>

                                

                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Compras
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="registrarCompras.php">Realizar compras</a>
                                        <a class="nav-link" href="listarCompras.php">Lista de compras</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>

                            
                            <div class="sb-sidenav-menu-heading">Gestión de usuarios</div>
                            <a class="nav-link" href="listaUsuarios.php"<?php if($rol!=1 && $rol!=3){ ?> style="display: none;" <?php } ?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-id-card"></i></div>
                                Usuarios
                            </a>
                            <br>
                          

                            <button type="button" class="btn btn-outline-dark text-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-question-circle"></i>
                            Ayuda en linea
                            </button>
                                                    
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
          <div class="small"></div>
          MOTORCYCLE 2021
 </div>

               
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>

     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog style="font-family:Courier New, Courier, monospace, sans-serif;" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ayuda en línea</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">          
       <!-- BOTÓN1 QUE ABRE VENTANA MODAL CON VIDEO de ayuda -->
       <a href="https://drive.google.com/file/d/14W2-YYQoHOW534yuRaxtM7qm7CFqDRps/view?usp=sharing" 
       target="_blank"  onClick="window.open(this.href, this.target); return false;"
         type="button"  
        class="btn btn-dark" class="fas fa-id-card" style="font-family:Courier New, Courier, monospace, sans-serif;">
        <i class="fas fa-id-card"></i>
        Módulo de usuario              
                </a>
                   
               

                                
                                
                    </div>
                    <div class="modal-body">
                    <a href="https://drive.google.com/file/d/1H30oHa7IhOoSztbPtPfscaGrdrjL0WRR/view?usp=sharing" 
       target="_blank" onClick="window.open(this.href, this.target); return false;"
         type="button"  
        class="btn btn-dark" class="fas fa-id-card" style="font-family:Courier New, Courier, monospace, sans-serif;">
                    <i class="fas fa-shopping-cart"></i>
                    
                     Módulo de compras
                </a>

                <!-- CÓDIGO DE VENTANA MODAL compras -->
                
                </div>
                    <div class="modal-body">
                    <a href="https://drive.google.com/file/d/1e07sE1uojEXWTk-ttKp3vvmSQr7i447Q/view?usp=sharing" 
       target="_blank" onClick="window.open(this.href, this.target); return false;"
         type="button"  
        class="btn btn-dark" class="fas fa-id-card" style="font-family:Courier New, Courier, monospace, sans-serif;">
                    <i class="fas fa-list-ul"></i>
                   Módulo de ventas
                </a>

                <!-- CÓDIGO DE VENTANA MODAL ventas -->
               

                    </div>

                    <div class="modal-body">
                    <a href="https://drive.google.com/file/d/1pxUs1PAtkQgfRFU4ZSjL0XNzLptCgW2f/view?usp=sharing" 
       target="_blank" onClick="window.open(this.href, this.target); return false;"
         type="button"  
        class="btn btn-dark" class="fas fa-id-card" style="font-family:Courier New, Courier, monospace, sans-serif;">
                    <i class="fas fa-eye-slash"></i>
                  Recuperar contraseña
                </a>

                <!-- CÓDIGO DE VENTANA MODAL ventas -->
               

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      
                    </div>
                  </div>
                </div>
              </div>
</html>
