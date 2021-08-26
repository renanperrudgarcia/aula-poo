<?php

class Professor extends Pessoa
{
    public string $especialidade;
    public float $salario;


public function verProfessor():object
{
    $conn= new Conn();
    $conectar = $conn->connect();
   
    $sql = "SELECT
             p.nome,
             p.telefone,
             p.email,
             po.especialidade,
             po.salario,
             p.data_nascimento
            from professor po
            left join pessoa p on p.id = po.pessoa_id
            WHERE p.email = :email";
            $result= $conectar->prepare($sql);
            $result->execute(array(':email' => $this->email));
    
    return $result->fetchObject();
}

public function calculaAvaliacao()
{
    $qtdDisciplinaMinistradas = 100;
    $qtdAnosInstituicao = 12;
    $resultado = $qtdDisciplinaMinistradas * $qtdAnosInstituicao;
    return $resultado;
}

}


