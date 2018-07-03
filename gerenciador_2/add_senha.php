<?php

	session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php?erro=1');
    }
	require_once('db.class.php');
    $id_senha = $_SESSION['id_senhas'];
    $descricao = $_POST['descricao'];
    $credencial = $_POST['credencial'];
    $senha = $_POST['senha_2'];
    $obs = $_POST['obs'];
    $categoria = $_POST['categoria'];
    $id_usuario = $_SESSION['id_usuario'];
    
    if ($id_usuario != ''&& $descricao !=''&& $credencial != '' && $senha != '' && $obs != '' && $categoria != '') {

        $objDb = new db();

        $link = $objDb->conecta_mysql();

        $sql = "insert into senhas(id_usuario, id_categoria, descricao, credencial, senha, observacao) values ($id_usuario,'$categoria','$descricao', '$credencial', '$senha', '$obs')";

        mysqli_query($link,$sql);

       
    }else{

        echo "ERRO";
    }

    

?>