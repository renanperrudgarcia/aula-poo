<?php 
error_reporting(E_ALL);
ini_set('display_error', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de gestão acadêmica</title>
</head>
<body>
  <?php
    require './Pessoa.php';
    require './Estudante.php';
    require './Professor.php';

    $estudante = new Estudante(1);
    echo $estudante->disciplinasMatriculadas();
  ?>

  

<br><hr>
<h2>Professor</h2>
<?php
  $conexao  = new Conn();
  $professores = $conexao->listarProfessores();
  foreach ($professores as $key => $value){
   echo $value['nome']."<a href='editarEstudante.php?email={$value['email']}'>Editar</a><br>";
  }
 
  

?>

<br><hr>
<h2>Estudante</h2>
<?php
  $estudante = new Estudante('re@gmail.com');
  $estudanteDados = $estudante->verEstudante();
  echo "Nome: {$estudanteDados->nome} <br> ";
  echo "Telefone: {$estudanteDados->telefone} <br> ";
  echo "Email: {$estudanteDados->email} <br> ";
  echo "Matricula: {$estudanteDados->matricula} <br> ";
  echo "Ira: {$estudanteDados->ira} <br> ";
  echo "Idade: {$estudante->calculaIdade($estudanteDados->data_nascimento)} <br> ";
  echo "Avaliação: {$estudante->calculaAvaliacao()}";
  
?>

</body>
</html>