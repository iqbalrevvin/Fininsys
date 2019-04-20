<form class="m-form m-form--fit m-form--label-align-right">
	<div class="m-portlet__body">
		<div class="form-group m-form__group m--margin-top-10 m--hide">
			<div class="alert m-alert m-alert--default" role="alert">
				The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
			</div>
		</div>
		<div class="form-group m-form__group row">
			<div class="col-10">
				<h3 class="m-form__section">Data Personal</h3>
			</div>
		</div>
		<div class="form-group m-form__group">
			<div class="col-xs-12 col-sm-12 col-lg-10">
				<label>NIK Peserta Didik*</label>
				<input type="text" class="form-control m-input m-input--air" maxlength="16" type="text" 
					placeholder="NIK Peserta Didik" value="<?= $profil->NIK_pd ?>" disabled>
				<span class="m-form__help">NIK Peserta Didik Hanya Dapat Diubah Di Daftar Peserta Didik</span>
			</div>
		</div>
		<div class="form-group m-form__group">
			<div class="col-xs-12 col-sm-12 col-lg-10">
				<label>Nama Peserta Didik*</label>
					<input type="text" class="form-control m-input  m-input--air" maxlength="100" type="text" 
						placeholder="Nama Peserta Didik" id="nama" name="nama" value="<?= $profil->nama_pd ?>">
			</div>
		</div>
		<div class="form-group m-form__group">
			<div class="col-xs-12 col-sm-6 col-lg-6 m-select2 m-select2--air">
				<label>Jenis Kelamin*</label>
					<select class="form-control m_select2_hiding" name="JK" id="JK">	
					<option value="">Pilih Jenis Kelamin</option>
					<option value="Laki-Laki" <?php if($profil->jk_pd == 'Laki-Laki'){echo "selected";} ?>>Laki - Laki</option>
					<option value="Perempuan" <?php if($profil->jk_pd == 'Perempuan'){echo "selected";} ?>>Perempuan</option>
				</select>
			</div>
		</div>
		<div class="form-group m-form__group">
			<div class="col-xs-12 col-sm-6 col-lg-6 m-select2 m-select2--air">
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
		<div class="form-group m-form__group">
			<div class="col-xs-12 col-sm-8 col-lg-8">
				<label>Tempat Lahir</label>
					<input type="text" class="form-control m-input m-input--air" maxlength="50" type="text" placeholder="Inputkan Tempat Lahir Maksimal 50 Karakter" id="tempatLahir" name="tempatLahir" value="<?= $profil->tempat_lahir_pd ?>">
			</div>
		</div>
		<div class="form-group m-form__group">
			<div class="col-xs-12 col-sm-6 col-lg-6">
				<label>Tanggal Lahir</label>
					<input type="text" class="form-control m-input  m-input--air m_datepicker_modal" 
						placeholder="Format : yyyy-mm-dd Atau Pilih Dengan Kalender" id="tanggalLahir" 
						name="tanggalLahir" value="<?= $profil->tanggal_lahir_pd ?>" />
			</div>
		</div>
		<div class="form-group m-form__group">
			<div class="col-xs-12 col-sm-6 col-lg-6">
				<label>Agama</label>
				<input type="text" class="form-control m-input  m-input--air m_datepicker_modal" 
					placeholder="Format : yyyy-mm-dd Atau Pilih Dengan Kalender" id="tanggalLahir" name="tanggalLahir" 
					value="<?= $profil->tanggal_lahir_pd ?>" />
			</div>
		</div>
	    <div class="m-portlet__body">	
	    	<div class="form-group m-form__group row">
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
	    	</div>  
	    </div>
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions">
				<div class="row">
					<div class="col-2">
					</div>
					<div class="col-7">
						<button type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">Simpan Data</button>&nbsp;&nbsp;
						<button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Kembali</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

