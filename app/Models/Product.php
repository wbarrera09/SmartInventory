<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['description', 'stock', 'location', 'size', 'format', 'grade',
    'input', 'brand', 'model', 'processor', 'capacity', 'technology', 'status', 'port', 'comments', 
    'categories_id'];

    /**
     * Define a relationship with the Category model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        // Define una relación de pertenencia a uno con el modelo Category.
        // Esto indica que un producto pertenece a una categoría.
        // El segundo parámetro en la función belongsTo indica la clave externa en la tabla de productos que referencia la clave primaria de la categoría.
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
