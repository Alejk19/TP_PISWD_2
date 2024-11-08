<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ALTA DE USUARIO</title>
    <link rel="stylesheet" href="../Estilos/altaUsuario.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .imagen {
            margin-bottom: 30px;
        }

        .contenedor {
            display: flex;
            justify-content: center;
        }

        form {
            width: 100%;
            max-width: 500px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }

        .pie {
            color: #6c757d;
        }
    </style>
</head>
<body>

    <div class="imagen">
        <img src="../Imagenes/imagen-colegio.jpg" alt="Imagen del Colegio" style="max-width: 100%; height: auto;"/>
    </div>

    <h1>ALTA DE USUARIO</h1>

    <div class="contenedor">
        <div>
            <!-- Formulario de Alta de Usuario -->
            <form method="POST" action="altaUsuario.php">
                <div class="input-group input-group-sm mb-3">
                    <label for="tipoDocumento" class="input-group-text">Tipo de documento</label>
                    <select id="tipoDocumento" name="tipoDocumento" class="form-select">
                        <option value="DNI">DNI</option>
                        <option value="LC">LC</option>
                        <option value="LE">LE</option>
                    </select>
                </div>

                <div class="input-group input-group-sm mb-3">
                    <label for="numeroDocumento" class="input-group-text">Número de documento</label>
                    <input type="text" id="numeroDocumento" name="numeroDocumento" maxlength="20" class="form-control" placeholder="Número de documento" required>
                </div>

                <div class="input-group input-group-sm mb-3">
                    <label for="nombre" class="input-group-text">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
                </div>

                <div class="input-group input-group-sm mb-3">
                    <label for="apellido" class="input-group-text">Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" required>
                </div>

                <div class="input-group input-group-sm mb-3">
                    <label for="anioDivision" class="input-group-text">Año - División</label>
                    <input type="text" id="anioDivision" name="anioDivision" class="form-control" placeholder="Año - División" required>
                </div>

                <button type="submit" class="btn btn-success">Dar de Alta</button>
                <button type="reset" class="btn btn-danger">Borrar datos</button>  <br> <br>

                <?php
                    // Incluir el archivo de conexión   
                    require_once('conexion.php');

                    // Procesar el formulario si se ha enviado
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $tipoDocumento = $_POST["tipoDocumento"];
                        $numeroDocumento = $_POST["numeroDocumento"];
                        $nombre = $_POST["nombre"];
                        $apellido = $_POST["apellido"];
                        $anioDivision = $_POST["anioDivision"];

                        // Verificar si el número de documento ya existe
                        $checknum = "SELECT COUNT(*) AS count FROM usuarios WHERE numero_documento = '$numeroDocumento'";
                        $result = $conn->query($checknum);
                        $row = $result->fetch_assoc();

                        if ($row['count'] > 0) {
                            // Si el número de documento ya existe, mostrar un mensaje de error
                            echo "<h3 style='text-align:center; color:red;'>El número de documento '$numeroDocumento' ya está registrado.</h3>";
                        } else {
                            // Preparar la consulta SQL para insertar los datos del usuario
                            $sql = "INSERT INTO usuarios (tipo_documento, numero_documento, nombre, apellido, anio_division)
                                    VALUES ('$tipoDocumento', '$numeroDocumento', '$nombre', '$apellido', '$anioDivision')";

                            // Ejecutar la consulta y verificar si se insertó correctamente
                            if ($conn->query($sql) === TRUE) {
                                echo "<h3 style='text-align:center; color:green;'>Usuario registrado</h3>";
                            } else {
                                echo "<h3 style='text-align:center; color:red;'>" . $conn->error . "</h3>";
                            }
                        }
                    }

                    // Cerrar la conexión
                    $conn->close();
                ?>

            </form>
        </div>
    </div>

    <footer> 
        <p class="pie">
            E.E.S.T N°6 CHACABUCO – MORÓN (7o 4o año 2024) <br>
            Proyecto de implementación de sitios web dinámicos <br>
            Autores: Alejo Alarcon, Jonathan Lezcano, Lautaro Cuba, Cristian Baez
        </p>
    </footer> 

</body>
</html>
