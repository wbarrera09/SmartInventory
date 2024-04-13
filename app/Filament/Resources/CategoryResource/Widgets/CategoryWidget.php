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

            //$monitores = Category::where()

            // muestra los widgets con base a las condiciones brindadas
            Stat::make(label:'Total categorias',value:Category::count())
            ->description(description:'Incremento de categorias')
            ->descriptionIcon(icon:'heroicon-m-arrow-trending-up')
            ->color(color:'success')
            ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

            Stat::make(label:'Monitores',value:Category::where('category_name','Monitores')->count())
            ->description(description:'Total Monitores')
            ->descriptionIcon(icon:'heroicon-m-computer-desktop')
            ->color(color:'info')
            ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

            Stat::make(label:'CPUs',value:Category::where('category_name','CPU')->count())
            ->description(description:'Total CPU')
            ->descriptionIcon(icon:'heroicon-m-cpu-chip')
            ->color(color:'info')
            ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

            Stat::make(label:'Almacenamiento',value:Category::where('category_name','Almacenamiento')->count())
            ->description(description:'Total Almacenamiento')
            ->descriptionIcon(icon:'heroicon-m-server')
            ->color(color:'info')
            ->chart([7, 3, 4, 5, 6, 3, 5, 3]),
            
            Stat::make(label:'Teclados',value:Category::where('category_name','Teclados')->count())
            ->description(description:'Total Teclados')
            ->descriptionIcon(icon:'heroicon-m-queue-list')
            ->color(color:'info')
            ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

            Stat::make(label:'RAM',value:Category::where('category_name','RAM')->count())
            ->description(description:'Total RAM')
            ->descriptionIcon(icon:'heroicon-m-inbox')
            ->color(color:'info')
            ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

            Stat::make(label:'Mouse',value:Category::where('category_name','Mouse')->count())
            ->description(description:'Total Mouse')
            ->descriptionIcon(icon:'heroicon-m-cursor-arrow-rays')
            ->color(color:'info')
            ->chart([7, 3, 4, 5, 6, 3, 5, 3]),





            
            
        ];
    }
}
