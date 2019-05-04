<div class="modal fade modalInput" id="modalTambahMapel" role="dialog" aria-labelledby="" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="">Mata Pelajaran Penilaian </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-remove"></span>
				</button>
			</div>
			<form class="m-form m-form--fit m-form--label-align-right" id="formTambahMapel" method="POST">
				<div class="modal-body">
					<input type="hidden" id="IdMaster" name="idMaster" value="<?= $idMasterLeger ?>"></input>
					<div id="resultErrorTambahMapel" class="text-danger"></div>
					<div class="form-group row m--margin-bottom-20">
						<label class="col-form-label col-lg-3 col-sm-12">Mata Pelajaran</label>
						<div class="col-lg-9 col-md-9 col-sm-12 ">
							<select class="form-control m_select2_1_modal" id="mataPelajaran" name="mataPelajaran">
			                    <?php foreach ($mapel as $data): ?>
			                        <option value="<?= $data->idMata_pelajaran ?>"><?= $data->nama_mata_pelajaran ?> | <?= $data->nama_kelompok_mapel ?></option>
			                    <?php endforeach; ?>
			                </select>
						</div>
					</div>
					<div class="form-group row m--margin-bottom-20">
						<label class="col-form-label col-lg-3 col-sm-12">Guru Pengampu</label>
						<div class="col-lg-9 col-md-9 col-sm-12 ">
							<select class="form-control m_select2_1_modal" id="guruPengampu" name="guruPengampu">
			                    <?php foreach ($tenpen as $data): ?>
			                        <option value="<?= $data->NIK_tenpen ?>"><?= $data->nama_tenpen ?> | <?= $data->nama_sekolah ?></option>
			                    <?php endforeach; ?>
			                </select>
						</div>
					</div>
					<div class="form-group  row m--margin-bottom-10">
						<label class="col-form-label col-lg-3 col-sm-12">Nilai KKM Pengetahuan</label>
						<div class="col-lg-2 col-md-9 col-sm-9 ">
							<input type='text' class="form-control m-input m-input--air m_maxlength_2" maxlength="2" 
									placeholder="KKM" id="kkmPengetahuan" name="kkmPengetahuan" 
									onkeypress="return inputAngka(event)">
						</div>
					</div>
					<div class="form-group row m--margin-bottom-10">
						<label class="col-form-label col-lg-3 col-sm-12">Nilai KKM Keterampilan</label>
						<div class="col-lg-2 col-md-9 col-sm-9 ">
							<input type='text' class="form-control m-input m-input--air m_maxlength_2" maxlength="2" 
									placeholder="KKM" id="kkmKeterampilan" name="kkmKeterampilan" 
									onkeypress="return inputAngka(event)">
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
					<button type="button" id="btnTambahMapel" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
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
	<div class="col-lg-6">	
		<div id="resulKontenMapel">
			<div class="m-blockui" id="loader-center">
		        <span>Memuat Data Mata Pelajaran</span>
		        <span>
		            <div class="m-loader m-loader--brand"></div>
		        </span>
		    </div>
		</div>
		<?php #require('kontenKelolaMapel.php') ?>
	</div>

	<div class="col-lg-6">
		<div class="m-portlet m-portlet--warning m-portlet--head-solid-bg m-portlet--head-sm m-portlet--mobile" 
			m-portlet="true" id="portletKelas">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon">
							<i class="flaticon-users-1"></i>
						</span>
						<h3 class="m-portlet__head-text">
							Nilai Siswa | Matematika
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">

					</ul>
				</div>
			</div>
			<div class="m-portlet__body">
		        <div class="m-widget3">
			        <div class="m-scrollable m-scroller" data-scrollable="true" data-height="500" 
			        	style="height: 250px; overflow: auto;">
		        		<div data-id='' id="portlet">
				        	<table class="table table-striped- table-bordered table-hover" id="tabelNilaiSiswa" >
		                        <thead style="border-top:5px;">
		                        	<tr>
										<th style="text-align: center;" colspan="2" scope="col">Informasi Siswa</th>
										<th style="text-align: center;" colspan="2" scope="col">Nilai Umum</th>
										<th style="text-align: center;" colspan="3" scope="col">Nilai Prilaku</th>
										<th style="width: auto; height: 20px; text-align: center; vertical-align: middle;" rowspan="2" >Deskripsi</th>
									</tr>
		                            <tr>
		                                <th style="text-align: center;">NIPD</th>
		                                <th style="text-align: center;">Nama Siswa</th>
		                                <th style="text-align: center;">Pengetahuan</th>
		                                <th style="text-align: center;">Keterampilan</th>
		                                <th style="text-align: center;">Sikap</th>
		                                <th style="text-align: center;">Sosial</th>
		                                <th style="text-align: center;">Spritual</th>
		                                
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	<tr>
		                        		<td>test</td>
                        				<td style="text-align: center;">
                        					<a href="#" class="test" id="1" 
            									data-type="number" data-placement="right" 
            									data-title="Enter username" data-name='name' data-pk="1">
            									asdasd
	          								</a>
	                        			</td>
                        				<td style="text-align: center;">
                        					<a href="#" class="nama" id="2" 
            									data-type="text" data-placement="right" data-title="Nilai Pengetahuan" 
            									data-name="nilaiPengetahuan" data-pk='3'>
            									80
          									</a>
                        				</td>
                        				<td style="text-align: center;">dfssdfafsfslskjadlkfj</td>
                        				<td style="text-align: center;">dfssdfaf</td>
                        				<td style="text-align: center;">dfssdfaf</td>
                        				<td style="text-align: center;">dfssdfaf</td>
                        				<td style="text-align: center;">dfssdfaf</td>
                        			</tr>
		                        </tbody>
		                    </table>
			            </div>
			        </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
