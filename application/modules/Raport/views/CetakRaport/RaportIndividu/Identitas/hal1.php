<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p style="text-align: center;"><strong>Identitas Sekolah</strong></p>
<table style="height: 180px; width: 100%; border-collapse: collapse;" border="0">
<tbody>
<tr style="height: 18px;">
<td style="width: 2.35507%; height: 18px;">1.</td>
<td style="width: 28.2609%; height: 18px;">Nama Yayasan/Lembaga</td>
<td style="width: 2.17385%; height: 18px;">:</td>
<td style="width: 67.2101%; height: 18px;"><?= $pengaturan->instansi ?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 2.35507%; height: 18px;">2.</td>
<td style="width: 28.2609%; height: 18px;">Nama Sekolah</td>
<td style="width: 2.17385%; height: 18px;">:</td>
<td style="width: 67.2101%; height: 18px;"><?= $identitasSekolah->nama_sekolah ?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 2.35507%; height: 18px;">3.</td>
<td style="width: 28.2609%; height: 18px;">Jenjang</td>
<td style="width: 2.17385%; height: 18px;">:</td>
<td style="width: 67.2101%; height: 18px;"><?= $identitasSekolah->jenjang_sekolah ?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 2.35507%; height: 18px;">4.</td>
<td style="width: 28.2609%; height: 18px;">NPSN</td>
<td style="width: 2.17385%; height: 18px;">:</td>
<td style="width: 67.2101%; height: 18px;"><?= $identitasSekolah->npsn ?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 2.35507%; height: 18px;">5.</td>
<td style="width: 28.2609%; height: 18px;">Alamat Sekolah</td>
<td style="width: 2.17385%; height: 18px;">&nbsp;</td>
<td style="width: 67.2101%; height: 18px;">&nbsp;</td>
</tr>
<tr style="height: 18px;">
<td style="width: 2.35507%; height: 18px;">&nbsp;</td>
<td style="width: 28.2609%; height: 18px;">a. Alamat</td>
<td style="width: 2.17385%; height: 18px;">:</td>
<td style="width: 67.2101%; height: 18px;"><?= $identitasSekolah->alamat_sekolah ?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 2.35507%; height: 18px;">&nbsp;</td>
<td style="width: 28.2609%; height: 18px;">b. Desa/Kelurahan</td>
<td style="width: 2.17385%; height: 18px;">:</td>
<td style="width: 67.2101%; height: 18px;"><?= $identitasSekolah->desa_sekolah ?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 2.35507%; height: 18px;">&nbsp;</td>
<td style="width: 28.2609%; height: 18px;">c. Kecamatan</td>
<td style="width: 2.17385%; height: 18px;">:</td>
<td style="width: 67.2101%; height: 18px;"><?= $identitasSekolah->kecamatan_sekolah ?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 2.35507%; height: 18px;">&nbsp;</td>
<td style="width: 28.2609%; height: 18px;">d. Kabupaten/Kota</td>
<td style="width: 2.17385%; height: 18px;">:</td>
<td style="width: 67.2101%; height: 18px;"><?= $identitasSekolah->kabupaten_sekolah ?></td>
</tr>
<tr style="height: 18px;">
<td style="width: 2.35507%; height: 18px;">&nbsp;</td>
<td style="width: 28.2609%; height: 18px;">e. Provinsi</td>
<td style="width: 2.17385%; height: 18px;">:</td>
<td style="width: 67.2101%; height: 18px;"><?= $identitasSekolah->provinsi_sekolah ?></td>
</tr>
</tbody>
</table>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;"><strong>Identitas Peserta Didik</strong></p>
<table style="width: 99.9999%; border-collapse: collapse;" border="0">
<tbody>
<tr>

