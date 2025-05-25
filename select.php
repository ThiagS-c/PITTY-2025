<?php
include 'conexao.php';
$id_aluno = $_GET['id_aluno'];

$sql = "SELECT 
     aluno.id_aluno,
     aluno.nome,
     aluno.sobrenome,
     aluno.sexo,
     aluno.nivel,
    aluno.observações
    from aluno WHERE aluno.id_aluno = $id_aluno";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Nome</th><th>Sobrenome</th><th>Sexo</th><th>Nivel</th><th>Observações</th><th>Ações</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id_aluno"]."</td><td>".$row["nome"]."</td><td>".$row["sobrenome"]."</td><td>".$row["sexo"]."</td><td>".$row["nivel"]."</td><td>".$row["observações"]."</td><td><a href='medidas.php?id_aluno=".$row["id_aluno"]."'>MEDIDAS</a> | <a href='create.medidas.php?id_aluno=".$row["id_aluno"]."'>ADD MEDIDAS</a> | <a href='upgrade.php?id_aluno=".$row["id_aluno"]."'>Editar</a> | <a href='delete.php?id_aluno=".$row["id_aluno"]."'>Excluir</a><td></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

$conn->close();
?>

