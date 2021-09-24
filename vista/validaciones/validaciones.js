function validarCategoria() {
    let nombre = "";
    let estadoCategoria="";
    var patron = /^[a-z A-ZáéíóúÁÉÍÓÚñÑ0-9\_\-]*$/;
    

    

    nombre = document.getElementById('nombre').value;
    estadoCategoria= document.getElementById('estadoCategoria').value;


    if (nombre == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Nombre obligatorio',
            text: '',
            footer: '<a>Corrija el campo nombre categoría</a>',
            timer: 5000
        });



    } else if (nombre.length >= 30) {
        Swal.fire({
            icon: 'ERROR',
            title: 'Nombre muy largo, máximo 30 digitos',
            text: '',
            footer: '<a>Corrija el campo categoría</a>',
            timer: 5000
        });

    }
    else if (nombre.search(patron)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Solo se permiten letras o numeros en el nombre',
            text: '',
            footer: '<a>Corrija el campo por favor</a>',
            timer: 5000
        });


    }else if (estadoCategoria=="") {
        Swal.fire({
            icon: 'ERROR',
            title: 'categoria estado obligatorio',
            text: '',
            footer: '<a>Selecione el campo</a>',
            timer: 5000
        });

    }
     else {
        document.frmCategoria.submit();
    }
}
function validarECategoria() {
    let nombreCategoria = "";
    let estadoCategoria="";
    var patron = /^[a-z A-ZáéíóúÁÉÍÓÚñÑ0-9\_\-]*$/;
    

    nombreCategoria = document.getElementById('nombreCategoria').value;
    estadoCategoria= document.getElementById('estadoCategoria').value;


    if (nombreCategoria == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Nombre obligatorio',
            text: '',
            footer: '<a>Corrija el campo nombre categoría</a>',
            timer: 5000
        });



    } else if (nombreCategoria.length >= 30) {
        Swal.fire({
            icon: 'ERROR',
            title: 'Nombre muy largo, máximo 30 digitos',
            text: '',
            footer: '<a>Corrija el campo categoría</a>',
            timer: 5000
        });

    }
    else if (nombreCategoria.search(patron)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Solo se permiten letras o numeros en el nombre',
            text: '',
            footer: '<a>Corrija el campo por favor</a>',
            timer: 5000
        });


    }else if (estadoCategoria=="") {
        Swal.fire({
            icon: 'ERROR',
            title: 'categoria estado obligatorio',
            text: '',
            footer: '<a>Selecione el campo</a>',
            timer: 5000
        });

    }
     else {
        document.frmCategoria.submit();
    }
}


function validarProducto() {
    let nombre = "";
    let precio = "";
    let IdCategoria = "";
    let IdMarca = "";
    let stock = "";
    let estadoProducto = "";

    var patron = /^[a-z A-ZáéíóúÁÉÍÓÚñÑ0-9\_\-]*$/;
    var patronNumeros = /^[0-9]+$/;

     IdMarca = document.getElementById('IdMarca').value;
    nombre = document.getElementById('nombre').value;
    precio = document.getElementById('precio').value;
    IdMarca = document.getElementById('IdMarca');
    IdCategoria = document.getElementById('IdCategoria');
    stock = document.getElementById('stock').value;
    estadoProducto = document.getElementById('estadoProducto');


    if (nombre == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Nombre producto obligatorio',
            text: '',
            footer: '<a>Corrija el campo por favor</a>',
            timer: 5000
        });



    } else if (nombre.length >= 30) {
        Swal.fire({
            icon: 'ERROR',
            title: 'Nombre muy largo, máximo 30 digitos',
            text: '',
            footer: '<a>Corrija el campo nombre</a>',
            timer: 5000
        });

    } else if (nombre.search(patron)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Solo se permiten letras en el nombre',
            text: '',
            footer: '<a>Corrija el campo por favor</a>',
            timer: 5000
        });


    } else if (precio.search(patronNumeros)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Solo se permiten números o esta vacio',
            text: '',
            footer: '<a>Corrija el campo precio</a>',
            timer: 5000
        });


    }  else if (IdMarca.value == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Selecciona una opción marca',
            text: '',
            footer: '<a>Corrija el campo  marca</a>',
            timer: 5000
        });


    } else if ( IdCategoria.value == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Selecciona una opción categoria',
            text: '',
            footer: '<a>Corrija el campo categoría</a>',
            timer: 5000
        });


    }else if (stock.search(patronNumeros)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Solo se permiten números o esta vacio',
            text: '',
            footer: '<a>Corrija el campo stock</a>',
            timer: 5000
        });


    }
     else if ( estadoProducto.value == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Selecciona una opción',
            text: '',
            footer: '<a>Corrija el campo estado</a>',
            timer: 5000
        });


    } else {
       
       document.frmProducto.submit();
        
    }
}

