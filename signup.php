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

  # Se crean las variables
  $nombre = $apellido = $username = $password = $correo = "";
  $nombreErr = $apellidoErr = $usernameErr = $passwordErr = $correoErr = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ingreso = false;
    # Nombre
    if (empty($_POST["nombre"])) {
      $nombreErr = "Campo obligatorio";
      $ingreso = True;
    } else {
      $nombre = prueba_input($_POST["nombre"]);
      # Se valida
      if (!preg_match("/^[a-zA-Z ]*$/", $nombre)) {
        $nombre = "Solo letras y espacios en blanco";
        $ingreso = true;
      }
    }
    # Apellido
    if (empty($_POST["apellido"])) {
      $apellidoErr = "Campo obligatorio";
      $ingreso = true;
    } else {
      $apellido = prueba_input($_POST["apellido"]);
      # Se valida
      if (!preg_match("/^[a-zA-Z ]*$/", $apellido)) {
        $apellido = "Solo letras y espacios en blanco";
        $ingreso = true;
      }
    }
    # Nombre de usuario
    if (empty($_POST["username"])) {
      $usernameErr = "Campo obligatorio";
      $ingreso = true;
    } else {
      $username = prueba_input($_POST["username"]);
      # Se valida
      if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $username = "Solo letras y/o numeros";
        $ingreso = true;
      }
    }
    # Password
    if (empty($_POST["password"])) {
      $passwordErr = "Campo obligatorio";
      $ingreso = true;
    } else {
      $password = prueba_input($_POST["password"]);
      # Se valida
      if (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
        $password = "Solo letras y/o numeros";
        $ingreso = true;
      }
    }
    # Correo electronico
    if (empty($_POST["correo"])) {
     $correoErr = "Campo obligatorio";
     $ingreso = true;
   } else {
      $correo = prueba_input($_POST["correo"]);
      // Se verifica que sea un formato valido
      if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $correoErr = "Formato no valido de email";
        $ingreso = true;
      }
    }

    #Conexion y registro en la base
    $servername = "localhost";
    $user = "root";
    $dbname = "tecnicatres";

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO registro_usuarios (nombre, apellido, nombreusuario, password, correo)
      VALUES ('$nombre', '$apellido', '$username', '$password', '$correo')";
      // use exec() because no results are returned
      $conn->exec($sql);
      ingresar($ingeso, "success.php");
    }
    catch(PDOException $e)
      {
        echo $sql . "<br>" . $e->getMessage();
      }
  }


  function prueba_input($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function ingresar($ingreso, $url) {
    if ($ingreso == false) {
      header('Location: '. $url);
      exit();
    }
  }

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
      <a class="navbar-brand" href="#">T3</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.html">Inicio</a></li>
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
      		<li><a href="#"><span class="glyphicon glyphicon-user"></span> Crear cuenta</a></li>
      		<li class="active"><a href="iniciosesion.php"><span class="glyphicon glyphicon-log-in"></span> Ingresar</a></li>
    	</ul>
    </div>
  </div>
</nav>

<div class="container articulos inscripcion">
  <form class="formulario" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="row">
      <div class="col-md-12">
        <label>Nombre:</label><br>
        <input class="texto" type="text" name="nombre" value="<?php echo $nombre; ?>" />
        <span class="error"><?php echo $nombreErr;?></span>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label>Apellido:</label><br>
        <input class="texto" type="text" name="apellido" value="<?php echo $apellido; ?>" />
        <span class="error"><?php echo $apellidoErr;?></span>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label>Nombre de usuario:</label><br>
        <input class="texto" type="text" name="username" value="<?php echo $username; ?>" />
        <span class="error"><?php echo $usernameErr;?></span>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label>Contrase&ntilde;a:</label><br>
        <input class="texto" type="text" name="password" value="<?php echo $password; ?>" />
        <span class="error"><?php echo $passwordErr;?></span>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label>Correo electronico:</label><br>
        <input class="texto" type="text" name="correo" value="<?php echo $correo; ?>" />
        <span class="error"><?php echo $correoErr;?></span>
      </div>
    </div>
    <input class="boton" type="submit" name="ingresar" value="Ingresar" />
  </form>
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
