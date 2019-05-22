<div class="modal fade modalInput" id="modalInformasiPenilaian" role="dialog" aria-labelledby="" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="">Informasi Penilaian</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-remove"></span>
				</button>
			</div>
			<div class="m-portlet m-portlet--mobile" id="kontenTambahPenilaianSiswa">
                <div class="m-portlet__body">
                	Tekan Enter Setelah Mengisi Nilai Pengetahuan & Keterampilan!
                </div>
            </div>
		</div>
	</div>
</div>

<div class="modal fade modalInput" id="modalTambahSiswa" role="dialog" aria-labelledby="" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="">Tambah Siswa Ke Penilaian</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-remove"></span>
				</button>
			</div>
			<div class="m-portlet m-portlet--mobile" id="kontenTambahPenilaianSiswa">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Daftar Siswa Kelas <?= $kelas->nama_kelas ?> Angkatan <?= $angkatan ?>
                            </h3>
                        </div>
                    </div>

                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <button type="button" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air" 
                                	id="btnTambahPenilaiSiswa">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>Tambahkan</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                <input type="hidden" id="idLeger" value="<?= $idLeger ?>"></input>
                <input type="hidden" id="namaMapel" value="<?= $namaMapel ?>"></input>
                <input type="hidden" id="idKelas" value="<?= $idKelas ?>"></input>
                <input type="hidden" id="angkatan" value="<?= $angkatan ?>"></input>
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="tabelSiswaPenilaian">
                        <thead>
                            <tr>
                                <th>
                                    <label class="m-checkbox m-checkbox--bold m-checkbox--state-success">
                                        <input type="checkbox" id="check-all"><small>Pilih Semua</small>
                                            <span></span>
                                    </label>
                                </th>
                                <th>Nama Siswa</th>
                                <th>JK</th>
                                <th>NIPD</th>
                                <th>Kelas</th>
                                <th>Angkatan</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php foreach ($listSiswa as $data): ?>
	                        	<tr>
	                        		<td>
	                        			<label class="m-checkbox m-checkbox--solid m-checkbox--success">
											<input type="checkbox" 
												class="m-checkbox m-checkbox--bold m-checkbox--state-success data-check" 
												value="<?= $data->NIK_pd ?>"> Pilih
											<span></span>
					                     </label>
	                        		</td>
	                        		<td><?= $data->nama_pd ?></td>
	                        		<td><?= $data->jk_pd ?></td>
	                        		<td><?= $data->nipd ?></td>
	                        		<td><?= $data->nama_kelas ?></td>
	                        		<td><?= $data->tahun_angkatan ?></td>
	                        	</tr>
	                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
	</div>
</div>


