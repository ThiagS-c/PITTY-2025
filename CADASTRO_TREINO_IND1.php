<?php
$id_aluno = $_GET['id_aluno'];
include 'conexao.php';

$sql = "SELECT id_exercicio, nome_exercicio FROM exercicios";
$result = mysqli_query($conn, $sql);
$exercicios = [];
while($row = mysqli_fetch_assoc($result)) {
    $exercicios[] = $row;
}

// pegar nome do aluno
$sql2 = "SELECT nome FROM aluno WHERE id_aluno = $id_aluno;";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$nome_aluno = $row2['nome'] ?? 'Nome não encontrado';
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Treino Personalizado</title>
    <style>
        body {
            background-color: orangered;
            color: black;
            font-family: Arial, sans-serif;
           // display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        .content-wrapper {
                  display: flex;
                 justify-content: flex-start;
                 align-items: flex-start;
                  gap: 20px;
                  width: 90%;
                   max-width: 1200px;
                 margin: 20px auto;
        }

        .form-container {
            flex: 0.5;
            max-width: 350px;
            //margin-right: 20px;
        }

        .tables-container {
            flex: 2;
        }

        .container {
            width: 90%;
            max-width: 600px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: darkorange;
        }
    </style>
</head>
<body>
<div class="content-wrapper">
<div class="container form-container">
    <h2>Treino Personalizado</h2>
    <form action="CREATE_TREINO_IND.php" method="post">
        <label for="id_aluno">Aluno: <?php echo htmlspecialchars($nome_aluno); ?></label>
        <input type="hidden" id="id_aluno" name="id_aluno" value="<?php echo htmlspecialchars($id_aluno); ?>" readonly>
       <br> <br>
        <label for="id_exercicio">Exercício:</label>
        <select id="id_exercicio" name="id_exercicio" required>
            <option value="">Selecione o exercício</option>
            <?php foreach ($exercicios as $ex): ?>
                <option value="<?= htmlspecialchars($ex['id_exercicio']) ?>">
                    <?= htmlspecialchars($ex['nome_exercicio']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="n_series">Séries:</label>
        <input type="number" id="n_series" name="n_series" min="1" step="1" required>

        <label for="n_repeti">Repetições:</label>
        <input type="number" id="n_repeti" name="n_repeti" min="1" step="1" required>
                    <br>
        <label for="o_seque">Ordem:</label>
        <input type="number" id="o_seque" name="o_seque" min="1" step="1" required>
                     
 
        <label for="classe">Classe:</label> <br>
        <select id="classe" name="classe" required>
            <option value="">Selecione a classe</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="F">C</option>
            <option value="S">S</option>
        </select>
        
                    <br> </br>
 
        <input type="submit" value="ADICIONAR">

           <div class="back-button">
           <a href="GERENCIA_ALUN_INSTRU.php?id_aluno=<?= htmlspecialchars($id_aluno) ?>">
                    <br> </br>
 
            <button type="button">VOLTAR</button>
              <br> </br>
        </a>
       
    </div>
    
    </form>
       <a href='treino_delet_all2.php?id_aluno=<?= htmlspecialchars($id_aluno) ?>' onclick='return confirm("Deseja realmente excluir o treino?");'>
        <button>EXCLUIR TREINO</button>
    </a>
    <br><br>
</div>
<div class="tables-container">
<?php
function gerarTabelaTreino($conn, $id_aluno, $classe) {
    // Se a classe for 'C', tratar como 'F'
    $classe_real = ($classe == 'C') ? 'F' : $classe;

    $sql = "SELECT exercicios.nome_exercicio AS EXERCICIO, treinos.series AS SERIES, treinos.repeticoes AS REPETICOES
            FROM treinos
            JOIN exercicios ON treinos.id_exercicio = exercicios.id_exercicio
            WHERE treinos.classe_treino = '$classe_real' AND treinos.id_aluno = $id_aluno
            ORDER BY treinos.ordem ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='container'>";
        echo "<table border='1'>";
        echo "<caption><strong>Treino Personalizado - Categoria $classe</strong></caption>";
        echo "<tr><th>EXERCÍCIO</th><th>SÉRIES</th><th>REPETIÇÕES</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . htmlspecialchars($row['EXERCICIO']) . "</td>
                  <td>" . htmlspecialchars($row['SERIES']) . "</td>
                  <td>" . htmlspecialchars($row['REPETICOES']) . "</td></tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='container'><p>SEM TREINO $classe</p></div>";
    }
}

// Exibir tabelas na ordem 
gerarTabelaTreino($conn, $id_aluno, 'A');
gerarTabelaTreino($conn, $id_aluno, 'B');
gerarTabelaTreino($conn, $id_aluno, 'C'); // Chamando com 'C', mas buscará os dados de 'F'
gerarTabelaTreino($conn, $id_aluno, 'S');

$conn->close();
?>
</div>
                </div>

</body>
</html>