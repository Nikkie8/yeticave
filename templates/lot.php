<?php

// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

function format_time($time) {
    $now = strtotime('now');
    $time_passed = $now - $time;
    $hours = $time_passed / 3600;

    if ($hours < 1) {
        $format = 'i минут назад';
        $time_stamp = $time_passed;
    } elseif ($hours >= 1 and $hours < 24) {
        $format = 'H часов назад';
        $time_stamp = $time_passed;
    } else {
        $format = 'd.m.y в H:i';
        $time_stamp = $time;
    }

    $formatted_time = date($format, $time_stamp);

    return $formatted_time;
}
?>
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
    <?php if (isset($item)): ?>
        <h2><?=$item['title']; ?></h2>
        <div class="lot-item__content">
            <div class="lot-item__left">
                <div class="lot-item__image">
                    <img src="<?=$item['image']; ?>" width="730" height="548" alt="Сноуборд">
                </div>
                <p class="lot-item__category">Категория: <span><?=$item['category']; ?></span></p>
                <p class="lot-item__description">Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив
                                                     снег
                                                     мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот
                                                     снаряд
                                                     отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом
                                                     кэмбер
                                                     позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,
                                                     просто
                                                     посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла
                                                     равнодушным.</p>
            </div>
            <div class="lot-item__right">
                <div class="lot-item__state">
                    <div class="lot-item__timer timer">
                        10:54:12
                    </div>
                    <div class="lot-item__cost-state">
                        <div class="lot-item__rate">
                            <span class="lot-item__amount">Текущая цена</span>
                            <span class="lot-item__cost">11 500</span>
                        </div>
                        <div class="lot-item__min-cost">
                            Мин. ставка <span><?=$item['price']; ?> р</span>
                        </div>
                    </div>
                    <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
                        <p class="lot-item__form-item">
                            <label for="cost">Ваша ставка</label>
                            <input id="cost" type="number" name="cost" placeholder="12 000">
                        </p>
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
    <?php else: ?>
        <h2>Лот с этим ID не найден</h2>
    <?php endif; ?>
</section>