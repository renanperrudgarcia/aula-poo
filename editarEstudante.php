<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudante</title>
</head>
<body>
        <h1>Editar de estudante</h1>

        <?php
            require './Pessoa.php';
            require './Estudante.php';
            $estudante = new Estudante($_GET['email']);
            $estudanteDados = $estudante->verEstudante();
           
            if(isset($_POST['editarEstudante'])){
                $formData= filter_input_array(INPUT_POST, FILTER_DEFAULT);
                $estudante = new Estudante($formData['email']);
               
                $estudanteDados = $estudante->editarEstudante($formData);

                if($estudanteDados) {
                    echo 'Estudante Editado com Sucesso!';
                }else{
                    echo'Poblema ao Editar estudante';
                }

            }else{
                $estudanteDados = $estudante->verEstudante();
            
            
        ?>

        <form name="EdicaoEstudante"  action="" method="POST">
        <input type="hidden" name="id" value="<?=$estudanteDados->id?>">
        <p>
        <label >Nome</label>
        <input type="text" name="nome" required value="<?=$estudanteDados->nome?>">
        </p>

        <p>
        <label >Telefone</label>
        <input type="text" name="telefone" value="<?=$estudanteDados->telefone?>">
        </p>

        <p>
        <label >Email</label>
        <input type="text" name="email" value="<?=$estudanteDados->email?>">
        </p>

        <p>
        <label >Data Nascimento</label>
        <input type="text" name="data_nascimento"value="<?=$estudanteDados->data_nascimento?>">
        </p>

        <p>
        <label >Matricula</label>
        <input type="text" name="matricula"value="<?=$estudanteDados->matricula?>">
        </p>
        <input type="submit" value="Editar" name="editarEstudante">

        </form>

        <?php
        }?>
        <br>
        <a href="index.php">Voltar</a>
</body>
</html>