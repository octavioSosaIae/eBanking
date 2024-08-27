CREATE DATABASE eBanking;
USE eBanking;

CREATE TABLE users (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(256) NOT NULL
    
);

CREATE TABLE accounts (
    id_account INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL,
    funds DECIMAL(10,2),
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

CREATE TABLE transactions (
    id_transaction INT PRIMARY KEY AUTO_INCREMENT,
    id_origin_account INT,
    id_account_destination INT,
    amount DECIMAL(10, 2) NOT NULL,
    datetime DATETIME,
    reason VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_origin_account) REFERENCES accounts(id_account),
    FOREIGN KEY (id_account_destination) REFERENCES accounts(id_account)
);
