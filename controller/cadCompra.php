<?php

  if (isset($_POST)){
    if (!empty($_POST["idUsuario"]) &&
    		!empty($_POST["formaPagamento"])
    ){
        $idUsuario = filter_input(INPUT_POST, "idUsuario", FILTER_SANITIZE_STRING);
        $formaPagamento = filter_input(INPUT_POST, "formaPagamento", FILTER_SANITIZE_STRING);
        
        include("../model/Compra.php");
        $insertCompra = new Compra();
        $idCompra = $insertCompra->addCompra($idUsuario, $formaPagamento);
        
        if ($idCompra){          
          header('location: ../view/formItensCompra.php?mensagem=compraSucesso&idCompra='.$idCompra);
        }else{
          header('location: ../view/formCompra.php?mensagem=erro');
        }
      }else{
          header('location: ../view/formCompra.php?mensagem=erro');
      }
  }else{
      header('location: ../view/formCompra.php?mensagem=erro');
  }
