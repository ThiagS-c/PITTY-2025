<?php
include 'conexao.php';

$id_aluno = $_POST['id_aluno'];
$nome_exercicio = $_POST['nome_exercicio'];
$Series = $_POST['Series'];
$repetiçoes = $_POST['repetiçoes'];

$nome_exercicio2 = $_POST['nome_exercicio2'];
$Series2 = $_POST['Series2'];
$repetiçoes2 = $_POST['repetiçoes2'];

$nome_exercicio3 = $_POST['nome_exercicio3'];
$Series3 = $_POST['Series3'];
$repetiçoes3 = $_POST['repetiçoes3'];

$nome_exercicio4 = $_POST['nome_exercicio4'];
$Series4 = $_POST['Series4'];
$repetiçoes4 = $_POST['repetiçoes4'];

$sql_id = "";
$result_id = $conn->query($result_id);

$sql_check = " ";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows == 0) {
    echo "Erro: O ID da aluno não existe na tabela de alunos!";
    echo "<br><br><a href='MENU_INSTRUTOR.PHP?id_aluno=999'>Voltar</a><br>";
} else {
    // Insere os dados na tabela horarios
    $sql = "INSERT INTO horarios (id_aula_grup, hr_seg, hr_terça, hr_quarta, hr_quinta, hr_sexta, hr_sabado, hr_domingo) 
            VALUES ('$id_aula', '$hr_seg', '$hr_terça', '$hr_quarta', '$hr_quinta', '$hr_sexta', '$hr_sabado', '$hr_domingo')";

    if ($conn->query($sql) === TRUE) {
        echo "Horario adicionado com sucesso!";
        echo "<br><br><a href='GERENCIA_HORAR_INSTRU.PHP?id_aluno=999'>Voltar</a><br>";
    } else {
        echo "Erro ao adicionar horario: " . $conn->error;
        echo "<br><br><a href='GERENCIA_HORAR_INSTRU.PHP?id_aluno=999'>Voltar</a><br>";
    }
}

$conn->close();
?>
