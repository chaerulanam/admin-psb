<?php

namespace App\Models;

use CodeIgniter\Model;

class GrupModel extends Model
{
    protected $table = 'auth_groups';
    protected $primaryKey = 'id';
    protected $returnType = GrupModel::class;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'description'];
}
