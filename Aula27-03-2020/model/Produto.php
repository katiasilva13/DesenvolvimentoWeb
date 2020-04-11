<?php
class Produto
{
  private $nomeProduto, $qtd, $precoCompra, $precoVenda, $id, $ativo;
  private $conexao;
  function __construct()
  {
    include("Conexao.php");
    $conectar = new Conectar();
    $this->conexao = $conectar->conectar();
  }

  public function getConexao() {
    return $this->conexao;
  }

  public function addProduto($nomeProduto, $qtd, $precoCompra, $precoVenda)
  {
    $this->nomeProduto = $nomeProduto;
    $this->qtd = $qtd;
    $this->precoCompra = $precoCompra;
    $this->precoVenda = $precoVenda;
    $dataCadastro = date("Y-m-d H:i:s");

    if ($this->getConexao()) {
      $query = "INSERT INTO produto (nomeProduto, qtd, precoCompra, precoVenda)
         VALUE ('{$this->getNomeProduto()}', '{$this->getQtd()}', '{$this->getPrecoCompra()}','{$this->getPrecoVenda()}', '{$dataCadastro}'
         )";
      $insert = $this->conexao->query($query);
      if ($this->conexao->affected_rows) {
        return 1;
      } else {
        return 0;
      }
    } else {
      echo "Não conectado ao BD";
    }
  }
  //método assessores ou modificadores
  public function getAtivo(){ return $this->ativo;}
  public function getNomeProduto(){ return $this->nomeProduto;}
  public function getQtd(){ return $this->qtd;}
  public function getPrecoCompra(){ return $this->precoCompra;}
  public function getPrecoVenda(){ return $this->precoVenda;}
}
