<?php 

class Estudante extends Pessoa
{
  public $matricula;
  public $ira;

  public function disciplinasMatriculadas()
  {
    return "PHP Orientado a objetos";    
  }

  public function atualizaIRA($nota)
  {
    return $this->ira += $nota;   
  }

  public function verEstudante():array
  {
    $dados['Nome'] = $this->nome;
    $dados['Matricula'] = $this->matricula;
    $dados['IRA'] = $this->ira;

    return $dados;   
  }
}