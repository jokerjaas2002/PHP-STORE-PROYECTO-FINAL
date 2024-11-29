CREATE DATABASE php_store;

USE php_store;

CREATE TABLE categories (
  id INT AUTO_INCREMENT,
  name VARCHAR(50),
  description TEXT,
  PRIMARY KEY (id)
);

CREATE TABLE customers (
  id INT AUTO_INCREMENT,
  name VARCHAR(50),
  email VARCHAR(100),
  password VARCHAR(255),
  address VARCHAR(100),
  phone VARCHAR(20),
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

CREATE TABLE payments (
  id INT AUTO_INCREMENT,
  order_id INT,
  payment_date DATE,
  amount DECIMAL(10, 2),
  payment_method VARCHAR(20),
  PRIMARY KEY (id),
  FOREIGN KEY (order_id) REFERENCES orders(id)
);

CREATE TABLE reviews (
  id INT AUTO_INCREMENT,
  product_id INT,
  customer_id INT,
  rating INT CHECK (rating >= 1 AND rating <= 5),
  comment TEXT,
  review_date DATE,
  PRIMARY KEY (id),
  FOREIGN KEY (product_id) REFERENCES products(id),
  FOREIGN KEY (customer_id) REFERENCES customers(id)
);

CREATE TABLE shipping (
  id INT AUTO_INCREMENT,
  order_id INT,
  shipping_date DATE,
  delivery_date DATE,
  shipping_method VARCHAR(50),
  tracking_number VARCHAR(100),
  PRIMARY KEY (id),
  FOREIGN KEY (order_id) REFERENCES orders(id)
);