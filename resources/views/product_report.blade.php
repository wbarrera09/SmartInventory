<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de productos - Smart Inventory</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
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
        <h2>Reporte de productos</h2> <!-- Ecabezado dos -->
        @if ($product->id !== null)
            <p><span class="label">ID:</span> <span class="value">{{ $product->id }}</span></p>
        @endif

        @if ($product->categories_id !== null)
        @php
            $category = App\Models\Category::find($product->categories_id);
        @endphp
        @if ($category)
            <p><span class="label">Categoria:</span> <span class="value">{{ $category->category_name }}</span></p>
        @endif
    @endif



        @if ($product->description !== null)
            <p><span class="label">Descripción:</span> <span class="value">{{ $product->description }}</span></p>
        @endif
        @if ($product->stock !== null)
            <p><span class="label">Stock:</span> <span class="value">{{ $product->stock }}</span></p>
        @endif
        @if ($product->location !== null)
            <p><span class="label">Ubicación:</span> <span class="value">{{ $product->location }}</span></p>
        @endif
        @if ($product->size !== null)
            <p><span class="label">Tamaño:</span> <span class="value">{{ $product->size }}</span></p>
        @endif
        @if ($product->format !== null)
            <p><span class="label">Formato:</span> <span class="value">{{ $product->format }}</span></p>
        @endif
        @if ($product->grade !== null)
            <p><span class="label">Grado:</span> <span class="value">{{ $product->grade }}</span></p>
        @endif
        @if ($product->input !== null)
            <p><span class="label">Entrada:</span> <span class="value">{{ $product->input }}</span></p>
        @endif
        @if ($product->brand !== null)
            <p><span class="label">Marca:</span> <span class="value">{{ $product->brand }}</span></p>
        @endif
        @if ($product->Model !== null)
            <p><span class="label">Modelo:</span> <span class="value">{{ $product->Model }}</span></p>
        @endif
        @if ($product->processor !== null)
            <p><span class="label">Procesador:</span> <span class="value">{{ $product->processor }}</span></p>
        @endif
        @if ($product->capacity !== null)
            <p><span class="label">Capacidad:</span> <span class="value">{{ $product->capacity }}</span></p>
        @endif
        @if ($product->technology !== null)
            <p><span class="label">Tecnología:</span> <span class="value">{{ $product->technology }}</span></p>
        @endif
        @if ($product->status !== null)
            <p><span class="label">Status:</span> <span class="value">{{ $product->status }}</span></p>
        @endif
        @if ($product->port !== null)
            <p><span class="label">Puerto:</span> <span class="value">{{ $product->port }}</span></p>
        @endif
        @if ($product->comments !== null)
            <p><span class="label">Comentarios:</span> <span class="value">{{ $product->comments }}</span></p>
        @endif
        @if ($product->categories_id !== null)
            <p><span class="label">ID Categoría:</span> <span class="value">{{ $product->categories_id }}</span></p>
        @endif
    </div>
    <div class="footer">
        <!-- Completar de ser necesario un footer -->
    </div>
</body>
</html>
