<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Adição de Horários</title>

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

        h2 {
            margin: 20px 0;
        }

        p {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include 'conexao.php';

        $id_aula = $_POST['id_aula'];
        $hr_seg = $_POST['segunda'];
        $hr_terca = $_POST['terca'];
        $hr_quarta = $_POST['quarta'];
        $hr_quinta = $_POST['quinta'];
        $hr_sexta = $_POST['sexta'];
        $hr_sabado = $_POST['sabado'];
        $hr_domingo = $_POST['domingo'];

        // Verifica se o valor de id_aula é válido
        $sql_check = "SELECT id_aula_grup FROM aulas_grupo WHERE id_aula_grup = '$id_aula'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows == 0) {
            echo "<h2>Erro: O ID da aula não existe na tabela de aulas!</h2>";
            echo "<br><a href='CADASTRO_HORARIOS_INSTRU.html?id_aluno=999'><button>Voltar</button></a>";
        } else {
            // Insere os dados na tabela horarios
            $sql = "INSERT INTO horarios (id_aula_grup, hr_seg, hr_terca, hr_quarta, hr_quinta, hr_sexta, hr_sabado, hr_domingo) 
                    VALUES ('$id_aula', '$hr_seg', '$hr_terca', '$hr_quarta', '$hr_quinta', '$hr_sexta', '$hr_sabado', '$hr_domingo')";

            if ($conn->query($sql) === TRUE) {
                echo "<h2>Horário adicionado com sucesso!</h2>";
                echo "<br><a href='GERENCIA_HORAR_INSTRU.php?id_aluno=999'><button>Voltar</button></a>";
            } else {
                echo "<h2>Erro ao adicionar horário: " . $conn->error . "</h2>";
                echo "<br><a href='GERENCIA_HORAR_INSTRU.php?id_aluno=999'><button>Voltar</button></a>";
            }
        }

        // Fecha a conexão
        $conn->close();
        ?>
    </div>
</body>

</html>
