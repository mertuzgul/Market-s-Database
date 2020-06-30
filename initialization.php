<?php

$servername = "localhost";
$username = "root";
$password = "mysql";

$conn = mysqli_connect($servername,$username,$password);
if(!$conn)
{
		die("Baglanti kurulamadi: " . mysqli_connect_error());
}

$sql = "
DROP DATABASE IF EXISTS mertUzgul;
CREATE DATABASE mertUzgul
COLLATE latin1_general_ci;
USE mertUzgul;

CREATE TABLE IF NOT EXISTS `districts` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `district` varchar(50) NOT NULL,
  PRIMARY KEY(`district_id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY(`city_id`),
  FOREIGN KEY fk_cities_district_id (`district_id`) REFERENCES `districts` (`district_id`)  ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `markets` (
  `market_id` int(11) NOT NULL AUTO_INCREMENT,
  `market_name` varchar(50) NOT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY(`Market_id`),
  FOREIGN KEY fk_markets_city_id (`city_id`) REFERENCES `cities` (`city_id`)  ON DELETE CASCADE
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `salesmans` (
  `salesman_id` int(11) NOT NULL AUTO_INCREMENT,
  `salesman_name` varchar(200) NOT NULL,
  `salary` int(11) DEFAULT 0,
  `market_id` int(11) NOT NULL,
  PRIMARY KEY(`salesman_id`),
  FOREIGN KEY fk_salesmans_market_id (`market_id`) REFERENCES `markets` (`market_id`)  ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(200) NOT NULL,
  PRIMARY KEY(`customer_id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` int(11) DEFAULT 0,
  PRIMARY KEY(`product_id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `sales` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `salesman_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sale_date` date NOT NULL,
  `commission_ratio` varchar(50) DEFAULT 0,
  PRIMARY KEY(`sale_id`),
  FOREIGN KEY fk_sales_product_id (`product_id`) REFERENCES `products` (`product_id`)  ON DELETE CASCADE,
  FOREIGN KEY fk_sales_salesman_id (`salesman_id`) REFERENCES `salesmans` (`salesman_id`)  ON DELETE CASCADE,
  FOREIGN KEY fk_sales_customer_id (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE
) ENGINE=InnoDB;

";
$result = mysqli_query($conn,$sql) or  die("Tablo yaratılamadı");

$sql2="
LOAD DATA INFILE 'datasets/district.csv' 
			INTO TABLE districts
			FIELDS TERMINATED BY ',' 
			ENCLOSED BY '\"'
			LINES TERMINATED BY '\n'
			IGNORE 1 ROWS;

LOAD DATA INFILE 'dataSets/cities.csv' 
			INTO TABLE cities
			FIELDS TERMINATED BY ',' 
			ENCLOSED BY '\"'
			LINES TERMINATED BY '\n'
			IGNORE 1 ROWS;

LOAD DATA INFILE 'dataSets/market.csv' 
			INTO TABLE markets
			FIELDS TERMINATED BY ',' 
			ENCLOSED BY '\"'
			LINES TERMINATED BY '\n'
			IGNORE 1 ROWS;	
			
LOAD DATA INFILE 'dataSets/products.csv' 
			INTO TABLE products
			FIELDS TERMINATED BY ',' 
			ENCLOSED BY '\"'
			LINES TERMINATED BY '\n'
			IGNORE 1 ROWS;		
			
LOAD DATA INFILE 'dataSets/salesman_name.csv' 
			INTO TABLE salesmans
			FIELDS TERMINATED BY ',' 
			ENCLOSED BY '\"'
			LINES TERMINATED BY '\n'
			IGNORE 1 ROWS;
				
LOAD DATA INFILE 'dataSets/customer_name.csv' 
			INTO TABLE customers
			FIELDS TERMINATED BY ',' 
			ENCLOSED BY '\"'
			LINES TERMINATED BY '\n'
			IGNORE 1 ROWS	;

LOAD DATA INFILE 'dataSets/sales.csv' 
			INTO TABLE sales
			FIELDS TERMINATED BY ',' 
			ENCLOSED BY '\"'
			LINES TERMINATED BY '\n'
			IGNORE 1 ROWS	;	
";			

$result2 = mysqli_query($conn,$sql2) or die("Tablo doldurulamadı");




?>
