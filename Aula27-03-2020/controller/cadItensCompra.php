<?php

if (isset($_POST)) {
  //erro na linha de checagem de variáveis


  if (!empty($_POST["idProduto"]) && !empty($_POST["quantidade"]) && !empty($_POST["idCompra"])) {
    $idProduto = filter_input(INPUT_POST, "idProduto", FILTER_SANITIZE_STRING);
    $quantidade = filter_input(INPUT_POST, "quantidade", FILTER_SANITIZE_STRING);
    $desconto = filter_input(INPUT_POST, "desconto", FILTER_SANITIZE_STRING);
    $idCompra = filter_input(INPUT_POST, "idCompra", FILTER_SANITIZE_STRING);

    include("../model/itensCompra.php");
    $insertCompra = new ItensCompra();
    $idItensCompra = $insertCompra->addItensCompra($idProduto, $idCompra, $quantidade, $desconto);

    try {
      if ($idItensCompra[1] == 1) {
        //dar fim no ciclo de inserir produto no carrinho
        //construir um relatorio de itens da compra.
        header('location: ../view/formItensCompra.php?mensagem=itemCompraSucesso&idCompra=' . $idItensCompra[0]);
      } else {
        header('location: ../view/formItensCompra.php?mensagem=faltaEstoque&idCompra=' . $idItensCompra[0]);
      }
    } catch (Exception $e) {
      echo $e;
      exit;
    }
  } else {
    // echo "teste" . ($idCompra  = filter_input(INPUT_POST, "idCompra", FILTER_SANITIZE_STRING));
    // exit;
    header('location: ../view/formCompra.php?mensagem=erro');
  }
} else {
  header('location: ../view/formCompra.php?mensagem=erro');
}
