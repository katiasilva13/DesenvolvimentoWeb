<?php
  $idCompra = $_GET["idCompra"];
  $totalCompra = $_GET["totalCompra"];

  include("../model/Compra.php");

  $fecharCompra = new Compra();

  $retornoCompra = $fecharCompra->fecharCompraCliente($idCompra, $totalCompra);
  if($retornoCompra == 1){
    header('location: ../view/relatorioCompra.php');
  }else{
    header('location: ../view/formCompra.php?mensagem=erroFinalizar');
  }
?>
