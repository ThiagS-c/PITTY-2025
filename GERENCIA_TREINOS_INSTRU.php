<?php
include 'conexao.php';
$id_aluno = $_GET['id_aluno'];

// Recuperar os nomes dos exercícios do banco de dados
$sql = "
    SELECT 
        nome_exercicio
    FROM exercicios 
    WHERE id_categoria IN (2, 7, 4);";

$result = $conn->query($sql);

// Armazenar os nomes dos exercícios em um array
$exercicios = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $exercicios[] = $row['nome_exercicio'];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Treino</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <style>
        body {
            background-color: orangered;
            color: black;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .container {
            width: 100%;
            max-width: 800px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: black;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: gray;
        }

        @media (max-width: 768px) {
            th,
            td {
                font-size: 14px;
                padding: 8px;
            }

            input[type="submit"] {
                padding: 8px 12px;
            }
        }
    </style>
    <script>
        $(function () {
            // Ativar o autocomplete para os campos de entrada
            const exercicios = <?php echo json_encode($exercicios); ?>;
            $("#nome_exercicio1, #nome_exercicio2, #nome_exercicio3, #nome_exercicio4").autocomplete({
                source: exercicios
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <h2>Cadastro de Treino</h2>
        <form action="CREATE_TREINO_INSTRU.PHP" method="post">
            <table>
                <tr>
                    <th>Nome do Exercício</th>
                    <th>Séries</th>
                    <th>Repetições</th>
                </tr>
                <?php for ($i = 1; $i <= 4; $i++) : ?>
                    <tr>
                        <td><input type="text" id="nome_exercicio<?php echo $i; ?>" name="nome_exercicio<?php echo $i; ?>" placeholder="Nome do Exercício <?php echo $i; ?>"></td>
                        <td><input type="text" id="Series<?php echo $i; ?>" name="Series<?php echo $i; ?>" placeholder="Séries"></td>
                        <td><input type="text" id="repeticoes<?php echo $i; ?>" name="repeticoes<?php echo $i; ?>" placeholder="Repetições"></td>
                    </tr>
                <?php endfor; ?>
                <input type="hidden" id="id_aluno" name="id_aluno" value="<?php echo $id_aluno; ?>">
            </table>
            <input type="submit" value="Enviar">
        </form>
        <br>
        <a href="MENU_INSTRUTOR.php?id_aluno=<?= $id_aluno ?>">VOLTAR</a>
    </div>
</body>

</html>

<?php
$conn->close();
?>
