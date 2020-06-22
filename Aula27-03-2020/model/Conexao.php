<?php
class Conectar
{
  private $host, $usuario, $senha, $database;
  private $conectar;

  function __construct(){
    $this->host = "localhost";
    $this->usuario = "root";
    $this->port = 3307;
    $this->senha = "";
    $this->database = "unifamma";
  }
  public function conectar(){
    $this->conectar = new Mysqli(
                          $this->host,
                          $this->usuario,
                          $this->senha,
                          $this->database,
                          $this->port
                        );
    return $this->getConectar();
  }
  public function getConectar(){
    return $this->conectar;
  }
}
