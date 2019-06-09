<div class="modal fade" id="modalCetakRaportKolektif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">
                    Cetak Raport Kolektif
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-portlet m-portlet--mobile" id="">
                 <div class="m-portlet__body">
                    <p class="text-dark">Cetak Raport Seluruh Siswa Kelas Pada Kelas Ini</p>
                    <p class="text-danger">Cetak Raport secara kolektif belum tersedia dikarenakan akan memuat halaman raport yang cukup banyak dan menyebabkan <i>Load Resource</i> Perangkat Keras menjadi tinggi.</p>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>
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
            <a href="#" data-toggle="modal" data-target="#modalCetakRaportKolektif" 
                class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--air" title="Cetak Raport Kolektif">
                <span>
                    <i class="la flaticon-technology"></i>
                    <span>
                        Raport Kolektif
                    </span>
                </span>
            </a>
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
            <th data-field="namaPesertaDidik">Nama Peserta Didik</th>
            <th data-field="jenisKelamin">JK</th>
            <th data-field="jmlMapel">Jml Mapel</th>
            <th data-field="jmlNilaiPengetahuan">Jml Nilai Pengetahuan</th>
            <th data-field="jmlNilaiKeterampilan">Jml Nilai Keterampilan</th>
            <th data-field="peringkat">Peringkat</th>
            <th data-field="cetakRaport">Cetak Raport</th>
            <th data-field="rekapAbsen">Act</th>
        </tr>
    </thead>
    <tbody>
    	<?php $sumNilaiKelas = $this->Raport_m->sumNilaiKelas($idMasterLeger); ?>
    	<?php foreach ($sumNilaiKelas as $data): ?>
	    	<?php $sumNilaiPengetahuan = $data->nilai_pengetahuan ?>
	    	<?php $sumNilaiKeterampilan = $data->nilai_keterampilan ?>
	    	<?php $nilaiKelas[] = $sumNilaiPengetahuan+$sumNilaiKeterampilan ?>
            <?php $arrayPengetahuan[] = $sumNilaiPengetahuan ?>
		<?php endforeach ?>
    	<?php $no = 1; ?>
    	<?php foreach ($dataSiswa as $list): ?>
	    	<!-- <?php $idKelas 				= $list->idKelas; ?> -->
	    	<!-- <?php $angkatan 			= $list->tahun_angkatan; ?> -->
            <?php $raportModel          = $this->Raport_m; ?>
	    	<?php $countMapel 			= $this->Raport_m->countMapel($idMasterLeger, $list->NIK_pd); ?>
	    	<?php $jmlNilaiPengetahuan 	= $this->Raport_m->sumNilaiPengetahuan($idMasterLeger, $list->NIK_pd); ?>
	    	<?php $jmlNilaiKeterampilan = $this->Raport_m->sumNilaiKeterampilan($idMasterLeger, $list->NIK_pd); ?>
            <?php $nilaiPrilaku         = $this->Raport_m->nilaiPrilaku($idMasterLeger, $list->NIK_pd); ?>
	    	<?php $nilaiAkhir 			= $jmlNilaiPengetahuan->nilai_pengetahuan+$jmlNilaiKeterampilan->nilai_keterampilan; ?>
	    	<?php #$valueArray 			= "'1530,1531,1624,654,'"; ?>
	    	<?php $valueArray 			= implode(',',$list->nama_pd.'-'.$nilaiKelas); ?>

           <tr data-id=>
                <td><?= $no++ ?></td>
                <td><?= value($list->nipd) ?></td>
                <td><b><?= $list->nama_pd ?></b></td>
                <td><?= $list->jk_pd ?></td>
                <td><b><?= $countMapel ?></b></td>
                <td><b><?= value($jmlNilaiPengetahuan->nilai_pengetahuan); ?></b></td>
                <td><b><?= value($jmlNilaiKeterampilan->nilai_keterampilan); ?></b></td>
                <td>
                	<?php $rank = $this->Raport_m->rankSystem($nilaiAkhir, "'$valueArray'");  ?>
					<b class="m--font-focus"><?= $rank->rank ?></b>
                </td>    
           
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
													<a href="<?= base_url('Raport/CetakRaport/SelfPrintCover?StudentID='.$list->NIK_pd.'&MasterID='.$idMasterLeger) ?>&DateOfDistribution=<?= $titimangsa ?>" 
                                                    class="m-nav__link" target="_blank">
														<i class="m-nav__link-icon flaticon-notes"></i>
														<span class="m-nav__link-text">Hal. Cover</span>
													</a>
												</li>
												<li class="m-nav__item">
													<a href="<?= base_url('Raport/CetakRaport/SelfPrintIdentity?StudentID='.$list->NIK_pd.'&MasterID='.$idMasterLeger) ?>&DateOfDistribution=<?= $titimangsa ?>" class="m-nav__link" target="_blank">
														<i class="m-nav__link-icon flaticon-file-2"></i>
														<span class="m-nav__link-text">Hal. Identitas</span>
													</a>
												</li>
												<li class="m-nav__item">
													<a href="<?= base_url('Raport/CetakRaport/SelfPrintNilai?StudentID='.$list->NIK_pd.'&MasterID='.$idMasterLeger) ?>&Semester=<?= $semester ?>&DateOfDistribution=<?= $titimangsa ?>" 
                                                        class="m-nav__link" target="_blank">
														<i class="m-nav__link-icon flaticon-statistics"></i>
														<span class="m-nav__link-text">Hal. Nilai</span>
													</a>
												</li>
                                                <li class="m-nav__item">
                                                    <a href="<?= base_url('Raport/CetakRaport/SelfPrintBundle?StudentID='.$list->NIK_pd.'&MasterID='.$idMasterLeger) ?>&Semester=<?= $semester ?>&DateOfDistribution=<?= $titimangsa ?>" 
                                                        class="m-nav__link" target="_blank">
                                                        <i class="m-nav__link-icon flaticon-layers"></i>
                                                        <span class="m-nav__link-text">Hal. Keseluruhan</span>
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
                <td>
                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-backdrop="static"
                        data-target="#modalRekapAbsen<?= $list->NIK_pd ?>" title="Rekap Absen">
                        Rekap Absen
                    </a>
                </td>
                <div class="modal fade" id="modalRekapAbsen<?= $list->NIK_pd ?>" tabindex="-1" role="dialog" 
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel">
                                    Rekap Absen <b><?= $list->nama_pd ?></b><br>Semester <b><?= $semester ?></b>
                                </h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="m-portlet m-portlet--mobile" id="">
                                 <div class="m-portlet__body">
                                    <p>Isi Rekapitulasi Absen Peserta Didik Untuk Ditampilkan Pada Raport</p>
                                    <?php $absen = $this->Raport_m->rekapAbsen($list->NIK_pd, $semester) ?>
                                    <ul>
                                        <li>
                                            Jumlah Alpa : 
                                            <a href="#" class="jumlahAlpa" data-type="number" data-placement="left" 
                                                data-title="Jumlah Alpa" data-name="jumlah_alpa" 
                                                data-pk='<?= $absen->idRekap_absen ?>'>
                                                <?= $absen->jumlah_alpa ?> 
                                            </a>
                                        </li>
                                        <li>
                                            Jumlah Izin : 
                                            <a href="#" class="jumlahIzin" data-type="number" data-placement="left" 
                                                data-title="Jumlah Izin" data-name="jumlah_izin" 
                                                data-pk='<?= $absen->idRekap_absen ?>'>
                                                <?= $absen->jumlah_izin ?>
                                            </a>
                                        </li>
                                        <li>
                                            Jumlah Sakit : 
                                            <a href="#" class="jumlahSakit" data-type="number" data-placement="left" 
                                                data-title="Jumlah Sakit" data-name="jumlah_sakit" 
                                                data-pk='<?= $absen->idRekap_absen ?>'>
                                                <?= $absen->jumlah_sakit ?>
                                            </a>
                                        </li>
                                        <li>
                                            Jumlah Terlambat : 
                                            <a href="#" class="jumlahTerlambat" data-type="number" data-placement="left" 
                                                data-title="Jumlah Terlambat" data-name="jumlah_terlambat" 
                                                data-pk='<?= $absen->idRekap_absen ?>'>
                                                <?= $absen->jumlah_terlambat ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                </div>
            </tr>
         <?php endforeach ?>
          <?= $valueArray ?>
    </tbody>
