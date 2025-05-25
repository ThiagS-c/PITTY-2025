<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty</title>

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
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 2px solid black;
            text-align: center;
            padding: 10px;
        }

        th {
            background-color: #333;
            color: white;
        }

        td button {
            background-color: black;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        td button:hover {
            background-color: gray;
        }

        .back-button {
            text-align: center;
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

        /* Responsividade */
        @media (max-width: 480px) {
            th, td {
                font-size: 14px;
                padding: 8px;
            }

            td button,
            .back-button button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <?php
        include 'conexao.php';
        $id_aluno = $_GET['id_aluno'];

        $sql = "SELECT 
                    aulas_grupo.id_aula_grup AS id_aula,
                    aulas_grupo.nome_aula AS AULA
                FROM aulas_grupo";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>
                    <th>ID</th>
                    <th>AULA</th>
                    <th>AÇÃO</th>
                  </tr>";
            
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id_aula"]."</td>
                        <td>".$row["AULA"]."</td>
                        <td>
                            <a href='CADASTRO_HORARIOS_INSTRU.php?id_aula=".$row["id_aula"]."'>
                                <button type='button'>ADD HORARIO</button>
                            </a>
                        </td>
                      </tr>";
            }
            echo "</table>";
            
            echo "<div class='back-button'>
                    <a href='GERENCIA_HORAR_INSTRU.php?id_aluno=".$id_aluno."'>
                        <button type='button'>VOLTAR</button>
                    </a>
                  </div>";
        } else {
            echo "<p>0 resultados</p>";
        }

        $conn->close();
        ?>
    </div>

</body>

</html>
