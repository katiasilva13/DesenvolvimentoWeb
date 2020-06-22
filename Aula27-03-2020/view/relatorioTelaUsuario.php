<?php
  require_once("../verificarLogin.php");
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
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
  <div class="row">
    <div class="col">
      &nbsp;
    </div>
  </div>
  <div class="row">
    <div class="col">
      <h1>Relatório de Usuários</h1>
      <br>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="table-responsive">
         <table class="table">
           <th>ID</th>
           <th>NOME</th>
           <th>LOGIN</th>
           <th>E-MAIL</th>
           <th>Data Cadastro</th>
           <th>Data Alteração</th>
           <th colspan="2">AÇÃO</th>

           <?php
            $tipo = "usuario";
            include("../controller/relatorioUsuario.php");
            //print_r($retorno);

            $i = 1;
            foreach ($retorno as $value) {
              $id = $value["id"];
              ?>
              <tr>
                <td><?=$i++?></td>
                <td><?=$value["nome"];?></td>
                <td><?=$value["login"];?></td>
                <td><?=$value["email"];?></td>
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
                <td><?php echo "<a href=alterarUsuario.php?id=$id>
                    [ALTERAR]
                  </a>";?>
                </td>
                <td><?php echo "<a href=../controller/excluirUsuario.php?id=$id>
                    [EXCLUIR]
                  </a>";?>
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

  <div class="row">
    <div class="col">
      &nbsp;
    </div>
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
