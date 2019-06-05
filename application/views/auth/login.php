<form class="m-login__form m-form" action="<?php echo site_url('auth/ajax_login')?>" method="post">
  <div class="message"></div>
  <div id="resultLogin"></div>
  <div id="loginArea">
    <div class="form-group m-form__group">
      <input class="form-control m-input" type="text" placeholder="<?php echo lang('login_identity_label') ?>" autocomplete="off" name="identity">
    </div>
    <div class="form-group m-form__group">
      <input class="form-control m-input m-login__form-input--last" type="password" placeholder="<?php echo lang('login_password_label') ?>" name="password">
    </div>

    <div class="col m--align-left">
      <label class="">
        <input type="checkbox" value="1"> <?php echo lang('login_remember_label') ?>
        <span></span>
      </label>
    </div>
    <!--<div class="col m--align-right">
      <a href="javascript:;" id="m_login_forget_password" class="m-link">Lupa Password ?</a>
    </div>-->

    <div class="row m-login__form-sub">
      <div class="col m--align-left">
        <a href="javascript:;" id="m_login_signup" class="m-link m--font-info m-login__account-link">
          <b>Registrasi</b>
        </a>
      </div>
      <div class="col m--align-right">
        <a href="javascript:;" id="m_login_forget_password" class="m-link">
          <b><?php echo lang('login_forgot_password') ?></b>
        </a>
      </div>
    </div>
  
    <div class="m-login__form-action">
      <button type="submit" id="submitAuthLogin" class="btn m-btn--pill m-btn--air m-btn m-btn--gradient-from-primary m-btn--gradient-to-info ">
        <span id="btnLoading" ></span> <?php echo lang('login_submit_btn') ?>
      </button>
    </div>
  </div>
</form>
<script>
$(function(){
  redirect = '<?php echo $redirect ?>';
  base_url = '<?php echo base_url() ?>';
  $('input').iCheck({ checkboxClass: 'icheckbox_square-blue' });

  $('form').on('submit',function(event){
    event.preventDefault();
    loadBlockLogin();
    $("#btnLoading").addClass('disabled');
    $("#btnLoading").html('<img src="' + base_url + 'assets/svg/loading-spin.svg" alt=""> ');
    $.ajax({
        url      : $(this).attr('action'),
        type     : 'POST',
        dataType: 'json',
        data     : $(this).serialize(),
        success  : function(data) {
            if (data.status == "false") {
              $('.message').html(data.pesan).hide().slideDown();
              $('input').val('');
              $('input[name="identity"]').focus();
              $("#btnLoading").fadeOut();
              mApp.unblock("#loginArea");
            }else{
              $('.message').html('<div class="m-alert m-alert--outline alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><strong>Terimkasih!</strong> ' + data.pesan + '.</div>').hide().slideDown();
                window.location.href = redirect;
            }
            //$("#btnLoading").fadeOut();
        }
    });
  });
  //BLOCK LOAD------------------------------------------
  function loadBlockLogin() {
      mApp.block("#loginArea", {
          overlayColor: "#000000",
          type: "loader",
          state: "primary",
          message: "<b>Memeriksa Informasi Login...</b>"
      });
  }
//-----------------------------------------------------
});
</script>