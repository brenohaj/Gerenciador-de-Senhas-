<?php 
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;


?>


<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.2" />
		

		<title>Gerenciador de Senhas</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<link rel="stylesheet" type="text/css" href="style.css">
	
		<script>
			$(document).ready(function(){
				//verificar se os campos usuario e senha foram preenchidos

				$('#btn_login').click(function(){

					var campo_vazio = false;

					if ($('#campo_usuario').val() == '') {

						$('#campo_usuario').css({'border-color': '#A94442'});
						campo_vazio = true;
					}else{

						$('#campo_usuario').css({'border-color': '#ccc'});
					}

					if ($('#campo_senha').val() == '') {

						$('#campo_senha').css({'border-color': '#A94442'});
						campo_vazio = true;
					}else{
						$('#campo_senha').css({'border-color': '#ccc'});
					}

					if (campo_vazio) return false;


				});


			});						
		</script>
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="inscrevase.php">Inscrever-se</a></li>
	    
	            </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	    	<div class="row">
	    		<div class="formulario">

	    			<div class="img-form">
	    				<img src="imagens/logo.png">
	    			</div>
			        <form method="post" action="validar_acesso.php" id="formLogin">
						<div class="form-group">
							<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" />
						</div>
						
						<div class="form-group">
							<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
						</div>
						
						<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

						<br /><br />
										
					</form>

					<?php 

					if ($erro == 1) {
						echo " <font color = '#FF000'> Usuario ou Senha Incorretos.</font>";
					}

					?>
			    </div>			
 			</div>
 		 </div>
	      <div class="clearfix"></div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>