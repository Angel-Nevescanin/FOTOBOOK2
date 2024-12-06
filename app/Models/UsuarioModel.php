<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    // Definir el nombre de la tabla y la llave primaria
    protected $table = "usuarios_244321";  // Tu tabla original
    protected $primaryKey = "id";   // Llave primaria de la tabla

    // Campos que pueden ser insertados o actualizados
    protected $allowedFields = ["nombre", "password", "telefono", "imagen", "email"]; // Agrega 'email' si no estaba previamente

    // Habilitar marcas de tiempo automáticas
    protected $useTimestamps = true;
    protected $createdField = "created_at";
    protected $updatedField = "updated_at";

    // Método para obtener un usuario por su correo electrónico
    public function getUsuarioByEmail($email)
    {
        return $this->where('email', $email)->first();  // Buscar un usuario con el correo proporcionado
    }
}
