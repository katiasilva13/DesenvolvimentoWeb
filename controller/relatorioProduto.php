<?php
  include ("../model/Produto.php");
  $objRelatorio = new Produto();

  if ($tipo=="produto"){
    $retorno = $objRelatorio->relatorioSimples();
    return $retorno;
  }elseif ($tipo=="unico") {
    $retorno = $objRelatorio->relatorioUnico($id);
    return $retorno;
  }
?>
