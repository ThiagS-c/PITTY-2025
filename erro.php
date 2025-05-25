<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro</title>
    <style>
        body {
            background-color: orangered;
            color: black;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        h1 {
            margin-top: 0;
            margin-bottom: 20px;
            color: black;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        a {
            text-decoration: none;
        }

        .back-button {
            background-color: brown;
            color: white;
            border: 2px solid white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: white;
            color: orangered;
            border-color: orangered;
        }

        @media (max-width: 600px) {
            p {
                font-size: 16px;
            }
            .back-button {
                font-size: 14px;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Erro: ID do aluno não foi fornecido.</h1>
    <p>Por favor, volte e tente novamente.</p>
    <a href="login_admin_index.html">
        <button class="back-button">Voltar ao Login</button>
    </a>
</div>

</body>
</html>
