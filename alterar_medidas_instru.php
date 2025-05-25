<?php
$id_aluno = $_GET['id_aluno'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Medidas do Aluno</title>

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
            max-width: 400px;
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
        <h2>MEDIDAS DO ALUNO</h2>
        <form action="atualizar_medidas_instru.php" method="post">
            <label for="id_aluno">ID do Aluno:</label>
            <input type="text" id="id_aluno" name="id_aluno" value="<?php echo $id_aluno; ?>" readonly>

            <label for="m_peso">Peso:</label>
            <input type="text" id="m_peso" name="m_peso" pattern="[0-9]+(\.[0-9]+)?" placeholder="Ex: 70.5">

            <label for="m_altura">Altura:</label>
            <input type="text" id="m_altura" name="m_altura" pattern="[0-9]+(\.[0-9]+)?" placeholder="Ex: 1.75">

            <label for="m_torax">Tórax:</label>
            <input type="text" id="m_torax" name="m_torax" pattern="[0-9]+(\.[0-9]+)?" placeholder="Ex: 90.2">

            <label for="m_cintura">Cintura:</label>
            <input type="text" id="m_cintura" name="m_cintura" pattern="[0-9]+(\.[0-9]+)?" placeholder="Ex: 70.5">

            <label for="m_braco">Braço:</label>
            <input type="text" id="m_braco" name="m_braco" pattern="[0-9]+(\.[0-9]+)?" placeholder="Ex: 35.5">

            <label for="m_coxa">Coxa:</label>
            <input type="text" id="m_coxa" name="m_coxa" pattern="[0-9]+(\.[0-9]+)?" placeholder="Ex: 60.1">

            <label for="m_panturrilha">Panturrilha:</label>
            <input type="text" id="m_panturrilha" name="m_panturrilha" pattern="[0-9]+(\.[0-9]+)?" placeholder="Ex: 40.0">

            <label for="m_quadril">Quadril:</label>
            <input type="text" id="m_quadril" name="m_quadril" pattern="[0-9]+(\.[0-9]+)?" required placeholder="Ex: 95.3">

            <input type="submit" value="Adicionar">
        </form>

        <div class="back-button">
            <a href="GERENCIA_ALUN_INSTRU.php?id_aluno=999">
                <button type="button">VOLTAR</button>
            </a>
        </div>
    </div>

</body>

</html>
