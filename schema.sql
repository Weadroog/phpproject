CREATE  DATABASE IF NOT EXISTS phpproject
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;
USE phpproject;
CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name CHAR(255)
);

CREATE TABLE lots(
  id INT AUTO_INCREMENT ,
  lot_id INT PRIMARY KEY,
  dt_sale DATETIME(0),
  title CHAR(255),
  description TEXT,
  path CHAR(255),
  dt_add DATETIME(0),
  user_id INT,
  category_id INT,
  start_price INT,
  step_price INT,
  now_price INT
);
CREATE TABLE users(
  id INT AUTO_INCREMENT PRIMARY KEY,
  dt_add DATETIME(0),
  name CHAR(255),
  email CHAR(255),
  password CHAR(64),
  avatar_path CHAR(255)
);
CREATE TABLE rates(
  id INT AUTO_INCREMENT PRIMARY KEY,
  dt_add DATETIME(0),
  lot_id INT,
  user_id INT,
  rate INT
);
CREATE TABLE history (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name CHAR(255),
  price INT,
  dt_add DATETIME(0),
  lot_id INT
);
CREATE UNIQUE INDEX email ON users(email);
CREATE UNIQUE INDEX name_cat ON categories(name);
CREATE UNIQUE INDEX lots_id ON lots(lot_id);
CREATE INDEX name_us ON users(name);
CREATE INDEX title ON lots(title);
