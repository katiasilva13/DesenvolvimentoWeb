<?php

  include ("../model/ItensCompra.php");
  $objRelatorio = new ItensCompra();

  if ($tipo=="itensCompra"){
    $retorno = $objRelatorio->produtosCompra($idCompra);
    return $retorno;
  }elseif ($tipo=="unico") {
    $retorno = $objRelatorio->relatorioUnico($id);
    return $retorno;
  }
?>
