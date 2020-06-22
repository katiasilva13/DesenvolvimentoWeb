<?php require_once("../verificarLogin.php"); ?>

<?php require_once("header.php"); ?>
<!-- <div class="container-fluid"> utilizado para largura total-->

<div class="container">
  <!-- Conteúdo aqui -->
  <h1>Formulário de Alteração</h1>
  <div class="row">
    <div class="col">
      <?php
      if (!isset($_GET) || empty($_GET)) {
        //$erro = 'Nada foi postado.';
      } else {
        //  if(!$_GET["id"]){     //fixed undefined index
        if (empty($_GET["id"])) {
          if ($_GET["mensagem"]) {
            $mensagem = $_GET["mensagem"];
            if ($mensagem == "sucesso") {
      ?>
              <div class="alert alert-success" role="alert">
                Usuário Alterado com sucesso!!!
              </div>
            <?php
            } elseif ($mensagem == "erro") {
            ?>
              <div class="alert alert-danger" role="alert">
                Ocorreu um erro ao alterar o Usuário!!!
              </div>
            <?php
            }
          }
          //     }elseif($_GET["id"]){    //fixed undefined index
        } elseif (!empty($_GET["id"])) {
          $id = $_GET["id"]; //2
          $tipo = "unico";
          include("../controller/relatorioUsuario.php");
          //   print_r($retorno);
          foreach ($retorno as $value) {
            ?>
            <form action="../controller/alterarLogin.php" method="post">
              <div class="row">
                <div class="col-4">
                  <label for="nome">Nome:</label>
                  <input type="text" id="nome" name="nome" value='<?= $value["nome"]; ?>' class="form-control" placeholder="Nome">
                </div>
                <div class="col-4">
                  <label for="email">E-mail:</label>
                  <input type="email" id="email" name="email" value=<?= $value["email"]; ?> class="form-control" placeholder="Email">
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
                  <input type="text" id="login" name="login" value=<?= $value["login"]; ?> class="form-control" placeholder="Login">
                </div>

                <div class="col-2">
                  <label for="senhaAtual">Senha Atual:</label>
                  <input type="password" id="senhaAtual" name="senhaAtual" value=<?= $value["senha"]; ?> class="form-control" placeholder="Senha Atual">
                </div>

                <div class="col-2">
                  <label for="novaSenha">Nova senha:</label>
                  <input type="password" id="novaSenha" name="novaSenha" value=<?= $value["senha"]; ?> class="form-control" placeholder="Nova senha">
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

      ?>
    </div>
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