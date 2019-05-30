<!--begin::Modal KETERANGAN-->
<div class="modal fade" id="modalKeterangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
	aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">
                    Keterangan
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-portlet m-portlet--mobile" id="">
                 <div class="m-portlet__body">
                 	<p>Data Yang Dipilih Adalah Data Yang Tersedia Dalam Master Leger, Pastikan Master Leger Sudah Ditambahkan & Dikelola</p>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>

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
            	<div class="row col-md-3 col-3">
                	<b>Pilih Sekolah</b> : &nbsp;
                    <select class="form-control  m_select2_hiding" name="pilihSekolah" id="pilihSekolah">	
						<option value="">Pilih Data Sekolah Lalu Pilih Kelas Yang Tersedia</option>
						<?php foreach ($listSekolah as $list): ?>
							<option value="<?= $list->idSekolah ?>"><?= $list->nama_sekolah ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="row col-md-2 col-3 pilihKelas">
					<b>Pilih Kelas</b> : &nbsp;
                    <select class="form-control m_select2" name="pilihKelas" id="pilihKelas">	
						<option value="">Kelas</option>
					</select>
				</div>
            	<div class="row col-md-2 col-1 pilihAngkatan">
                	<b>Angkatan</b> : &nbsp;
                    <select class="form-control m_select2_hiding" name="pilihAngkatan" id="pilihAngkatan">	
						<option value="">Pilih Angkatan</option>
					</select>
				</div>
            	<div class="row col-md-2 col-1 pilihSemester">
                	<b>Pilih Semester</b> : &nbsp;
                    <select class="form-control m_select2_hiding" name="pilihSemester" id="pilihSemester">	
						<option value="">Pilih Semester</option>
						<?php foreach ($listSemester as $list): ?>
							<option value="<?= $list->semester ?>"><?= $list->semester ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="row col-md-2 col-1">
                	<b>Titimangsa</b> : &nbsp;
                   <input type="date" class="form-control m-input m-input--air" id="titimangsaRaport" name="titimangsaRaport">
				</div>

				<div class="row col-md-2 col-2">
					TampilKan Data : &nbsp;
					<button type="button" class="btn btn-success m-btn m-btn--air m-btn--custom" id="btnTampilSiswa">
						Tampilkan <span id="btnTampilLoading"></span>
					</button>
				</div>
				<div class="row col-md-3 col-3">
					<a href="#" class="btn btn-info m-btn m-btn--icon m-btn--icon-only" data-toggle="modal" 
                        data-target="#modalKeterangan" title="Keterangan">
						<i class="la la-info"></i>
					</a>
				</div>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
    	<div id="resultTampilSiswa">Pilih Tahun Angkatan, Semester, Sekolah & Kelas Terlebih Dahulu Berdasarkan Master Leger Yang Sudah Dibuat!</div>
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

	/*PILIH PILIH KELAS*/
	$("#pilihKelas").change(function(){ 
		mApp.block(".pilihAngkatan", {
          overlayColor: "#000000",
          type: "loader",
          state: "primary",
          message: "<b>Memuat Data Angkatan...</b>"
      	});
		$.ajax({
			type: "POST", // Method pengiriman data bisa dengan GET atau POST
			url: "<?= base_url('Raport/RaportKelas/getListAngkatan'); ?>", // Isi dengan url/path file php yang dituju
			data: {
				idKelas : $("#pilihKelas").val()
			}, // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ 
				mApp.unblock(".pilihAngkatan");
				$("#pilihAngkatan").html(response.listAngkatan).show();
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
				console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
			}
		});
	});

	/*PILIH PILIH ANGKATAN*/
	$("#pilihAngkatan").change(function(){ 
		mApp.block(".pilihSemester", {
          overlayColor: "#000000",
          type: "loader",
          state: "primary",
          message: "<b>Memuat Data Semester...</b>"
      	});
		$.ajax({
			type: "POST", // Method pengiriman data bisa dengan GET atau POST
			url: "<?= base_url('Raport/RaportKelas/getListSemester'); ?>", // Isi dengan url/path file php yang dituju
			data: {
				kelas 		: $("#pilihKelas").val(),
				angkatan 	: $("#pilihAngkatan").val()
			}, // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ 
				mApp.unblock(".pilihSemester");
				$("#pilihSemester").html(response.listSemester).show();
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
		if($('#pilihSekolah').val()=="" || $('#pilihKelas').val()=="" || $('#pilihAngkatan').val()=="" 
			|| $('#pilihSemester').val()=="" || $('#titimangsaRaport').val()==""){
			toastr.error("Lengkapi Parameter Sekolah, Kelas, Angkatan, Semester & Titimangsa", "Gagal Memproses");
		}else{
			mApp.block(".portletTampil", {
	          overlayColor: "#000000",
	          type: "loader",
	          state: "primary",
	          message: "<b>Memuat Data Siswa...</b>"
	      	});
	      	var sekolah 	= $('#pilihSekolah').val();
	      	var kelas 		= $('#pilihKelas').val();
	      	var angkatan 	= $('#pilihAngkatan').val();
	      	var semester 	= $('#pilihSemester').val();
	      	var titimangsa 	= $('#titimangsaRaport').val();
	      	$.ajax({
		          url: '<?= base_url('Raport/RaportKelas/tampilSiswaKelas') ?>',
		          type: 'POST',
		          async: true,
		          data:{
		          	angkatan 	: angkatan,
		          	idKelas 	: kelas,
		          	semester 	: semester,
		          	titimangsa  : titimangsa,
		            show 		: 1
		          },
		          	success: function(response){
		              	$('#resultTampilSiswa').fadeIn("slow").html(response);
		              	mApp.unblock(".portletTampil");
		              	DatatableHtmlTableDemo.init();
		          	}
		    });
		}
	});
	/*---------------------------------------------------*/


</script>