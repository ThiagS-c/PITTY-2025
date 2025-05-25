<?php
include 'conexao.php';
$id_aluno = $_GET['id_aluno'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Treinos</title>
    <style>
        body {
            background-color: orangered;
            color: black;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            width: 95%;
            max-width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: black;
        }

        .button-container {
            display: flex;
            flex-direction: column; /* Alinhar verticalmente */
            gap: 15px; /* Espaço entre os botões */
            margin-top: 20px;
        }

        button {
            background-color: white;
            color: black; /* Texto preto */
            border: 2px solid orangered;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
            flex: 1;
        }

        button:hover {
            background-color: brown;
            color: white; /* Texto branco no hover */
            border-color: #ccc;
        }

        .back-button-container {
            display: flex;
            justify-content: center; /* Centraliza o botão Voltar */
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            button {
                font-size: 14px;
                padding: 8px 16px;
            }
        }

        @media (max-width: 480px) {
            .container {
                width: 100%; /* Ocupa toda a tela em dispositivos menores */
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Selecione seu Treino</h1>

    <div class="button-container">
        <a href='treino_add_A.php?id_aluno=<?php echo $id_aluno; ?>'>
            <button>FOCO EM PERNA INICIANTE HIPERTROFIA</button>
        </a>
        <a href='treino_add_B.php?id_aluno=<?php echo $id_aluno; ?>'>
            <button>FOCO EM PERNA INTERMEDIÁRIO HIPERTROFIA</button>
        </a>
        <a href='treino_add_C.php?id_aluno=<?php echo $id_aluno; ?>'>
            <button>FOCO EM EMAGRECIMENTO TREINO 1</button>
        </a>
        <a href='treino_add_D.php?id_aluno=<?php echo $id_aluno; ?>'>
            <button>FOCO EM EMAGRECIMENTO TREINO 2</button>
        </a>
        <a href='CADASTRO_TREINO_IND.php?id_aluno=<?php echo $id_aluno; ?>'>
            <button>TREINO PERSONALIZADO</button>
        </a>
         <a>
        </a>
        <a>
        </a>
        <a href='treino_delet_all.php?id_aluno=<?php echo $id_aluno; ?>'>
            <button>EXCLUIR TREINO ATUAL</button>
        </a>
    </div>

    <div class="back-button-container">
        <a href='GERENCIA_ALUN_INSTRU.php?id_aluno=<?php echo $id_aluno; ?>'>
            <button>VOLTAR MENU</button>
        </a>
    </div>
</div>

<?php
$conn->close();
?>

</body>
</html>
