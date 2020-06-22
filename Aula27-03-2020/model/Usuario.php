<?php
class Usuario
{
  private $nome, $email, $login, $senha, $id, $ativo;
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

  public function addUsuario($nome, $email, $login, $senha)
  {

    try {
      $pdo = new PDO('mysql:host=localhost;dbname=unifamma', 'root', '');
      $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, login, senha, dataCadastro) 
    VALUES (:nome, :email, :login, :senha, :dataCadastro) ");
      $senha = md5($senha);
      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':nome', $nome);
      $stmt->bindValue(':login', $login);
      $stmt->bindValue(':senha', $senha);

      $dataCadastro = date("Y-m-d H:i:s");
      $stmt->bindValue(':dataCadastro', $dataCadastro);

      $stmt->execute();
      $inserted = $stmt->rowCount();

      if ($inserted != 0) {
        return 1;
      } else {
        return 0;
      }
    } catch (Exception $e) {
      echo "Não conectado ao BD" . $e->getMessage();
    }
  }

  public function relatorioSimples()
  {

    try {
      $pdo = new PDO('mysql:host=localhost;dbname=unifamma', 'root', '');
      $stmt = $pdo->query("SELECT id, nome, email, login, senha, dataCadastro, dataAlteracao
       FROM usuario u ORDER BY nome ASC");
      $retornoBanco = array();
      while ($row = $stmt->fetch()) {
        $retornoBanco[] = $row;
      }
      return $retornoBanco;
    } catch (Exception $e) {
      echo "Erro ao buscar relatorio" . $e->getMessage();
    }
  }

  public function relatorioUnico($id)
  {
    try {
      $pdo = new PDO('mysql:host=localhost;dbname=unifamma', 'root', '');
      $stmt = $pdo->prepare("SELECT * FROM usuario WHERE id=:id");
      $stmt->execute(['id' => $id]);
      $retornoBanco = array();
      while ($linha = $stmt->fetch()) {
        $retornoBanco[] = $linha;
      }

      return $retornoBanco;
    } catch (Exception $e) {
      echo "Erro ao buscar usuario" . $e->getMessage();
    }
  }

  public function alterUsuario($nome, $email, $login, $id)
  {
    try {
      $pdo = new PDO('mysql:host=localhost;dbname=unifamma', 'root', '');

      $sql = "UPDATE usuario SET nome=?, email=?, login=? WHERE id=?";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$nome, $email, $login, $id]);
      $inserted = $stmt->rowCount();

      if ($inserted != 0) {
        return 1;
      } else {
        return 0;
      }
    } catch (Exception $e) {
      echo "Erro ao alterar usuario" . $e->getMessage();
    }
  }

  public function deleteUsuario($id)
  {
    try {
      $pdo = new PDO('mysql:host=localhost;dbname=unifamma', 'root', '');

      $sql = "DELETE FROM usuario WHERE id =?";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$id]);
      $inserted = $stmt->rowCount();

      if ($inserted != 0) {
        return 1;
      } else {
        return 0;
      }
    } catch (Exception $e) {
      echo "Erro ao alterar usuario" . $e->getMessage();
    }
  }

  public function alterPerfilUsuario($nome, $email, $login, $id, $senhaAtual, $novaSenha)
  {
    try {
      $pdo = new PDO('mysql:host=localhost;dbname=unifamma', 'root', '');

      $retornoBanco = array();
      $retornoBanco[] = $this->relatorioUnico($id);

      if ($retornoBanco[0][0]["senha"] == md5($senhaAtual)) {

        $senha = md5($novaSenha);
        $sql = "UPDATE usuario SET nome=?, email=?, login=?, senha=? WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $email, $login, $senha, $id]);
        $inserted = $stmt->rowCount();


        if ($inserted != 0) {
          return 1;
        } else {
          return 0;
        }
      }
    } catch (Exception $e) {
      echo "Erro ao alterar usuario" . $e->getMessage();
    }

  }


  //método assessores ou modificadores
  public function getNome()
  {
    return $this->nome;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function getLogin()
  {
    return $this->login;
  }
  public function getSenha()
  {
    return $this->senha;
  }
  public function getId()
  {
    return $this->id;
  }
  public function getAtivo()
  {
    return $this->ativo;
  }
}
