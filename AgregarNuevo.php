<?php
session_start();
include_once('dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO usuario (id_usuario, nombre_usuario, email_usuario, telefono_usuario, pass_usuario) VALUES (:id_usuario, :nombre_usuario, :email_usuario, :telefono_usuario, :pass_usuario)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':id_usuario' => $_POST['id_usuario'] , ':nombre_usuario' => $_POST['nombre_usuario'] , ':email_usuario' => $_POST['email_usuario'], ':telefono_usuario' => $_POST['telefono_usuario'], ':pass_usuario' => $_POST['pass_usuario'])) ) ? 'Empleado guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';	
	
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
}

else{
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: index.php');
	
?>