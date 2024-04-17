<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            1 => [
                // Monitores
                [
                    'description' => 'Monitor de alta gama',
                    'stock' => 50,
                    'location' => 'Bodega A',
                    'brand' => 'Dell',
                    'size' => '32"',
                    'format' => 'Cuadrado',
                    'grade' => 'B',
                    'input' => 'HDMI',
                    'comments' => '--',
                    'categories_id' => 1
                ],

                [
                    'description' => 'Monitor de media gama',
                    'stock' => 35,
                    'location' => 'Bodega B',
                    'brand' => 'HP',
                    'size' => '27"',
                    'format' => 'Curvo',
                    'grade' => 'A',
                    'input' => 'HDMI',
                    'comments' => '--',
                    'categories_id' => 1

                ],

                [
                    'description' => 'Monitor de baja gama',
                    'stock' => 10,
                    'location' => 'Bodega C',
                    'brand' => 'Samsung',
                    'size' => '22"',
                    'format' => 'Widescreen',
                    'grade' => 'C',
                    'input' => 'VGA',
                    'comments' => '--',
                    'categories_id' => 1

                ],

                [
                    'description' => 'Monitor 4K de alta gama',
                    'stock' => 25,
                    'location' => 'Bodega D',
                    'brand' => 'LG',
                    'size' => '27"',
                    'format' => 'UltraWide',
                    'grade' => 'A+',
                    'input' => 'DisplayPort',
                    'comments' => 'Resolución Ultra HD para una experiencia visual impresionante.',
                    'categories_id' => 1

                ],
                [
                    'description' => 'Monitor para diseño gráfico',
                    'stock' => 20,
                    'location' => 'Bodega E',
                    'brand' => 'BenQ',
                    'size' => '24"',
                    'format' => 'IPS',
                    'grade' => 'A',
                    'input' => 'HDMI',
                    'comments' => 'Colores precisos y ángulos de visualización amplios para profesionales del diseño.',
                    'categories_id' => 1
                ],
                [
                    'description' => 'Monitor económico para oficina',
                    'stock' => 15,
                    'location' => 'Bodega F',
                    'brand' => 'AOC',
                    'size' => '21.5"',
                    'format' => 'Widescreen',
                    'grade' => 'B',
                    'input' => 'VGA',
                    'comments' => 'Ideal para tareas básicas en entornos de oficina.',
                    'categories_id' => 1
                ],
                [
                    'description' => 'Monitor gaming de alto rendimiento',
                    'stock' => 30,
                    'location' => 'Bodega G',
                    'brand' => 'ASUS',
                    'size' => '24"',
                    'format' => 'Curvo',
                    'grade' => 'A+',
                    'input' => 'DisplayPort',
                    'comments' => 'Tasa de refresco alta y tiempo de respuesta rápido para una experiencia de juego fluida.',
                    'categories_id' => 1
                ],
                [
                    'description' => 'Monitor portátil para viajes',
                    'stock' => 8,
                    'location' => 'Bodega H',
                    'brand' => 'ViewSonic',
                    'size' => '15.6"',
                    'format' => 'Portable',
                    'grade' => 'B',
                    'input' => 'USB-C',
                    'comments' => 'Compacto y ligero para llevarlo fácilmente durante tus viajes.',
                    'categories_id' => 1
                ],
                [
                    'description' => 'Monitor portátil',
                    'stock' => 10,
                    'location' => 'Bodega A',
                    'brand' => 'ViewSonic',
                    'size' => '17"',
                    'format' => 'Portable',
                    'grade' => 'C',
                    'input' => 'USB .30',
                    'comments' => 'Para viajes de mejor capacidad',
                    'categories_id' => 1
                ]


            ],
            2 => [
                // CPU
                [
                    'description' => '--',
                    'stock' => 20,
                    'location' => 'Bodega D',
                    'brand' => 'Lenovo',
                    'model' => '3020',
                    'format' => 'Tiny',
                    'processor' => 'i3 2Gen',
                    'comments' => 'equipo dañado',
                    'categories_id' => 2
                ],

                [
                    'description' => '--',
                    'stock' => 5,
                    'location' => 'Bodega A',
                    'brand' => 'Dell',
                    'model' => '7050',
                    'format' => 'Micro',
                    'processor' => 'i9 8Gen',
                    'comments' => '--',
                    'categories_id' => 2
                ],

                [
                    'description' => '--',
                    'stock' => 80,
                    'location' => 'Bodega B',
                    'brand' => 'Asus',
                    'model' => '8200',
                    'format' => 'Tiny',
                    'processor' => 'i7 7Gen',
                    'comments' => '--',
                    'categories_id' => 2
                ],

                [
                    'description' => '--',
                    'stock' => 100,
                    'location' => 'Bodega C',
                    'brand' => 'Acer',
                    'model' => '600G1',
                    'format' => 'Desktop',
                    'processor' => 'AMD',
                    'comments' => '--',
                    'categories_id' => 2
                ],

            ],

            3 => [
                // Almacenamiento
                [
                    'description' => '--',
                    'stock' => 69,
                    'location' => 'Bodega D',
                    'brand' => 'Kingston',
                    'format' => '2.5',
                    'capacity' => '128GB',
                    'technology' => 'SSD',
                    'status' => 'Usado',
                    'comments' => 'dañado',
                    'categories_id' => 3
                ],

                [
                    'description' => '--',
                    'stock' => 42,
                    'location' => 'Bodega A',
                    'brand' => 'Adata',
                    'format' => '2230',
                    'capacity' => '256GB',
                    'technology' => 'HHD',
                    'status' => 'Nuevo',
                    'comments' => '--',
                    'categories_id' => 3
                ],
                [
                    'description' => 'SSD de alta velocidad para juegos',
                    'stock' => 35,
                    'location' => 'Bodega B',
                    'brand' => 'Samsung',
                    'format' => 'M.2',
                    'capacity' => '1TB',
                    'technology' => 'SSD',
                    'status' => 'Nuevo',
                    'comments' => 'Optimizado para cargas rápidas de juegos y transferencias de datos.',
                    'categories_id' => 3
                ],
                [
                    'description' => 'Disco duro externo portátil',
                    'stock' => 50,
                    'location' => 'Bodega C',
                    'brand' => 'Seagate',
                    'format' => 'Portable',
                    'capacity' => '2TB',
                    'technology' => 'HDD',
                    'status' => 'Nuevo',
                    'comments' => 'Almacenamiento adicional y portátil para respaldos y viajes.',
                    'categories_id' => 3
                ],
                [
                    'description' => 'SSD para almacenamiento de archivos multimedia',
                    'stock' => 20,
                    'location' => 'Bodega E',
                    'brand' => 'Crucial',
                    'format' => '2.5"',
                    'capacity' => '512GB',
                    'technology' => 'SSD',
                    'status' => 'Nuevo',
                    'comments' => 'Velocidades de transferencia rápidas para edición de video y fotografía.',
                    'categories_id' => 3
                ],
                [
                    'description' => 'Tarjeta de memoria SD de alta capacidad',
                    'stock' => 60,
                    'location' => 'Bodega F',
                    'brand' => 'SanDisk',
                    'format' => 'SDXC',
                    'capacity' => '256GB',
                    'technology' => 'SD',
                    'status' => 'Nuevo',
                    'comments' => 'Almacena una gran cantidad de fotos, videos y archivos multimedia.',
                    'categories_id' => 3
                ],
                [
                    'description' => 'HDD interno para almacenamiento de datos',
                    'stock' => 30,
                    'location' => 'Bodega G',
                    'brand' => 'Western Digital',
                    'format' => '3.5"',
                    'capacity' => '4TB',
                    'technology' => 'HDD',
                    'status' => 'Nuevo',
                    'comments' => 'Alta capacidad de almacenamiento para archivos grandes y de uso intensivo.',
                    'categories_id' => 3
                ]



            ],

            4 => [
                // Teclados
                [
                    'description' => '--',
                    'stock' => 56,
                    'location' => 'Bodega D',
                    'brand' => 'Logitech',
                    'port' => 'USB 3.0',
                    'status' => 'Usado',
                    'comments' => '--',
                    'categories_id' => 4
                ],

                [
                    'description' => '--',
                    'stock' => 30,
                    'location' => 'Bodega E',
                    'brand' => 'corsair',
                    'port' => 'USB 2.0',
                    'status' => 'Nuevo',
                    'comments' => '--',
                    'categories_id' => 4
                ],

                [
                    'description' => '--',
                    'stock' => 3,
                    'location' => 'Bodega A',
                    'brand' => 'HP',
                    'port' => 'USB 3.0',
                    'status' => 'Nuevo',
                    'comments' => '--',
                    'categories_id' => 4
                ],


            ],

            5 => [
                // RAM
                [
                    'description' => '--',
                    'stock' => 100,
                    'location' => 'Bodega B',
                    'brand' => 'Adata',
                    'format' => 'PC',
                    'capacity' => '16GB',
                    'technology' => 'DDR4',
                    'status' => 'Nuevo',
                    'comments' => '--',
                    'categories_id' => 5
                ],

                [
                    'description' => '--',
                    'stock' => 97,
                    'location' => 'Bodega A',
                    'brand' => 'Kingston FURY',
                    'format' => 'Laptop',
                    'capacity' => '32GB',
                    'technology' => 'DDR5',
                    'status' => 'Nuevo',
                    'comments' => '--',
                    'categories_id' => 5
                ],

                [
                    'description' => 'Memoria RAM DDR4 16GB para PC',
                    'stock' => 100,
                    'location' => 'Bodega B',
                    'brand' => 'Adata',
                    'format' => 'PC',
                    'capacity' => '16GB',
                    'technology' => 'DDR4',
                    'status' => 'Nuevo',
                    'comments' => 'Optimizada para rendimiento multitarea.',
                    'categories_id' => 5
                ],

                [
                    'description' => 'Memoria RAM DDR4 8GB para PC',
                    'stock' => 80,
                    'location' => 'Bodega C',
                    'brand' => 'Corsair',
                    'format' => 'PC',
                    'capacity' => '8GB',
                    'technology' => 'DDR4',
                    'status' => 'Nuevo',
                    'comments' => 'Mejora la velocidad y la capacidad de respuesta del sistema.',
                    'categories_id' => 5
                ],
                [
                    'description' => 'Memoria RAM DDR4 32GB para PC',
                    'stock' => 120,
                    'location' => 'Bodega D',
                    'brand' => 'Crucial',
                    'format' => 'PC',
                    'capacity' => '32GB',
                    'technology' => 'DDR4',
                    'status' => 'Nuevo',
                    'comments' => 'Ideal para usuarios exigentes y aplicaciones intensivas.',
                    'categories_id' => 5
                ],
                [
                    'description' => 'Memoria RAM DDR4 4GB para PC',
                    'stock' => 50,
                    'location' => 'Bodega A',
                    'brand' => 'G.Skill',
                    'format' => 'PC',
                    'capacity' => '4GB',
                    'technology' => 'DDR4',
                    'status' => 'Nuevo',
                    'comments' => 'Mejora la eficiencia y la velocidad de la computadora.',
                    'categories_id' => 5
                ],
                [
                    'description' => 'Memoria RAM DDR5 16GB para Laptop',
                    'stock' => 90,
                    'location' => 'Bodega E',
                    'brand' => 'Samsung',
                    'format' => 'Laptop',
                    'capacity' => '16GB',
                    'technology' => 'DDR5',
                    'status' => 'Nuevo',
                    'comments' => 'Diseñada para laptops de alto rendimiento y gaming.',
                    'categories_id' => 5
                ],
                [
                    'description' => 'Memoria RAM DDR4 8GB para PC',
                    'stock' => 110,
                    'location' => 'Bodega G',
                    'brand' => 'TeamGroup',
                    'format' => 'PC',
                    'capacity' => '16GB',
                    'technology' => 'DDR4',
                    'status' => 'Nuevo',
                    'comments' => 'Rendimiento estable y confiable en entornos exigentes.',
                    'categories_id' => 5
                ]

            ],


            6 => [
                // Mouse
                [
                    'description' => 'Mouse óptico con cable',
                    'stock' => 14,
                    'location' => 'Bodega C',
                    'brand' => 'Logitech',
                    'port' => 'PS2',
                    'status' => 'Nuevo',
                    'comments' => 'Diseño ergonómico para mayor comodidad.',
                    'categories_id' => 6
                ],
                [
                    'description' => 'Mouse inalámbrico',
                    'stock' => 5,
                    'location' => 'Bodega D',
                    'brand' => 'Logitech',
                    'port' => 'USB',
                    'status' => 'Usado',
                    'comments' => 'Conexión confiable y sin cables molestos.',
                    'categories_id' => 6
                ],
                [
                    'description' => 'Mouse óptico con luz LED',
                    'stock' => 9,
                    'location' => 'Bodega E',
                    'brand' => 'HP',
                    'port' => 'USB 3.0',
                    'status' => 'Nuevo',
                    'comments' => 'Iluminación LED para estética y visibilidad en la oscuridad.',
                    'categories_id' => 6
                ],
                [
                    'description' => 'Mouse ergonómico para gaming',
                    'stock' => 7,
                    'location' => 'Bodega A',
                    'brand' => 'Razer',
                    'port' => 'USB',
                    'status' => 'Nuevo',
                    'comments' => 'Diseñado para sesiones de juego prolongadas.',
                    'categories_id' => 6
                ],
                [
                    'description' => 'Mouse compacto para portátiles',
                    'stock' => 10,
                    'location' => 'Bodega B',
                    'brand' => 'Microsoft',
                    'port' => 'USB',
                    'status' => 'Nuevo',
                    'comments' => 'Diseño ligero y portátil para llevar a todas partes.',
                    'categories_id' => 6
                ],





            ],


        ];

        foreach ($categories as $categoryId => $products) {
            foreach ($products as $productData) {
                $product = new Product();
                $product->categories_id = $categoryId;
                $product->description = $productData['description'];
                $product->stock = $productData['stock'];
                $product->location = $productData['location'];
                $product->brand = $productData['brand'];

                // Agrega aquí los demás campos específicos de cada categoría
                switch ($categoryId) {
                    case 1: // Monitores
                        $product->size = $productData['size'];
                        $product->format = $productData['format'];
                        $product->grade = $productData['grade'];
                        $product->input = $productData['input'];
                        break;
                    case 2: // CPU
                        $product->model = $productData['model']; // Asigna el modelo
                        $product->format = $productData['format'];
                        $product->processor = $productData['processor'];
                        break;
                    case 3: // Almacenamiento
                        $product->format = $productData['format'];
                        $product->capacity = $productData['capacity'];
                        $product->technology = $productData['technology'];
                        $product->status = $productData['status'];
                        break;
                    case 4: // Teclados
                        $product->port = $productData['port'];
                        $product->status = $productData['status'];
                        break;
                    case 5: // RAM
                        $product->format = $productData['format'];
                        $product->capacity = $productData['capacity'];
                        $product->technology = $productData['technology'];
                        $product->status = $productData['status'];
                        break;
                    case 6: // Mouse
                        $product->port = $productData['port'];
                        $product->status = $productData['status'];
                        break;
                    default:
                        // Por defecto, no se hace nada
                        break;
                }

                $product->comments = $productData['comments'];
                $product->save();
            }
        }
    }
}
