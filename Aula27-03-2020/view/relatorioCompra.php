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

    <div class="container">
      <!-- Conteúdo aqui -->
      <div class="row">
        <div class="col">
            &nbsp;
        </div>
      </div>
      <div class="row">
        <div class="alert alert-success" role="alert">
          <form action="#" method="POST">
            <div class="row">
              <div class="col-4">
                <label for="nome">Data Início:</label>
                <input type="date" name="dataInicio">
              </div>
              <div class="col-4">
                <label for="nome">Data Término:</label>
                  <input type="date" name="dataTermino">
              </div>
              <div class="col-4">
                <br>
                  <button type="submit" class="btn btn-primary">BUSCAR</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <?php

      if ($_POST){
        $dataInicio = $_POST["dataInicio"];
        $dataTermino = $_POST["dataTermino"];

        include("../model/Compra.php");
        $relatorio = new Compra();

        $retornoCompra =  $relatorio->relatorioGeral($dataInicio, $dataTermino);
        ?>
        <div class="card"><!--PONTO DE MELHORIA-->
          <div class="card-body"><!--PONTO DE MELHORIA-->
            <h4>Relatório</h4>
            <div class="row">
              <div class="col">
                <div class="table-responsive">
                   <table class="table">
                     <th>ITEM</th>
                     <th>NÚMERO COMPRA</th>
                     <th>CLIENTE</th>
                     <th>DATA COMPRA</th><!--PONTO DE MELHORIA-->
                     <th>FORMA PAGAMENTO</th>
                     <th>TOTAL</th>
                     <?php
                        $total = 0; //PONTO DE MELHORIA
                        $maior = 0;
                        $menor = 0;
                        $i = 1;
                        
                        // echo "<pre>"; print_r($retornoCompra); die();
                        ?>
                        <?php foreach ($retornoCompra as $key => $value) :?>
                        
                        <tr>
                          <td><?=$i++?></td>
                          <td><?=$value->id;?></td>
                          <td><?=$value->nome;?></td>
                          <td>

                            <?php
                              $dataCadastro = new DateTime($value->dataHoraCompra);
                              echo $dataCadastro->format("d/m/Y H:i:s") . ' ';
                            ?>

                          </td>
                          <td><?=$value->formaPagamento;?></td>
                          <td style="text-align: right;">
                            <?php
                              //PONTO DE MELHORIA
                              //$value["precoProduto"];
                              echo  number_format($value->valorTotal, 2, ',', '.');
                            ?>
                          </td>
                        </tr>
                        <?php
                          $total = $total + $value->valorTotal;

                          if($value->valorTotal > $maior){
                            $menor = $maior;
                            $maior = $value->valorTotal;
                          }else{
                            $menor = $value->valorTotal;
                          }
                          ?>
                      <?php endforeach; ?>
                      <!-- fecha foreach -->

                      
                   </table>
            </div>
            <div class="row">
             <div  class="alert alert-success" role="alert">
               <h4>TOTAL RELATÓRIO = R$ <?=number_format($total, 2, ',', '.');?> </h4>
               <?php
                  echo "Número de compras retornadas = " .  count($retornoCompra);
                  if(count($retornoCompra) > 0){
                      $media = $total/count($retornoCompra);
                  }else $media=0;
                  
                  echo "<br>Valor Médio = R$ " . number_format($media, 2, ',', '.');

                 echo "<br>Menor Compra = ". $menor;
                 echo "<br>Maior Compra = ". $maior;
               ?>
           </div>
          </div>
        </div>
        </div>

        </div>
        </div>

        <?php
      }

      ?>


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
<!--
https://webdevacademy.com.br/ux/crud-com-bootstrap-3-parte5/
-->
