

INSERT INTO categories
    SET name = 'Доски и лыжи';
INSERT INTO categories
SET name = 'Крепления';
INSERT INTO categories
SET name = 'Ботинки';
INSERT INTO categories
SET name = 'Одежда';
INSERT INTO categories
SET name = 'Инструменты';
INSERT INTO categories
SET name = 'Разное';
INSERT INTO users
    SET  name = 'Игнат', email = 'ignat.v@gmail.com', password = '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka';
INSERT INTO users
SET  name = 'Леночка', email = 'kitty_93@li.ru', password = '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa';
INSERT INTO users
SET  name = 'Руслан', email = 'warrior07@mail.ru', password = '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW';
INSERT INTO lots
    SET lot_id = '0', title = '2014 Rossignol District Snowboard',start_price = '100', now_price = '10999', path ='img/lot-1.jpg' , user_id = '1' ,category_id ='1',count_rates = '3' ;
INSERT INTO lots
SET lot_id = '1', title = 'DC Ply Mens 2016/2017 Snowboard',start_price = '100', now_price = '159999', path = 'img/lot-2.jpg', user_id = '2',category_id = '1',count_rates = '1';
INSERT INTO lots
SET lot_id = '2', title = 'Крепления Union Contact Pro 2015 года размер L/XL',start_price = '100', now_price = '8000', path = 'img/lot-3.jpg' , user_id = '2',category_id = '2',count_rates = '5';
INSERT INTO lots
SET lot_id = '3', title = 'Ботинки для сноуборда DC Mutiny Charocal',start_price = '200', now_price = '10999', path = 'img/lot-4.jpg', user_id = '2',category_id = '3',count_rates = '2';
INSERT INTO lots
SET lot_id = '4', title = 'Куртка для сноуборда DC Mutiny Charocal',start_price = '400', now_price = '7500', path = 'img/lot-5.jpg', user_id = '3',category_id = '4',count_rates = '2';
INSERT INTO lots
SET lot_id = '5', title = 'Маска Oakley Canop',start_price = '500', now_price = '5400', path = 'img/lot-6.jpg', user_id = '1',category_id = '6',count_rates = '3';
INSERT INTO rates
    SET lot_id = '4', user_id = '1', rate = '3500', dt_add = '12.02.2017';
INSERT INTO rates
SET lot_id = '1', user_id = '2', rate = '6000', dt_add = '20.05.2018';
INSERT INTO rates
SET lot_id = '3', user_id = '3', rate = '100000', dt_add = '15.01.2018';
INSERT INTO rates
SET lot_id = '2', user_id = '3', rate = '25000', dt_add = '01.07.2018';
INSERT INTO rates
SET lot_id = '0', user_id = '1', rate = '45000', dt_add = '23.09.2017';
INSERT INTO rates
SET lot_id = '3', user_id = '1', rate = '20000', dt_add = '16.08.2018';
INSERT INTO rates
SET lot_id = '5', user_id = '2', rate = '4000', dt_add = '14.07.2018';
SELECT * FROM lots;
SELECT * FROM users;
SELECT * FROM categories;

ALTER TABLE lots ADD COLUMN count_rates INT AFTER now_price;
SELECT id, lot_id, title, start_price, path, now_price, count_rates, c.name, user_name, date_format(l.dt_add, '%d.%m.%y %H:%i')  FROM lots l
    JOIN categories c ON l.category_id = c.id
    JOIN users u ON l.user_id = u.id
    ORDER BY l.dt_add DESC ;
SELECT * FROM lots WHERE lot_id = 3;
UPDATE lots SET dt_add = '2018-05-23 08:45:21', dt_sale = '2018-12-23 08:45:21'
WHERE lot_id = 0;
UPDATE lots SET dt_add = '2018-07-26 08:45:21', dt_sale = '2018-12-20 08:45:00'
WHERE lot_id = 1;
UPDATE lots SET dt_add = '2018-06-23 08:45:21', dt_sale = '2018-12-24 09:00:00'
WHERE lot_id = 2;
UPDATE lots SET dt_add = '2018-08-26 18:45:00', dt_sale = '2018-12-26 09:00:00'
WHERE lot_id = 3;
UPDATE lots SET dt_add = '2018-09-29 08:45:29', dt_sale = '2018-12-18 09:00:00'
WHERE lot_id = 4;
UPDATE lots SET dt_add = '2018-10-15 08:45:21', dt_sale = '2018-12-21 09:00:00'
WHERE lot_id = 5;
UPDATE users SET name = 'Руслан'
WHERE id = 3;
ALTER TABLE users CHANGE name user_name CHAR(255);
INSERT INTO lots
SET lot_id = '6', title = 'New  lots for men',start_price = '500', now_price = '5400', path = 'img/icecream2-600x600.jpg', user_id = '1',category_id = '6',count_rates = '3',dt_add = '2018-11-19 08:45:21', dt_sale = '2018-12-21 09:00:00';
DELETE FROM users WHERE id = 5;
ALTER TABLE users ADD COLUMN contact_info CHAR(255) AFTER avatar_path;
UPDATE lots SET  lot_id = 7
WHERE id = 8;