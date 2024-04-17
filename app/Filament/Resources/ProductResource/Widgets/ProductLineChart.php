<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use App\Models\Product;
use Filament\Widgets\ChartWidget;

class ProductLineChart extends ChartWidget
{
    protected static ?string $heading = 'Stock por Marcas';
    protected static string $color = 'info'; // Se define el color por default para todo 


    protected function getData(): array
    {
        $data = Product::select('brand')
        ->selectRaw('SUM(stock) as total_stock')
        ->groupBy('brand')
        ->get();

    $labels = $data->pluck('brand')->toArray(); // Obtener las marcas como etiquetas
    $stockData = $data->pluck('total_stock')->toArray(); // Obtener el stock de cada marca

    return [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Stock por marca',
                'data' => $stockData,
               //'backgroundColor' => '#4db8ff', // Color de fondo del área debajo de la línea en formato hexadecimal
               // 'borderColor' => '#007bff', // Color de la línea en formato hexadecimal
                'borderWidth' => 2 // Ancho de la línea
            ]
        ]
    ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
