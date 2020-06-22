<?php
  require_once("../verificarLogin.php");
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <!--<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">-->
    <link href="../bootstrap-4.4.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
  
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">NOME DO SISTEMA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav mr-auto">

              <li class="nav-item active">
                <a class="nav-link" href="../index.php">Home <span class="sr-only">(Página atual)</span></a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Usuário</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="formUsuario.php">Cadastro</a>
                  <a class="dropdown-item" href="relatorioTelaUsuario.php">Relatório Geral</a>
                </div>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Produto</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="formProduto.php">Cadastro</a>
                  <a class="dropdown-item" href="relatorioTelaProduto.php">Relatório Geral</a>
                </div>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Compras</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="formCompra.php">Realizar Compra</a>
                  <a class="dropdown-item" href="relatorioCompra.php">Relatório Geral</a>
                </div>
              </li>

              
              <li class="nav-item">
                <a class="nav-link" href="../deslogar.php">Sair</a>
              </li>
                  
          </ul>
          <?php
          if($_SESSION["id"]){
              echo "<a href=alterarPerfil.php?id=$_SESSION[id]>";
          ?>
              <button type="submit" class="btn btn-primary">Perfil</button></a>";
<?php
          }
        ?>

        <!--<form class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search">
        </form>-->
        </div>
      </nav>  
<!-- <div class="container-fluid"> utilizado para largura total-->
    
<div class="container">
      <!-- Conteúdo aqui -->
      <div class="row">
        <div class="col">
            &nbsp;
        </div>
      </div>
      <!--<h3>Formulário de Compra</h3>-->
      <div class="row">
        <div class="col">
          <?php
          if ( !isset( $_GET ) || empty( $_GET ) ) {
        	   //$erro = 'Nada foi postado.';
          }else{
          //  if($_GET["mensagem"] == "sucesso"){

            if($_GET["mensagem"]){
              $mensagem = $_GET["mensagem"];
              if($mensagem=="compraSucesso"){
                ?>
                <div class="alert alert-success" role="alert">
                  Compra aberta com sucesso!!!
                </div>
                <?php
              }elseif($mensagem=="faltaEstoque") {
                ?>
                <div class="alert alert-danger" role="alert">
                  Produto em falta!!!
                </div>
                <?php
              }elseif($mensagem=="itemCompraSucesso") {
                ?>
                <div class="alert alert-success" role="alert">
                  Produto incluido com sucesso!!!
                </div>
                <?php
              }elseif($mensagem=="RemoveSuccess") {
                ?>
                <div class="alert alert-success" role="alert">
                  Produto removido com sucesso!!!
                </div>
                <?php
              }else{
                ?>
              <div class="alert alert-danger" role="alert">
                Ocorreu um erro ao gravar!!! Tente voltar para a página anterior!
              </div>
              <?php
            }
            }
          }
          ?>
        </div>
      </div>
      <?php
      //***************************************************
      //DEIXAR DINÂMICO
      //***************************************************
     
        $idCompra = $_GET["idCompra"];

        include("../model/Produto.php");
        $objetoRetorno = new Produto();
        //PONTO DE MELHORIA

        $retornoCompra=$objetoRetorno->devolveCompra($idCompra);
      /*  echo "<pre>";
        print_r($retornoCompra);
        echo "</pre>";*/
        $retornoItensCompra = $objetoRetorno->produtosCompra($idCompra);
        /*  echo "<pre>";
          print_r($retornoItensCompra);
          echo "</pre>";*/
      ?>
      <h4>Cliente: <?=$retornoCompra[0]["nome"]?></h4>
      <h5>Busca de Produto</h5>
      <div  class="alert alert-dark" role="alert">
      <form action="../controller/cadItensCompra.php" method="post">
        <div class="row">
          <div class="col-2">
            <label for="nome">Produto:</label>
            <select class="form-control" name="idProduto" required>
              <?php
                $retornoProduto = $objetoRetorno->relatorioSimples();
                foreach ($retornoProduto as $key => $value) {
                ?>
                <option value=<?=$value["id"]?>><?=$value["nomeProduto"];?></option>
                <?php
              }
              ?>
            </select>
          </div>
          <div class="col-2">
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" class="form-control" placeholder="Quantidade" required>
          </div>
          <div class="col-2">
            <label for="desconto">Desconto:</label>
            <input type="text" id="desconto" value ="0.0" name="desconto" class="form-control" placeholder="Desconto">
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <input type="hidden" name="idCompra" value=<?=$idCompra;?>>
            <BR><button type="submit" class="btn btn-primary">ADICIONAR NOVO PRODUTO</button>
          </div>
        </div>
      </form>
