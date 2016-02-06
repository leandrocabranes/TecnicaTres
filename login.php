<?php 

session_start();
$error = "";

if (isset($_POST["submit"])) {
	if (empty($_POST["username"]) || empty($_POST["password"])) {
		$error = "Usuario y/o contrase&ntilde;a invalidos";
	}else {
		$username = $_POST["username"];
		$password = $_POST["password"];
		// Conexion a la base de datos
		$servername = "localhost";
	    $user = "root";
	    $dbname = "tecnicatres";

	    try {
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    echo "Conexion exitosa";
		    $username = stripcslashes($username);
		    $password = stripcslashes($password);
		    $username = mysql_real_escape_string($username);
		    $password = mysql_real_escape_string($password);

		    $BD = mysql_select_db("tecnicatres", $conn);

		    $query = mysql_query("SELECT * FROM registro_usuarios WHERE password='$password' AND nombreusuario='$username'", $conn);

		    $sql = "";
		    // use exec() because no results are returned
		    $conn->exec($sql);
	    }
	    catch(PDOException $e){
	        echo $sql . "<br>" . $e->getMessage();
	    }
	}
}

?>
