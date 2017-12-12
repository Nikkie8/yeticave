<?php
    $is_auth = $user_registered ? true : false;
    $is_owner = $is_auth ? ($lot['owner_id'] === $user_registered['id']) : '';
    $is_finished = strtotime($lot['end_date']) < strtotime('now');
    $is_bet_class = (!$is_auth || $is_owner || $is_bet || $is_finished) ? 'visually-hidden' : '';
    $form_validation_class = isset($errors) ? 'form--invalid' : '';
    $item_not_valid_class = 'lot-item__form-item--invalid';
    $cost_validation_class = isset($errors['cost']) ? $item_not_valid_class : '';
?>
<section class="lot-item container">
        <h2><?= htmlspecialchars($lot['name']); ?></h2>
    <div class="lot-item__content">
        <div class="lot-item__left">
            <div class="lot-item__image">
                <img src="<?= htmlspecialchars($lot['image']); ?>" width="730" height="548" alt="<?= htmlspecialchars($lot['name']); ?>">
            </div>
            <p class="lot-item__category">Категория: <span><?= htmlspecialchars($lot['category']); ?></span></p>
            <p class="lot-item__description"><?= htmlspecialchars($lot['description']); ?></p>
        </div>
        <div class="lot-item__right">
            <div class="lot-item__state">
                <div class="lot-item__timer timer">
                    <?= get_timer($lot['end_date']); ?>
                </div>
                <div class="lot-item__cost-state">
                    <div class="lot-item__rate">
                        <span class="lot-item__amount">Текущая цена</span>
                        <span class="lot-item__cost"><?= htmlspecialchars($lot['price']); ?></span>
                    </div>
                    <div class="lot-item__min-cost">
                        Мин. ставка <span><?= htmlspecialchars($lot['price'] + $lot['rate_step']); ?> р</span>
                    </div>
                </div>
                <form class="lot-item__form <?= $form_validation_class; ?> <?= $is_bet_class; ?>" action="lot.php" method="post">
                    <p class="lot-item__form-item <?= $cost_validation_class; ?>">
                        <label for="cost">Ваша ставка</label>
                        <input id="cost" type="number" name="cost" placeholder="<?= htmlspecialchars($lot['price'] + $lot['rate_step']); ?>">
                    </p>
                    <input type="hidden" name="lot-id" value="<?= htmlspecialchars($lot['id']); ?>">
                    <button type="submit" class="button">Сделать ставку</button>
                </form>
            </div>
            <div class="history">
                <h3>История ставок (<span><?= count($bets); ?></span>)</h3>
                <table class="history__list">
                    <?php foreach ($bets as $key => $bet): ?>
                        <tr class="history__item">
                            <td class="history__name"><?= htmlspecialchars($bet['user_name']); ?></td>
                            <td class="history__price"><?= htmlspecialchars($bet['price']); ?> р</td>
                            <td class="history__time"><?= format_time($bet['date']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</section>