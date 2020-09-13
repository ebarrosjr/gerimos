<?php
if(isset($validation)) {
?>
<div class="notification is-danger">
    <button class="delete"></button>
    <?=$validation->listErrors()?>
</div>
<?php
}
?>

<form action="/users/new" method="post">
    <label for="nome">CPF</label>
    <input type="text" name="cpf" value="<?= set_value('cpf')?>">
    <label for="nome">Nome</label>
    <input type="text" name="nome" value="<?= set_value('nome')?>">
    <label for="email">E-mail</label>
    <input type="text" name="email" value="<?= set_value('email')?>">
    <label for="password">Senha</label>
    <input type="text" name="password">
    <label for="confirm_password">Confirme a senha</label>
    <input type="text" name="confirm_password">
    <button type="submit"> gravar </button>
</form>