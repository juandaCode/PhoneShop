<?php
	session_start();
	include_once('dbconect.php');

	if(isset($_GET['id_usuario'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM usuario WHERE id_usuario = '".$_GET['id_usuario']."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Usuario Borrado' : 'Hubo un error al borrar el usuario';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar conexión
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Seleccionar usuario para eliminar primero';
	}

	header('location: index.php');

?>