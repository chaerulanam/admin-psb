<?php

namespace App\Controllers;

use App\Models\InvoiceModel;
use App\Models\MasterTagihanModel;
use App\Models\OrangtuaModel;
use App\Models\PembayaranModel;
use App\Models\ProfilModel;
use App\Models\TagihanModel;
use App\Models\WaliModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Config\Auth as AuthConfig;

use function PHPUnit\Framework\throwException;

class DataSantri extends BaseController
{
    protected $auth;
    /**
     * @var AuthConfig
     */
    protected $config;

    public function __construct()
    {
        $this->profilModel = new ProfilModel();
        $this->orangtuaModel = new OrangtuaModel();
        $this->waliModel = new WaliModel();
        $this->tagihanModel = new TagihanModel();
        $this->mastertagihanModel = new MasterTagihanModel();
        $this->userModel = new UserModel();
        $this->auth = service('authentication');
        $this->auth = service('authorization');
        $this->invoiceModel = new InvoiceModel();
        $this->pembayaranModel = new PembayaranModel();
        helper('number');
    }

    public function index()
    {
        $data = [
            'users' => $this->userModel
                ->select('users.id as userid, username')
                ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
                ->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id')
                ->where('name', 'none')
                ->findAll(),
            'profil' => $this->profilModel->where('user_id', user()->id)->get()->getRow(),
            'title_meta' => view('partials/title-meta', ['title' => 'Data Santri']),
            'page_title' => view('partials/page-title', ['title' => 'Data Santri', 'pagetitle' => 'Data Santri']),
            'title_table' => "Table Data Santri",
        ];

        // dd($data);
        return view('datasantri', $data);
    }

