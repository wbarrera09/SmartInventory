<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use App\Models\Product;
use Filament\Widgets\ChartWidget;

class ProductPieChart extends ChartWidget
{
    protected static ?string $heading = 'Stock por Ubicación'; // titulo
    protected static ?string $maxHeight = '275px'; // Establecer un límite de altura para el gráfico


    protected function getData(): array
    {
        // Obtener los datos de la bdd
        $data = Product::select('location')
            ->selectRaw('SUM(stock) as total_stock')
            ->groupBy('location')
            ->get();

        // Extraer las etiquetas y los datos de stock
        $labels = $data->pluck('location')->toArray();
        $stockData = $data->pluck('total_stock')->toArray();

        // Devolver los datos en el formato requerido para el gráfico de tipo Doughnut
        return [
            'datasets' => [
                [
                    'label' => 'Stock por Marca',
                    'data' => $stockData,
                    'backgroundColor' => [
                        '#007bff', '#1f77b4', '#1a8cff', '#42a5f5', '#64b5f6',
                        '#82b1ff', '#6fa8dc', '#93c3ea', '#8ac6d1', '#add8e6',
                        '#8dd1e1', '#87ceeb', '#6daacb', '#4682b4', '#6699cc',
                        '#77aaff', '#6bb9f0', '#6ab5ff', '#4d94ff', '#3366cc',
                        '#87cefa', '#4d71cc', '#4169e1', '#6495ed', '#4682b4',
                        '#4876ff', '#0080ff', '#0073e6', '#4169e1', '#1c8cff',
                        '#0066cc', '#003366', '#1e90ff', '#1a75ff', '#1f86e0',
                        '#0056b3', '#001a66', '#003399', '#0047ab', '#000080',
                        '#0033cc', '#0047ab', '#0066cc', '#0000ff', '#0000e6',
                        '#000080', '#0033cc', '#001f7a', '#0000b3', '#00008b',
                    ]
                    
                ],
            ],
            'labels' => $labels,

        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
