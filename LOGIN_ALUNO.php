<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Login</title>

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

        $login = $_POST['username'];
        $senha = $_POST['password'];

        $sql = "SELECT aluno.id_aluno FROM aluno WHERE login = '$login' and senha = '$senha'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Login bem-sucedido
            $row = $result->fetch_assoc();
            $id_aluno = $row['id_aluno'];
            header("Location: MENU_ALUNO.php?id_aluno=$id_aluno");
            exit();
        } else {
            // Login incorreto
            echo "<h2>Login ou senha incorretos.</h2>";
            echo "<br><a href='LOGIN_ALU_INDEX.html'><button>Voltar</button></a>";
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
        ?>
    </div>
</body>

</html>
