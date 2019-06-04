<div style="text-align: center;">
    <img src="<?= base_url('assets/image/logo-garuda.png') ?>" style="width: 178.628px; height: 192.625px;">
</div>
<h1 style="text-align: center;">
	LAPORAN HASIL BELAJAR SISWA
</h1>
<h2 style="text-align: center;">
	<?= $pengaturan->instansi ?><br>
	<small><?= $identitasSekolah->nama_sekolah ?></small>
</h2>

<p style="text-align: center;">
    <br>
</p>

<p style="text-align: center;">
	<!-- <img src="http://localhost/Fininsys/assets/image/logosekolah/5e18e-logo-smp-baru.jpg" style="width: 203.378px; height: 205.688px;"> -->
	<img src="<?= base_url('assets/image/logosekolah/'.$identitasSekolah->logo_sekolah) ?>" style="width: 203.378px; height: 205.688px;">
    <br>
</p>
<p style="text-align: center;">
    <br>
</p>
<p style="text-align: center; font-size: 20px">
	Nama Peserta Didik
	<br>
	<b><?= $identitasPD->nama_pd ?></b>
</p>
<p style="text-align: center; font-size: 20px">
	No. Induk
	<br>
	<b><?= $identitasPD->nipd ?></b>
</p>

<p style="text-align: center;">
    <br>
</p>
<p style="text-align: center;">
    <br>
</p>
<p style="text-align: center; font-size: 15px">
	<?= $pengaturan->instansi ?><br>
	<?= $identitasSekolah->nama_sekolah ?><br>
	<?= $identitasSekolah->alamat_sekolah ?> Ds./Kel. <?= $identitasSekolah->desa_sekolah ?><br>
	Kec. <?= $identitasSekolah->kecamatan_sekolah ?> Kab/Kota <?= $identitasSekolah->kabupaten_sekolah ?><br>
	Prov. <?= $identitasSekolah->provinsi_sekolah ?><br>
	<?= date("Y",strtotime($titimangsa)) ?>

</p>
