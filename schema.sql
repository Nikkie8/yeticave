CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name CHAR(200),
  modifier CHAR(100)
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  register_date DATETIME,
  email CHAR(255),
  name CHAR(255),
  password CHAR(255),
  avatar CHAR(255),
  contacts CHAR(255)
);

CREATE TABLE lots (
  id INT AUTO_INCREMENT PRIMARY KEY,
  creation_date DATETIME,
  name CHAR(255),
  description TEXT,
  image CHAR(255),
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
