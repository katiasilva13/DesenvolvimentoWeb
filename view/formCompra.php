<?php require_once("../verificarLogin.php"); ?>

<?php require_once("header.php"); ?>

<div class="container">
  <!-- Conteúdo aqui -->
  <h1>Formulário de Compra</h1>
  <div class="row">
    <div class="col">
      <?php
      if (!isset($_GET) || empty($_GET)) {
        //$erro = 'Nada foi postado.';
      } else {
        if ($_GET["mensagem"] != "erro") {
      ?>
          <div class="alert alert-success" role="alert">
            Compra realizada com sucesso!!!
          </div>
        <?php
        } else if ($_GET["mensagem"] == "erroFinalizar") {
        ?>
          <div class="alert alert-success" role="alert">
            Ocorreu um erro ao finalizar a compra!!!
          </div>
        <?php
        } else {
        ?>
          <div class="alert alert-danger" role="alert">
            Ocorreu um erro ao gravar a compra!!!
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
  <form action="../controller/cadCompra.php" method="post">

    <div class="row">
      <div class="col-4">
        <label for="nomeProduto">Nome:</label>

        <?php
        include("../model/Usuario.php");
        $objetoRetorno = new Usuario();
        $retorno = $objetoRetorno->relatorioSimples();
        ?>
        <select class="form-control" name="idUsuario">

          <?php
          foreach ($retorno as $key => $value) {
          ?>
            <option value=<?= $value["id"] ?>><?= $value["nome"]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="col-4">
        <label for="formaPagamento">Forma de Pagamento:</label>
        <select class="form-control" name="formaPagamento">
          <option value="1">A vista</option>
          <option value="1">1 Parcela</option>
          <option value="2">2 Parcela</option>
          <option value="3">3 Parcela</option>
          <option value="4">4 Parcela</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col">
        &nbsp;
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Abrir Venda nova</button>
        <button type="reset" class="btn btn-primary">Limpar</button>
      </div>
    </div>

  </form>
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