<div class="m-portlet__body">
	<form class="m-form m-form--fit m-form--label-align-right">
		<div class="form-group ">
			<div class="col-10">
				<h3 class="m-form__section">Data Kontak</h3>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-12 col-lg-10">
				<label>No. Telp :</label>
				<a href="#" class="noTelp" id="2" data-type="number" data-placement="left" 
					data-title="No. Telp" data-name="no_telp_pd" data-pk='<?= $profil->idPd ?>'>
	    			<?= $profil->no_telp_pd ?>
	  			</a>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-12 col-lg-10">
				<label>Email :</label>
				<a href="#" class="email" id="2" data-type="email" data-placement="left" 
					data-title="No. Telp" data-name="email_pd" data-pk='<?= $profil->idPd ?>'>
	    			<?= $profil->email_pd ?>
	  			</a>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-12 col-lg-10">
				<label>Link Facebook :</label>
				<a href="#" class="facebook" id="2" data-type="url" data-placement="left" 
					data-title="Alamat Faceboook" data-name="facebook" data-pk='<?= $profil->idPd ?>'>
	    			<?= $profil->facebook ?>
	  			</a>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-12 col-lg-10">
				<label>Link Instagram :</label>
				<a href="#" class="instagram" id="2" data-type="url" data-placement="left" 
					data-title="Alamat Instagram" data-name="instagram" data-pk='<?= $profil->idPd ?>'>
	    			<?= $profil->instagram ?>
	  			</a>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-12 col-lg-10">
				<label>Link Twitter :</label>
				<a href="#" class="twitter" id="2" data-type="url" data-placement="left" 
					data-title="Alamat Twitter" data-name="twitter" data-pk='<?= $profil->idPd ?>'>
	    			<?= $profil->twitter ?>
	  			</a>
			</div>
		</div>
	</form>						
</div>

<script>
	$('.noTelp').editable({
		//id : $(this).data('id'),
		anim : 'true',
		onblur : 'submit',
		showbuttons: false,
        mode: 'inline',   
        type: 'number',
        emptytext: 'Kosong',
        title: 'Enter Value',
        url : '<?= base_url('PesertaDidik/Profil/editKontak') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });
    $('.email').editable({
		//id : $(this).data('id'),
		anim : 'true',
		//onblur : 'submit',
		showbuttons: false,
        mode: 'inline',   
        type: 'email',
        emptytext: 'Kosong',
        title: 'Enter Value',
        url : '<?= base_url('PesertaDidik/Profil/editKontak') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });
    $('.facebook').editable({
		//id : $(this).data('id'),
		anim : 'true',
		//onblur : 'submit',
		showbuttons: false,
        mode: 'inline',   
        emptytext: 'Kosong',
        title: 'Enter Value',
        url : '<?= base_url('PesertaDidik/Profil/editKontak') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });
    $('.instagram').editable({
		//id : $(this).data('id'),
		anim : 'true',
		//onblur : 'submit',
		showbuttons: false,
        mode: 'inline',   
        emptytext: 'Kosong',
        title: 'Enter Value',
        url : '<?= base_url('PesertaDidik/Profil/editKontak') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });
     $('.twitter').editable({
		//id : $(this).data('id'),
		anim : 'true',
		//onblur : 'submit',
		showbuttons: false,
        mode: 'inline',   
        emptytext: 'Kosong',
        title: 'Enter Value',
        url : '<?= base_url('PesertaDidik/Profil/editKontak') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });
</script>