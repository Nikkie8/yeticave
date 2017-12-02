<nav class="nav">
    <ul class="nav__list container">
        <li class="nav__item">
            <a href="">Доски и лыжи</a>
        </li>
        <li class="nav__item">
            <a href="">Крепления</a>
        </li>
        <li class="nav__item">
            <a href="">Ботинки</a>
        </li>
        <li class="nav__item">
            <a href="">Одежда</a>
        </li>
        <li class="nav__item">
            <a href="">Инструменты</a>
        </li>
        <li class="nav__item">
            <a href="">Разное</a>
        </li>
    </ul>
</nav>
<section class="lot-item container">
        <h2><?=$item['lot-name']; ?></h2>
    <div class="lot-item__content">
        <div class="lot-item__left">
            <div class="lot-item__image">
                <img src="<?=$item['image']; ?>" width="730" height="548" alt="<?=$item['lot-name']; ?>">
            </div>
            <p class="lot-item__category">Категория: <span><?=$item['category']; ?></span></p>
            <p class="lot-item__description"><?=$item['message']; ?></p>
        </div>
        <div class="lot-item__right">
            <div class="lot-item__state">
                <div class="lot-item__timer timer">
                    10:54:12
                </div>
                <div class="lot-item__cost-state">
                    <div class="lot-item__rate">
                        <span class="lot-item__amount">Текущая цена</span>
                        <span class="lot-item__cost"><?=$item['lot-rate']; ?></span>
                    </div>
                    <div class="lot-item__min-cost">
                        Мин. ставка <span><?=$item['lot-rate'] + $item['lot-step']; ?> р</span>
                    </div>
                </div>
                <form class="lot-item__form" action="lot.php" method="post">
                    <p class="lot-item__form-item">
                        <label for="cost">Ваша ставка</label>
                        <input id="cost" type="number" name="cost" placeholder="<?=$item['lot-rate'] + $item['lot-step']; ?>">
                    </p>
                    <input type="hidden" name="lot-id" value="<?=$_GET['lot_id']; ?>">
                    <button type="submit" class="button">Сделать ставку</button>
                </form>
            </div>
            <div class="history">
                <h3>История ставок (<span>4</span>)</h3>
                <table class="history__list">
                    <?php foreach ($bets as $key => $item): ?>
                        <tr class="history__item">
                            <td class="history__name"><?=$item['name']; ?></td>
                            <td class="history__price"><?=$item['price']; ?> р</td>
                            <td class="history__time"><?=format_time($item['ts']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</section>