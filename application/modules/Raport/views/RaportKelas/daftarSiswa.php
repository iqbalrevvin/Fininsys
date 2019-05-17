<!--begin: Search Form -->

<div class="m-form m-form--label-align-right m--margin-top-10 m--margin-bottom-10">
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
        	<a href="#" class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--air" title="Cetak Daftar Siswa">
                <span>
                    <i class="la flaticon-technology"></i>
                    <span>
                        Daftar Siswa 
                    </span>
                </span>
            </a>
            <div class="m-dropdown m-dropdown--inline m-dropdown--small m-dropdown--arrow m-dropdown--align-left" 
				m-dropdown-toggle="hover">
				<a href="#" class="m-dropdown__toggle btn btn-secondary  dropdown-toggle">
					<i class="la flaticon-technology"></i> Raport Kolektif
				</a>
				<div class="m-dropdown__wrapper">
					<div class="m-dropdown__inner">
						<div class="m-dropdown__body">
							<div class="m-dropdown__content">
								<ul class="m-nav">
									<li class="m-nav__section m-nav__section--first">
										<span class="m-nav__section-text">Cetak Raport Kolektif</span>
									</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<i class="m-nav__link-icon flaticon-notes"></i>
											<span class="m-nav__link-text">Hal. Cover</span>
										</a>
									</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<i class="m-nav__link-icon flaticon-file-2"></i>
											<span class="m-nav__link-text">Hal. Biodata</span>
										</a>
									</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<i class="m-nav__link-icon flaticon-statistics"></i>
											<span class="m-nav__link-text">Hal. Nilai</span>
										</a>
									</li>
									<!-- <li class="m-nav__separator m-nav__separator--fit">
									</li> -->
									<!-- <li class="m-nav__item">
										<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Logout</a>
									</li> -->
								</ul>
							</div>
						</div>
					</div>
					<span class="m-dropdown__arrow m-dropdown__arrow--left"></span>
				</div>
			</div>
            <div class="m-separator m-separator--dashed d-xl-none"></div>
        </div>
    </div>
</div>
<!--begin: Datatable -->
<table class="dataSiswaTable" id="" width="100%">
    <thead>
        <tr>
            <th data-field="no">#</th>
            <th data-field="nipd">NIPD</th>
            <th data-field="nisn">NISN</th>
            <th data-field="namaPesertaDidik">Nama Peserta Didik</th>
            <th data-field="jenisKelamin">JK</th>
            <th data-field="jmlMapel">Jml Mapel</th>
            <th data-field="jmlNilaiPengetahuan">Jml Nilai Pengetahuan</th>
            <th data-field="jmlNilaiKeterampilan">Jml Nilai Keterampilan</th>
            <th data-field="peringkat">Peringkat</th>
            <th data-field="action">Act</th>
        </tr>
    </thead>
    <tbody>
    	<?php $no = 1; ?>
    	<?php foreach ($dataSiswa as $list): ?>
	    	<?php $idKelas = $list->idKelas; ?>
	    	<?php $angkatan = $list->tahun_angkatan; ?>
	    	<?php $countMapel 			= $this->Raport_m->countMapel($idMasterLeger, $list->NIK_pd); ?>
	    	<?php $jmlNilaiPengetahuan 	= $this->Raport_m->sumNilaiPengetahuan($idMasterLeger, $list->NIK_pd); ?>
	    	<?php $jmlNilaiKeterampilan = $this->Raport_m->sumNilaiKeterampilan($idMasterLeger, $list->NIK_pd); ?>
           <tr data-id=>
                <td><?= $no++ ?></td>
                <td><?= value($list->nipd) ?></td>
                <td><?= value($list->nisn) ?></td>
                <td><b><?= $list->nama_pd ?></b></td>
                <td><?= $list->jk_pd ?></td>
                <td><b><?= $countMapel ?></b></td>
                <td><b><?= value($jmlNilaiPengetahuan->nilai_pengetahuan); ?></b></td>
                <td><b><?= value($jmlNilaiKeterampilan->nilai_keterampilan); ?></b></td>
                <td><b>1</b></td>
                <td align="left" class="m-datatable__cell">
                    <div class="m-section__content">
						<div class="m-dropdown m-dropdown--inline m-dropdown--small m-dropdown--arrow m-dropdown--align-left" 
							m-dropdown-toggle="hover">
							<a href="#" class="m-dropdown__toggle btn btn-primary btn-sm dropdown-toggle">
								Cetak Raport
							</a>
							<div class="m-dropdown__wrapper">
								<div class="m-dropdown__inner">
									<div class="m-dropdown__body">
										<div class="m-dropdown__content">
											<ul class="m-nav">
												<li class="m-nav__section m-nav__section--first">
													<span class="m-nav__section-text">Cetak Halaman Raport</span>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-notes"></i>
														<span class="m-nav__link-text">Hal. Cover</span>
													</a>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-file-2"></i>
														<span class="m-nav__link-text">Hal. Biodata</span>
													</a>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-statistics"></i>
														<span class="m-nav__link-text">Hal. Nilai</span>
													</a>
												</li>
												<!-- <li class="m-nav__separator m-nav__separator--fit">
												</li> -->
												<!-- <li class="m-nav__item">
													<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Logout</a>
												</li> -->
											</ul>
										</div>
									</div>
								</div>
								<span class="m-dropdown__arrow m-dropdown__arrow--left"></span>
							</div>
						</div>
					</div>
                </td>
            </tr>
         <?php endforeach ?>
    </tbody>
