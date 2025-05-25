<?php
include 'conexao.php';
$id_aluno = $_GET['id_aluno'];

$sql = "SELECT * FROM exercicios;";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Gerenciamento de Exercícios</title>
    <style>
        /* Existing styles */
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
            width: 95%;
            max-width: 800px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }

        th, td {
            border: 2px solid black;
            padding: 10px;
            text-align: center;
            cursor: pointer;
        }

        th {
            background-color: black;
            color: white;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        button {
            background-color: black;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        button:hover {
            background-color: gray;
        }

        /* Modal styles */
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

        @media (max-width: 600px) {
            th, td {
                font-size: 14px;
                padding: 8px;
            }

            button {
                width: 100%;
                padding: 10px;
                margin-top: 10px;
            }

            .button-container {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Lista de Exercícios</h1>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Exercício</th><th>Ação</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr onclick='openModal({$row['id_exercicio']})'>
                    <td>{$row['id_exercicio']}</td>
                    <td>{$row['nome_exercicio']}</td>
                    <td>
                        <a href='DELETE_EXERCI_INSTRU.php?id_exercicio={$row['id_exercicio']}' onclick='return confirmDelete();'>
                            <button type='button'>Excluir</button>
                        </a>
                    </td>
                  </tr>";
        }
        echo "</table>";

        echo "<div class='button-container'>
                <a href='GERENCIA_EXERC_INSTRU.php?id_aluno={$id_aluno}'><button type='button'>Adicionar Exercício</button></a>
                <a href='GERENCIA_EXERC_INSTRU.php?id_aluno={$id_aluno}'><button type='button'>Voltar</button></a>
              </div>";
    } else {
        echo "<p>Nenhum exercício encontrado.</p>";
    }

    $conn->close();
    ?>

    <!-- Modal Structure -->
    <div id="exerciseModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <img id="exerciseImage" src="" alt="Exercício">
        </div>
    </div>

    <script>
        // Function to confirm deletion
        function confirmDelete() {
            return confirm("Tem certeza que deseja excluir este exercício?");
        }

        // Function to open the modal and load the image
        function openModal(id) {
            const modal = document.getElementById("exerciseModal");
            const image = document.getElementById("exerciseImage");
            image.src = `imagens/${id}.JPG`; // Updated path for the image
            modal.style.display = "flex";
        }

        // Function to close the modal
        function closeModal() {
            const modal = document.getElementById("exerciseModal");
            modal.style.display = "none";
        }

        // Close modal when clicking outside the modal content
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
