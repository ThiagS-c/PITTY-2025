<?php
include 'conexao.php';

// Verifica se 'id_aluno' está definido para evitar erro
$id_aluno = isset($_GET['id_aluno']) ? $_GET['id_aluno'] : null;

if (!$id_aluno) {
    // Redireciona para uma página de erro ou exibe uma mensagem amigável
    header("Location: erro.php?msg=ID do aluno não fornecido");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Painel Instrutor</title>
    <style>
        body {
            background-color: orangered;
            color: black;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .background-wrapper {
            position: relative;
            width: 100%;
            max-width: 800px;
            padding: 20px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('imagens/painel_instrutor.jpg'); /* Adicione a URL da imagem */
            background-size: cover;
            background-position: center;
            opacity: 0.5;
            z-index: -1;
        }

        h1 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
            color: black;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.6);
        }

        th, td {
            padding: 15px;
            text-align: center;
            border: 2px solid black;
        }

        a.table-link {
            display: block;
            color: black;
            text-decoration: none;
            padding: 10px;
            border-radius: 10px;
            transition: background-color 0.3s;
        }

        a.table-link:hover {
            background-color: orangered;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .exit-button {
            background-color: white;
            color: black; /* Texto dos botões agora é preto <a class="table-link" href='GERENCIA_TREINOS_INSTRU.php?id_aluno=<php echo $id_aluno; ?>'>TREINOS</a>*/
            border: 2px solid orangered;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }

        .exit-button:hover {
            background-color: black;
            color: white;
            border-color: brown;
        }

        @media (max-width: 600px) {
            .exit-button {
                font-size: 14px;
                padding: 8px 16px;
            }

            table {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="background-wrapper">
    <div class="background-image"></div>

    <h1>PAINEL INSTRUTOR</h1>

    <table>
        <tr>
            <th>MENU</th>
        </tr>
        <tr>
            <td>
                <a class="table-link" href='GERENCIA_ALUN_INSTRU.php?id_aluno=<?php echo $id_aluno; ?>'>ALUNOS</a>
                <a class="table-link" href='GERENCIA_EXERC_INSTRU.php?id_aluno=<?php echo $id_aluno; ?>'>EXERCÍCIOS</a>
                <a class="table-link" href='GERENCIA_AULA_GR_INSTRU.php?id_aluno=<?php echo $id_aluno; ?>'>AULAS EM GRUPO</a>
                <a class="table-link" href='GERENCIA_HORAR_INSTRU.php?id_aluno=<?php echo $id_aluno; ?>'>HORÁRIOS AULAS</a>
                <a class="table-link" href='MAPA_PITTY_INSTRU.php?id_aluno=<?php echo $id_aluno; ?>'>MAPA</a>
               
            </td>
        </tr>
    </table>

    <div class="button-container">
        <a href='login_admin_index.html'>
            <button class="exit-button" type='button'>SAIR</button>
        </a>
    </div>
</div>

<?php
$conn->close();
?>

</body>

</html>
