<?php $petunjukPenggunaan = $this->CetakRaport_m->kontenHal2('PetunjukPenggunaan') ?>
<?= $petunjukPenggunaan->konten_pengaturan ?>
<?php $keteranganNilai = $this->CetakRaport_m->kontenHal2('KeteranganNilai') ?>
<?= $keteranganNilai->konten_pengaturan ?>
<p><img alt="" src="<?= base_url('assets/image/range_nilai.png') ?>" style="height:243px; width:430px" /></p>