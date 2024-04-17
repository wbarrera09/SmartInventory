<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use App\Models\Product;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class ProductChart extends ChartWidget
{
    protected static ?string $heading = 'Stock por Categorias';

    protected static string $color = 'info';

    protected function getData(): array
{
    $data = Product::join('categories', 'products.categories_id', '=', 'categories.id')
        ->select('categories.category_name')
        ->selectRaw('SUM(products.stock) as total_stock')
        ->groupBy('categories.category_name')
        ->get();

    $labels = $data->pluck('category_name')->toArray(); // Obtener las categorías como etiquetas
    $stockData = $data->pluck('total_stock')->toArray(); // Obtener el stock de cada categoría

    return [
        'datasets' => [
            [
                'label' => 'Stock por categoría',
                'data' => $stockData,
            ],
        ],
        'labels' => $labels,
    ];
}

    protected function getType(): string
    {
        return 'bar';
    }



    
}
