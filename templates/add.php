<form class="form form--add-lot container <?php if (isset($errors)) { print('form--invalid'); } ?>" action="add.php" method="post" enctype="multipart/form-data">
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <div class="form__item <?php if (isset($errors['lot-name'])) { print('form__item--invalid'); } ?>">
            <label for="lot-name">Наименование</label>
            <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?=$item['lot-name']; ?>">
            <span class="form__error"><?=$errors['lot-name']; ?></span>
        </div>
        <div class="form__item <?php if (isset($errors['category'])) { print('form__item--invalid'); } ?>">
            <label for="category">Категория</label>
            <select id="category" name="category" value="<?=$item['category']; ?>">
                <option>Выберите категорию</option>
                <?php foreach ($categories as $key => $category): ?>
                    <option <?php if ($lot['category'] == $category['name']) { print('selected'); } ?>><?=$category['name']; ?></option>
                <?php endforeach; ?>
            </select>
            <span class="form__error"><?=$errors['category']; ?></span>
        </div>
    </div>
    <div class="form__item form__item--wide <?php if (isset($errors['message'])) { print('form__item--invalid'); } ?>">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота"><?=$item['message']; ?></textarea>
        <span class="form__error"><?=$errors['message']; ?></span>
    </div>
    <div class="form__item <?php if (isset($errors['image'])) { print('form__item--invalid'); } ?> form__item--file"> <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="<?=$errors['image']; ?>" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" name="image" type="file" id="photo2" value="">
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
        </div>
        <span class="form__error"><?=$errors['image']; ?></span>
    </div>
    <div class="form__container-three">
        <div class="form__item form__item--small <?php if (isset($errors['lot-rate'])) { print('form__item--invalid'); } ?>">
            <label for="lot-rate">Начальная цена</label>
            <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?=$item['lot-rate']; ?>">
            <span class="form__error"><?=$errors['lot-rate']; ?></span>
        </div>
        <div class="form__item form__item--small <?php if (isset($errors['lot-step'])) { print('form__item--invalid'); } ?>">
            <label for="lot-step">Шаг ставки</label>
            <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?=$item['lot-step']; ?>">
            <span class="form__error"><?=$errors['lot-step']; ?></span>
        </div>
        <div class="form__item <?php if (isset($errors['lot-date'])) { print('form__item--invalid'); } ?>">
            <label for="lot-date">Дата окончания торгов</label>
            <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?=$item['lot-date']; ?>">
            <span class="form__error"><?=$errors['lot-date']; ?></span>
        </div>
    </div>
    <button type="submit" class="button">Добавить лот</button>
</form>
