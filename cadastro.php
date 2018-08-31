

<?php
   

// INICIA LIGAÇÃO À BASE DE DADOS
$con=mysqli_connect("127.0.0.1","root","","ass");

// VERIFICA A LIGAÇÃO NÃO TEM ERROS
if (mysqli_connect_errno())
{
    // CASO TENHA ERROS MOSTRA O ERRO DE LIGAÇÃO À BASE DE DADOS
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// CASO TUDO ESTEJA OK INSERE DADOS NA BASE DE DADOS
$sql="INSERT INTO dados (nome, telefone, id_usuario) VALUES ('$_POST[nome]','$_POST[telefone]', $_POST[usuario])";


// CASO ESTEJA TUDO OK ADICIONA OS DADOS, SENÃO MOSTRA O ERRO
if (!mysqli_query($con,$sql))
{
    die('Error: ' . mysqli_error($con));
}

// MOSTRA A MENSAGEM DE SUCESSO
echo "<script>alert('Adicionado com Sucesso.');window.location.href='CadastroDados.php'</script>";

mysqli_close($con);

?>


  
