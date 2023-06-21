<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Ingreso de Vehículo</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: 'Oswald', sans-serif;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            padding: 50px;
            background-color: #dbba25;
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
    <div class="container">
        <h1>Ingreso de Vehículo</h1>
        <form action="/vehiculo/ingreso" method="post">
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" id="marca" name="marca" required>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" required>
            </div>
            <div class="form-group">
                <label for="placa">Placa:</label>
                <input type="text" id="placa" name="placa" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Ingresar">
            </div>
        </form>
    </div>
</body>
</html>
