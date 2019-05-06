<div class="modal fade modalInput" id="modalTambahSiswa" role="dialog" aria-labelledby="" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="">Tambah Siswa Ke Penilaian</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-remove"></span>
				</button>
			</div>
			<div class="m-portlet m-portlet--mobile" id="kontenTambahSiswa">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Daftar Siswa 
                            </h3>
                        </div>
                    </div>

                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <button type="button" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air" id="btnTambahSiswa">
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
                                <th>Jenis Kelamin</th>
                                <th>NIPD</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php foreach ($listSiswa as $data): ?>
	                        	<tr>
	                        		<td>
	                        			<label class="m-checkbox m-checkbox--solid m-checkbox--success">
											<input type="checkbox" 
												class="m-checkbox m-checkbox--bold m-checkbox--state-success data-check" 
												value=""> Pilih
											<span></span>
					                     </label>
	                        		</td>
	                        		<td><?= $data->nama_pd ?></td>
	                        		<td><?= $data->jk_pd ?></td>
	                        		<td><?= $data->nipd ?></td>
	                        		<td><?= $data->nama_kelas ?></td>
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
                        	<?php foreach ($listSiswa as $data): ?>
                        		<?php $count = $this->LegerNilai_m->getNilaiPD($data->NIK_pd, $idLeger)->num_rows(); ?>
                        		<?php $nilai = $this->LegerNilai_m->getNilaiPD($data->NIK_pd, $idLeger)->row(); ?>
                        		<?php 
                        			if($count == 0){
                        				$idNilai 			= NULL;
                        				$nilaiPengetahuan 	= NULL;
                        				$nilaiKeterampilan 	= NULL;
                        				$nilaiSikap 		= NULL;
                        			}else{
                        				$idNilai 			= $nilai->idLeger_nilai;
                        				$nilaiPengetahuan 	= $nilai->nilai_pengetahuan;
                        				$nilaiKeterampilan 	= $nilai->nilai_keterampilan;
                        				$nilaiSikap 		= $nilai->nilai_sikap;
                        			} 
                        		?>
	                        	<tr data-id='<?= $idNilai ?>'>
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
	    									data-pk="<?= $idNilai ?>">
	    									<?= $nilaiPengetahuan ?>
	  									</a>
	                				</td>
	                				<!-- <td style="text-align: center;">
	                					<span class='span-nama caption' data-id='<?= $idNilai ?>'>
	                						<?= $nilaiPengetahuan ?>
	                					</span> 
	                					<input type='text' 
	                						class='field-nilaiPengetahuan form-control editor m_maxlength_2' 
	                						value='<?= $nilaiPengetahuan ?>' 
	                						data-id='<?= $idNilai ?>' maxlength="2"
	                						data-nik='<?= $data->NIK_pd ?>'
	                						data-leger='<?= $idLeger ?>'
	                						onkeypress="return inputAngka(event)"/>	
	                				</td> -->
	                				<td style="text-align: center;">
	                					<a href="#" class="nilaiKeterampilan" id="2" 
	    									data-type="number" data-placement="left" data-title="Nilai Keterampilan" 
	    									data-name="nilaiPengetahuan" data-pk='2'>
	    									<?= $nilaiKeterampilan ?>
	  									</a>
	                				</td>
	                				<td style="text-align: center;">
	                					<a href="#" class="nilaiSikap" id="2" 
	    									data-type="number" data-placement="left" data-title="Nilai Sikap" 
	    									data-name="nilaiSikap" data-pk='2'>
	    									<?= $nilaiSikap ?>
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
    DatatablesBasicHeaders.init() 
    DatatablesBasicPaginations.init()
});

var DatatablesBasicPaginations = {
    init: function() {
        $("#tabelSiswaPenilaian").DataTable({
            responsive: !1,

        })
    }
};

var DatatablesBasicHeaders = {
    init: function() {
        $("#m_table_1").DataTable({
            responsive: !1,

        })
    }
};

/*$(document).on("keydown",".editor",function(e){
	if(e.keyCode==13){
		var target=$(e.target);
		var value=target.val();
		var id=target.attr("data-id");
		var nik=target.attr("data-nik");
		var leger=target.attr("data-leger");
		var data={
			id 		: id,
			nik 	: nik,
			leger 	: leger,
			value 	: value,
		};
		if(target.is(".field-nilaiPengetahuan")){
			data.modul="nilai_pengetahuan";
		}else if(target.is(".field-email")){
			data.modul="email";
		}else if(target.is(".field-phone")){
			data.modul="phone";
		}
		$.ajax({
			data:data,
			url:"<?= base_url('LegerNilai/simpanNilai2') ?>",
			type:"post",
			cache:false,
			dataType: "json",
			success: function(a){
			 target.hide();
			 target.siblings("span[class~='caption']").html(value).fadeIn();
			}
		})
	}
});*/

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
</script>