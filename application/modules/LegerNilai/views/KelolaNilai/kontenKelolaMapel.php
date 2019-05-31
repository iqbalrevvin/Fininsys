<div class="m-portlet m-portlet--info m-portlet--head-solid-bg m-portlet--head-sm m-portlet--mobile" m-portlet="true" 
	id="portletKelas">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon">
					<i class="flaticon-interface"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Mata Pelajaran
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					<a href="#" m-portlet-tool="reload" class="m-portlet__nav-link m-portlet__nav-link--icon"
						data-toggle="modal" data-target="#modalTambahMapel" data-backdrop="static" 
						data-keyboard="true" title="Tambah Mata Pelajaran" data-placement="top" data-skin="dark">
						<i class="flaticon-add"></i></a>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="m-portlet__body">
        <div class="m-widget3">
	        <div class="m-scrollable" data-scrollable="true" style="height: 360px; overflow: auto;">
    			<?php foreach ($listMapel as $data): ?>
    				<?php require('modalEditMapel.php') ?>
    				<div data-id="<?= $data->idLeger ?>" id="listMapel<?= $data->idLeger ?>">
			        	<div class="m-widget3__item">
			                <div class="m-widget3__header">
			                    <div class="m-widget3__info">
			                        <span class="m-widget3__username">
			                            <b>(<?= $data->no_urut_mapel ?>) <?= $data->nama_mata_pelajaran ?></b><br>
			                            Guru Mapel : <?= $data->nama_tenpen ?>
			                        </span><br>
			                        <span class="m-widget3__time">
			                            KKM Pengetahuan : <?= $data->kkm_pengetahuan ?> | 
			                            KKM Keterampilan : <?= $data->kkm_keterampilan ?><br> 
			                            <a href="#" class="btnKelolaNilai btn btn-sm btn-success m-btn m-btn--pill m-btn--air" 
					                    	data-kelas="<?= $data->idKelas ?>" data-leger="<?= $data->idLeger ?>" 
					                    	data-mapel="<?= $data->nama_mata_pelajaran ?>" 
					                    	data-angkatan="<?= $data->tahun_angkatan ?>"
					                    	data-master="<?= $data->idMaster_leger ?>">
					                        <b>Kelola Nilai</b>
					                    </a>
					                    <button class="btnHapusMapel btn btn-sm btn-danger m-btn m-btn--pill m-btn--air" 
					                    	data-mapel="<?= $data->nama_mata_pelajaran ?>" data-id="<?= $data->idLeger ?>">
					                        <i class="flaticon-delete"></i>
					                    </button>
					                    <a href="#" class="btn btn-sm btn-info m-btn m-btn--pill m-btn--air"
											data-toggle="modal" data-target="#modalEditMapel<?= $data->idLeger ?>" 
											data-backdrop="static" data-keyboard="true" title="Edit Mata Pelajaran" 
											data-placement="top" data-skin="dark">
											<i class="flaticon-edit"></i>
										</a>
			                        </span>
			                    </div>
			                </div>
			                <hr>
			            </div>
			        </div>
		        <?php endforeach; ?>
	        </div>
        </div>
    </div>
</div>

