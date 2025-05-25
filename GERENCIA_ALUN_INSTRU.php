<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitty - Gerenciamento de Alunos</title>

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
            max-width: 900px;
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

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: black;
            color: white;
        }

        .action-row {
            display: none;
        }

        button {
            background-color: black;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 5px;
        }

        button:hover {
            background-color: gray;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        /* Modal styling */
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
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 300px;
            text-align: center;
        }

        .modal input {
            width: calc(100% - 20px);
            padding: 8px;
            margin: 10px 0;
            border: 1px solid black;
            border-radius: 5px;
        }

        .modal .modal-button {
            width: 48%;
            padding: 6px 10px;
            margin: 5px;
        }

        @media (max-width: 768px) {
            td,
            th {
                font-size: 14px;
                padding: 8px;
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
        <?php
        include 'conexao.php';

        $sql = "SELECT id_aluno, UPPER(nome) AS nome, UPPER(sobrenome) AS sobrenome, UPPER(sexo) AS sexo, UPPER(nivel) AS nivel, UPPER(observacoes) AS observacoes  FROM aluno ORDER BY nome, sobrenome";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Sexo</th>
                    <th>Nível</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                $id = $row['id_aluno'];
                echo "<tr onclick='toggleActions($id)'>
                         <td>{$row['nome']}</td>
                        <td>{$row['sobrenome']}</td>
                        <td>{$row['sexo']}</td>
                        <td>{$row['nivel']}</td>
                        
                      </tr>";
                echo "<tr class='action-row' id='actions-$id'>
                        <td colspan='5'>
                            <a href='medidas_instrutor.php?id_aluno=$id'><button>MEDIDAS</button></a>
                            <a href='CADASTRO_MEDIDAS_INSTRU.php?id_aluno=$id'><button>ADD MEDIDAS</button></a>
                            <a href='observacoes.php?id_aluno=$id'><button>OBSERVAÇÕES</button></a>
                            <a href='medida_delete.php?id_aluno=$id' onclick='return confirmDelete();'><button>EXCLUIR MEDIDAS</button></a>
                            <a href='MENU_ADD_TREINO.php?id_aluno=$id'><button>ADD TREINO</button></a>
                            <a href='treino_delet_all.php?id_aluno=$id' onclick='return confirmDelete();'><button>EXCLUIR TREINO</button></a>
                            <a href='delete.php?id_aluno=$id' onclick='return confirmDelete();'><button>EXCLUIR ALUNO</button></a>
                            <button onclick='openPasswordModal($id)'>ALTERAR SENHA</button>
                        </td>
                      </tr>";
            }

            echo "</table>";

            echo "<div class='button-container'>";
            echo "<a href='CADASTRO_ALUN.html'><button>ADICIONAR ALUNO</button></a>";
            echo "<a href='MENU_INSTRUTOR.php?id_aluno=999'><button>VOLTAR MENU</button></a>";
            echo "</div>";
        } else {
            echo "<p>Nenhum resultado encontrado.</p>";
        }

        $conn->close();
        ?>

        <!-- Modal para Alterar Senha -->
        <div class="modal" id="passwordModal">
            <div class="modal-content">
                <h3>Alterar Senha</h3>
                <input type="password" id="newPassword" placeholder="Nova senha">
                <input type="password" id="confirmPassword" placeholder="Confirmar senha">
                <button class="modal-button" onclick="submitPasswordChange()">Confirmar Alteração</button>
                <button class="modal-button" onclick="closePasswordModal()">Cancelar</button>
            </div>
        </div>

        <script>
            let currentUserId = null;

            function toggleActions(id) {
                const actionRow = document.getElementById(`actions-${id}`);
                const isVisible = actionRow.style.display === 'table-row';

                document.querySelectorAll('.action-row').forEach(row => {
                    row.style.display = 'none';
                });

                if (!isVisible) {
                    actionRow.style.display = 'table-row';
                }
            }

            function confirmDelete() {
                return confirm("Tem certeza que deseja excluir este item?");
            }

            function openPasswordModal(id) {
                currentUserId = id;
                document.getElementById('passwordModal').style.display = 'flex';
            }

            function closePasswordModal() {
                document.getElementById('passwordModal').style.display = 'none';
                currentUserId = null;
            }

            function submitPasswordChange() {
                const newPassword = document.getElementById('newPassword').value;
                const confirmPassword = document.getElementById('confirmPassword').value;

                if (newPassword === confirmPassword) {
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "update_password.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            alert(xhr.responseText);
                            closePasswordModal();
                        } else {
                            alert("Erro ao atualizar a senha. Tente novamente.");
                        }
                    };
                    xhr.send("id_aluno=" + currentUserId + "&new_password=" + newPassword);
                } else {
                    alert("As senhas não coincidem. Tente novamente.");
                }
            }
        </script>
    </div>
</body>

</html>
