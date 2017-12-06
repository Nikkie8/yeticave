CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name CHAR
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  register_date DATETIME,
  email CHAR,
  name CHAR,
  password CHAR,
  avatar CHAR,
  contacts CHAR
);

CREATE TABLE lots (
  id INT AUTO_INCREMENT PRIMARY KEY,
  creation_date DATETIME,
  name CHAR,
  description TEXT,
  image CHAR,
  price DECIMAL,
  end_date DATETIME,
  rate_step DECIMAL,
  owner_id INT,
  winner_id INT,
  category_id INT
);

CREATE TABLE bets (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date DATETIME,
  price DECIMAL,
  user_id INT,
  lot_id INT
);

CREATE UNIQUE INDEX category_name ON categories(name);
CREATE UNIQUE INDEX email ON users(email);
CREATE UNIQUE INDEX user_name ON users(name);

CREATE INDEX lot_name ON lots(name);
