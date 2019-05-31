<table style="height: 90px; width: 100%; border-collapse: collapse;" border="0">
	<tbody>
		<tr style="height: 18px;">
		<td style="width: 22.0079%; height: 18px;">Nama Sekolah</td>
		<td style="width: 1.23642%; height: 18px;">:</td>
		<td style="width: 44.2631%; height: 18px;"><strong><?= $identitasSekolah->nama_sekolah ?></strong></td>
		<td style="width: 10.9546%; height: 18px;">Kelas</td>
		<td style="width: 2.20085%; height: 18px;">:</td>
		<td style="width: 19.3372%; height: 18px;"><?= $identitasPD->nama_kelas ?></td>
		</tr>
		<tr style="height: 18px;">
		<td style="width: 22.0079%; height: 18px;">Alamat</td>
		<td style="width: 1.23642%; height: 18px;">:</td>
		<td style="width: 44.2631%; height: 18px;"><?= $identitasSekolah->alamat_sekolah ?></td>
		<td style="width: 10.9546%; height: 18px;">Semester</td>
		<td style="width: 2.20085%; height: 18px;">:</td>
		<td style="width: 19.3372%; height: 18px;"><?= $semester ?></td>
		</tr>
		<tr style="height: 18px;">
		<td style="width: 22.0079%; height: 18px;">Nama Peserta Didik</td>
		<td style="width: 1.23642%; height: 18px;">:</td>
		<td style="width: 44.2631%; height: 18px;"><strong><?= $identitasPD->nama_pd ?></strong></td>
		<td style="width: 10.9546%; height: 18px;">Tingkat</td>
		<td style="width: 2.20085%; height: 18px;">:</td>
		<td style="width: 19.3372%; height: 18px;"><?= grade($identitasPD->tahun_angkatan, $identitasPD->jumlah_semester) ?></td>
		</tr>
		<tr style="height: 18px;">
		<td style="width: 22.0079%; height: 18px;">NIPD / NISN</td>
		<td style="width: 1.23642%; height: 18px;">:</td>
		<td style="width: 44.2631%; height: 18px;"><strong><?= $identitasPD->nipd ?> / <?= $identitasPD->nisn ?></strong></td>
		<td style="width: 10.9546%; height: 18px;">&nbsp;</td>
		<td style="width: 2.20085%; height: 18px;">&nbsp;</td>
		<td style="width: 19.3372%; height: 18px;">&nbsp;</td>
		</tr>
		<tr style="height: 18px;">
		<td style="width: 22.0079%; height: 18px;">&nbsp;</td>
		<td style="width: 1.23642%; height: 18px;">&nbsp;</td>
		<td style="width: 44.2631%; height: 18px;">&nbsp;</td>
		<td style="width: 10.9546%; height: 18px;">&nbsp;</td>
		<td style="width: 2.20085%; height: 18px;">&nbsp;</td>
		<td style="width: 19.3372%; height: 18px;">&nbsp;</td>
		</tr>
	</tbody>
</table>

<p><strong>Informasi Nilai Ekstrakulikuler</strong></p>
<table style="border-collapse: collapse; width: 100%; height: 54px;" border="1">
	<tbody>
		<tr style="height: 18px; background-color: #dec349;">
		<td style="width: 4.78261%; height: 36px; text-align: center;" rowspan="2"><strong>No.</strong></td>
		<td style="width: 27.5181%; height: 36px; text-align: center;" rowspan="2"><strong>Nama Ekskulikuler</strong></td>
		<td style="width: 24.2573%; height: 36px; text-align: center;" rowspan="2"><strong>Keterangan</strong></td>
		<td style="width: 43.442%; text-align: center; height: 18px;" colspan="2"><strong>Nilai Ekstrakulikuler</strong></td>
		</tr>
		<tr style="height: 18px; background-color: #dec349;">
		<td style="width: 13.3877%; text-align: center; height: 18px;"><strong>Nilai</strong></td>
		<td style="width: 30.0543%; text-align: center; height: 18px;"><strong>Deskripsi</strong></td>
		</tr>

		<?php $ekskul = $this->CetakRaport_m->loopingEkskul($masterID, $identitasPD->NIK_pd) ?>
		<?php $no = 1; ?>
		<?php $cekDataEkskul = $ekskul->num_rows(); ?>
		<?php if($cekDataEkskul == 0): ?>
			<tr style="height: 18px;">
			<td style=" height: 45px; text-align: center;" colspan="5">
				<b style="color:red;"><i>Tidak Mengikuti Ekstrakulikuler</i></b>
			</td>
			</tr>
		<?php else: ?>
			<?php foreach ($ekskul->result() as $ekskul): ?>
				<tr style="height: 18px;">
					<td style="width: 4.78261%; height: 18px; text-align: center;"><?= $no++ ?></td>
					<td style="width: 33.5181%; height: 18px;"><?= $ekskul->ekstrakulikuler ?></td>
					<td style="width: 18.2573%; height: 18px; text-align: center;"><?= $ekskul->keterangan ?></td>
					<td style="width: 13.3877%; height: 18px; text-align: center;"><?= $ekskul->nilai_ekskul ?></td>
					<td style="width: 30.0543%; height: 18px; text-align: left;"><?= $ekskul->deskripsi_nilai_ekskul ?></td>
				</tr>
			<?php endforeach ?>
		<?php endif ?>
	</tbody>