<td style="width: 2.35507%;">1.</td>
<td style="width: 28.257%;">Nama Peserta Dididk</td>
<td style="width: 2.35515%;">:</td>
<td style="width: 60.0327%;"><?= valueRaport($identitasPD->nama_pd) ?></td>
</tr>
<tr>
<td style="width: 2.35507%;">2.&nbsp;</td>
<td style="width: 28.257%;">No. Identitas/NIK</td>
<td style="width: 2.35515%;">:</td>
<td style="width: 60.0327%;"><?= valueRaport($identitasPD->NIK_pd) ?></td>
</tr>
<tr>
<td style="width: 2.35507%;">3.&nbsp;</td>
<td style="width: 28.257%;">NISN</td>
<td style="width: 2.35515%;">:</td>
<td style="width: 67.0327%;"><?= valueRaport($identitasPD->nisn) ?></td>
</tr>
<tr>
<td style="width: 2.35507%;">4.&nbsp;</td>
<td style="width: 28.257%;">NIPD</td>
<td style="width: 2.35515%;">:</td>
<td style="width: 60.0327%;"><?= valueRaport($identitasPD->nipd) ?></td>
</tr>
<tr>
<td style="width: 2.35507%;">5.</td>
<td style="width: 28.257%;">Tahun Angkatan</td>
<td style="width: 2.35515%;">:</td>
<td style="width: 60.0327%;"><?= valueRaport($identitasPD->tahun_angkatan) ?></td>
</tr>
<tr>
<td style="width: 2.35507%;">6.</td>
<td style="width: 28.257%;">Tingkat</td>
<td style="width: 2.35515%;">:</td>
<td style="width: 60.0327%;"><?= grade($identitasPD->tahun_angkatan, $identitasPD->jumlah_semester) ?></td>
</tr>
<tr>
<td style="width: 2.35507%;">7.</td>
<td style="width: 28.257%;">Program Studi</td>
<td style="width: 2.35515%;">:</td>
<td style="width: 67.0327%;"><?= valueRaport($identitasPD->nama_prodi) ?></td>
</tr>
<tr>
<td style="width: 2.35507%;">8.</td>
<td style="width: 28.257%;">Kelas</td>
<td style="width: 2.35515%;">:</td>
<td style="width: 60.0327%;"><?= valueRaport($identitasPD->nama_kelas) ?></td>
</tr>
<tr>
<td style="width: 2.35507%;">9.</td>
<td style="width: 28.257%;">Tempat Tanggal Lahir</td>
<td style="width: 2.35515%;">:</td>
<td style="width: 60.0327%;"><?= valueRaport($identitasPD->tempat_lahir_pd) ?>, <?= date_indo($identitasPD->tanggal_lahir_pd) ?></td>
</tr>
<tr>
<td style="width: 2.35507%;">10.&nbsp;</td>
<td style="width: 28.257%;">Jenis Kelamin</td>
<td style="width: 2.35515%;">:</td>
<td style="width: 60.0327%;"><?= valueRaport($identitasPD->jk_pd) ?></td>
</tr>
<tr>
<td style="width: 2.35507%;">11.</td>
<td style="width: 28.257%;">Agama</td>
<td style="width: 2.35515%;">:</td>
<td style="width: 60.0327%;"><?= valueRaport($identitasPD->agama) ?></td>
</tr>
<tr>
<td style="width: 2.35507%;">12.</td>
<td style="width: 28.257%;">No. Telp/Hp</td>
<td style="width: 2.35515%;">:</td>
<td style="width: 60.0327%;"><?= valueRaport($identitasPD->no_telp_pd) ?></td>
</tr>
<tr>
<td style="width: 2.35507%;">13.</td>
<td style="width: 28.257%;">Nama Orang Tua</td>
<td style="width: 2.35515%;">&nbsp;</td>
<td style="width: 67.0327%;">&nbsp;</td>
</tr>
<tr>
<td style="width: 2.35507%;">&nbsp;</td>
<td style="width: 28.257%;">a. Ayah</td>
<td style="width: 2.35515%;">:</td>
<td style="width: 60.0327%;"><?= valueRaport($identitasPD->nama_ayah) ?></td>
</tr>
<tr>
<td style="width: 2.35507%;">&nbsp;</td>
<td style="width: 28.257%;">b. Ibu</td>
<td style="width: 2.35515%;">:</td>
<td style="width: 60.0327%;"><?= valueRaport($identitasPD->nama_ibu) ?></td>
</tr>
<tr>
<td style="width: 2.35507%;">14.</td>
<td style="width: 28.257%;">Pekerjaan Orang Tua</td>
<td style="width: 2.35515%;">&nbsp;</td>
<td style="width: 60.0327%;">&nbsp;</td>
</tr>
<tr>
<td style="width: 2.35507%;">&nbsp;</td>
<td style="width: 28.257%;">a. Ayah</td>
<td style="width: 2.35515%;">:</td>
<td style="width: 67.0327%;"><?= valueRaport($identitasPD->pekerjaan_ayah) ?></td>
</tr>
<tr>
<td style="width: 2.35507%;">&nbsp;</td>
<td style="width: 28.257%;">b. Ibu</td>
<td style="width: 2.35515%;">:</td>
<td style="width: 60.0327%;"><?= valueRaport($identitasPD->pekerjaan_ibu) ?></td>
</tr>

</tbody>
</table>
<p>&nbsp;</p>
<table style="height: 208px; width: 100%; border-collapse: collapse;" border="0">
<tbody>
<tr style="height: 18px;">
<td style="width: 10.4929%; height: 240px;" rowspan="6">
	<img style="float: left;" src="assets/image/foto-raport.png" alt="" width="115" height="150" />
</td>

<td style="width: 33.3333%; height: 18px;">&nbsp;</td>
<td style="width: 45.3333%; height: 18px;">Garut, <?= $titimangsa ?></td>
</tr>
<tr style="height: 18px;">

<td style="width: 33.3333%; height: 18px;">&nbsp;</td>
<td style="width: 45.3333%; height: 18px;">Kepala Sekolah,</td>
</tr>

<tr style="height: 26px;">

<td style="width: 33.3333%; height: 26px;">&nbsp;</td>
<td style="width: 45.3333%; height: 26px;"><?= $identitasSekolah->nama_sekolah ?></td>
</tr>
<tr style="height: 110px;">

<td style="width: 33.3333%; height: 90px;">&nbsp;</td>
<td style="width: 45.3333%; height: 90px;">&nbsp;</td>
</tr>
<tr style="height: 18px;">
<?php $kepalaSekolah = $this->CetakRaport_m->getKepalaSekolah($identitasSekolah->idSekolah) ?>

<td style="width: 33.3333%; height: 18px;">&nbsp;</td>
<td style="width: 45.3333%; height: 18px;"><b><?= valueRaport2($kepalaSekolah->nama_tenpen) ?></b></td>
</tr>
<tr style="height: 18px;">

<td style="width: 33.3333%; height: 18px;">&nbsp;</td>
<td style="width: 45.3333%; height: 18px;">NIP. <?= valueRaport($kepalaSekolah->NIP) ?></td>
</tr>
</tbody>
</table>
</body>
</html>