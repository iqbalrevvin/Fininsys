<!--begin::Modal KETERANGAN-->
<div class="modal fade" id="modalKeterangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
	aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">
                    Keterangan Import Data Nilai
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-portlet m-portlet--mobile" id="">
                 <div class="m-portlet__body">
                 	<p>Pastikan Data Yang Di Upload Adalah File Dari Format Excel (.xlsx)</p>
                 	<b>Hal Yang Perlu Diperhatikan Saat Mengimport Data Utama Siswa</b>
                 	<ul>
                 		<li>
                 			Download terlebih dahulu format nilai!
                 		</li>
                 		<li>Pastikan Format Nilai bawaan tidak diubah</li>
                 		<li>
                 			Isilah hanya kolom nilai!
                 		</li>
                 	</ul>
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
        <form method="POST" action="<?= base_url('ImportMaster/ImportPesertaDidik/DataUtama') ?>" enctype="multipart/form-data">
            <div class="m-portlet__head-title">
	        
	            	<div class="row col-md-5 col-lg-5">
						<b>Unggah File</b> : &nbsp;	
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="fileImport" id="customFile" accept=".xlsx">
							<label class="custom-file-label" for="customFile">Klik Disini & Pilih Berkas</label>
						</div>					
					</div>
					
					<div class="row col-md-3 col-lg-2">
						TampilKan Data : &nbsp;
						<input type="submit" class="btn btn-info m-btn m-btn--air m-btn--custom navigation" 
							name="previewImport" value="Tampilkan"></input>
					</div>
				
		
					<div class="col-md-3 col-lg-3">
						Format Nilai : &nbsp;
						<a href="<?= base_url('excel/format-data-utama-siswa.xlsx') ?>" 
							class="btn btn-success m-btn m-btn--air m-btn--custom" target="_blank">
							<i class="flaticon-file-2"></i> Format Nilai
						</a>
					</div>
					
					<div class="row col-md-2 col-lg-1">
						<a href="#" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only" data-toggle="modal" 
	                        data-target="#modalKeterangan" title="Keterangan">
							<i class="la la-info"></i>
						</a>
					</div>
            </div>
            </form>
        </div>
    </div>
    <div class="m-portlet__body">
		<?php if(! $this->input->post('previewImport')): ?>
			<?php if($this->session->flashdata('suksesImport')): ?>
				<b><?= $this->session->flashdata('suksesImport') ?></b>
			<?php else: ?>
				Pilih Berkas Dengan Format Excel Lalu Klik Tobol <b>Tampilkan</b> Untuk Mereview Data Yang Akan Di Import.
			<?php endif ?>	
		<?php else: ?>
			<?php if(isset($upload_error)): ?>
				<div class="text-danger"><b><?= $upload_error ?></b></div>
			<?php else: ?>
			<form action="<?= base_url('ImportMaster/ImportPesertaDidik/ImportDataUtama') ?>" method="POST" >
				<table class="table table-striped- table-bordered table-hover table-checkable" id="dataPreview">
				<thead>
                    <tr>
						<td colspan="15" style="text-align: center;"><b>Preview Data Nilai</b></td>
					</tr>
					<tr>
						<th>ID Master</th>
						<th>ID Leger</th>
						<th>NIK Peserta Didik</th>
						<th>Nama Peserta Didik</th>
						<th>Nilai Pengetahuan</th>
						<th>Nilai Keterampilan</th>
						<th>Sikap</th>
						<th>Sosial</th>
						<th>Spiritual</th>
						<th>Catatan</th>
                </thead>
					<?php 
						$numrow = 1;
						$kosong = 0;

						foreach ($sheet as $row) {
							$idMaster 			= $row['A']; 
							$idLeger 			= $row['B']; 
							$NIK_pd 			= $row['C']; 
							$nama_pd 			= $row['D']; 
							$nilaiPengetahuan 	= $row['E']; 
							$nilaiKeterampilan 	= $row['F']; 
							$sikap 				= $row['G']; 
							$sosial 			= $row['H']; 
							$spiritual 			= $row['I']; 
							$catatan 			= $row['J']; 
							if($numrow > 1){
							 ?>
								<tr>
									<td><?= $idMaster ?></td>
									<td><?= $idLeger ?></td>
									<td><?= $NIK_pd ?></td>
									<td><?= $NIK_pd ?></td>
									<td><?= $nama_pd ?></td>
									<td><?= $nilaiPengetahuan ?></td>
									<td><?= $nilaiKeterampilan ?></td>
									<td><?= $sikap ?></td>
									<td><?= $sosial ?></td>
									<td><?= $spiritual ?></td>
									<td><?= $catatan ?></td>
								</tr><?php	
							}
							$numrow++;
						}
					?>
				</table>

					<hr>
					<button type="submit" name="import" 
						class="btn btn-success m-btn m-btn--air m-btn--custom navigation">
						<b><i class="flaticon-download"></i> Import Data</b>
					</button>
			</form>
			<?php endif; ?>
		<?php endif; ?>
    </div>
</div>


<script>
	$(document).ready(function(){
		$("#dataKosong").hide();

		$("#dataPreview").DataTable({
	            responsive:1,
	    });
	});

	
</script>