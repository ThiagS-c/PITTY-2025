<?php
$id_aluno = $_GET['id_aluno'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAPA PITTY</title>
    <style>
        body {
            background-color: orangered;
            color: black;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .btn {
            background-color: white;
            color: orangered;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 20px;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block; /* Permite que o botão tenha largura proporcional ao texto */
            text-align: center; /* Centraliza o texto dentro do botão */
        }

        .btn:hover {
            background-color: #f0f0f0;
            color: orangered;
        }

        img {
            max-width: 90%; /* Limita a largura máxima da imagem */
            height: auto;   /* Mantém a proporção da imagem */
            border-radius: 10px; /* Borda arredondada para a imagem */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra para efeito visual */
        }

        @media (max-width: 768px) {
            .btn {
                font-size: 14px; /* Reduz o tamanho da fonte em telas pequenas */
            }
        }
    </style>
</head>
<body>
    <a href='MENU_INSTRUTOR.php?id_aluno=<?php echo $id_aluno; ?>' class="btn">VOLTAR</a>
    <img src="mpapitty.jpeg" alt="Descrição da imagem" class="center">
</body>
</html>
