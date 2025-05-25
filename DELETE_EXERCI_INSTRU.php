<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Exclusão de Exercício</title>

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
            max-width: 400px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        .message {
            margin: 15px 0;
            font-size: 18px;
            color: #333;
        }

        a {
            text-decoration: none;
        }

        button {
            background-color: black;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: gray;
        }

        @media (max-width: 480px) {
            button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <?php
        include 'conexao.php';

        $id_exercicio = $_GET['id_exercicio'];

        $sql = "DELETE FROM exercicios WHERE id_exercicio = $id_exercicio";

        if ($conn->query($sql) === TRUE) {
            echo "<h2>Sucesso!</h2>";
            echo "<p class='message'>Exercício excluído com sucesso!</p>";
        } else {
            echo "<h2>Erro!</h2>";
            echo "<p class='message'>Erro ao excluir exercício: " . $conn->error . "</p>";
        }

        $conn->close();
        ?>

        <a href="VIEW_ALL_EXERCI_INSTRU.php?id_aluno=999">
            <button type="button">VOLTAR</button>
        </a>
    </div>

</body>

</html>
