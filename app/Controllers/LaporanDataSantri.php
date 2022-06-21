<?php

namespace App\Controllers;

use App\Models\InvoiceModel;
use App\Models\ProfilModel;
use App\Models\TagihanModel;
use Myth\Auth\Models\UserModel;

class LaporanDataSantri extends BaseController
{
    public function __construct()
    {
        $this->profilModel = new ProfilModel();
        $this->userModel = new UserModel();
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
        return view('laporandatasantri', $data);
    }

    public function datatable()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();

            $jenjang = $this->request->getPost('jenjang');
            if ($jenjang !== "") {
                $posts = $this->profilModel
                    ->select('users.id as userid, profil.id as profilid, nama_lengkap, sekolah_asal, jenis_kelamin,
            nisn, tempat_lahir, tanggal_lahir, nik, kk, jenjang_pendidikan, no_hp, alamat_lengkap, nama_ayah, pendidikan_ayah, pekerjaan_ayah, penghasilan_ayah,
            nama_ibu, pendidikan_ibu, pekerjaan_ibu, penghasilan_ibu, nama_wali, hubungan_sosial, pekerjaan_wali, penghasilan_wali, ukuran_baju')
                    ->join('users', 'profil.user_id = users.id')
                    ->join('orangtua', 'orangtua.user_id = users.id')
                    ->join('wali', 'wali.user_id = users.id', 'LEFT')
                    ->orderBy('profil.id', 'DESC')
                    ->where('jenjang_pendidikan', $jenjang)
                    ->findAll();
            } else {
                $posts = $this->profilModel
                    ->select('users.id as userid, profil.id as profilid, nama_lengkap, sekolah_asal, jenis_kelamin,
            nisn, tempat_lahir, tanggal_lahir, nik, kk, jenjang_pendidikan, no_hp, alamat_lengkap, nama_ayah, pendidikan_ayah, pekerjaan_ayah, penghasilan_ayah,
            nama_ibu, pendidikan_ibu, pekerjaan_ibu, penghasilan_ibu, nama_wali, hubungan_sosial, pekerjaan_wali, penghasilan_wali, ukuran_baju')
                    ->join('users', 'profil.user_id = users.id')
                    ->join('orangtua', 'orangtua.user_id = users.id')
                    ->join('wali', 'wali.user_id = users.id', 'LEFT')
                    ->orderBy('profil.id', 'DESC')
                    ->findAll();
            }

            if ($posts) {
                $no = 0;
                foreach ($posts as $key) {
                    $row = array();
                    if ($key->jenjang_pendidikan == "TK" and $key->jenis_kelamin == "Laki-laki") {
                        $no = 'T222301' . str_pad($key->profilid, 3, '0', STR_PAD_LEFT);
                    } else if ($key->jenjang_pendidikan == "SD" and $key->jenis_kelamin == "Laki-laki") {
                        $no = 'D222301' . str_pad($key->profilid, 3, '0', STR_PAD_LEFT);
                    } else if ($key->jenjang_pendidikan == "SMP" and $key->jenis_kelamin == "Laki-laki") {
                        $no = 'P222301' . str_pad($key->profilid, 3, '0', STR_PAD_LEFT);
                    } else if ($key->jenjang_pendidikan == "SMA" and $key->jenis_kelamin == "Laki-laki") {
                        $no = 'A222301' . str_pad($key->profilid, 3, '0', STR_PAD_LEFT);
                    } else if ($key->jenjang_pendidikan == "TK" and $key->jenis_kelamin == "Perempuan") {
                        $no = 'T222302' . str_pad($key->profilid, 3, '0', STR_PAD_LEFT);
                    } else if ($key->jenjang_pendidikan == "SD" and $key->jenis_kelamin == "Perempuan") {
                        $no = 'D222302' . str_pad($key->profilid, 3, '0', STR_PAD_LEFT);
                    } else if ($key->jenjang_pendidikan == "SMP" and $key->jenis_kelamin == "Perempuan") {
                        $no = 'P222302' . str_pad($key->profilid, 3, '0', STR_PAD_LEFT);
                    } else if ($key->jenjang_pendidikan == "SMA" and $key->jenis_kelamin == "Perempuan") {
                        $no = 'A222302' . str_pad($key->profilid, 3, '0', STR_PAD_LEFT);
                    }
                    $row[] = $no;
                    $row[] = $key->nama_lengkap;
                    $row[] = $key->sekolah_asal;
                    $row[] = $key->jenis_kelamin;
                    $row[] = $key->nisn;
                    $row[] = $key->tempat_lahir . ', ' . $key->tanggal_lahir;
                    $row[] = $key->nik;
                    $row[] = $key->kk;
                    $row[] = $key->jenjang_pendidikan;
                    $row[] = $key->no_hp;
                    $row[] = $key->alamat_lengkap;
                    $row[] = $key->nama_ayah;
                    $row[] = $key->pendidikan_ayah;
                    $row[] = $key->penghasilan_ayah;
                    $row[] = $key->pekerjaan_ayah;
                    $row[] = $key->nama_ibu;
                    $row[] = $key->pendidikan_ibu;
                    $row[] = $key->penghasilan_ibu;
                    $row[] = $key->pekerjaan_ibu;
                    $row[] = $key->nama_wali;
                    $row[] = $key->hubungan_sosial;
                    $row[] = $key->penghasilan_wali;
                    $row[] = $key->pekerjaan_wali;
                    $row[] = $key->ukuran_baju;
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
}