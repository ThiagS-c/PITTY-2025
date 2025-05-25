<?php
$id_aluno = $_GET['id_aluno'] ?? $_POST['id_aluno'] ?? 0;
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_exercicio'])) {
    $id_exercicio = $_POST['id_exercicio'];
    $classe = $_POST['classe'];
    $classe_real = ($classe == 'C') ? 'F' : $classe;

    $sql_del = "DELETE FROM treinos WHERE id_aluno = ? AND id_exercicio = ? AND classe_treino = ?";
    $stmt = $conn->prepare($sql_del);
    $stmt->bind_param("iis", $id_aluno, $id_exercicio, $classe_real);
    $stmt->execute();
}

$sql = "SELECT id_exercicio, nome_exercicio FROM exercicios";
$result = mysqli_query($conn, $sql);
$exercicios = [];
while ($row = mysqli_fetch_assoc($result)) {
    $exercicios[] = $row;
}

$sql2 = "SELECT nome FROM aluno WHERE id_aluno = $id_aluno";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$nome_aluno = $row2['nome'] ?? 'Nome não encontrado';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Pitty - Treino Personalizado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: orangered;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: start;
            min-height: 100vh;
        }

        .content-wrapper {
            width: 95%;
            max-width: 600px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-top: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        .form-container {
            margin-bottom: 20px;
            max-width: 400px;
            margin: 0 auto;
        }

        .tables-container {
            margin-top: 20px;
            display: none;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .flex-row {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .flex-row .form-group {
            flex: 1 1 30%;
            min-width: 80px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 6px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .button-group {
            text-align: center;
            margin-top: 20px;
        }

        input[type="submit"], button {
            background-color: black;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
            width: 50%;
            margin-bottom: 10px;
        }

        input[type="submit"]:hover, button:hover {
            background-color: gray;
        }

        .toggle-button {
            background-color: orangered;
        }

        .toggle-button:hover {
            background-color: darkorange;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
            word-break: break-word;
        }

        th, td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
            font-size: 14px;
        }

        th {
            background-color: black;
            color: white;
        }

        caption {
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left;
        }

        .delete-form {
            display: inline;
        }

        .delete-button {
            background: none;
            border: none;
            cursor: pointer;
        }

        .delete-button img {
            width: 20px;
            height: 20px;
        }

        .back-button {
            text-align: center;
            margin-top: 10px;
        }

        .back-button a button {
            background-color: black;
        }

        @media (max-width: 1024px) {
            .content-wrapper {
                width: 95%;
            }
        }

        @media (max-width: 768px) {
            th, td {
                font-size: 12px;
                padding: 4px;
            }

            .flex-row {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .form-container, .tables-container {
                width: 100%;
            }
        }
    </style>
    <script>
        function toggleTables() {
            const tablesContainer = document.getElementById('tables-container');
            const toggleBtn = document.getElementById('toggle-btn');
            if (tablesContainer.style.display === 'none') {
                tablesContainer.style.display = 'block';
                toggleBtn.textContent = 'Ocultar Treinos';
            } else {
                tablesContainer.style.display = 'none';
                toggleBtn.textContent = 'Exibir Treinos';
            }
        }
    </script>
</head>
<body>

<div class="content-wrapper">
    <div class="form-container">
        <h2>Treino Personalizado</h2>
        <form action="CREATE_TREINO_IND.php" method="post">
            <label>Aluno: <?= htmlspecialchars($nome_aluno) ?></label>
            <input type="hidden" name="id_aluno" value="<?= htmlspecialchars($id_aluno) ?>">

            <div class="form-group">
                <label for="id_exercicio">Exercício:</label>
                <select id="id_exercicio" name="id_exercicio" required>
                    <option value="">Selecione o exercício</option>
                    <?php foreach ($exercicios as $ex): ?>
                        <option value="<?= htmlspecialchars($ex['id_exercicio']) ?>">
                            <?= htmlspecialchars($ex['nome_exercicio']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex-row">
                <div class="form-group">
                    <label for="n_series">Séries:</label>
                    <input type="number" id="n_series" name="n_series" min="1" required>
                </div>

                <div class="form-group">
                    <label for="n_repeti">Repetições:</label>
                    <input type="number" id="n_repeti" name="n_repeti" min="1" required>
                </div>

                <div class="form-group">
                    <label for="o_seque">Ordem:</label>
                    <input type="number" id="o_seque" name="o_seque" min="1" required>
                </div>
            </div>

            <div class="form-group">
                <label for="classe">Classe:</label>
                <select id="classe" name="classe" required>
                    <option value="">Selecione a classe</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="F">C</option>
                    <option value="S">S</option>
                </select>
            </div>

            <div class="button-group">
                <input type="submit" value="Adicionar">
                <button id="toggle-btn" type="button" class="toggle-button" onclick="toggleTables()">Exibir Treinos</button>
                <div class="back-button">
                    <a href="GERENCIA_ALUN_INSTRU.php?id_aluno=<?= htmlspecialchars($id_aluno) ?>">
                        <button type="button">VOLTAR</button>
                    </a>
                </div>
            </div>
        </form>
    </div>

    <div id="tables-container" class="tables-container">
        <?php
        function gerarTabelaTreino($conn, $id_aluno, $classe) {
            $classe_real = ($classe == 'C') ? 'F' : $classe;

            $sql = "SELECT treinos.id_exercicio, exercicios.nome_exercicio AS EXERCICIO, 
                           treinos.series AS SERIES, treinos.repeticoes AS REPETICOES
                    FROM treinos
                    JOIN exercicios ON treinos.id_exercicio = exercicios.id_exercicio
                    WHERE treinos.classe_treino = '$classe_real' AND treinos.id_aluno = $id_aluno
                    ORDER BY treinos.ordem ASC";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<caption>Treino Personalizado - Categoria $classe</caption>";
                echo "<tr><th>Exercício</th><th>Séries</th><th>Repetições</th><th>Ação</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['EXERCICIO']) . "</td>
                            <td>" . htmlspecialchars($row['SERIES']) . "</td>
                            <td>" . htmlspecialchars($row['REPETICOES']) . "</td>
                            <td>
                                <form class='delete-form' method='post' onsubmit='return confirm(\"Deseja realmente excluir este exercício?\");'>
                                    <input type='hidden' name='id_aluno' value='$id_aluno'>
                                    <input type='hidden' name='id_exercicio' value='{$row['id_exercicio']}' />
                                    <input type='hidden' name='classe' value='$classe'>
                                    <input type='hidden' name='delete_exercicio' value='1'>
                                    <button type='submit' class='delete-button'>
                                        <img src='https://img.icons8.com/ios-glyphs/30/000000/trash--v1.png' alt='Excluir'>
                                    </button>
                                </form>
                            </td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>SEM TREINO $classe</p>";
            }
        }

        gerarTabelaTreino($conn, $id_aluno, 'A');
        gerarTabelaTreino($conn, $id_aluno, 'B');
        gerarTabelaTreino($conn, $id_aluno, 'C');
        gerarTabelaTreino($conn, $id_aluno, 'S');

        $conn->close();
        ?>
    </div>
</div>

</body>
</html>
