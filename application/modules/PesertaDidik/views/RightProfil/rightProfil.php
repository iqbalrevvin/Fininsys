<div class="col-xl-8 col-lg-7">
	<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
		<div class="m-portlet__head">
			<div class="m-portlet__head-tools">
				<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
					<li class="nav-item m-tabs__item">
						<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
							<i class="flaticon-share m--hide"></i>
							Data Utama
						</a>
					</li>
					<li class="nav-item m-tabs__item">
						<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
							Data Kontak
						</a>
					</li>
					<li class="nav-item m-tabs__item">
						<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
							Data Orang Tua
						</a>
					</li>
					<li class="nav-item m-tabs__item">
						<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_4" role="tab">
							Data Akademik
						</a>
					</li>
				</ul>
			</div>
			<?php require('headTools.php') ?>
		</div>
		<div class="tab-content">
			<div class="tab-pane active" id="m_user_profile_tab_1">
				<?php require('dataUtama.php') ?>
			</div>
			<div class="tab-pane " id="m_user_profile_tab_2">
				<?php require('dataKontak.php') ?>
			</div>
			<div class="tab-pane " id="m_user_profile_tab_3">
				<?php require('dataOrangTua.php');  ?>
			</div>
			<div class="tab-pane " id="m_user_profile_tab_4">
				<?php require('dataAkademik.php') ?>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url('assets/js/demo/bootstrap-datepicker.js') ?>"></script>
<script src="<?= base_url('assets/js/demo/select2.js') ?>"></script>

<script>
jQuery(document).ready(function() {
    //registerAlert.init()
    BootstrapDatepicker.init()
});
	//DATE PICKER INITIAL
var BootstrapDatepicker = function() {
  var t;
  t = mUtil.isRTL() ? {
      leftArrow: '<i class="la la-angle-right"></i>',
      rightArrow: '<i class="la la-angle-left"></i>'
  } : {
      leftArrow: '<i class="la la-angle-left"></i>',
      rightArrow: '<i class="la la-angle-right"></i>'
  };
  return {
      init: function() {
      $(".m_datepicker_nonModal, .m_datepicker_3_validate_nonModal").datepicker({
              rtl: mUtil.isRTL(),
              format: 'yyyy-mm-dd',
              todayBtn: "linked",
              clearBtn: !0,
              todayHighlight: !0,
              templates: t
          }), $(".m_datepicker_modal").datepicker({
              rtl: mUtil.isRTL(),
              format: 'yyyy-mm-dd',
              orientation: "top left",
              todayBtn: "linked",
              clearBtn: !0,
              todayHighlight: !0,
              templates: t
          })
      }
  }
}();

/*ALAMAT KABUPATEN*/
$("#provinsi").change(function(){ 
	mApp.block(".kabupaten", {
      overlayColor: "#000000",
      type: "loader",
      state: "primary",
      message: "<b>Memuat Data Kabupaten...</b>"
  	});
	$.ajax({
		type: "POST", // Method pengiriman data bisa dengan GET atau POST
		url: "<?= base_url('AlamatChain/listKota'); ?>", // Isi dengan url/path file php yang dituju
		data: {
			idProvinsi : $("#provinsi").val()
		}, // data yang akan dikirim ke file yang dituju
		dataType: "json",
		beforeSend: function(e) {
			if(e && e.overrideMimeType) {
				e.overrideMimeType("application/json;charset=UTF-8");
			}
		},
		success: function(response){ 
			mApp.unblock(".kabupaten");
			$("#kabupaten").html(response.listKota).show();
		},
		error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
			alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
		}
	});
});
/*ALAMAT KECAMATAN*/
$("#kabupaten").change(function(){ 
	mApp.block(".kecamatan", {
      overlayColor: "#000000",
      type: "loader",
      state: "primary",
      message: "<b>Memuat Data Kecamatan...</b>"
  	});
	$.ajax({
		type: "POST", // Method pengiriman data bisa dengan GET atau POST
		url: "<?= base_url('AlamatChain/listKecamatan'); ?>", // Isi dengan url/path file php yang dituju
		data: {
			idKabupaten : $("#kabupaten").val()
		}, // data yang akan dikirim ke file yang dituju
		dataType: "json",
		beforeSend: function(e) {
			if(e && e.overrideMimeType) {
				e.overrideMimeType("application/json;charset=UTF-8");
			}
		},
		success: function(response){ 
			mApp.unblock(".kecamatan");
			$("#kecamatan").html(response.listKecamatan).show();
		},
		error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
			alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
		}
	});
});
/*ALAMAT KELURAHAN*/
$("#kecamatan").change(function(){ 
	mApp.block(".kelurahan", {
      overlayColor: "#000000",
      type: "loader",
      state: "primary",
      message: "<b>Memuat Data Kelurahan...</b>"
  	});
	$.ajax({
		type: "POST", // Method pengiriman data bisa dengan GET atau POST
		url: "<?= base_url('AlamatChain/listKelurahan'); ?>", // Isi dengan url/path file php yang dituju
		data: {
			idKecamatan : $("#kecamatan").val()
		}, // data yang akan dikirim ke file yang dituju
		dataType: "json",
		beforeSend: function(e) {
			if(e && e.overrideMimeType) {
				e.overrideMimeType("application/json;charset=UTF-8");
			}
		},
		success: function(response){ 
			mApp.unblock(".kelurahan");
			$("#kelurahan").html(response.listKelurahan).show();
		},
		error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
			alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
		}
	});
});

/*FORM EDIT DATA UTAMA*/
$(document).on('click', '#btnDataUtama', function(e) {
	base_url = '<?= base_url() ?>';
	$("#btnLoading").html('<img src="' + base_url + 'assets/svg/loading-spin.svg" alt=""> ');
	var data = $('#formEditProfil').serialize();
    	$.ajax({
    		url: '<?= base_url('PesertaDidik/Profil/editProfilPD') ?>',
    		type: 'POST',
    		dataType: 'json',
    		data: data,
    		beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType('application/jsoncharset=UTF-8')
				}
			},
    		success: function(response){
    			if(response.status == 'sukses'){
    				swal({
		                title: response.title,
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
		        }else{
    				toastr.error(response.pesan, response.title);
    				$("#btnLoading").fadeOut();
    			}
    		}
    	})
});
/*--------------------------------------------------------------*/

/*FORM EDIT DATA ALAMAT*/
$(document).on('click', '#btnDataAlamat', function(e) {
	base_url = '<?= base_url() ?>';
	$("#btnalamatLoading").html('<img src="' + base_url + 'assets/svg/loading-spin.svg" alt=""> ');
	var data = $('#formEditDataAlamat').serialize();
    	$.ajax({
    		url: '<?= base_url('PesertaDidik/Profil/editAlamatPD') ?>',
    		type: 'POST',
    		dataType: 'json',
    		data: data,
    		beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType('application/jsoncharset=UTF-8')
				}
			},
    		success: function(response){
    			if(response.status == 'sukses'){
    				swal({
		                title: response.title,
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
		        }else{
    				toastr.error(response.pesan, response.title);
    				$("#btnalamatLoading").fadeOut();
    			}
    		}
    	})
});
/*--------------------------------------------------------------*/
</script>