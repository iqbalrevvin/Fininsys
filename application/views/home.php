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
                                    Alamat Instansi : <b><?= $settings->alamat ?></b>
                                </span>
                            </div>
                            <!-- <div class="col m--align-right">
                                <span class="m-widget1__number m--font-brand">+$17,800</span>
                            </div> -->
                        </div>
                    </div>
                  <!--   <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                            <div class="col">
                                <h3 class="m-widget1__title">Tenaga Pendidik</h3>
                                <span class="m-widget1__desc">Jumlah Tenaga Didik<br><?= $settings->instansi ?></span>
                            </div>
                            <div class="col m--align-right">
                                <span class="m-widget1__number m--font-danger">+1,800</span>
                            </div>
                        </div>
                    </div>
                    <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                            <div class="col">
                                <h3 class="m-widget1__title">Issue Reports</h3>
                                <span class="m-widget1__desc">System bugs and issues</span>
                            </div>
                            <div class="col m--align-right">
                                <span class="m-widget1__number m--font-success">-27,49%</span>
                            </div>
                        </div>
                    </div> -->
                </div>

                <!--end:: Widgets/Stats2-1 -->
            </div>
            <div class="col-xl-4">

                <!--begin:: Widgets/Revenue Change-->
                <div class="m-widget14">
                    <div class="m-widget14__header">
                        <h3 class="m-widget14__title">
                            Revenue Change
                        </h3>
                        <span class="m-widget14__desc">
                            Revenue change breakdown by cities
                        </span>
                    </div>
                    <div class="row  align-items-center">
                        <div class="col">
                            <div id="m_chart_revenue_change" class="m-widget14__chart1" style="height: 200px">
                            </div>
                        </div>
                        <div class="col">
                            <div class="m-widget14__legends">
                                <div class="m-widget14__legend">
                                    <span class="m-widget14__legend-bullet m--bg-accent"></span>
                                    <span class="m-widget14__legend-text">+10% New York123</span>
                                </div>
                                <div class="m-widget14__legend">
                                    <span class="m-widget14__legend-bullet m--bg-warning"></span>
                                    <span class="m-widget14__legend-text">-7% London</span>
                                </div>
                                <div class="m-widget14__legend">
                                    <span class="m-widget14__legend-bullet m--bg-brand"></span>
                                    <span class="m-widget14__legend-text">+20% California</span>
                                </div>
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
                            Profit Share
                        </h3>
                        <span class="m-widget14__desc">
                            Profit Share between customers
                        </span>
                    </div>
                    <div class="row  align-items-center">
                        <div class="col">
                            <div id="m_chart_profit_share" class="m-widget14__chart" style="height: 160px">
                                <div class="m-widget14__stat">45</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="m-widget14__legends">
                                <div class="m-widget14__legend">
                                    <span class="m-widget14__legend-bullet m--bg-accent"></span>
                                    <span class="m-widget14__legend-text">37% Sport Tickets</span>
                                </div>
                                <div class="m-widget14__legend">
                                    <span class="m-widget14__legend-bullet m--bg-warning"></span>
                                    <span class="m-widget14__legend-text">47% Business Events</span>
                                </div>
                                <div class="m-widget14__legend">
                                    <span class="m-widget14__legend-bullet m--bg-brand"></span>
                                    <span class="m-widget14__legend-text">19% Others</span>
                                </div>
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
<!--Begin::Section-->
<div class="row">
<div class="col-xl-6">

    <!--begin:: Widgets/Tasks -->
    <div class="m-portlet m-portlet--full-height ">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Tasks
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget2_tab1_content" role="tab">
                            Today
                        </a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget2_tab2_content1" role="tab">
                            Week
                        </a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget2_tab3_content1" role="tab">
                            Month
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="tab-content">
                <div class="tab-pane active" id="m_widget2_tab1_content">
                    <div class="m-widget2">
                        <div class="m-widget2__item m-widget2__item--primary">
                            <div class="m-widget2__checkbox">
                                <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                    <input type="checkbox">
                                    <span></span>
                                </label>
                            </div>
                            <div class="m-widget2__desc">
                                <span class="m-widget2__text">
                                    Make Metronic Great Again.Lorem Ipsum Amet
                                </span><br>
                                <span class="m-widget2__user-name">
                                    <a href="#" class="m-widget2__link">
                                        By Bob
                                    </a>
                                </span>
                            </div>
                            <div class="m-widget2__actions">
                                <div class="m-widget2__actions-nav">
                                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                        <a href="#" class="m-dropdown__toggle">
                                            <i class="la la-ellipsis-h"></i>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav">
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                                    <span class="m-nav__link-text">Activity</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                    <span class="m-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                                    <span class="m-nav__link-text">FAQ</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                    <span class="m-nav__link-text">Support</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget2__item m-widget2__item--warning">
                            <div class="m-widget2__checkbox">
                                <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                    <input type="checkbox">
                                    <span></span>
                                </label>
                            </div>
                            <div class="m-widget2__desc">
                                <span class="m-widget2__text">
                                    Prepare Docs For Metting On Monday
                                </span><br>
                                <span class="m-widget2__user-name">
                                    <a href="#" class="m-widget2__link">
                                        By Sean
                                    </a>
                                </span>
                            </div>
                            <div class="m-widget2__actions">
                                <div class="m-widget2__actions-nav">
                                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                        <a href="#" class="m-dropdown__toggle">
                                            <i class="la la-ellipsis-h"></i>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav">
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                                    <span class="m-nav__link-text">Activity</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                    <span class="m-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                                    <span class="m-nav__link-text">FAQ</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                    <span class="m-nav__link-text">Support</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget2__item m-widget2__item--brand">
                            <div class="m-widget2__checkbox">
                                <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                    <input type="checkbox">
                                    <span></span>
                                </label>
                            </div>
                            <div class="m-widget2__desc">
                                <span class="m-widget2__text">
                                    Make Widgets Great Again.Estudiat Communy Elit
                                </span><br>
                                <span class="m-widget2__user-name">
                                    <a href="#" class="m-widget2__link">
                                        By Aziko
                                    </a>
                                </span>
                            </div>
                            <div class="m-widget2__actions">
                                <div class="m-widget2__actions-nav">
                                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                        <a href="#" class="m-dropdown__toggle">
                                            <i class="la la-ellipsis-h"></i>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav">
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                                    <span class="m-nav__link-text">Activity</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                    <span class="m-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                                    <span class="m-nav__link-text">FAQ</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                    <span class="m-nav__link-text">Support</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget2__item m-widget2__item--success">
                            <div class="m-widget2__checkbox">
                                <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                    <input type="checkbox">
                                    <span></span>
                                </label>
                            </div>
                            <div class="m-widget2__desc">
                                <span class="m-widget2__text">
                                    Make Metronic Great Again.Lorem Ipsum
                                </span><br>
                                <span class="m-widget2__user-name">
                                    <a href="#" class="m-widget2__link">
                                        By James
                                    </a>
                                </span>
                            </div>
                            <div class="m-widget2__actions">
                                <div class="m-widget2__actions-nav">
                                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                        <a href="#" class="m-dropdown__toggle">
                                            <i class="la la-ellipsis-h"></i>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav">
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                                    <span class="m-nav__link-text">Activity</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                    <span class="m-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                                    <span class="m-nav__link-text">FAQ</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                    <span class="m-nav__link-text">Support</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget2__item m-widget2__item--danger">
                            <div class="m-widget2__checkbox">
                                <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                    <input type="checkbox">
                                    <span></span>
                                </label>
                            </div>
                            <div class="m-widget2__desc">
                                <span class="m-widget2__text">
                                    Completa Financial Report For Emirates Airlines
                                </span><br>
                                <span class="m-widget2__user-name">
                                    <a href="#" class="m-widget2__link">
                                        By Bob
                                    </a>
                                </span>
                            </div>
                            <div class="m-widget2__actions">
                                <div class="m-widget2__actions-nav">
                                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                        <a href="#" class="m-dropdown__toggle">
                                            <i class="la la-ellipsis-h"></i>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav">
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                                    <span class="m-nav__link-text">Activity</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                    <span class="m-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                                    <span class="m-nav__link-text">FAQ</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                    <span class="m-nav__link-text">Support</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget2__item m-widget2__item--info">
                            <div class="m-widget2__checkbox">
                                <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                    <input type="checkbox">
                                    <span></span>
                                </label>
                            </div>
                            <div class="m-widget2__desc">
                                <span class="m-widget2__text">
                                    Completa Financial Report For Emirates Airlines
                                </span><br>
                                <span class="m-widget2__user-name">
                                    <a href="#" class="m-widget2__link">
                                        By Sean
                                    </a>
                                </span>
                            </div>
                            <div class="m-widget2__actions">
                                <div class="m-widget2__actions-nav">
                                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                        <a href="#" class="m-dropdown__toggle">
                                            <i class="la la-ellipsis-h"></i>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav">
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                                    <span class="m-nav__link-text">Activity</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                    <span class="m-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                                    <span class="m-nav__link-text">FAQ</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                    <span class="m-nav__link-text">Support</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="m_widget2_tab2_content">
                </div>
                <div class="tab-pane" id="m_widget2_tab3_content">
                </div>
            </div>
        </div>
    </div>

    <!--end:: Widgets/Tasks -->
