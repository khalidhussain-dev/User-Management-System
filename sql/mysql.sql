CREATE DATABASE user_catalog;

USE user_catalog;

CREATE TABLE users (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Company_Id INT NOT NULL,
    Role_Id INT NOT NULL,
    Name VARCHAR(100) NOT NULL,
    User VARCHAR(50) NOT NULL,
    pwd VARCHAR(20) NOT NULL
);
