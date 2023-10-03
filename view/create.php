<?php include('./layouts/header.php') ?>
<?php include('../controller/clientController.php') ?>

<?php

$clientController = new clientController();
$clientController->create();

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Cadastro de Cliente</h2>
            <form action="create.php" method="POST">
                <div class="form-group my-4">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control my-2" id="name" placeholder="Digite seu nome" name="name" required>
                </div>
                <div class="form-group my-4">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control my-2" id="email" placeholder="Digite seu email" name="email" required>
                </div>
                <div class="form-group my-4">
                    <label for="phone">Telefone:</label>
                    <input type="tel" class="form-control my-2" id="phone" placeholder="Digite seu telefone" name="phone" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
            </form>
        </div>
    </div>
</div>


<?php include('./layouts/footer.php') ?>