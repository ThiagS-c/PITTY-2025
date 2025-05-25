<?php
include 'conexao.php';

$id_aluno = $_GET['id_aluno'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$sexo = $_POST['sexo'];
$nivel = $_POST['nivel'];
$observacoes = $_POST['observacoes'];

$sql = "UPDATE aluno SET nome='$nome', sobrenome='$sobrenome', sexo='$sexo',nivel='$nivel', observações='$observacoes'  WHERE id_aluno=$id_aluno";

if ($conn->query($sql) === TRUE) {
    echo "Usuário atualizado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
