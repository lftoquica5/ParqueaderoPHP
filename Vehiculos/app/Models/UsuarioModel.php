<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id';

    public function verifyCredentials($username, $password)
    {
        // Verifica las credenciales en la base de datos
        $user = $this->where('nombre_usuario', $username)
                     ->where('contraseña', $password)
                     ->first();

        return $user !== null;
    }
}
