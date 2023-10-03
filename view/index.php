<?php include('./layouts/header.php') ?>
<?php include('../controller/clientController.php') ?>

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
            $clients = $clientController->select();
            foreach ($clients as $data) : ?>
                <tr>
                    <td><?= $data['id']; ?></td>
                    <td><?= $data['name']; ?></td>
                    <td><?= $data['email']; ?></td>
                    <td><?= $data['phone']; ?></td>
                    <td>
                        <a href="./edit.php?id=<?= $data['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                        <a href="./remove.php?id=<?= $data['id']; ?>" class="btn btn-danger btn-sm">Remover</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="./create.php" class="btn btn-success">Criar Novo</a>
</div>

<?php include('./layouts/footer.php') ?>