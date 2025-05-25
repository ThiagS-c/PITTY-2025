<?php
include 'conexao.php';
$id_aluno = $_GET['id_aluno'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Exercícios</title>
    <style>
        body {
            background-color: orangered;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .login-container {
            text-align: center;
            background-color: white; /* Fundo branco para contraste */
            padding: 20px; /* Espaçamento interno */
            border-radius: 10px; /* Cantos arredondados */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Sombra suave */
            width: 90%; /* Largura responsiva */
            max-width: 600px; /* Largura máxima */
        }

        table {
            width: 100%; /* Tabela ocupa toda a largura disponível */
            border-collapse: collapse; /* Remove espaços entre as células */
            margin: 20px 0; /* Margem acima e abaixo da tabela */
        }

        th {
            background-color: black; /* Cor do cabeçalho da tabela */
            color: white; /* Cor do texto do cabeçalho */
            padding: 10px; /* Espaçamento interno */
        }

        td {
            padding: 10px; /* Espaçamento interno das células */
            text-align: left; /* Alinhamento do texto à esquerda */
        }

        a {
            display: block; /* Cada link ocupa uma linha */
            color: black; /* Cor do link */
            text-decoration: none; /* Remove sublinhado do link */
            padding: 10px; /* Espaçamento interno para os links */
            border: 2px solid orangered; /* Borda para os links */
            border-radius: 5px; /* Arredondamento dos cantos */
            margin: 10px 0; /* Margem entre os links */
            transition: background-color 0.3s; /* Efeito de transição */
        }

        a:hover {
            background-color: orangered; /* Cor de fundo ao passar o mouse */
        }

        button {
            background-color: white;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: black; /* Cor do botão ao passar o mouse */
            color: white;
        }

        @media (max-width: 600px) {
            button {
                font-size: 14px; /* Tamanho da fonte reduzido em telas menores */
                padding: 8px 16px; /* Redução do espaçamento em telas menores */
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <table>
        <tr>
            <th>EXERCÍCIOS</th>
        </tr>
        <tr>
            <td>
                <a href='TREINOS_ALUN_A.php?id_aluno=<?php echo $id_aluno; ?>'>TREINO A.[SEGUNDA & QUINTA]</a>
                <a href='TREINOS_ALUN_B.php?id_aluno=<?php echo $id_aluno; ?>'>TREINO B.[QUARTA]</a>
                <a href='TREINOS_ALUN_C.php?id_aluno=<?php echo $id_aluno; ?>'>TREINO C.[TERÇA & SEXTA]</a>
                <a href='TREINOS_ALUN_S.php?id_aluno=<?php echo $id_aluno; ?>'>TREINO S.[SÁBADO]</a>
            </td>
        </tr>
    </table>
    <a href='MENU_ALUNO.php?id_aluno=<?php echo $id_aluno; ?>'><button type='button'>VOLTAR</button></a>
</div>

</body>
</html>