<div class="m-portlet m-portlet--warning m-portlet--head-solid-bg m-portlet--head-sm m-portlet--mobile" m-portlet="true" 
	id="portletNilai">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon">
					<i class="flaticon-users-1"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Nilai Siswa | <?= $namaMapel ?> 
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					<a href="#" m-portlet-tool="fullscreen" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-expand"></i></a>
				</li>
				<li class="m-portlet__nav-item">
					<a href="#" m-portlet-tool="reload" class="m-portlet__nav-link m-portlet__nav-link--icon"
						data-toggle="modal" data-target="#modalInformasiPenilaian" data-backdrop="static" 
						data-keyboard="true" title="Informasi Penilaian" data-placement="top" data-skin="dark">
						<i class="flaticon-information"></i></a>
					</a>
				</li>
				<li class="m-portlet__nav-item">
					<a href="#" m-portlet-tool="test" class="m-portlet__nav-link m-portlet__nav-link--icon"
						data-toggle="modal" data-target="#modalTambahSiswa" data-backdrop="static" 
						data-keyboard="true" title="Tambah Siswa Ke Penilaian" data-placement="top" data-skin="dark">
						<i class="flaticon-add"></i></a>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="m-portlet__body">
        <div class="m-widget3">
	        <div class="m-scrollable m-scroller" data-scrollable="true" data-height="360" 
	        	style="height: 100%; overflow: auto; " data-rail-visible="1">
        		<div data-id='' id="portlet">
		        	<table class="table table-striped- table-bordered table-hover" id="m_table_1" >
                        <thead style="border-top:5px;">
                        	<tr>
								<th style="width: 200px; text-align: center;" colspan="2" scope="col">
									Informasi Siswa
								</th>
								<th style="text-align: center;" colspan="2" scope="col">Nilai Umum</th>
								<th style="text-align: center;" colspan="3" scope="col">Nilai Prilaku</th>
								<th style="width: auto; height: auto; text-align: center; vertical-align: middle;" rowspan="2" >
									Catatan
								</th>
							</tr>
                            <tr>
                                <th style="text-align: center;">NIPD</th>
                                <th style="width: 200px; text-align: center;">NamaPesertaDidik</th>
                                <th style="text-align: center;">Pengetahuan</th>
                                <th style="text-align: center;">Keterampilan</th>
                                <th style="text align: center;">Sikap</th>
                                <th style="text-align: center;">Sosial</th>
                                <th style="text-align: center;">Spritual</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php foreach ($listNilai as $data): ?>
	                        	<tr data-id=''>
	                        		<td><?= $data->nipd ?></td>
	                				<td style="width: 200px; text-align: left;">
	                					<b><?= $data->nama_pd ?></b>
	                				</td>
	                				<td style="text-align: center;">
	                					<a href="#" class="nilaiPengetahuan pengetahuan" id="nilaiPengetahuan" 
	    									data-type="number" data-placement="left" 
	    									data-title="Nilai Pengetahuan" 
	    									data-name="nilai_pengetahuan"
	    									data-nik ="<?= $data->NIK_pd ?>"
	    									data-pk="<?= $data->idLeger_nilai ?>">
	    									<?= $data->nilai_pengetahuan ?>
	  									</a>
	                				</td>
	                				<td style="text-align: center;">
	                					<a href="#" class="nilaiKeterampilan" id="2" 
	    									data-type="number" data-placement="left" 
	    									data-title="Nilai Keterampilan" 
	    									data-name="nilai_keterampilan" 
	    									data-pk='<?= $data->idLeger_nilai ?>'>
	    									<?= $data->nilai_keterampilan ?>
	  									</a>
	                				</td>
	                				<td style="text-align: center;">
	                					<a href="#" class="nilaiSikap"
	    									data-type="select" data-placement="left" data-title="Nilai Sikap" 
	    									data-name="nilai_sikap" 
	    									data-pk='<?= $data->idLeger_nilai ?>'>
	    									<?= $data->nilai_sikap ?>
	  									</a>
	                				</td>
	                				<td style="text-align: center;">
	                					<a href="#" class="nilaiSosial"
	    									data-type="select" data-placement="left" data-title="Nilai Sosial" 
	    									data-name="nilai_sosial" 
	    									data-pk='<?= $data->idLeger_nilai ?>'>
	    									<?= $data->nilai_sosial ?>
	  									</a>
	                				</td>
	                				<td style="text-align: center;">
	                					<a href="#" class="nilaiSpritual"
	    									data-type="select" data-placement="left" data-title="Nilai Spritual" 
	    									data-name="nilai_spritual" 
	    									data-pk='<?= $data->idLeger_nilai ?>'>
	    									<?= $data->nilai_spritual ?>
	  									</a>
	                				</td>
	                				<td style="text-align: center;">
	                					<a href="#" class="catatan"
	    									data-type="text" data-placement="left" data-title="Deskripsi" 
	    									data-name="catatan" 
	    									data-pk='<?= $data->idLeger_nilai ?>'>
	    									<?= $data->catatan ?>
	  									</a>
	                				</td>
	                			</tr>
	                		<?php endforeach; ?>
                        </tbody>
                    </table>
	            </div>
	        </div>
        </div>
    </div>
