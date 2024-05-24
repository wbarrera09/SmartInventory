<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class AboutUs extends Page
{
    protected static ?string $navigationIcon = 'heroicon-m-information-circle';
    protected static string $view = 'filament.pages.about-us';

    protected static ?string $title = 'Nosotros';

    protected ?string $heading = 'Sistema - Smart Inventory (SSI)';
    protected ?string $subheading = 'Ingeniería en Sistemas y Computación';

    protected static ?int $navigationSort = 9; // Define el orden en el panel de navegación

    protected function getViewData(): array
    {

        // Array que permite almacenar la información de los devs
        $developers = [
            [
                'name' => 'William Enrique Barrera Cordero',
                'image' => 'images/william_barrera.jpg',
                'role' => 'Lead Full Stack Developer',
                'bio' => 'Líder del proyecto, ha dirigido el desarrollo desde el inicio. Su visión y 
                habilidades técnicas han sido fundamentales para el éxito del proyecto.',
                'whatsapp' => '+50378926113',
            ],
            [
                'name' => 'Will Fernando Crespin Nerio ',
                'image' => 'images/will_crespin.jpg',
                'role' => 'Backend Developer',
                'bio' => 'Especialista en desarrollo de software, domina la lógica del proyecto y las bases de datos, garantizando un sólido funcionamiento del sistema',
                'whatsapp' => '+50376367286',
            ],
            [
                'name' => 'William Fernando Mendez Granados',
                'image' => 'images/william_mendez.jpg',
                'role' => 'Frontend Developer',
                'bio' => 'Encargado del diseño de interfaces y experiencia de usuario, tiene asegurado de que la aplicación web sea intuitiva y atractiva para los usuarios finales.',
                'whatsapp' => '+50374164075',
            ],
            [
                'name' => 'Oscar Alejandro Polio Ortiz',
                'image' => 'images/oscar_polio.jpg',
                'role' => 'QA Analyst',
                'bio' => 'Experto en asegurar la calidad del sistema, ha realizado pruebas para garantizar su fiabilidad y funcionamiento sin problemas.',
                'whatsapp' => '+50377960883',
            ],
        ];
        
        return [
            'developers' => $developers,
            'summary' => 'Somos estudiantes de la Universidad Dr. Andrés Bello. 
            Hemos desarrollado un sistema innovador para el control de inventarios destinado a una empresa 
            de tecnología que administra una variedad de productos, incluyendo computadoras, 
            laptops, discos duros, memorias RAM, mouses, teclados, y otros componentes. Nuestro sistema está 
            diseñado para mejorar la eficiencia y la gestión de los inventarios, proporcionando una solución 
            agradable y fácil de utilizar.',
        ];
    }
}
