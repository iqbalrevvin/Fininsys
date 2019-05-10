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
                                Daftar Siswa Angkatan <?= $angkatan ?>
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
                <input type="hidden" id="namaEkskul" value="<?= $namaEkskul ?>"></input>
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
					Nilai Siswa | <?= $namaEkskul ?> 
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					<a href="#" m-portlet-tool="reload" class="m-portlet__nav-link m-portlet__nav-link--icon"
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
	        <div class="m-scrollable m-scroller" data-scrollable="true" data-height="500" 
	        	style="height: 360px; overflow: auto;">
        		<div data-id='' id="portlet">
		        	<table class="table table-striped- table-bordered table-hover" id="m_table_1" >
                        <thead style="border-top:5px;">
                        	<tr>
								<th style="width: 200px; text-align: center;" colspan="2" scope="col">
									Informasi Siswa
								</th>
								<th style="text-align: center;" colspan="2" scope="col">Penilaian Ekstrakulikuler</th>
								
							</tr>
                            <tr>
                            	<th style="text-align: center;">Hapus Siswa</th>
                                <th style="text-align: center;">NIPD</th>
                                <th style="width: 200px; text-align: center;">NamaPesertaDidik</th>
                                <th style="text-align: center;">Nilai</th>
                                <th style="text-align: center;">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php foreach ($listNilai as $data): ?>
	                        	<tr data-id='<?= $data->idLeger_nilai_ekskul ?>'>
	                        		<td style="text-align: center;">
	                        			<i id="loadHapusSiswa<?= $data->idLeger_nilai_ekskul ?>"></i>
	                        			<button id="btnHapusSiswa" 
	                        				class="m-portlet__nav-link btn m-btn m-btn--hover-danger 
	                        				m-btn--icon m-btn--icon-only m-btn--pill btnHapusSiswa" 
                                     		title="Hapus <?= $data->nama_pd ?> Dari Penilaian" 
                                     		data-name="<?= $data->nama_pd ?>" 
                                     		data-id=<?= $data->idLeger_nilai_ekskul ?>>   
                                    		<i class="la la-trash"></i>                      
                            			</button>
	                        		</td>
	                        		<td><?= $data->nipd ?></td>
	                				<td style="width: 200px; text-align: left;">
	                					<b><?= $data->nama_pd ?></b>
	                				</td>
	                				<td style="text-align: center;">
	                					<a href="#" class="nilaiEkskul pengetahuan" id="nilaiEkskul" 
	    									data-type="select" data-placement="left" 
	    									data-title="Nilai Ekstrakulikuler" 
	    									data-name="nilai_ekskul"
	    									data-nik ="<?= $data->NIK_pd ?>"
	    									data-pk="<?= $data->idLeger_nilai_ekskul ?>">
	    									<?= $data->nilai_ekskul ?>
	  									</a>
	                				</td>
	                				<td style="text-align: center;">
	                					<a href="#" class="nilaiDeskripsi" id="2" 
	    									data-type="text" data-placement="left" 
	    									data-title="Nilai Deskripsi" 
	    									data-name="deskripsi_nilai_ekskul" 
	    									data-pk='<?= $data->idLeger_nilai_ekskul ?>'>
	    									<?= $data->deskripsi_nilai_ekskul ?>
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
});

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

    $('.nilaiEkskul').editable({
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
        url : '<?= base_url('LegerNilai/simpanNilaiEkskul') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });

    $('.nilaiDeskripsi').editable({
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
        url : '<?= base_url('LegerNilai/simpanNilaiEkskul') ?>',
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
	var namaEkskul 	= $('#namaEkskul').val();
	var angkatan 	= $('#angkatan').val();
	var idKelas 	= $('#idkelas').val();
	var list_id = [];
	$(".data-check:checked").each(function() {
    	list_id.push(this.value);
	});
	if(list_id.length > 0){
		swal({
	        title: "KONFIRMASI TINDAKAN!",
	        text: +list_id.length+" Data Siswa Akan Ditambahkan Untuk Penilaian Ekstrakulikuler "+namaEkskul,
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
		          message: "<b>Menambakan Data Siswa Ke Penilaian Ekstrakulikuler "+namaEkskul+"...</b>"
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
	                url: "<?php echo site_url('LegerNilai/tambahPenilaianEkskulSiswa')?>",
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
	                        toastr.success("Siswa Berhasil Ditambahkan Ke Penilain Ekstrakulikuler"+namaEkskul, "Siswa Ditambahkan");
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

	/*TOMBOL HAPUS MAPEL*/
	$(document).on('click', '.btnHapusSiswa', function() {
		var namaSiswa 		= $(this).data('name');
		var id 				= $(this).data('id');
		swal({
	        title: "KONFIRMASI TINDAKAN!",
	        text: "Siswa Yang Dipilih Akan Dihapus Dari Penilaian",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonColor: "#DD6B55",
	        confirmButtonText: "Ya, Lanjutkan!",
	        cancelButtonText: "Tidak, Kembali!",
		}).then((result) => {
  			if(result.value) {
  				$("#loadHapusSiswa"+id).html("<img src='<?= base_url('assets/image/loading.gif') ?>' width='35' height='35'>");
    			$.ajax({
		      		url: '<?= base_url('LegerNilai/hapusPenilaianSiswaEkskul') ?>',
		      		type: 'POST',
		      		data: {
		                id    			: id
		           	},
		      		success: function(){
		      			$("tr[data-id='"+id+"']").fadeOut("slow",function(){
						    $(this).remove();
						});
		      		}
		      	})
  			}
		});

	});
    /*---------------*/




</script>