</div>
<style type="text/css">
	td{
		cursor: pointer;
	}
	.editor{
		display: none;
	}
</style>
<script src="<?= base_url('assets/vendors/datatables/datatables.bundle.js') ?>" type="text/javascript"></script>

<script>
jQuery(document).ready(function() {
    dataNilaiSiswa() 
    DatatablesBasicPaginations.init()
    PortletTools.init()
});
var PortletTools = {
    init: function() {
        var e;
        toastr.options.showDuration = 1e3, (e = new mPortlet("portletNilai")).on("beforeCollapse", function(e) {
               
            }), e.on("afterCollapse", function(e) {
                
            }), e.on("beforeExpand", function(e) {
              
            }), e.on("afterExpand", function(e) {
              
            }), e.on("beforeRemove", function(e) {
         
            }), e.on("afterRemove", function(e) {

            }), e.on("reload", function(e) {
                toastr.info("Leload event fired!"), mApp.block(e.getSelf(), {
                    overlayColor: "#ffffff",
                    type: "loader",
                    state: "accent",
                    opacity: .3,
                    size: "lg"
                }), setTimeout(function() {
                    mApp.unblock(e.getSelf())
                }, 2e3)
            }), e.on("afterFullscreenOn", function(e) {
                var t = $(e.getBody()).find("> .m-scrollable");
                t && (t.data("original-height", t.css("height")), t.css("height", "100%"), mUtil.scrollerUpdate(t[0]))
            }), e.on("afterFullscreenOff", function(e) {
                var t;
                (t = $(e.getBody()).find("> .m-scrollable")) && ((t = $(e.getBody()).find("> .m-scrollable")).css("height", t.data("original-height")), mUtil.scrollerUpdate(t[0]))
            })

    }
};
var DatatablesBasicPaginations = {
    init: function() {
        $("#tabelSiswaPenilaian").DataTable({
            responsive: !1,
        })
    }
};

