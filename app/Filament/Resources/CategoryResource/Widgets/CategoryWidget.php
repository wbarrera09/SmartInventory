<?php

namespace App\Filament\Resources\CategoryResource\Widgets;

use App\Models\Category;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CategoryWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [

            // muestra los widgets con base a las condiciones brindadas
            Stat::make(label: 'Categorias', value: Category::count())
                ->description(description: 'Total categorias')
                ->descriptionIcon(icon: 'heroicon-m-briefcase')
                ->color(color: 'success')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

            // muestra los widgets con base a las condiciones brindadas
            Stat::make(label: 'Total Productos', value: Product::count())
                ->description(description: 'Total productos')
                ->descriptionIcon(icon: 'heroicon-m-shopping-bag')
                ->color(color: 'success')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

            // muestra los widgets con base a las condiciones brindadas
            Stat::make(label: 'Total Stock', value: Product::sum('stock'))
                ->description(description: 'Total stock')
                ->descriptionIcon(icon: 'heroicon-m-arrow-trending-up')
                ->color(color: 'success')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),




        ];
    }
}
