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
                                Daftar Siswa <?= $angkatan ?>
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
                            <li class="m-portlet__nav-item">
                                <button type="button" class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--air" 
                                    id="reloadTabelPilihSiswa">
                                    <span>
                                        <i class="flaticon-refresh"></i>
                                        <span>Muat Ulang</span>
                                    </span>
                                </button>
                            </li>


                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                <input type="hidden" id="idLeger" value="<?= $idLeger ?>"></input>
                <input type="hidden" id="namaMapel" value="<?= $namaMapel ?>"></input>
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
								<th style="text-align: center;" colspan="2" scope="col">Nilai Umum</th>
								<th style="text-align: center;" colspan="3" scope="col">Nilai Prilaku</th>
								<th style="width: auto; height: auto; text-align: center; vertical-align: middle;" rowspan="2" >Deskripsi</th>
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
	                        		<td><?= $idLeger ?></td>
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
	    									data-type="number" data-placement="left" data-title="Nilai Keterampilan" 
	    									data-name="nilaiPengetahuan" data-pk='2'>
	    									<?= $data->nilai_keterampilan ?>
	  									</a>
	                				</td>
	                				<td style="text-align: center;">
	                					<a href="#" class="nilaiSikap" id="2" 
	    									data-type="number" data-placement="left" data-title="Nilai Sikap" 
	    									data-name="nilaiSikap" data-pk='2'>
	    									<?= $data->nilai_sikap ?>
	  									</a>
	                				</td>
	                				<td style="text-align: center;">dfssdfaf</td>
	                				<td style="text-align: center;">dfssdfaf</td>
	                				<td style="text-align: center;">dfssdfaf</td>
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

	$('.nilaiPengetahuan').editable({
		//id : $(this).data('id'),
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
        mode: 'inline',   
        type: 'number',
        step: '1.00',
        min: '0.00',
        max: '100',
        emptytext: 'Kosong',
        title: 'Enter Value',   
        url : '',
        ajaxOptions: {
		    type: 'POST'
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
	                	idLeger:idLeger
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
	                        toastr.success("Siswa Berhasil Ditambahkan Ke Penilain Mata Pelajaran"+mapel, "Siswa Ditambahkan");
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
		toastr.error("Pilih Terlebih Dahulu Siswa Untuk Penilaian Mata Pelajaran "+mapel, "Pilih Siswa!");
	}
});
/*---------------*/




</script>