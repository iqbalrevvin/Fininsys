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
                  show: 1
              },
              success: function(response){
                  $('#resultKonten').html(response);
                  //$("#jenisNasabah").selectpicker();
              }
          });
        } 

        function loadCard(id){
          $("#portletKelas"+id).load();
        } 

        $(document).on('click', '#reloadKelas', function(e) {
        	e.preventDefault();
        	var id 	= $(this).data('id');
        	mApp.block("#portletKelas"+id, {
	          overlayColor: "#000000",
	          type: "loader",
	          state: "primary",
	          message: "<b>Memuat Data </b>"
	      	});
	      	kontenView()
	      	//mApp.unblock("#portletKelas"+id);
    	});


       $(document).on('click', '.btnKeluarSiswa', function() {
       		var id 		= $(this).data('id');
       		var nama 	= $(this).data('nama');
       		var jumlah 	= $("small[data-id='jumlahSiswa']").val();
        	mApp.block("#portlet"+id, {
	          overlayColor: "#000000",
	          type: "loader",
	          state: "primary",
	          message: "<b>Mengeluarkan "+nama+" ..</b>"
	      	});
	      	$.ajax({
	      		url: '<?= base_url('ManajemenKelas/KelolaKelas/keluarKelas') ?>',
	      		type: 'POST',
	      		data: {
	      			NIK_pd 			: id,
	                keluar    		: 1
	           	},
	      		success: function(){
	      			mApp.unblock("#portlet"+id);
	      			$("div[data-id='"+id+"']").fadeOut("fast",function(){
						    $(this).remove();
					     });
	      			head();
					//$("small[data-id='jumlahSiswa']").load();
					/*kontenView();*/
	      		}
	      	})
        });

	});
</script>


