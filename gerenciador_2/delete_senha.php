<?php
session_start();
require_once('db.class.php');
 $objDb = new db();
 $link = $objDb->conecta_mysql();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
    $result_usuario = "DELETE FROM senhas WHERE id_senhas='$id'";
    $resultado_usuario = mysqli_query($link, $result_usuario);
    if(mysqli_affected_rows($link)){
        $_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
        header('Location: home.php');
    }else{
        
        $_SESSION['msg'] = "<p style='color:red;'>Erro o usuário não foi apagado com sucesso</p>";
        header('Location: home.php');
    
    }
}else{  
    $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
 
}
