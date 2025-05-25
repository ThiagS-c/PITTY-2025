<?php
include 'conexao.php';
$id_aluno = $_GET['id_aluno'];

$sql = "SELECT 
    aulas_grupo.nome_aula AS `AULA`,
    horarios.`hr_seg` AS `SEGUNDA`,
    horarios.hr_terca AS `TERÇA`,
    horarios.hr_quarta AS `QUARTA`,
    horarios.hr_quinta AS `QUINTA`,
    horarios.hr_sexta AS `SEXTA`, 
    horarios.hr_sabado AS `SÁBADO`,
    horarios.hr_domingo AS `DOMINGO`
FROM horarios
JOIN aulas_grupo ON (horarios.id_aula_grup = aulas_grupo.id_aula_grup) 
ORDER BY aulas_grupo.id_aula_grup;";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Cronograma de Aulas</title>
    <style>
        body {
            background-color: orangered;
            color: black;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .container {
            width: 100%;
            max-width: 800px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 3px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: black;
            color: white;
        }

        button {
            background-color: black;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: gray;
        }

        /* Estilo para cartões em telas pequenas */
        .card {
            display: none;
            background-color: white;
            border: 2px solid black;
            border-radius: 10px;
            padding: 15px;
            margin: 10px 0;
            text-align: left;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            table {
                display: none;
            }

            .card {
                display: block;
            }
        }

        @media (max-width: 480px) {
            button {
                width: 100%;
                margin-top: 5px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Cronograma de Aulas</h1>

    <?php
    if ($result && $result->num_rows > 0) {
        // Display for large screens (Table)
        echo "<table id='horariosTable'>";
        echo "<tr>
                <th>AULA</th>
                <th>SEGUNDA</th>
                <th>TERÇA</th>
                <th>QUARTA</th>
                <th>QUINTA</th>
                <th>SEXTA</th>
                <th>SÁBADO</th>
                <th>DOMINGO</th>
              </tr>";
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['AULA']}</td>";
            echo "<td>{$row['SEGUNDA']}</td>";
            echo "<td>{$row['TERÇA']}</td>";
            echo "<td>{$row['QUARTA']}</td>";
            echo "<td>{$row['QUINTA']}</td>";
            echo "<td>{$row['SEXTA']}</td>";
            echo "<td>{$row['SÁBADO']}</td>";
            echo "<td>{$row['DOMINGO']}</td>";
            echo "</tr>";

            // Display for small screens (Cards)
            echo "<div class='card'>
                    <h3>{$row['AULA']}</h3>
                    <p><strong>Segunda:</strong> {$row['SEGUNDA']}</p>
                    <p><strong>Terça:</strong> {$row['TERÇA']}</p>
                    <p><strong>Quarta:</strong> {$row['QUARTA']}</p>
                    <p><strong>Quinta:</strong> {$row['QUINTA']}</p>
                    <p><strong>Sexta:</strong> {$row['SEXTA']}</p>
                    <p><strong>Sábado:</strong> {$row['SÁBADO']}</p>
                    <p><strong>Domingo:</strong> {$row['DOMINGO']}</p>
                  </div>";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhum horário encontrado.</p>";
    }

    echo "<br><a href='MENU_ALUNO.php?id_aluno={$id_aluno}'><button>VOLTAR</button></a>";
    $conn->close();
    ?>
</div>

</body>
</html>
