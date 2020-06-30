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
