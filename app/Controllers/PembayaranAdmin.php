<?php

namespace App\Controllers;

use App\Models\InvoiceModel;
use App\Models\PembayaranModel;
use App\Models\ProfilModel;
use App\Models\RekeningModel;
use App\Models\TagihanModel;

class PembayaranAdmin extends BaseController
{
    public function __construct()
    {
        $this->profilModel = new ProfilModel();
        $this->tagihanModel = new TagihanModel();
        $this->rekeningModel = new RekeningModel();
        $this->pembayaranModel = new PembayaranModel();
        $this->invoiceModel = new InvoiceModel();

        helper('number');
    }

    public function index()
    {
        $data = [
            // 'bayar' => $this->tagihanModel->where('user_id', user()->id)->get()->getRow()->status,
            // 'state' => $this->profilModel->where('user_id', user()->id)->countAllResults(),
            'profil' => $this->profilModel->where('user_id', user()->id)->get()->getRow(),
            // 'orangtua' => $this->orangtuaModel->where('user_id', user()->id)->get()->getRow(),
            // 'wali' => $this->waliModel->where('user_id', user()->id)->get()->getRow(),
            'title_meta' => view('partials/title-meta', ['title' => 'Welcome']),
            'page_title' => view('partials/page-title', ['title' => 'Welcome', 'pagetitle' => 'Welcome']),
            'title_table' => 'Table Pembayaran Registrasi',
            'title_table_' => 'Table Pembayaran Tagihan Lain',
        ];

        // dd($data);
        return view('pembayaranadmin', $data);
    }

