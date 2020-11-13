<?php // require_once("../verificarLogin.php"); ?>

<?php require_once("header.php"); ?>

<?php
include('../model/itensCompra.php');

$itemCompra = new itensCompra();

$itemCompra_pego = $itemCompra->relatorio($_POST['id_item']);
$query = "select p.* from produto p where id = $itemCompra_pego->idProduto";
$conexao = $itemCompra->getConexao();
$prod = $conexao->query($query)->fetch_assoc();
// echo "<pre>"; print_r($prod); die();
?>

<div class="container pt-5">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="h3">Nome: <?php echo $prod['nomeProduto'] ?></h1>
            <h1 class="h3">Qtd em Estoque:<?php echo $prod['qtd'] ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="../controller/alterarCarrinho.php" method="post" class="form">
                <input type="hidden" name="id_item" value="<?php echo $_POST['id_item']; ?>">
                <input type="hidden" name="id_compra" value="<?php echo $_POST['id_compra']; ?>">
                <div class="form-row">
                    <div class="form-group">
                        <label for="qtd">Quantidade:</label>
                        <input type="number" name="qtd" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>