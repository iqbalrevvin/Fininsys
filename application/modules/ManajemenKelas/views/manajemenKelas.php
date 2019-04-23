<div class="row">
	<?php foreach($listKelas as $kelas): ?>
		<div class="col-xl-6">
			 <div class="m-portlet m-portlet--full-height ">
			    <div class="m-portlet__head">
			        <div class="m-portlet__head-caption">
			            <div class="m-portlet__head-title">
			                <h3 class="m-portlet__head-text">
			                    <?= $kelas->nama_kelas ?>
			                </h3>
			            </div>
			        </div>
			        <div class="m-portlet__head-tools">
			            <ul class="m-portlet__nav">
			                <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
			                    <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl m-dropdown__toggle">
			                        <i class="la la-ellipsis-h m--font-brand"></i>
			                    </a>
			                    <div class="m-dropdown__wrapper">
			                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
			                        <div class="m-dropdown__inner">
			                            <div class="m-dropdown__body">
			                                <div class="m-dropdown__content">
			                                    <ul class="m-nav">
			                                        <li class="m-nav__item">
			                                            <a href="" class="m-nav__link">
			                                                <i class="m-nav__link-icon flaticon-user-add"></i>
			                                                <span class="m-nav__link-text">Kelola Kelas</span>
			                                            </a>
			                                        </li>
			                                    </ul>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </li>
			            </ul>
			        </div>
			    </div>
			    <div class="m-portlet__body">
			        <div class="m-widget3">
				        <div class="m-scrollable m-scroller" data-scrollable="true" data-height="400" style="height: 400px; overflow: auto;">
				        <?php foreach ($this->ManajemenKelas_m->getPesdik($kelas->idKelas) as $data): ?>
				        	<div class="m-widget3__item">
				                <div class="m-widget3__header">
				                    <div class="m-widget3__user-img">
				                        <img class="m-widget3__img" src="<?= base_url('assets/image/users/user2.jpg') ?>" alt="">
				                    </div>
				                    <div class="m-widget3__info">
				                        <span class="m-widget3__username">
				                            Melania Trump
				                        </span><br>
				                        <span class="m-widget3__time">
				                            2 day ago
				                        </span>
				                    </div>
				                    <span class="m-widget3__status m--font-info">
				                        Pending
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
</div>