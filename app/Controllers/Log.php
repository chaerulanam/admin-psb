<?php

namespace App\Controllers;

use App\Models\InvoiceModel;
use App\Models\PesanModel;
use App\Models\ProfilModel;
use App\Models\TagihanModel;
use Myth\Auth\Models\UserModel;

class Log extends BaseController
{
    public function __construct()
    {
        $this->profilModel = new ProfilModel();
        $this->userModel = new UserModel();
        $this->logModel = new PesanModel();
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
            'title_meta' => view('partials/title-meta', ['title' => 'Log Aktifitas']),
            'page_title' => view('partials/page-title', ['title' => 'Log Aktifitas', 'pagetitle' => 'Log Aktifitas']),
            'title_table' => "Tabel Log Aktifitas",
        ];

        // dd($data);
        return view('log', $data);
    }

    public function datatable()
    {
        if ($this->request->isAJAX()) {
            $csrfname = csrf_token();
            $csrfhash = csrf_hash();
            if ($posts = $this->logModel
            ->select('username, pesan, log.created_at')
                ->join('users', 'log.user_id = users.id')
                ->orderBy('log.id', 'DESC')
                ->findAll()
            ) {
                $no = 0;
                foreach ($posts as $key) {
                    $no++;
                    $row = array();
                    $row[] = $no;
                    $row[] = $key->username;
                    $row[] = $key->pesan;
                    $row[] = $key->created_at;
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