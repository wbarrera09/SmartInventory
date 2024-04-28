<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de usuarios</title>
    <style>
        /* Estilos CSS para el PDF */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #343a40;
            border: 4px double #000; /* Borde de doble línea en negro */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        h1 {
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }
        p {
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
            color: #6c757d;
        }
        .value {
            font-weight: bold;
            color: #000000;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Smart Inventory</h1> <!-- Encabezado  -->
        <h2>Reporte de usuarios</h2> <!-- Encabezado dos -->
        <p><span class="label">ID:</span> <span class="value">{{ $user->id }}</span></p>
        <p><span class="label">Nombre:</span> <span class="value">{{ $user->name }}</span></p>
        <p><span class="label">Correo:</span> <span class="value">{{ $user->email }}</span></p>
        <p><span class="label">Fecha Creación:</span> <span class="value">{{ $user->created_at }}</span></p>

    </div>
    <div class="footer">
        <!-- Completar de ser necesario un footer -->
    </div>
</body>
</html>
