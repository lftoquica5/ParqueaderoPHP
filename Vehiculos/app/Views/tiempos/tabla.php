<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Tabla de tiempos</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: 'Oswald', sans-serif;
        }
        .container {
            width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table td, table th {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #fff;
        }
        table th {
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
    <td><?php echo $tiempo['id_tiempos']; ?></td>
<td><?php echo $vehiculos[$tiempo['id_vehiculo']]['marca'] . ' ' . $vehiculos[$tiempo['id_vehiculo']]['modelo']. ''  . $vehiculos[$tiempo['id_vehiculo']]['placa'] ; ?></td>
<td><?php echo $conductores[$tiempo['id_conductor']]['nombre']; ?></td>
<td><?php echo $tiempo['hora_inicio']; ?></td>
<td><?php echo $tiempo['hora_fin']; ?></td>
</td>
    <div class="container">
        <h1>Tabla de tiempos</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Vehículo</th>
                <th>Conductor</th>
                <th>Hora de inicio</th>
                <th>Hora de fin</th>
            </tr>
            <?php foreach ($tiempos as $tiempo) : ?>
                <tr>
                    <td><?php echo $tiempo['id_tiempos']; ?></td>
                    <td><?php echo $vehiculos[$tiempo['id_vehiculo']]['marca'] . ' ' . $vehiculos[$tiempo['id_vehiculo']]['modelo']. ''  . $vehiculos[$tiempo['id_vehiculo']]['placa'] ; ?></td>
                    <td><?php echo $conductores[$tiempo['id_conductor']]['nombre']; ?></td>
                    <td><?php echo $tiempo['hora_inicio']; ?></td>
                    <td><?php echo $tiempo['hora_fin']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
