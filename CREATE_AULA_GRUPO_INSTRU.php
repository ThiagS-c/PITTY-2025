<?php

include 'conexao.php';

$nome = $_POST['nome'];


IF ($nome == "")
{
    echo "ERRO, PREENCHER CAMPOS";
    echo "<br><br><a href='CADASTRO_AULAS_INSTRU.html?id_aluno=999'>Voltar</a><br>";
} 
else{
$sql = "INSERT INTO aulas_grupo (nome_aula) VALUES ('$nome') ";

if ($conn->query($sql) === TRUE) {
    echo "Aula adicionado com sucesso!";
    echo "<br><br><a href='GERENCIA_AULA_GR_INSTRU.php?id_aluno=999'>Voltar</a><br>";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
    echo "<br><br><a href='MENU_INSTRUTOR.php?id_aluno=999'>Voltar</a><br>";
}
}
$conn->close();
?>
