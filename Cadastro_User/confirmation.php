<?php
	include_once("conexao_cadastro.php");
	
	$nome_usuario = $_POST['username'];
	$email_usuario = $_POST['email'];
	$senha_usuario = $_POST['senha'];
	//echo "$nome_usuario - $email_usuario";
	

	if(isset($_POST['email'])){ 

    #Recebe o Email Postado
    $emailPostado = $_POST['email'];

    #Conecta banco de dados 
    
    $sql = mysqli_query($conn, "SELECT * FROM testanto WHERE email = '{$emailPostado}'") or print mysql_error();

    #Se o retorno for maior do que zero, diz que já existe um.
    if(mysqli_num_rows($sql)>0) {
        echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://devproject.technology/Cadastro/'>
					<script type=\"text/javascript\">
						alert(\"O Usuario já tem Cadastro.\");
					</script>
				";	
    }else{ 
		
			$result_usuario = "INSERT INTO usuarios(nome, email, senha) VALUES ('$nome_usuario','$email_usuario','$senha_usuario')";
			$resultado_usuario = mysqli_query($conn, $result_usuario);
        echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://devproject.technology/Login/'>
					<script type=\"text/javascript\">
						alert(\"Você já pode fazer seu Login.\");
					</script>
				";	
				}
}
?>

