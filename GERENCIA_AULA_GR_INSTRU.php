<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Gerenciamento de Aulas</title>

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

        h1 {
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
            margin: 5px;
        }

        button:hover {
            background-color: gray;
        }

        a {
            text-decoration: none;
        }

        .action-buttons a {
            margin: 5px;
        }

        @media (max-width: 768px) {
            td, th {
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
        <h1>Aulas em Grupo</h1>

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

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_aula']}</td>
                        <td>{$row['AULA']}</td>
                        <td class='action-buttons'>
                            <a href='DELETE_AULA_GRUPO_INSTRU.php?id_aluno={$row['id_aula']}' onclick='return confirmDelete();'>
                                <button>EXCLUIR</button>
                            </a>
                            <a href='CADASTRO_HORARIOS_INSTRU.php?id_aula={$row['id_aula']}'>
                                <button>ADD HORÁRIO</button>
                            </a>
                        </td>
                      </tr>";
            }

            echo "</table>";
            echo "<a href='CADASTRO_AULAS_INSTRU.html?id_aluno={$id_aluno}'><button>ADD AULA</button></a>";
            echo "<a href='MENU_INSTRUTOR.php?id_aluno={$id_aluno}'><button>VOLTAR</button></a>";
        } else {
            echo "<p>Nenhuma aula encontrada.</p>";
        }

        $conn->close();
        ?>

        <script>
            // Função para exibir um diálogo de confirmação antes de excluir
            function confirmDelete() {
                return confirm("Tem certeza que deseja excluir esta aula?");
            }
        </script>
    </div>

</body>

</html>
