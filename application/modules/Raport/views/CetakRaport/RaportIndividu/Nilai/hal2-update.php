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

<p><strong>Informasi Nilai Prilaku</strong></p>
<table style="border-collapse: collapse; width: 100%; height: 72px;" border="1">
	<tbody>
		<tr style="height: 18px; background-color: #dec349;">
		<td style="width: 5.59783%; height: 36px; text-align: center;" rowspan="2"><strong>No.</strong></td>
		<td style="width: 42.1739%; height: 36px; text-align: center;" rowspan="2"><strong>Mata Pelajaran</strong></td>
		<td style="width: 47.2283%; text-align: center; height: 18px;" colspan="3"><strong>Nilai Prilaku</strong></td>
		</tr>
		<tr style="height: 18px; background-color: #dec349;">
		<td style="width: 8.4602%; text-align: center; height: 18px;"><strong>Sikap</strong></td>
		<td style="width: 15.0181%; text-align: center; height: 18px;" colspan="2"><strong>Catatan Guru</strong></td>
		<!-- <td style="width: 13.75%; text-align: center; height: 18px;"><strong>Spiritual</strong></td> -->
		</tr>
		<?php $kelompokMapel = $this->CetakRaport_m->loopingKelompokMapel($masterID) ?>
		<?php foreach ($kelompokMapel as $listKelompok): ?>
			<tr style="height: 18px; background-color: #dec349;">
				<td style="width: 100%; height: 18px;" colspan="5"><strong><?= $listKelompok->nama_kelompok_mapel ?></strong></td>
			</tr>
			<?php $mapel = $this->CetakRaport_m->loopingMapel($listKelompok->idKelompok_mapel, $masterID, $identitasPD->NIK_pd) ?>
			<?php $no = 1; ?>
			<?php foreach ($mapel as $listMapel): ?>
				<tr style="height: 18px;">
					<td style="width: 5.59783%; height: 18px; text-align: center;"><?= $no++ ?>.</td>
					<td style="width: 42.1739%; height: 18px;"><?= $listMapel->nama_mata_pelajaran ?></td>
					<td style="width: 8.4602%; height: 18px; text-align: center;"><?= $listMapel->nilai_sikap ?></td>
					<td style="width: 15.0181%; height: 18px; text-align: left;" colspan="2">
						<p><small><?= catatanGuruMapel($listMapel->catatan) ?></small></p>
					</td>
					<!-- <td style="width: 13.75%; height: 18px; text-align: center;"><?= $listMapel->nilai_spritual ?></td> -->
				</tr>
			<?php endforeach; ?>
		<?php endforeach; ?>
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