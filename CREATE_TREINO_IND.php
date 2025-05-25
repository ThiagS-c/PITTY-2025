<?php
include 'conexao.php';

// Verificação de entrada para evitar SQL Injection
$id_aluno = $conn->real_escape_string($_POST['id_aluno']);
$id_exercicio = $conn->real_escape_string($_POST['id_exercicio']);
$n_series = $conn->real_escape_string($_POST['n_series']);
$n_repeti = $conn->real_escape_string($_POST['n_repeti']);
$o_seque = $conn->real_escape_string($_POST['o_seque']);
$classe = $conn->real_escape_string($_POST['classe']);
//var_dump($_POST);

// validar se o valor é um número inteiro
function isInteger($str) {
    return ctype_digit($str);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Adicionar Medidas</title>
    <style>
        body {
            background-color: orangered;
            color: black;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 600px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin: 20px 0;
        }

        .back-button {
            margin-top: 20px;
        }

        .back-button button {
            background-color: black;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-button button:hover {
            background-color: gray;
        }
    </style>
</head>


<body>

    <div class="container">
    
        <?php
        // Validação dos valores inseridos
        if (!isInteger($id_aluno) || !isInteger($id_exercicio) || !isInteger($n_series) || !isInteger($n_repeti) || !isInteger($o_seque)) {
            
            echo "<h2>ERRO: PREENCHA OS CAMPOS COM NÚMEROS INTEIROS (0-9)</h2>";
            echo "<br><a href='CADASTRO_MEDIDAS_INSTRU.php?id_aluno=".$id_aluno."'><button>Voltar</button></a>";
            exit;
        }

        //TESTAR VALORES CHEGANDO NA VARIAVEL 
      /*  echo "ID Aluno: $id_aluno<br>";
        echo "ID Exercício: $id_exercicio<br>";
        echo "Séries: $n_series<br>";
        echo "Repetições: $n_repeti<br>";
        echo "Ordem: $o_seque<br>";
        echo "Classe: $classe<br>";*/

        $sql = "INSERT INTO treinos (id_aluno, id_exercicio, series, repeticoes, ordem, classe_treino)
                VALUES ('$id_aluno','$id_exercicio','$n_series','$n_repeti','$o_seque','$classe')";

        if ($conn->query($sql) === TRUE) {
            echo "<h2>Treino adicionado com sucesso!</h2>";
            echo "<br><a href='CADASTRO_TREINO_IND.php?id_aluno=".$id_aluno."'><button>Voltar</button></a>";
        } else {
            echo "<h2>Erro ao inserir treino: " . $conn->error . "</h2>";
        }

        $conn->close();
        ?>
    </div>

</body>

</html>
