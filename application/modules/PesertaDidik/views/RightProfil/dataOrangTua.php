<div class="m-portlet__body">
	<form class="m-form m-form--fit m-form--label-align-right">
		<div class="form-group ">
			<div class="col-10">
				<h3 class="m-form__section">Data Ayah</h3>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-12 col-lg-10">
				<label>NIK_ayah :</label>
				<a href="#" class="NIKAyah" id="2" data-type="number" data-placement="left" 
					data-title="NIK Ayah" data-name="NIK_ayah" data-pk='<?= $profil->NIK_pd ?>'>
	    			<?= $profil->NIK_ayah ?>
	  			</a>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-12 col-lg-10">
				<label>Nama Ayah :</label>
				<a href="#" class="namaAyah" id="2" data-type="text" data-placement="left" 
					data-title="No. Telp" data-name="nama_ayah" data-pk='<?= $profil->NIK_pd ?>'>
	    			<?= $profil->nama_ayah ?>
	  			</a>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-12 col-lg-10">
				<label>Tahun Lahir Ayah :</label>
				<a href="#" class="tahunLahirAyah" id="2" data-type="number" data-placement="left" 
					data-title="Tahun Lahir Ayah" data-name="tahun_lahir_ayah" data-pk='<?= $profil->NIK_pd ?>'>
	    			<?= $profil->tahun_lahir_ayah ?>
	  			</a>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-12 col-lg-10">
				<label>Pendidikan Ayah :</label>
				<a href="#" class="pendidikanAyah" id="2" data-type="select" data-placement="left" 
					data-title="Pendidikan Ayah" data-name="pendidikan_ayah" data-pk='<?= $profil->NIK_pd ?>'>
	    			<?= $profil->pendidikan_ayah ?>
	  			</a>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-12 col-lg-10">
				<label>Pekerjaan Ayah :</label>
				<a href="#" class="pekerjaanAyah" id="2" data-type="select" data-placement="left" 
					data-title="Pekerjaan Ayah" data-name="pekerjaan_ayah" data-pk='<?= $profil->NIK_pd ?>'>
	    			<?= $profil->pekerjaan_ayah ?>
	  			</a>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-12 col-lg-10">
				<label>Penghasilan Ayah :</label>
				<a href="#" class="penghasilanAyah" id="2" data-type="select" data-placement="left" 
					data-title="Penghasilan Ayah" data-name="penghasilan_ayah" data-pk='<?= $profil->NIK_pd ?>'>
	    			<?= $profil->penghasilan_ayah ?>
	  			</a>
			</div>
		</div>
		<div class="form-group ">
			<div class="col-10">
				<h3 class="m-form__section">Data Ibu</h3>
			</div>
		</div>

	</form>						
</div>
<script>
	$('.NIKAyah').editable({
		//id : $(this).data('id'),
		anim : 'true',
		onblur : 'submit',
		showbuttons: false,
        mode: 'inline',   
        type: 'number',
        emptytext: 'Kosong',
        title: 'Enter Value',
        url : '<?= base_url('PesertaDidik/Profil/editOrangTua') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });
    $('.namaAyah').editable({
		//id : $(this).data('id'),
		anim : 'true',
		onblur : 'submit',
		showbuttons: false,
        mode: 'inline',   
        emptytext: 'Kosong',
        title: 'Enter Value',
        url : '<?= base_url('PesertaDidik/Profil/editOrangTua') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });
    $('.tahunLahirAyah').editable({
		//id : $(this).data('id'),
		anim : 'true',
		onblur : 'submit',
		showbuttons: false,
        mode: 'inline',   
        max: '2020',
        emptytext: 'Kosong',
        title: 'Enter Value',
        url : '<?= base_url('PesertaDidik/Profil/editOrangTua') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });
    $('.pendidikanAyah').editable({
		//id : $(this).data('id'),
		anim : 'true',
		onblur : 'submit',
		showbuttons: false,
        mode: 'inline',   
        source: [
        	{value: "SD", text: "SD"}, 
        	{value: "SMP", text: "SMP"},
        	{value: "SMA", text: "SMA"},
        	{value: "S1", text: "S1"},
        	{value: "S2", text: "S2"},
        	{value: "S3", text: "S3"},
        ],
        emptytext: 'Kosong',
        title: 'Enter Value',
        url : '<?= base_url('PesertaDidik/Profil/editOrangTua') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });
    $('.pekerjaanAyah').editable({
		//id : $(this).data('id'),
		anim : 'true',
		onblur : 'submit',
		showbuttons: false,
        mode: 'inline',   
        source: [
        	{value: "Buruh", text: "Buruh"}, 
        	{value: "PNS", text: "PNS"},
        	{value: "SWASTA", text: "SWASTA"},
        	{value: "WIRASWASTA", text: "WIRASWASTA"},
        	{value: "POLISI", text: "POLISI"},
        	{value: "GURU", text: "GURU"},
        	{value: "TENTARA", text: "TENTARA"},
        ],
        emptytext: 'Kosong',
        title: 'Enter Value',
        url : '<?= base_url('PesertaDidik/Profil/editOrangTua') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });
    $('.penghasilanAyah').editable({
		//id : $(this).data('id'),
		anim : 'true',
		onblur : 'submit',
		showbuttons: false,
        mode: 'inline',   
        source: [
        	{value: "<Rp.500.000", text: "<Rp.500.000"}, 
        	{value: "Rp.500.000-Rp.1000.000", text: "Rp.500.000-Rp.1.000.000"},
        	{value: "Rp.1.500.000-Rp.2.000.000", text: "Rp.1.500.000-Rp.2.000.000"},
        	{value: "Rp.2.000.000-Rp.2.500.000", text: "Rp.2.000.000-Rp.2.500.000"},
        	{value: "Rp.2.500.000-Rp.3.000.000", text: "Rp.2.500.000-Rp.3.000.000"},
        	{value: "Rp.3.000.000-Rp.5.000.000", text: "Rp.3.000.000-Rp.5.000.000"},
        	{value: ">Rp.5.000.000", text: ">Rp.5.000.000"},
        ],
        emptytext: 'Kosong',
        title: 'Enter Value',
        url : '<?= base_url('PesertaDidik/Profil/editOrangTua') ?>',
        ajaxOptions: {
		    type: 'POST',
		}
    });
</script>