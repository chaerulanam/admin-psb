<?php

namespace App\Controllers;

use App\Models\PembayaranModel;
use App\Models\ProfilModel;
use App\Models\RekeningModel;
use App\Models\TagihanModel;
use CURLFile;

class Pembayaran extends BaseController
{
    public function __construct()
    {
        $this->token = "2127835848:AAGNZrWTzhrru6AvnstW9e1vLNu_k73tnvc";
        $this->chatid = "-1001464929220";

        $this->profilModel = new ProfilModel();
        $this->tagihanModel = new TagihanModel();
        $this->rekeningModel = new RekeningModel();
        $this->pembayaranModel = new PembayaranModel();

        helper('number');
    }

    public function index()
    {
        $data = [
            'statusbayar' => $this->tagihanModel->where('user_id', user()->id)->get()->getRow()->status,
            'statuskonfirm' => $this->pembayaranModel
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
                ->select('pembayaran.id as idbayar, nama_tagihan, nama_bank, no_rekening, no_tagihan, nominal, tagihan.deskripsi as deskripsi')
                ->join('pembayaran', 'tagihan_id = tagihan.id', 'LEFT')
                ->join('master_tagihan', 'master_tagihan_id = master_tagihan.id')
                ->join('rekening', 'rekening_id = rekening.id', 'LEFT')
                ->where('user_id', user()->id)->get()->getRow(),
            'state' => $this->profilModel->where('user_id', user()->id)->countAllResults(),
            'profil' => $this->profilModel->where('user_id', user()->id)->get()->getRow(),
            'title_meta' => view('partials/title-meta', ['title' => 'Welcome']),
            'page_title' => view('partials/page-title', ['title' => 'Welcome', 'pagetitle' => 'Welcome']),
        ];

        // dd($data);
        return view('pembayaran', $data);
    }