//linea de validacion editar producto
function validarEProducto() {
    let nombre = "";
    let precio = "";
    let IdCategoria = "";
    let IdMarca = "";
    let stock = "";
    let estadoProducto = "";

    var patron = /^[a-z A-ZáéíóúÁÉÍÓÚñÑ0-9\_\-]*$/;
    var patronNumeros = /^[0-9]+$/;

     IdMarca = document.getElementById('idMarca').value;
    nombre = document.getElementById('nombre').value;
    precio = document.getElementById('precio').value;
    IdMarca = document.getElementById('idMarca');
    IdCategoria = document.getElementById('idCategoria');
    stock = document.getElementById('stock').value;
    estadoProducto = document.getElementById('estadoProducto');


    if (nombre == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Nombre producto obligatorio',
            text: '',
            footer: '<a>Corrija el campo por favor</a>',
            timer: 5000
        });



    } else if (nombre.length >= 30) {
        Swal.fire({
            icon: 'ERROR',
            title: 'Nombre muy largo, máximo 30 digitos',
            text: '',
            footer: '<a>Corrija el campo nombre</a>',
            timer: 5000
        });

    } else if (nombre.search(patron)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Solo se permiten letras en el nombre',
            text: '',
            footer: '<a>Corrija el campo por favor</a>',
            timer: 5000
        });


    } else if (precio.search(patronNumeros)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Solo se permiten números o esta vacio',
            text: '',
            footer: '<a>Corrija el campo precio</a>',
            timer: 5000
        });


    }  else if (IdMarca.value == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Selecciona una opción marca',
            text: '',
            footer: '<a>Corrija el campo  marca</a>',
            timer: 5000
        });


    } else if ( IdCategoria.value == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Selecciona una opción categoria',
            text: '',
            footer: '<a>Corrija el campo categoría</a>',
            timer: 5000
        });


    }else if (stock.search(patronNumeros)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Solo se permiten números o esta vacio',
            text: '',
            footer: '<a>Corrija el campo stock</a>',
            timer: 5000
        });


    }
     else if ( estadoProducto.value == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Selecciona una opción',
            text: '',
            footer: '<a>Corrija el campo estado</a>',
            timer: 5000
        });


    } else {
       
       document.frmProducto.submit();
        
    }
}
function validarCliente(){
    var patron = /^[a-z A-Z\s]*$/;
    var patronNumeros = /^[0-9]+$/;


    let documentoCliente="";
    let nombreCliente="";
    let celularCliente="";
    let estadoCliente="";

      documentoCliente = document.getElementById('documentoCliente').value;
      nombreCliente = document.getElementById('nombreCliente').value;
      celularCliente = document.getElementById('celularCliente').value;
      estadoCliente=document.getElementById('estadoCliente');
      
      
     
      if( documentoCliente==""){
        Swal.fire({
            icon: 'error',
            title: 'Documento cliente obligatorio',
            text: '',
            footer: '<a href>Corrija el campo por favor</a>',
            timer: 5000
          });
          
        
        
    }
      
   else if( nombreCliente.value==""){
        Swal.fire({
            icon: 'error',
            title: 'nombre cliente obligatorio',
            text: '',
            footer: '<a href>Corrija el campo por favor</a>',
            timer: 5000
          });
          
        
        
    } else if(  nombreCliente.length <= 3 || nombreCliente.length >=30  )
    {
        Swal.fire({
            icon: 'error',
            title: 'nombre incorrecto maximo 30 digitos manimino 2',
            text: '',
            footer: '<a href>Corrija el campo por favor</a>',
            timer: 5000
          });

    }
     else if(  documentoCliente.length <7 || documentoCliente.length >15  )
    {
        Swal.fire({
            icon: 'error',
            title: 'Documento incorrecto maximo 15 digitos minimo 7',
            text: '',
            footer: '<a href>Corrija el campo por favor</a>',
            timer: 5000
          });

    }
    else if(  celularCliente.length < 8 || celularCliente.length >=15  )
    {
        Swal.fire({
            icon: 'error',
            title: 'Celular incorrecto maximo 15 digitos minimo 10',
            text: '',
            footer: '<a href>Corrija el campo por favor</a>',
            timer: 5000
          });

    }
   else  if (nombreCliente.search(patron)) {

        Swal.fire({
            icon: 'error',
            title: 'No se permite signos o numero en campo nombre',
            text: '',
            footer: '<a>Corrija el campo por favor</a>',
            timer: 5000
        });


    }
   else  if (celularCliente.search(patronNumeros)) {

        Swal.fire({
            icon: 'error',
            title: 'Solo se permiten numeros',
            text: '',
            footer: '<a>Corrija el campo por favor</a>',
            timer: 500
        });


    }
   else  if( celularCliente==""){
        Swal.fire({
            icon: 'error',
            title: 'celular  cliente obligatorio',
            text: '',
            footer: '<a href>Corrija el campo por favor</a>',
            timer: 5000
          });
          
        
        
    }
    else if(estadoCliente.value == "")
         {
    
          Swal.fire({
          icon: 'error',
          title: 'Seleccione el estado del Cliente',
          text: '',
          footer: '<a href>Debe seleccionar un estado</a>',
          timer:5000
        });
        
    }
    

    else
     {
       document.frmCliente.submit();
     }
    
}


