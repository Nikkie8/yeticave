<?php
    $form_validation_class = isset($errors) ? 'form--invalid' : '';
    $item_not_valid_class = 'form__item--invalid';
    $lot_name_validation_class = isset($errors['lot-name']) ? $item_not_valid_class : '';
    $category_validation_class = isset($errors['category']) ? $item_not_valid_class : '';
    $message_validation_class = isset($errors['message']) ? $item_not_valid_class : '';
    $lot_rate_validation_class = isset($errors['lot-rate']) ? $item_not_valid_class : '';
    $image_validation_class = isset($errors['image']) ? $item_not_valid_class : '';
    $lot_step_validation_class = isset($errors['lot-step']) ? $item_not_valid_class : '';
    $lot_date_validation_class = isset($errors['lot-date']) ? $item_not_valid_class : '';
?>
<form class="form form--add-lot container <?= $form_validation_class; ?>" action="add.php" method="post" enctype="multipart/form-data">
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <div class="form__item <?= $lot_name_validation_class; ?>">
            <label for="lot-name">Наименование</label>
            <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?= $lot['lot-name']; ?>">
            <span class="form__error"><?= $errors['lot-name']; ?></span>
        </div>
        <div class="form__item <?= $category_validation_class; ?>">
            <label for="category">Категория</label>
            <select id="category" name="category" value="<?= $lot['category']; ?>">
                <option>Выберите категорию</option>
                <?php foreach ($categories as $key => $category): ?>
                    <option <?php if ($lot['category'] == $category['name']) { print('selected'); } ?>>
                        <?= $category['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <span class="form__error"><?= $errors['category']; ?></span>
        </div>
    </div>
    <div class="form__item form__item--wide <?= $message_validation_class; ?>">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота"><?= $lot['message']; ?></textarea>
        <span class="form__error"><?= $errors['message']; ?></span>
    </div>
    <div class="form__item <?= $image_validation_class; ?> form__item--file"> <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="<?= $lot['image']; ?>" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" name="image" type="file" id="photo2" value="">
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
        </div>
        <span class="form__error"><?= $errors['image']; ?></span>
    </div>
    <div class="form__container-three">
        <div class="form__item form__item--small <?= $lot_rate_validation_class; ?>">
            <label for="lot-rate">Начальная цена</label>
            <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?= $lot['lot-rate']; ?>">
            <span class="form__error"><?= $errors['lot-rate']; ?></span>
        </div>
        <div class="form__item form__item--small <?= $lot_step_validation_class; ?>">
            <label for="lot-step">Шаг ставки</label>
            <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?= $lot['lot-step']; ?>">
            <span class="form__error"><?= $errors['lot-step']; ?></span>
        </div>
        <div class="form__item <?= $lot_date_validation_class; ?>">
            <label for="lot-date">Дата окончания торгов</label>
            <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?= $lot['lot-date']; ?>">
            <span class="form__error"><?= $errors['lot-date']; ?></span>
        </div>
    </div>
    <button type="submit" class="button">Добавить лот</button>
</form>
