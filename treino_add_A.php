<?php
include 'conexao.php';

$id_aluno = $_GET['id_aluno'];

$sql_check = "SELECT id_aluno FROM aluno WHERE id_aluno = '$id_aluno'";
$result_check = $conn->query($sql_check);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Adicionar Treino</title>
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

        p {
            margin: 20px 0;
            font-size: 18px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        button {
            background-color: white;
            color: black;
            border: 2px solid orangered;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }

        button:hover {
            background-color: brown;
            color: white;
            border-color: brown;
        }

        @media (max-width: 768px) {
            button {
                font-size: 14px;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <?php if ($result_check->num_rows == 0): ?>
        <h1>Erro</h1>
        <p>O ID do aluno não existe na tabela de alunos!</p>
    <?php else:
        $sql = "INSERT INTO treinos (id_aluno, id_exercicio, series, repeticoes, ordem, classe_treino)
                VALUE
                ('$id_aluno',1,'4','10',1,'A'),
                ('$id_aluno',79,'4','10',2,'A'),
                ('$id_aluno',4,'4','10',3,'A'),
                ('$id_aluno',10,'4','10',4,'A'),
                ('$id_aluno',12,'4','10',5,'A'),
                ('$id_aluno',13,'4','10',6,'A'),
                ('$id_aluno',40,'4','10',7,'A'),
                ('$id_aluno',47,'-','10/15Min',0,'A'),
                ('$id_aluno',21,'4','15',1,'F'),
                ('$id_aluno',20,'2','10',2,'F'),
                ('$id_aluno',19,'4','10',3,'F'),
                ('$id_aluno',23,'4','10',4,'F'),
                ('$id_aluno',24,'4','20',5,'F'),
                ('$id_aluno',25,'4','20',6,'F'),
                ('$id_aluno',30,'4','20',7,'F'),
                ('$id_aluno',163,'4','15',8,'F'),
                ('$id_aluno',47,'-','10/15Min',0,'F'),
                ('$id_aluno',66,'4','10',1,'B'),
                ('$id_aluno',67,'4','10',2,'B'),
                ('$id_aluno',69,'4','10',3,'B'),
                ('$id_aluno',31,'4','10',4,'B'),
                ('$id_aluno',164,'4','10',5,'B'),
                ('$id_aluno',34,'4','10',6,'B'),
                ('$id_aluno',47,'-','10/15Min',0,'B'),
                ('$id_aluno',78,'-','-',1,'S'),
                ('$id_aluno',60,'-','-',2,'S'),
                ('$id_aluno',47,'-','10/15Min',0,'S');";

        if ($conn->query($sql) === TRUE): ?>
            <h1>Treino Adicionado</h1>
            <p>O treino foi adicionado com sucesso!</p>
        <?php else: ?>
            <h1>Erro</h1>
            <p>Erro ao adicionar treino: <?php echo $conn->error; ?></p>
        <?php endif;
    endif;
    $conn->close();
    ?>

    <div class="button-container">
        <a href='GERENCIA_ALUN_INSTRU.php?id_aluno=999'>
            <button type='button'>VOLTAR</button>
        </a>
    </div>
</div>

</body>
</html>
