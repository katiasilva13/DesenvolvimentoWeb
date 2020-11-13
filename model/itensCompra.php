<?php
class itensCompra
{
  private  $id, $idProduto, $idCompra, $quantidade, $desconto, $precoProduto, $precoOriginalProduto;
  private $conexao;

  function __construct()
  {
    include("Conexao.php");
    $conectar = new Conectar();
    $this->conexao = $conectar->conectar();
  }

  public function getConexao()
  {
    return $this->conexao;
  }

  public function additensCompra($idProduto, $idCompra, $quantidade, $desconto)
  {
    $estoque = $this->relatorioUnico($idProduto);

    if ($estoque[0]["qtd"] >= $quantidade) {
      $this->idProduto = $idProduto;
      $this->idCompra = $idCompra;
      $this->quantidade = $quantidade;
      $this->desconto = $desconto;

      $baixaEstoque = $estoque[0]["qtd"] - $quantidade;

      if ($this->getConexao()) {
        $buscaPreco = $this->relatorioUnico($this->getIdProduto());

        $this->precoOriginalProduto = $buscaPreco[0]["precoVenda"]; //PONTO DE MELHORIA

        $descontoProduto = ($buscaPreco[0]["precoVenda"] * $this->getDesconto()) / 100;
        $this->precoProduto = $buscaPreco[0]["precoVenda"] - $descontoProduto;

        $query = "INSERT INTO itenscompra (idProduto, idCompra, quantidade, precoOriginalProduto, desconto, precoProduto)
          VALUE ('{$this->getIdProduto()}', '{$this->getIdCompra()}', '{$this->getQuantidade()}',  '{$this->getPrecoOriginalProduto()}','{$this->getDesconto()}', '{$this->getPrecoProduto()}'
              )";

        $insert = $this->conexao->query($query);
        if ($this->conexao->affected_rows) {
          $query1 = "update produto set qtd = $baixaEstoque where id = '{$this->getIdProduto()}'";
          $baixarEstoque = $this->conexao->query($query1);
          $array = array($this->getIdCompra(), 1);
          return $array;
        } else {
          $array = array($this->getIdCompra(), 0);
          return $array;
        }
      } else {
        echo "Não conectado ao BD"; //ok
      }
      //*********
    } else {
      $this->idCompra = $idCompra;
      $array = array($this->getIdCompra(), 0);
      return $array;
    }
  }


  public function relatorioUnico($id)
  {
    if ($this->getConexao()) {
      $query = "SELECT * FROM produto where id = " . $id; //2
      $busca = $this->conexao->query($query);

      $retornoBanco = array();
      while ($linha = $busca->fetch_assoc()) {
        //echo $row["nome"];
        $retornoBanco[] = $linha;
      }
      return $retornoBanco;
    } else {
      echo "Erro";
    }
  }


  public function relatorio($id)
  {
    if ($this->getConexao()) {
      $query = "SELECT * FROM itensCompra where id = " . $id;
      $busca = $this->conexao->query($query);

      $retornoBanco = array();
      while ($linha = $busca->fetch_assoc()) {
        //echo $row["nome"];
        $retornoBanco = (object) $linha;
      }
      return $retornoBanco;
    } else {
      echo "Erro";
    }
  }

  public function removerItem($id)
  {
    $this->id = $id;

    if ($this->getConexao()) {
      $query = "DELETE FROM itensCompra
                WHERE id = '{$this->getId()}'";
      $delete = $this->conexao->query($query);
      //verificar se a tabela foi afetada
      if ($this->conexao->affected_rows) {
        return 1;
      } else {
        return 0;
      }
    } else {
      echo "Não conectado ao BD";
    }
  }

  public function alterarItem()
  {
    $id_item = $_POST["id_item"];
    $qtd = $_POST["qtd"];


    if ($this->getConexao()) {
      $query = "update itensCompra set quantidade = $qtd where id = $id_item";
      $update = $this->conexao->query($query);

      if ($this->conexao->affected_rows) {
        return 1;
      } else {
        return 0;
      }
    }
  }


  //método assessores ou modificadores
  public function getIdProduto()
  {
    return $this->idProduto;
  }
  public function getIdCompra()
  {
    return $this->idCompra;
  }
  public function getId()
  {
    return $this->id;
  }
  public function getQuantidade()
  {
    return $this->quantidade;
  }
  public function getDesconto()
  {
    return $this->desconto;
  }
  public function getPrecoProduto()
  {
    return $this->precoProduto;
  }
  public function getPrecoOriginalProduto()
  {
    return $this->precoOriginalProduto;
  }
}
