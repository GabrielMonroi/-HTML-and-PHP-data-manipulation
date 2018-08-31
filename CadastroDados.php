
<?php
session_start();
setcookie("ck_authorized", "true", 0, "/");

if(!isset($_SESSION["id_login"])):
	header("location: index.php");
else:
	$login = $_SESSION["id_login"];
	$coduser = $_SESSION["id_login"];
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		

		<title>Administrativo - ALM PRO</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="css/theme.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
		

	<link rel="stylesheet" type="text/css" href="css_login/util.css">
	<link rel="stylesheet" type="text/css" href="css_login/main.css">
<!--===============================================================================================-->

	</head>

	<body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="administrativo.php">Administrativo Almanaque</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="administrativo.php">Usuário</a></li>
					<li><a href="ConsultaDados.php">Gerenciamento de Dados</a></li>
					<li><a href="CadastroDados.php">Cadastro de Dados</a></li>
					<li><a href="sair.php">Sair</a></li>
						
						
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
    </nav>
	
	<div class="container theme-showcase" role="main">
		<div class="page-header">
			<h1>Gerenciamento</h1>
		</div>
		<div class="page-header">
		<form method="POST" action="cadastro.php">
						<label>Id:</label>
						<input name="usuario" type="text"  value=<?php  echo " $coduser";?> readonly style="width:22px;" >
						
						<label>Nome:</label>
						<input type="text" maxlength="256" placeholder="Nome" name="nome" >
						
						
						
						<label>Telefone:</label>
						<input type="text"  maxlength="256" placeholder="Telefone" name="telefone">
						
						
						<button type="submit"  class='btn btn-xs btn-primary'> Cadastrar </button>
						</form>
						</div>
		<div class="row">
			<div class="col-md-12">
			
				<table class="table">
					<thead>
						
						
						
						<tr>
							<th>Inscrição</th>
							<th>Nome</th>
							<th>Telefone</th>
							
							
						</tr>
					</thead>
					
					<tbody>
					
						
							
							<?php 
            //Estabelece a conexao com o mysql
            $conexao = mysqli_connect("localhost","root","","ass");
            if( !$conexao ){
                echo "Ops.. Erro na conexão.";
                exit;
            }
            //Carrega os dados
            $sql = "SELECT * FROM dados WHERE id_usuario = '$coduser'";
            $consulta = mysqli_query($conexao, $sql);
            if( !$consulta ){
                echo "Erro ao realizar consulta. Tente outra vez.";
                exit;
            }
			

            //se tudo deu certo, exibe os dados
            while( $dados = mysqli_fetch_assoc($consulta) ){
				

                echo "</tr>";
                echo "<tr>";
                echo "<td>" .$dados['id_dados']. "</td>";
                echo "<td>" .$dados['nome']. "</td>";
                echo "<td>" .$dados['telefone']. "</td>";
				
			

				
                echo "</tr>";
				

            }
        ?>
		
							
							
						            
						</td>
						</tr>              
					</tbody>
				</table>
			</div>
		</div>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="js_login/main.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

