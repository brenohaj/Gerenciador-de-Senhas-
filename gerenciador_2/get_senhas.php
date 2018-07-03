<?php 
  

	session_start();

    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php?erro=1');
    }

    require_once('db.class.php');

     $id_usuario = $_SESSION['id_usuario'];

	 $objDb = new db();

     $link = $objDb->conecta_mysql();

    

     $sql = "SELECT DATE_FORMAT(s.data_inclusao, '%d %b %Y %T') AS data_inclusao_formatada,s.credencial, s.descricao, s.senha, s.observacao,s.id_senhas, u.usuario, c.nome_categoria ";
    $sql .= "FROM senhas AS s JOIN usuarios AS u ON (s.id_usuario = u.id) JOIN categoria AS c ON (s.id_categoria = c.id) ";
    $sql .= "WHERE id_usuario = $id_usuario ORDER BY data_inclusao DESC";



     
       $resultado_id = mysqli_query($link,$sql);
        

       if ($resultado_id) {
       	while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {

          
      
          
    

       		 echo '<div class="list-group-item" id ='.$registro['id_senhas'] .'>';
           echo "<input name = id_senhas value =".$registro['id_senhas'] ." style='visibility: hidden;'> ";

                echo '<h4 class="list-group-item-heading"> Credencial: ' . $registro['credencial'] . ' <small> - ' . $registro['data_inclusao_formatada'] . '</small></h4> <br>';

                echo '<p class="list-group-item-text"> Senha: ' . $registro['senha'] .  '</p> <br>';
                echo '<p class="list-group-item-text"> Descrição: ' . $registro['descricao'] .  '</p> <br>';
                echo '<p class="list-group-item-text"> <strong>Categoria:  </strong>' . $registro['nome_categoria'] .  '</p> <br>';

          echo "<a class='btn btn-danger' href='delete_senha.php?id=" . $registro['id_senhas'] . "'>Apagar</a><br><hr>";
    

            echo '</div>';
       	}
       }else{

       	echo "Erro na consulta ao banco de dados.";
       }


?>