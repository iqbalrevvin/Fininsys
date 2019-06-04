<?php require_once('template/other/preloader.php'); ?>

<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
    <div class="m-alert__icon">
        <i class="flaticon-exclamation m--font-brand"></i>
    </div>
    <div class="m-alert__text">
        <h6>Selamat Datang Di Aplikasi <b>Fininsys</b> (Financial & Information System)<br>Gunakan Sistem Informasi Ini Dengan Bijak!</h6>
        <?= $settings->email_lembaga ?>
    </div>
</div>
<!--Begin::Section-->
<div class="m-portlet">
    <div class="m-portlet__body  m-portlet__body--no-padding">
        <div class="row m-row--no-padding m-row--col-separator-xl">
            <div class="col-xl-4">
                <!--begin:: Widgets/Stats2-1 -->
                <div class="m-widget1">
                    <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                            <div class="col">
                                <h3 class="m-widget1__title">Informasi Lembaga</h3>
                                <span class="m-widget1__desc">
                                    Nama Lembaga : <b><?= $settings->instansi ?></b><br>
                                    Jumlah Sekolah : <b><?= $jumlahSekolah ?></b><br>
                                    Jumlah Program Studi : <b><?= $jumlahProgramStudi ?></b><br>
                                    Jumlah Kelas : <b><?= $jumlahKelas ?></b><br>
                                    Jumlah Peserta Didik : <b><?= $jumlahPDFull ?></b><br>
                                    Peserta Didik Masuk Kelas : <b><?= $jumlahPD ?></b><br>
                                    Peserta Didik Belum Masuk Kelas : <b><?= $PDNullKelas ?></b><br>
                                    Jumlah Tenaga Pendidik : <b><?= $jumlahTenpen ?></b><br>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="m-widget14">
                    <div class="m-widget14__header">
                        <h3 class="m-widget14__title">
                            Prosentasi Siswa
                        </h3>
                        <span class="m-widget14__desc">
                            Grafik Prosentasi Siswa<br>Berdasarkan Kelas
                        </span>
                    </div>
                    <div class="row  align-items-center">
                        <div class="col">
                            <div id="m_chart_revenue_change" class="m-widget14__chart1" style="height: 150px">
                            </div>
                        </div>
                        <div class="col">
                            <div class="m-widget14__legends">
                                <?php $listKelas = $this->Home_m->listKelas(); ?>
                                <?php foreach ($listKelas as $listKelas): ?>
                                    <?php $siswaKelas = $this->Home_m->jumlahKelasPD($listKelas->idKelas) ?>
                                    <?php $prosentasi = ($siswaKelas/$jumlahPD)*100; ?>
                                    <div class="m-widget14__legend">
                                        <span class="m-widget14__legend-bullet m--bg-info"></span>
                                        <span class="m-widget14__legend-text">
                                            <b><?= $listKelas->nama_kelas ?></b> (<?= number_format($prosentasi,1) ?>%)
                                        </span>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/Revenue Change-->
            </div>
            <div class="col-xl-4">

                <!--begin:: Widgets/Profit Share-->
                <div class="m-widget14">
                    <div class="m-widget14__header">
                        <h3 class="m-widget14__title">
                            Prosentasi Siswa Prodi
                        </h3>
                        <span class="m-widget14__desc">
                            Graifk Prosentasi Siswa<br>Berdasarkan Program Studi
                        </span>
                    </div>
                    <div class="row  align-items-center">
                        <div class="col">
                            <div id="m_chart_profit_share" class="m-widget14__chart1" style="height: 150px">
                                
                            </div>
                        </div>
                        <div class="col">
                            <div class="m-widget14__legends">
                                <?php $listProdi = $this->Home_m->listProdi(); ?>
                                <?php foreach ($listProdi as $listProdi): ?>
                                    <?php $siswaProdi = $this->Home_m->jumlahProdiPD($listProdi->idProdi) ?>
                                    <?php $prosentasi = ($siswaProdi/$jumlahPD)*100; ?>
                                    <div class="m-widget14__legend">
                                        <span class="m-widget14__legend-bullet m--bg-accent"></span>
                                        <span class="m-widget14__legend-text">
                                            <?= $listProdi->nama_prodi ?> (<?=number_format($prosentasi)?>%)
                                        </span>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div> 
                    </div>
                </div>

                <!--end:: Widgets/Profit Share-->
            </div>
        </div>
    </div>
