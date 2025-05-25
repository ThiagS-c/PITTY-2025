<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Categorias de Exercícios</title>
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
            width: 95%;
            max-width: 800px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid black;
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

        .action-buttons a {
            margin: 5px;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            th, td {
                font-size: 14px;
                padding: 8px;
            }

            .action-buttons {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
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
        <h1>Categorias</h1>

        <?php
        include 'conexao.php';
        $id_aluno = $_GET['id_aluno'];

        $sql = "SELECT 
                    id_categoria AS ID,
                    categoria.categoria AS CATEGORIA
                FROM categoria
                ORDER BY id_categoria ASC";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>
                    <th>ID</th>
                    <th>CATEGORIA</th>
                    <th>AÇÃO</th>
                  </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['ID']}</td>
                        <td>{$row['CATEGORIA']}</td>
                        <td class='action-buttons'>
                            <a href='VIEW_INDIV_EXERCI_INSTRU.php?id_exerc={$row['ID']}'>
                                <button>EXERCÍCIOS</button>
                            </a>
                            <a href='CADASTRO_EXERCI_INSTRU.php?id_aula={$row['ID']}'>
                                <button>ADD EXERCÍCIO</button>
                            </a>
                        </td>
                      </tr>";
            }

            echo "</table>";
            echo "<a href='VIEW_ALL_EXERCI_INSTRU.php?id_aluno={$id_aluno}'><button>EXIBIR EXERCÍCIOS</button></a>";
            echo "<br><br><a href='MENU_INSTRUTOR.php?id_aluno={$id_aluno}'><button>VOLTAR</button></a>";
        } else {
            echo "<p>Nenhuma categoria encontrada.</p>";
        }

        $conn->close();
        ?>
    </div>

</body>

</html>
