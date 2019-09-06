        <div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
             <nav class="nav-main">
                <ul id="topMain" class="nav nav-pills nav-main">
                   <?php if($_SERVER['PHP_SELF'] == '/kikgirl'){?>
                    <li class="menuactive"><a  href="<?php echo $base_url ?>/kikgirl">KIK GIRLS</a></li>
                   <?php }else{ ?>
                    <li><a  href="<?php echo $base_url ?>/kikgirl">KIK GIRLS</a></li>
                   <?php } ?>
                    <?php if($_SERVER['PHP_SELF'] == '/kikguys'){?>
                    <li class="menuactive"><a  href="<?php echo $base_url ?>/kikguys">KIK GUYS</a></li>
                   <?php }else{ ?>
                    <li><a  href="<?php echo $base_url ?>/kikguys">KIK GUYS</a></li>
                   <?php } ?>
                    <?php if($_SERVER['PHP_SELF'] == '/hotornot'){?>
                    <li class="menuactive"><a href="<?php echo $base_url ?>/hotornot">HOT OR NOT?</a></li>
                   <?php }else{ ?>
                    <li><a href="<?php echo $base_url ?>/hotornot">HOT OR NOT?</a></li>
                   <?php } ?>
                   <?php if($_SERVER['PHP_SELF'] == '/hotestusers'){?>
                    <li class="menuactive"><a href="<?php echo $base_url ?>/hotestusers">HOTTEST USERS</a></li>
                   <?php }else{ ?>
                    <li><a href="<?php echo $base_url ?>/hotestusers">HOTTEST USERS</a></li>
                   <?php } ?>
                   <?php if($_SERVER['PHP_SELF'] == '/search'){?>
                     <li class="menuactive"> <a href="<?php echo $base_url ?>/search">SEARCH</a></li>
                   <?php }else{ ?>
                    <li> <a href="<?php echo $base_url ?>/search">SEARCH</a></li>
                   <?php } ?>
                   <?php if($_SERVER['PHP_SELF'] == '/blog'){?>
                   <?php if ($block_show['block_active'] == 1) { ?>
                    <li class="menuactive"><a href="<?php echo $base_url ?>/blog">BLOG</a></li>
                   <?php } else { ?>
                     <li></li>
                   <?php } ?>
                   <?php }else{ ?>
                   <?php if ($block_show['block_active'] == 1) { ?>
                     <li><a href="<?php echo $base_url ?>/blog">BLOG</a></li>
                   <?php } else { ?>
                     <li></li>
                   <?php } ?>
                   <?php } ?>
                  <?php if ($user_id != '') { ?>
                                <li>
                                    <a href="<?php echo $base_url ?>/profile/<?php echo $user_id; ?>">
                                        <i class="fa fa-user"></i> <span style="text-transform: uppercase;"><?php echo $user_id; ?></span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $base_url ?>/profile?q=logout"><i class="fa fa-sign-out"></i> SIGN OUT</a>
                                </li>
                <?php } else { ?>
                                <li>
                                    <a href="<?php echo $base_url ?>/login"><i class="fa fa-sign-in"></i> SIGN IN</a>
                                </li>
                                <li>
                                    <a href="<?php echo $base_url ?>/registration"><i class="fa fa-lock"></i> REGISTRATION</a>
                                </li>
                <?php } ?>
             </ul>
            </nav>
        </div>