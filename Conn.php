<?php 
  class Conn
  {
    public $username = 'root';
    public $password = '';
    public $dsn = "mysql:dbname=php_oo;host=localhost";
    public $port = 3306;
    public $connect = null;

    public function connect()
    {
      try {
        $this->connect = new PDO($this->dsn, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        return $this->connect;
      } catch (\Throwable $th) {
        throw $th;
      }      
    }

    public function listarProfessores():array
    {
      $sql = "SELECT nome,telefone,email,especialidade,salario,data_nascimento
             FROM professor p
             LEFT JOIN pessoa pe ON pe.id = p.pessoa_id ";
      $conectar = $this->connect();
      $result = $conectar->prepare($sql);
      $result->execute();
      return $result->fetchAll();       
    }
  }