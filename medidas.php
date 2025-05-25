<?php
include 'conexao.php';
$id_aluno = $_GET['id_aluno'];

$sql = "SELECT 
            aluno.nome,
            medidas.m_peso AS 'PESO(Kg)',
            medidas.m_altura AS 'ALTURA(Mt)',
            medidas.m_torax AS 'TORAX(Cm)',
            medidas.m_cintura AS 'CINTURA(Cm)',
            medidas.m_braco AS 'BRACO(Cm)',
            medidas.m_coxa AS 'COXAS(Cm)',
            medidas.m_panturrilha AS 'PANTURRILHAS(Cm)',
            medidas.m_quadril AS 'QUADRIL(Cm)'
        FROM medidas
        JOIN aluno ON medidas.id_aluno = aluno.id_aluno AND medidas.id_aluno = $id_aluno
        ORDER BY aluno.id_aluno ASC";

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
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin: 20px 0;
        }

        .grid div {
            background-color: #fff;
            border: 2px solid black;
            padding: 10px;
            text-align: center;
            font-weight: bold;
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
        echo "<div class='title-container'><div class='title'>Minhas Medidas</div></div>";
        echo "<div class='grid'>";
        echo "<div>PESO (Kg): {$row['PESO(Kg)']}</div>";
        echo "<div>ALTURA (Mt): {$row['ALTURA(Mt)']}</div>";
        echo "<div>TORAX (Cm): {$row['TORAX(Cm)']}</div>";
        echo "<div>CINTURA (Cm): {$row['CINTURA(Cm)']}</div>";
        echo "<div>BRAÇO (Cm): {$row['BRACO(Cm)']}</div>";
        echo "<div>COXA (Cm): {$row['COXAS(Cm)']}</div>";
        echo "<div>PANTURRILHA (Cm): {$row['PANTURRILHAS(Cm)']}</div>";
        echo "<div>QUADRIL (Cm): {$row['QUADRIL(Cm)']}</div>";
        echo "</div>";
    } else {
        echo "<p>Nenhum resultado encontrado.</p>";
    }
    $conn->close();
    ?>

    <div class="button-container">
        <a href='MENU_ALUNO.php?id_aluno=<?php echo $id_aluno; ?>'>
            <button class="button">VOLTAR</button>
        </a>
    </div>
</div>

</body>
</html>
