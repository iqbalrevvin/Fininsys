<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon">
                    <i class="flaticon-users-1"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    Kelas : <?= $kelas->nama_kelas ?> | Wali Kelas : <?= $kelas->nama_tenpen ?>
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        <div class="form-group m-form__group row">
            <label class="col-form-label"><b>Wali Kelas :</b></label>
            <div class="col-lg-5 col-md-7 col-sm-12 m-select2 m-select2--air m-select2--pill inputBlock">
                <select class="form-control m_select2" id="pilihWaliKelas">
                    <option value="<?= $kelas->NIK_tenpen ?>"><?= $kelas->nama_tenpen ?> | <?= $kelas->nama_sekolah ?></option>
                    <?php foreach ($dataWaliKelas as $data): ?>
                        <option value="<?= $data->NIK_tenpen ?>"><?= $data->nama_tenpen ?> | <?= $data->nama_sekolah ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!--begin: Search Form -->
        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="form-group m-form__group row align-items-center">
                        <div class="col-md-4">
                            <div class="m-input-icon m-input-icon--left">
                                <input type="text" class="form-control m-input" placeholder="Pencarian..." id="generalSearch">
                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                    <span><i class="la la-search"></i></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="m-form__group m-form__group--inline">
                                <div class="m-form__label">
                                   
                                </div>
                                <div class="m-form__control">
                                    <select class="form-control m-bootstrap-select" id="m_form_jk">
                                        <option value="">Semua Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-md-none m--margin-bottom-5"></div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <a href="#" class="btn m-btn--gradient-from-primary m-btn--gradient-to-info m-btn--air m-btn--pill" 
                        data-toggle="modal" data-target="#viewModalSiswa" data-backdrop="static" data-keyboard="true" title="Tambah Data">
                        <span>
                            <i class="la flaticon-user-add"></i>
                            <span>
                                Tambah Siswa
                            </span>
                        </span>
                    </a>
                    <button type="button" class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--air" id="reloadTabel">
                        <span>
                            <i class="flaticon-refresh"></i>
                            <span>Muat Ulang</span>
                        </span>
                    </button>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>
        </div>
        <i>*Klik Tombol <b><i class="la la-trash"></i></b> Untuk Mengeuarkan Siswa Dari Kelas</i>
        <!--begin: Datatable -->
        <table class="siswakelas-datatable" id="" width="100%">
            <thead>
                <tr>
                    <th data-field="no">#</th>
                    <th data-field="namaPesertaDidik">Nama Peserta Didik</th>
                    <th data-field="jenisKelamin">JK</th>
                    <th data-field="noIdentitas">No. Identitas</th>
                    <th data-field="NIPD">NIPD</th>
                    <th data-field="NISN">NISN</th>
                    <th data-field="sekolah">Sekolah</th>
                    <th data-field="action">Act</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($dataSiswaKelas as $siswa): ?>
                    <tr data-id=<?= $siswa->NIK_pd ?>>
                        <td><?= $no++ ?></td>
                        <td><b><?= $siswa->nama_pd ?></b></td>
                        <td><?= $siswa->jk_pd ?></td>
                        <td><?= $siswa->NIK_pd ?></td>
                        <td><?= value($siswa->nipd) ?></td>
                        <td><?= value($siswa->nisn) ?></td>
                        <td><?= $siswa->nama_sekolah ?></td>
                        <td align="left" class="m-datatable__cell">
                            <button id="btnKeluar" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" 
                                     title="Keluarkan <?= $siswa->nama_pd ?> Dari Kelas <?= $kelas->nama_kelas ?>" 
                                     data-nama=<?= $siswa->nama_pd ?> data-id=<?= $siswa->NIK_pd ?>>   
                                    <i class="la la-trash"></i>                      
                            </button>
                            <i id="loadKeluarKelas<?= $siswa->NIK_pd ?>"></i>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <!--end: Datatable -->
    </div>
</div>

<script src="<?= base_url('assets/js/demo/bootstrap-select.js') ?>"></script>
<script src="<?= base_url('assets/js/demo/select2.js') ?>"></script>

<!--end::Modal-->
