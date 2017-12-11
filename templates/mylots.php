<section class="rates container">
    <h2>Мои ставки</h2>
    <table class="rates__list">
        <?php foreach ($bets as $key => $bet): ?>
            <tr class="rates__item">
                <td class="rates__info">
                    <div class="rates__img">
                        <img src="<?= $bet['lot_image']; ?>" width="54" height="40" alt="<?= $bet['lot_name']; ?>">
                    </div>
                    <h3 class="rates__title"><a href="lot.php?lot_id=<?= $bet['lot_id'] ?>"><?= $bet['lot_name']; ?></a></h3>
                </td>
                <td class="rates__category">
                    <?= $bet['lot_category']; ?>
                </td>
                <td class="rates__timer">
                    <div class="timer timer--finishing"><?= get_timer($bet['lot_end_date']); ?></div>
                </td>
                <td class="rates__price">
                    <?= $bet['price']; ?> р
                </td>
                <td class="rates__time">
                    <?= format_time($bet['date']); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>