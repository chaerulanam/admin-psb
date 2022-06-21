<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id';
    protected $returnType = PembayaranModel::class;
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['tagihan_id', 'bukti', 'status', 'rekening_id', 'no_invoice', 'created_at', 'updated_at'];
}
