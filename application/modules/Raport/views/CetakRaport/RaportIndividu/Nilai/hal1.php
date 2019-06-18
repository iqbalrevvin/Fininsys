<!DOCTYPE html>
<html>
<head>
</head>
<body>
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
<table style="border-collapse: collapse; width: 100.075%; height: 144px;" border="1">
<tbody>
<tr style="height: 18px; background-color: #dec349;">
<td style="width: 2.93555%; height: 36px; text-align: center;" rowspan="2"><strong>No.</strong></td>
<td style="width: 31.4222%; height: 36px; text-align: center;" rowspan="2"><strong>Mata Pelajaran</strong></td>

<td style="width: 29.2391%; height: 18px; text-align: center;" colspan="3"><strong>Pengetahuan</strong></td>
<td style="width: 27.9036%; height: 18px; text-align: center;" colspan="3"><strong>Keterampilan</strong></td>
</tr>
<tr style="height: 18px; background-color: #dec349;">
<td style="width: 9.42381%; height: 18px; text-align: center;"><strong>KKM</strong></td>
<td style="width: 9.42381%; height: 18px; text-align: center;"><strong>Angka</strong></td>
<!-- <td style="width: 7.7734%; text-align: center; height: 18px;"><strong>IP</strong></td> -->
<td style="width: 12.0419%; height: 18px; text-align: center;"><strong>Predikat</strong></td>
<td style="width: 9.42381%; height: 18px; text-align: center;"><strong>KKM</strong></td>
<td style="width: 8.68191%; height: 18px; text-align: center;"><strong>Angka</strong></td>
<!-- <td style="width: 7.0315%; text-align: center; height: 18px;"><strong>IP</strong></td> -->
<td style="width: 12.1902%; height: 18px; text-align: center;"><strong>Predikat</strong></td>
</tr>
<?php $kelompokMapel = $this->CetakRaport_m->loopingKelompokMapel($masterID) ?>
<?php foreach ($kelompokMapel as $listKelompok): ?>
	<tr style="height: 18px; background-color: #dec349;">
		<td style="width: 99.9998%; height: 18px;" colspan="8"><strong><?= $listKelompok->nama_kelompok_mapel ?></strong></td>
	</tr>
	<?php $mapel = $this->CetakRaport_m->loopingMapel($listKelompok->idKelompok_mapel, $masterID, $identitasPD->NIK_pd) ?>
	<?php $no = 1; ?>
	<?php foreach ($mapel as $listMapel): ?>
		<?php $kkmPengetahuan = $listMapel->kkm_pengetahuan ?>
		<?php $nilaiPengetahuan = $listMapel->nilai_pengetahuan ?>
		<?php $kkmKeterampilan = $listMapel->kkm_pengetahuan ?>
		<?php $nilaiKeterampilan = $listMapel->nilai_keterampilan ?>
		<tr style="height: 18px;">
		<td style="width: 2.93555%; height: 18px; text-align: center;"><?= $no++ ?>.</td>
		<td style="width: 31.4222%; height: 18px;"><?= $listMapel->nama_mata_pelajaran ?></td>
		<td style="width: 8.49935%; height: 18px; text-align: center;"><?= $listMapel->kkm_pengetahuan ?></td>
		<td style="width: 9.42381%; height: 18px; text-align: center;">
			<?= nilai($kkmPengetahuan, $nilaiPengetahuan) ?>
		</td>
		<!-- <td style="width: 7.7734%; text-align: center; height: 18px;"><b><?= nilaiIP($nilaiPengetahuan) ?></b></td> -->
		<td style="width: 12.0419%; height: 18px; text-align: center;"><?= nilaiPredikat(nilaiIP($nilaiPengetahuan)) ?></td>
		<td style="width: 8.49935%; height: 18px; text-align: center;"><?= $listMapel->kkm_keterampilan ?></td>
		<td style="width: 8.68191%; height: 18px; text-align: center;">
			<?= nilai($kkmKeterampilan, $nilaiKeterampilan) ?>
		</td>
		<!-- <td style="width: 7.0315%; text-align: center; height: 18px;"><b><?= nilaiIP($nilaiKeterampilan) ?></b></td> -->
		<td style="width: 12.1902%; height: 18px; text-align: center;"><?= nilaiPredikat(nilaiIP($nilaiKeterampilan)) ?></td>
		</tr>
	<?php endforeach ?>
