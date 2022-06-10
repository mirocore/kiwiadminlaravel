<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="<?= url('css/bootstrap.css');?>">
    
    <title>@yield("title") | Somos Kiwi</title>
    
    <meta name="description" content="">
    <meta name="author" content="">
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
      <link rel="stylesheet" href="<?=url("css/fontawesome/css/all.css");?>">
      <link rel="stylesheet" href="<?=url("css/simple-sidebar.css");?>">
    <link href="<?=url("plugins/select2/dist/css/select2.min.css");?>" rel="stylesheet" />
      <link rel="stylesheet" href="<?=url("css/estilos.css");?>">
      
      

     

</head>
<body>


  <div class="d-flex" id="wrapper">

<!--==============================
            SIDEBAR
============================== --> 
    <div class="bg-light border-right" id="sidebar-wrapper">
      <h1 class="sidebar-heading">Somos Kiwi <small>admin</small> </h1>
      <div class="list-group list-group-flush">
        <a href="<?=route("Home")?>" class="list-group-item list-group-item-action "><i class="fas fa-home mr-3"></i> Inicio</a>
        <a href="<?=route("trabajos.index")?>" class="list-group-item list-group-item-action "><i class="fas fa-desktop mr-3"></i> Trabajos</a>
        <a href="<?=route("clientes.index")?>" class="list-group-item list-group-item-action "><i class="fas fa-user-tie mr-3"></i> Clientes</a>
        <a href="<?=route("servicios.index")?>" class="list-group-item list-group-item-action "><i class="fas fa-code mr-3"></i> Servicios</a>
        <a href="<?=route("usuarios.index")?>" class="list-group-item list-group-item-action "><i class="fas fa-users mr-3"></i> Usuarios</a>
        
        <a href="<?=route("usuarios.index")?>" class="d-block d-lg-none list-group-item list-group-item-action "><i class="fas fa-users mr-3"></i> Ver Perfil</a>
        <a href="<?=route("usuarios.index")?>" class="d-block d-lg-none list-group-item list-group-item-action "><i class="fas fa-users mr-3"></i> Cerrar Sesión</a>
      </div>
    </div>


<!--==============================
            HEADER
============================== --> 
    <div id="page-content-wrapper">
    

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary d-block d-md-none" id="menu-toggle"><span class="navbar-toggler-icon"></span> </button>
        <button class="btn" id="menu-toggle"></button>

        <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>--> 
         
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ramiro Belcore
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Ver Perfil</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Cerrar Sesión</a>
              </div>
            </li>
          </ul>
        </div>
        <a href="" class="d-block d-lg-none py-2 text-muted">Ramiro Belcore</a>
      </nav>

     
<!--==============================
            CONTENIDO
============================== -->      
      <div class="container-fluid">
        <div class="container pt-5">
            @yield("main")
        </div>
    </div>


  </div>








<script src="<?=url("js/jquery-3.2.1.min.js");?>"></script>
<script src="<?=url("js/bootstrap.bundle.min.js");?>"></script>
<script src="<?=url("plugins/select2/dist/js/select2.js");?>"</script> 
 
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  
    <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })    
    </script> 
   

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="<?=url("js/bootstrap.min.js");?>"></script>
    
       
</body>
</html>
