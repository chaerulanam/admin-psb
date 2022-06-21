<!DOCTYPE html>
<html lang="en">

<head>
    <?= $title_meta ?>
    <link rel="shortcut icon" href="/assets/images/logo-sm.png">

</head>

<body>
    <div id="snippetContent">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>

        <div class="container">
            <div class="main-body">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <img src="assets/images/korp-alishlah.jpg" alt="logo" height="170" />
                        </div>
                        <hr>
                        <div class="justify-content-center">
                            <div class="text-center">
                                <h5>PANITIA PENERIMAAN SANTRI BARU
                                    <br> TAHUN AJARAN 2022/2023
                                </h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row gutters-sm">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center"> <img
                                                src="assets/images/users/<?= $profil->foto; ?>" alt="Admin"
                                                class="rounded" width="150">
                                            <div class="mt-3">
                                                <h4><?= $profil->nama_lengkap; ?></h4>
                                                <hr>
                                                <p class="text-secondary mb-1"><?= $profil->no_hp; ?></p>
                                                <hr>
                                                <p class="text-muted font-size-sm"><?= $profil->alamat_lengkap; ?></p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Nomor Registrasi</h6>
                                            </div>
                                            <?php if ($profil->jenjang_pendidikan == "TK" and $profil->jenis_kelamin == "Laki-laki") : ?>
                                            <div class="col-sm-8 text-secondary">
                                                T222301<?= str_pad($profil->id, 3, '0', STR_PAD_LEFT); ?></div>
                                            <?php elseif ($profil->jenjang_pendidikan == "SD" and $profil->jenis_kelamin == "Laki-laki") : ?>
                                            <div class="col-sm-8 text-secondary">
                                                D222301<?= str_pad($profil->id, 3, '0', STR_PAD_LEFT); ?></div>
                                            <?php elseif ($profil->jenjang_pendidikan == "SMP" and $profil->jenis_kelamin == "Laki-laki") : ?>
                                            <div class="col-sm-8 text-secondary">
                                                P222301<?= str_pad($profil->id, 3, '0', STR_PAD_LEFT); ?></div>
                                            <?php elseif ($profil->jenjang_pendidikan == "SMA" and $profil->jenis_kelamin == "Laki-laki") : ?>
                                            <div class="col-sm-8 text-secondary">
                                                A222301<?= str_pad($profil->id, 3, '0', STR_PAD_LEFT); ?></div>

                                            <?php elseif ($profil->jenjang_pendidikan == "TK" and $profil->jenis_kelamin == "Perempuan") : ?>
                                            <div class="col-sm-8 text-secondary">
                                                T222302<?= str_pad($profil->id, 3, '0', STR_PAD_LEFT); ?></div>
                                            <?php elseif ($profil->jenjang_pendidikan == "SD" and $profil->jenis_kelamin == "Perempuan") : ?>
                                            <div class="col-sm-8 text-secondary">
                                                D222302<?= str_pad($profil->id, 3, '0', STR_PAD_LEFT); ?></div>
                                            <?php elseif ($profil->jenjang_pendidikan == "SMP" and $profil->jenis_kelamin == "Perempuan") : ?>
                                            <div class="col-sm-8 text-secondary">
                                                P222302<?= str_pad($profil->id, 3, '0', STR_PAD_LEFT); ?></div>
                                            <?php elseif ($profil->jenjang_pendidikan == "SMA" and $profil->jenis_kelamin == "Perempuan") : ?>
                                            <div class="col-sm-8 text-secondary">
                                                A222302<?= str_pad($profil->id, 3, '0', STR_PAD_LEFT); ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">NISN</h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary"> <?= $profil->nisn; ?></div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Jenis Kelamin</h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary"><?= $profil->jenis_kelamin; ?></div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Tempat Tgl Lahir</h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary">
                                                <?= $profil->tempat_lahir . ', ' . $profil->tanggal_lahir; ?></div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Sekolah Asal</h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary"> <?= $profil->sekolah_asal; ?></div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Jenjang Pendidikan</h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary"> <?= $profil->jenjang_pendidikan; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Ukuran Baju</h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary"> <?= $profil->ukuran_baju; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Tanggal Daftar</h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary"> <?= $profil->created_at; ?></div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Gelombang</h6>
                                            </div>
                                            <?php if (strtotime($profil->created_at) >= strtotime('2021-12-1') and strtotime($profil->created_at) < strtotime('2022/3/4')) : ?>
                                            <div class="col-sm-8 text-secondary">1</div>
                                            <?php elseif (strtotime($profil->created_at) >= strtotime('2022/3/4') and strtotime($profil->created_at) < strtotime('2022/7/1')) : ?>
                                            <div class="col-sm-8 text-secondary">2</div>
                                            <?php endif; ?>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Jadwal Ujian Tulis</h6>
                                            </div>
                                            <?php if (strtotime($profil->created_at) >= strtotime('2021-12-1') and strtotime($profil->created_at) < strtotime('2022/3/4')) : ?>
                                            <div class="col-sm-8 text-secondary">Ahad, 6 Maret 2022 pukul 08.00 s.d
                                                12.00 wib </div>
                                            <?php elseif (strtotime($profil->created_at) >= strtotime('2022/3/4') and strtotime($profil->created_at) < strtotime('2022/7/1')) : ?>
                                            <div class="col-sm-8 text-secondary">Ahad, 3 Juli 2022 pukul 08.00 s.d 12.00
                                                wib</div>
                                            <?php endif; ?>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Tempat Ujian Tulis </h6>
                                            </div>
                                            <?php if ($total_pendaftar->id <= 20) : ?>
                                            <div class="col-sm-8 text-secondary">Ruang : 01</div>
                                            <?php elseif ($total_pendaftar->id > 20 && $total_pendaftar->id <= 40) : ?>
                                            <div class="col-sm-8 text-secondary">Ruang : 02</div>
                                            <?php elseif ($total_pendaftar->id > 40 && $total_pendaftar->id <= 44) : ?>
                                            <div class="col-sm-8 text-secondary">Ruang : 03</div>
                                            <?php elseif ($total_pendaftar->id > 44 && $total_pendaftar->id <= 64) : ?>
                                            <div class="col-sm-8 text-secondary">Ruang : 01</div>
                                            <?php elseif ($total_pendaftar->id > 64 && $total_pendaftar->id <= 84) : ?>
                                            <div class="col-sm-8 text-secondary">Ruang : 02</div>
                                            <?php elseif ($total_pendaftar->id > 84 && $total_pendaftar->id <= 104) : ?>
                                            <div class="col-sm-8 text-secondary">Ruang : 03</div>
                                            <?php elseif ($total_pendaftar->id > 104 && $total_pendaftar->id <= 124) : ?>
                                            <div class="col-sm-8 text-secondary">Ruang : 04</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p> <i> Kartu ini bukti pendaftaran santri baru Pesantren Al-Ishlah Tajug Tahun Ajaran
                                    2022/2023 </i></p>
                            <div style="border-bottom:1px dashed #00f;"></div>
                        </div>


                        <div class="card">
                            <div class="card-body">
                                <div class="mt-3">
                                    <p class="text-secondary mb-1"><b>Harap menyerahkan berkas sebagai berikut pada saat
                                            Test Masuk :</b></p>
                                    <hr>
                                    <ul><b>
                                            <input type="checkbox" class="form-check-input" id="contacusercheck6">
                                            <li>Pass Photo 3X4 Latar Belakang Merah 5 Lembar
                                            </li>
                                            <input type="checkbox" class="form-check-input" id="contacusercheck6">
                                            <li>Fotocopy Ijazah Terakhir berlegalisir 3 lembar
                                            </li>
                                            <input type="checkbox" class="form-check-input" id="contacusercheck6">
                                            <li>Fotocopy Ijazah DTA 3 lembar (bagi yang memiliki)</li>
                                            <input type="checkbox" class="form-check-input" id="contacusercheck6">
                                            <li>Fotocopy Akta Kelahiran 3 lembar</li>
                                            <input type="checkbox" class="form-check-input" id="contacusercheck6">
                                            <li>Fotocopy Kartu Keluarga 3 lembar</li>
                                            <input type="checkbox" class="form-check-input" id="contacusercheck6">
                                            <li>Fotocopy KTP Orangtua / Wali 3 lembar</li>
                                            <input type="checkbox" class="form-check-input" id="contacusercheck6">
                                            <li>Fotocopy Kartu NISN 3 lembar</li>
                                            <input type="checkbox" class="form-check-input" id="contacusercheck6">
                                            <li>Surat Keterangan Sehat Dokter</li>
                                            <input type="checkbox" class="form-check-input" id="contacusercheck6">
                                            <li>KPS/KKS/SKTM/Kartu Indonesia Pintar (bagi yang
                                                memiliki)</li>
                                            <input type="checkbox" class="form-check-input" id="contacusercheck6">
                                            <li>Kartu BPJS Kesehatan (bagi yang memiliki)</li>
                                            <input type="checkbox" class="form-check-input" id="contacusercheck6">
                                            <li>Menyerahkan Surat Keterangan Hasil Swab PCR / Swab Antigen yang
                                                masih berlaku saat kedatangan ke pesantren</li>

                                        </b>
                                    </ul>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <style type="text/css">
    body {
        margin-top: 20px;
        color: #1a202c;
        text-align: left;
        background-color: #e2e8f0;
    }

    .main-body {
        padding: 15px;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }
    </style>

    <script>
    window.onload = function() {
        window.print();
        // window.close();
    }
    </script>
    </div>
</body>

</html>