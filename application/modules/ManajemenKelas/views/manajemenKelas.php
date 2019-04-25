<div id="resultKonten">
    <div class="m-blockui" id="loader-center">
        <span>Memuat Data Kelas . .</span>
        <span>
            <div class="m-loader m-loader--brand"></div>
        </span>
    </div>
</div>

<script>
	$(document).ready(function() {
		kontenView()
		function kontenView(){
          var id = $('#dataID').val();
          $.ajax({
              url: '<?= base_url('ManajemenKelas/getManajemenKelas') ?>',
              type: 'POST',
              async: true,
              data:{
                  ID : id,
                  show: 1
              },
              success: function(response){
                  $('#resultKonten').html(response);
                  //$("#jenisNasabah").selectpicker();
              }
          });
        } 

	});
</script>


