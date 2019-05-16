<div id="preloader" class="m-page--loading-enabled m-page--loading">
    <div class="m-page-loader m-page-loader--base">
        <div class="m-blockui">
            <span>Memuat Data. . .</span>
            <span>
                <div class="m-loader m-loader--brand"></div>
            </span>
        </div>
    </div>
</div>


<div class="m-portlet portletTampil">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
            	<div class="row col-md-2 col-2">
                	<b>Pilih Semester</b> : &nbsp;
                    <select class="form-control m_select2_hiding" name="pilihSemester" id="pilihSemester">	
						<option value="">Pilih Semester</option>
						<?php foreach ($listSemester as $list): ?>
							<option value="<?= $list->semester ?>"><?= $list->semester ?></option>
						<?php endforeach ?>
					</select>
				</div>
            	<div class="row col-md-4 col-4">
                	<b>Pilih Sekolah</b> : &nbsp;
                    <select class="form-control  m_select2_hiding" name="pilihSekolah" id="pilihSekolah">	
						<option value="">Pilih Data Sekolah Lalu Pilih Kelas Yang Tersedia</option>
						<?php foreach ($listSekolah as $list): ?>
							<option value="<?= $list->idSekolah ?>"><?= $list->nama_sekolah ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="row col-md-3 col-3 pilihKelas">
					<b>Pilih Kelas</b> : &nbsp;
                    <select class="form-control m_select2" name="pilihKelas" id="pilihKelas">	
						<option value="">Kelas</option>
					</select>
				</div>	
				<div class="row col-md-2 col-2">
					<button type="button" class="btn btn-accent m-btn m-btn--air m-btn--custom" id="btnTampilSiswa">
						Tampilkan <span id="btnTampilLoading"></span>
					</button>
				</div>
				
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
    	<div id="resultTampilSiswa">Pilih Sekolah & Kelas Terlebih Dahulu!</div>
    </div>
</div>

<script>
	/*PILIH KELAS*/
	$("#pilihSekolah").change(function(){ 
		mApp.block(".pilihKelas", {
          overlayColor: "#000000",
          type: "loader",
          state: "primary",
          message: "<b>Memuat Data Kelas...</b>"
      	});
		$.ajax({
			type: "POST", // Method pengiriman data bisa dengan GET atau POST
			url: "<?= base_url('Raport/RaportKelas/getListKelas'); ?>", // Isi dengan url/path file php yang dituju
			data: {
				idSekolah : $("#pilihSekolah").val()
			}, // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ 
				mApp.unblock(".pilihKelas");
				$("#pilihKelas").html(response.listKelas).show();
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
				console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
			}
		});
	});
	/*------------------------------------------------------------------------------------------------------*/
	/*TOMBOL TAMPIL SISWA BERDASARKAN KELAS*/
	$(document).on('click', '#btnTampilSiswa', function(e) {
		if($('#pilihSemester').val()=="" || $('#pilihSekolah').val()=="" || $('#pilihKelas').val()==""){
			toastr.error("Lengkapi Parameter Semester, Sekolah & Kelas", "Gagal Memproses");
		}else{
			mApp.block(".portletTampil", {
	          overlayColor: "#000000",
	          type: "loader",
	          state: "primary",
	          message: "<b>Memuat Data Siswa...</b>"
	      	});
	      	var idKelas 	= $('#pilihKelas').val();
	      	$.ajax({
		          url: '<?= base_url('Raport/RaportKelas/tampilSiswaKelas') ?>',
		          type: 'POST',
		          async: true,
		          data:{
		          	idKelas 	: idKelas,
		            show 		: 1
		          },
		          	success: function(response){
		              	$('#resultTampilSiswa').fadeIn("slow").html(response);
		              	mApp.unblock(".portletTampil");
		          	}
		    });
		}
	});
	/*---------------------------------------------------*/

</script>