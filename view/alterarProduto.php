<?php // require_once("../verificarLogin.php"); ?>

<?php require_once("header.php"); ?>

<div class="container">
  <!-- Conteúdo aqui -->
  <h1>Formulário de Alteração</h1>
  <div class="row">
    <div class="col">
      <?php
      if (!isset($_GET) || empty($_GET)) {
        //$erro = 'Nada foi postado.';
      } else {
        if (empty($_GET["id"])) {
          if ($_GET["mensagem"]) {
            $mensagem = $_GET["mensagem"];
            if ($mensagem == "sucesso") {
      ?>
              <div class="alert alert-success" role="alert">
                Produto Alterado com sucesso!!!
              </div>
            <?php
            } elseif ($mensagem == "erro") {
            ?>
              <div class="alert alert-danger" role="alert">
                Ocorreu um erro ao alterar o Produto!!!
              </div>
            <?php
            }
          }
        } elseif (!empty($_GET["id"])) {
          $id = $_GET["id"];
          $tipo = "unico";
          include("../controller/relatorioProduto.php");
          
          foreach ($retorno as $value) {
            ?>
            <form action="../controller/alterarProdutos.php" method="post">

              <div class="row">
                <div class="col-4">
                  <label for="nomeProduto">Nome:</label>
                  <input type="text" id="nomeProduto" name="nomeProduto" value='<?= $value["nomeProduto"]; ?>' class="form-control" placeholder="Nome do produto">
                </div>

                <div class="col-4">
                  <label for="qtd">Quantidade:</label>
                  <input type="number" id="qtd" name="qtd" value=<?= $value["qtd"]; ?> class="form-control" placeholder="Quantidade">
                </div>
              </div>

              <div class="row">
                <div class="col">
                  &nbsp;
                </div>
              </div>

              <div class="row">
                <div class="col-3">
                  <label for="precoCompra">Preço de compra (ex: 21.00):</label>
                  <input type="floatval" id="precoCompra" name="precoCompra" value=<?= $value["precoCompra"]; ?> class="form-control" placeholder="Preço de compra">
                </div>

                <div class="col-3">
                  <label for="precoVenda">Preço de venda (ex: 10.99):</label>
                  <input type="floatval" id="precoVenda" name="precoVenda" value=<?= $value["precoVenda"]; ?> class="form-control" placeholder="Preço de venda">
                </div>

              </div>

              <div class="row">
                <div class="col">
                  &nbsp;
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <input type="hidden" name="id" value=<?= $value["id"]; ?>>
                  <button type="submit" class="btn btn-primary">Alterar</button>
                  <button type="reset" class="btn btn-primary">Limpar</button>
                </div>
              </div>

            </form>
      <?php
          }
        }
      }

      ?> </div>
  </div>
  <div class="row">
    <div class="col">
      &nbsp;
    </div>
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