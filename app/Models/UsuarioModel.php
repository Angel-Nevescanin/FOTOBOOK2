<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model {

    protected $table = "usuarios_244321"; // Nombre de la tabla en la base de datos
    protected $primaryKey = "id";   // Llave primaria de la tabla

    // Campos que pueden ser insertados o actualizados
    protected $allowedFields = ["nombre", "password", "telefono", "imagen"];

    // Habilitar marcas de tiempo automáticas
    protected $useTimestamps = true;
    protected $createdField = "created_at";
    protected $updatedField = "updated_at";
}
