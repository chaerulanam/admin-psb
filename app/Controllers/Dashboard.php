<?php

namespace App\Controllers;

use App\Models\OrangtuaModel;
use App\Models\ProfilModel;
use App\Models\TagihanModel;
use App\Models\WaliModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->profilModel = new ProfilModel();
        $this->orangtuaModel = new OrangtuaModel();
        $this->waliModel = new WaliModel();
        $this->tagihanModel = new TagihanModel();
        helper('number');
    }

    public function index()
    {
        $data = [
            'uang' => $this->tagihanModel->where('status', 0)->selectSum('nominal')->get()->getRow(),
            'profil' => $this->profilModel->where('user_id', user()->id)->get()->getRow(),
            'pendaftar' => $this->profilModel->countAllResults(),
            'putra' => $this->profilModel->where('jenis_kelamin', 'Laki-laki')->countAllResults(),
            'putri' => $this->profilModel->where('jenis_kelamin', 'Perempuan')->countAllResults(),
            'orangtua' => $this->orangtuaModel->where('user_id', user()->id)->get()->getRow(),
            'wali' => $this->waliModel->where('user_id', user()->id)->get()->getRow(),
            'title_meta' => view('partials/title-meta', ['title' => 'Welcome']),
            'page_title' => view('partials/page-title', ['title' => 'Welcome', 'pagetitle' => 'Welcome']),
        ];

        // dd($data);
        return view('dashboard', $data);
    }
}