<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home <span class="sr-only">(Página atual)</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="formularioUsuario.php">Cadastro Usuário</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="formularioProduto.php">Cadastro Produto</a>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="relatorioTelaUsuario.php">Relatorio Geral Usuário</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="relatorioTelaProduto.php">Relatorio Geral Produto</a>
      </li>
    </ul>
  </div>
</nav>
<!-- <div class="container-fluid"> utilizado para largura total-->
    <div class="container">
      <!-- Conteúdo aqui -->
      <h1>Formulário de Cadastro Produto</h1>
      <div class="row">
        <div class="col">
          <?php
          if ( !isset( $_GET ) || empty( $_GET ) ) {
        	   //$erro = 'Nada foi postado.';
          }else{
            if($_GET["mensagem"]=="sucesso"){
              ?>
              <div class="alert alert-success" role="alert">
                Produto Cadastrado com sucesso!!!
              </div>
              <?php
            }else {
              ?>
              <div class="alert alert-danger" role="alert">
                Ocorreu um erro ao gravar o Produto!!!
              </div>
              <?php
            }
          }
          ?>
        </div>
      </div>
      <form action="../controller/cadastroProduto.php" method="post">
        
      <div class="row">
          <div class="col-4">
            <label for="nomeProduto">Nome do produto:</label>
            <input type="text" id="nomeProduto" name="nomeProduto" class="form-control" placeholder="Nome do produto">
          </div>
          <div class="col-4">
            <label for="qtd">Quantidade:</label>
            <input type="number" id="qtd" name="qtd" class="form-control" placeholder="Quantidade">
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
            <input type="floatval" id="precoCompra" name="precoCompra" class="form-control" placeholder="Preço de compra">
          </div>
          <div class="col-3">
            <label for="precoVenda">Preço de venda (ex: 10.50):</label>
            <input type="floatval" id="precoVenda" name="precoVenda" class="form-control" placeholder="Preço de venda">
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
    <script src="../bootstrap-4.1.3-dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