    public function datatable_pendaftaran()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();
            if ($posts = $this->pembayaranModel
                ->select('tagihan.id as tagihanid, pembayaran.id as pembayaranid, email, no_tagihan, tagihan.status as statustagihan, pembayaran.status as statuspembayaran, nama_tagihan, nominal, pembayaran.updated_at as waktubukti, bukti')
                ->join('tagihan', 'tagihan_id= tagihan.id')
                ->join('master_tagihan', 'master_tagihan_id = master_tagihan.id')
                ->join('users', 'tagihan.user_id = users.id')
                // ->join('invoice', 'tagihan_id = tagihan.id', 'LEFT')
                ->orderBy('pembayaran.id', 'DESC')
                ->findAll()
            ) {
                $no = 0;
                foreach ($posts as $key) {
                    $no++;
                    $row = array();
                    $row[] = $no;
                    $row[] = $key->no_tagihan;
                    $row[] = $key->nama_tagihan;
                    $row[] = number_to_currency($key->nominal, 'IDR', null);
                    $row[] = '<a class="image-popup-vertical-fit" href="assets/images/bukti/' . date('d-m-Y', strtotime($key->waktubukti)) . '/' . $key->bukti . '" title="Caption. Can be aligned it to any side and contain any HTML.">
                    <img class="img-fluid" alt="" src="assets/images/bukti/' . date('d-m-Y', strtotime($key->waktubukti)) . '/' . $key->bukti . '" width="145">
                    </a>';
                    if ($key->statuspembayaran == 0) {
                        $row[] = '<span class="badge bg-success text-white">Sudah Lunas</span>';
                        $row[] = '<div class="btn-group d-flex justify-content-center">
                        <a href="https://api.whatsapp.com/send/?phone=' . preg_replace("/0/", "62", $key->email, 1) . '&text=Assalamualaikum%20wr.%20wb.%20%0AAlhamdulillah...%20Biaya%20Pendaftaran%20Calon%20Santri%20Baru%20Pesantren%20Al-Ishlah%20Tajug%20Tahun%20Ajaran%202022/2023%20telah%20kami%20terima%20dengan%20nomor%20tagihan:%20' . $key->no_tagihan . '%20%0ASilakan%20lanjutkan%20pengisian%20identitas%20yang%20telah%20ditetapkan%20dan%20ikuti%20proses%20selanjutny.%20%0AApabila%20ada%20pertanyaan%20seputar%20pendaftaran%20calon%20santri%20baru%20bisa%20menghubungi%20kami.%20Hormat%20Kami,%20%0APanitia%20PSB%20Al-Ishlah%20Tajug" target="_blank" type="button" class="btn btn-success waves-effect waves-light"> <i class="uil-comment" > WA </i></a>
                        </div>';
                    } else {
                        $row[] = '<span class="badge bg-danger text-white">Belum Lunas</span>';
                        $row[] = '<div class="btn-group d-flex justify-content-center">
                        <button type="button" class="btn btn-primary waves-effect waves-light" id="button-terima" data-id="' . $key->pembayaranid . '" data-tag="' . $key->tagihanid . '"> <i class="uil-comment-check" > Terima </i></button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" id="modal-tolak" data-bs-toggle="modal" data-bs-target=".modal-tolak" data-id="' . $key->pembayaranid . '" data-tag="' . $key->tagihanid . '"> <i class="uil-comment-block" > Tolak </i></button>
                        </div>';
                    }

                    $data[] = $row;
                }
                $data = array('responce' => 'success', 'posts' => $data);
            } else {
                $data = array('responce' => 'success', 'posts' => '');
            }
            $data[$csrfname] = $csrfhash;
            return $this->response->setJSON($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function konfirmasi()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();
            $pembayaranid = $this->request->getPost('pembayaranid');
            $tagihanid = $this->request->getPost('tagihanid');

            $tagihan = $this->tagihanModel->find($tagihanid);

            $data = [
                'id' => $pembayaranid,
                'status' => 0,
            ];

            if (!$this->pembayaranModel->save($data)) {
                $data = array('error' => 'Gagal Mengubah Status Pembayaran', 'posts' => $data);
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }
            $data = [
                'id' => $tagihanid,
                'status' => 0,
            ];
            if (!$this->tagihanModel->save($data)) {
                $data = array('error' => 'Gagal Mengubah Status Tagihan', 'posts' => $data);
                $data[$csrfname] = $csrfhash;
                $data = [
                    'id' => $pembayaranid,
                    'status' => 1,
                ];
                if (!$this->pembayaranModel->save($data)) {
                    $data = array('error' => 'Gagal Mengembalikan Status Pembayaran', 'posts' => $data);
                    $data[$csrfname] = $csrfhash;
                    return $this->response->setJSON($data);
                }
                return $this->response->setJSON($data);
            }

            $data = [
                'user_id' => user()->id,
                'pesan' => 'Mengonfirmasi No tagihan ' . $tagihan->no_tagihan,
            ];
            $this->logModel->save($data);

            $data = array('success' => 'Berhasil Menerima Pembayaran');
            $data[$csrfname] = $csrfhash;
            return $this->response->setJSON($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function tolak()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();
            $pembayaranid = $this->request->getPost('pembayaranid');
            $tagihanid = $this->request->getPost('tagihanid');

            $key = $this->pembayaranModel->find($pembayaranid);
            $tagihan = $this->tagihanModel->find($tagihanid);

            unlink('assets/images/bukti/' . date('d-m-Y') . '/' . $key->bukti);

            $data = [
                'id' => $pembayaranid,
                'bukti' => null,
            ];

            if (!$this->pembayaranModel->save($data)) {
                $data = array('error' => 'Gagal Menghapus Bukti', 'posts' => $data);
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            $data = [
                'id' => $tagihanid,
                'deskripsi' => $this->request->getPost('deskripsi'),
            ];

            if (!$this->tagihanModel->save($data)) {
                $data = array('error' => 'Gagal Menambah Deskripsi', 'posts' => $data);
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            $data = [
                'user_id' => user()->id,
                'pesan' => 'Menolak No tagihan ' . $tagihan->no_tagihan,
            ];
            $this->logModel->save($data);

            $data = array('success' => 'Berhasil Menolak Pembayaran', 'posts' => $data);
            $data[$csrfname] = $csrfhash;
            return $this->response->setJSON($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function datatable_tagihan()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();
            if ($posts = $this->pembayaranModel
                // ->select('tagihan.id as tagihanid, pembayaran.id as pembayaranid, no_tagihan, tagihan.status as statustagihan, pembayaran.status as statuspembayaran, nama_tagihan, nominal, pembayaran.created_at as waktubukti, bukti')
                ->where('no_invoice !=', null)
                // ->join('invoice', 'tagihan_id = tagihan.id', 'LEFT')
                ->orderBy('no_invoice', 'DESC')
                ->findAll()
            ) {
                $no = 0;
                foreach ($posts as $key1) {
                    if ($post = $this->invoiceModel
                        ->select('users.id as userid, invoice.id as invoiceid, tagihan.id as tagihanid, nama_lengkap, GROUP_CONCAT(nama_tagihan SEPARATOR "<br>") as nama_tagihan, nominal, no_invoice, invoice.status as statusinv')
                        ->join('tagihan', 'tagihan_id = tagihan.id')
                        ->join('master_tagihan', 'master_tagihan_id = master_tagihan.id')
                        ->join('users', 'tagihan.user_id = users.id')
                        ->join('profil', 'profil.user_id = users.id')
                        ->where('no_invoice', $key1->no_invoice)
                        ->groupBy('no_invoice')
                        ->selectSum('nominal')
                        ->findAll()
                    ) {

                        foreach ($post as $key) {
                            $no++;
                            $row = array();
                            $row[] = $no;
                            $row[] = $key->no_invoice;
                            $row[] = $key->nama_lengkap;
                            $row[] = $key->nama_tagihan;
                            $row[] = number_to_currency($key->nominal, 'IDR', null);
                            $row[] = '<a class="image-popup-vertical-fit" href="assets/images/bukti/' . date('d-m-Y', strtotime($key1->created_at)) . '/' . $key1->bukti . '" title="Caption. Can be aligned it to any side and contain any HTML.">
                        <img class="img-fluid" alt="" src="assets/images/bukti/' . date('d-m-Y', strtotime($key1->created_at)) . '/' . $key1->bukti . '" width="145">
                        </a>';
                            if ($key->statusinv == 0) {
                                $row[] = '<span class="badge bg-success text-white">Sudah Lunas</span>';
                                $row[] = '<div class="btn-group d-flex justify-content-center">
                                <a href="/CetakInvoice?id=' . $key->no_invoice . '" type="button" class="btn btn-outline-primary waves-effect waves-light" > <i class="uil-print" > Cetak Invoice </i></a>
                                </div>';
                            } else {
                                $row[] = '<span class="badge bg-danger text-white">Belum Lunas</span>';
                                $row[] = '<div class="btn-group d-flex justify-content-center">
                        <button type="button" class="btn btn-success waves-effect waves-light" id="button-terima-tagihan" data-id="' . $key1->id . '" data-inv="' . $key->no_invoice . '"> <i class="uil-comment-check" > Terima </i></button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" id="modal-tolak" data-bs-toggle="modal" data-bs-target=".modal-tolak" data-id="' . $key1->id . '" data-no="' . $key->no_invoice . '"> <i class="uil-comment-block" > Tolak </i></button>
                        </div>';
                            }
                            $data[] = $row;
                        }
                    }
                }
                $data = array('responce' => 'success', 'posts' => $data);
            } else {
                $data = array('responce' => 'success', 'posts' => '');
            }
            $data[$csrfname] = $csrfhash;
            return $this->response->setJSON($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function konfirmasi_tagihan()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();
            $pembayaranid = $this->request->getPost('pembayaranid');
            $noinvoice = $this->request->getPost('noinvoice');

            $data = [
                'id' => $pembayaranid,
                'status' => 0,
            ];

            if (!$this->pembayaranModel->save($data)) {
                $data = array('error' => 'Gagal Mengubah Status Pembayaran', 'posts' => $data);
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            if (!$posts = $this->invoiceModel
                ->where('no_invoice', $noinvoice)
                ->findAll()) {
                $data = array('error' => 'Gagal Mengambil Data Tagihan', 'posts' => $data);
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }
            foreach ($posts as $key) {
                $data = [
                    'id' => $key->id,
                    'status' => 0,
                ];

                if (!$this->invoiceModel->save($data)) {
                    $data = array('error' => 'Gagal Mengubah Satatus Invoice');
                    $data[$csrfname] = $csrfhash;
                    return $this->response->setJSON($data);
                }
                $data = [
                    'id' => $key->tagihan_id,
                    'status' => 0,
                ];

                if (!$this->tagihanModel->save($data)) {
                    $data = array('error' => 'Gagal Mengubah Satatus Tagihan');
                    $data[$csrfname] = $csrfhash;
                    return $this->response->setJSON($data);
                }
            }

            $data = [
                'user_id' => user()->id,
                'pesan' => 'Mengonfirmasi No Invoice ' . $noinvoice,
            ];

            $this->logModel->save($data);

            $data = array('success' => 'Berhasil Menerima Pembayaran', 'posts' => $data);
            $data[$csrfname] = $csrfhash;
            return $this->response->setJSON($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function tolak_tagihan()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();
            $pembayaranid = $this->request->getPost('pembayaranid');
            $noinvoice = $this->request->getPost('no_invoice');

            $key = $this->pembayaranModel->find($pembayaranid);

            unlink('assets/images/bukti/' . date('d-m-Y') . '/' . $key->bukti);

            if (!$this->pembayaranModel->delete($pembayaranid)) {
                $data = array('error' => 'Gagal Menghapus Data Pembayaran');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            if (!$posts = $this->invoiceModel
                ->where('no_invoice', $noinvoice)
                ->findAll()) {
                $data = array('error' => 'Gagal Mengambil Data Tagihan');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }
            foreach ($posts as $key) {
                $data = [
                    'id' => $key->tagihan_id,
                    'deskripsi' => $this->request->getPost('deskripsi'),
                ];

                if (!$this->tagihanModel->save($data)) {
                    $data = array('error' => 'Gagal Mengubah Satatus Tagihan');
                    $data[$csrfname] = $csrfhash;
                    return $this->response->setJSON($data);
                }
            }

            $data = [
                'user_id' => user()->id,
                'pesan' => 'Menolak No Invoice ' . $noinvoice,
            ];
            $this->logModel->save($data);

            $data = array('success' => 'Berhasil Menolak Pembayaran');
            $data[$csrfname] = $csrfhash;
            return $this->response->setJSON($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}