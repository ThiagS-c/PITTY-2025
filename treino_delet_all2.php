<?php
include 'conexao.php';

$id_aluno = $_GET['id_aluno'];

$sql_check = "SELECT id_aluno FROM treinos WHERE id_aluno = '$id_aluno'";
$result_check = $conn->query($sql_check);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Excluir Treino</title>
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
            background-color: white; /* Fundo branco para contraste */
            padding: 20px; /* Espaçamento interno */
            border-radius: 10px; /* Cantos arredondados */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Sombra suave */
            width: 100%;
            max-width: 600px; /* Largura máxima */
            text-align: center; /* Centraliza o texto */
        }

        h1 {
            color: orangered; /* Cor do título */
        }

        button {
            background-color: orangered;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px; /* Margem superior */
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #cc0000; /* Cor do botão ao passar o mouse */
        }

        @media (max-width: 600px) {
            button {
                font-size: 14px; /* Tamanho da fonte reduzido em telas menores */
                padding: 8px 16px; /* Redução do espaçamento em telas menores */
            }
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    if ($result_check->num_rows == 0) {
        echo "<h1>Erro</h1>";
        echo "<p>ALUNO NÃO TEM TREINO REGISTRADO!</p>";
        echo "<a href='CADASTRO_TREINO_IND.php?id_aluno=$id_aluno'><button type='button'>VOLTAR</button></a>";
    } else {
        // Exclui os dados na tabela treino
        $sql = "DELETE FROM treinos WHERE id_aluno = '$id_aluno';";

        if ($conn->query($sql) === TRUE) {
            echo "<h1>Sucesso</h1>";
            echo "<p>Treino excluído com sucesso!</p>";
            echo "<a href='CADASTRO_TREINO_IND.php?id_aluno=$id_aluno'><button type='button'>VOLTAR</button></a>";
        } else {
            echo "<h1>Erro</h1>";
            echo "<p>Erro ao excluir treino: " . $conn->error . "</p>";
            echo "<a href='CADASTRO_TREINO_IND.php?id_aluno=$id_aluno'><button type='button'>VOLTAR</button></a>";
        }
    }
    ?>
</div>

</body>
</html>

<?php
$conn->close();
?>
