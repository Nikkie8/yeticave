<?php
    $is_auth = $user_registered ? true : false;
?>
<section class="lot-item container">
        <h2><?= $lot['name']; ?></h2>
    <div class="lot-item__content">
        <div class="lot-item__left">
            <div class="lot-item__image">
                <img src="<?= $lot['image']; ?>" width="730" height="548" alt="<?= $lot['name']; ?>">
            </div>
            <p class="lot-item__category">Категория: <span><?= $lot['category']; ?></span></p>
            <p class="lot-item__description"><?= $lot['description']; ?></p>
        </div>
        <div class="lot-item__right">
            <div class="lot-item__state">
                <div class="lot-item__timer timer">
                    <?= get_timer($lot['end_date']); ?>
                </div>
                <div class="lot-item__cost-state">
                    <div class="lot-item__rate">
                        <span class="lot-item__amount">Текущая цена</span>
                        <span class="lot-item__cost"><?= $lot['price']; ?></span>
                    </div>
                    <div class="lot-item__min-cost">
                        Мин. ставка <span><?= $lot['price'] + $lot['rate_step']; ?> р</span>
                    </div>
                </div>
                <form class="lot-item__form <?php if (isset($errors)) { print('form--invalid'); } ?> <?php if ($lot['is-bet'] || get_timer($lot['end_date']) == '00:00' || !$is_auth) { print('visually-hidden'); } ?>" action="lot.php" method="post">
                    <p class="lot-item__form-item <?php if (isset($errors['cost'])) { print('lot-item__form-item--invalid'); } ?>">
                        <label for="cost">Ваша ставка</label>
                        <input id="cost" type="number" name="cost" placeholder="<?= $lot['price'] + $lot['rate_step']; ?>">
                    </p>
                    <input type="hidden" name="lot-id" value="<?= $lot['id']; ?>">
                    <button type="submit" class="button">Сделать ставку</button>
                </form>
            </div>
            <div class="history">
                <h3>История ставок (<span><?= count($bets); ?></span>)</h3>
                <table class="history__list">
                    <?php foreach ($bets as $key => $bet): ?>
                        <tr class="history__item">
                            <td class="history__name"><?= $bet['user_name']; ?></td>
                            <td class="history__price"><?= $bet['price']; ?> р</td>
                            <td class="history__time"><?= format_time($bet['date']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</section>