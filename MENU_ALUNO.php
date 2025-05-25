<?php
include 'conexao.php';
$id_aluno = $_GET['id_aluno'];

$sql = "SELECT 
    aluno.id_aluno,
    aluno.nome
FROM aluno WHERE aluno.id_aluno = $id_aluno";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Aluno</title>
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
            padding: 20px;
        }

        .background-wrapper {
            position: relative;
            width: 100%;
            max-width: 800px;
            padding: 20px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            //background-image: url('imagens/painel_aluno.png');/* URL da imagem de fundo */
            background-image: url('imagens/painel_aluno.jpg'); /* URL da imagem de fundo */
            background-size: cover;
            background-position: center;
            opacity: 0.5;
            z-index: -1;
        }

        h1 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
            color: black;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        table {
            border-collapse: collapse;
            width: 90%;
            max-width: 600px;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.6);
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 15px;
            text-align: center;
            border: 2px solid black;
        }

        .table-link {
            display: inline-block;
            margin: 5px 0;
            color: black;
            text-decoration: none;
            padding: 10px;
            border-radius: 10px;
            transition: background-color 0.3s;
        }

        .table-link:hover {
            background-color: orangered;
            color: white;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .exit-button {
            background-color: white;
            color: black;
            border: 2px solid orangered;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .exit-button:hover {
            background-color: black;
            color: white;
            border-color: brown;
        }

        @media (max-width: 600px) {
            .exit-button {
                font-size: 14px;
                padding: 8px 16px;
            }
            table {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="background-wrapper">
    <div class="background-image"></div>

    <h1>PAINEL ALUNO</h1>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Nome</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["nome"]."</td>
                  </tr>";
            
            echo "<tr>
                    <td colspan='2'>
                        <a href='medidas.php?id_aluno=".$row["id_aluno"]."' class='table-link'>MEDIDAS</a><br>
                        <a href='VIEW_ALU_GRUPO.php?id_aluno=".$row["id_aluno"]."' class='table-link'>AULAS EM GRUPO</a><br>
                        <a href='MAPA_PITTY.php?id_aluno=".$row["id_aluno"]."' class='table-link'>MAPA</a><br>
                        <a href='MENU_TREINO_ALUN.php?id_aluno=".$row["id_aluno"]."' class='table-link'>TREINOS</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
        echo "<div class='button-container'><a href='LOGIN_ALU_INDEX.html'><button class='exit-button' type='button'>SAIR</button></a></div>";
    } else {
        echo "<p>Nenhum resultado encontrado.</p>";
        echo "<div class='button-container'><a href='LOGIN_ALU_INDEX.html'><button class='exit-button' type='button'>SAIR</button></a></div>";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
