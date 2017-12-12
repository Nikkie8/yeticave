<?php
    $form_validation_class = isset($errors) ? 'form--invalid' : '';
    $item_not_valid_class = 'form__item--invalid';
    $lot_name_validation_class = isset($errors['lot-name']) ? $item_not_valid_class : '';
    $lot_name_error_message = isset($errors['lot-name']) ? $errors['lot-name'] : '';
    $category_validation_class = isset($errors['category']) ? $item_not_valid_class : '';
    $category_error_message = isset($errors['category']) ? $errors['category'] : '';
    $message_validation_class = isset($errors['message']) ? $item_not_valid_class : '';
    $message_error_message = isset($errors['message']) ? $errors['message'] : '';
    $lot_rate_validation_class = isset($errors['lot-rate']) ? $item_not_valid_class : '';
    $lot_rate_error_message = isset($errors['lot-rate']) ? $errors['lot-rate'] : '';
    $image_validation_class = isset($errors['image']) ? $item_not_valid_class : '';
    $image_error_message = isset($errors['image']) ? $errors['image'] : '';
    $lot_step_validation_class = isset($errors['lot-step']) ? $item_not_valid_class : '';
    $lot_step_error_message = isset($errors['lot-step']) ? $errors['lot-step'] : '';
    $lot_date_validation_class = isset($errors['lot-date']) ? $item_not_valid_class : '';
    $lot_date_error_message = isset($errors['lot-date']) ? $errors['lot-date'] : '';
    $lot_name = isset($lot['lot-name']) ? htmlspecialchars($lot['lot-name']) : '';
    $lot_category = isset($lot['category']) ? htmlspecialchars($lot['category']) : '';
    $lot_email = isset($lot['']) ? htmlspecialchars($lot['']) : '';
    $lot_message = isset($lot['message']) ? htmlspecialchars($lot['message']) : '';
    $lot_image = isset($lot['image']) ? htmlspecialchars($lot['image']) : '';
    $lot_rate = isset($lot['lot-rate']) ? htmlspecialchars($lot['lot-rate']) : '';
    $lot_step = isset($lot['lot-step']) ? htmlspecialchars($lot['lot-step']) : '';
    $lot_date = isset($lot['lot-date']) ? htmlspecialchars($lot['lot-date']) : '';
?>
<form class="form form--add-lot container <?= $form_validation_class; ?>" action="add.php" method="post" enctype="multipart/form-data">
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <div class="form__item <?= $lot_name_validation_class; ?>">
            <label for="lot-name">Наименование</label>
            <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?= $lot_name; ?>">
            <span class="form__error"><?= $lot_name_error_message; ?></span>
        </div>
        <div class="form__item <?= $category_validation_class; ?>">
            <label for="category">Категория</label>
            <select id="category" name="category">
                <option>Выберите категорию</option>
                <?php foreach ($categories as $key => $category): ?>
                    <option <?php if ($lot_category === $category['name']) { print('selected'); } ?>>
                        <?= htmlspecialchars($category['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <span class="form__error"><?= $category_error_message; ?></span>
        </div>
    </div>
    <div class="form__item form__item--wide <?= $message_validation_class; ?>">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота"><?= $lot_message; ?></textarea>
        <span class="form__error"><?= $message_error_message; ?></span>
    </div>
    <div class="form__item <?= $image_validation_class; ?> form__item--file"> <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="<?= $lot_image; ?>" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" name="image" type="file" id="photo2" value="">
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
        </div>
        <span class="form__error"><?= $image_error_message; ?></span>
    </div>
    <div class="form__container-three">
        <div class="form__item form__item--small <?= $lot_rate_validation_class; ?>">
            <label for="lot-rate">Начальная цена</label>
            <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?= $lot_rate; ?>">
            <span class="form__error"><?= $lot_rate_error_message; ?></span>
        </div>
        <div class="form__item form__item--small <?= $lot_step_validation_class; ?>">
            <label for="lot-step">Шаг ставки</label>
            <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?= $lot_step; ?>">
            <span class="form__error"><?= $lot_step_error_message; ?></span>
        </div>
        <div class="form__item <?= $lot_date_validation_class; ?>">
            <label for="lot-date">Дата окончания торгов</label>
            <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?= $lot_date; ?>">
            <span class="form__error"><?= $lot_date_error_message; ?></span>
        </div>
    </div>
    <button type="submit" class="button">Добавить лот</button>
</form>
