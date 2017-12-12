<?php
    $form_validation_class = isset($errors) ? 'form--invalid' : '';
    $item_not_valid_class = 'form__item--invalid';
    $email_validation_class = isset($errors['email']) ? $item_not_valid_class : '';
    $email_error_message = isset($errors['email']) ? $errors['email'] : '';
    $password_validation_class = isset($errors['password']) ? $item_not_valid_class : '';
    $password_error_message = isset($errors['password']) ? $errors['password'] : '';
    $name_validation_class = isset($errors['name']) ? $item_not_valid_class : '';
    $name_error_message = isset($errors['name']) ? $errors['name'] : '';
    $contacts_validation_class = isset($errors['contacts']) ? $item_not_valid_class : '';
    $contacts_error_message = isset($errors['contacts']) ? $errors['contacts'] : '';
    $user_email = isset($user_data['email']) ? htmlspecialchars($user_data['email']) : '';
    $user_name = isset($user_data['name']) ? htmlspecialchars($user_data['name']) : '';
    $user_contacts = isset($user_data['contacts']) ? htmlspecialchars($user_data['contacts']) : '';
?>
<form class="form <?= $form_validation_class; ?> container" action="signup.php" method="post" enctype="multipart/form-data">
    <h2>Регистрация нового аккаунта</h2>
    <div class="form__item <?= $email_validation_class; ?>">
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?= $user_email ?>">
        <span class="form__error"><?= $email_error_message ?></span>
    </div>
    <div class="form__item <?= $password_validation_class; ?>">
        <label for="password">Пароль*</label>
        <input id="password" type="password" name="password" placeholder="Введите пароль">
        <span class="form__error"><?= $password_error_message; ?></span>
    </div>
    <div class="form__item <?= $name_validation_class; ?>">
        <label for="name">Имя*</label>
        <input id="name" type="text" name="name" placeholder="Введите имя" value="<?= $user_name; ?>">
        <span class="form__error"><?= $name_error_message; ?></span>
    </div>
    <div class="form__item <?= $contacts_validation_class; ?>">
        <label for="contacts">Контактные данные*</label>
        <textarea id="contacts" name="contacts" placeholder="Напишите как с вами связаться"><?= $user_contacts; ?></textarea>
        <span class="form__error"><?= $contacts_error_message; ?></span>
    </div>
    <div class="form__item form__item--file form__item--last">
        <label>Аватар</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="img/avatar.jpg" width="113" height="113" alt="Ваш аватар">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" name="avatar" type="file" id="photo2" value="">
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
        </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Зарегистрироваться</button>
    <a class="text-link" href="login.php">Уже есть аккаунт</a>
</form>