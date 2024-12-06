CREATE DATABASE php_store;

USE php_store;

CREATE TABLE categories (
  id INT AUTO_INCREMENT,
  name VARCHAR(50),
  description TEXT,
  PRIMARY KEY (id)
);



CREATE TABLE products (
  id INT AUTO_INCREMENT,
  name VARCHAR(100),
  description TEXT,
  price DECIMAL(10, 2),
  stock INT,
  image VARCHAR(100),
  category_id INT,
  PRIMARY KEY (id),
  FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE orders (
  id INT AUTO_INCREMENT,
  customer_id INT,
  order_date DATE,
  total DECIMAL(10, 2),
  status VARCHAR(20),
  shipping_address VARCHAR(100),
  PRIMARY KEY (id),
  FOREIGN KEY (customer_id) REFERENCES customers(id)
);

CREATE TABLE order_items (
  id INT AUTO_INCREMENT,
  order_id INT,
  product_id INT,
  quantity INT,
  PRIMARY KEY (id),
  FOREIGN KEY (order_id) REFERENCES orders(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);