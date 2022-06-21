<?php

namespace App\Controllers;

use App\Models\InvoiceModel;
use App\Models\PembayaranModel;
use App\Models\ProfilModel;
use App\Models\TagihanModel;

class CetakInvoice extends BaseController
{
    public function __construct()
    {
        $this->profilModel = new ProfilModel();
        $this->pembayaranModel = new PembayaranModel();
        $this->tagihanModel = new TagihanModel();
        $this->invoiceModel = new InvoiceModel();

        helper('number');
    }


    public function index()
    {
        $no_invoice = $this->request->getGet('id');
        $invoice = $this->invoiceModel
            ->select('users.id as userid, invoice.id as invoiceid, master_tagihan.deskripsi, tagihan.id as tagihanid, nama_lengkap, GROUP_CONCAT(nama_tagihan SEPARATOR "<br>") as nama_tagihan, nominal, no_invoice, invoice.status as statusinv')
            ->join('tagihan', 'tagihan_id = tagihan.id')
            ->join('master_tagihan', 'master_tagihan_id = master_tagihan.id')
            ->join('users', 'tagihan.user_id = users.id')
            ->join('profil', 'profil.user_id = users.id')
            ->where('no_invoice', $no_invoice)
            ->groupBy('no_invoice')
            ->selectSum('nominal')
            ->get()->getRow();

        $id = $invoice->userid;

        $data = [
            'invoice' => $invoice,
            'tagihan' => $this->tagihanModel
                ->select('pembayaran.id as idbayar, nama_tagihan, nama_bank, no_rekening, no_tagihan, nominal')
                ->join('pembayaran', 'tagihan_id = tagihan.id', 'LEFT')
                ->join('master_tagihan', 'master_tagihan_id = master_tagihan.id')
                ->join('rekening', 'rekening_id = rekening.id', 'LEFT')
                ->where('user_id', $id)->get()->getRow(),
            'profil' => $this->profilModel->where('user_id', $id)->get()->getRow(),
            'title_meta' => view('partials/title-meta', ['title' => 'Tagihan']),
            'page_title' => view('partials/page-title', ['title' => 'Tagihan', 'pagetitle' => 'Tagihan']),
            'title_table' => "Table Invoice Santri",
        ];
        // dd($data);
        return view('cetakinvoice', $data);
    }
}