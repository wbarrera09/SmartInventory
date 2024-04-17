<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
                       // muestra los widgets con base a las condiciones brindadas
                       Stat::make(label:'Usuarios',value:User::count())
                       ->description(description:'Total usuarios')
                       ->descriptionIcon(icon:'heroicon-m-user-group')
                       ->color(color:'warning')
                       ->chart([7, 3, 4, 5, 6, 3, 5, 3]),
        ];
    }
}
