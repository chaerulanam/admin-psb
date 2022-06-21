<?php

namespace App\Controllers;

use App\Models\OrangtuaModel;
use App\Models\ProfilModel;
use App\Models\WaliModel;

class KartuPeserta extends BaseController
{
    public function __construct()
    {
        $this->profilModel = new ProfilModel();
        $this->orangtuaModel = new OrangtuaModel();
        $this->waliModel = new WaliModel();
    }


    public function index()
    {
        $id = $this->request->getGet('id');
        if ($id == null) {
            $data = [
                'total_pendaftar' => $this->profilModel->where('user_id', user()->id)->get()->getRow(),
                'state' => $this->profilModel->where('user_id', user()->id)->countAllResults(),
                'profil' => $this->profilModel->where('user_id', user()->id)->get()->getRow(),
                'orangtua' => $this->orangtuaModel->where('user_id', user()->id)->get()->getRow(),
                'wali' => $this->waliModel->where('user_id', user()->id)->get()->getRow(),
                'title_meta' => view('partials/title-meta', ['title' => 'Kartu PSB']),
                'page_title' => view('partials/page-title', ['title' => 'Kartu PSB', 'pagetitle' => 'Kartu PSB'])
            ];
        } else {
            $data = [
                'total_pendaftar' => $this->profilModel->where('user_id', $id)->get()->getRow(),
                'state' => $this->profilModel->where('user_id', $id)->countAllResults(),
                'profil' => $this->profilModel->where('user_id', $id)->get()->getRow(),
                'orangtua' => $this->orangtuaModel->where('user_id', $id)->get()->getRow(),
                'wali' => $this->waliModel->where('user_id', $id)->get()->getRow(),
                'title_meta' => view('partials/title-meta', ['title' => 'Kartu PSB']),
                'page_title' => view('partials/page-title', ['title' => 'Kartu PSB', 'pagetitle' => 'Kartu PSB'])
            ];
        }

        // dd($data);
        return view('kartu-peserta', $data);
    }
}