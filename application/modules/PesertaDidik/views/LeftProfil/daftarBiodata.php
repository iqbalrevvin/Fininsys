<div class="m-widget1 m-widget1--paddingless">
	<div class="m-widget1__item">
		<div class="row m-row--no-padding align-items-center">
			<div class="col">
				<h5 class="m-widget1__title">Data Identitas</h5>
				<span class="m-widget1__desc">No. Identitas : <?= $profil->NIK_pd ?></span><br>
				<span class="m-widget1__desc">No. Induk : <?= $profil->nipd ?></span><br>
				<span class="m-widget1__desc">NISN : <?= $profil->nisn ?></span><br>
				<span class="m-widget1__desc">Jenis Kelamin : <?= $profil->jk_pd ?></span><br>
				<span class="m-widget1__desc">Tempat Lahir : <?= $profil->tempat_lahir_pd ?></span><br>
				<span class="m-widget1__desc">Tanggal Lahir : <?= mediumdate_indo($profil->tanggal_lahir_pd) ?></span><br>
				<span class="m-widget1__desc">Agama : <?= $profil->agama ?></span><br>
			</div>
		</div>
	</div>
	<div class="m-widget1__item">
		<div class="row m-row--no-padding align-items-center">
			<div class="col">
				<h5 class="m-widget1__title">Data Alamat</h5>
				<span class="m-widget1__desc">Alamat : <?= value($profil->alamat) ?></span><br>
				<span class="m-widget1__desc">Desa/Kelurahan : <?= value($profil->nama_kelurahan) ?></span><br>
				<span class="m-widget1__desc">Kecamatan : <?= value($profil->nama_kecamatan) ?></span><br>
				<span class="m-widget1__desc">Kabupaten : <?= value($profil->nama_kabupaten) ?></span><br>
				<span class="m-widget1__desc">Provinsi : <?= value($profil->nama_provinsi) ?></span><br>
			</div>
		</div>
	</div>
	<div class="m-widget1__item">
		<div class="row m-row--no-padding align-items-center">
			<div class="col">
				<h5 class="m-widget1__title">Kontak & Media Sosial</h5>
				<span class="m-widget1__desc">No. Telepon/WA : <?= $profil->no_telp_pd ?></span><br>
				<span class="m-widget1__desc">Email : <?= $profil->email_pd ?></span><br>
				<span class="m-widget1__desc">
					Facebook : <a href="<?= $profil->facebook ?>" target="_blank"><?= $profil->facebook ?></a> 
				</span><br>
				<span class="m-widget1__desc">
					Instagram : <a href="<?= $profil->instagram ?>" target="_blank"><?= $profil->instagram ?></a>
				</span><br>
				<span class="m-widget1__desc">
					Twitter : <a href="<?= $profil->twitter ?>" target="_blank"><?= $profil->twitter ?></a>
				</span><br>
			</div>
		</div>
	</div>
</div>