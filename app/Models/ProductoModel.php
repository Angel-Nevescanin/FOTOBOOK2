<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model {

    protected $table = "productos"; // Nombre de la tabla en la base de datos
    protected $primaryKey = "id";   // Llave primaria de la tabla

    // Campos que pueden ser insertados o actualizados
    protected $allowedFields = ["Nombre", "Descripcion", "Precio", "Imagen", "usuario_id"];

    // Habilitar marcas de tiempo automáticas
    protected $useTimestamps = true;
    protected $createdField = "created_at";
    protected $updatedField = "updated_at";

    // Opcional: Validaciones para los campos
    protected $validationRules = [
        "Nombre" => "required|min_length[3]|max_length[255]",
        "Descripcion" => "permit_empty|max_length[500]",
        "Precio" => "required|decimal|greater_than[0]",
        "Imagen" => "permit_empty|string|max_length[255]",
        "usuario_id" => "required|integer"
    ];

    protected $validationMessages = [
        "Nombre" => [
            "required" => "El nombre del producto es obligatorio.",
            "min_length" => "El nombre debe tener al menos 3 caracteres.",
            "max_length" => "El nombre no puede exceder los 255 caracteres."
        ],
        "Precio" => [
            "required" => "El precio del producto es obligatorio.",
            "decimal" => "El precio debe ser un número decimal válido.",
            "greater_than" => "El precio debe ser mayor a 0."
        ],
        "usuario_id" => [
            "required" => "El ID del usuario es obligatorio.",
            "integer" => "El ID del usuario debe ser un número entero válido."
        ]
    ];
}
