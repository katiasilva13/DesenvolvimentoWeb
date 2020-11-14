<?php require_once("../verificarLogin.php"); ?>

<?php require_once("header.php"); ?>

<div class="container">
  <div class="row">
    <div class="col">
      &nbsp;
    </div>
  </div>
  <div class="row">
    <div class="col">
      <h1>Relatório de Produtos</h1>
      <br>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="table-responsive">
        <table class="table">
          <th>ID</th>
          <th>NOME</th>
          <th>QUANTIDADE</th>
          <th>PRECO COMPRA</th>
          <th>PRECO VENDA</th>
          <th>Data Cadastro</th>
          <th>Data Alteração</th>
          <th colspan="2">AÇÃO</th>

          <?php
          $tipo = "produto";
          include("../controller/relatorioProduto.php");

          foreach ($retorno as $value) {
            $id = $value["id"];
          ?>
            <tr>
              <td><?= $value["id"]; ?></td>
              <td><?= $value["nomeProduto"]; ?></td>
              <td><?= $value["qtd"]; ?></td>
              <td><?= $value["precoCompra"]; ?></td>
              <td><?= $value["precoVenda"]; ?></td>
              <td>
                <?php
                $dataCadastro = new DateTime($value["dataCadastro"]);
                echo $dataCadastro->format("d/m/Y H:i:s") . ' ';
                ?>
              </td>
              <td>
                <?php
                $dataAlteracao = new DateTime($value["dataAlteracao"]);
                echo $dataAlteracao->format("d/m/Y H:i:s") . ' ';
                ?>
              </td>
              <td><?php echo "<a href=alterarProduto.php?id=$id>
                    [ALTERAR]
                  </a>"; ?>
              </td>
              <td><?php echo "<a href=../controller/excluirProduto.php?id=$id>
                    [EXCLUIR]
                  </a>"; ?>
              </td>
            </tr>
          <?php
          }
          ?>
        </table>
        <?php
        echo "Foram encontrados " . count($retorno) . " registros";
        ?>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
      &nbsp;
    </div>
  </div>
  <footer class="bd-footer text-muted">
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