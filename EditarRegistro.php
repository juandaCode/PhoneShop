<?php
	session_start();
	include_once('dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
			$db = $database->open();
		try{
			$id_usuario = $_GET['id_usuario'];
			$nombre_usuario = $_POST['nombre_usuario'];
			$email_usuario = $_POST['email_usuario'];
			$telefono_usuario = $_POST['telefono_usuario'];
			$pass_usuario = $_POST['pass_usuario'];

			$sql = "UPDATE usuario SET nombre_usuario = '$nombre_usuario', email_usuario = '$email_usuario', telefono_usuario = '$telefono_usuario', pass_usuario = '$pass_usuario' WHERE id_usuario = '".$_GET['id_usuario']."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Empleado actualizado correctamente' : 'No se pudo actualizar empleado';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: index.php');

?>