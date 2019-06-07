<!--begin::Modal KETERANGAN-->
<div class="modal fade" id="modalKeterangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
	aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">
                    Keterangan Import Data
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
                 			<b>ID Sekolah</b> diisi dengan ID sekolah siswa saat ini 
                 			(Cek ID di Menu <a href="<?= base_url('Lembaga/Sekolah') ?>" target="_blank">Master Data->Lembaga->Data Sekolah</a>)
                 		</li>
                 		<li>Pastikan <b>NIK,NISN,NIPD</b> Peserta Didik tidak ganda</li>
                 		<li>
                 			Setelah selesai mengimport, lengkapi data Peserta Didik melalui halaman profil Peserta Didik. <br>(<a href="<?= base_url('PesertaDidik/Listpd') ?>" target="_blank">Master Data->Peserta Didik->Profil</a>)
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
						Format Import : &nbsp;
						<a href="<?= base_url('excel/format-data-utama-siswa.xlsx') ?>" 
							class="btn btn-success m-btn m-btn--air m-btn--custom" target="_blank">
							<i class="flaticon-file-2"></i> Format Import
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
						<td colspan="15" style="text-align: center;"><b>IMPORT DATA SISWA</b></td>
					</tr>
					<tr>
						<th>ID Sekolah</th>
						<th>NIK</th>
						<th>TAHUN ANGKATAN</th>
						<th>NISN</th>
						<th>NIPD</th>
						<th>NAMA PESERTA DIDIK</th>
						<th>JENIS KELAMIN</th>
						<th>AGAMA</th>
						<th>TEMPAT LAHIR</th>
						<th>TANGGAL LAHIR</th>
						<th>HP/WA</th>
						<th>EMAIL</th>
						<th>LINK FACEBOOK</th>
						<th>LINK INSTAGRAM</th>
						<th>LINK TWITTER</th>
					</tr>
                </thead>
					
					<?php 
						$numrow = 1;
						$kosong = 0;

						foreach ($sheet as $row) {
							$idSekolah 			= $row['A']; 
							$NIK 				= $row['B']; 
							$tahunAngkatan 		= $row['C']; 
							$NISN 				= $row['D']; 
							$NIPD 				= $row['E']; 
							$nama 				= $row['F']; 
							$jk 				= $row['G']; 
							$tempatLahir 		= $row['H']; 
							$tanggalLahir 		= $row['I']; 
							$agama 				= $row['J'];
							$noHP 				= $row['K'];
							$email 				= $row['L'];
							$facebook 			= $row['M'];
							$instagram 			= $row['N'];
							$twitter 			= $row['O'];

							if(empty($idSekolah) && empty($NIK) && empty($tahunAngkatan) && empty($NISN) && empty($NIPD) && empty($nama) && empty($jk) && empty($tempatLahir) && empty($tanggalLahir) && empty($agama) && empty($noHP) && empty($email) && empty($facebook) && empty($instagram) && empty($twitter))
							continue;
							if($numrow > 1){
								$idSekolah_td 	= ( ! empty($idSekolah))? "" : " style='background: #E07171;'";
								$NIK_td 		= ( ! empty($NIK))? "" : " style='background: #E07171;'";
								$tahunAngkatan_td = ( ! empty($tahunAngkatan))? "" : " style='background: #E07171;'";
								$NISN_td 		= ( ! empty($NISN))? "" : " style='background: #E07171;'";
								$NIPD_td 		= ( ! empty($NIPD))? "" : " style='background: #E07171;'";
								$nama_td 		= ( ! empty($nama))? "" : " style='background: #E07171;'";
								$jk_td 			= ( ! empty($jk))? "" : " style='background: #E07171;'";
								$tempatLahir_td	= ( ! empty($tempatLahir))? "" : " style='background: #E07171;'";
								$tanggalLahir_td = ( ! empty($tanggalLahir))? "" : " style='background: #E07171;'";
								$agama_td 			= ( ! empty($agama))? "" : " style='background: #E07171;'";
								$noHP_td 			= ( ! empty($noHP))? "" : " style='background: #E07171;'";
								$email_td 			= ( ! empty($email))? "" : " style='background: #E07171;'";
								$facebook_td 		= ( ! empty($facebook))? "" : " style='background: #E07171;'";
								$instagram_td 		= ( ! empty($instagram))? "" : " style='background: #E07171;'";
								$twitter_td 		= ( ! empty($twitter))? "" : " style='background: #E07171;'";
								if(empty($idSekolah) or empty($NIK) or empty($tahunAngkatan) or empty($NISN) or empty($NIPD) or empty($nama) or empty($jk) or empty($tempatLahir) or empty($tanggalLahir) or empty($agama) or empty($noHP) or empty($email) or empty($facebook) or empty($instagram) or empty($twitter)){
									$kosong++; // Tambah 1 variabel $kosong
								} ?>
								<tr>
									<td<?= $idSekolah_td ?>><?= $idSekolah ?></td>
									<td<?= $NIK_td ?> ><?= $NIK ?></td>
									<td<?= $tahunAngkatan_td ?> ><?= $tahunAngkatan ?></td>
									<td<?= $NISN_td ?>><?= $NISN ?></td>
									<td<?= $NIPD_td ?>><?= $NIPD ?></td>
									<td<?= $nama_td ?>><?= $nama ?></td>
									<td<?= $jk_td ?>><?= $jk ?></td>
									<td<?= $tempatLahir_td ?>><?= $tempatLahir ?></td>
									<td<?= $tanggalLahir_td ?>><?= $tanggalLahir ?></td>
									<td<?= $agama_td ?>><?= $agama ?></td>
									<td<?= $noHP_td ?>><?= $noHP ?></td>
									<td<?= $email_td ?>><?= $email ?></td>
									<td<?= $facebook_td ?>><?= $facebook ?></td>
									<td<?= $instagram_td ?>><?= $instagram ?></td>
									<td<?= $twitter_td ?>><?= $twitter ?></td>
								</tr><?php	
							}
							$numrow++;
						}	
					?>
				</table>
				<?php if($kosong > 0){ ?>
					<span class="text-danger">
						<?= $kosong ?> Data Peserta Didik Masih Belum Lengkap
					</span>
				<?php }else{ ?>
					<hr>
					<button type="submit" name="import" 
						class="btn btn-success m-btn m-btn--air m-btn--custom navigation">
						<b><i class="flaticon-download"></i> Import Data</b>
					</button>
				<?php } ?>
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