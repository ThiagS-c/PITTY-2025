<?php
include 'conexao.php';
$id_aluno = $_POST['id_aluno'];
$m_peso = $_POST['m_peso'];
$m_altura = $_POST['m_altura'];
$m_torax = $_POST['m_torax'];
$m_cintura = $_POST['m_cintura'];
$m_braço = $_POST['m_braço'];
$m_coxa = $_POST['m_coxa'];
$m_panturrilha = $_POST['m_panturrilha'];
$m_quadril = $_POST['m_quadril'];

// Função para verificar se uma string contém apenas números e ponto
function isNumericString($str) {
    return preg_match('/^\d*\.?\d*$/', $str);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Adicionar Medidas</title>

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
            width: 90%;
            max-width: 600px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin: 20px 0;
        }

        p {
            margin: 10px 0;
        }

        .back-button {
            margin-top: 20px;
        }

        .back-button button {
            background-color: black;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-button button:hover {
            background-color: gray;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php
        if (!isNumericString($m_peso) || !isNumericString($m_altura) || !isNumericString($m_torax) || !isNumericString($m_cintura) || !isNumericString($m_braço) || !isNumericString($m_coxa) || !isNumericString($m_panturrilha) || !isNumericString($m_quadril)) {
            echo "<h2>ERRO: PREENCHA OS CAMPOS COM NÚMEROS (0-9) E PONTO (.)</h2>";
            echo "<br><a href='CADASTRO_MEDIDAS_INSTRU.php?id_aluno=".$id_aluno."'><button>Voltar</button></a>";
        } else {
            $sql = "INSERT INTO medidas (id_aluno, m_peso, m_altura, m_torax, m_cintura, m_braco, m_coxa, m_panturrilha, m_quadril) 
                    VALUES ('$id_aluno', '$m_peso', '$m_altura', '$m_torax', '$m_cintura', '$m_braço', '$m_coxa', '$m_panturrilha', '$m_quadril')";

            if ($conn->query($sql) === TRUE) {
                echo "<h2>Medidas adicionadas com sucesso!</h2>";
                echo "<br><a href='medidas_instrutor.php?id_aluno=".$id_aluno."'><button>Voltar</button></a>";
            } else {
                echo "<h2>Erro ao inserir medidas: " . $conn->error . "</h2>";
            }
        }

        $conn->close();
        ?>
    </div>

</body>

</html>
