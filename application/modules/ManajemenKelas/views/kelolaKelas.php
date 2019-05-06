
<div id="resultKonten">
    <div class="m-blockui" id="loader-center">
        <span>Memuat Data Kelas <?= $kelas->nama_kelas ?>. .</span>
        <span>
            <div class="m-loader m-loader--brand"></div>
        </span>
    </div>
</div>

<!--begin::Modal TAMBAH SISWA KELAS-->
<div class="modal fade" id="viewModalSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">
                    <i>Pilih Siswa Lalu Klik Tombol</i> <b class="text-info"><i class="la la-plus"></i> Tambahkan</b>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-portlet m-portlet--mobile" id="kontenTambahSiswa">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Daftar Siswa
                            </h3>
                        </div>
                    </div>

                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <button type="button" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air" id="btnTambahSiswa">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>Tambahkan</span>
                                    </span>
                                </a>
                            </li>
                            <li class="m-portlet__nav-item">
                                <button type="button" class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--air" 
                                    id="reloadTabelPilihSiswa">
                                    <span>
                                        <i class="flaticon-refresh"></i>
                                        <span>Muat Ulang</span>
                                    </span>
                                </button>
                            </li>


                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="tabelPilihSiswa">
                        <thead>
                            <tr>
                                <th>
                                    <label class="m-checkbox m-checkbox--bold m-checkbox--state-success">
                                        <input type="checkbox" id="check-all"><small>Pilih Semua</small>
                                            <span></span>
                                    </label>
                                </th>
                                <th>Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>NIPD</th>
                                <th>NISN</th>
                                <th>Sekolah</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>

<input type="hidden" id="dataID" value="<?= $kelas->idKelas ?>"></input>
<input type="hidden" id="namaKelas" value="<?= $kelas->nama_kelas ?>"></input>

