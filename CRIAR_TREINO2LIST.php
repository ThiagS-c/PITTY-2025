<?php
include 'conexao.php';

$sql = "SELECT id_exercicio, nome_exercicio FROM exercicios";
$result = mysqli_query($conn, $sql);

// Armazenar resultados em array para reutilização
$exercicios = [];
while($row = mysqli_fetch_assoc($result)) {
    $exercicios[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seleção de Exercícios</title>
    <style>
        .lista-nomes {
            width: 300px;
            padding: 10px;
            margin: 10px;
            font-size: 16px;
        }
        .container-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding: 20px;
        }
        .exercise-group {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 15px;
        }
        .input-small {
            width: 80px;
            padding: 8px;
        }
    </style>
</head>
<body>
    <form method="post" action="processar_treino.php">
        <div class="container-form">
            <!-- Classe A -->
            <div>
                <h3>TREINO A</h3>
                <?php for($i = 1; $i <= 10; $i++): ?>
                <div class="exercise-group">
                    <select class="lista-nomes" name="classeA[<?= $i ?>][id_exercicio]" required>
                        <option value="">Selecione o exercício <?= $i ?></option>
                        <?php foreach($exercicios as $ex): ?>
                            <option value="<?= $ex['id_exercicio'] ?>">
                                <?= htmlspecialchars($ex['nome_exercicio']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    
                    <input type="number" class="input-small" name="classeA[<?= $i ?>][series]" 
                           placeholder="Séries" min="1" required>
                    
                    <input type="text" class="input-small" name="classeA[<?= $i ?>][repeticoes]" 
                           placeholder="Repetições" required>
                    
                    <input type="number" class="input-small" name="classeA[<?= $i ?>][ordem]" 
                           value="<?= $i ?>" min="1" required>
                    
                    <input type="hidden" name="classeA[<?= $i ?>][classe]" value="A">
                </div>
                <?php endfor; ?>
            </div>

            <!-- Classe B -->
            <div>
                <h3>TREINO B</h3>
                <?php for($i = 1; $i <= 6; $i++): ?>
                <div class="exercise-group">
                    <select class="lista-nomes" name="classeB[<?= $i ?>][id_exercicio]" required>
                        <option value="">Selecione o exercício <?= $i ?></option>
                        <?php foreach($exercicios as $ex): ?>
                            <option value="<?= $ex['id_exercicio'] ?>">
                                <?= htmlspecialchars($ex['nome_exercicio']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    
                    <input type="number" class="input-small" name="classeB[<?= $i ?>][series]" 
                           placeholder="Séries" min="1" required>
                    
                    <input type="text" class="input-small" name="classeB[<?= $i ?>][repeticoes]" 
                           placeholder="Repetições" required>
                    
                    <input type="number" class="input-small" name="classeB[<?= $i ?>][ordem]" 
                           value="<?= $i ?>" min="1" required>
                    
                    <input type="hidden" name="classeB[<?= $i ?>][classe]" value="B">
                </div>
                <?php endfor; ?>
            </div>

            <!-- Adicione as outras classes (F, S) seguindo o mesmo padrão -->

            <input type="hidden" name="id_aluno" value="<?= $id_aluno ?>">
            <button type="submit" style="padding: 10px 20px; margin-top: 20px;">Criar Treino</button>
        </div>
    </form>
</body>
</html>