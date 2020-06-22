<?php
  if (isset($_POST)){
    if (!empty($_POST["nomeProduto"]) &&
        !empty($_POST["qtd"]) &&
        !empty($_POST["desconto"])&&
    		!empty($_POST["id"])
    ){
        $nomeProduto = filter_input(INPUT_POST, "nomeProduto", FILTER_SANITIZE_STRING);
        $qtd = filter_input(INPUT_POST, "qtd", FILTER_SANITIZE_STRING);
        $precoCompra = filter_input(INPUT_POST, "desconto", FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING);

        include("../model/itensCompra.php");
        $alterProduto = new itensCompra();
        $i = $alterProduto->alterarItem($nomeProduto, $qtd, $desconto, $id);
        if ($i){
            header('location: ../view/formItensCompra.php?mensagem=sucesso');
        }else{
          header('location: ../view/formItensCompra.php?mensagem=erro');
        }
      }else{
          header('location: ../view/formItensCompra.php?mensagem=erro');
      }
  }else{
      header('location: ../view/formItensCompra.php?mensagem=erro');
  }
?>
