<?php
class Compra
{
  private  $id, $idUsuario, $formaPagamento, $totalCompra;
  private $conexao;

  function __construct()
  {
    include ("Conexao.php");
    $conectar = new Conectar();
    $this->conexao=$conectar->conectar();
  }

  public function getConexao() {
    return $this->conexao;
  }

  public function addCompra($idUsuario, $formaPagamento) {
    $this->idUsuario = $idUsuario;
    $this->formaPagamento = $formaPagamento;
    $dataHoraCompra = date("Y-m-d H:i:s");

    if($this->getConexao()){
      echo $query = "INSERT INTO compra (idUsuario, formaPagamento, dataHoraCompra, valorTotal)
      VALUE ('{$this->getIdUsuario()}', '{$this->getFormaPagamento()}', '{$dataHoraCompra}', 0.00
          )";
      $insert = $this->conexao->query($query);
      //verificar se a tabela foi afetada
      $ultimo_id =  $this->conexao->insert_id;
      //exit;
      if ($this->conexao->affected_rows){
        return $ultimo_id;
      }else{
        return 0;
      }
    }else{
      echo "Não conectado ao BD";
    }

  }
  
  public function fecharCompraCliente($idCompra, $totalCompra){
    $this->id = $idCompra;
    $this->totalCompra = $totalCompra;
    if($this->getConexao()){
          $query = "update compra set
                    valorTotal = '{$this->getTotalCompra()}'
                    where id = '{$this->getId()}'
                    ";
          $alterar = $this->conexao->query($query);
          if ($this->conexao->affected_rows){
            return 1;
          }else{
            return 0;
          }
    }else{
          echo "Não conectado ao BD";
    }
}
public function relatorioGeral($dataInicio, $dataTermino){
  if($this->getConexao()){
    //2020-05-23 00:44:16
    $dataInicio = $dataInicio . " 00:00:00";
    $dataTermino = $dataTermino . " 23:59:59";

    $query = "select u.id, u.nome, c.idUsuario, c.dataHoraCompra, c.formaPagamento, c.valorTotal
    FROM compra as c, usuario as u
    where c.idUsuario = u.id and c.dataHoraCompra
    BETWEEN '{$dataInicio}' and '{$dataTermino}' ORDER BY u.id ASC;";

    $busca = $this->conexao->query($query);

    $retornoBanco = array();
    while ($linha = $busca->fetch_assoc()) {
      $obj = (object) $linha;
      if(!empty($obj)) {
        array_push($retornoBanco, $obj);
      }
    }
    return $retornoBanco;
  }else{
    echo "Erro";
  }
}

//método assessores ou modificadores
public function getIdUsuario(){ return $this->idUsuario;}
public function getFormaPagamento(){ return $this->formaPagamento;}
public function getId(){ return $this->id;}
public function getTotalCompra(){ return $this->totalCompra;}
}
