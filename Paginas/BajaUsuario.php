<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BAJA DE USUARIO</title>
  <link rel="stylesheet" href="../Estilos/bajaUsuario.css" /> <!-- CSS para estilos personalizados -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

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

        form{
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

<body>
  <!-- Imagen del colegio -->
  <div class="imagen">
    <img src="../Imagenes/imagen-colegio.jpg" alt="Imagen del Colegio" />
  </div>

  <h1>BAJA DE USUARIO</h1>

  <div class="contenedor">
    
    <!-- Formulario para la baja del usuario -->
    <form action="BajaUsuario.php" method="post"> 
    <div>Datos del usuario</div> <br>

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
        <input type="text" id="numeroDocumento" name="numeroDocumento" maxlength="10" class="form-control" placeholder="Número de documento" required>
      </div>

      <button type="submit" name="eliminarUsuario" class="btn btn-success">Dar de baja</button>
      <button type="reset" class="btn btn-danger">Borrar datos</button> <br> <br>

    <?php
        // Incluir el archivo de conexión
        require('conexion.php');

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminarUsuario'])) {
            // Obtener datos del formulario
            $tipoDocumento = $_POST['tipoDocumento'];
            $numeroDocumento = $_POST['numeroDocumento'];

            // Preparar y ejecutar la consulta de eliminación
            $sql = "DELETE FROM usuarios WHERE tipo_documento = ? AND numero_documento = ?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("ss", $tipoDocumento, $numeroDocumento);

                // Ejecutar la consulta
                $stmt->execute();

                // Verificar si se eliminaron filas
                if ($stmt->affected_rows > 0) {
                    // Si se eliminó al menos un usuario
                    echo "<h3 style='text-align:center; color:green'>Usuario eliminado exitosamente.</h3>";
                } else {
                    // Si no se eliminó ningún usuario (probablemente porque no existía)
                    echo "<h3 style='text-align:center; color:red;'>No se encontró ningún usuario con ese número de documento.</h3>";
                }

                // Cerrar el statement
                $stmt->close();
            } else {
                // Si no se puede preparar la consulta, mostrar el error
                echo "<h3 style='text-align:center; color:red;'>Error al preparar la consulta: " . $conn->error . "</h3>";
            }

            // Cerrar la conexión
            $conn->close();
        }
    ?>

    </form>
  </div>

  <!-- Pie de página -->
  <footer> 
    <p class="pie">
      E.E.S.T N°6 CHACABUCO – MORÓN (7o 4o año 2024) <br>
      Proyecto de implementación de sitios web dinámicos <br>
      Autores: Alejo Alarcon, Jonathan Lezcano, Lautaro Cuba, Cristian Baez
    </p>
  </footer> 
</body>
</html>
        