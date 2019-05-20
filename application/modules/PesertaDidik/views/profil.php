<!--<div id="resultFormRegister"></div>-->
<!-- <?php if($this->session->flashdata('sukses')): ?>
  <div class="col-xl-12">
    <div class="m-alert m-alert--icon m-alert--outline alert alert-success alert-dismissible fade show m-alert--air" role="alert">
      <div class="m-alert__icon">
        <i class="la la-warning"></i>
      </div>
      <div class="m-alert__text">
        <strong>Data Terkirim!</strong> <?= $this->session->flashdata('sukses'); ?> !
        <a href="#">Lihat Data Nasabah</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
  </div>
<?php endif; ?> -->

<div id="resultProfil">
    <div class="m-blockui" id="loader-center">
        <span>Memuat Profil . .</span>
        <span>
            <div class="m-loader m-loader--brand"></div>
        </span>
    </div>
</div>
<input type="hidden" id="dataID" value="<?= $this->input->get('ID') ?>">
<?php #require('formRegistration.php') ?>

<script>
	$(document).ready(function() {
		profilView()
		function profilView(){
          var id = $('#dataID').val();
          $.ajax({
              url: '<?= base_url('PesertaDidik/Profil/getProfil') ?>',
              type: 'POST',
              async: true,
              data:{
                  ID : id,
                  show: 1
              },
              success: function(response){
                  $('#resultProfil').html(response);
                  BootstrapDatepicker.init()
                  //$("#jenisNasabah").selectpicker();
              }
          });
        } 

	});
</script>


