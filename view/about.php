<?php include('./layouts/header.php') ?>

<!-- Formulário de Cadastro -->
<div class="container mt-5">
    <h2>Cadastro de Cliente</h2>
    <form>
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" placeholder="Digite seu nome" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Digite seu email" name="email">
        </div>
        <div class="form-group">
            <label for="phone">Telefone:</label>
            <input type="tel" class="form-control" id="phone" placeholder="Digite seu telefone" name="phone">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

<?php include('./layouts/footer.php') ?>