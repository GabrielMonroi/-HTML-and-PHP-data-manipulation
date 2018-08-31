<?php 
    //Recebe os dados com as alterações feitas
    $id = filter_input(INPUT_POST, 'id');
    $novoNome = filter_input(INPUT_POST, 'nome');
    $telefone = filter_input(INPUT_POST, 'telefone');



    //Estabelece a conexão com o mysql
    $conexao = mysqli_connect("127.0.0.1","root","","ass");
    if( !$conexao ){
        header("Location:exibe.php?alteracao=false");
        exit;
    }
    //Executa a atualização no banco de dados
    $sql = "UPDATE dados SET nome='" . $novoNome . "', telefone='" . $telefone . "' WHERE id_dados=".$id;
    $update = mysqli_query($conexao, $sql);

    //Se não deu certo, redireciona pra exibe.php com alteracao igual a false
    if( !$update ){
        echo "<script>alert('Erro !.');window.location.href='ConsultaDados.php'</script>";
        exit;
    }

    //se tudo deu certo, redireciona pra exibe.php com alteracao igual a true
    echo "<script>alert('Alterado com Sucesso.');window.location.href='ConsultaDados.php'</script>";
?>