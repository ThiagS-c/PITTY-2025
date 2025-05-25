<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Exclusão de Alunos</title>

    <style>
        body {
            background-color: orangered;
            color: black;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 95%;
            max-width: 600px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        button {
            background-color: black;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 5px;
        }

        button:hover {
            background-color: gray;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include 'conexao.php';

        $id_aluno = $_GET['id_aluno'];

        // Verifica se o ID do aluno é um número
        if (!filter_var($id_aluno, FILTER_VALIDATE_INT)) {
            echo "<p>Erro: ID do aluno inválido!</p>";
            echo "<br><a href='MENU_INSTRUTOR.php?id_aluno=999'><button>Voltar</button></a>";
            exit;
        }

        try {
            // Começa uma transação
            $conn->begin_transaction();

            // Prepara as instruções para deletar as medidas e o aluno
            $stmt1 = $conn->prepare("DELETE FROM medidas WHERE id_aluno = ?");
            $stmt1->bind_param("i", $id_aluno);
            $stmt1->execute();

            $stmt2 = $conn->prepare("DELETE FROM aluno WHERE id_aluno = ?");
            $stmt2->bind_param("i", $id_aluno);
            $stmt2->execute();

            // Confirma a transação
            $conn->commit();

            echo "<h2>Usuário excluído com sucesso!</h2>";
            echo "<br><a href='MENU_INSTRUTOR.php?id_aluno=999'><button>Voltar</button></a>";

        } catch (Exception $e) {
            // Reverte a transação em caso de erro
            $conn->rollback();
            echo "<p>Erro ao excluir usuário: " . $e->getMessage() . "</p>";
            echo "<br><a href='MENU_INSTRUTOR.php?id_aluno=999'><button>Voltar</button></a>";
        }

        // Fecha a conexão
        $conn->close();
        ?>
    </div>
</body>

</html>
