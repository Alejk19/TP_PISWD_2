USE colegio;

-- Insertar datos de ejemplo en la tabla de usuarios
INSERT INTO usuarios (tipo_documento, numero_documento, nombre, apellido, anio_division)
VALUES 
    ('DNI', '12345678', 'Juan', 'Pérez', '3° A'),
    ('LC', '87654321', 'Ana', 'López', '4° B'),
    ('LE', '13579246', 'Carlos', 'Sánchez', '2° C');
