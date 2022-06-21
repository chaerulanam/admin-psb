<?php

namespace App\Models;

use CodeIgniter\Model;

class WaliModel extends Model
{
    protected $table = 'wali';
    protected $primaryKey = 'id';
    protected $returnType = WaliModel::class;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_wali', 'hubungan_sosial', 'pekerjaan_wali', 'penghasilan_wali', 'hp_wali', 'user_id'];
}
