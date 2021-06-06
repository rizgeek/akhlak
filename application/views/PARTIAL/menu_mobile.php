
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="#">
                        <h2 class="text-primary"><?=NAMA_WEB?></h2>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                    <?php for($i = 0;  $i < count($menu); $i++):?>
                        <?php if($menu[$i]['child']):?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="<?=$menu[$i]['icon']?>"></i><?=$menu[$i]['label']?></a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <?php for($j = 0; $j<count($menu[$i]['child_menu']); $j++):?>
                                    <li>
                                        <a href="<?=$menu[$i]['child_menu'][$j]['url']?>"><?=$menu[$i]['child_menu'][$j]['label']?></a>
                                    </li>
                                <?php endfor;?>
                            </ul>
                        </li>
                        <?php else:?>
                        <li>
                            <a href="<?=$menu[$i]['url']?>">
                                <i class="<?=$menu[$i]['icon']?>"></i><?=$menu[$i]['label']?></a>
                        </li>
                    <?php endif;?>
				<?php endfor;?>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->
