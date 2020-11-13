<?php
  if (isset($_GET)){
    if (!empty($_GET["id"])
    ){
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
        include("../model/Produto.php");
        $excluirProduto = new Produto();
        $i = $excluirProduto->deleteProduto($id);
        if ($i){
            header('location: ../view/relatorioTelaProduto.php?mensagem=sucesso');
        }else{
          header('location: ../view/relatorioTelaProduto.php?mensagem=erro');
        }
      }else{
          header('location: ../view/relatorioTelaProduto.php?mensagem=erro');
      }
  }else{
      header('location: ../view/formProduto.php?mensagem=erro');
  }
?>
