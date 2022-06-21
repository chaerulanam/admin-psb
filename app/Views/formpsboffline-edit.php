<div class="card">
    <div class="card-body">

        <div id="mystep1">
            <!-- Seller Details -->
            <h3>Data Diri</h3>
            <section>
                <form>
                    <div class="row">

                        <div class="col-md-4">
                            <div>
                                <div class="d-flex align-items-start mt-2">
                                    <div class="mb-3 row">
                                        <label class="col-md-12 col-form-label">Username</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="user_id_edit" disabled>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <div class="d-flex align-items-start mt-2">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-12 col-form-label">Nama
                                            Lengkap</label>
                                        <div class="col-md-12">
                                            <input class="form-control" oninput="this.value = this.value.toUpperCase()"
                                                type="text" placeholder="Nama Lengkap" id="nama_lengkap_edit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div>
                                <div class="d-flex align-items-start mt-2">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-12 col-form-label">Sekolah
                                            Asal</label>
                                        <div class="col-md-12">
                                            <input class="form-control" oninput="this.value = this.value.toUpperCase()"
                                                type="text" placeholder="Sekolah Asal" id="sekolah_asal_edit">
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
                                        <label class="col-md-12 col-form-label">Jenis Kelamin</label>
                                        <div class="col-md-12">
                                            <select class="form-select" id="jenis_kelamin_edit">
                                                <option value=>Select</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <div class="d-flex align-items-start mt-2">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-12 col-form-label">NISN</label>
                                        <div class="col-md-12">
                                            <input class="form-control" oninput="this.value = this.value.toUpperCase()"
                                                type="number" placeholder="NISN" id="nisn_edit">
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
                                            <input class="form-control" oninput="this.value = this.value.toUpperCase()"
                                                type="text" placeholder="Tempat Lahir" id="tempat_lahir_edit">
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
                                        <label for="tanggal_lahir" class="col-md-12 col-form-label">Tanggal
                                            Lahir</label>
                                        <div class="col-md-10">
                                            <input class="form-control" oninput="this.value = this.value.toUpperCase()"
                                                type="date" value="2019-08-19" id="tanggal_lahir_edit">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <div class="d-flex align-items-start mt-2">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-12 col-form-label">NIK (Nomor
                                            KTP)</label>
                                        <div class="col-md-12">
                                            <input class="form-control" type="number" placeholder="NIK" id="nik_edit"
                                                minlength="12" maxlength="16"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div>
                                <div class="d-flex align-items-start mt-2">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-12 col-form-label">Nomor Kartu
                                            Keluarga</label>
                                        <div class="col-md-12">
                                            <input class="form-control" type="number" placeholder="No. KK"
                                                id="no_kk_edit" minlength="12" maxlength="16"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
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
                                        <label class="col-md-12 col-form-label">Jenjang Pendidikan</label>
                                        <div class="col-md-12">
                                            <select class="form-select" id="jenjang_pendidikan_edit">
                                                <option value=>Select</option>
                                                <option>TK</option>
                                                <option>SD</option>
                                                <option>SMP</option>
                                                <option>SMA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <div class="d-flex align-items-start mt-2">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-12 col-form-label">Nomor HP yang
                                            Aktif</label>
                                        <div class="col-md-12">
                                            <input class="form-control" oninput="this.value = this.value.toUpperCase()"
                                                type="number" placeholder="No. HP" id="no_hp_edit" minlength="8"
                                                maxlength="13"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <div class="d-flex align-items-start mt-2">
                                    <div class="mb-3 row">
                                        <label class="col-md-12 col-form-label">Ukuran Baju</label>
                                        <div class="col-md-12">
                                            <select class="form-select" id="ukuran_baju_edit">
                                                <option value=>Select</option>
                                                <option>S (LD 41 PB 63)</option>
                                                <option>M (LD 44 PB 65)</option>
                                                <option>L (LD 50 PB 69)</option>
                                                <option>XL (LD 52 PB 71)</option>
                                                <option>XXL (LD 56 PB 76)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class=" row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="basicpill-address-input">Alamat Lengkap</label>
                                <input id="alamat_edit" class="form-control" placeholder="" rows="2"></input>
                            </div>
                        </div>
                    </div>

                </form>
            </section>
            <h3>Upload Foto</h3>
            <section>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center">
                            <div class="card-body">
                                <div class="clearfix"></div>
                                <div class="mb-4">
                                    <img src="assets/images/default.png" alt="" class="avatar-lg rounded img-thumbnail"
                                        id="preview-edit">
                                    <input type="file" class="form-control-file" id="foto_edit"
                                        onchange="preview_edit()">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <h3>Data Orang Tua</h3>
            <section>
                <form>
                    <div class="row">
                        <div class="col-md-3">
                            <div>
                                <div class="d-flex align-items-start mt-2">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-12 col-form-label">Nama
                                            Ayah</label>
                                        <div class="col-md-12">
                                            <input class="form-control" oninput="this.value = this.value.toUpperCase()"
                                                type="text" placeholder="Nama Ayah" id="nama_ayah_edit">
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
                                            <select class="form-select" id="pendidikan_ayah_edit">
                                                <option value=>Select</option>
                                                <option value="sd">SD/Sederajat</option>
                                                <option value="smp">SMP/Sederajat</option>
                                                <option value="sma">SMA/Sederajat</option>
                                                <option value="diploma">Diploma</option>
                                                <option value="s1">Sarjana (S1)</option>
                                                <option value="s2">Magister (S2)</option>
                                                <option value="s3">Doktor (S3)</option>
                                            </select>
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
                                            <select class="form-select" id="penghasilan_ayah_edit">
                                                <option value=>Select</option>
                                                <option>Tidak Berpenghasilan</option>
                                                <option>Kurang dari Rp. 1.000.000</option>
                                                <option>Rp. 1.000.000 s/d 2.000.000</option>
                                                <option>Rp. 3.000.000 s/d 4.000.000</optione=>
                                                <option>Rp. 4.000.000 s/d 5.000.000</option>
                                                <option>Lebih dari Rp. 5.000.000</option>
                                            </select>
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
                                            <select class="form-select" id="pekerjaan_ayah_edit">
                                                <option value=>Select</option>
                                                <option>Aparatur Sipil Negara (ASN)</option>
                                                <option>TNI / POLRI</option>
                                                <option>Anggota DPR / DPRD</option>
                                                <option>Dokter</optione=>
                                                <option>Pedagang</option>
                                                <option>Wiraswasta</option>
                                                <option>Petani / Nelayan</option>
                                                <option>Guru/Dosen</option>
                                                <option>Petani/Nelayan</option>
                                                <option>Karyawan Swasta</option>
                                                <option>Lainya</option>
                                            </select>
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
                                        <label for="example-text-input" class="col-md-12 col-form-label">Nama
                                            Ibu</label>
                                        <div class="col-md-12">
                                            <input class="form-control" oninput="this.value = this.value.toUpperCase()"
                                                type="text" placeholder="Nama Ibu" id="nama_ibu_edit">
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
                                            <select class="form-select" id="pendidikan_ibu_edit">
                                                <option value=>Select</option>
                                                <option value="sd">SD/Sederajat</option>
                                                <option value="smp">SMP/Sederajat</option>
                                                <option value="sma">SMA/Sederajat</option>
                                                <option value="diploma">Diploma</option>
                                                <option value="s1">Sarjana (S1)</option>
                                                <option value="s2">Magister (S2)</option>
                                                <option value="s3">Doktor (S3)</option>
                                            </select>
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
                                            <select class="form-select" id="penghasilan_ibu_edit">
                                                <option value=>Select</option>
                                                <option>Tidak Berpenghasilan</option>
                                                <option>Kurang dari Rp. 1.000.000</option>
                                                <option>Rp. 1.000.000 s/d 2.000.000</option>
                                                <option>Rp. 3.000.000 s/d 4.000.000</optione=>
                                                <option>Rp. 4.000.000 s/d 5.000.000</option>
                                                <option>Lebih dari Rp. 5.000.000</option>
                                            </select>
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
                                            <select class="form-select" id="pekerjaan_ibu_edit">
                                                <option value=>Select</option>
                                                <option>Aparatur Sipil Negara (ASN)</option>
                                                <option>TNI / POLRI</option>
                                                <option>Anggota DPR / DPRD</option>
                                                <option>Dokter</optione=>
                                                <option>Pedagang</option>
                                                <option>Wiraswasta</option>
                                                <option>Petani / Nelayan</option>
                                                <option>Guru/Dosen</option>
                                                <option>Ibu Rumah Tangga</option>
                                                <option>Petani/Nelayan</option>
                                                <option>Karyawan Swasta</option>
                                                <option>Lainya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </form>
            </section>

            <h3>Data Wali</h3>
            <section>
                <div>
                    <form>
                        <div class="row">
                            <div class="col-md-3">
                                <div>
                                    <div class="d-flex align-items-start mt-2">
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-12 col-form-label">Nama
                                                Wali</label>
                                            <div class="col-md-12">
                                                <input class="form-control"
                                                    oninput="this.value = this.value.toUpperCase()" type="text"
                                                    placeholder="Nama Wali" id="nama_wali_edit">
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
                                                <select class="form-select" id="hubungan_sosial_edit">
                                                    <option value=>Select</option>
                                                    <option>Kakek / Nenek</option>
                                                    <option>Paman / Bibi</option>
                                                    <option>Tetangga</option>
                                                    <option>Saudara Jauh</option>
                                                    <option>Lainya</option>
                                                </select>
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
                                                <select class="form-select" id="penghasilan_wali_edit">
                                                    <option value=>Select</option>
                                                    <option>Tidak Berpenghasilan</option>
                                                    <option>Kurang dari Rp. 1.000.000</option>
                                                    <option>Rp. 1.000.000 s/d 2.000.000</option>
                                                    <option>Rp. 3.000.000 s/d 4.000.000</optione=>
                                                    <option>Rp. 4.000.000 s/d 5.000.000</option>
                                                    <option>Lebih dari Rp. 5.000.000</option>
                                                </select>
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
                                                <select class="form-select" id="pekerjaan_wali_edit">
                                                    <option value=>Select</option>
                                                    <option>Aparatur Sipil Negara (ASN)</option>
                                                    <option>TNI / POLRI</option>
                                                    <option>Anggota DPR / DPRD</option>
                                                    <option>Dokter</optione=>
                                                    <option>Pedagang</option>
                                                    <option>Wiraswasta</option>
                                                    <option>Petani / Nelayan</option>
                                                    <option>Guru/Dosen</option>
                                                    <option>Petani/Nelayan</option>
                                                    <option>Lainya / Ibu Rumah Tangga</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <p>NB : Tidak Wajib Diisi ! </p>
                            </div>

                        </div>
                    </form>
                </div>
            </section>


            <h3>Finish</h3>
            <section>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center">
                            <div class="mb-4">
                                <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                            </div>
                            <div>
                                <h5>Finish</h5>
                                <p class="text-muted">Pastikan semua data yang diisi sudah benar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
    <!-- end card body -->
</div>
<!-- end card -->