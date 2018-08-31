<html>
<head>
    <title>Editar</title>
    <style type="text/css">
        input{
            display: block;
            margin-bottom: 1em;
            padding: 5px
        }
    </style>
</head>
    <body>
        <?php 
            //Recebe os dados a serem editados
            $id = filter_input(INPUT_POST, 'id');
            $nome = filter_input(INPUT_POST, 'nome');
            $telefone = filter_input(INPUT_POST, 'telefone');
			$endereco = filter_input(INPUT_POST, 'endereco');
			$cpf = filter_input(INPUT_POST, 'cpf');
			$email = filter_input(INPUT_POST, 'email');
        ?>
        <h2>Alteração do Material</h2>
        <form action="salvaRet.php" method="post">
            <!-- Jogamos os valores a serem editados dentro dos inputs no campo value -->
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            Nome:<input type="text" name="nome" value="<?php echo $nome; ?>">
            Telefone:<input type="text" name="telefone" value="<?php echo $telefone; ?>">
			Endereco:<input type="text" name="endereco" value="<?php echo $endereco; ?>">
			Cpf:<input type="text" name="cpf" value="<?php echo $cpf; ?>">
			Email:<input type="text" name="email" value="<?php echo $email; ?>">
            <input type="submit" value="Salvar alterações">
        </form>
    </body>
</html>