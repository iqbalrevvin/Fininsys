<div class="m-portlet m-portlet--info m-portlet--head-solid-bg m-portlet--head-sm m-portlet--mobile" m-portlet="true" 
	id="portletKelas">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon">
					<i class="flaticon-interface"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Ekstrakulikuler
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					<a href="#" m-portlet-tool="reload" class="m-portlet__nav-link m-portlet__nav-link--icon"
						data-toggle="modal" data-target="#modalTambahEkskul" data-backdrop="static" 
						data-keyboard="true" title="Tambah Ekstrakulikuler" data-placement="top" data-skin="dark">
						<i class="flaticon-add"></i></a>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="m-portlet__body">
        <div class="m-widget3">
	        <div class="m-scrollable" data-scrollable="true" style="height: 360px; overflow: auto;">
    			<?php foreach ($listEkskul as $data): ?>
    				<div data-id="<?= $data->idLeger_ekskul ?>" id="listEkskul<?= $data->idLeger_ekskul ?>">
			        	<div class="m-widget3__item">
			                <div class="m-widget3__header">
			                    <div class="m-widget3__info">
			                        <span class="m-widget3__username">
			                            <b>(<?= $data->no_urut_ekskul ?>)<?= $data->ekstrakulikuler ?></b> 
			                            | <?= $data->pembimbing ?>
			                        </span><br>
			                        <span class="m-widget3__time">
			                            &nbsp;<br>
			                            <a href="#" class="btnKelolaNilai btn btn-sm btn-success m-btn m-btn--pill m-btn--air" 
					                    	data-kelas="<?= $data->idKelas ?>" data-leger="<?= $data->idLeger_ekskul ?>" 
					                    	data-ekskul="<?= $data->ekstrakulikuler ?>" 
					                    	data-angkatan="<?= $data->tahun_angkatan ?>">
					                        <b>Kelola Nilai</b>
					                    </a>
					                    <button class="btnHapusMapel btn btn-sm btn-danger m-btn m-btn--pill m-btn--air" 
					                    	data-ekskul="<?= $data->ekstrakulikuler ?>" data-id="<?= $data->idLeger_ekskul ?>">
					                        <b>Hapus Ekskul</b>
					                    </button>
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
    		var ekskul 	= $(this).data('ekskul');
    		var id 			= $(this).data('id');
    		swal({
		        title: "KONFIRMASI TINDAKAN!",
		        text: "Ekstrakulikuler "+ekskul+" Akan Dihapus Beserta Nilai Yang Terkait",
		        type: "warning",
		        showCancelButton: true,
		        confirmButtonColor: "#DD6B55",
		        confirmButtonText: "Ya, Lanjutkan!",
		        cancelButtonText: "Tidak, Kembali!",
    		}).then((result) => {
      			if(result.value) {
        			mApp.block("#listEkskul"+id, {
			          overlayColor: "#000000",
			          type: "loader",
			          state: "primary",
			          message: "<b>Menghapus Ekstrakulikuler "+ekskul+"...</b>"
			      	});
        			$.ajax({
			      		url: '<?= base_url('LegerNilai/hapusKontenEkskul') ?>',
			      		type: 'POST',
			      		data: {
			      			namaEkskul 		: ekskul,
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
	    	var namaEkskul			= $(this).data('ekskul');
	    	var idLegerEkskul		= $(this).data('leger');
	    	var angkatan 			= $(this).data('angkatan');
	    	$.ajax({
	          url: '<?= base_url('LegerNilai/getKontenKelolaNilaiEkskul') ?>',
	          type: 'POST',
	          async: true,
	          data:{
	          	idKelas 	: idKelas,
	          	idLeger 	: idLegerEkskul,
	          	namaEkskul 	: namaEkskul,
	          	angkatan 	: angkatan,
	            show   		: 1
	          },
	          	success: function(response){
	              	$('#resultKontenKelolaNilai').fadeIn("slow").html(response);
	              	$('#loadKontenKelolaNilai').hide();
	              	//$("#jenisNasabah").selectpicker();
	          	}
	      	});
			
		});
	/*---------------------------------------------------------*/

	});
</script>