<input type="hidden" id="IDMaster" value="<?= $_GET['IDMaster'] ?>"></input>


<script>

	 jQuery(document).ready(function() {
	 	DatatablesBasicPaginations.init();
	 	kontenMapel()
	 })

	 function kontenMapel(){
          var id = $('#IDMaster').val();
          $.ajax({
              url: '<?= base_url('LegerNilai/getKontenMapel') ?>',
              type: 'POST',
              async: true,
              data:{
              	id : id,
                show: 1
              },
              success: function(response){
                  $('#resulKontenMapel').html(response);
                  //$("#jenisNasabah").selectpicker();
              }
          });
        } 
	 




	 $(document).on('click', '#btnTambahMapel', function(e) {
     	modalBlockLoad()
     	if($('#kkmPengetahuan').val()=="" || $('#kkmKeterampilan').val()=="" || $('#noUrut').val()==""){
     		toastr.error("Terdapat parameter wajib yang tidak boleh kosong!", "Gagal Mengirim");
     		mApp.unblock(".modalInput");
     	}else{
        	var data = $('#formTambahMapel').serialize();
        	$.ajax({
        		url: '<?= base_url('LegerNilai/tambahMapelNilai') ?>',
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
			                text: "Mata Pelajaran Berhasil Ditambahkan ",
			                type: "success",
			            });
			            $("#formTambahMapel")[0].reset();
			            $('#modalTambahMapel').modal('hide');
			        }else if(response.status == 'ganda'){
			        	swal({
			                title: "Proses Gagal",
			                text: "Mata Pelajaran Yang Ditambahakan Sudah Tersedia!",
			                type: "error",
			            });
        			}else{
        				mApp.unblock(".modalInput");
        				$('#resultErrorTambahMapel').html(response.pesan).show()
        			}
        		}
        	})
		}
	});



	$('.test').editable({
        type: 'text',
        mode: 'inline',   
        type: 'number',
        step: '1.00',
        min: '0.00',
        max: '100',
        title: 'Enter Value',   
    });

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


