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
    $ativo = 1;

    if ($this->getConexao()) {
      echo $query = "INSERT INTO produto (nomeProduto, qtd, precoCompra, precoVenda, dataCadastro, ativo)
         VALUE ('{$this->getNomeProduto()}', '{$this->getQtd()}', '{$this->getPrecoCompra()}',
         '{$this->getPrecoVenda()}', '{$dataCadastro}', '{$ativo}'
         )";
       // exit;
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

  public function relatorioSimples() {
    if ($this->getConexao()) {
      $query = "SELECT * FROM produto order by nomeProduto asc";
      $busca = $this->conexao->query($query);

      $retornoBanco = array(); //array dinamico
      while ($linha = $busca->fetch_array()) {
        $retornoBanco[] = $linha;
      }
      return $retornoBanco;
    } else {
      echo "Erro";
    }
  }

  public function relatorioUnico($id) {
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

  public function alterProduto($nomeProduto, $qtd, $precoCompra, $precoVenda, $id) {
    $this->nomeProduto = $nomeProduto;
    $this->qtd = $qtd;
    $this->precoCompra = $precoCompra;
    $this->precoVenda = $precoVenda;
    $this->id = $id;

    if ($this->getConexao()) {
      $query = "UPDATE produto SET
          nomeProduto = '{$this->getNomeProduto()}',
          qtd = '{$this->getQtd()}',
          precoCompra = '{$this->getPrecoCompra()}',
          precoVenda = '{$this->getPrecoVenda()}'

          WHERE id = '{$this->getId()}'"; //2

      //executa o método query para realizar uma consulta (insert, select, alter, drop) ao banco
      $alter = $this->conexao->query($query);
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

  public function deleteProduto($id) {
    $this->id = $id;

    if ($this->getConexao()) {
      $query = "DELETE FROM produto
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

  public function devolveCompra($idCompra){
    if($this->getConexao()){
      $query = "SELECT c.id, c.idUsuario, c.formaPagamento, u.id, u.nome FROM compra as c, usuario as u
                where c.idUsuario = u.id  and c.id = ". $idCompra;
  
      $busca = $this->conexao->query($query);
  
      $retornoBanco = array();
      while ($linha = $busca->fetch_assoc()) {
        $retornoBanco[] = $linha;
      }
      return $retornoBanco;
    }else{
      echo "Erro";
    }
  }

  public function produtosCompra($idCompra){

    if($this->getConexao()){
  $query = "SELECT p.nomeproduto, i.quantidade, i.precoOriginalProduto, i.desconto, i.precoProduto, i.idProduto, i.id 
              FROM itensCompra as i, produto as p where i.idProduto = p.id and i.idCompra = ". $idCompra;//
  
      $busca = $this->conexao->query($query);
  
      $retornoBanco = array();
      while ($linha = $busca->fetch_assoc()) {
        $retornoBanco[] = $linha;
      }
      return $retornoBanco;
    }else{
      echo "Erro";
    }
  }


  //método assessores ou modificadores  
  public function getNomeProduto(){ return $this->nomeProduto;}
  public function getQtd(){ return $this->qtd;}
  public function getPrecoCompra(){ return $this->precoCompra;}
  public function getPrecoVenda(){ return $this->precoVenda;}
  public function getId(){ return $this->id;}
  public function getAtivo(){ return $this->ativo;}
}
