<li class="m-menu__item  m-menu__item--submenu m-menu__item--submenu-fullheight" aria-haspopup="true" m-menu-submenu-toggle="click" 
    m-menu-dropdown-toggle-class="m-aside-menu-overlay--on">
	<a href="javascript:;" class="m-menu__link m-menu__toggle">
    	<i class="m-menu__link-icon flaticon-menu-button"></i>
    	<span class="m-menu__link-text"><?= $settings->judul ?></span>
    	<i class="m-menu__ver-arrow la la-angle-right"></i>
	</a>
    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
        <div class="m-menu__wrapper">
            <ul class="m-menu__subnav">
                <li class="m-menu__item m-menu__item--parent m-menu__item--submenu-fullheight" aria-haspopup="true">
                    <span class="m-menu__link"><span class="m-menu__link-text"><?= $settings->judul ?></span></span>
                </li>
                <?php foreach ($header_menu->result() as $header): ?>
                    <li class="m-menu__section ">
                        <h4 class="m-menu__section-text"><?= $header->header ?></h4>
                        <i class="m-menu__section-icon flaticon-more-v2"></i>
                    </li>
                    <?php foreach ($menu->result() as $key => $menu_item): ?>
                        <?php if ($header->id_header_menu == $menu_item->id_header_menu): ?>
                            <?php if ($menu_item->url == "#" && $menu_item->level_one == "0") { ?>
                                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="click" 
                                    m-menu-submenu-mode="accordion" m-menu-link-redirect="1">
                                    <a href="inner.html" class="m-menu__link m-menu__toggle ">
                                        <i class="m-menu__link-icon flaticon-<?= $menu_item->icon ?>"></i>
                                        <span class="m-menu__link-title"> 
                                            <span class="m-menu__link-wrap">
                                                <span class="m-menu__link-text"><?= $menu_item->label ?></span> 
                                            </span>
                                        </span>
                                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                                     </a>
                                     
                                     <div class="m-menu__submenu ">
                                        <span class="m-menu__arrow"></span>
                                        <ul class="m-menu__subnav">
                                            <?php foreach ($menu_lvlOne->result() as $lvlOne): ?>
                                                <?php if ($menu_item->id_menu == $lvlOne->level_one): ?>                
                                                    <?php if ($lvlOne->url == "#"){ ?>
                                                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" 
                                                            m-menu-submenu-toggle="click" m-menu-submenu-mode="accordion" 
                                                            m-menu-link-redirect="1">
                                                            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                                                <i class="m-menu__link-icon flaticon-<?= $lvlOne->icon ?>"></i>
                                                                <span class="m-menu__link-text">
                                                                    <?= $lvlOne->label ?>
                                                                </span>
                                                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                                                            </a>
                                                            <div class="m-menu__submenu">
                                                                <span class="m-menu__arrow"></span>
                                                                <ul class="m-menu__subnav">
                                                                    <?php foreach ($menu_lvlTwo->result() as $lvlTwo): ?>
                                                                        <?php if ($lvlOne->id_menu == $lvlTwo->level_two): ?>
                                                                            <li class="m-menu__item navigation" aria-haspopup="true" 
                                                                                m-menu-link-redirect="1" 
                                                                                id="<?= $lvlTwo->menu_id ?>">
                                                                                <a href="<?= site_url($lvlTwo->url) ?>" 
                                                                                    class="m-menu__link ">
                                                                                    <i class="m-menu__link-icon flaticon-<?= $lvlTwo->icon ?>"></i>
                                                                                    <span class="m-menu__link-title"> 
                                                                                        <span class="m-menu__link-wrap">
                                                                                            <span class="m-menu__link-text">
                                                                                                <?= $lvlTwo->label ?>
                                                                                            </span>
                                                                                        </span>
                                                                                    </span>
                                                                                 </a>
                                                                            </li>
                                                                        <?php endif ?>                                    
                                                                    <?php endforeach ?>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    <?php }else{ ?>
                                                        <li id="<?php echo $lvlOne->menu_id ?>" class="m-menu__item navigation" aria-haspopup="true" 
                                                            m-menu-link-redirect="1">
                                                            <a href="<?php echo site_url($lvlOne->url) ?>" class="m-menu__link ">
                                                                <i class="m-menu__link-icon flaticon-<?= $lvlOne->icon ?>" class="name"></i>
                                                                <span class="m-menu__link-text">
                                                                    <?php echo $lvlOne->label ?>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php }else{ ?>
                                <li id="<?= $menu_item->menu_id ?>" class="m-menu__item navigation" aria-haspopup="true" m-menu-link-redirect="1">
                                    <a href="<?= site_url($menu_item->url) ?>" class="m-menu__link " title="<?= $menu_item->label ?>">
                                        <i class="m-menu__link-icon flaticon-<?= $menu_item->icon ?>"></i>
                                        <span class="m-menu__link-text"><?= $menu_item->label ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php endif ?>
                    <?php endforeach ?>                                                    
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</li>