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
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .container {
            width: 100%;
            max-width: 800px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 3px solid black;
            padding: 10px;
            text-align: center;
            cursor: pointer;
        }

        th {
            background-color: black;
            color: white;
        }

        button {
            background-color: black;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: gray;
        }

        .card {
            display: none;
            background-color: white;
            border: 2px solid black;
            border-radius: 10px;
            padding: 15px;
            margin: 10px 0;
            text-align: left;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            cursor: pointer; /* Adiciona cursor de pointer para indicar interatividade */
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            position: relative;
            max-width: 90%;
            max-height: 90%;
            overflow: hidden;
        }

        .modal-content img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
            color: black;
        }

        @media (max-width: 768px) {
            table {
                display: none;
            }

            .card {
                display: block;
            }
        }

        @media (max-width: 480px) {
            button {
                width: 100%;
                margin-top: 5px;
            }
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Treinos do Aluno</h1>

    <?php
    include 'conexao.php';
    $id_aluno = $_GET['id_aluno'];

    $sql = "SELECT
        treinos.id_aluno,
        treinos.id_exercicio,
        exercicios.nome_exercicio AS EXERCICIO,
        treinos.series AS SERIES,
        treinos.repeticoes AS REPETICOES
    FROM treinos
    JOIN exercicios
    ON treinos.id_exercicio = exercicios.id_exercicio AND treinos.classe_treino = 's' AND treinos.id_aluno = $id_aluno
    JOIN aluno
    ON treinos.id_aluno = aluno.id_aluno
    ORDER BY treinos.ordem ASC";  
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table id='treinosTable'>";
        echo "<tr>
                <th>EXERCICIO</th>
                <th>SERIES</th>
                <th>REPETIÇÕES</th>
              </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr onclick='openModal({$row['id_exercicio']})'>
                    <td>{$row['EXERCICIO']}</td>
                    <td>{$row['SERIES']}</td>
                    <td>{$row['REPETICOES']}</td>
                  </tr>";

            echo "<div class='card' onclick='openModal({$row['id_exercicio']})'> <!-- Adicionado onclick aqui -->
                    <h3>{$row['EXERCICIO']}</h3>
                    <p><strong>Séries:</strong> {$row['SERIES']}</p>
                    <p><strong>Repetições:</strong> {$row['REPETICOES']}</p>
                  </div>";
        }
        echo "</table>";
    } else {
        echo "<p>SEM TREINO S</p>";
    }

    $conn->close();
    ?>

    <a href='MENU_TREINO_ALUN.php?id_aluno=<?= $id_aluno ?>'><button>VOLTAR</button></a>

    <!-- Modal Structure -->
    <div id="exerciseModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <img id="exerciseImage" src="" alt="Exercício">
        </div>
    </div>

    <script>
        // Função para abrir o modal e carregar a imagem
        function openModal(id) {
            const modal = document.getElementById("exerciseModal");
            const image = document.getElementById("exerciseImage");
            image.src = `imagens/${id}.JPG`; // Caminho atualizado para a imagem
            modal.style.display = "flex";
        }

        // Função para fechar o modal
        function closeModal() {
            const modal = document.getElementById("exerciseModal");
            modal.style.display = "none";
        }

        // Fechar modal ao clicar fora do conteúdo do modal
        window.onclick = function(event) {
            const modal = document.getElementById("exerciseModal");
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>
</div>

</body>

</html>
