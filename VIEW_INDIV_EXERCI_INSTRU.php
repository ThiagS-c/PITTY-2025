<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Exercícios</title>
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
            color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid black;
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
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 5px;
        }

        button:hover {
            background-color: gray;
        }

        .action-buttons a {
            text-decoration: none;
            margin: 5px;
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
            th, td {
                font-size: 14px;
                padding: 8px;
            }

            .action-buttons {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
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
    <h1>Lista de Exercícios</h1>

    <?php
    include 'conexao.php';
    $id_exerc = $_GET['id_exerc'];

    $sql = "SELECT * FROM exercicios WHERE id_categoria = $id_exerc";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>EXERCÍCIO</th><th>AÇÃO</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr onclick='openModal({$row['id_exercicio']})'>
                    <td>{$row['id_exercicio']}</td>
                    <td>{$row['nome_exercicio']}</td>
                    <td class='action-buttons'>
                        <a href='DELETE_EXERCI_INSTRU.php?id_exercicio={$row['id_exercicio']}' onclick='return confirmDelete();'>
                            <button>EXCLUIR</button>
                        </a>
                    </td>
                  </tr>";
        }
        echo "</table>";

        echo "<a href='GERENCIA_EXERC_INSTRU.php?id_aluno=999'><button>ADICIONAR EXERCÍCIOS</button></a>";
        echo "<br><br><a href='GERENCIA_EXERC_INSTRU.php?id_aluno=999'><button>VOLTAR</button></a>";
    } else {
        echo "<p>0 resultados</p>";
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
        // Função para exibir um diálogo de confirmação antes de excluir
        function confirmDelete() {
            return confirm("Tem certeza que deseja excluir este exercício?");
        }

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