function validarClientes(){
    var patron = /^[a-z A-Z\s]*$/;
    var patronNumeros = /^[0-9]+$/;


    let documentoCliente="";
    let nombreCliente="";
    let celularCliente="";
    let estadoCliente="";

      documentoCliente = document.getElementById('documentoCliente').value;
      nombreCliente = document.getElementById('nombreCliente').value;
      celularCliente = document.getElementById('celularCliente').value;
      estadoCliente=document.getElementById('estadoCliente');
      
      
     
      if( documentoCliente==""){
        Swal.fire({
            icon: 'error',
            title: 'Documento cliente obligatorio',
            text: '',
            footer: '<a href>Corrija el campo por favor</a>',
            timer: 5000
          });
          
        
        
    }
      
   else if( nombreCliente.value==""){
        Swal.fire({
            icon: 'error',
            title: 'nombre cliente obligatorio',
            text: '',
            footer: '<a href>Corrija el campo por favor</a>',
            timer: 5000
          });
          
        
        
    } else if(  nombreCliente.length <= 3 || nombreCliente.length >=30  )
    {
        Swal.fire({
            icon: 'error',
            title: 'nombre incorrecto maximo 30 digitos manimino 2',
            text: '',
            footer: '<a href>Corrija el campo por favor</a>',
            timer: 5000
          });

    }
     else if(  documentoCliente.length <7 || documentoCliente.length >15  )
    {
        Swal.fire({
            icon: 'error',
            title: 'Documento incorrecto maximo 15 digitos minimo 7',
            text: '',
            footer: '<a href>Corrija el campo por favor</a>',
            timer: 5000
          });

    }
    else if(  celularCliente.length < 8 || celularCliente.length >=15  )
    {
        Swal.fire({
            icon: 'error',
            title: 'Celular incorrecto maximo 15 digitos minimo 10',
            text: '',
            footer: '<a href>Corrija el campo por favor</a>',
            timer: 5000
          });

    }
   else  if (nombreCliente.search(patron)) {

        Swal.fire({
            icon: 'error',
            title: 'No se permite signos o numero en campo nombre',
            text: '',
            footer: '<a>Corrija el campo por favor</a>',
            timer: 5000
        });


    }
   else  if (celularCliente.search(patronNumeros)) {

        Swal.fire({
            icon: 'error',
            title: 'Solo se permiten numeros',
            text: '',
            footer: '<a>Corrija el campo por favor</a>',
            timer: 500
        });


    }
   else  if( celularCliente==""){
        Swal.fire({
            icon: 'error',
            title: 'celular  cliente obligatorio',
            text: '',
            footer: '<a href>Corrija el campo por favor</a>',
            timer: 5000
          });
          
        
        
    }
    else if(estadoCliente.value == "")
         {
    
          Swal.fire({
          icon: 'error',
          title: 'Seleccione el estado del Cliente',
          text: '',
          footer: '<a href>Debe seleccionar un estado</a>',
          timer:5000
        });
        
    }
    

    else
     {
       document.frmClientes.submit();
     }
    
}




