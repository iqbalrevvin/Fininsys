<div class="col-xl-8 col-lg-7">
	<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
		<div class="m-portlet__head">
			<div class="m-portlet__head-tools">
				<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
					<li class="nav-item m-tabs__item">
						<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
							<i class="flaticon-share m--hide"></i>
							Data Utama
						</a>
					</li>
					<li class="nav-item m-tabs__item">
						<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
							Data Alamat
						</a>
					</li>
					<li class="nav-item m-tabs__item">
						<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
							Data Orang Tua
						</a>
					</li>
					<li class="nav-item m-tabs__item">
						<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_4" role="tab">
							Data Orang Tua
						</a>
					</li>
				</ul>
			</div>
			<?php require('headTools.php') ?>
		</div>
		<div class="tab-content">
			<div class="tab-pane active" id="m_user_profile_tab_1">
				<?php require('dataUtama.php') ?>
			</div>
			<div class="tab-pane " id="m_user_profile_tab_2">
				<?php require('dataAlamat.php') ?>
			</div>
			<div class="tab-pane " id="m_user_profile_tab_3">
				Data Orang Tua
			</div>
			<div class="tab-pane " id="m_user_profile_tab_4">
				Data Kontak
			</div>
		</div>
	</div>
</div>


<script src="<?= base_url('assets/js/demo/bootstrap-datepicker.js') ?>"></script>
<script src="<?= base_url('assets/js/demo/select2.js') ?>"></script>

<script>
	//DATE PICKER INITIAL
var BootstrapDatepicker = function() {
  var t;
  t = mUtil.isRTL() ? {
      leftArrow: '<i class="la la-angle-right"></i>',
      rightArrow: '<i class="la la-angle-left"></i>'
  } : {
      leftArrow: '<i class="la la-angle-left"></i>',
      rightArrow: '<i class="la la-angle-right"></i>'
  };
  return {
      init: function() {
      $(".m_datepicker_nonModal, .m_datepicker_3_validate_nonModal").datepicker({
              rtl: mUtil.isRTL(),
              format: 'yyyy-mm-dd',
              todayBtn: "linked",
              clearBtn: !0,
              todayHighlight: !0,
              templates: t
          }), $(".m_datepicker_modal").datepicker({
              rtl: mUtil.isRTL(),
              format: 'yyyy-mm-dd',
              orientation: "top left",
              todayBtn: "linked",
              clearBtn: !0,
              todayHighlight: !0,
              templates: t
          })
      }
  }
}();

jQuery(document).ready(function() {
    //registerAlert.init()
    BootstrapDatepicker.init()
});
</script>