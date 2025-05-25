<?php
include 'conexao.php';
$id_aluno = $_GET['id_aluno'];

$sql = "SELECT observacoes AS OBS FROM aluno WHERE id_aluno = '$id_aluno'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Medidas</title>
    <style>
body {
            background-color: orangered;
            color: black;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 10px;
        }

        .container {
            width: 100%;
            max-width: 800px;
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }

        .title-container {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }

        .grid {
            display: flex; /* Para centralizar dentro do espaço */
            align-items: center;
            justify-content: center;
            margin: 20px 0;
            padding: 20px; /* Espaçamento extra para tornar a visualização mais equilibrada */
            border: 2px solid black;
            background-color: #f5f5f5;
            border-radius: 8px;
            min-height: 100px;
        }

        .grid div {
            font-size: 16px;
            font-weight: bold;
            white-space: pre-wrap;
            word-wrap: break-word;
            text-align: center;
            width: 100%; /* Ajusta o conteúdo ao espaço da grid */
            color: #333;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .button {
            background-color: white;
            color: orangered;
            border: 2px solid orangered;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }

        .button:hover {
            background-color: #f0f0f0;
            border-color: #ccc;
        }

        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .button {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .grid div {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<div class='title-container'><div class='title'>OBSERVAÇÕES</div></div>";
        echo "<div class='grid'>";
        echo " <div> {$row['OBS']}</div>";
        echo "</div>";
    } else {
        echo "<p>Nenhum resultado encontrado.</p>";
    }
    $conn->close();
    ?>

    <div class="button-container">
        <a href='GERENCIA_ALUN_INSTRU.php?id_aluno=999'>
            <button class="button">VOLTAR</button>
        </a>
    </div>
</div>

</body>
</html>
