<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Agregar Conductor</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: 'Oswald', sans-serif;
        }
        a {
            font-size: 20px;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            padding: 50px;
            background-color: #f2f1eb;
            border-radius: 5px;
            margin-top: 100px;
            text-align: center; 
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #000;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            color: #000;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 3px;
        }
        .form-group input[type="submit"] {
            background-color: #000;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
            width: 70%; 
            margin: 15px auto; 
        }
        .error {
            color: red;
            margin-top: 5px;
        }
        .logo {
            display: block;
            margin: 0 auto;
            width: 250px; 
            margin-bottom: 20px;
        }
        .table-container {
            margin-top: 50px;
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
                <a href="/tiempos/exito">reportar tiempo</a>
            </div>
        </li>
    </ul>
</div>
    <div class="container">
        <h1 style="color:#dbba25">Agregar Conductor</h1>
        <?php if (isset($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="/conductores/guardar" method="post">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="licencia">Número de Licencia</label>
                <input type="number" name="licencia" id="licencia" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Agregar" style="color:#dbba25">
            </div>
        </form>
    </div>
</body>
</html>