function dataNilaiSiswa(){
	$("#m_table_1").DataTable({
        responsive: !1,
    })
}

	$('.nilaiPengetahuan').editable({
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
        url : '<?= base_url('LegerNilai/simpanNilai') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });
    $('.nilaiKeterampilan').editable({
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
        url : '<?= base_url('LegerNilai/simpanNilai') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });

    $('.nilaiSikap').editable({
		//id : $(this).data('id'),
		anim : 'true',
		//onblur : 'submit',
		showbuttons: false,
        mode: 'inline',   
        type: 'number',
        step: '1.00',
        min: '0.00',
        max: '100',
        emptytext: 'Kosong',
        title: 'Enter Value',
        source: [
        	{value: "A", text: "A"}, 
        	{value: "B", text: "B"},
        	{value: "C", text: "C"},
        	{value: "D", text: "D"},
        	{value: "E", text: "E"},
        ],
        url : '<?= base_url('LegerNilai/simpanNilai') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });

    $('.nilaiSosial').editable({
		//id : $(this).data('id'),
		anim : 'true',
		//onblur : 'submit',
		showbuttons: false,
        mode: 'inline',   
        type: 'number',
        step: '1.00',
        min: '0.00',
        max: '100',
        emptytext: 'Kosong',
        title: 'Enter Value',
        source: [
        	{value: "A", text: "A"}, 
        	{value: "B", text: "B"},
        	{value: "C", text: "C"},
        	{value: "D", text: "D"},
        	{value: "E", text: "E"},
        ],
        url : '<?= base_url('LegerNilai/simpanNilai') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });

    $('.nilaiSpritual').editable({
		//id : $(this).data('id'),
		anim : 'true',
		//onblur : 'submit',
		showbuttons: false,
        mode: 'inline',   
        type: 'number',
        step: '1.00',
        min: '0.00',
        max: '100',
        emptytext: 'Kosong',
        title: 'Enter Value',
        source: [
        	{value: "A", text: "A"}, 
        	{value: "B", text: "B"},
        	{value: "C", text: "C"},
        	{value: "D", text: "D"},
        	{value: "E", text: "E"},
        ],
        url : '<?= base_url('LegerNilai/simpanNilai') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });

    $('.catatan').editable({
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
        url : '<?= base_url('LegerNilai/simpanNilai') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });

//check all
$("#check-all").click(function () {
    $(".data-check").prop('checked', $(this).prop('checked'));
});


/*TOMBOL TAMBAH SISWA KE KELAS*/
$(document).on('click', '#btnTambahPenilaiSiswa', function() {
	var idLeger 	= $('#idLeger').val();
	var mapel 		= $('#namaMapel').val();
	var angkatan 	= $('#angkatan').val();
	var idKelas 	= $('#idkelas').val();
	var list_id = [];
	$(".data-check:checked").each(function() {
    	list_id.push(this.value);
	});
	if(list_id.length > 0){
		swal({
	        title: "KONFIRMASI TINDAKAN!",
	        text: +list_id.length+" Data Siswa Akan Ditambahkan Untuk Penilaian Mata Pelajaran "+mapel,
	        type: "info",
	        showCancelButton: true,
	        confirmButtonColor: "#DD6B55",
	        confirmButtonText: "Ya, Lanjutkan!",
	        cancelButtonText: "Tidak, Kembali!",

		}).then((result) => {
  			if(result.value) {
    			mApp.block("#kontenTambahPenilaianSiswa", {
		          overlayColor: "#000000",
		          type: "loader",
		          state: "primary",
		          message: "<b>Menambakan Data Siswa Ke Penilaian Mata Pelajaran "+mapel+"...</b>"
		      	});
    			$.ajax({
	                type: "POST",
	                data: {
	                	id:list_id,
	                	idLeger:idLeger,
	                	idKelas:idKelas,
	                	angkatan:angkatan,
	                	show:1,
	                },
	                url: "<?php echo site_url('LegerNilai/tambahPenilainSiswa')?>",
	                dataType: "JSON",
	                success: function(data)
	                {
	                    if(data.status){
	                    	mApp.unblock("#kontenTambahPenilaianSiswa");
	                    	$('#modalTambahSiswa').modal('hide');
	                    	/*tabelNilaiSiswa.ajax.reload(null,false);*/ //reload datatable ajax 
	                        /*kontenView();*/
	                        $('#resultKontenKelolaNilai').fadeOut("slow");
	                        $('#loadKontenKelolaNilai').show().html('<div class="m-blockui" id="loader-center"><span>Data Penilaian Siswa Diperbarui, <b class="text-success">Silahkan Klik Kembali Kelola Nilai!</b></span><span></span></div>');
	                        //$('#loadKontenKelolaNilai').fadeOut("slow");
	                        //$('#resultKontenKelolaNilai').fadeIn("slow");
	                        toastr.success("Siswa Berhasil Ditambahkan Ke Penilain Mata Pelajaran"+mapel, "Siswa Ditambahkan");
	                        swal({
				                title: "Siswa Ditambahkan",
				                text: "Siswa berhasil ditambahkan, silahkan klik kembali kelola nilai!",
				                type: "success",
				            });
	                    }
	                    else{
	                        alert('Gagal Memproses Data, Muat Ulang Halaman Lalu Coba Kembali!');
	                        mApp.unblock("#kontenTambahPenilaianSiswa");
	                    }
	                    
	                },
	                error: function (jqXHR, textStatus, errorThrown){
	                    alert('Gagal Memproses Data, Coba Kembali Atau Hubungi Pihak Pengembang!');
	                    mApp.unblock("#kontenTambahPenilaianSiswa");
	                    console.log();
	                }
	            });
  			}/*KONDISI JIKA MEMILIH YA UNTUK MEMASUKAN DATA SISWA*/
		});
	}else{
		toastr.error("Pilih Terlebih Dahulu Siswa Untuk Penilaian Mata Pelajaran ", "Pilih Siswa!");
	}
});
/*---------------*/




</script>