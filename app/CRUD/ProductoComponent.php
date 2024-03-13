<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Producto;
use App\Models\Categoria; // Importa el modelo de Categoría
use App\Models\Marca; // Importa el modelo de Categoría
use App\Models\Unidad; // Importa el modelo de Categoría




class ProductoComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    public function getModel()
    {
        return Producto::class;
    }

    // which kind of data should be showed in list page
  // Define los campos virtuales para la lista
  public function fields()
  {
      return [
          'codigo',
          'nombre',
          'abreviatura',
          'categoria.nombre', // Cambiamos el nombre del campo a "categ"
          'marca.nombre',
          'unidad.nombre',
          'p_compra',
          'p_venta',
      ];
  }
  
  
  
  
    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['codigo', 'nombre', 'abreviatura', 'categoria_id', 'marca_id', 'unidad_id', 'p_compra', 'p_venta'];
    }
// 'marca', 'unidad', 'p_compra', 'p_venta'
    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        $options = $this->options(); // Obtenemos las opciones del método options()
        
        return [
            'codigo' => 'number',
            'nombre' => 'text',
            'abreviatura' => 'text',
            'categoria_id' => [
                'select' => $options['categoria_id'], // Pasamos las opciones del campo categoria_id
            ],
            'marca_id' => [
                'select' => $options['marca_id'], // Pasamos las opciones del campo marca_id
            ],
            'unidad_id' => [
                'select' => $options['unidad_id'], // Pasamos las opciones del campo unidad_id
            ],
            'p_compra' => 'text',
            'p_venta' =>  'text',
              
        ];
    }
    
    
    
     // Define las opciones para el menú desplegable
 public function options()
{
    // Obtener todas las categorías disponibles
    $categorias = Categoria::pluck('nombre', 'id')->toArray();
    $marcas = Marca::pluck('nombre', 'id')->toArray();
    $unidads = Unidad::pluck('nombre', 'id')->toArray();


    return [
        'categoria_id' => $categorias,'marca_id' => $marcas,'unidad_id' => $unidads,
    ];
}

     
    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'codigo' => 'required|numeric',
            'nombre' => 'required|string|max:255',
            'abreviatura' => 'required|string|max:50',
            'p_compra' => 'required|numeric|min:0',
            'p_venta' => 'required|numeric|min:0',
        ];
    }
    

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }

     
}

