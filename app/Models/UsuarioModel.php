<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model {

    protected $table = "usuarios"; // Cambia a la tabla adecuada para usuarios
    protected $primaryKey = "id";  // Llave primaria de la tabla

    // Campos que pueden ser insertados o actualizados
    protected $allowedFields = ["nombre", "email", "password", "created_at", "updated_at"];

    // Habilitar marcas de tiempo automáticas
    protected $useTimestamps = true;
    protected $createdField = "created_at";
    protected $updatedField = "updated_at";
}