</table>

<!--end: Datatable -->

<script>

var DatatableHtmlTableDemo = {
    init: function() {
        var e;
        e = $(".dataSiswaTable").mDatatable({
            data: {
                saveState: {
                    cookie: !1
                }
            },
            layout: {

                scroll: !0,
            },
            translate: {
                records: {
                    processing: 'Memuat Data Siswa...',
                    noRecords: 'Tidak Ditemukan Siswa Untuk Angkatan & Kelas Yang Dipilih!',
                },
                toolbar: {
                    pagination: {
                        items: {
                            default: {
                                first: 'First',
                                prev: 'Previous',
                                next: 'Next',
                                last: 'Last',
                                more: 'More pages',
                                input: 'Page number',
                                select: 'Jumlah data ditampilkan'
                            },
                            info: 'Menampilkan {{start}} - {{end}} dari {{total}} data'
                        }
                    }
                }
            },

            search: {
                input: $("#generalSearch")
            },
            mobile: {
              layout: 'compact'
            },

            columns: [
            	{
                    field: "no",
                    //title: "No.",
                    //locked: {left: 'lg'},
                    //sortable: true,
                    //sortable: 'asc',
                    width: 20,
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "nipd",
                    //title: "Nama Tenaga Pendidik",
                    //locked: {left: 'lg'},
                    sortable: true,
                    //sortable: 'asc',
                    width: 85,
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "nisn",
                    //title: "Nama Tenaga Pendidik",
                    //locked: {left: 'lg'},
                    sortable: true,
                    //sortable: 'asc',
                    width: 85,
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "namaPesertaDidik",
                    //title: "Nama Tenaga Pendidik",
                    //locked: {left: 'lg'},
                    sortable: true,
                    //sortable: 'asc',
                    width: 150,
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "jenisKelamin",
                    title: "#",
                    width: 75,
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "jmlMapel",
                    title: "#",
                    width: 50,
                    textAlign: "center",
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "jmlNilaiPengetahuan",
                    title: "#",
                    width: 75,
                    textAlign: "center",
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "jmlNilaiKeterampilan",
                    title: "#",
                    width: 75,
                    textAlign: "center",
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "peringkat",
                    title: "#",
                    width: 75,
                    textAlign: "center",
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "action",
                    //sortable: 'asc',
                    textAlign: "left",
                    width: 150,
                    //responsive: {visible: 'lg'},
                },
                
            ],

        }), $("#m_form_jk").on("change", function() {
            e.search($(this).val().toLowerCase(), "jenisKelamin")
        }), $("#m_form_jk, .m_selectpicker").selectpicker()
    }
};
		

</script>