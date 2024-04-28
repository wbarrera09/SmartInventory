<?php

namespace App\Http\Controllers; // Define el namespace del controlador

use App\Models\Product; // Importa el modelo de Producto
use Illuminate\Http\Request; // Importa la clase Request de Laravel
use Illuminate\Support\Facades\App; // Importa la fachada de App para acceder al servicio de PDF

class DownloadProductPDF extends Controller // Define la clase del controlador y extiende de Controller
{
    public function product($record) // Define el método "product" que acepta un parámetro llamado $record
    {
        $product = Product::findOrFail($record); // Busca un producto por su ID. Si no se encuentra, devuelve un error 404.
        $pdf = App::make('dompdf.wrapper'); // Crea una instancia del servicio Dompdf, que se utiliza para generar archivos PDF
        $pdf->loadView('product_report', compact('product')); // Carga la vista 'product_report' y pasa el objeto $product como datos
        return $pdf->stream(); // Devuelve el PDF al navegador para que se descargue como un flujo de datos
    }
}
