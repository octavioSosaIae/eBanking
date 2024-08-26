CREATE DATABASE eBanking;
USE eBanking;

CREATE TABLE Usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nombre_completo VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    telefono VARCHAR(15),
    password VARCHAR(256) NOT NULL,
    Saldo DECIMAL (10,2),
    Num_cuenta VARCHAR(15)
    
);

CREATE TABLE Cuentas (
    id_cuenta INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    saldo DECIMAL(10,2),
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
);

CREATE TABLE Transacciones (
    id_transaccion INT PRIMARY KEY AUTO_INCREMENT,
    id_cuenta_origen INT,
    id_cuenta_destino INT,
    monto DECIMAL(10, 2) NOT NULL,
    fecha_hora DATETIME,
    razon VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_cuenta_origen) REFERENCES Cuentas(id_cuenta),
    FOREIGN KEY (id_cuenta_destino) REFERENCES Cuentas(id_cuenta)
);
