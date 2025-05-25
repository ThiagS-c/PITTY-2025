<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_aluno = $_POST['id_aluno'];
    $new_password = $_POST['new_password'];

    // Validação simples para a senha
    if (!empty($new_password) && strlen($new_password) >= 6) {
        // Update da senha no banco de dados
        $sql = "UPDATE aluno SET senha = '$new_password' WHERE id_aluno = $id_aluno";

        if ($conn->query($sql) === TRUE) {
            echo "Senha atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar a senha: " . $conn->error;
        }
    } else {
        echo "A senha deve ter pelo menos 6 caracteres.";
    }

    $conn->close();
}
?>
