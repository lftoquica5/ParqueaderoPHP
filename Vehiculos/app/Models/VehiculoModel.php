<?php

namespace App\Models;

use CodeIgniter\Model;

class VehiculoModel extends Model
{
    protected $table = 'vehiculos';
    protected $primaryKey = 'id_vehiculos';
    protected $allowedFields = ['marca', 'modelo', 'placa'];

}
