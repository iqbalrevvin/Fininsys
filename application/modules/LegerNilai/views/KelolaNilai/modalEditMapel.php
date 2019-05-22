<div id="resultErrorEditMapel"></div>
<div class="modal fade modalInput" id="modalEditMapel<?= $data->idLeger ?>" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="">Edit Mata Pelajaran Penilaian </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-remove"></span>
				</button>
			</div>
			<div class="m-form m-form--fit m-form--label-align-right">
				<div class="modal-body">
					<div id="resultErrorTambahMapel" class="text-danger"></div>
					<div class="form-group row m--margin-bottom-20">
						<label class="col-form-label col-lg-3 col-sm-12">Mata Pelajaran</label>
						<div class="col-lg-9 col-md-9 col-sm-12 ">
							<select class="form-control m_select2_1_modal" id="editMapel" name="editMapel" disabled>
			                    <?php foreach ($mapel as $list): ?>
			                        <option <?= $data->idMata_pelajaran == $list->idMata_pelajaran?'selected="selected"' : '' ?>
			                        value="<?= $list->idMata_pelajaran ?>">
			                        <?= $list->nama_kurikulum ?> | <?= $list->nama_mata_pelajaran ?> 
			                        	| <?= $list->nama_kelompok_mapel ?></option>
			                    <?php endforeach; ?>
			                </select>
						</div>
					</div>
					<div class="form-group row m--margin-bottom-20">
						<label class="col-form-label col-lg-3 col-sm-12">Guru Pengampu</label>
						<div class="col-lg-9 col-md-9 col-sm-12 ">
							<select class="form-control m_select2_1_modal" id="editGuruPengampu<?= $data->idLeger ?>" >
								<?php foreach ($tenpen as $list): ?>
			                        <option <?= $data->NIK_tenpen == $list->NIK_tenpen?'selected="selected"' : '' ?> 
			                        	value="<?= $list->NIK_tenpen ?>">
			                        	<?= $list->nama_tenpen ?> | <?= $list->nama_sekolah ?></option>
			                    <?php endforeach; ?>
			                 </select>
						</div>
					</div>
					<div class="form-group  row m--margin-bottom-10">
						<label class="col-form-label col-lg-3 col-sm-12">Nilai KKM Pengetahuan</label>
						<div class="col-lg-2 col-md-9 col-sm-9 ">
							<input type='text' class="form-control m-input m-input--air m_maxlength_2" maxlength="2" 
									placeholder="KKM" id="editKKMPengetahuan<?= $data->idLeger ?>"
									value="<?= $data->kkm_pengetahuan ?>" onkeypress="return inputAngka(event)">
						</div>
					</div>
					<div class="form-group row m--margin-bottom-10">
						<label class="col-form-label col-lg-3 col-sm-12">Nilai KKM Keterampilan</label>
						<div class="col-lg-2 col-md-9 col-sm-9 ">
							<input type='text' class="form-control m-input m-input--air m_maxlength_2" maxlength="2" 
									placeholder="KKM" id="editKKMKeterampilan<?= $data->idLeger ?>"
									value="<?= $data->kkm_keterampilan ?>" onkeypress="return inputAngka(event)" >
						</div>
					</div>
					<div class="form-group row m--margin-bottom-10">
						<label class="col-form-label col-lg-3 col-sm-12">No. Urut</label>
						<div class="col-lg-2 col-md-9 col-sm-9 ">
							<input type='text' class="form-control m-input m-input--air m_maxlength_2" maxlength="2"
								value="<?= $data->no_urut_mapel ?>" placeholder="No." id="editNoUrut<?= $data->idLeger ?>" 
								onkeypress="return inputAngka(event)">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button data-mapel="<?= $data->idMata_pelajaran ?>" data-id="<?= $data->idLeger ?>"
						class="btnEditMapel btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
						Perbarui
					</button>
					<button type="button" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air" 
						data-dismiss="modal">
						Tutup
					</button>
				</div>
			</div>
		</div>
	</div>
</div>