    public function sendMessage($teks = null)
    {
        $method = "sendMessage";
        $url = "https://api.telegram.org/bot" . $this->token . "/" . $method;
        $pesan = "Notifikasi Pembayaran Registrasi PSB-ALISHLAH\n\n" . $teks;

        $post = [
            'chat_id' => $this->chatid,
            // 'parse_mode' => 'HTML', // aktifkan ini jika ingin menggunakan format type HTML, bisa juga diganti menjadi Markdown
            'text' => $pesan,
        ];

        $header = [
            "X-Requested-With: XMLHttpRequest",
            "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36",
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $datas = curl_exec($ch);
        $error = curl_error($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    }

    public function sendPhoto($urlphoto = null, $caption = null)
    {
        $method = "sendPhoto";
        $url = "https://api.telegram.org/bot" . $this->token . "/" . $method;
        $post = [
            'chat_id' => $this->chatid,
            // 'parse_mode' => 'HTML', // aktifkan ini jika ingin menggunakan format type HTML, bisa juga diganti menjadi Markdown
            'photo' => new CURLFile(realpath($urlphoto)),
            'caption' => $caption,
        ];

        $header = [
            "X-Requested-With: XMLHttpRequest",
            "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36",
        ];

        // hapus 1 baris ini:
        // die('Hapus baris ini sebelum bisa berjalan, terimakasih.');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_REFERER, $refer);
        //curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $datas = curl_exec($ch);
        $error = curl_error($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    }

    public function add()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();

            if (!$this->validate(
                [
                    'rekening_id' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Pilih Rekening !',
                        ],
                    ],
                ]
            )) {
                $validation = service('validation')->getErrors();
                $data = $validation;
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            if (!$tagihan = $this->tagihanModel
                ->where('no_tagihan', $this->request->getPost('no_tagihan'))
                ->get()->getRow()) {

                $data = array('error' => 'No Tagihan Tidak Ditemukan');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            if (
                $this->pembayaranModel
                ->where('tagihan_id', $tagihan->id)
                ->countAllResults() > 0
            ) {
                $data = array('error' => 'Invoice Sudah Dibuat');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            $data = [
                'rekening_id' => $this->request->getPost('rekening_id'),
                'tagihan_id' => $tagihan->id,
                'status' => 1,
            ];
            if (!$this->pembayaranModel->save($data)) {
                $data = array('error' => 'Gagal Menambahkan Invoice');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            // $data = [
            //     'id' => $this->$tagihan->id,
            //     'status' => 0,
            // ];
            // if (!$this->tagihanModel->save($data)) {
            //     $data = array('error' => 'Gagal Mengubah Tagihan');
            //     $data[$csrfname] = $csrfhash;
            //     return $this->response->setJSON($data);
            // }
            $data = array('success' => 'Berhasil Membuat Invoice');
            $data[$csrfname] = $csrfhash;
            return $this->response->setJSON($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();

            $data = $this->request->getPost('foto');

            // $data = array('success' => $data);
            // $data[$csrfname] = $csrfhash;
            // return $this->response->setJSON($data);
            if (!$this->validate(
                [
                    'foto' => [
                        'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                        'errors' => [
                            'uploaded' => 'Upload bukti pembayaran dulu !',
                            'max_size' => 'Ukuran gambar maximal 2Mb !',
                            'is_image' => 'Yang anda upload bukan gambar !',
                            'mime_in' => 'Pilih format Jpg/Jpeg/Png !',
                        ],
                    ],
                ]
            )) {
                $validation = service('validation')->getErrors();
                $data = $validation;
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            $file = $this->request->getFile('foto');
            $file->move('assets/images/bukti/' . date('d-m-Y'));
            $filename = $file->getName();

            $data = [
                'id' => $this->request->getPost('id'),
                'bukti' => $filename,
            ];

            if (!$this->pembayaranModel->save($data)) {
                $data = array('error' => 'Gagal Menambahkan Invoice');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            if (!$post = $this->pembayaranModel
                ->join('tagihan', 'tagihan_id = tagihan.id')
                ->where('pembayaran.id', $this->request->getPost('id'))
                ->get()->getRow()) {
                $data = array('success' => 'Berhasil Mengirim Konfirmasi');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            $text = $post->no_tagihan;

            // $this->sendMessage("Ada Permintaan Baru \nNomor Tagihan:" . $text . ", \nAdmin Silahkan Masuk dan Lakukan Konfirmasi Disini \n" . base_url());
            $this->sendPhoto("assets/images/bukti/" . date('d-m-Y') . "/" . $filename, "Ada Permintaan Baru \nNomor Tagihan : " . $text . ", \nAdmin Silahkan Masuk dan Lakukan Konfirmasi Disini \n" . base_url());

            $data = array('success' => 'Berhasil Mengirim Konfirmasi Pembayaran');
            $data[$csrfname] = $csrfhash;

            return $this->response->setJSON($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function add_invoice()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();

            $data = $this->request->getPost('foto');

            // $data = array('success' => $data);
            // $data[$csrfname] = $csrfhash;
            // return $this->response->setJSON($data);
            if (!$this->validate(
                [
                    'foto' => [
                        'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                        'errors' => [
                            'uploaded' => 'Upload gambar dulu !',
                            'max_size' => 'Ukuran gambar maximal 2Mb !',
                            'is_image' => 'Yang anda upload bukan gambar !',
                            'mime_in' => 'Pilih format Jpg/Jpeg/Png !',
                        ],
                    ],
                ]
            )) {
                $validation = service('validation')->getErrors();
                $data = $validation;
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            $file = $this->request->getFile('foto');
            $file->move('assets/images/bukti/' . date('d-m-Y'));
            $filename = $file->getName();

            $data = [
                'no_invoice' => $this->request->getPost('no_invoice'),
                'bukti' => $filename,
                'rekening_id' => $this->request->getPost('rekening_id'),
                'status' => 1,
            ];

            if (!$this->pembayaranModel->save($data)) {
                $data = array('error' => 'Gagal Menambahkan Invoice');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            $data = array('success' => 'Berhasil Mengirim Konfirmasi Pembayaran');
            $data[$csrfname] = $csrfhash;
            return $this->response->setJSON($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}