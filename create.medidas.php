<?php

include 'conexao.php';
$id_aluno = $_GET['id_aluno'];
$m_peso = $_POST['nome'];
$m_altura = $_POST['nome'];
$m_torax = $_POST['nome'];$_POST['nome'];
$m_cintura = $_POST['nome'];
$m_braço = $_POST['nome'];
$m_coxa = $_POST['nome'];
$m_panturrilha =$_POST['nome'];
$m_quadril =$_POST['nome'];




IF ($nome == "")
{
    echo "ERRO, PREENCHER CAMPOS";
} 
else{
$sql = "INSERT INTO medidas (id_aluno, m_peso, m_altura, m_torax, m_cintura, m_braço, m_coxa, m_panturrilha, m_quadril) VALUES ('$id_aluno', '$m_peso', '$m_altura', '$m_torax', '$m_cintura', '$m_braço', '$m_coxa', '$m_panturrilha', '$m_quadril') ";

if ($conn->query($sql) === TRUE) {
    echo "Usuário adicionado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>