<script>
	$(document).ready(function() {
		kontenView()
		DatatablesBasicPaginations.init()
		function kontenView(){
			var DatatableHtmlTableDemo = {
	            init: function() {
	                var e;
	                e = $(".siswakelas-datatable").mDatatable({
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

          var id = $('#dataID').val();
          $.ajax({
              url: '<?= base_url('ManajemenKelas/KelolaKelas/getKontenKelolaKelas') ?>',
              type: 'POST',
              async: true,
              data:{
                  ID : id,
                  show: 1
              },
              success: function(response){
                  $('#resultKonten').html(response);
                  DatatableHtmlTableDemo.init()
                  //$("#jenisNasabah").selectpicker();
              }
          });
        } 


        /*TOMBOL RELOAD*/
        $(document).on('click', '#reloadTabel', function(e) {
        	kontenView().load();
    	});
    	/*---------------*/
    	/*TOMBOL RELOAD TABEL PILIH SISWA*/
        $(document).on('click', '#reloadTabelPilihSiswa', function(e) {
        	 tabel.ajax.reload(null,false); //reload datatable ajax 
    	});
    	/*---------------*/
    	//TOMBOL DELETE TENAGA PENDIDIK
	    $(document).on('click', '#btnKeluar', function() {
	        $id     = $(this).data('id');
	        $nama 	= $(this).data('nama');
	        //$noIdnt = $(this).data('idnt');
	        $("#loadKeluarKelas"+$id).html("<img src='<?= base_url('assets/image/loading.gif') ?>' width='35' height='35'>");
	        //$('#loadKeluarKelas'+$id).show();
	        $.ajax({
	            type: "POST",
	            url: '<?= base_url('ManajemenKelas/KelolaKelas/keluarKelas') ?>',
	            async: true,
	            data: {
	                NIK_pd 			: $id,
	                keluar    		: 1
	            },
	            success: function(){
	                /*swal("Deleted!", "Data Tenaga Pendidik Bernama : \""+$tenpen+"\" Berhasil di Hapus", "success");*/
	                toastr.error("\""+$nama+"\" Berhasil Dikeluarkan Dari Kelas ", "Keluar Dari Kelas");
	                $("tr[data-id='"+$id+"']").fadeOut("fast",function(){
						    $(this).remove();
					     });
	                $("#loadKeluarKelas").hide();
	            }
	        });
		});

		/*TOMBOL TAMBAH SISWA KE KELAS*/
    	$(document).on('click', '#btnTambahSiswa', function() {
    		var namaKelas 	= $('#namaKelas').val();
    		var idKelas 	= $('#dataID').val();
    		var list_id = [];
    		$(".data-check:checked").each(function() {
            	list_id.push(this.value);
    		});
    		if(list_id.length > 0){
	    		swal({
			        title: "KONFIRMASI TINDAKAN!",
			        text: +list_id.length+" Data Siswa Akan Dimasukan Kedalam Kelas "+namaKelas,
			        type: "info",
			        showCancelButton: true,
			        confirmButtonColor: "#DD6B55",
			        confirmButtonText: "Ya, Lanjutkan!",
			        cancelButtonText: "Tidak, Kembali!",

	    		}).then((result) => {
	      			if(result.value) {
	        			mApp.block("#kontenTambahSiswa", {
				          overlayColor: "#000000",
				          type: "loader",
				          state: "primary",
				          message: "<b>Menambakan Data Siswa Ke Kelas "+namaKelas+"...</b>"
				      	});
	        			$.ajax({
			                type: "POST",
			                data: {
			                	id:list_id,
			                	kelasID:idKelas
			                },
			                url: "<?php echo site_url('ManajemenKelas/KelolaKelas/tambahSiswaKelas')?>",
			                dataType: "JSON",
			                success: function(data)
			                {

			                    if(data.status){
			                    	mApp.unblock("#kontenTambahSiswa");
			                    	/*$('#viewModalSiswa').modal('hide');
			                    	$('#modalwindow').modal('hide');*/
			                    	tabel.ajax.reload(null,false); //reload datatable ajax 
			                        kontenView();
			                        toastr.success("Siswa Berhasil Ditambahkan Ke Kelas "+namaKelas, "Siswa Ditambahkan");
			                    }
			                    else{
			                        alert('Gagal Memproses Data, Muat Ulang Halaman Lalu Coba Kembali!');
			                        mApp.unblock("#kontenTambahSiswa");
			                    }
			                    
			                },
			                error: function (jqXHR, textStatus, errorThrown){
			                    alert('Gagal Memproses Data, Coba Kembali Atau Hubungi Pihak Pengembang!');
			                    mApp.unblock("#kontenTambahSiswa");
			                }
			            });
	      			}/*KONDISI JIKA MEMILIH YA UNTUK MEMASUKAN DATA SISWA*/
	    		});
	    	}else{
	    		toastr.error("Pilih Terlebih Dahulu Siswa Yang Akan Dimasukan Ke Kelas "+namaKelas, "Pilih Siswa!");
	    	}
		});
    	/*---------------*/
    	/*SET WALI KELAS*/
   		$(document).on('change', '#pilihWaliKelas', function (e) {
			mApp.block(".inputBlock");
			$waliKelas 	= $('#pilihWaliKelas').val();
			$kelasID 	= $('#dataID').val();
			$.ajax({
				url: '<?= base_url('ManajemenKelas/KelolaKelas/setWaliKelas') ?>',
				type : 'POST',
				//async: true,
				//dataType: '',
				data: {
					waliKelas 	: $waliKelas,
					kelasID 	: $kelasID,
					setWali 	: 1
				},
				dataType: 'json',
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType('application/jsoncharset=UTF-8')
					}
				},
				success: function (response) {
					if(response.status == 'sukses'){
						//alert($kelasID);
						toastr.success(response.pesan, "Wali Kelas Diatur");
						//mApp.unblock(".inputBlock");
						kontenView();
					}else{
						toastr.error(response.pesan, "Gagal");
						kontenView();
					}
				},
				error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				alert(xhr.responseText) // munculkan alert
			}
			})
		});
		/*------------------*/
	});
	//TABEL SISWA BELLUM MASUK KELAS
	var DatatablesBasicPaginations = {
	    init: function() {
	        tabel = $("#tabelPilihSiswa").DataTable({
	            responsive:!0,
	            "processing": true, //Feature control the processing indicator.
	            "serverSide": true, //Feature control DataTables' server-side processing mode.
	            "order": [], //Initial no order.
	            //scrollY: "50vh",
	            //scrollX: !0,

	            scrollCollapse: !0,
	            pagingType: "full_numbers",
	            "ajax": {
	                "url": "<?= site_url('ManajemenKelas/KelolaKelas/listPilihSiswa') ?>",
	                "type": "POST"
	            },
	            "columnDefs": [
	                { 
	                    "targets": [ 0 ], //first column
	                    "orderable": false, //set not orderable
	                },
	                { 
	                    "targets": [ -1 ], //last column
	                    "orderable": true, //set not orderable
	                },

	            ],
	        })
	    }
	};

	//check all
	$("#check-all").click(function () {
	    $(".data-check").prop('checked', $(this).prop('checked'));
	});

	/*PILIH WALI KELAS*/


/*------------------------------------------------------------------------------*/
    
</script>