</div>
<!--dados da compra aqui.-->
<div class="card"><!--PONTO DE MELHORIA-->
  <div class="card-body"><!--PONTO DE MELHORIA-->
    <h4>ITENS DA COMPRA</h4>
    <div class="row">
      <div class="col">
        <div class="table-responsive">
           <table class="table">
             <th>ITEM</th>
             <th>PRODUTO</th>
             <th>QTD</th>
             <th>PREÇO ORIGINAL (R$)</th><!--PONTO DE MELHORIA-->
             <th>DESCONTO (%)</th>
             <th>PREÇO PRODUTO (R$)</th>
             <th>TOTAL</th><!--PONTO DE MELHORIA-->
             <th colspan="2">AÇÃO</th>
             <?php
                $total = 0; //PONTO DE MELHORIA

                $i = 1;
                foreach ($retornoItensCompra as $value) {
                $id = $value["id"];
                ?>
                <tr>
                  <td><?=$i++?></td>
                  <td><?=$value["nomeproduto"];?></td>
                  <td><?=$value["quantidade"];?></td>
                  <td style="text-align: right;">
                    <?php
                      //PONTO DE MELHORIA
                      //$value["precoProduto"];
                      echo  number_format($value["precoOriginalProduto"], 2, ',', '.');
                    ?>
                  </td>
                  <td style="text-align: right;"><?=$value["desconto"];?></td>
                  <td style="text-align: right;">
                    <?php
                      //PONTO DE MELHORIA
                      //$value["precoProduto"];
                      echo  number_format($value["precoProduto"], 2, ',', '.');
                    ?>
                  </td>
                  <td style="text-align: right;">
                    <?php
                    $totalProduto = $value["quantidade"] * ($value["precoProduto"] - ($value["precoProduto"] * $value["desconto"])/100);
                    //  $totalProduto = $value["precoProduto"] - ($value["precoProduto"] * $value["desconto"])/100;
                      echo  number_format($totalProduto, 2, ',', '.');
                    ?>
                  </td>
                  <td>
                    <?php
                      echo "<a class= 'btn btn-success btn-xs' href=../controller/alterarCarrinho.php?id=$id&idCompra=$idCompra>ALTERAR</a>";
                    ?>
                  </td>
                  <td>
                    <?php
                      echo "<a class= 'btn btn-danger btn-xs' href=../controller/removerCarrinho.php?id=$id&idCompra=$idCompra>EXCLUIR</a>";
                    ?>
                  </td>
                </tr>
                <?php
                  $total = $total + $totalProduto;
              }//fecha foreach
              ?>
           </table>
    </div>



       <div class="row">
        <div  class="alert alert-success" role="alert">
          <h4>TOTAL COMPRA = R$ <?=number_format($total, 2, ',', '.');?> </h4>
          <h5>Forma de Pagamento = <?=$retornoCompra[0]["formaPagamento"]?></h5>
          <h5>Parcelamento = <?php

          $valorParcela = $total/$retornoCompra[0]["formaPagamento"];
          echo number_format($valorParcela, 2, ',', '.');

          ?></h5>
          <?php
          echo "<a class= 'btn btn-success btn-xs' href=../controller/fecharCompra.php?idCompra=". $idCompra. "&totalCompra=". $total .">
              FECHAR COMPRA
            </a>";
          ?>
      </div>

      </div>
  </div>
</div>

</div>
</div>
<!-- ******** -->

</div>
    
  <footer class="bd-footer text-muted">
    <a class="navbar-brand" href="#"><br>Usuário Autenticado: <?=$_SESSION["nomeUsuario"];?>
      <br>E-mail: <?=$_SESSION["emailUsuario"];?>
    </a>
    <p>&copy; Company 2017-2019</p>
  </footer>
  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
          <script>window.jQuery || document.write('<script src=" /site/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
    <script src="../bootstrap-4.4.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>

    <!--<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->
</body>

</html>