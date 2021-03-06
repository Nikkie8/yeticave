<?php
    $form_validation_class = isset($errors) ? 'form--invalid' : '';
    $item_not_valid_class = 'form__item--invalid';
    $email_validation_class = isset($errors['email']) ? $item_not_valid_class : '';
    $email_error_message = isset($errors['email']) ? $errors['email'] : '';
    $password_validation_class = isset($errors['password']) ? $item_not_valid_class : '';
    $password_error_message = isset($errors['password']) ? $errors['password'] : '';
?>
<form class="form <?= $form_validation_class; ?> container" action="login.php" method="post">
    <h2>Вход</h2>
    <div class="form__item <?= $email_validation_class; ?>">
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?= htmlspecialchars($user_email); ?>">
        <span class="form__error"><?= $email_error_message; ?></span>
    </div>
    <div class="form__item <?= $password_validation_class; ?> form__item--last">
        <label for="password">Пароль*</label>
        <input id="password" type="password" name="password" placeholder="Введите пароль">
        <span class="form__error"><?= $password_error_message; ?></span>
    </div>
    <button type="submit" class="button">Войти</button>
</form>
