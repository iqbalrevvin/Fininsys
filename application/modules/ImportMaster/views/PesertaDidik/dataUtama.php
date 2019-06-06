<!--begin::Modal KETERANGAN-->
<div class="modal fade" id="modalKeterangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
	aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">
                    Keterangan Import Data
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-portlet m-portlet--mobile" id="">
                 <div class="m-portlet__body">
                 	<p>Pastikan Data Yang Di Upload Adalah File Dari Format Excel (.xlsx)</p>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>

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


<div class="m-portlet portletTampil">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
        <form method="POST" action="<?= base_url('ImportMaster/ImportPesertaDidik/DataUtama') ?>" enctype="multipart/form-data">
            <div class="m-portlet__head-title">
            	<div class="row col-md-8 col-8">
					<b>Unggah File</b> : &nbsp;	
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="fileImport" id="customFile" accept=".xlsx">
						<label class="custom-file-label" for="customFile">Klik Disini & Pilih Berkas</label>
					</div>					
				</div>

				<div class="row col-md-4 col-4">
					TampilKan Data : &nbsp;
					<input type="submit" class="btn btn-success m-btn m-btn--air m-btn--custom navigation" 
						name="previewImport" value="Tampilkan"></input>
				</div>

				<div class="row col-md-3 col-3">
					<a href="#" class="btn btn-info m-btn m-btn--icon m-btn--icon-only" data-toggle="modal" 
                        data-target="#modalKeterangan" title="Keterangan">
						<i class="la la-info"></i>
					</a>
				</div>
			
            </div>
            </form>
        </div>
    </div>
    <div class="m-portlet__body">
		<?php if(! $this->input->post('previewImport')): ?>
			Pilih Berkas Dengan Format Excel Lalu Klik Tobol <b>Tampilkan</b> Untuk Mereview Data Yang Akan Di Import.
		<?php else: ?>
			<?php if(isset($upload_error)){ ?>
				<div class="text-danger"><b><?= $upload_error ?></b></div>
			<?php } ?>
			<form action="<?= base_url('ImportMaster/PesertaDidik/ImportDataUtama') ?>" method="POST" >
				<div class="text-danger" id="dataKosong">
					<span id='jumlah_kosong'></span> Data Peserta Didik Belum Lengkap, Lengkapi Data Lalu Upload Kembali File!
				</div>
			</form>
		<?php endif; ?>
    </div>
</div>

<script>




</script>