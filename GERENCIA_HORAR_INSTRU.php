<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Horários</title>

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
            cursor: pointer;
        }

        .hidden-row {
            display: none;
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
        <h1>Horários das Aulas</h1>

        <?php
        include 'conexao.php';
        $id_aluno = $_GET['id_aluno'];

        $sql = "SELECT 
                    horarios.id_horarios AS ID,
                    aulas_grupo.nome_aula AS AULA,
                    horarios.hr_seg AS SEGUNDA,
                    horarios.hr_terca AS TERCA,
                    horarios.hr_quarta AS QUARTA,
                    horarios.hr_quinta AS QUINTA,
                    horarios.hr_sexta AS SEXTA,
                    horarios.hr_sabado AS SABADO,
                    horarios.hr_domingo AS DOMINGO
                FROM horarios
                JOIN aulas_grupo 
                ON horarios.id_aula_grup = aulas_grupo.id_aula_grup
                ORDER BY aulas_grupo.id_aula_grup ASC";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibição para telas grandes (Tabela)
            echo "<table id='horariosTable'>";
            echo "<tr>
                    <th>AULA</th>
                    <th>AÇÃO</th>
                  </tr>";

            while ($row = $result->fetch_assoc()) {
                $id = $row['ID'];
                echo "<tr class='aula-row' data-id='$id'>
                        <td>{$row['AULA']}</td>
                        <td>
                            <a href='DELETE_HORARIO_INSTRU.php?id_aluno={$id}' onclick='return confirmDelete();'>
                                <button>EXCLUIR</button>
                            </a>
                        </td>
                      </tr>";

                echo "<tr id='details-$id' class='hidden-row'>
                        <td colspan='2'>
                            <strong>Segunda:</strong> {$row['SEGUNDA']}<br>
                            <strong>Terça:</strong> {$row['TERCA']}<br>
                            <strong>Quarta:</strong> {$row['QUARTA']}<br>
                            <strong>Quinta:</strong> {$row['QUINTA']}<br>
                            <strong>Sexta:</strong> {$row['SEXTA']}<br>
                            <strong>Sábado:</strong> {$row['SABADO']}<br>
                            <strong>Domingo:</strong> {$row['DOMINGO']}
                        </td>
                      </tr>";

                // Exibição para telas pequenas (Cartões)
                echo "<div class='card'>
                        <h3>{$row['AULA']}</h3>
                        <p><strong>Segunda:</strong> {$row['SEGUNDA']}</p>
                        <p><strong>Terça:</strong> {$row['TERCA']}</p>
                        <p><strong>Quarta:</strong> {$row['QUARTA']}</p>
                        <p><strong>Quinta:</strong> {$row['QUINTA']}</p>
                        <p><strong>Sexta:</strong> {$row['SEXTA']}</p>
                        <p><strong>Sábado:</strong> {$row['SABADO']}</p>
                        <p><strong>Domingo:</strong> {$row['DOMINGO']}</p>
                        <a href='DELETE_HORARIO_INSTRU.php?id_aluno={$id}' onclick='return confirmDelete();'>
                            <button>EXCLUIR</button>
                        </a>
                      </div>";
            }
            echo "</table>";
        } else {
            echo "<p>Nenhum horário encontrado.</p>";
        }

        $conn->close();
        ?>

        <a href='CADASTRO_HORARIOS_AULAS_INSTRU.php?id_aluno=<?= $id_aluno ?>'><button>ADD HORÁRIO</button></a>
        <a href='MENU_INSTRUTOR.php?id_aluno=<?= $id_aluno ?>'><button>VOLTAR</button></a>

        <script>
            function confirmDelete() {
                return confirm("Tem certeza que deseja excluir este horário?");
            }

            const aulaRows = document.querySelectorAll('.aula-row');
            aulaRows.forEach(row => {
                row.addEventListener('click', () => {
                    const id = row.dataset.id;
                    const detailsRow = document.getElementById(`details-${id}`);

                    if (detailsRow.style.display === 'none' || detailsRow.style.display === '') {
                        detailsRow.style.display = 'table-row';
                    } else {
                        detailsRow.style.display = 'none';
                    }
                });
            });
        </script>
    </div>

</body>

</html>