</div>
<div class="col-xl-6">

    <!--begin:: Widgets/Support Tickets -->
    <div class="m-portlet m-portlet--full-height ">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Support Tickets
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                        <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl m-dropdown__toggle">
                            <i class="la la-ellipsis-h m--font-brand"></i>
                        </a>
                        <div class="m-dropdown__wrapper">
                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                            <div class="m-dropdown__inner">
                                <div class="m-dropdown__body">
                                    <div class="m-dropdown__content">
                                        <ul class="m-nav">
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                    <span class="m-nav__link-text">Activity</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                    <span class="m-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                    <span class="m-nav__link-text">FAQ</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                    <span class="m-nav__link-text">Support</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="m-widget3">
                <div class="m-widget3__item">
                    <div class="m-widget3__header">
                        <div class="m-widget3__user-img">
                            <img class="m-widget3__img" src="<?= base_url('assets/image/users/user2.jpg') ?>" alt="">
                        </div>
                        <div class="m-widget3__info">
                            <span class="m-widget3__username">
                                Melania Trump
                            </span><br>
                            <span class="m-widget3__time">
                                2 day ago
                            </span>
                        </div>
                        <span class="m-widget3__status m--font-info">
                            Pending
                        </span>
                    </div>
                    <div class="m-widget3__body">
                        <p class="m-widget3__text">
                            Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
                        </p>
                    </div>
                </div>
                <div class="m-widget3__item">
                    <div class="m-widget3__header">
                        <div class="m-widget3__user-img">
                            <img class="m-widget3__img" src="<?= base_url('assets/image/users/user4.jpg') ?>" alt="">
                        </div>
                        <div class="m-widget3__info">
                            <span class="m-widget3__username">
                                Lebron King James
                            </span><br>
                            <span class="m-widget3__time">
                                1 day ago
                            </span>
                        </div>
                        <span class="m-widget3__status m--font-brand">
                            Open
                        </span>
                    </div>
                    <div class="m-widget3__body">
                        <p class="m-widget3__text">
                            Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.Ut wisi enim ad minim veniam,quis nostrud exerci tation ullamcorper.
                        </p>
                    </div>
                </div>
                <div class="m-widget3__item">
                    <div class="m-widget3__header">
                        <div class="m-widget3__user-img">
                            <img class="m-widget3__img" src="<?= base_url('assets/image/users/user5.jpg') ?>" alt="">
                        </div>
                        <div class="m-widget3__info">
                            <span class="m-widget3__username">
                                Deb Gibson
                            </span><br>
                            <span class="m-widget3__time">
                                3 weeks ago
                            </span>
                        </div>
                        <span class="m-widget3__status m--font-success">
                            Closed
                        </span>
                    </div>
                    <div class="m-widget3__body">
                        <p class="m-widget3__text">
                                DSFADFADFASDGDFGSDFGSFGSDF TAI
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end:: Widgets/Support Tickets -->
</div>
</div>
<!--End::Section-->
<script src="<?= base_url('assets/js/dashboard.js') ?>" type="text/javascript"></script>