    public function datatable()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();
            if ($posts = $this->profilModel
                ->select('users.id as userid, profil.id as profilid, nama_lengkap, jenjang_pendidikan, jenis_kelamin, tempat_lahir, tanggal_lahir, foto')
                ->join('users', 'profil.user_id = users.id')
                ->orderBy('profil.id', 'DESC')
                ->findAll()
            ) {
                $no = 0;
                foreach ($posts as $key) {
                    $no++;
                    $row = array();
                    $row[] = $no;
                    $row[] = $key->nama_lengkap;
                    $row[] = $key->jenis_kelamin;
                    $row[] = $key->jenjang_pendidikan;
                    $row[] = $key->tempat_lahir . ', ' . $key->tanggal_lahir;
                    $row[] = '<a class="image-popup-vertical-fit" href="assets/images/users/' . $key->foto . '" title="Caption. Can be aligned it to any side and contain any HTML.">
                    <img class="img-fluid" alt="" src="assets/images/users/' . $key->foto . '" width="145">
                    </a>';
                    if (in_groups('superadmin')) {
                        $row[] = '<div class="btn-group me-1 mt-1">
                    <button type="button" class="btn btn-outline-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <i class="mdi mdi-chevron-down"></i></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" id="detail" target="_none" href="/KartuPeserta?id=' . $key->userid . '" >Cetak Kartu</a>
                        <a class="dropdown-item" id="hapus" href="#" data-id="' . $key->profilid . '" data-userid="' . $key->userid . '">Hapus</a>
                        <a class="dropdown-item" id="tagihan" href="#" data-bs-toggle="modal" data-bs-target=".tagihan" data-id="' . $key->userid . '">Tagihan</a>
                        <a class="dropdown-item" id="editmodal" href="#" data-bs-toggle="modal" data-bs-target=".editmodal" data-id="' . $key->profilid . '">Edit</a>
                    </div>
                </div>';
                    } else {
                        $row[] = '<div class="btn-group me-1 mt-1">
                        <button type="button" class="btn btn-outline-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <i class="mdi mdi-chevron-down"></i></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" id="detail" href="#" >Detail</a>
                        <a class="dropdown-item" id="detail" href="/KartuPeserta?id=' . $key->userid . '" >Cetak Kartu</a>
                           <a class="dropdown-item" id="tagihan" href="#" data-bs-toggle="modal" data-bs-target=".tagihan" data-id="' . $key->userid . '">Tagihan</a>
                        </div>
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

    public function get_detail()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();
            $id = $this->request->getGet('id');
            $data['profil'] = $this->profilModel
                ->select('users.id as userid, username, profil.id as profilid, nama_lengkap, foto, sekolah_asal, jenis_kelamin,
            nisn, tempat_lahir, tanggal_lahir, nik, kk, jenjang_pendidikan, no_hp, alamat_lengkap, nama_ayah, pendidikan_ayah, pekerjaan_ayah, penghasilan_ayah,
            nama_ibu, pendidikan_ibu, pekerjaan_ibu, penghasilan_ibu, nama_wali, hubungan_sosial, pekerjaan_wali, penghasilan_wali, ukuran_baju')
                ->join('wali', 'wali.user_id = profil.user_id')
                ->join('orangtua', 'orangtua.user_id = profil.user_id')
                ->join('users', 'profil.user_id = users.id')
                ->find($id);
            $data[$csrfname] = $csrfhash;
            return $this->response->setJSON($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function add()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();

            $user_id = $this->request->getPost('user_id');

            if (
                $this->profilModel
                ->where('user_id', $user_id)
                ->countAllResults() > 0
            ) {
                $data = array('error' => 'Anda Sudah Menginput Data');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            if (!$this->validate(
                [
                    'user_id' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Username Harus Dipilih!'
                        ]
                    ],
                    'nama_lengkap' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Nama Lengkap Harus Diisi !'
                        ]
                    ],
                    'sekolah_asal' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Sekolah Asal Harus Diisi !'
                        ]
                    ],
                    'jenis_kelamin' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Jenis Kelamin Harus Diisi !'
                        ]
                    ],
                    'no_hp' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'No Hp Harus Diisi !'
                        ]
                    ],
                    'ukuran_baju' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'No Hp Harus Diisi !'
                        ]
                    ],
                    'nik' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'NIK Harus Diisi !'
                        ]
                    ],
                    'no_kk' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'No KK Harus Diisi !'
                        ]
                    ],
                    'tempat_lahir' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Tempat Lahir Harus Diisi !'
                        ]
                    ],
                    'tanggal_lahir' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Tanggal Lahir Harus Diisi !'
                        ]
                    ],
                    'alamat' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Alamat Lengkap Harus Diisi !'
                        ]
                    ],
                    'desa' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Desa Harus Diisi !'
                        ]
                    ],
                    'kecamatan' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Kecamatan Harus Diisi !'
                        ]
                    ],
                    'kabupaten' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Kabupaten Harus Diisi !'
                        ]
                    ],
                    'provinsi' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Provinsi Harus Diisi !'
                        ]
                    ],
                    'foto' => [
                        'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                        'errors' => [
                            'uploaded' => 'Upload gambar dulu !',
                            'max_size' => 'Ukuran gambar maximal 2Mb !',
                            'is_image' => 'Yang anda upload bukan gambar !',
                            'mime_in' => 'Pilih format Jpg/Jpeg/Png !'
                        ]
                    ],
                    'nama_ayah' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Nama Ayah Harus Diisi !'
                        ]
                    ],
                    'pendidikan_ayah' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Pendidikan Ayah Harus Diisi !'
                        ]
                    ],
                    'penghasilan_ayah' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Penghasilan Ayah Harus Diisi !'
                        ]
                    ],
                    'pekerjaan_ayah' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Pekerjaan Ayah Harus Diisi !'
                        ]
                    ],
                    'nama_ibu' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Nama Ibu Harus Diisi !'
                        ]
                    ],
                    'pendidikan_ibu' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Pendidikan Ibu Harus Diisi !'
                        ]
                    ],
                    'penghasilan_ibu' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Penghasilan Ibu Harus Diisi !'
                        ]
                    ],
                    'pekerjaan_ibu' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Pekerjaan Ibu Harus Diisi !'
                        ]
                    ],
                ]
            )) {
                $validation = service('validation')->getErrors();
                $data = $validation;
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            $alamat = $this->request->getPost('alamat');
            $desa = $this->request->getPost('desa');
            $kecamatan = $this->request->getPost('kecamatan');
            $kabupaten = $this->request->getPost('kabupaten');
            $provinsi = $this->request->getPost('provinsi');

            $file = $this->request->getFile('foto');
            $file->move('assets/images/users/');
            $filename = $file->getName();

            $data = [
                'user_id' => $user_id,
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'sekolah_asal' => $this->request->getPost('sekolah_asal'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'nisn' => $this->request->getPost('nisn'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
                'nik' => $this->request->getPost('nik'),
                'kk' => $this->request->getPost('no_kk'),
                'jenjang_pendidikan' => $this->request->getPost('jenjang_pendidikan'),
                'no_hp' => $this->request->getPost('no_hp'),
                'ukuran_baju' => $this->request->getPost('ukuran_baju'),
                'alamat_lengkap' => $alamat . '-' . $desa . '-' . $kecamatan . '-' . $kabupaten . '-' . $provinsi,
                'foto' => $filename,
            ];

            if (!$this->profilModel->save($data)) {
                $data = array('error' => 'Gagal Menginput Profil');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            $data = [
                'user_id' => $user_id,
                'nama_ayah' => $this->request->getPost('nama_ayah'),
                'pendidikan_ayah' => $this->request->getPost('pendidikan_ayah'),
                'penghasilan_ayah' => $this->request->getPost('penghasilan_ayah'),
                'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
                'nama_ibu' => $this->request->getPost('nama_ibu'),
                'pendidikan_ibu' => $this->request->getPost('pendidikan_ibu'),
                'penghasilan_ibu' => $this->request->getPost('penghasilan_ibu'),
                'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
            ];

            if (!$this->orangtuaModel->save($data)) {
                $data = array('error' => 'Gagal Menginput Orang Tua.');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            $data = [
                'user_id' => $user_id,
                'nama_wali' => $this->request->getPost('nama_wali'),
                'hubungan_sosial' => $this->request->getPost('hubungan_sosial'),
                'penghasilan_wali' => $this->request->getPost('penghasilan_wali'),
                'pekerjaan_wali' => $this->request->getPost('pekerjaan_wali'),
            ];

            if (!$this->waliModel->save($data)) {
                $data = array('error' => 'Gagal Menginput Wali.');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            if (!$mastertagihan = $this->mastertagihanModel->findAll()) {
                $data = array('error' => 'Gagal Mengambil Data Master Tagihan.');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            // for ($i = 0; $i < count($mastertagihan); $i++) {

            if ($this->request->getPost('jenis_kelamin') == "Perempuan") {
                $datatagihan = [
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[1]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[0]->id, //registrasi
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 200000,
                    ],
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[1]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[1]->id, //sumbangan pembangunan
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 3500000,
                    ],
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[2]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[2]->id, //Meja Kursi
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 500000,
                    ],
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[9]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[9]->id, //Juli
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 750000,
                    ],
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[15]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[15]->id, //seragam pramuka
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 200000,
                    ],
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[16]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[16]->id, //seragam batik
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 100000,
                    ],
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[17]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[17]->id, //seragam olahraga
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 150000,
                    ],
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[18]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[18]->id, //krudung
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 240000,
                    ],
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[19]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[19]->id, //Lemari
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 500000,
                    ],
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[20]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[20]->id, //krudung
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 350000,
                    ],
                ];
            } else {

                $datatagihan = [
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[1]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[0]->id, //registrasi
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 200000,
                    ],
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[1]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[1]->id, //sumbangan pembangunan
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 3500000,
                    ],
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[2]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[2]->id, //Meja Kursi
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 500000,
                    ],
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[9]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[9]->id, //Juli
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 750000,
                    ],
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[15]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[15]->id, //seragam pramuka
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 200000,
                    ],
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[16]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[16]->id, //seragam batik
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 100000,
                    ],
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[17]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[17]->id, //seragam olahraga
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 150000,
                    ],
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[19]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[19]->id, //Lemari
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 500000,
                    ],
                    [
                        'no_tagihan' => 2223 . str_pad($mastertagihan[20]->id, 2, '0', STR_PAD_LEFT) . str_pad($user_id, 3, '0', STR_PAD_LEFT),
                        'master_tagihan_id' => $mastertagihan[20]->id, //krudung
                        'user_id' => $user_id,
                        'status' => 1,
                        'nominal' => 350000,
                    ],
                ];
            }
            if (!$this->tagihanModel->insertBatch($datatagihan)) {
                $data = array('error' => 'Gagal Menambah Tagihan.');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            if (!$this->auth->removeUserFromGroup($user_id, 'none')) {
                $data = array('error' => 'Gagal Menghapus Grup User');
            } else if (!$this->auth->addUserToGroup($user_id, 'santri')) {
                $data = array('error' => 'Gagal Menambah Grup User');
            }

            $data = [
                'user_id' => user()->id,
                'pesan' => 'Menambah Santri  ' . $this->request->getPost('nama_lengkap'),
            ];
            $this->logModel->save($data);

            $data = array('success' => 'Berhasil Menginput Data.');
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

            if (!$this->validate(
                [
                    'user_id' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Username Harus Dipilih!'
                        ]
                    ],
                    'nama_lengkap' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Nama Lengkap Harus Diisi !'
                        ]
                    ],
                    'sekolah_asal' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Sekolah Asal Harus Diisi !'
                        ]
                    ],
                    'jenis_kelamin' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Jenis Kelamin Harus Diisi !'
                        ]
                    ],
                    'no_hp' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'No Hp Harus Diisi !'
                        ]
                    ],
                    'ukuran_baju' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'No Hp Harus Diisi !'
                        ]
                    ],
                    'nik' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'NIK Harus Diisi !'
                        ]
                    ],
                    'no_kk' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'No KK Harus Diisi !'
                        ]
                    ],
                    'tempat_lahir' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Tempat Lahir Harus Diisi !'
                        ]
                    ],
                    'tanggal_lahir' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Tanggal Lahir Harus Diisi !'
                        ]
                    ],
                    'alamat' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Alamat Lengkap Harus Diisi !'
                        ]
                    ],
                    'nama_ayah' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Nama Ayah Harus Diisi !'
                        ]
                    ],
                    'pendidikan_ayah' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Pendidikan Ayah Harus Diisi !'
                        ]
                    ],
                    'penghasilan_ayah' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Penghasilan Ayah Harus Diisi !'
                        ]
                    ],
                    'pekerjaan_ayah' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Pekerjaan Ayah Harus Diisi !'
                        ]
                    ],
                    'nama_ibu' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Nama Ibu Harus Diisi !'
                        ]
                    ],
                    'pendidikan_ibu' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Pendidikan Ibu Harus Diisi !'
                        ]
                    ],
                    'penghasilan_ibu' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Penghasilan Ibu Harus Diisi !'
                        ]
                    ],
                    'pekerjaan_ibu' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Pekerjaan Ibu Harus Diisi !'
                        ]
                    ],
                ]
            )) {
                $validation = service('validation')->getErrors();
                $data = $validation;
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            $alamat = $this->request->getPost('alamat');

            $file = $this->request->getFile('foto');
            if ($file == "") {
                $filename = $this->request->getPost('foto-before');
            } else {
                $file->move('assets/images/users/');
                $filename = $file->getName();
            }
            $data = [
                'id' => $this->request->getPost('id'),
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'sekolah_asal' => $this->request->getPost('sekolah_asal'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'nisn' => $this->request->getPost('nisn'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
                'nik' => $this->request->getPost('nik'),
                'kk' => $this->request->getPost('no_kk'),
                'jenjang_pendidikan' => $this->request->getPost('jenjang_pendidikan'),
                'no_hp' => $this->request->getPost('no_hp'),
                'ukuran_baju' => $this->request->getPost('ukuran_baju'),
                'alamat_lengkap' => $alamat,
                'foto' => $filename,
            ];

            if (!$this->profilModel->save($data)) {
                $data = array('error' => 'Gagal Menginput Profil');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            $data = [
                'id' => $this->request->getPost('id'),
                'nama_ayah' => $this->request->getPost('nama_ayah'),
                'pendidikan_ayah' => $this->request->getPost('pendidikan_ayah'),
                'penghasilan_ayah' => $this->request->getPost('penghasilan_ayah'),
                'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
                'nama_ibu' => $this->request->getPost('nama_ibu'),
                'pendidikan_ibu' => $this->request->getPost('pendidikan_ibu'),
                'penghasilan_ibu' => $this->request->getPost('penghasilan_ibu'),
                'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
            ];

            if (!$this->orangtuaModel->save($data)) {
                $data = array('error' => 'Gagal Menginput Orang Tua.');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            $data = [
                'id' => $this->request->getPost('id'),
                'nama_wali' => $this->request->getPost('nama_wali'),
                'hubungan_sosial' => $this->request->getPost('hubungan_sosial'),
                'penghasilan_wali' => $this->request->getPost('penghasilan_wali'),
                'pekerjaan_wali' => $this->request->getPost('pekerjaan_wali'),
            ];

            if (!$this->waliModel->save($data)) {
                $data = array('error' => 'Gagal Menginput Wali.');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            // for ($i = 0; $i < count($mastertagihan); $i++) {
            $data = [
                'user_id' => user()->id,
                'pesan' => 'Mengubah Santri  ' . $this->request->getPost('nama_lengkap'),
            ];
            $this->logModel->save($data);

            $data = array('success' => 'Berhasil Mengedit Data.');
            $data[$csrfname] = $csrfhash;
            return $this->response->setJSON($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();
            $profilid = $this->request->getPost('profilid');
            $userid = $this->request->getPost('userid');

            $santri = $this->profilModel->find($profilid);

            if (!$this->profilModel->delete($profilid)) {
                $data = array('error' => 'Gagal Menghapus Data Profil.');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }
            if (!$this->orangtuaModel->delete($profilid)) {
                $data = array('error' => 'Gagal Menghapus Data Orang Tua.');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }
            if (!$this->waliModel->delete($profilid)) {
                $data = array('error' => 'Gagal Menghapus Data Wali.');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            $data = [
                'user_id' => user()->id,
                'pesan' => 'Menghapus Santri  ' . $santri->nama_lengkap,
            ];
            $this->logModel->save($data);

            $data = array('success' => 'Berhasil Menghapus Data Santri.');
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
            $id = $this->request->getPost('id');
            if ($posts = $this->tagihanModel
                ->select('tagihan.id as idtagihan, no_tagihan, tagihan.status as statustagihan, invoice.status as statusinv, nama_tagihan, master_tagihan.deskripsi, nominal')
                ->join('master_tagihan', 'master_tagihan_id = master_tagihan.id')
                ->join('invoice', 'tagihan_id = tagihan.id', 'LEFT')
                ->where('user_id', $id)
                ->findAll()
            ) {
                $no = 0;
                foreach ($posts as $key) {
                    $no++;
                    $row = array();

                    if ($key->statustagihan == 0) {
                        $row[] = '';
                    } else if ($key->statustagihan == 1 && $key->statusinv > 0) {
                        $row[] = '';
                    } else if ($key->statustagihan == 1 && $key->statusinv == 0) {
                        $row[] = '<div class="d-flex justify-content-center"><input class="form-check-input check' . $no . '" type="checkbox" name="check" id="check" data-no="' .  $no . '" data-id="' .  $key->idtagihan . '"></div>';
                    }
                    $row[] = '<div class="d-flex justify-content-center">' . $no . '</div>';
                    $row[] = '<div class="d-flex justify-content-center">' . $key->no_tagihan . '</div>';
                    $row[] =  $key->nama_tagihan;
                    $row[] =  $key->deskripsi;
                    $row[] = '<div class="d-flex justify-content-center">' . number_to_currency($key->nominal, 'IDR', null) . '</div>';
                    if ($key->statustagihan == 0) {
                        $row[] = '<span class="badge bg-success text-white">Sudah Lunas</span>';
                    } else if ($key->statustagihan == 1 && $key->statusinv == 1) {
                        $row[] = '<span class="badge bg-warning text-white">Pending</span></td>';
                    } else if ($key->statustagihan == 1 && $key->statusinv == 0) {
                        $row[] = '<span class="badge bg-danger text-white">Belum Lunas</span></td>';
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
                        ->select('tagihan.id as idtagihan, no_tagihan, profil.id as profilid, nama_lengkap, alamat_lengkap, no_hp, tagihan.status as statustagihan, master_tagihan.deskripsi as desc, nama_tagihan, nominal')
                        ->join('master_tagihan', 'master_tagihan_id = master_tagihan.id')
                        ->join('users', 'tagihan.user_id = users.id')
                        ->join('profil', 'profil.user_id = users.id')
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

            $profil = [
                'profilid' => $posts->profilid,
                'nama_lengkap' => $posts->nama_lengkap,
                'alamat' => $posts->alamat_lengkap,
                'no_hp' => $posts->no_hp,
            ];
            $data = array('responce' => 'success', 'profil' => $profil, 'posts' => $data, 'total' => number_to_currency($total, 'IDR', null));
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

            $data = [
                'no_invoice' => $this->request->getPost('no_invoice'),
                'status' => 0,
            ];

            if (!$this->pembayaranModel->save($data)) {
                $data = array('error' => 'Gagal Menambahkan Invoice');
                $data[$csrfname] = $csrfhash;
                return $this->response->setJSON($data);
            }

            if (!$posts = $this->invoiceModel
                ->where('no_invoice', $this->request->getPost('no_invoice'))
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
                'pesan' => 'Menambah dan Membayarkan No Invoice ' . $this->request->getPost('no_invoice'),
            ];
            $this->logModel->save($data);

            $data = array('success' => 'Berhasil Membayar tagihan', 'no_invoice' => $this->request->getPost('no_invoice'));
            $data[$csrfname] = $csrfhash;
            return $this->response->setJSON($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}