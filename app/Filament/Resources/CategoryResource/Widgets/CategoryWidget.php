<?php

namespace App\Filament\Resources\CategoryResource\Widgets;

use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CategoryWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [

            // muestra los widgets con base a las condiciones brindadas
            Stat::make(label:'Categorias',value:Category::count())
            ->description(description:'Total categorias')
            ->descriptionIcon(icon:'heroicon-m-briefcase')
            ->color(color:'success')
            ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

            
        ];
    }
}
