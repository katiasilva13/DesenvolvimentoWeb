<?php
  if (isset($_POST)){
    if (!empty($_POST["nome"]) &&
		    !empty($_POST["email"]) &&
  		  !empty($_POST["login"])&&
    		!empty($_POST["id"])
    ){
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
        $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING);

        if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
          echo("Email is not valid");
        } else {
          $email = filter_input(INPUT_POST, "email");
        }
        include("../model/Usuario.php");
        
        $alterUsuario = new Usuario();
        if (!empty($_POST["senhaAtual"]) &&
    		    !empty($_POST["novaSenha"])
        ){
          $senhaAtual = filter_input(INPUT_POST, "senhaAtual", FILTER_SANITIZE_STRING);
          $novaSenha = filter_input(INPUT_POST, "novaSenha", FILTER_SANITIZE_STRING);
          $i = $alterUsuario->alterPerfilUsuario($nome, $email, $login, $id, $senhaAtual, $novaSenha);
        }else {
          $i = $alterUsuario->alterUsuario($nome, $email, $login, $id);
        }               
        
        if ($i){
            header('location: ../view/alterarUsuario.php?mensagem=sucesso');
        }else{
          header('location: ../view/alterarUsuario.php?mensagem=erro');
        }
      }else{
          header('location: ../view/alterarUsuario.php?mensagem=erro');
      }
  }else{
      header('location: ../view/formUsuario.php?mensagem=erro');
  }
?>
