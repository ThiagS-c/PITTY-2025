<?php
include 'conexao.php';

$id_aluno = $_GET['id_aluno'];

$sql_check = "SELECT id_aluno FROM aluno WHERE id_aluno = '$id_aluno'";
$result_check = $conn->query($sql_check);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Inserir Treino</title>
    <style>
        body {
            background-color: orangered;
            color: black;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            color: black;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin: 15px 0;
        }

        a {
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
        }

        button {
            background-color: orangered;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #cc0000;
        }

        @media (max-width: 600px) {
            button {
                font-size: 14px;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    if ($result_check->num_rows == 0) {
        echo "<h1>Erro</h1>";
        echo "<p>O ID do aluno não existe na tabela de alunos!</p>";
        echo "<a href='GERENCIA_ALUN_INSTRU.php?id_aluno=999'><button type='button'>VOLTAR MENU</button></a>";
    } else {
        $sql = "INSERT INTO treinos (id_aluno, id_exercicio, series, repeticoes, ordem, classe_treino) VALUES
        ('$id_aluno', 180, '4', '12', 1, 'A'),
        ('$id_aluno', 180, '4', '12', 2, 'A'),
        ('$id_aluno', 6, '3', '12', 3, 'A'),
        ('$id_aluno', 181, '4', '12', 4, 'A'),
        ('$id_aluno', 175, '4', '8', 5, 'A'),
        ('$id_aluno', 38, '4', '8', 6, 'A'),
        ('$id_aluno', 182, '4', '8', 7, 'A'),
        ('$id_aluno', 40, '4', '10', 8, 'A'),
        ('$id_aluno', 47, '4', '10/15Min', 0, 'A'),
        ('$id_aluno', 21, '4', '15', 1, 'F'),
        ('$id_aluno', 20, '10', '10', 2, 'F'),
        ('$id_aluno', 183, '4', '12', 3, 'F'),
        ('$id_aluno', 188, '4', '15', 4, 'F'),
        ('$id_aluno', 184, '4', '10', 5, 'F'),
        ('$id_aluno', 29, '4', '8', 6, 'F'),
        ('$id_aluno', 30, '4', '20', 7, 'F'),
        ('$id_aluno', 170, '4', '10', 8, 'F'),
        ('$id_aluno', 189, '4', '15', 9, 'F'),
        ('$id_aluno', 47, '4', '10/15Min', 0, 'F'),
        ('$id_aluno', 72, '4', '12', 1, 'B'),
        ('$id_aluno', 172, '4', '12', 2, 'B'),
        ('$id_aluno', 190, '4', '12', 3, 'B'),
        ('$id_aluno', 191, '4', '12', 4, 'B'),
        ('$id_aluno', 165, '4', '8', 5, 'B'),
        ('$id_aluno', 15, '4', '8', 6, 'B'),
        ('$id_aluno', 192, '4', '8', 7, 'B'),
        ('$id_aluno', 47, '-', '10/15Min', 0, 'B'),
        ('$id_aluno', 78, '-', '-', 1, 'S'),
        ('$id_aluno', 193, '4', '30', 2, 'S'),
        ('$id_aluno', 194, '4', '10', 3, 'S'),
        ('$id_aluno', 64, '4', '1,5Min', 4, 'S'),
        ('$id_aluno', 40, '4', '8', 5, 'S'),
        ('$id_aluno', 41, '4', '20', 6, 'S'),
        ('$id_aluno', 47, '-', '10/15Min', 0, 'S');";

        if ($conn->query($sql) === TRUE) {
            echo "<h1>Sucesso</h1>";
            echo "<p>Treino adicionado com sucesso!</p>";
        } else {
            echo "<h1>Erro</h1>";
            echo "<p>Erro ao adicionar treino: " . $conn->error . "</p>";
        }
        echo "<a href='GERENCIA_ALUN_INSTRU.php?id_aluno=999'><button type='button'>VOLTAR MENU</button></a>";
    }
    $conn->close();
    ?>
</div>

</body>
</html>