</table>



<!-- <table class="" id="" width="100%">
    <thead>
        <tr>
            <th data-field="no">#</th>
            <th data-field="">NIK</th>
            <th data-field="">Nilai</th>
            <th>Ranking</th>

        </tr>
    </thead>
    <tbody>
    	<?php $no = 1; ?>
    	<?php foreach ($dataTest as $list): ?>
           <tr data-id=>
                <td><?= $no++ ?></td>
            	<td><?= $list->NIK_pd ?></td>
            	<td><?= $list->nilai_pengetahuan ?></td>
            	<td></td>
            </tr>
         <?php endforeach ?>
    </tbody>
</table> -->

<!--end: Datatable -->

<script>
    $('.jumlahAlpa').editable({
        //id : $(this).data('id'),
        anim : 'true',
        onblur : 'submit',
        showbuttons: false,
        mode: 'inline',   
        type: 'number',
        step: '1.00',
        min: '0.00',
        max: '100',
        emptytext: 'Kosong',
        title: 'Enter Value',
        url : '<?= base_url('Raport/RaportKelas/updateRekapAbsen') ?>',
        ajaxOptions: {
            type: 'POST',
        }
    });
    $('.jumlahIzin').editable({
        //id : $(this).data('id'),
        anim : 'true',
        onblur : 'submit',
        showbuttons: false,
        mode: 'inline',   
        type: 'number',
        step: '1.00',
        min: '0.00',
        max: '100',
        emptytext: 'Kosong',
        title: 'Enter Value',
        url : '<?= base_url('Raport/RaportKelas/updateRekapAbsen') ?>',
        ajaxOptions: {
            type: 'POST',
        }
    });
    $('.jumlahSakit').editable({
        //id : $(this).data('id'),
        anim : 'true',
        onblur : 'submit',
        showbuttons: false,
        mode: 'inline',   
        type: 'number',
        step: '1.00',
        min: '0.00',
        max: '100',
        emptytext: 'Kosong',
        title: 'Enter Value',
        url : '<?= base_url('Raport/RaportKelas/updateRekapAbsen') ?>',
        ajaxOptions: {
            type: 'POST',
        }
    });
    $('.jumlahTerlambat').editable({
        //id : $(this).data('id'),
        anim : 'true',
        onblur : 'submit',
        showbuttons: false,
        mode: 'inline',   
        type: 'number',
        step: '1.00',
        min: '0.00',
        max: '100',
        emptytext: 'Kosong',
        title: 'Enter Value',
        url : '<?= base_url('Raport/RaportKelas/updateRekapAbsen') ?>',
        ajaxOptions: {
            type: 'POST',
        }
    });

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
                    noRecords: 'Tidak Ditemukan Riwayat Penilaian Siswa Untuk Angkatan & Kelas Yang Dipilih!',
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
                    sortable: true,
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
                    title: "Peringkat",
                    width: 75,
                    sortable: true,
                    textAlign: "center",
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "cetakRaport",
                    //sortable: 'asc',
                    textAlign: "left",
                    width: 100,
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "rekapAbsen",
                    //sortable: 'asc',
                    textAlign: "left",
                    width: 100,
                    //responsive: {visible: 'lg'},
                },
                
            ],

        }), $("#m_form_jk").on("change", function() {
            e.search($(this).val().toLowerCase(), "jenisKelamin")
        }), $("#m_form_jk, .m_selectpicker").selectpicker()
    }
};
		

</script>