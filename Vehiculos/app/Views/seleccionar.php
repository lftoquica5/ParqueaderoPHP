<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Selección de Vehículo, Conductor y Tiempo</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: 'Oswald', sans-serif;
        }
        .container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        select, input[type="time"] {
            width: 100%;
            padding: 5px;
        }
        button {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #dbba25;
            color: #000;
            border: none;
            cursor: pointer;
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
        <h1>Selección de Vehículo y Conductor</h1>
        <form action="/tiempos/guardar" method="post">
            <label for="vehiculo">Vehículo:</label>
            <select name="vehiculo" id="vehiculo">
                <?php foreach ($vehiculos as $vehiculo) : ?>
                    <option value="<?php echo $vehiculo['id_vehiculos']; ?>"><?php echo $vehiculo['marca']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="placa">Vehículo:</label>
            <select name="placa" id="placa">
                <?php foreach ($vehiculos as $vehiculo) : ?>
                    <option value="<?php echo $vehiculo['id_vehiculos']; ?>"><?php echo $vehiculo['placa']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="conductor">Conductor:</label>
            <select name="conductor" id="conductor">
                <?php foreach ($conductores as $conductor) : ?>
                    <option value="<?php echo $conductor['id_conductores']; ?>"><?php echo $conductor['nombre']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="tiempo">Tiempo:</label>
            <input type="time" name="tiempo" id="tiempo">

            <button type="submit">Guardar</button>
        </form>
    </div>

    <script>
        // Obtener el campo de tiempo
        var tiempoInput = document.getElementById('tiempo');

        // Obtener el tiempo actual
        var tiempoActual = new Date();
        var hora = tiempoActual.getHours().toString().padStart(2, '0');
        var minutos = tiempoActual.getMinutes().toString().padStart(2, '0');

        // Establecer el valor del campo de tiempo con el tiempo actual
        tiempoInput.value = hora + ':' + minutos;
    </script>
</body>
</html>
