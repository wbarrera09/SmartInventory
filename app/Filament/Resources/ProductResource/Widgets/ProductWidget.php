<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProductWidget extends BaseWidget
{
    protected function getStats(): array
    {
        // Obtener el recuento de productos para la categoría 'Monitores'
        $count_monitores = Product::whereHas('categories', function ($query) {
            $query->where('category_name', 'Monitores');
        })->count();

        // Obtener el recuento de productos para la categoría 'CPU'
        $count_cpu = Product::whereHas('categories', function ($query) {
            $query->where('category_name', 'CPU');
        })->count();

        // Obtener el recuento de productos para la categoría 'Almacenamiento'
        $count_almacenamiento = Product::whereHas('categories', function ($query) {
            $query->where('category_name', 'Almacenamiento');
        })->count();

        // Obtener el recuento de productos para la categoría 'Teclados'
        $count_teclados = Product::whereHas('categories', function ($query) {
            $query->where('category_name', 'Teclados');
        })->count();

        // Obtener el recuento de productos para la categoría 'RAM'
        $count_ram = Product::whereHas('categories', function ($query) {
            $query->where('category_name', 'RAM');
        })->count();

        // Obtener el recuento de productos para la categoría 'Mouse'
        $count_mouse = Product::whereHas('categories', function ($query) {
            $query->where('category_name', 'Mouse');
        })->count();



        return [
            Stat::make(label: 'Monitores', value: $count_monitores)
                ->description(description: 'Total Monitores')
                ->descriptionIcon(icon: 'heroicon-m-computer-desktop')
                ->color(color: 'info')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

            Stat::make(label: 'CPU', value: $count_cpu)
                ->description(description: 'Total CPU')
                ->descriptionIcon(icon: 'heroicon-m-cpu-chip')
                ->color(color: 'info')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

            Stat::make(label: 'Almacenamiento', value: $count_almacenamiento)
                ->description(description: 'Total Almacenamiento')
                ->descriptionIcon(icon: 'heroicon-m-server')
                ->color(color: 'info')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

            Stat::make(label: 'Teclados', value: $count_teclados)
                ->description(description: 'Total Teclados')
                ->descriptionIcon(icon: 'heroicon-m-queue-list')
                ->color(color: 'info')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

            Stat::make(label: 'RAM', value: $count_ram)
                ->description(description: 'Total RAM')
                ->descriptionIcon(icon: 'heroicon-m-inbox')
                ->color(color: 'info')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

            Stat::make(label: 'Mouse', value: $count_mouse)
                ->description(description: 'Total Mouse')
                ->descriptionIcon(icon: 'heroicon-m-cursor-arrow-rays')
                ->color(color: 'info')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),
        ];
    }
}
