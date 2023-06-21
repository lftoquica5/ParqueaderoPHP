<?php

namespace App\Models;

use CodeIgniter\Model;

class ConductorModel extends Model
{
    protected $table = 'conductores';
    protected $primaryKey = 'id_conductores';
    protected $allowedFields = ['nombre', 'numero_licencia'];
}