function actualizarUsu() {
    let nombre = "";
    let password = "";
    let correo = "";
    let idRol = "";
    let estado = "";
    var espacio = /\s/;
    var patronusu = /^[a-z A-ZáéíóúÁÉÍÓÚñÑ0-9\_\-]*$/;
    patronCorreo = /^[-\w.%+]{1,64}@(?:[A-ZáéíóúÁÉÍÓÚñÑ0-9-]{1,63}\.){1,125}[A-ZáéíóúÁÉÍÓÚñÑ]{2,63}$/i;


    nombre = document.getElementById('nombre').value;
    password = document.getElementById('password').value;
    correo = document.getElementById('correo').value;
    idRol = document.getElementById('idRol');
    estado = document.getElementById('estado');

    if (nombre == "" || password == "" || correo == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Datos  obligatorios',
            text: '',
            footer: '<a>Digite los datos faltantes</a>',
            timer: 5000
        });



    } else if (nombre.length >= 30) {
        Swal.fire({
            icon: 'ERROR',
            title: 'Nombre muy largo, máximo 30 digitos',
            text: '',
            footer: '<a>Corrija el campo nombre</a>',
            timer: 5000
        });

    }
    else if (nombre.search(patronusu)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Solo se permiten letras y numeros',
            text: '',
            footer: '<a>Corrija el campo nombre por favor</a>',
            timer: 5000
        });
    }

    else if (espacio.test(nombre)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'no se permiten espacios',
            text: '',
            footer: '<a>Corrija el campo nombre por favor</a>',
            timer: 5000
        });
        
    }
    
    else if (correo.search(patronCorreo)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Ingrese un correo válido',
            text: '',
            footer: '<a>Corrija el campo correo</a>',
            timer: 5000
        });


    } else if (idRol.value == 0 ||
        idRol.value == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Selecciona Un rol',
            text: '',
            footer: '<a>Corrija el campo rol</a>',
            timer: 5000
        });


    } else if (estado.value == 0 ||
        estado.value == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Selecciona una opción',
            text: '',
            footer: '<a>Corrija el campo estado</a>',
            timer: 5000
        });


    }
      
       
    else {
        document.frmUsuario.submit();
        }

}

