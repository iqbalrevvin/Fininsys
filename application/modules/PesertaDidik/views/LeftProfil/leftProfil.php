<div class="col-xl-4 col-lg-5">
	<div class="m-portlet m-portlet--full-height  ">
		<div class="m-portlet__body">
			<div class="m-card-profile">
				<div class="m-card-profile__pic">
					<div class="m-card-profile__pic-wrapper">
						<img src="<?= base_url('assets/image/foto_pd/'.fotoGender($profil->foto_pd, $profil->jk_pd)) ?>" 
							alt="<?= $profil->nama_pd ?>" height="150"/>
					</div>
				</div>
				<div class="m-card-profile__details">
					<span class="m-card-profile__name"><?= $profil->nama_pd ?></span>
					<span class="m-card"><b><?= $profil->nama_sekolah ?></b></span><br>
					<span class="m-card"><?= $profil->NIK_pd ?></a><br>
					<span class="m-card ">Tingkat : <?= grade($profil->tahun_angkatan, $profil->jumlah_semester) ?></a><br>
					<span class="m-card ">Semester : <?= semester($profil->tahun_angkatan, $profil->jumlah_semester) ?></a>

				</div>
			</div>
			<ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
				<li class="m-nav__separator m-nav__separator--fit"></li>
				<li class="m-nav__section m--hide">
					<span class="m-nav__section-text">Section</span>
				</li>
				<li class="m-nav__item">
					<a href="header/profile&amp;demo=default.html" class="m-nav__link">
						<i class="m-nav__link-icon flaticon-profile-1"></i>
						<span class="m-nav__link-title">
							<span class="m-nav__link-wrap">
								<span class="m-nav__link-text">Cetak Biodata</span>
								<!-- <span class="m-nav__link-badge"><span class="m-badge m-badge--success">2</span></span> -->
							</span>
						</span>
					</a>
				</li>
				<li class="m-nav__item">
					<a href="header/profile&amp;demo=default.html" class="m-nav__link">
						<i class="m-nav__link-icon flaticon-file-2"></i>
						<span class="m-nav__link-text">Surat Keterangan</span>
					</a>
				</li>
				<li class="m-nav__item">
					<a href="header/profile&amp;demo=default.html" class="m-nav__link">
						<i class="m-nav__link-icon flaticon-file-2"></i>
						<span class="m-nav__link-text">Surat Mutasi</span>
					</a>
				</li>
				<li class="m-nav__item">
					<a href="header/profile&amp;demo=default.html" class="m-nav__link">
						<i class="m-nav__link-icon flaticon-statistics"></i>
						<span class="m-nav__link-text">Transkrip Nilai</span>
					</a>
				</li>
			</ul>
			<div class="m-portlet__body-separator">DAFTAR BIODATA</div>
			<?php require('daftarBiodata.php') ?>
		</div>
	</div>
</div>