<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Iniciar sesión</title>
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
    </style>
</head>
<body>
    <div class="container">
        <img src="Img/P.jpg" alt="Logo parqueadero" class="logo">
        <?php if (isset($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="/login" method="post">
            <div class="form-group">
                <label for="username">Nombre de usuario</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Iniciar sesión">
            </div>
        </form>
    </div>
</body>
</html>
