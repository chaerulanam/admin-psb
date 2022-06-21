<?php

namespace App\Models;

use CodeIgniter\Model;

class TagihanModel extends Model
{
    protected $table = 'tagihan';
    protected $primaryKey = 'id';
    protected $returnType = TagihanModel::class;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['no_tagihan', 'master_tagihan_id', 'user_id', 'nominal', 'user_id', 'status', 'deskripsi', 'created_at', 'updated_at'];
}
