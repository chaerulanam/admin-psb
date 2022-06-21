<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceModel extends Model
{
    protected $table = 'invoice';
    protected $primaryKey = 'id';
    protected $returnType = InvoiceModel::class;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['tagihan_id', 'no_invoice', 'status', 'created_at', 'updated_at'];
}
