<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Lista de Conductores</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: 'Oswald', sans-serif;
        }
        .container {
            width: 600px;
            margin: 0 auto;
            padding: 50px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #dbba25;
        }
        .table-container {
            max-height: 400px; /* Define la altura máxima del contenedor */
            overflow-y: scroll; /* Agrega un scroll vertical */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #edebe1;
            color: #000;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #dbba25;
            color: #000;
        }
        .dropdown {
        position: relative;
        display: inline-block;
        text-align: center; /* Añade esta línea para centrar el menú */
        font-family: 'Oswald', sans-serif;
        }

        .dropbtn {
        background-color: #dbba25;
        color: #000;
        font-size: 20px;
        border: none;
        cursor: pointer;
        padding: 10px 20px;
        font-family: 'Oswald', sans-serif;
        
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        font-family: 'Oswald', sans-serif;
        }

        .dropdown-content a {
        color: #000;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        font-family: 'Oswald', sans-serif;
        font-size:15px;
        }

        .dropdown:hover .dropdown-content {
        display: block;
        font-family: 'Oswald', sans-serif;
        }

        .navbar {
            background-color: #dbba25;
        }
        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .navbar li {
            margin-right: 10px;
        }
        .navbar li a {
            color: #000;
            text-decoration: none;
            padding: 5px;
            border-radius: 3px;
        }
        .navbar li a:hover {
            background-color: #000;
            color: #fff;
        }
    </style>
</head>
<body>
<div class="navbar">
    <ul>
        <li class="dropdown">
            <button class="dropbtn">Conductores</button>
            <div class="dropdown-content">
                <a href="/conductores/agregar">Agregar Conductor</a>
                <a href="/conductores/exito">Lista Conductores</a>
            </div>
        </li>
        <li class="dropdown">
            <button class="dropbtn">Vehículos</button>
            <div class="dropdown-content">
                <a href="/vehiculos/agregar">Agregar Vehiculo</a>
                <a href="/vehiculos/exito">Lista Vehiculos</a>
            </div>
        </li>
        <li class="dropdown">
            <button class="dropbtn">Tiempos</button>
            <div class="dropdown-content">
                <a href="/tiempos/tabla">Tabla de Tiempos</a>
                <a href="/tiempos/seleccionar">reportar tiempo</a>

            </div>
        </li>
    </ul>
</div>
<div class="container">
    <h1>Lista de Vehiculos</h1>
    <div class="table-container">
        <table>
            <tr>
                <th>ID VEHICULO</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Placa</th>
            </tr>
            <?php
            // Establecer la conexión con la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "parqueadero";
            $port ="3307";
            $conn = new mysqli($servername, $username, $password, $dbname, $port);
            
            // Verificar si hay errores de conexión
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }
            
            // Obtener los registros de la tabla "conductores"
            $sql = "SELECT * FROM vehiculos";
            $result = $conn->query($sql);
            
            // Verificar si hay registros
            if ($result->num_rows > 0) {
                // Recorrer cada registro y mostrar los datos en la tabla
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_vehiculos'] . "</td>";
                    echo "<td>" . $row['marca'] . "</td>";
                    echo "<td>" . $row['modelo'] . "</td>";
                    echo "<td>" . $row['placa'] . "</td>";
                    echo "</tr>";
                }
            } else {
                // No se encontraron registros
                echo "<tr><td colspan='3'>No se encontraron vehiculos.</td></tr>";
            }
            
            // Cerrar la conexión con la base de datos
            $conn->close();
            ?>
        </table>
    </div>
</div>
</body>
</html>
