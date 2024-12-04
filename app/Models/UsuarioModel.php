<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model {

    protected $table = "productos"; // Nombre de la tabla en la base de datos
    protected $primaryKey = "id";   // Llave primaria de la tabla

    // Campos que pueden ser insertados o actualizados
    protected $allowedFields = ["nombre", "descripcion", "precio", "imagen", "usuario_id"];

    // Habilitar marcas de tiempo automáticas
    protected $useTimestamps = true;
    protected $createdField = "created_at";
    protected $updatedField = "updated_at";
}
