<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['category_name'];
    
    /**
     * Define a relationship with the Product model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        // Define una relación de uno a muchos con el modelo Product.
        // Esto indica que una categoría puede tener muchos productos.
        // El segundo parámetro en la función hasMany indica la clave externa en la tabla de productos que referencia la clave primaria de la categoría.
      return $this->hasMany(Product::class, 'id');

    }


}
