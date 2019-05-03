
<div class="modal fade" id="modalTambahMapel" role="dialog" aria-labelledby="" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="">Select2 Examples</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-remove"></span>
				</button>
			</div>
			<form class="m-form m-form--fit m-form--label-align-right">
				<div class="modal-body">
					<div class="form-group m-form__group row m--margin-bottom-20">
						<label class="col-form-label col-lg-3 col-sm-12">Mata Pelajaran</label>
						<div class="col-lg-9 col-md-9 col-sm-12 ">
							<select class="form-control m_select2_1_modal" id="">
			                  <!--   <option value="<?= $kelas->NIK_tenpen ?>"><?= $kelas->nama_tenpen ?> | <?= $kelas->nama_sekolah ?></option> -->
			                    <?php foreach ($mapel as $data): ?>
			                        <option value="<?= $data->idMata_pelajaran ?>"><?= $data->nama_mata_pelajaran ?> | <?= $data->nama_kelompok_mapel ?></option>
			                    <?php endforeach; ?>
			                </select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">Tambahkan</button>
					<button type="button" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="row" id="">
	<div class="col-lg-6">	
		<div class="m-portlet m-portlet--info m-portlet--head-solid-bg m-portlet--head-sm m-portlet--mobile" 
			m-portlet="true" id="portletKelas">
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
			        <div class="m-scrollable m-scroller" data-scrollable="true" data-height="500" 
			        	style="height: 250px; overflow: auto;">
			        		<div data-id='' id="portlet">
					        	<div class="m-widget3__item">
					                <div class="m-widget3__header">
					                    <div class="m-widget3__user-img">
					                        <img class="m-widget3__img" 
					                        	src="" alt="">
					                    </div>
					                    <div class="m-widget3__info">
					                        <span class="m-widget3__username">
					                            	Matematika
					                        </span><br>
					                        <span class="m-widget3__time" contenteditable="true">
					                            Guru : Fajar Maulana
					                        </span>
					                    </div>
					                    <a href="KelolaNilai?IDMaster=<?= $_GET['IDMaster'] ?>&IDMatpel=3" class="btnKelolaNilaii btn btn-sm btn-success m-btn m-btn--pill m-btn--air" 
					                    	data-id="" data-nama="">
					                        <b>Kelola Nilai</b>
					                    </a>
					                </div>
					            </div>

				            </div>
			        </div>
		        </div>
		    </div>
		</div>
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

<script>
	 jQuery(document).ready(function() {
	 	DatatablesBasicPaginations.init();
	 })
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


