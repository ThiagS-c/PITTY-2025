<?php
    $id_categoria = $_GET['id_aula'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty NOVO EXERCÍCIO</title>

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
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: orangered;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: darkorange;
        }

        .back-button {
            text-align: center;
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

        /* Responsividade */
        @media (max-width: 480px) {
            .container {
                width: 90%;
            }

            input[type="submit"],
            .back-button button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>NOVO EXERCÍCIO</h2>
        <form action="CREATE_EXERCICIOS_INSTRU.php" method="post">
            <label for="id_categoria">ID CATEGORIA:</label>
            <input type="text" id="id_categoria" name="id_categoria" value="<?php echo $id_categoria; ?>" readonly>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <input type="submit" value="Adicionar">
        </form>

        <div class="back-button">
            <a href="GERENCIA_EXERC_INSTRU.php?id_aluno=999">
                <button type="button">VOLTAR</button>
            </a>
        </div>
    </div>

</body>
</html>