</table>

<p><strong>Informasi Kehadiran</strong></p>
<table style="border-collapse: collapse; width: 100%; height: 75px;" border="1">
	<tbody>
		<?php $rekapAbsen = $this->CetakRaport_m->reapitulasiAbsen($identitasPD->NIK_pd, $semester) ?>
		<tr style="height: 40px;">
		<td style="width: 66.5963%; text-align: center; height: 21px; background-color: #dec349;" colspan="4">
			<strong><small>Rekapitulasi Absen Semester <?= $semester ?></small></strong>
		</td>
		</tr>
		<tr style="height: 24px;">
		<td style="width: 15.4226%; height: 10px; text-align: center; background-color: #dec349;">
		<h6>Jumlah Alpa</h6>
		</td>
		<td style="width: 17.7046%; height: 10px; text-align: center; background-color: #dec349;">
		<h6>Jumlah Izin</h6>
		</td>
		<td style="width: 18.0216%; height: 10px; text-align: center; background-color: #dec349;">
		<h6>Jumlah Sakit</h6>
		</td>
		<td style="width: 15.4475%; height: 10px; text-align: center; background-color: #dec349;">
		<h6>Jumlah Terlambat</h6>
		</td>
		</tr>
		<tr style="height: 50px;">
		<td style="width: 15.4226%; height: 50px; text-align: center;">
		<h6><?= $rekapAbsen->jumlah_alpa ?></h6>
		</td>
		<td style="width: 17.7046%; height: 50px; text-align: center;">
		<h6><?= $rekapAbsen->jumlah_izin ?></h6>
		</td>
		<td style="width: 18.0216%; height: 50px; text-align: center;">
		<h6><?= $rekapAbsen->jumlah_sakit ?></h6>
		</td>
		<td style="width: 15.4475%; height: 50px; text-align: center;">
		<h6><?= $rekapAbsen->jumlah_terlambat ?></h6>
		</td>
		</tr>
	</tbody>
</table>
<p>&nbsp;</p>
<table style="height: 108px; width: 100%; border-collapse: collapse;" border="0">
	<tbody>
		<?php $kepalaSekolah = $this->CetakRaport_m->getKepalaSekolah($identitasSekolah->idSekolah) ?>
		<?php $waliKelas = $this->CetakRaport_m->getWaliKelas($masterID) ?>
		<tr style="height: 18px;">
		<td style="width: 33.3333%; height: 18px;">&nbsp;</td>
		<td style="width: 33.3333%; height: 18px;">&nbsp;</td>
		<td style="width: 33.3333%; height: 18px;">Diberikan di : <?= $identitasSekolah->desa_sekolah ?></td>
		</tr>
		<tr style="height: 18px;">
		<td style="width: 33.3333%; height: 18px;">&nbsp;</td>
		<td style="width: 33.3333%; height: 18px;">&nbsp;</td>
		<td style="width: 33.3333%; height: 18px;">Tanggal : <?= date_indo($titimangsa) ?></td>
		</tr>
		<tr style="height: 18px;">
		<td style="width: 33.3333%; height: 18px; text-align: left;">Orang Tua / Wali</td>
		<td style="width: 33.3333%; height: 18px; text-align: left;">Wali Kelas</td>
		<td style="width: 33.3333%; height: 18px;">Kepala Sekolah</td>
		</tr>
		<tr style="height: 18px;">
		<td style="width: 33.3333%; height: 18px;">&nbsp;</td>
		<td style="width: 33.3333%; height: 18px;">&nbsp;</td>
		<td style="width: 33.3333%; height: 18px;">
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		</td>
		</tr>
		<tr style="height: 18px;">
		<td style="width: 33.3333%; height: 18px; text-align: left;"><u>.............................</u></td>
		<td style="width: 33.3333%; height: 18px; text-align: left;">

			<strong><?= $waliKelas->nama_tenpen ?></strong>
		</td>
		<td style="width: 33.3333%; height: 18px;"><strong><?= valueRaport2($kepalaSekolah->nama_tenpen) ?></strong></td>
		</tr>
		<tr style="height: 18px;">
		<td style="width: 33.3333%; height: 18px;"></td>
		<td style="width: 33.3333%; height: 18px;">NIP. <?= valueRaport($waliKelas->NIP) ?></td>
		<td style="width: 33.3333%; height: 18px;">NIP. <?= valueRaport($kepalaSekolah->NIP) ?></td>
		</tr>
	</tbody>
</table>