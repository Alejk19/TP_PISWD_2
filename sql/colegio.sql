CREATE DATABASE cole;
USE cole;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo_documento VARCHAR(10) NOT NULL,
    numero_documento VARCHAR(10) NOT NULL UNIQUE,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    anio_division VARCHAR(20) NOT NULL
);