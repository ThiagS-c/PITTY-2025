<?php
include 'conexao.php';
$id_aluno = $_POST['id_aluno'];
$m_peso = $_POST['m_peso'];
$m_altura = $_POST['m_altura'];
$m_torax = $_POST['m_torax'];
$m_cintura = $_POST['m_cintura'];
$m_braco = $_POST['m_braco'];
$m_coxa = $_POST['m_coxa'];
$m_panturrilha = $_POST['m_panturrilha'];
$m_quadril = $_POST['m_quadril'];

// Função para verificar se uma string contém apenas números e ponto
function isNumericString($str) {
    return preg_match('/^\d*\.?\d*$/', $str);
}


if (!isNumericString($m_peso) || !isNumericString($m_altura) || !isNumericString($m_torax) || !isNumericString($m_cintura) || !isNumericString($m_braco) || !isNumericString($m_coxa) || !isNumericString($m_panturrilha) || !isNumericString($m_quadril)) {
    echo "ERRO: PREENCHA OS CAMPOS COM NÚMEROS (0-9) E PONTO (.)";
    echo "<br><br><a href='CADASTRO_MEDIDAS_INSTRU.php?id_aluno=".$id_aluno."'>VOLTAR</a>";
} else {
   $sql = "UPDATE medidas 
        SET m_peso = '$m_peso', 
            m_altura = '$m_altura', 
            m_torax = '$m_torax', 
            m_cintura = '$m_cintura', 
            m_braco = '$m_braco', 
            m_coxa = '$m_coxa', 
            m_panturrilha = '$m_panturrilha', 
            m_quadril = '$m_quadril'
        WHERE id_aluno = '$id_aluno';";


    if ($conn->query($sql) === TRUE) {
        echo "Medidas adicionadas com sucesso!";
        echo "<br><br><a href='medidas_instrutor.php?id_aluno=".$id_aluno."'>VOLTAR</a>";
    } else {
        echo "Erro ao inserir medidas: " . $conn->error;
    }
}

$conn->close();
?>
