<?php require_once('template/other/preloader.php'); ?>

<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
    <div class="m-alert__icon">
        <i class="flaticon-exclamation m--font-brand"></i>
    </div>
    <div class="m-alert__text">
        <h6>Selamat Datang Di Aplikasi <b>Fininsys</b> (Financial & Information System)<br>Gunakan Sistem Informasi Ini Dengan Bijak!</h6>
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
                                    Jumlah Tenaga Pendidik : <b><?= $jumlahTenpen ?></b><br>
                                    Alamat Instansi : <b><?= $settings->alamat ?></b>
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
                            Grafik Prosentasi Siswa Kelas
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
                            Prosentasi Siswa Berdasarkan Program Studi
                        </span>
                    </div>
                    <div class="row  align-items-center">
                        <div class="col">
                            <div id="m_chart_profit_share" class="m-widget14__chart" style="height: 160px">
                                
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
<!--End::Section-->



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