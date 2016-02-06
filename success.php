<!DOCTYPE html>
<html lang="es">
<head>
	<title>Prueba Bootstrap</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="CSS/logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="CSS/estilos.css">
</head>
<body>
<!-- Codigo PHP -->
<?php

?>
<!-- Cabecera -->
<div class="container-fluid cabecera">
	<h1>T3 Sistemas</h1>
	<h2>EEST N3</h2>
</div>
<!-- Barra de Navegacion -->
<nav class="navbar navbar-personal" data-spy="affix" data-offset-top="294">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">T3</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Inicio</a></li>
        <li><a href="proyectos.html">Proyectos</a></li>
        <li><a href="muestras.html">Muestras</a></li>
        <li class="dropdown">
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Servicios
        	<span class="caret"></span></a>
        	<ul class="dropdown-menu">
          		<li><a href="mantenimiento.html">Mantenimiento de equipos</a></li>
          		<li><a href="desarrolloweb.html">Desarrollo Web</a></li>
          		<li><a href="#">Sistemas en VB6</a></li>
        	</ul>
      	</li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      		<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      		<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    	</ul>
    </div>
  </div>
</nav>

<div class="container articulos">
  <div class="jumbotron">
    <h1>Ha sido registrado con exito</h1>
  </div>
</div>

<div class="container-fluid pie">
	<div class="row">
		<div class="col-md-4 col-sm-4 pie-caja">
			<h2>Contacto 1</h2>
			<li>Contactos 1</li>
			<li>Contactos 1</li>
			<li>Contactos 1</li>
			<li>Contactos 1</li>
		</div>
		<div class="col-md-4 col-sm-4 pie-caja">
			<h2>Contacto 2</h2>
			<li>Contactos 1</li>
			<li>Contactos 1</li>
			<li>Contactos 1</li>
			<li>Contactos 1</li>
		</div>
		<div class="col-md-4 col-sm-4 pie-caja">
			<h2>Contacto 3</h2>
			<li>Contactos 1</li>
			<li>Contactos 1</li>
			<li>Contactos 1</li>
			<li>Contactos 1</li>
		</div>
	</div>
</div>

</body>
</html>
