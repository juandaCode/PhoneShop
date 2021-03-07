<?php


    include('dbconect.php');
    session_start();
     
    if (isset($_POST['login'])) {
		
        $user = $_POST['user'];
        $password = $_POST['pass'];
        $database = new Connection();
		$db = $database->open();
        $query = $db->prepare("SELECT * FROM usuario WHERE email_usuario=:user AND pass_usuario = :pass");
        $query->bindParam("user", $user, "pass", $pass, PDO::PARAM_STR);
        $query->execute();
     
        $result = $query->fetch(PDO::FETCH_ASSOC);
     
        if (!$result) {
            echo '<p class="error">No se ha encontrado ningun usuario!!</p>';
        } else {
            //if (password_verify($password, $result['pass'])) {
                $_SESSION['user_id'] = $result['id_usuario'];
                echo '<p class="success">Congratulations, Has ingresado satisfactoriamente!</p>';
            }
        }
    







	if(!isset($_SESSION['user_id'])){
        header('Location: header.php');
        exit;
    } 
    ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PhoneShop</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="content"><hr>
    <div>
        <h1>PHONESHOP</h1><br>
    </div>
        <div>
            <h2>Tecnologia a tu estilo</h2><br>
        </div>
            <div class="login form">
                <form action="index.php"method="POST" >
                    <label for="user">USUARIO</label>
                    <input type="text" name="user">
                    <label for="pass">PASSWORD</label>
                    <input type="password" name="pass">
                    <input type="submit" name="login" value="ENVIAR">
                </form>


    </div>
</div>



</body>
</html>