<script>
	$(document).ready(function() {
		/*TOMBOL HAPUS MAPEL*/
    	$(document).on('click', '.btnHapusMapel', function() {
    		var namaMapel 	= $(this).data('mapel');
    		var id 			= $(this).data('id');
    		swal({
		        title: "KONFIRMASI TINDAKAN!",
		        text: "Mata Pelajaran "+namaMapel+" Akan Dihapus Beserta Nilai Yang Terkait",
		        type: "warning",
		        showCancelButton: true,
		        confirmButtonColor: "#DD6B55",
		        confirmButtonText: "Ya, Lanjutkan!",
		        cancelButtonText: "Tidak, Kembali!",
    		}).then((result) => {
      			if(result.value) {
        			mApp.block("#listMapel"+id, {
			          overlayColor: "#000000",
			          type: "loader",
			          state: "primary",
			          message: "<b>Menghapus Mata Pelajaran "+namaMapel+"...</b>"
			      	});
        			$.ajax({
			      		url: '<?= base_url('LegerNilai/hapusKontenMapel') ?>',
			      		type: 'POST',
			      		data: {
			      			namaMapel 		: namaMapel,
			                id    			: id
			           	},
			      		success: function(){
			      			$('#resultKontenKelolaNilai').fadeOut("slow");
			      			mApp.unblock("#portlet"+id);
			      			$("div[data-id='"+id+"']").fadeOut("slow",function(){
							    $(this).remove();
							});
			      		}
			      	})
      			}
    		});

		});
    	/*---------------*/

    	/*KONTEN NILAI*/
		$(document).on('click', '.btnKelolaNilai', function(e) {
			$('#resultKontenKelolaNilai').fadeOut("slow");
			$('#loadKontenKelolaNilai').show().html('<div class="m-blockui" id="loader-center"><span>Memuat Data Nilai Siswa</span><span><div class="m-loader m-loader--brand"></div></span></div>');
	    	var idKelas 			= $(this).data('kelas');
	    	var namaMapel			= $(this).data('mapel');
	    	var idLeger				= $(this).data('leger');
	    	var angkatan 			= $(this).data('angkatan');
	    	var idMaster 			= $(this).data('master');
	    	$.ajax({
	          url: '<?= base_url('LegerNilai/getKontenKelolaNilai') ?>',
	          type: 'POST',
	          async: true,
	          data:{
	          	idKelas 	: idKelas,
	          	idLeger 	: idLeger,
	          	namaMapel 	: namaMapel,
	          	angkatan 	: angkatan,
	          	idMaster 	: idMaster,
	            show 		: 1
	          },
	          	success: function(response){
	              	$('#resultKontenKelolaNilai').fadeIn("slow").html(response);
	              	$('#loadKontenKelolaNilai').hide();
	              	//$("#jenisNasabah").selectpicker();
	          	}
	      	});
			
		});
		/*---------------------------------------------------------*/
		/*EDIT MAPEL*/
		/*KONTEN MATA PELAJARAN*/
		$(document).on('click', '.btnEditMapel', function() {
	     	modalBlockLoad()
	     	if($('#editKKMPengetahuan').val()=="" || $('#editKKMKeterampilan').val()=="" || $('#editNoUrut').val()==""){
	     		toastr.error("Terdapat parameter wajib yang tidak boleh kosong!", "Gagal Mengirim");
	     		mApp.unblock(".modalInput");
	     	}else{
    			var id 				= $(this).data('id');
	     		var tenpen 			= $('#editGuruPengampu'+id).val();
	     		var KKMPengetahuan 	= $('#editKKMPengetahuan'+id).val();
	     		var KKMKeterampilan = $('#editKKMKeterampilan'+id).val();
	     		var noUrut 			= $('#editNoUrut'+id).val();
	        	$.ajax({
	        		url: '<?= base_url('LegerNilai/editMapelNilai') ?>',
	        		type: 'POST',
	        		dataType: 'json',
	        		data: {
	        			idLeger 		: id,
	        			tenpen 			: tenpen,
	        			KKMPengetahuan 	: KKMPengetahuan,
	        			KKMKeterampilan : KKMKeterampilan,
	        			noUrut 			: noUrut
	        		},	
	        		success: function(response){
	        			mApp.unblock(".modalInput");
	        			// $('#resultAddNasabah').html(result).show();
	        			if(response.status == 'sukses'){
	        				$('#modalEditMapel'+id).modal('hide');
	        				swal({
				                title: "Proses Berhasil",
				                text: response.pesan,
				                type: "success",
				                timer: 5e3,
				                onOpen: function() {
				                    swal.showLoading()
				                    setTimeout(function () {
				                        //$("#loading").hide();
				                        refresh();
				                    }, 1500);  
				                }
				            });
				            kontenMapel();
				        }else{
	        				mApp.unblock(".modalInput");
	        				$('#resultErrorEditMapel').html(response.pesan).show()
	        			}
	        		}
	        	})
			}
		});
		/*-------------------------------------------------------*/
		/*-----------------------------------------------------------*/

	});
</script>