<?php 
    //recebe o id dos dados que serão apagados
    $id = filter_input(INPUT_POST, 'id');

    //estabelece a conexão
    $conexao = mysqli_connect("127.0.0.1","root","","ass");
    if( !$conexao ){
        echo "Ops.. Erro na conexão.";
        exit;
    }
    //Executa a query
    $sql = "DELETE FROM dados WHERE id_dados=".$id;
    $remove = mysqli_query($conexao, $sql);
    //Se falhou, redireciona pra exibe.php com remove igual a false 
    if( !$remove ){
        echo "<script>alert('Erro.');window.location.href='ConsultaDados.php'</script>";
        exit;
    }
    //se tudo deu certo, redireciona pra exibe.php com remove igual a true
    echo "<script>alert('Removido com Sucesso.');window.location.href='ConsultaDados.php'</script>";
?>