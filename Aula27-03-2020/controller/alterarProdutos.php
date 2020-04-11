<?php
  if (isset($_POST)){
    if (!empty($_POST["nomeProduto"]) &&
        !empty($_POST["qtd"]) &&
        !empty($_POST["precoCompra"])&&
        !empty($_POST["precoVenda"])&&
    		!empty($_POST["id"])
    ){
        $nomeProduto = filter_input(INPUT_POST, "nomeProduto", FILTER_SANITIZE_STRING);
        $qtd = filter_input(INPUT_POST, "qtd", FILTER_SANITIZE_STRING);
        $precoCompra = filter_input(INPUT_POST, "precoCompra", FILTER_SANITIZE_STRING);
        $precoVenda = filter_input(INPUT_POST, "precoVenda", FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING);

        include("../model/Produto.php");
        $alterProduto = new Produto();
        $i = $alterProduto->alterProduto($nomeProduto, $qtd, $precoCompra, $precoVenda, $id);
        if ($i){
            header('location: ../view/alterarProduto.php?mensagem=sucesso');
        }else{
          header('location: ../view/alterarProduto.php?mensagem=erro');
        }
      }else{
          header('location: ../view/alterarProduto.php?mensagem=erro');
      }
  }else{
      header('location: ../view/formularioProduto.php?mensagem=erro');
  }
?>
