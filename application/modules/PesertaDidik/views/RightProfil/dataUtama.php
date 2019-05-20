<div class="m-portlet__body">
<!-- 
	<div class="form-group ">
		<label class="col-form-label col-lg-3 col-sm-2"><h3>Pas Foto</h3></label>
		<div class="col-xs-12 col-sm-12 col-lg-10">
		<div class="alert alert-metal alert-dismissible m-alert m-alert--air m-alert--outline m-alert--outline-2x" role="alert">
				<strong>Peringatan!</strong> Agar ukuran Pas Foto terlihat ideal, hindari ukuran foto berbentuk persegi dan juga terlalu panjang. (Disarankan Ukuran 4x3)
			</div>
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width: auto; height: 200px;" border="3">
                    <img src="<?= base_url('assets/image/foto_pd/'.fotoGender($profil->foto_pd, $profil->jk_pd)) ?>" 
                    	alt="image" class="img-fluid"  />
                </div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: auto; max-height: 200px; line-height: 20px;"></div>
                <div>
                    <input type="file" class="btn btn-outline-success btn-block btn-file col-xs-12 col-sm-12 col-lg-6" name="foto" id="foto" accept="image/*" />
                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Klik <b>Pilih File</b> Untuk Memilih Pas Foto</span>
                    <span class="fileupload-exists">
                        <i class="fa fa-undo"></i> Pilih Kembali foto, atau klik tombol <b><i class="fa fa-upload"></i>Upload</b> untuk mengupload foto
                    </span>
                  	<br>
                    <button type="submit" name="uploadFotoProfil" class="btn btn-outline-danger m-btn m-btn--custom m-btn--outline-2x fileupload-exists "><i class="fa fa-upload"></i> Upload</button>
                </div>
            </div>
		</div>
	</div>   -->
	<form class="m-form m-form--fit m-form--label-align-right" id="formEditProfil" method="POST">
		<div id="resultErrorDataUtama"></div>
		<div class="form-group m-form__group m--margin-top-10 m--hide">
			<div class="alert m-alert m-alert--default" role="alert">
				The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
			</div>
		</div>
		<div class="form-group ">
			<div class="col-10">
				<h3 class="m-form__section">Data Personal</h3>
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-12 col-sm-12 col-lg-10">
				<label>NIK Peserta Didik*</label>
				<input type="text" class="form-control m-input m-input--air" maxlength="16" type="text" 
					placeholder="NIK Peserta Didik" value="<?= $profil->NIK_pd ?>" name="NIK_pd" id="NIK_pd" readonly>
				<span class="m-form__help">NIK Peserta Didik Hanya Dapat Diubah Di Daftar Peserta Didik</span>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-12 col-lg-10">
				<label>Nama Peserta Didik*</label>
					<input type="text" class="form-control m-input  m-input--air" maxlength="100" type="text" 
						placeholder="Nama Peserta Didik" id="nama" name="nama" value="<?= $profil->nama_pd ?>">
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-6 col-lg-3 m-select2 m-select2--air">
				<label>Jenis Kelamin*</label>
					<select class="form-control m_select2_hiding" name="JK" id="JK">	
					<option value="">Pilih Jenis Kelamin</option>
					<option value="Laki-Laki" <?php if($profil->jk_pd == 'Laki-Laki'){echo "selected";} ?>>Laki - Laki</option>
					<option value="Perempuan" <?php if($profil->jk_pd == 'Perempuan'){echo "selected";} ?>>Perempuan</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-6 col-lg-3 m-select2 m-select2--air">
				<label>Agama</label>
					<select name="agama" id="agama" class="form-control m_select2_hiding">
						<option value="">Pilih Agama</option>
	                    <option value="Islam" <?php if($profil->agama == 'Islam'){echo "selected";} ?>>Islam</option>
						<option value="Kristen" <?php if($profil->agama == 'Kristen'){echo "selected";} ?>>Kristen</option>
						<option value="Khatolik" <?php if($profil->agama == 'Khatolik'){echo "selected";} ?>>Khatolik</option>
						<option value="Hindu" <?php if($profil->agama == 'Hindu'){echo "selected";} ?>>Hindu</option>
						<option value="Budha" <?php if($profil->agama == 'Budha'){echo "selected";} ?>>Budha</option>
					</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-8 col-lg-8">
				<label>Tempat Lahir</label>
					<input type="text" class="form-control m-input m-input--air" placeholder="Inputkan Tempat Lahir Maksimal 50 Karakter" 
					id="tempatLahir" name="tempatLahir" value="<?= $profil->tempat_lahir_pd ?>">
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-6 col-lg-6">
				<label>Tanggal Lahir</label>
					<input type="text" class="form-control m-input m-input--air m_datepicker_nonModal" 
						placeholder="Format : yyyy-mm-dd Atau Pilih Dengan Kalender" id="tanggalLahir" 
						name="tanggalLahir" value="<?= $profil->tanggal_lahir_pd ?>" />
			</div>
		</div>
	

		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions">
				<div class="row">
					<div class="col-7">
						<button type="button" 
							class="btn btn-accent m-btn m-btn--air m-btn--custom" id="btnDataUtama">
							Perbarui Data Utama <span id="btnLoading" ></span>
						</button>&nbsp;&nbsp;
						<!-- <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Kembali</button> -->
					</div>
				</div>
			</div>
		</div>
	</form>

	<form class="m-form m-form--fit m-form--label-align-right" id="formEditDataAlamat" method="POST">
		<input type="hidden" value="<?= $profil->NIK_pd ?>" name="NIK_pd" id="NIK_pd">
		<div id="resultErrorDataAlamat"></div>
		<div class="form-group ">
			<div class="col-10">
				<h3 class="m-form__section">Data Alamat</h3>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-6 col-lg-6 m-select2 m-select2--air">
				<label>Data Provinsi*</label>
					<select class="form-control m_select2" name="provinsi" id="provinsi">	
					<option value="">Pilih Provinsi</option>
					<?php foreach ($provinsi as $provinsi): ?>
						<option <?= $profil->idProvinsi == $provinsi->id_prov ? 'selected="selected"' : '' ?> 
							value="<?= $provinsi->id_prov ?>"><?= $provinsi->nama_provinsi ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-6 col-lg-6 m-select2 m-select2--air kabupaten">
				<label>Data Kota*</label>	
					<select class="form-control m_select2" name="kabupaten" id="kabupaten">	
					<?php if($profil->idProvinsi != 0): ?>
						<?php $listKabupaten = $this->PesertaDidik_m->listKabupaten($profil->idProvinsi) ?>
						<?php foreach ($listKabupaten as $list): ?>
							<option value="">Pilih Kecamatan</option>
							<option <?= $list->id_kab == $profil->idKabupaten ? 'selected="selected"' : '' ?> 
								value="<?= $list->id_kab ?>"><?= $list->nama_kabupaten ?></option>
						<?php endforeach ?>
					<?php else: ?>
						<option>Pilih Terlebih Dahulu Provinsi</option>
					<?php endif; ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-6 col-lg-6 m-select2 m-select2--air kecamatan">
				<label>Data Kecamatan*</label>	
					<select class="form-control m_select2" name="kecamatan" id="kecamatan">	
					<?php if($profil->idKabupaten != 0): ?>
						<?php $listKecamatan = $this->PesertaDidik_m->listKecamatan($profil->idKabupaten) ?>
						<?php foreach ($listKecamatan as $list): ?>
							<option value="">Pilih Kecamatan</option>
							<option <?= $list->id_kec == $profil->idKecamatan ? 'selected="selected"' : '' ?> 
								value="<?= $list->id_kec ?>"><?= $list->nama_kecamatan ?></option>
						<?php endforeach ?>
					<?php else: ?>
						<option>Pilih Terlebih Dahulu Kabupaten</option>
					<?php endif; ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-6 col-lg-6 m-select2 m-select2--air kelurahan">
				<label>Data Kelurahan*</label>	
					<select class="form-control m_select2" name="kelurahan" id="kelurahan">	
					<?php if($profil->idKecamatan != 0): ?>
						<?php $listKelurahan = $this->PesertaDidik_m->listKelurahan($profil->idKecamatan) ?>
						<?php foreach ($listKelurahan as $list): ?>
							<option value="">Pilih Kelurahan</option>
							<option <?= $list->id_kel == $profil->idKelurahan ? 'selected="selected"' : '' ?> 
								value="<?= $list->id_kel ?>"><?= $list->nama_kelurahan ?></option>
						<?php endforeach ?>
					<?php else: ?>
						<option>Pilih Terlebih Dahulu Kecamatan</option>
					<?php endif; ?>
				</select>
			</div>
		</div>
	
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions">
				<div class="row">
					<div class="col-7">
						<button type="button" 
							class="btn btn-accent m-btn m-btn--air m-btn--custom" id="btnDataAlamat">
							Perbarui Alamat<span id="btnalamatLoading" ></span>
						</button>&nbsp;&nbsp;
						<!-- <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Kembali</button> -->
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<script>


	

</script>