<?php endforeach ?>

<?php $raportModel          = $this->Raport_m; ?>
<?php $countMapel 			= $raportModel->countMapel($masterID, $identitasPD->NIK_pd); ?>
<?php $jmlNilaiPengetahuan 	= $raportModel->sumNilaiPengetahuan($masterID, $identitasPD->NIK_pd); ?>
<?php $jmlNilaiKeterampilan = $raportModel->sumNilaiKeterampilan($masterID, $identitasPD->NIK_pd); ?>
<?php $jumlahSeluruh 		= $jmlNilaiPengetahuan->nilai_pengetahuan+$jmlNilaiKeterampilan->nilai_keterampilan; ?>
<?php $rerata = $jumlahSeluruh/($countMapel*2); ?>
<!-- PERINGKAT KELAS -->
<?php $sumNilaiKelas = $this->Raport_m->sumNilaiKelas($masterID); ?>
<?php foreach ($sumNilaiKelas as $data): ?>
	<?php $sumNilaiPengetahuan = $data->nilai_pengetahuan ?>
	<?php $sumNilaiKeterampilan = $data->nilai_keterampilan ?>
	<?php $nilaiKelas[] = $sumNilaiPengetahuan+$sumNilaiKeterampilan ?>
<?php endforeach ?>
<?php $nilaiAkhir 			= $jmlNilaiPengetahuan->nilai_pengetahuan+$jmlNilaiKeterampilan->nilai_keterampilan; ?>
<?php $valueArray 			= implode(',',$nilaiKelas); ?>
<?php $rank 				= $this->Raport_m->rankSystem($nilaiAkhir, "'$valueArray'");  ?>
<!-- //////////////////////////////////////////////////// -->

<tr style="height: 18px;">
<td style="width: 42.8571%; background-color: #dec349; height: 18px;" colspan="2"><strong>Jumlah</strong></td>
<td style="text-align: center; width: 29.2391%; height: 18px;" colspan="3">
	<strong><?= value($jmlNilaiPengetahuan->nilai_pengetahuan); ?></strong>
</td>
<td style="text-align: center; width: 27.9036%; height: 18px;" colspan="3">
	<strong><?= value($jmlNilaiKeterampilan->nilai_keterampilan); ?></strong>
</td>
</tr>
<tr style="height: 18px;">
<td style="width: 42.8571%; background-color: #dec349; height: 18px;" colspan="2"><strong>Jumlah Nilai Keseluruhan</strong></td>
<td style="text-align: center; width: 57.1427%; height: 18px;" colspan="6"><strong><?= $jumlahSeluruh ?></strong></td>
</tr>
<tr style="height: 18px;">
<td style="width: 42.8571%; background-color: #dec349; height: 18px;" colspan="2"><strong>Rata-Rata Nilai/IP</strong></td>
<td style="text-align: center; width: 57.1427%; height: 18px;" colspan="6">
	<strong><?= number_format($rerata,1) ?> | <?= nilaiIP($rerata) ?></strong>
</td>
</tr>
<tr style="height: 18px;">
<td style="width: 42.8571%; background-color: #dec349; height: 18px;" colspan="2"><strong>Peringkat</strong></td>
<td style="width: 57.1427%; text-align: center; height: 18px;" colspan="6">
	<strong>Peringkat <?= $rank->rank ?> Dari <?= count($nilaiKelas) ?> Peserta Didik</strong>
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
</body>
</html>