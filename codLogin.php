<?php


    include('dbconect.php');
    session_start();
     
    /*if (isset($_POST['login'])) {
		
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $database = new Connection();
		$db = $database->open();
        $query = $db->prepare("SELECT * FROM usuario WHERE email_usuario= :user AND pass_usuario = :pass");
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
        }*/
    
        $database = new Connection();
        $db = $database->open();
   
if(isset($_POST['login'])){

  $usuario = $_POST['user'];
  $pass = $_POST['pass'];

  $query = "SELECT *FROM usuario WHERE 
  user = '$usuario' AND pass = '$pass'";
  $resultado = mysqli_query($conn, $query);
  $row = mysqli_num_rows($resultado);
  if($row == 1){
    echo $_SESSION['userid']= $usuario;
      echo "<p style= color: white>Bienvenido $usuario</p>";
      header('location: index.php');
  }else{
    
    echo "<script>
               alert('Usuario o password invalida');
               window.location= 'login.php'
   </script>";
    
  }
  
}

/*if(!isset($_SESSION['user_id'])){
        header('Location: login.php');
        exit;
    } */
    ?>









	