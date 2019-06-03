<div class="m-portlet__body">
	<form class="m-form m-form--fit m-form--label-align-right" id="" method="POST">
			<div class="form-group ">
				<div class="col-10">
					<h3 class="m-form__section">Data Akademik</h3>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-lg-4 ">
            	<label><b>Tahun Angkatan</b></label> : 
            	<?php $tahunIni = date('Y') ?>
            	<?php $tahunMulai = $tahunIni-10; ?>
                <select class="form-control col-lg-6 " name="tahunAngkatan" id="tahunAngkatan">
                	<option value="">Tahun Angkatan</option>
                		<?php for ($i = $tahunMulai; $i <= $tahunIni; $i+=1): ?>
                			<option <?= $i == $profil->tahun_angkatan ? 'selected="selected"' : '' ?> value="<?= $i ?>"><?= $i ?></option>
                		<?php endfor; ?>
				</select>
			</div>
			<div class="col-xs-12 col-sm-6 col-lg-6 m-select2 m-select2--air">
            	<label><b>Kelas & Program Studi</b></label> : 
                <select class="form-control select2" name="idKelas" id="idKelas">	
                <?php if ($profil->idKelas == NULL): ?>
                	<option value="">Pilih Data Kelas & Program Studi</option>
                <?php else: ?>
					<?php $listKelas = $this->PesertaDidik_m->listKelas($profil->idSekolah); ?>
					<?php foreach ($listKelas as $list): ?>
						<option <?= $list->idKelas == $profil->idKelas ? 'selected="selected"' : '' ?> value="<?= $list->idKelas ?>">
							<?= $list->nama_kelas ?> | <?= $list->nama_prodi ?> | <?= $list->nama_sekolah ?>
						</option>
					<?php endforeach ?>
				<?php endif; ?>
				</select>
			</div>
			<div class="col-xs-12 col-sm-6 col-lg-6 ">
            	<label><b>Status Pindahan Peserta Didik</b></label> : 
                <select class="form-control col-lg-5" name="pindahan" id="pindahan">
                	<option value="">Status Pindahan</option>
                	<option <?= $profil->pindahan == 'Ya' ? 'selected="selected"' : '' ?> value="Ya">Ya</option>
                	<option <?= $profil->pindahan == 'Tidak' ? 'selected="selected"' : '' ?> value="Tidak">Tidak</option>
				</select>
			</div>
			<div class="form-group">
				<div class="col-xs-12 col-sm-6 col-lg-6">
					<label><b>Tanggal Pindah</b><small><i>(Kosongkan Jika Bukan Pindahan)</i></small></label>
						<input type="date" class="form-control m-input m-input--air" 
							placeholder="Format : yyyy-mm-dd Atau Pilih Dengan Kalender" id="tanggalPindah" 
							name="tanggalPindah" value="" />
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-lg-6 ">
            	<label><b>Pindah Di Semester</b><small><i>(Kosongkan Jika Bukan Pindahan)</i></small></label> : 
            	<?php $jumlahSemester = $this->PesertaDidik_m->jumlahSemester($profil->idKelas); ?>
                <select class="form-control col-lg-4" name="pindahDiSemester" id="pindahDiSemester">
                	<option value="">Semester</option>
                		<?php for ($i = 1; $i <= $jumlahSemester->jumlah_semester; $i+=1): ?>
                			<option <?= $i == $profil->pindah_di_semester ? 'selected="selected"' : '' ?> value="<?= $i ?>"><?= $i ?></option>
                		<?php endfor; ?>
				</select>
			</div>
			<div class="col-xs-12 col-sm-6 col-lg-8 ">
            	<label><b>Pernah Tidak Naik Kelas</b><small><i>(Kosongkan Jika Selalu Naik Kelas)</i></small></label> : 
            	<?php $jumlahSemester = $this->PesertaDidik_m->jumlahSemester($profil->idKelas); ?>
                <select class="form-control col-lg-4" name="tidakNaikKelas" id="tidakNaikKelas">
                	<option value="">Pilhan</option>
                		<option <?= $profil->tidak_naik_kelas == 'Ya' ? 'selected="selected"' : '' ?> value="Ya">Ya</option>
                		<option <?= $profil->tidak_naik_kelas == 'Tidak' ? 'selected="selected"' : '' ?> value="Tidak">Tidak</option>
				</select>
			</div>
			<div class="col-xs-12 col-sm-6 col-lg-8 ">
            	<label><b>Tidak Naik Di Semester</b><small><i>(Kosongkan Jika Selalu Naik Kelas)</i></small></label> : 
            	<?php $jumlahSemester = $this->PesertaDidik_m->jumlahSemester($profil->idKelas); ?>
                <select class="form-control col-lg-4" name="semesterTidakNaikKelas" id="semesterTidakNaikKelas">
                	<option value="">Semester</option>
                		<?php for ($i = 1; $i <= $jumlahSemester->jumlah_semester; $i+=1): ?>
                			<option <?= $i == $profil->pindah_di_semester ? 'selected="selected"' : '' ?> value="<?= $i ?>"><?= $i ?></option>
                		<?php endfor; ?>
				</select>
			</div>
	</form>
<script>
	jQuery(document).ready(function() {

	});
	
	$('.select2').select2();
</script>