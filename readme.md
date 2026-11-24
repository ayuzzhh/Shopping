## Creation of Database :


CREATE DATABASE shopping;

USE shopping;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    product_name VARCHAR(100) NOT NULL,
    phone varchar(20),
    price INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

## Commands to use if Appache is not working 

1. Open Cmd pannel 
2. cd C:\xampp\mysql\bin
3. mysql -u root
4. Creation of database
5. type exit to get out of it 
6. C:\xampp\php\php.exe -v
7. C:\xampp\php\php.exe -S localhost:8000 -t C:\xampp\htdocs\Your_filename (It will run the server)

## DELETE FROM POWERSHELL : 

1. Clear-History 
2. Remove-Item (Get-PSReadLineOption).HistorySavePath -Force