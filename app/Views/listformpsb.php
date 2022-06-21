<div class="card">
    <div class="card-body">
        <div class="d-print-none mt-4">
            <div class="float-end">
                <a href="/KartuPeserta" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"> Cetak Bukti Pendaftaran</i></a>
            </div>
        </div>
        <h4 class="card-title mb-4">Data Pendaftaran Santri Baru</h4>
        <div class="row">
            <div class="col-md-4">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-12 col-form-label">Nama Lengkap</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" value="<?= $profil->nama_lengkap; ?>" placeholder="Nama Lengkap" id="nama_lengkap" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-12 col-form-label">Sekolah Asal</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" value="<?= $profil->sekolah_asal; ?>" id="sekolah_asal" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label class="col-md-12 col-form-label">Jenis Kelamin</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="<?= $profil->jenis_kelamin; ?>" id="jenis_kelamin" disabled>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-12 col-form-label">NISN</label>
                            <div class="col-md-12">
                                <input class="form-control" type="number" value="<?= $profil->nisn; ?>" placeholder="NIK" id="nisn" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label for="tempat_lahir" class="col-md-12 col-form-label">Tempat Lahir</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" placeholder="Tempat Lahir" value="<?= $profil->tempat_lahir; ?>" id="tempat_lahir" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label for="tanggal_lahir" class="col-md-12 col-form-label">Tanggal Lahir</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="<?= date('d/m/Y', strtotime($profil->tanggal_lahir)); ?>" id="tanggal_lahir" disabled>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-12 col-form-label">NIK</label>
                            <div class="col-md-12">
                                <input class="form-control" type="number" value="<?= $profil->nik; ?>" placeholder=" NIK" id="nik" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-12 col-form-label">No KK</label>
                            <div class="col-md-12">
                                <input class="form-control" type="number" value="<?= $profil->kk; ?>" placeholder=" No KK" id="nokk" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label class="col-md-12 col-form-label">Jenjang Pendidikan</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="<?= $profil->jenjang_pendidikan; ?>" id="jenjang_pendidikan" disabled>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="basicpill-address-input">Alamat Lengkap</label>
                    <input id="basicpill-address-input" class="form-control" value="<?= $profil->alamat_lengkap; ?>" rows="2" id="alamat" disabled>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-12 col-form-label">Nama Ayah</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" value="<?= $orangtua->nama_ayah; ?>" placeholder="Nama Ayah" id="nama_ayah" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label class="col-md-12 col-form-label">Pendidikan Terakhir</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" value="<?= $orangtua->pendidikan_ayah; ?>" id="pendidikan_ayah" disabled>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label class="col-md-12 col-form-label">Penghasilan Per Bulan</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" value="<?= $orangtua->penghasilan_ayah; ?>" id="penghasilan_ayah" disabled>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label class="col-md-12 col-form-label">Pekerjaan</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" value="<?= $orangtua->pekerjaan_ayah; ?>" id="pekerjaan_ayah" disabled>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-12 col-form-label">Nama Ibu</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" value="<?= $orangtua->nama_ibu; ?>" placeholder="Nama Ibu" id="nama_ibu" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label class="col-md-12 col-form-label">Pendidikan Terakhir</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" value="<?= $orangtua->pendidikan_ibu; ?>" id="pendidikan_ibu" disabled>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label class="col-md-12 col-form-label">Penghasilan Per Bulan</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" value="<?= $orangtua->penghasilan_ibu; ?>" id="penghasilan_ibu" disabled>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label class="col-md-12 col-form-label">Pekerjaan</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" value="<?= $orangtua->pekerjaan_ibu; ?>" id="pekerjaan_ibu" disabled>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-3">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-12 col-form-label">Nama Wali</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" value="<?= $wali->nama_wali; ?>" id="nama_wali" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label class="col-md-12 col-form-label">Hubungan Sosial</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" value="<?= $wali->hubungan_sosial; ?>" id="hubungan_sosial" disabled>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label class="col-md-12 col-form-label">Penghasilan Per Bulan</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" value="<?= $wali->penghasilan_wali; ?>" id="penghasilan_wali" disabled>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div>
                    <div class="d-flex align-items-start mt-2">
                        <div class="mb-3 row">
                            <label class="col-md-12 col-form-label">Pekerjaan</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" value="<?= $wali->pekerjaan_wali; ?>" id="pekerjaan_wali" disabled>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>


    </div>
    <!-- end card body -->
</div>
<!-- end card -->