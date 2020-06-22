<?php
  if (isset($_POST)){
    if (!empty($_POST["qtd"]) &&
    		!empty($_POST["id_item"])
    ){
        $qtd = filter_input(INPUT_POST, "qtd", FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, "id_item", FILTER_SANITIZE_STRING);
        $id_compra = filter_input(INPUT_POST, "id_compra", FILTER_SANITIZE_STRING);

        include("../model/itensCompra.php");
        $alterProduto = new itensCompra();
        $i = $alterProduto->alterarItem($qtd,  $id);
        
        if ($i){
            header('location: ../view/formItensCompra.php?mensagem=sucesso&idCompra='.$id_compra);
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
