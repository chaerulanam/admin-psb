<?php

namespace App\Controllers;

use App\Database\Migrations\Rekening;
use App\Models\InvoiceModel;
use App\Models\OrangtuaModel;
use App\Models\PembayaranModel;
use App\Models\ProfilModel;
use App\Models\RekeningModel;
use App\Models\TagihanModel;
use App\Models\WaliModel;

class InvoiceSantri extends BaseController
{
    public function __construct()
    {
        $this->profilModel = new ProfilModel();
        $this->tagihanModel = new TagihanModel();
        $this->rekeningModel = new RekeningModel();
        $this->pembayaranModel = new PembayaranModel();
        $this->invoiceModel = new InvoiceModel();
        $this->invoiceModel = new InvoiceModel();

        helper('number');
    }


    public function index()
    {
        $data = [
            'statusbayar' =>  $this->tagihanModel->where('user_id', user()->id)->get()->getRow()->status,
            'statuskonfirm' =>  $this->pembayaranModel
                ->join('tagihan', 'tagihan_id = tagihan.id')
                ->where('user_id', user()->id)
                ->where('bukti !=', null)
                ->countAllResults(),
            'rekening' => $this->rekeningModel->findAll(),
            'invoice' => $this->pembayaranModel
                ->join('tagihan', 'tagihan_id = tagihan.id')
                ->where('user_id', user()->id)
                ->countAllResults(),
            'bayar' => $this->tagihanModel
                ->select('pembayaran.id as idbayar, nama_tagihan, nama_bank, no_rekening, no_tagihan, nominal')
                ->join('pembayaran', 'tagihan_id = tagihan.id', 'LEFT')
                ->join('master_tagihan', 'master_tagihan_id = master_tagihan.id')
                ->join('rekening', 'rekening_id = rekening.id', 'LEFT')
                ->where('user_id', user()->id)->get()->getRow(),
            'state' => $this->profilModel->where('user_id', user()->id)->countAllResults(),
            'profil' => $this->profilModel->where('user_id', user()->id)->get()->getRow(),
            'title_meta' => view('partials/title-meta', ['title' => 'Tagihan']),
            'page_title' => view('partials/page-title', ['title' => 'Tagihan', 'pagetitle' => 'Tagihan']),
            'title_table' => "Table Invoice Santri",
        ];

        // dd($data);
        return view('invoicesantri', $data);
    }

    public function datatable()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();

            if ($posts = $this->invoiceModel
                ->select('no_invoice, invoice.status as status, nominal, tagihan.deskripsi as desk')
                ->join('tagihan', 'tagihan_id = tagihan.id')
                ->join('master_tagihan', 'master_tagihan_id = master_tagihan.id')
                ->where('user_id', user()->id)
                ->groupBy('no_invoice')
                ->selectSum('nominal')
                ->findAll()
            ) {

                $no = 0;
                foreach ($posts as $key) {
                    if (!$pembayaran = $this->pembayaranModel->where('no_invoice', $key->no_invoice)->get()->getRow()) {
                        $no++;
                        $row = array();

                        $row[] = $no;
                        $row[] = $key->no_invoice;
                        $row[] = number_to_currency($key->nominal, 'IDR', null);
                        $row[] = $key->desk;
                        $row[] = '<div class="btn-group d-flex justify-content-center">
                    <button type="button" class="btn btn-primary waves-effect waves-light" id="button-bayar" data-bs-toggle="modal" data-bs-target=".modal-bayar" data-id="' . $key->no_invoice . '" data-nominal="' . $key->nominal . '"> <i class="uil uil-plus" > Bayar </i></button>
                        </a>
                        </div>';

                        $data[] = $row;
                    } else {
                        $no++;
                        $row = array();

                        $row[] = $no;
                        $row[] = $key->no_invoice;
                        $row[] = number_to_currency($key->nominal, 'IDR', null);
                        $row[] = '';

                        if ($key->status == 0 && $pembayaran->status == 0) {
                            $row[] = '<span class="badge bg-success text-white">Sudah Lunas</span>';
                        } else if ($key->status == 1 && $pembayaran->status == 1) {
                            $row[] = '<span class="badge bg-warning text-white">Pending</span>';
                        }
                        $data[] = $row;
                    }
                }
                $data = array('responce' => 'success', 'posts' => $data);
            } else {
                $data = array('responce' => 'success', 'posts' => '');
            }
            $data[$csrfname] = $csrfhash;
            return $this->response->setJSON($data);
            // dd($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function invoice()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();
            $id = $this->request->getPost('id');
            $total = 0;
            for ($i = 0; $i < count($id); $i++) {
                if ($id[$i] > 0) {
                    $posts = $this->tagihanModel
                        ->select('tagihan.id as idtagihan, no_tagihan, tagihan.status as status, master_tagihan.deskripsi as desc, nama_tagihan, nominal')
                        ->join('master_tagihan', 'master_tagihan_id = master_tagihan.id')
                        ->where('tagihan.id', $id[$i])
                        ->get()->getRow();
                    $row = array();
                    $row[] = $i + 1;
                    $row[] = $posts->nama_tagihan;
                    $row[] = $posts->desc;
                    $row[] = number_to_currency($posts->nominal, 'IDR', null);
                    $data[] = $row;
                    $total += $posts->nominal;
                }
            }
            $data = array('responce' => 'success', 'posts' => $data, 'total' => number_to_currency($total, 'IDR', null));
            $data[$csrfname] = $csrfhash;
            return $this->response->setJSON($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function invoice_add()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();

            $tagihan_id = $this->request->getPost('tagihan_id');

            for ($i = 0; $i < count($tagihan_id); $i++) {
                if ($tagihan_id[$i] > 0) {
                    $row = [
                        'no_invoice' => $this->request->getPost('no_invoice'),
                        'tagihan_id' => $tagihan_id[$i],
                        'status' => 1,
                    ];
                    $data[] = $row;
                }
            }

            if (!$this->invoiceModel->insertBatch($data)) {
                $data = array('error' => 'Gagal Membuat Invoice',);
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            $data = array('success' => 'Berhasil Membuat Invoice', 'no_invoice' => $this->request->getPost('no_invoice'));
            $data[$csrfname] = $csrfhash;
            return $this->response->setJSON($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function getdetail()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();

            $noinvoice = $this->request->getPost('no_invoice');
            $data = [
                'no_invoice' => $noinvoice,
                ''
            ];

            // if (!$this->invoiceModel->insertBatch($data)) {
            //     $data = array('error' => 'Gagal Membuat Invoice',);
            //     $data[$csrfname] = $csrfhash;
            //     return $this->response->setJSON($data);
            // }

            $data = array('response' => 'Berhasil Membuat Invoice', $data);
            $data[$csrfname] = $csrfhash;
            return $this->response->setJSON($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}