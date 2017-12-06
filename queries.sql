INSERT INTO categories SET name = 'Доски и лыжи', modifier = 'boards';
INSERT INTO categories SET name = 'Крепления', modifier = 'attachment';
INSERT INTO categories SET name = 'Ботинки', modifier = 'boots';
INSERT INTO categories SET name = 'Одежда', modifier = 'clothing';
INSERT INTO categories SET name = 'Инструменты', modifier = 'tools';
INSERT INTO categories SET name = 'Разное', modifier = 'other';

INSERT INTO users SET
  email = 'ignat.v@gmail.com',
  name = 'Игнат',
  password = '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka',
  avatar = 'img/avatar.jpg';
INSERT INTO users SET
  email = 'kitty_93@li.ru',
  name = 'Леночка',
  password = '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa',
  avatar = 'img/user.jpg';
INSERT INTO users SET
  email = 'warrior07@mail.ru',
  name = 'Руслан',
  password = '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW',
  avatar = 'img/user.jpg';

INSERT INTO lots SET
  creation_date = '2017-11-25',
  name = '2014 Rossignol District Snowboard',
  description = 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.',
  image = 'img/lot-1.jpg',
  price = 10999,
  end_date = '2017-12-01',
  rate_step = 500,
  owner_id = 1,
  category_id = 1;
INSERT INTO lots SET
  creation_date = '2017-12-01',
  name = 'DC Ply Mens 2016/2017 Snowboard',
  description = 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.',
  image = 'img/lot-2.jpg',
  price = 159999,
  end_date = '2017-12-10',
  rate_step = 500,
  owner_id = 1,
  category_id = 1;
INSERT INTO lots SET
  creation_date = '2017-11-29',
  name = 'Крепления Union Contact Pro 2015 года размер L/XL',
  description = 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.',
  image = 'img/lot-3.jpg',
  price = 8000,
  end_date = '2017-12-03',
  rate_step = 100,
  owner_id = 1,
  category_id = 2;
INSERT INTO lots SET
  creation_date = '2017-12-03',
  name = 'Ботинки для сноуборда DC Mutiny Charocal',
  description = 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.',
  image = 'img/lot-4.jpg',
  price = 10999,
  end_date = '2017-12-28',
  rate_step = 200,
  owner_id = 1,
  category_id = 3;
INSERT INTO lots SET
  creation_date = '2017-11-28',
  name = 'Куртка для сноуборда DC Mutiny Charocal',
  description = 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.',
  image = 'img/lot-5.jpg',
  price = 7500,
  end_date = '2017-12-10',
  rate_step = 100,
  owner_id = 2,
  category_id = 4;
INSERT INTO lots SET
  creation_date = '2017-12-02',
  name = 'Маска Oakley Canopy',
  description = 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.',
  image = 'img/lot-6.jpg',
  price = 5400,
  end_date = '2017-12-15',
  rate_step = 100,
  owner_id = 3,
  category_id = 6;

INSERT INTO bets SET date = '2017-11-28', price = 11499, user_id = 3, lot_id = 1;
INSERT INTO bets SET date = '2017-11-29', price = 11999, user_id = 2, lot_id = 1;
INSERT INTO bets SET date = '2017-12-01', price = 8100, user_id = 2, lot_id = 3;
INSERT INTO bets SET date = '2017-12-02', price = 8200, user_id = 3, lot_id = 3;
INSERT INTO bets SET date = '2017-12-04', price = 11199, user_id = 3, lot_id = 4;
INSERT INTO bets SET date = '2017-12-05', price = 11399, user_id = 2, lot_id = 4;

