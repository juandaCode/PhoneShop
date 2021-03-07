<?php 

include ("config/conexion.php");
  
session_start();
 
 
if(isset($_POST['validar_login'])){
	$database = new Connection();
	$db = $database->open();
	$usuario = $_POST['user'];
	$pass = $_POST['pass'];

$query = "SELECT *FROM usuario WHERE 
user_usuario = '$usuario' AND pass_usuario = '$pass'";
$resultado = mysqli_query($con, $query);
if(!$resultado){
    echo "<p style= color: white>El usuario o contraseña son incorrectos</p>";
}else{
    //header('location: session.php');
}

}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		body{
			background: black;
		}
		*{
			color: white;
		}
		.titulo{
			display: block;
			margin: auto;
			text-align: center;
		}
		.boton{
			opacity: 1;
			padding: 20px 80px;
			border-radius: 20px;
			/*transition: opacity 20s ease-in-out;*/
			box-shadow: 0px 0px 25px blue;
			color: black;
		}
		.boton:hover{
			box-shadow: 0px 0px 25px red;
		}

	</style>
</head>
    <div>
    <h1>PHONESHOP<h1>
    <form class="" action="session.php" method="POST">
    <label for="user">Usuario</label>
    <input type="text" name="user" placeholder="Ingrese Email Usuario" required>
    <label for="pass">Password</label>
    <input type="password" name="pass" placeholder="Ingrese Password"required>
    <input type="submit" name="validar_login" value="INGRESAR">
    <a href="ingresarUsuario.php">No tienes cuenta? Registrate</a>
    </div>
<body>

 	
</body>
</html>