function validarUsuario() {
    let nombre = "";
    let password = "";
    let correo = "";
    let rol = "";
    let estado = "";
    var espacio = /\s/;
    var patronusu = /^[a-z A-ZáéíóúÁÉÍÓÚñÑ0-9\_\-]*$/;
    patronCorreo = /^[-\w.%+]{1,64}@(?:[A-ZáéíóúÁÉÍÓÚñÑ0-9-]{1,63}\.){1,125}[A-ZáéíóúÁÉÍÓÚñÑ]{2,63}$/i;


    nombre = document.getElementById('nombre').value;
    password = document.getElementById('password').value;
    correo = document.getElementById('correo').value;
    rol = document.getElementById('rol');
    estado = document.getElementById('estado');

    if (nombre == "" || password == "" || correo == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Datos  obligatorios',
            text: '',
            footer: '<a>Digite los datos faltantes</a>',
            timer: 5000
        });



    } else if (nombre.length >= 30) {
        Swal.fire({
            icon: 'ERROR',
            title: 'Nombre muy largo, máximo 30 digitos',
            text: '',
            footer: '<a>Corrija el campo nombre</a>',
            timer: 5000
        });

    }
    else if (nombre.search(patronusu)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Solo se permiten letras y numeros',
            text: '',
            footer: '<a>Corrija el campo nombre por favor</a>',
            timer: 5000
        });
    }

    else if (espacio.test(nombre)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'no se permiten espacios',
            text: '',
            footer: '<a>Corrija el campo nombre por favor</a>',
            timer: 5000
        });
        
    }
    
    else if (correo.search(patronCorreo)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Ingrese un correo válido',
            text: '',
            footer: '<a>Corrija el campo correo</a>',
            timer: 5000
        });


    } else if (rol.value == 0 ||
        rol.value == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Selecciona Un rol',
            text: '',
            footer: '<a>Corrija el campo rol</a>',
            timer: 5000
        });


    } else if (estado.value == 0 ||
        estado.value == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Selecciona una opción',
            text: '',
            footer: '<a>Corrija el campo estado</a>',
            timer: 5000
        });


    }
      
       
    else {
        document.frmUsuario.submit();
        }

}


function validarServicio() {
    let nombre = "";
    let precio = "";
    var patron = /^[a-z A-ZáéíóúÁÉÍÓÚñÑ\s]*$/;
    var patronNumeros = /^[0-9]+$/;
    nombre = document.getElementById('nombre').value;
    precio = document.getElementById('precio').value;

    if (nombre == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Nombre obligatorio',
            text: '',
            footer: '<a>Corrija el campo nombre marca</a>',
            timer: 5000
        });



    } else if (nombre.length >= 30 || nombre.length <= 4) {
        Swal.fire({
            icon: 'ERROR',
            title: 'Mínimo 4, máximo 30',
            text: '',
            footer: '<a>Corrija el campo marca</a>',
            timer: 5000
        });

    } else if (nombre.search(patron)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Solo se permiten letras en el nombre',
            text: '',
            footer: '<a>Corrija el campo por favor</a>',
            timer: 5000
        });
    }
    else if (nombre == "" || precio == "" ) {
        Swal.fire({
            icon: 'ERROR',
            title: 'Datos  obligatorios',
            text: '',
            footer: '<a>Digite los datos faltantes</a>',
            timer: 5000
        });
     }else if (precio.search(patronNumeros)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Solo se permiten números',
            text: '',
            footer: '<a>Corrija el campo precio</a>',
            timer: 5000
        });


    } else {
        document.frmServicio.submit();
    }
}



function validarSer() {
    let nombre = "";
    let precio = "";
    var patron = /^[a-z A-ZáéíóúÁÉÍÓÚñÑ\s]*$/;
    var patronNumeros = /^[0-9-.]+$/;
    nombre = document.getElementById('nombre').value;
    precio = document.getElementById('precio').value;

    if (nombre == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Nombre obligatorio',
            text: '',
            footer: '<a>Corrija el campo nombre marca</a>',
            timer: 5000
        });



    } else if (nombre.length >= 30 || nombre.length <= 4) {
        Swal.fire({
            icon: 'ERROR',
            title: 'Mínimo 4, máximo 30',
            text: '',
            footer: '<a>Corrija el campo marca</a>',
            timer: 5000
        });

    } else if (nombre.search(patron)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Solo se permiten letras en el nombre',
            text: '',
            footer: '<a>Corrija el campo por favor</a>',
            timer: 5000
        });
    }
    else if (nombre == "" || precio == "" ) {
        Swal.fire({
            icon: 'ERROR',
            title: 'Datos  obligatorios',
            text: '',
            footer: '<a>Digite los datos faltantes</a>',
            timer: 5000
        });
     }else if (precio.search(patronNumeros)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Solo se permiten números',
            text: '',
            footer: '<a>Corrija el campo precio</a>',
            timer: 5000
        });


    } else {
        document.frmVServicio.submit();
    }
}
    
    
function limpiar() {
    //document.getElementById('nombre').value = "";
    let nombre = document.getElementById('nombre').value = "";
    let precio = document.getElementById('precio').value = "";
    let IdMarca = document.getElementById('IdMarca').value = "";
    let IdCategoria = document.getElementById('IdCategoria').value = "";
    let stock = document.getElementById('stock').value = "";
    let estadoProducto = document.getElementById('estadoProducto').value = "";
    let valor = document.getElementById('valor').value = "";
}

