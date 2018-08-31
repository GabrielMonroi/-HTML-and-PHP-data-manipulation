<?php

session_start();
	
	$login = $_POST["email"];
	$senha = $_POST["senha"];
	
	$loginSeguro = addslashes($login);
	$senhaSegura = addslashes($senha);
	
	if (empty($login) or empty($senha)) {
    echo "<script>
          alert('Preencha todos os campos');
          history.go(-1);
          </script>";
    exit;    
  }
	
	
	include 'conexao.php';
	
	$sql = "SELECT * FROM testanto WHERE usuario ='$loginSeguro' AND senha = '$senhaSegura' ";
	$dados = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($dados);
	
	if ($num == 0){
		echo "<script>
				alert('Usuario ou senha Incorreta');
				history.go(-1);
			  </script>";
		exit;
	} else {
		$linha = mysqli_fetch_object($dados);
		$coduser = $linha->id_login;
		
		$_SESSION["id_login"] = $coduser;
		
        //adiciona na sessão o login
        $_SESSION["usuario"] = $login;
		
	
		
		//redireciona para a página restrita
		header ("Location: administrativo.php");
		
	}
	
 	 mysqli_close($conn);