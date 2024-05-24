<?php

namespace App\Providers\Filament;

// Importaciones de clases y middlewares necesarios
use App\Filament\Resources\UserResource\Widgets\UserWidget;
use App\Filament\Resources\CategoryResource\Widgets\CategoryWidget;
use App\Filament\Resources\ProductResource\Widgets\ProductChart;
use App\Filament\Resources\ProductResource\Widgets\ProductLineChart;
use App\Filament\Resources\ProductResource\Widgets\ProductPieChart;
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
use Filament\Support\Enums\MaxWidth;
use Filament\Enums\ThemeMode;

use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin; // Esta clase funciona para los Roles y permisos



// Definición del proveedor de panel
class AdminPanelProvider extends PanelProvider
{
    // Método para configurar el panel de administración
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->maxContentWidth(MaxWidth::Full) // Hace que el sistema sea responsive y se adapte a las pantallas
            ->sidebarCollapsibleOnDesktop() // Permite mostrar y ocultar el panel administrativo

            ->topNavigation()
            ->brandLogo(asset('images/smart-inventory-logo.svg'))
            ->brandLogoHeight('6rem')
            ->favicon(asset('images/smart-inventory-icon.svg'))

            // ->brandName('Smart Inventory')


            ->defaultThemeMode(ThemeMode::Dark)



            ->id('admin') // ID del panel
            ->path('admin') // Ruta del panel
            ->login() // Habilitar la función de inicio de sesión
            ->registration() // Habilitar el registro de usuarios
            ->passwordReset()
            ->emailVerification()
            ->profile()
            ->databaseNotifications() // Habilitar notificaciones de base de datos
            ->userMenuItems([ // Ítem del menú del usuario
                MenuItem::make()
                    ->label('Ajustes')
                    ->icon('heroicon-o-cog-6-tooth') // Icono del menú
                    ->url('/admin'), // URL del menú
                'profile' => MenuItem::make()->label('Editar perfil')
            ])
            //->unsavedChangesAlerts() // No compatible con el modo spa
            ->spa() // esto se utiliza para reciclar codigo y que la pagina sea mucho mas rapida


            ->colors([ // Definir colores
                'primary' => Color::Blue, // Color primario
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'success' => Color::Emerald,
                'warning' => Color::Amber,
                'indigo' => Color::Indigo,
                //'violet' => Color::hex('#FF00CD'), // se puede definir cualquier color con base al codigo
                'slate' => Color::Slate,


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
                ProductWidget::class,
                ProductChart::class,
                ProductLineChart::class,
                ProductPieChart::class



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


            //  ->plugin(FilamentSpatieRolesPermissionsPlugin::make()) // Se utiliza para mandar a llamar el plugin de permisos y roles
            // Se omite este plugin ya que tenia un defecto y es que no se podia ocultar para los otros roles
            // al ser un plugin se precede a generar de manera manual con los recursos que este generó dbb


            ->authMiddleware([ // Middleware de autenticación
                Authenticate::class, // Middleware de autenticación de Filament
            ]);

            



            
    }

    
}


