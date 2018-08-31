<?php 
    //Recebe os dados com as alterações feitas
    $id = filter_input(INPUT_POST, 'id');
    $novoNome = filter_input(INPUT_POST, 'nome');
    $telefone = filter_input(INPUT_POST, 'usuario');
	$senha = filter_input(INPUT_POST, 'senha');



    //Estabelece a conexão com o mysql
    $conexao = mysqli_connect("127.0.0.1","root","","ass");
    if( !$conexao ){
        header("Location:exibe.php?alteracao=false");
        exit;
    }
    //Executa a atualização no banco de dados
    $sql = "UPDATE testanto SET nome='" . $novoNome . "', usuario='" . $telefone . "', senha='" . $senha. "' WHERE id_login=".$id;
    $update = mysqli_query($conexao, $sql);

    //Se não deu certo, redireciona pra exibe.php com alteracao igual a false
    if( !$update ){
        echo "<script>alert('Erro !.');window.location.href='administrativo.php'</script>";
        exit;
    }

    //se tudo deu certo, redireciona pra exibe.php com alteracao igual a true
    echo "<script>alert('Alterado com Sucesso.');window.location.href='administrativo.php'</script>";
?>