function mayusculas(nombre) {

    var nombre = document.getElementById('nombre').value;
    document.getElementById('nombre').value = nombre[0].toUpperCase() + nombre.slice(1);
}

function validarMarca() {
    let nombreMarca = "";
    let estadoMarca = "";
    nombreMarca = document.getElementById('nombreMarca').value;
    estadoMarca = document.getElementById('estadoMarca');
    var patron = /^[a-z A-ZáéíóúÁÉÍÓÚñÑ0-9\_\-]*$/;


    if (nombreMarca == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Nombre obligatorio',
            text: '',
            footer: '<a>Corrija el campo nombre marca</a>',
            timer: 5000
        });



    } else if (nombreMarca.length >= 30 || nombreMarca.length <= 4) {
        Swal.fire({
            icon: 'ERROR',
            title: 'Mínimo 4, máximo 30',
            text: '',
            footer: '<a>Corrija el campo marca</a>',
            timer: 5000
        });

    }
    else if (nombreMarca.search(patron)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Solo se permiten letras en el nombre',
            text: '',
            footer: '<a>Corrija el campo por favor</a>',
            timer: 5000
        });


    } else if ( estadoMarca.value == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Estado obligatorio',
            text: '',
            footer: '<a>Corrija el campo marca</a>',
            timer: 5000
        });


    }else {
        document.frmMarca.submit();
    }
}
function validarEMarca() {
    let nombre = "";
    let estadoMarca = "";
    nombre = document.getElementById('nombre').value;
    estadoMarca = document.getElementById('estadoMarca');
    var patron = /^[a-z A-ZáéíóúÁÉÍÓÚñÑ0-9\_\-]*$/;


    if (nombre == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Nombre obligatorio',
            text: '',
            footer: '<a>Corrija el campo nombre marca</a>',
            timer: 5000
        });



    } else if (nombre.length >= 30 || nombre.length <= 4) {
        Swal.fire({
            icon: 'ERROR',
            title: 'Mínimo 4, máximo 30',
            text: '',
            footer: '<a>Corrija el campo marca</a>',
            timer: 5000
        });

    }
    else if (nombre.search(patron)) {

        Swal.fire({
            icon: 'ERROR',
            title: 'Solo se permiten letras en el nombre',
            text: '',
            footer: '<a>Corrija el campo por favor</a>',
            timer: 5000
        });


    } else if ( estadoMarca.value == "") {
        Swal.fire({
            icon: 'ERROR',
            title: 'Estado obligatorio',
            text: '',
            footer: '<a>Corrija el campo marca</a>',
            timer: 5000
        });


    }else {
        document.frmMarca.submit();
    }
}




function mayusculasMarca(nombreMarca) {
    var nombreMarca = document.getElementById('nombreMarca').value;

    document.getElementById('nombreMarca').value = nombreMarca[0].toUpperCase() + nombreMarca.slice(1);

}

function validarEntrada(){

    let fecha=""; descripcion="";

      fecha = document.getElementById('fecha').value;
      descripcion = document.getElementById('descripcion').value;

     if(fecha==""){

        Swal.fire({
            icon: 'error',
            title: 'Fecha entrada  obligatoria',
            text: '',
            footer: '<a href>Corrija el campo por favor</a>',
            timer: 5000
          });

     }
     else if(descripcion==""){

        Swal.fire({
            icon: 'error',
            title: 'descripcion entrada obligatoria',
            text: '',
            footer: '<a href>Corrija el campo por favor</a>',
            timer: 5000
          });

     }


      else {
        document.frmEntrada.submit();
    }


}

