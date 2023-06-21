<?php

namespace App\Models;

use CodeIgniter\Model;

class InicioModel extends Model
{
    protected $table = 'vehiculos';
    protected $primaryKey = 'id_vehiculos';
    protected $allowedFields = ['marca', 'modelo', 'placa', 'tiempo_ingreso', 'tiempo_salida', 'tiempo_estadia'];
}
