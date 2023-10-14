<?php include(__DIR__ . '/./layouts/header.php') ?>
<?php include(__DIR__ . '/../controller/clientController.php') ?>

<div class="container mt-5">
    <h2 class="text-center">Registros de Clientes</h2>
    <table class="table table-bordered table-hover custom-table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $clientController = new clientController();
            $clientController->delete();
            $clients = $clientController->select();
            foreach ($clients as $data) : ?>
                <tr>
                    <td><?= $data['id']; ?></td>
                    <td><?= $data['name']; ?></td>
                    <td><?= $data['email']; ?></td>
                    <td><?= $data['phone']; ?></td>
                    <td>
                        <a href="./edit.php?id=<?= $data['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                        <form action="?a=remover" method="POST" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
                            <button type="submit" name="delete" class="btn btn-danger btn-sm">Remover</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="./create.php" class="btn btn-success">Criar Novo</a>
</div>

<?php include(__DIR__ . '/./layouts/footer.php') ?>