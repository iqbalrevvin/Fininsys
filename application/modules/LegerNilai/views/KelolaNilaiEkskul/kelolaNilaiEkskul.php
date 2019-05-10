<div class="modal fade modalInput" id="modalTambahEkskul" role="dialog" aria-labelledby="" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="">Ekstrakulikuler Penilaian </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-remove"></span>
				</button>
			</div>
			<form class="m-form m-form--fit m-form--label-align-right" id="formTambahEkskul" method="POST">
				<div class="modal-body">
					<input type="hidden" id="IdMaster" name="idMaster" value="<?= $idMasterLeger ?>"></input>
					<div id="resultErrorTambahEkskul" class="text-danger"></div>
					<div class="form-group row m--margin-bottom-20">
						<label class="col-form-label col-lg-3 col-sm-12">Ekstrakulikuler</label>
						<div class="col-lg-9 col-md-9 col-sm-12 ">
							<select class="form-control m_select2_1_modal" id="pilihEkskul" name="pilihEkskul">
			                    <?php foreach ($ekskul as $data): ?>
			                        <option value="<?= $data->nama_ekstrakulikuler ?>">
			                        	<?= $data->nama_ekstrakulikuler ?> | <?= $data->Keterangan ?>
			                        </option>
			                    <?php endforeach; ?>
			                </select>
						</div>
					</div>
					<div class="form-group row m--margin-bottom-20">
						<label class="col-form-label col-lg-3 col-sm-12">Pembimbing Ekskul</label>
						<div class="col-lg-9 col-md-9 col-sm-12 ">
							<select class="form-control m_select2_1_modal" id="pembimbingEkskul" name="pembimbingEkskul">
			                    <?php foreach ($tenpen as $data): ?>
			                        <option value="<?= $data->nama_tenpen ?>">
			                        	<?= $data->nama_tenpen ?> | <?= $data->nama_sekolah ?>
			                        </option>
			                    <?php endforeach; ?>
			                </select>
						</div>
					</div>
					<div class="form-group row m--margin-bottom-10">
						<label class="col-form-label col-lg-3 col-sm-12">No. Urut</label>
						<div class="col-lg-2 col-md-9 col-sm-9 ">
							<input type='text' class="form-control m-input m-input--air m_maxlength_2" maxlength="2" 
									placeholder="No." id="noUrut" name="noUrut" onkeypress="return inputAngka(event)">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="btnTambahEkskul" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
						Tambahkan
					</button>
					<button type="button" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air" data-dismiss="modal">
						Tutup
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="row" id="">
	<div class="col-lg-5">	
		<div id="resultKontenEkskul">
			<div class="m-blockui" id="loader-center">
		        <span>Memuat Data Ekstrakulikuler</span>
		        <span>
		            <div class="m-loader m-loader--brand"></div>
		        </span>
		    </div>
		</div>
	</div>

	<div class="col-lg-7">
		<div id="loadKontenKelolaNilai"></div>
		<div id="resultKontenKelolaNilai"></div>
	</div>
</div>
<input type="hidden" id="IDMaster" value="<?= $_GET['IDMaster'] ?>"></input>

<script>

	 jQuery(document).ready(function() {
	 	DatatablesBasicPaginations.init();
	 	kontenEkskul()
	 })

 	function kontenEkskul(){
      var id = $('#IDMaster').val();
      $.ajax({
          url: '<?= base_url('LegerNilai/getKontenEkskul') ?>',
          type: 'POST',
          async: true,
          data:{
          	id : id,
            show: 1
          },
          success: function(response){
              $('#resultKontenEkskul').html(response);
              //$("#jenisNasabah").selectpicker();
          }
      });
    } 
    /*KONTEN MATA PELAJARAN*/
	$(document).on('click', '#btnTambahEkskul', function(e) {
     	modalBlockLoad()
     	if($('#noUrut').val()==""){
     		toastr.error("No. Urut Tidak Boleh Kosong!", "Gagal Mengirim");
     		mApp.unblock(".modalInput");
     	}else{
        	var data = $('#formTambahEkskul').serialize();
        	$.ajax({
        		url: '<?= base_url('LegerNilai/tambahEkskulNilai') ?>',
        		type: 'POST',
        		dataType: 'json',
        		data: data,
        		beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType('application/jsoncharset=UTF-8')
					}
				},
        		success: function(response){
        			mApp.unblock(".modalInput");
        			// $('#resultAddNasabah').html(result).show();
        			if(response.status == 'sukses'){
        				swal({
			                title: "Proses Berhasil",
			                text: "Ekstrakulikuler Untuk Penilaian Berhasil Ditambahkan ",
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
			            /*$("#formTambahMapel")[0].reset();
			            $('#modalTambahMapel').modal('hide');*/
			            //kontenEkskul();
			        }else if(response.status == 'ganda'){
			        	swal({
			                title: "Proses Gagal",
			                text: "Ekstrakulikuler Yang Ditambahakan Sudah Tersedia!",
			                type: "error",
			            });
        			}else{
        				mApp.unblock(".modalInput");
        				$('#resultErrorTambahEkskul').html(response.pesan).show()
        			}
        		}
        	})
		}
	});
	/*-------------------------------------------------------*/
	
	 var DatatablesBasicPaginations = {
	    init: function() {
	        tabel = $("#tabelNilaiSiswa").DataTable({
	        	scrollY: "40vh",
            	scrollX: !0,
            	scrollCollapse: !0,
            	pagingType: "full_numbers",
	            //responsive:!0,
	            "order": [], //Initial no order.
	            //scrollY: "50vh",
	            //scrollX: !0,

	            scrollCollapse: !0,
	        })
	    }
	};

</script>		


