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

			</ul>
		</div>
	</div>
	<div class="m-portlet__body">
        <div class="m-widget3">
	        <div class="m-scrollable m-scroller" data-scrollable="true" data-height="500" 
	        	style="height: 400px; overflow: auto;">
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
                        				$nilaiPengetahuan = 0;
                        				$nilaiKeterampilan = 0;
                        			}else{
                        				$nilaiPengetahuan = $nilai->nilai_pengetahuan;
                        				$nilaiKeterampilan = $nilai->nilai_keterampilan;
                        			} 
                        		?>
	                        	<tr>
	                        		<td><?= $data->nipd ?></td>
	                				<td style="width: 200px; text-align: left;">
	                					<b><?= $data->nama_pd ?></b>
	                				</td>
	                				<td style="text-align: center;">
	                					<a href="#" class="nilaiPengetahuan" id="2" 
	    									data-type="number" data-placement="right" data-title="Nilai Pengetahuan" 
	    									data-name="nilaiPengetahuan" data-pk='2'>
	    									<?= $nilaiPengetahuan ?>
	  									</a>
	                				</td>
	                				<td style="text-align: center;"><?= $nilaiKeterampilan ?></td>
	                				<td style="text-align: center;">dfssdfaf</td>
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
<script src="<?= base_url('assets/vendors/datatables/datatables.bundle.js') ?>" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
    DatatablesBasicHeaders.init()
});
var DatatablesBasicHeaders = {
    init: function() {
        $("#m_table_1").DataTable({
            responsive: !1,

        })
    }
};
	$('.nilaiPengetahuan').editable({
        mode: 'inline',   
        type: 'number',
        step: '1.00',
        min: '0.00',
        max: '100',
        title: 'Enter Value',   
    });

</script>