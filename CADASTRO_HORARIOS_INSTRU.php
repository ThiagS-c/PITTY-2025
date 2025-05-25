<?php
$id_aula = $_GET['id_aula'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Novo Horário Aula</title>

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
            max-width: 500px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
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

        input[type="time"],
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
            font-weight: bold;
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
            input[type="submit"],
            .back-button button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>NOVO HORÁRIO</h2>
        <form action="CREATE_HORARIOS_INSTRU.php" method="post">
            <label for="id_aula">ID:</label>
            <input type="text" id="id_aula" name="id_aula" value="<?php echo $id_aula; ?>" readonly>

            <label for="segunda">Segunda:</label>
            <input type="time" id="segunda" name="segunda">

            <label for="terça">Terça:</label>
            <input type="time" id="terça" name="terça">

            <label for="quarta">Quarta:</label>
            <input type="time" id="quarta" name="quarta">

            <label for="quinta">Quinta:</label>
            <input type="time" id="quinta" name="quinta">

            <label for="sexta">Sexta:</label>
            <input type="time" id="sexta" name="sexta">

            <label for="sabado">Sábado:</label>
            <input type="time" id="sabado" name="sabado">

            <label for="domingo">Domingo:</label>
            <input type="time" id="domingo" name="domingo">

            <input type="submit" value="Adicionar">
        </form>

        <div class="back-button">
            <a href="GERENCIA_HORAR_INSTRU.php?id_aluno=999">
                <button type="button">VOLTAR</button>
            </a>
        </div>
    </div>

</body>

</html>
