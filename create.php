<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Adição de Alunos</title>

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

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $sexo = $_POST['sexo'];
        $nivel = $_POST['nivel'];
        $observacoes = $_POST['observacoes'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        if ($nome == "") {
            echo "<h2>ERRO: PREENCHER CAMPOS</h2>";
            echo "<br><a href='MENU_INSTRUTOR.php?id_aluno=999'><button>Voltar</button></a>";
        } else {
            $sql = "INSERT INTO aluno (nome, sobrenome, sexo, nivel, observacoes, login, senha) 
                    VALUES ('$nome', '$sobrenome', '$sexo', '$nivel', '$observacoes', '$login', '$senha')";

            if ($conn->query($sql) === TRUE) {
                echo "<h2>Usuário adicionado com sucesso!</h2>";
                echo "<br><a href='MENU_INSTRUTOR.php?id_aluno=999'><button>Voltar</button></a>";
            } else {
                echo "<p>Erro: " . $conn->error . "</p>";
                echo "<br><a href='MENU_INSTRUTOR.php?id_aluno=999'><button>Voltar</button></a>";
            }
        }
        $conn->close();
        ?>
    </div>
</body>

</html>
