<!--begin::Base Scripts -->
<script src="<?= base_url('assets/js/jquery.min.js') ?>" type="text/javascript"></script>

<script src="<?= base_url('assets/vendors/jquery-ui/jquery-ui.min.js') ?>" type="text/javascript"></script>

<!--<script src="<?= base_url('assets/vendors/highchart/highcharts.js') ?>" type="text/javascript"></script>-->


<script src="<?= base_url('assets/vendors/pace-preload/pace.js') ?>" type="text/javascript"></script>
<!--BOOTSRAP FILE UPLOAD-->
<script src="<?php //echo base_url('assets/vendors/bootstrap-fileupload/bootstrap-fileupload.js') ?>"></script>

<!---///////////////////////////////////////////////////-->
<?php if ($this->uri->segment(1) == 'PageEditor'): ?>
  <script src="<?= base_url('assets/vendors/tinymce/tinymce.min.js') ?>" type="text/javascript"></script>
<?php endif; ?>
<!--Alertify JS-->
<script src="<?= base_url('assets/js/alertify.min.js') ?>"></script>
<script src="<?= base_url('assets/js/vendors.bundle.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/scripts.bundle.js') ?>" type="text/javascript"></script>

<?php if ($this->uri->segment(1) == 'ManajemenKelas' || $this->uri->segment(1) == 'LegerNilai' || $this->uri->segment(1) == 'ImportMaster'): ?>
  <script src="<?= base_url('assets/vendors/datatables-metronic/datatables.bundle.js') ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/vendors/datatables/datatables.bundle.js') ?>" type="text/javascript"></script>
<?php endif; ?>



<!-- GroceryCRUD JS -->
<?php if (isset($js_files)){ ?>
  <?php foreach($js_files as $file): ?> 
    <script src="<?php echo $file; ?>"></script>
  <?php endforeach; ?>
<?php }else{ ?>
  <script src="<?= base_url('assets/js/components/blockui.js') ?>"></script>
  <script src="<?= base_url('assets/js/demo/bootstrap-maxlength.js') ?>"></script>
  <script src="<?= base_url('assets/js/demo/bootstrap-select.js') ?>"></script>
  <script src="<?= base_url('assets/js/demo/select2.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/x-editable/bootstrap-editable.min.js') ?>"></script>
<?php } ?>

<script>
    site         = '<?php echo site_url(); ?>';
    ur_class     = '<?php echo $this->uri->segment(1); ?>';
    url_function = '<?php echo $this->uri->segment(2); ?>';
    <?php echo isset($script) ? $script : '' ?>
    function datatablesOptions() { var option = { "orderClasses": false, <?php echo isset($data['script_datatables']) ? $data['script_datatables'] : ''  ?> }; return option; }
    function afterDatatables() { <?php echo isset($data['script_grocery']) ? $data['script_grocery']: '' ?> }
</script>
<script src="<?php echo base_url('assets/js/list.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugins/iCheck/icheck.min.js') ?>"></script>
<?php echo isset($scriptView) ? $scriptView : ''; ?>
<!--Custom JS-->
<script src="<?php echo base_url('assets/js/a-design.js') ?>"></script>


<script type="text/javascript">

    jQuery(document).ready(function() {
      BootstrapDatepicker.init()

      //DatatablesBasicPaginations.init();
      //PortletDraggable.init()
    });
    

    // Fungsi Input HANYA ANGKA
    function inputAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
            return true;
    }
     paceOptions = {
        ajax: false,
        document: false,
        eventLag: false
      };

      Pace.on('done', function() {
        $('#preloader').delay(100).fadeOut(300);
      });

      //TOAST KOMPONEN-------------------------------------
        toastr.options = {
            "closeButton": true,
            "debug": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-left",
            "preventDuplicates": false,
            "showDuration": "200",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    //-----------------------------------------------------

      // FUNGSI DATE PICKER
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

//MODAL BLOCK LOAD------------------------------------------
  function modalBlockLoad() {
      mApp.block(".modalInput", {
              overlayColor: "#000000",
              type: "loader",
              state: "primary",
              message: "Memeriksa & Mengirim Paramater..."
          });
  }
//-----------------------------------------------------

// FUNGSI REFRESH
$(".navigation").click(function(){
  $("#loadPage").html('<div class="m-spinner m-spinner--brand m-spinner--sm"></div><div class="m-spinner m-spinner--primary m-spinner--sm"></div><div class="m-spinner m-spinner--success m-spinner--sm"></div><div class="m-spinner m-spinner--info m-spinner--sm"></div><div class="m-spinner m-spinner--warning m-spinner--sm"></div><div class="m-spinner m-spinner--danger m-spinner--sm"></div> ');
});
/*$('a[href$="!#"]').click(function(){
  alert('Sign new href executed.'); 
}); */
function refresh() {
    window.location.reload();
}

</script>


<!--end::Base Scripts -->
