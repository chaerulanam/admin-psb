<?php

namespace App\Controllers;

use App\Models\MasterTagihanModel;
use App\Models\OrangtuaModel;
use App\Models\ProfilModel;
use App\Models\TagihanModel;
use App\Models\WaliModel;

class Home extends BaseController
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
			'bayar' => $this->tagihanModel->where('user_id', user()->id)->get()->getRow()->status,
			'state' => $this->profilModel->where('user_id', user()->id)->countAllResults(),
			'profil' => $this->profilModel->where('user_id', user()->id)->get()->getRow(),
			'orangtua' => $this->orangtuaModel->where('user_id', user()->id)->get()->getRow(),
			'wali' => $this->waliModel->where('user_id', user()->id)->get()->getRow(),
			'title_meta' => view('partials/title-meta', ['title' => 'Welcome']),
			'page_title' => view('partials/page-title', ['title' => 'Welcome', 'pagetitle' => 'Welcome'])
		];
		// dd($data);
// 		if (in_groups('santri')){
// 		    echo 'true';
// 		} else {
// 		    echo 'false';
// 		}
		return view('index', $data);
	}

	public function add()
	{
		if ($this->request->isAJAX()) {
			$csrfname = csrf_token();
			$csrfhash = csrf_hash();

			if (
				$this->profilModel
				->where('user_id', user()->id)
				->countAllResults() > 0
			) {
				$data = array('error' => 'Anda Sudah Menginput Data');
				$data[$csrfname] = $csrfhash;
				return $this->response->setJSON($data);
			}

			if (!$this->validate(
				[
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
				'user_id' => user()->id,
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
				'user_id' => user()->id,
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
				'user_id' => user()->id,
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
						'no_tagihan' => 2223 . str_pad($mastertagihan[1]->id, 2, '0', STR_PAD_LEFT) . str_pad(user()->id, 3, '0', STR_PAD_LEFT),
						'master_tagihan_id' => $mastertagihan[1]->id, //sumbangan pembangunan
						'user_id' => user()->id,
						'status' => 1,
						'nominal' => 3500000,
					],
					[
						'no_tagihan' => 2223 . str_pad($mastertagihan[2]->id, 2, '0', STR_PAD_LEFT) . str_pad(user()->id, 3, '0', STR_PAD_LEFT),
						'master_tagihan_id' => $mastertagihan[2]->id, //Meja Kursi
						'user_id' => user()->id,
						'status' => 1,
						'nominal' => 500000,
					],
					[
						'no_tagihan' => 2223 . str_pad($mastertagihan[9]->id, 2, '0', STR_PAD_LEFT) . str_pad(user()->id, 3, '0', STR_PAD_LEFT),
						'master_tagihan_id' => $mastertagihan[9]->id, //Juli
						'user_id' => user()->id,
						'status' => 1,
						'nominal' => 750000,
					],
					[
						'no_tagihan' => 2223 . str_pad($mastertagihan[15]->id, 2, '0', STR_PAD_LEFT) . str_pad(user()->id, 3, '0', STR_PAD_LEFT),
						'master_tagihan_id' => $mastertagihan[15]->id, //seragam pramuka
						'user_id' => user()->id,
						'status' => 1,
						'nominal' => 200000,
					],
					[
						'no_tagihan' => 2223 . str_pad($mastertagihan[16]->id, 2, '0', STR_PAD_LEFT) . str_pad(user()->id, 3, '0', STR_PAD_LEFT),
						'master_tagihan_id' => $mastertagihan[16]->id, //seragam batik
						'user_id' => user()->id,
						'status' => 1,
						'nominal' => 100000,
					],
					[
						'no_tagihan' => 2223 . str_pad($mastertagihan[17]->id, 2, '0', STR_PAD_LEFT) . str_pad(user()->id, 3, '0', STR_PAD_LEFT),
						'master_tagihan_id' => $mastertagihan[17]->id, //seragam olahraga
						'user_id' => user()->id,
						'status' => 1,
						'nominal' => 150000,
					],
					[
						'no_tagihan' => 2223 . str_pad($mastertagihan[18]->id, 2, '0', STR_PAD_LEFT) . str_pad(user()->id, 3, '0', STR_PAD_LEFT),
						'master_tagihan_id' => $mastertagihan[18]->id, //krudung
						'user_id' => user()->id,
						'status' => 1,
						'nominal' => 240000,
					],
					[
						'no_tagihan' => 2223 . str_pad($mastertagihan[19]->id, 2, '0', STR_PAD_LEFT) . str_pad(user()->id, 3, '0', STR_PAD_LEFT),
						'master_tagihan_id' => $mastertagihan[19]->id, //Lemari
						'user_id' => user()->id,
						'status' => 1,
						'nominal' => 500000,
					],
					[
						'no_tagihan' => 2223 . str_pad($mastertagihan[20]->id, 2, '0', STR_PAD_LEFT) . str_pad(user()->id, 3, '0', STR_PAD_LEFT),
						'master_tagihan_id' => $mastertagihan[20]->id, //krudung
						'user_id' => user()->id,
						'status' => 1,
						'nominal' => 350000,
					],
				];
			} else {

				$datatagihan = [
					[
						'no_tagihan' => 2223 . str_pad($mastertagihan[1]->id, 2, '0', STR_PAD_LEFT) . str_pad(user()->id, 3, '0', STR_PAD_LEFT),
						'master_tagihan_id' => $mastertagihan[1]->id, //sumbangan pembangunan
						'user_id' => user()->id,
						'status' => 1,
						'nominal' => 3500000,
					],
					[
						'no_tagihan' => 2223 . str_pad($mastertagihan[2]->id, 2, '0', STR_PAD_LEFT) . str_pad(user()->id, 3, '0', STR_PAD_LEFT),
						'master_tagihan_id' => $mastertagihan[2]->id, //Meja Kursi
						'user_id' => user()->id,
						'status' => 1,
						'nominal' => 500000,
					],
					[
						'no_tagihan' => 2223 . str_pad($mastertagihan[9]->id, 2, '0', STR_PAD_LEFT) . str_pad(user()->id, 3, '0', STR_PAD_LEFT),
						'master_tagihan_id' => $mastertagihan[9]->id, //Juli
						'user_id' => user()->id,
						'status' => 1,
						'nominal' => 750000,
					],
					[
						'no_tagihan' => 2223 . str_pad($mastertagihan[15]->id, 2, '0', STR_PAD_LEFT) . str_pad(user()->id, 3, '0', STR_PAD_LEFT),
						'master_tagihan_id' => $mastertagihan[15]->id, //seragam pramuka
						'user_id' => user()->id,
						'status' => 1,
						'nominal' => 200000,
					],
					[
						'no_tagihan' => 2223 . str_pad($mastertagihan[16]->id, 2, '0', STR_PAD_LEFT) . str_pad(user()->id, 3, '0', STR_PAD_LEFT),
						'master_tagihan_id' => $mastertagihan[16]->id, //seragam batik
						'user_id' => user()->id,
						'status' => 1,
						'nominal' => 100000,
					],
					[
						'no_tagihan' => 2223 . str_pad($mastertagihan[17]->id, 2, '0', STR_PAD_LEFT) . str_pad(user()->id, 3, '0', STR_PAD_LEFT),
						'master_tagihan_id' => $mastertagihan[17]->id, //seragam olahraga
						'user_id' => user()->id,
						'status' => 1,
						'nominal' => 150000,
					],
					[
						'no_tagihan' => 2223 . str_pad($mastertagihan[19]->id, 2, '0', STR_PAD_LEFT) . str_pad(user()->id, 3, '0', STR_PAD_LEFT),
						'master_tagihan_id' => $mastertagihan[19]->id, //Lemari
						'user_id' => user()->id,
						'status' => 1,
						'nominal' => 500000,
					],
					[
						'no_tagihan' => 2223 . str_pad($mastertagihan[20]->id, 2, '0', STR_PAD_LEFT) . str_pad(user()->id, 3, '0', STR_PAD_LEFT),
						'master_tagihan_id' => $mastertagihan[20]->id, //krudung
						'user_id' => user()->id,
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

			$data = array('success' => 'Berhasil Menginput Data.');
			$data[$csrfname] = $csrfhash;
			return $this->response->setJSON($data);
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
}