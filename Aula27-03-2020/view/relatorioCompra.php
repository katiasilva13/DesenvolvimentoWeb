<?php require_once("../verificarLogin.php"); ?>

<?php require_once("header.php"); ?>

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

  if ($_POST) {
    $dataInicio = $_POST["dataInicio"];
    $dataTermino = $_POST["dataTermino"];

    include("../model/Compra.php");
    $relatorio = new Compra();

    $retornoCompra =  $relatorio->relatorioGeral($dataInicio, $dataTermino);
  ?>
    <div class="card">
      <!--PONTO DE MELHORIA-->
      <div class="card-body">
        <!--PONTO DE MELHORIA-->
        <h4>Relatório</h4>
        <div class="row">
          <div class="col">
            <div class="table-responsive">
              <table class="table">
                <th>ITEM</th>
                <th>NÚMERO COMPRA</th>
                <th>CLIENTE</th>
                <th>DATA COMPRA</th>
                <!--PONTO DE MELHORIA-->
                <th>FORMA PAGAMENTO</th>
                <th>TOTAL</th>
                <?php
                $total = 0; //PONTO DE MELHORIA
                $maior = 0;
                $menor = 0;
                $i = 1;

                // echo "<pre>"; print_r($retornoCompra); die();
                ?>
                <?php foreach ($retornoCompra as $key => $value) : ?>

                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $value->id; ?></td>
                    <td><?= $value->nome; ?></td>
                    <td>

                      <?php
                      $dataCadastro = new DateTime($value->dataHoraCompra);
                      echo $dataCadastro->format("d/m/Y H:i:s") . ' ';
                      ?>

                    </td>
                    <td><?= $value->formaPagamento; ?></td>
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

                  if ($value->valorTotal > $maior) {
                    $menor = $maior;
                    $maior = $value->valorTotal;
                  } elseif ($value->valorTotal < $menor) {
                    $menor = $value->valorTotal;
                  }
                  ?>
                <?php endforeach; ?>
                <!-- fecha foreach -->

              </table>
            </div>
            <div class="row">
              <div class="alert alert-success" role="alert">
                <h4>TOTAL RELATÓRIO = R$ <?= number_format($total, 2, ',', '.'); ?> </h4>
                
                <?php
                echo "Número de compras retornadas = " .  count($retornoCompra);
                if (count($retornoCompra) > 0) {
                  $media = $total / count($retornoCompra);
                } else $media = 0;

                echo "<br>Valor Médio = R$ " . number_format($media, 2, ',', '.');
                echo "<br>Menor Compra = " . $menor;
                echo "<br>Maior Compra = " . $maior;
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


  <a class="navbar-brand" href="#"><br>Usuário Autenticado: <?= $_SESSION["nomeUsuario"]; ?>
    <br>E-mail: <?= $_SESSION["emailUsuario"]; ?>
  </a>
  <p>&copy; Company 2017-2019</p>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src=" /site/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')
</script>
<script src="../bootstrap-4.4.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>

<!--<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->
</body>

</html>
<!--
https://webdevacademy.com.br/ux/crud-com-bootstrap-3-parte5/
-->