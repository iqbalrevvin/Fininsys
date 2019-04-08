<button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-light ">

    <!-- BEGIN: Brand -->
    <div class="m-brand  m-brand--skin-light ">
        <a href="<?= base_url(); ?>" class="m-brand__logo">
            <img alt="" src="<?= base_url('assets/image/'.$settings->logo.'') ?>" />
        </a>
    </div>

    <!-- END: Brand -->
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " 
    	data-menu-vertical="true" m-menu-scrollable="true" m-menu-dropdown-timeout="500">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <?php require('menuNavigatorLeft.php') ?>
            <!-- <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="click" m-menu-link-redirect="1">
            	<a href="javascript:;" class="m-menu__link m-menu__toggle">
            		<i class="m-menu__link-icon flaticon-add"></i>
            		<span class="m-menu__link-text">Add</span>
            		<i class="m-menu__ver-arrow la la-angle-right"></i>
            	</a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" m-menu-link-redirect="1"><span class="m-menu__link"><span class="m-menu__link-text">Add</span></span></li>
                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-icon la la-commenting"></i><span class="m-menu__link-text">Post</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-icon la la-user"></i><span class="m-menu__link-text">Member</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-icon la la-cart-arrow-down"></i><span class="m-menu__link-text">Order</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-icon la la-coffee"></i><span class="m-menu__link-text">Entry</span></a></li>
                    </ul>
                </div>
            </li>-->

            <li class="m-menu__item  m-menu__item--submenu m-menu__item--bottom-2" aria-haspopup="true" m-menu-submenu-toggle="click">
            	<a href="javascript:;" class="m-menu__link m-menu__toggle">
            		<i class="m-menu__link-icon flaticon-settings"></i>
            		<span class="m-menu__link-text">Pengaturan</span>
            		<i class="m-menu__ver-arrow la la-angle-right"></i>
            	</a>
                <div class="m-menu__submenu m-menu__submenu--up"><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent m-menu__item--bottom-2" aria-haspopup="true">
                        	<span class="m-menu__link">
                        		<span class="m-menu__link-text">Pengaturan</span>
                        	</span>
                        </li>
        
                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
                        	<a href="<?= base_url('config/settings') ?>" class="m-menu__link ">
                        		<i class="m-menu__link-bullet m-menu__link-bullet--line">
                        			<span></span>
                        		</i>
                        		<span class="m-menu__link-text">Aplikasi</span>
                        	</a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
                            <a href="<?= base_url('config/users') ?>" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--line">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Pengguna</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu m-menu__item--bottom-1" aria-haspopup="true" m-menu-submenu-toggle="click">
            	<a href="javascript:;" class="m-menu__link m-menu__toggle">
            		<i class="m-menu__link-icon flaticon-info"></i>
            		<span class="m-menu__link-text">Help</span>
            		<i class="m-menu__ver-arrow la la-angle-right"></i>
            	</a>
                <div class="m-menu__submenu m-menu__submenu--up">
                	<span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent m-menu__item--bottom-1" aria-haspopup="true">
                            <a href="#" class="m-menu__link">
                            	<span>
                            		<span class="m-menu__link-text">Bantuan</span>
                            	</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
<div class="m-aside-menu-overlay"></div>