CREATE DATABASE nationsglory;

USE nationsglory;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    bank_account FLOAT DEFAULT 0,
    bank_card_number VARCHAR(16),
    bank_card_expiry VARCHAR(5),
    bank_card_cvc VARCHAR(3)
);