</div>
<div class="m-portlet m-portlet--warning m-portlet--head-solid-bg m-portlet--head-sm m-portlet--mobile" m-portlet="true">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon">
                    <i class="flaticon-presentation"></i>
                </span>
                <h4 class="m-portlet__head-text">
                    Google Calendar / Kalender Kegiatan <small>(Pastikan Email Akun Google Di Pengaturan Aplikasi Terisi!)</small>
                </h4>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
               <li class="m-portlet__nav-item">
                    <a href="#" m-portlet-tool="reload" class="m-portlet__nav-link m-portlet__nav-link--icon"
                        data-toggle="modal" data-target="#informasiKalender" data-backdrop="static" 
                        data-keyboard="true" title="Informasi" data-placement="top" data-skin="dark">
                        <i class="flaticon-information"></i></a>
                    </a>
                </li>
     
            </ul>
        </div>
    </div>
    
    <div class="m-portlet__body">
    <?php if ($settings->email_lembaga == NULL): ?>
        <h3>Email Lembaga Belum Terisi!, Silahkan lengkapi email lembaga dengan mengakses <a href="<?= base_url('config/settings') ?>">Konfigurasi->Pengaturan Aplikasi</a>
        </h3>
    <?php else: ?>
        <iframe src="https://calendar.google.com/calendar/embed?src=<?= $settings->email_lembaga ?>&ctz=Asia%2FJakarta" style="border: 0" width="100%" height="500" frameborder="0" scrolling="no"></iframe>
    <?php endif ?>
        
    </div>
</div>
<!--End::Section-->

<!-- MODAL INFORMASI GOOGLE KALENDER -->
<div class="modal fade modalInput" id="informasiKalender" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Informasi Google Kalender</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-remove"></span>
                </button>
            </div>
            <div class="m-portlet m-portlet--mobile" id="kontenTambahPenilaianSiswa">
                <div class="m-portlet__body">
                    <ul>
                        <li>Kalender Kegiatan diadopsi dari <a href="https://calendar.google.com">Google Calendar</a>.</li>
                        <li>Kalender di tautkan dengan akun <a href="gmail.com">Gmail</a> yang ditetapkan pada pengaturan aplikasi.</li>
                        <li>Jika tidak melihat apapun di informasi kalender kegiatan, coba akses fininsys dengan browser <a href="https://www.google.com/chrome/">Google Chrome</a> atau browser versi terbaru.</li>
                        <li>Jika kalender tetap tidak muncul coba untuk melakukan <a href="https://accounts.google.com">Login Akun Google</a> terlebih dahulu.</li>
                        <li>Jika terdapat notifikasi <span class="text-danger"><i>acara dari satu atau beberapa kalender tidak dapat ditampilkan di sini karena Anda tidak memiliki izin untuk melihatnya.</i></span>, cobalah untuk melakukan <b>Konfigurasi</b> google kalender dan atur sebagai <b>Public</b>. <br><a href="https://support.google.com/calendar/answer/37083?hl=id" target="_blank">Panduan Google Kalender Public Access</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /////////////////////////////// -->


<script>
    var Dashboard = function() {
    var e = function(e, t, a, r) {

        },
        t = function() {

            e(), $(document).find('a[data-toggle="pill"]').on("shown.bs.tab", function(t) {
                switch ($(t.target).attr("href")) {
                }
            })
        };
    return {
        init: function() {
            var a, r;
            ! function() {
                var e = $("#m_chart_daily_sales");
            }(), 0 != $("#m_chart_profit_share").length && Morris.Donut({
                    element: "m_chart_profit_share",
                    data: [
                    <?php $listProdi = $this->Home_m->listProdi(); ?>
                    <?php foreach ($listProdi as $listProdi): ?>
                        <?php $siswaProdi = $this->Home_m->jumlahProdiPD($listProdi->idProdi) ?>
                        <?php $prosentasi = ($siswaProdi/$jumlahPD)*100; ?>
                        {label: "<?= $listProdi->singkatan_prodi ?>",value: <?= number_format($prosentasi,1) ?>}, 
                    <?php endforeach ?>
                    ],
                    colors: [
                        mApp.getColor("focus"),
                        mApp.getColor("info"),
                        mApp.getColor("accent"),                      
                        mApp.getColor("warning"),
                        mApp.getColor("success"),
                        mApp.getColor("primary"),
                        mApp.getColor("brand"),
                        mApp.getColor("danger"),
                    ]
                }),
                0 != $("#m_chart_revenue_change").length && Morris.Donut({
                    element: "m_chart_revenue_change",
                    data: [
                    <?php $listKelas = $this->Home_m->listKelas(); ?>
                    <?php foreach ($listKelas as $listKelas): ?>
                        <?php $siswaKelas = $this->Home_m->jumlahKelasPD($listKelas->idKelas) ?>
                        <?php $prosentasi = ($siswaKelas/$jumlahPD)*100; ?>
                        {label: "<?= $listKelas->nama_kelas ?>",value: <?= number_format($prosentasi,1) ?>}, 
                    <?php endforeach ?>
                    ],
                    colors: [
                        mApp.getColor("accent"), 
                        mApp.getColor("danger"), 
                        mApp.getColor("brand"), 
                        mApp.getColor("warning"),
                        mApp.getColor("info"),
                        mApp.getColor("success"),
                        mApp.getColor("primary"),
                        mApp.getColor("focus"),
                    ]
                })
        }
    }
}();
jQuery(document).ready(function() {
    Dashboard.init()
});
</script>