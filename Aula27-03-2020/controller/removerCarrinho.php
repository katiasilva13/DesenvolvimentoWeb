<?php
  if (isset($_GET)){
    if (!empty($_GET["id"])){
        $id = $_GET["id"];
        $idCompra = $_GET["idCompra"];
        include("../model/itensCompra.php");
        $removerCarrinho = new itensCompra();
        $i = $removerCarrinho->removerItem($id);

        if ($i){
          header('location: ../view/formItensCompra.php?mensagem=RemoveSuccess&idCompra=' . $idCompra);
        }else{
          header('location: ../view/formItensCompra.php?mensagem=erro&errosalvar=true');
        }
        
      }else{
          header('location: ../view/formItensCompra.php?mensagem=erro&erroformulario=true');
      }
  }else{
      header('location: ../view/formItensCompra.php?mensagem=erro&erroconn=true');
  }
?>