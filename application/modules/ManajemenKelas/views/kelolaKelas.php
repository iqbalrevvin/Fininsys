<div id="resultKonten">
    <div class="m-blockui" id="loader-center">
        <span>Memuat Data Kelas <?= $kelas->nama_kelas ?>. .</span>
        <span>
            <div class="m-loader m-loader--brand"></div>
        </span>
    </div>
</div>
<input type="hidden" id="dataID" value="<?= $kelas->idKelas ?>"></input>
<input type="hidden" id="namaKelas" value="<?= $kelas->nama_kelas ?>"></input>

<script>
	$(document).ready(function() {
		kontenView()
		function kontenView(){
			var DatatableHtmlTableDemo = {
	            init: function() {
	                var e;
	                e = $(".nasabah-datatable").mDatatable({
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
	                $("tr[data-id='"+$id+"']").fadeOut("slow",function(){
						    $(this).remove();
					     });
	                $("#loadKeluarKelas").hide();
	            }
	        });
		});
		/*TOMBOL TAMBAH SISWA KE KELAS*/
    	$(document).on('click', '#btnTambahSiswa', function() {
    		var namaKelas = $('#namaKelas').val();
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
			        closeOnConfirm: false,
			        closeOnCancel: false
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
			                data: {id:list_id},
			                url: "<?php echo site_url('person/ajax_bulk_delete')?>",
			                dataType: "JSON",
			                success: function(data)
			                {
			                    if(data.status){
			                        kontenView();
			                        mApp.unblock("#kontenTambahSiswa");
			                    }
			                    else{
			                        alert('Gagal Memproses Data');
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
	});

	
    
</script>
