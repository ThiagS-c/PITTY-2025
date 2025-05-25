<?php
include 'conexao.php';

// Buscar dados da tabela origem
$sql = "SELECT * FROM `exercicios` ORDER BY `exercicios`.`id_exercicio` DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Selecionar exercicios</title>
    <style>
        table { border-collapse: collapse; width: 10%; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        tr:hover { background-color: #f5f5f5; }
    </style>
</head>
<body>
    <form action="adicionar.php" method="post">
        <table>
            <tr>
                <th>Selecionar</th>
                <th>Nome</th>
                </tr>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td>
                    <input type="checkbox" name="itens_selecionados[]" 
                           value="<?php echo $row['id_exercicio']; ?>">
                </td>
                    <td><?php echo $row['nome_exercicio']; ?></td>
                
            </tr>
            <?php endwhile; ?>
        </table>
        <button type="submit">Adicionar Selecionados</button>
    </form>
</body>
</html>

<?php
mysqli_close($conn);
?>