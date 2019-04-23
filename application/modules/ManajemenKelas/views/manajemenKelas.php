<div class="row" id="m_sortable_portlets">
	<?php foreach($listKelas as $kelas): ?>
		<div class="col-lg-6">	
			<div class="m-portlet m-portlet--info m-portlet--head-solid-bg m-portlet--head-sm m-portlet--mobile m-portlet--sortable" 
				m-portlet="true">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<span class="m-portlet__head-icon">
								<i class="flaticon-placeholder-2"></i>
							</span>
							<h3 class="m-portlet__head-text">
								<?= $kelas->nama_kelas ?> | <?= $kelas->nama_prodi ?> | <?= $kelas->nama_sekolah ?> 
								<?php $jumlah = count($this->ManajemenKelas_m->getPesdik($kelas->idKelas)); ?>
								<small>(<?= $jumlah ?> Siswa)</small>
							</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<ul class="m-portlet__nav">
							<li class="m-portlet__nav-item">
								<a href="#" m-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon">
									<i class="la la-angle-down"></i>
								</a>
							</li>
							<li class="m-portlet__nav-item">
								<a href="#" m-portlet-tool="remove" class="m-portlet__nav-link m-portlet__nav-link--icon">
								<i class="la la-close"></i></a>
							</li>
							<li class="m-portlet__nav-item">
								<a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon" data-skin="dark" 
									data-toggle="m-tooltip" data-placement="top" title="Kelola Kelas <?= $kelas->nama_kelas ?>" 
									data-original-title="Dark skin">
								<i class="flaticon-network"></i></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="m-portlet__body">
			        <div class="m-widget3">
				        <div class="m-scrollable m-scroller" data-scrollable="true" data-height="400" 
				        	style="height: 250px; overflow: auto;">
				        	<?php foreach ($this->ManajemenKelas_m->getPesdik($kelas->idKelas) as $pd): ?>
					        	<div class="m-widget3__item">
					                <div class="m-widget3__header">
					                    <div class="m-widget3__user-img">
					                        <img class="m-widget3__img" 
					                        	src="<?= base_url('assets/image/foto_pd/'.fotoGender($pd->foto_pd, $pd->jk_pd)) ?>" alt="">
					                    </div>
					                    <div class="m-widget3__info">
					                        <span class="m-widget3__username">
					                            <a href="<?= base_url('PesertaDidik/Profil?ID='.$pd->NIK_pd) ?>"> <?= $pd->nama_pd ?></a>
					                        </span><br>
					                        <span class="m-widget3__time">
					                            <?= $pd->NIK_pd ?>
					                        </span>
					                    </div>
					                    <span class="m-widget3__status m--font-info">
					                        <?= $pd->nipd ?>
					                    </span>
					                </div>
					            </div>
				        	<?php endforeach ?>
				        </div>
			        </div>
			    </div>
			</div>
		</div>
	<?php endforeach ?>
	<div class="m-portlet m-portlet--sortable-empty"></div>
	<div class="col-lg-6">
		<div class="m-portlet m-portlet--sortable-empty"></div>
	</div>
</div>


