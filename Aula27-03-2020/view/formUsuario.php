<?php require_once("../verificarLogin.php"); ?>

<?php require_once("header.php"); ?>


<!-- <div class="container-fluid"> utilizado para largura total-->
<div class="container">

  <!-- Conteúdo aqui -->
  <div class="row">
    <div class="col">
      &nbsp;
    </div>
  </div>
  <h3>Formulário de Cadastro de Usuários</h3>
  <div class="row">
    <div class="col">
      <?php
      if (!isset($_GET) || empty($_GET)) {
        //$erro = 'Nada foi postado.';
      } else {
        if ($_GET["mensagem"] == "sucesso") {
      ?>
          <div class="alert alert-success" role="alert">
            Usuário Cadastrado com sucesso!!!
          </div>
        <?php
        } else {
        ?>
          <div class="alert alert-danger" role="alert">
            Ocorreu um erro ao gravar o Usuário!!!
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>

  <form action="../controller/cadUsuario.php" method="post">
    <div class="row">
      <div class="col-4">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome">
      </div>
      <div class="col-4">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
      </div>
    </div>
    <div class="row">
      <div class="col">
        &nbsp;
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" class="form-control" placeholder="Login">
      </div>
      <div class="col-3">
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha">
      </div>
    </div>
    <div class="row">
      <div class="col">
        &nbsp;
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <button type="reset" class="btn btn-primary">Limpar</button>
      </div>
    </div>
  </form>

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