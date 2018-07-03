<?php 
	session_start();

	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php?erro=1');
	}
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title >Gerenciador de Senhas</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<script type="text/javascript">
			
			$(document).ready(function(){

				$('#btn_add').click(function(){

					if ($('#descricao') == ''|| $('#credencial') ==''|| $('#senha_2') == '' || $('#obs') == '' || $('#obs') == '') {
					        alert('erro ao cadastrar senha.')
					    }

						$.ajax({

							url: 'add_senha.php',

							method: 'POST',

							data: $('#formAdd').serialize(),

							success: function(data){
								
								atualiza_senha();

							}

						});

						
					

				});

				function atualiza_senha(){
							//carregar senhas

							$.ajax({

								url:'get_senhas.php',
								success: function(data){
									$('#senhas-03').html(data);
									
								}

							});

						}


			

				$('#excluir').click(function(){


					$.ajax({

								url:'delete_senha.php',
								success: function(data){
									
									alert('excluido com suceso.')
									atualiza_senha();
								}

							});

				

				});		

						atualiza_senha();

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
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	
	    	<div class="col-md-3">
	    		<div class="panel panel-info">
			    <div class="panel-heading">Bem Vindo - <?= $_SESSION['usuario'];?>  </div>
			    
    		</div>

	    	</div>
	    	<div class="col-md-9">
	    		<div class="panel panel-info">
			    <div class="panel-heading">Gerenciador de Senhas</div>
			    <div class="panel-body">
			    	
			    	 <form class="form-group"  id="formAdd">
						<div class="form-group">
							<input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição da credencial" required maxlength="99" >
						</div>
						
						<div class="form-group">
							<input type="text" class="form-control" id="credencial" name="credencial" placeholder="Credencial" required  maxlength="99">
						</div>

						<div class="form-group">
							<input type="text" class="form-control" id="senha_2" name="senha_2" placeholder="Senha" required maxlength="50" >
						</div>
						
						<div class="form-group">
							<input type="text" class="form-control" id="obs" name="obs" maxlength="99" placeholder="Observação" required="" >
						</div>

						<div class="form-group">
						  <label>Categoria</label>
						  <select class="form-control" name="categoria" id="categoria" required>
						    <option value="1">Redes Socias</option>
						    <option value="2">FTP</option>
						    
						  </select>
						</div>
						
						<button type="buttom" class="btn btn-success" id="btn_add">Adicionar</button>

						<br /><br />
										
					</form>


			    </div>
	    		  
	    		
	    	
			</div>
			


		</div>


		
			<div class="col-md-12">
				<div class="list-group" id="senhas-03">  
					

				</div>
			</div>
		


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>