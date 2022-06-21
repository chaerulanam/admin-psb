<?php

namespace App\Models;

use CodeIgniter\Model;

class RekeningModel extends Model
{
    protected $table = 'rekening';
    protected $primaryKey = 'id';
    protected $returnType = RekeningModel::class;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_bank', 'no_rekening', 'created_at', 'updated_at'];
}
