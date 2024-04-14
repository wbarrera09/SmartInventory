<?php

namespace App\Providers\Filament;

// Importaciones de clases y middlewares necesarios
use App\Filament\Resources\UserResource\Widgets\UserWidget;
use App\Filament\Resources\CategoryResource\Widgets\CategoryWidget;
use App\Filament\Resources\ProductResource\Widgets\ProductWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

// Definición del proveedor de panel
class AdminPanelProvider extends PanelProvider
{
    // Método para configurar el panel de administración
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin') // ID del panel
            ->path('admin') // Ruta del panel
            ->login() // Habilitar la función de inicio de sesión
            ->registration() // Habilitar el registro de usuarios
            ->databaseNotifications() // Habilitar notificaciones de base de datos
            ->userMenuItems([ // Ítem del menú del usuario
                MenuItem::make()
                ->label('Admin')
                ->icon('heroicon-o-cog-6-tooth') // Icono del menú
                ->url('/admin') // URL del menú
            ])
            ->colors([ // Definir colores
                'primary' => Color::Blue, // Color primario
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources') // Descubrir recursos
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages') // Descubrir páginas
            ->pages([ // Definir páginas
                Pages\Dashboard::class, // Página del panel de control
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets') // Descubrir widgets
            ->widgets([ // Definir widgets
                Widgets\AccountWidget::class, // Widget de cuenta
                Widgets\FilamentInfoWidget::class, // Opcional: Widget de información de Filament
                UserWidget::class,
                CategoryWidget::class,
                ProductWidget::class



            ])
            ->middleware([ // Middleware global
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([ // Middleware de autenticación
                Authenticate::class, // Middleware de autenticación de Filament
            ]);
    }
}
