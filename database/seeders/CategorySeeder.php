<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "Monitores",
            "CPU",
            "Almacenamiento",
            "Teclados",
            "RAM",
            "Mouse",
        ];
    
        foreach ($categories as $categoryName) {
            $category = new Category();
            $category->category_name = $categoryName;
            $category->save();
        }
    }
}
