<div id="preloader" class="m-page--loading-enabled m-page--loading">
    <div class="m-page-loader m-page-loader--base">
        <div class="m-blockui">
            <span>Memuat Data. . .</span>
            <span>
                <div class="m-loader m-loader--brand"></div>
            </span>
        </div>
    </div>
</div>
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon">
                    <i class="flaticon-line-graph"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    Master Leger Nilai
                </h3>
            </div>
        </div>
    </div>


    <div class="m-portlet__body">
        <!--begin: Search Form -->
        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="form-group m-form__group row align-items-center">
                        <div class="col-md-4">
                            <div class="m-input-icon m-input-icon--left">
                                <input type="text" class="form-control m-input" placeholder="Pencarian..." id="generalSearch">
                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                    <span><i class="la la-search"></i></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <a href="#" class="btn m-btn--gradient-from-primary m-btn--gradient-to-info m-btn--air m-btn--pill" 
                        data-toggle="modal" data-target="#viewModalSiswa" data-backdrop="static" data-keyboard="true" title="Tambah Data">
                        <span>
                            <i class="la flaticon-add-circular-button"></i>
                            <span>
                                Tambah Master Leger
                            </span>
                        </span>
                    </a>

                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>
        </div>
        <i>*Klik Tombol <b><i class="la la-trash"></i></b> Untuk Mengeuarkan Siswa Dari Kelas</i>
        <!--begin: Datatable -->
        <table class="tabel-masterleger" id="" width="100%">
            <thead>
                <tr>
                    <th data-field="no">#</th>
                    <th data-field="namaPesertaDidik">Nama Peserta Didik</th>
                    <th data-field="jenisKelamin">JK</th>
                    <th data-field="noIdentitas">No. Identitas</th>
                    <th data-field="NIPD">NIPD</th>
                    <th data-field="NISN">NISN</th>
                    <th data-field="sekolah">Sekolah</th>
                    <th data-field="action">Act</th>
                </tr>
            </thead>
            <tbody>

                    <tr data-id=>
                        <td>2</td>
                        <td><b>dsfdf</b></td>
                        <td>dfadfs</td>
                        <td>dfasf</td>
                        <td>sdfsdfa</td>
                        <td>dfasdfaf</td>
                        <td>sdfasdfadf</td>
                        <td align="left" class="m-datatable__cell">
                            <button id="btnKeluar" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" 
                                     title="Hapus" 
                                     data-nama='' data-id=''>   
                                    <i class="la la-trash"></i>                      
                            </button>
                            <i id="loadKeluarKelas"></i>
                        </td>
                    </tr>

            </tbody>
        </table>

        <!--end: Datatable -->
    </div>
</div>

<!--end::Modal-->

<script>
jQuery(document).ready(function() {
      DatatableHtmlTableDemo.init()
      //PortletDraggable.init()
    });
var DatatableHtmlTableDemo = {
    init: function() {
        var e;
        e = $(".tabel-masterleger").mDatatable({
            data: {
                saveState: {
                    cookie: !1
                }
            },
            translate: {
                records: {
                    processing: 'Memuat Data Siswa...',
                    noRecords: 'Belum Terdapat Siswa, Silahkan Tambahkan Siswa Ke Kelas Ini!',
                },
                toolbar: {
                    pagination: {
                        items: {
                            default: {
                                first: 'First',
                                prev: 'Previous',
                                next: 'Next',
                                last: 'Last',
                                more: 'More pages',
                                input: 'Page number',
                                select: 'Jumlah data ditampilkan'
                            },
                            info: 'Menampilkan {{start}} - {{end}} dari {{total}} data'
                        }
                    }
                }
            },

            search: {
                input: $("#generalSearch")
            },
            mobile: {
              layout: 'compact'
            },

            columns: [
                {
                    field: "no",
                    //title: "No.",
                    //locked: {left: 'lg'},
                    //sortable: true,
                    //sortable: 'asc',
                    width: 20,
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "namaPesertaDidik",
                    //title: "Nama Tenaga Pendidik",
                    //locked: {left: 'lg'},
                    sortable: true,
                    //sortable: 'asc',
                    width: 175,
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "jenisKelamin",
                    title: "#",
                    width: 80,
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "noIdentitas",
                    title: "#",
                    width: 135,
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "NIPD",
                    //title: "#",
                    width: 80,
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "NISN",
                    //sortable: 'asc',
                    textAlign: "left",
                    //width: 100,
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "sekolah",
                    //sortable: 'asc',
                    textAlign: "left",
                    width: 200,
                    //responsive: {visible: 'lg'},
                },
                {
                    field: "action",
                    //sortable: 'asc',
                    textAlign: "left",
                    width: 75,
                    //responsive: {visible: 'lg'},
                },
                
            ],

        }), $("#m_form_jk").on("change", function() {
            e.search($(this).val().toLowerCase(), "jenisKelamin")
        }), $("#m_form_jk, .m_selectpicker").selectpicker()
    }
};
</script>