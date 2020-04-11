<?php
//FILTER_SANITIZE_STRING = retira tags
//FILTER_VALIDATE_EMAIL = filtra validade de e-mails
//http://www.phpit.com.br/artigos/filtrando-e-validando-dados-no-php-com-filter_var.phpit

  if (isset($_POST)){
    if (!empty($_POST["nomeProduto"]) &&
		    !empty($_POST["qtd"]) &&
  		  !empty($_POST["precoCompra"])&&
    		!empty($_POST["precoVenda"])
    ){
        $nomeProduto = filter_input(INPUT_POST, "nomeProduto", FILTER_SANITIZE_STRING);
        $qtd = filter_input(INPUT_POST, "qtd", FILTER_SANITIZE_STRING);
        $precoCompra = filter_input(INPUT_POST, "precoCompra", FILTER_SANITIZE_STRING);
        $precoVenda = filter_input(INPUT_POST, "precoVenda", FILTER_SANITIZE_STRING);
        
        include("../model/Produto.php");
        $insertProduto = new Produto();
        $i = $insertProduto->addProduto($nomeProduto, $qtd, $precoCompra, $precoVenda);
        if ($i){
            header('location: ../view/formularioProduto.php?mensagem=sucesso');
        }else{
          header('location: ../view/formularioProduto.php?mensagem=erro');
        }
      }else{
          header('location: ../view/formularioProduto.php?mensagem=erro');
      }
  }else{
      header('location: ../view/formularioProduto.php?mensagem=erro');
  }
