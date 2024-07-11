CREATE DATABASE electronics_service;

USE electronics_service;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    serial_number VARCHAR(255) NOT NULL,
    manufacturer VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    submission_date DATE NOT NULL,
    received_date DATE NOT NULL,
    status VARCHAR(255) NOT NULL,
    last_status_change TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id)
);
