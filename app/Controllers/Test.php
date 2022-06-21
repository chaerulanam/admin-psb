<?php

namespace App\Controllers;

use App\Models\MasterTagihanModel;
use App\Models\OrangtuaModel;
use App\Models\ProfilModel;
use App\Models\TagihanModel;
use App\Models\WaliModel;

class Test extends BaseController
{
	public function __construct()
	{
		$this->profilModel = new ProfilModel();
		$this->orangtuaModel = new OrangtuaModel();
		$this->waliModel = new WaliModel();
		$this->tagihanModel = new TagihanModel();
		$this->mastertagihanModel = new MasterTagihanModel();
	}


	public function index()
	{
		$data = [
			// 'bayar' => $this->tagihanModel->where('user_id', user()->id)->get()->getRow()->status,
			// 'state' => $this->profilModel->where('user_id', user()->id)->countAllResults(),
			// 'profil' => $this->profilModel->where('user_id', user()->id)->get()->getRow(),
			// 'orangtua' => $this->orangtuaModel->where('user_id', user()->id)->get()->getRow(),
			// 'wali' => $this->waliModel->where('user_id', user()->id)->get()->getRow(),
			'title_meta' => view('partials/title-meta', ['title' => 'Welcome']),
			'page_title' => view('partials/page-title', ['title' => 'Welcome', 'pagetitle' => 'Welcome'])
		];

		// if (in_groups('admin')) {
		// 	echo 'true';
		// } else {
		// 	echo inGroup();
		// }

		dd($data);
		// return view('index', $data);
	}
}