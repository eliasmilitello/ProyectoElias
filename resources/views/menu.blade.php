<?php
$sessionusuario = session('sessionusuario');
$sessionrol = session('sessionrol');
$sessionidu = session('sessionidu');
?>
<html>
<head>
 <link href="https://bootswatch.com/5/darkly/bootstrap.min.css" rel="stylesheet">
 
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">  </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="{{route('menu')}}">Inicio
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('reporte')}}">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('roles')}}">Roles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('salir')}}">Salir</a>
        </li>
      
      </ul>
    
    </div>
  </div>
</nav>
<div id= "contenido">

<b>Bienvenido <?php  echo $sessionusuario?></b>
<br>
<br>
@yield('contenido')
</div>
</body>

</html>