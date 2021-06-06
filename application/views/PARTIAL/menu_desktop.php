<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
	<div class="logo d-flex justify-content-start">
		<a href="#">
			<h2 class="text-primary"><?=NAMA_WEB?></h2>
		</a>
	</div>
	<div class="menu-sidebar__content js-scrollbar1">
		<nav class="navbar-sidebar">
			<ul class="list-unstyled navbar__list">
				<?php for($i = 0;  $i < count($menu); $i++):?>
                    <?php if($menu[$i]['child']):?>
                        <li>
                            <a class="js-arrow" href="#"><i class="<?=$menu[$i]['icon']?>"></i><?=$menu[$i]['label']?></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                                <i class="<?= $menu[$i]['icon']?>"></i><?=$menu[$i]['label']?></a>
                        </li>
                    <?php endif;?>
				<?php endfor;?>
			</ul>
		</nav>
	</div>
</aside>
<!-- END MENU SIDEBAR-->

<!-- PAGE CONTAINER-->
<div class="page-container">
