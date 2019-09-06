<div class="col-md-3 col-sm-3">
                <hr />
                 <!-- side navigation -->
                <div class="side-nav margin-bottom-60 margin-top-30">
                     <div class="side-nav-head">
                        <button class="fa fa-bars"></button>
                        <h4>CATEGORIES</h4>
                    </div>
                    <ul class="list-group list-group-bordered list-group-noicon uppercase">
                        <li class="list-group-item"><a href="<?php echo $base_url ?>/index.php"><span class="size-11 text-muted pull-right">(<?php echo $allmember['all_members']; ?>)</span> All Members</a></li>
                        <li class="list-group-item"><a href="<?php echo $base_url ?>/kikguys.php"><span class="size-11 text-muted pull-right">(<?php echo $guy['guy']; ?>)</span> Kik Guys</a></li>
                        <li class="list-group-item"><a href="<?php echo $base_url ?>/kikgirl.php"><span class="size-11 text-muted pull-right">(<?php echo $girl['girl']; ?>)</span> Kik Girls</a></li>
                        <li class="list-group-item"><a href=""><span class="size-11 text-muted pull-right">(<?php echo $recent['recent']; ?>)</span> Recent Users</a></li>
                    </ul>
                    <!-- /side navigation -->
                  </div>
                 <div class="kik_img">
                    <a href="<?php echo $base_url ?>/kikguys"><img src="<?php echo $base_url ?>/img/kik.png"/></a> 
                </div>
                <div class="kik_img">
                    <a href="<?php echo $base_url ?>/kikgirl"><img class="" src="<?php echo $base_url ?>/img/kik2.png"/></a> 
                </div>
                <br/>
                <!-- JUSTIFIED TAB -->
                <div class="tabs nomargin-top hidden-xs margin-bottom-60">
                     <!-- tabs -->
                    <ul class="nav nav-tabs nav-bottom-border nav-justified">
                        <li class="active">
                            <a href="#tab_1" data-toggle="tab">
                                Top 5 Girls
                            </a>
                        </li>
                        <li>
                            <a href="#tab_2" data-toggle="tab">
                                Top 5 Guys
                            </a>
                        </li>
                    </ul>
                     <!-- tabs content -->
                    <?php if ($user_id != '') { ?>
                        <div class="tab-content margin-bottom-60 margin-top-30">

                            <!-- POPULAR -->
                            <div id="tab_1" class="tab-pane active">
                                 <?php foreach ($get_girl_top5 as $value) { ?>  
                                    <div class="row tab-post"><!-- post -->
                                        <div class="col-md-3 col-sm-4 col-xs-3">
                                            <a href="user/profile/<?php echo $value['username']; ?>">
                                                <?php if ($value['kik_img'] != '') { ?><img width="50" src="<?php echo $value['kik_img'] ?>"/><?php } else { ?><img width="50" src="<?php echo $base_url ?>/img/noimage.jpg"/> <?php } ?>
                                            </a>
                                        </div>
                                        <div class="col-md-9 col-sm-8 col-xs-9">
                                            <a href="user/profile/<?php echo $value['username']; ?>"><?php echo $value['username']; ?></a>
                                            <small> 
                                                <span class="user-meta"><?php if ($value['gender'] == '1') { ?>
                                                        <img src='<?php echo $base_url ?>/img/guy.png' style="height: 17px; width:25px;"/> Guy &nbsp;&nbsp;&nbsp;
                                                    <?php } else { ?>
                                                        &nbsp;<img src='<?php echo $base_url ?>/img/venus.png' style="height: 17px; width:13px;"/>  Girl &nbsp;&nbsp;&nbsp;
                                                    <?php } ?></span> 
                                                <span class="user-meta"><i class="fa fa-fire"></i>&nbsp;<?php echo $value['votecount']; ?></span>
                                            </small>
                                        </div>
                                    </div>
                                <?php } ?>
                                  <!-- /POPULAR -->
                            </div>
                             <!-- RECENT -->
                            <div id="tab_2" class="tab-pane">
                                 <?php foreach ($get_guys_top5 as $value) { ?>  
                                    <div class="row tab-post"><!-- post -->
                                        <div class="col-md-3 col-sm-4 col-xs-3">
                                            <a href="user/profile/<?php echo $value['username']; ?>">
                                                <?php if ($value['kik_img'] != '') { ?><img width="50" src="<?php echo $value['kik_img'] ?>"/><?php } else { ?><img width="50" src="<?php echo $base_url ?>/img/noimage.jpg"/> <?php } ?>
                                            </a>
                                        </div>
                                        <div class="col-md-9 col-sm-8 col-xs-9">
                                            <a href="user/profile/<?php echo $value['username']; ?>"><?php echo $value['username']; ?></a>
                                            <small> 
                                                <span class="user-meta"><?php if ($value['gender'] == '1') { ?>
                                                        <img src='<?php echo $base_url ?>/img/guy.png' style="height: 17px; width:25px;"/> Guy &nbsp;&nbsp;&nbsp;
                                                    <?php } else { ?>
                                                        &nbsp;<img src='<?php echo $base_url ?>/img/venus.png' style="height: 17px; width:13px;"/>  Girl &nbsp;&nbsp;&nbsp;
                                                    <?php } ?></span> 
                                                <span class="user-meta"><i class="fa fa-fire"></i>&nbsp;<?php echo $value['votecount']; ?></span>
                                            </small>
                                        </div>
                                    </div>
                                <?php } ?>
                             </div>
                            <!-- /RECENT -->
                         </div>
                    <?php } else { ?>
                        <div class="tab-content margin-bottom-60 margin-top-30">

                            <!-- POPULAR -->
                            <div id="tab_1" class="tab-pane active">

                                <?php foreach ($get_girl_top5 as $value) { ?>  
                                    <div class="row tab-post"><!-- post -->
                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                            <a href="user/profile/<?php echo $value['username']; ?>">
                                                <?php if ($value['kik_img'] != '') { ?><img width="50" src="<?php echo $value['kik_img'] ?>"/><?php } else { ?><img width="50" src="<?php echo $base_url ?>/img/noimage.jpg"/> <?php } ?>
                                            </a>
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <a href="user/profile/<?php echo $value['username']; ?>"><?php echo $value['username']; ?></a>
                                            <small> 
                                                <span class="user-meta"><?php if ($value['gender'] == '1') { ?>
                                                        <img src='<?php echo $base_url ?>/img/guy.png' style="height: 17px; width:25px;"/> Guy &nbsp;&nbsp;&nbsp;
                                                    <?php } else { ?>
                                                        &nbsp;<img src='<?php echo $base_url ?>/img/venus.png' style="height: 15px; width:15px;"/>  Girl &nbsp;&nbsp;&nbsp;
                                                    <?php } ?></span> 
                                                <span class="user-meta"><i class="fa fa-fire"></i>&nbsp;<?php echo $value['votecount']; ?></span>
                                            </small>
                                        </div>
                                    </div>
                                <?php } ?>
                                 <!-- /POPULAR -->
                            </div>
                             <!-- RECENT -->
                            <div id="tab_2" class="tab-pane">
                                 <?php foreach ($get_guys_top5 as $value) { ?>  
                                    <div class="row tab-post"><!-- post -->
                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                            <a href="user/profile/<?php echo $value['username']; ?>">
                                                <?php if ($value['kik_img'] != '') { ?><img width="50" src="<?php echo $value['kik_img'] ?>"/><?php } else { ?><img width="50" src="<?php echo $base_url ?>/img/noimage.jpg"/> <?php } ?>
                                            </a>
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <a href="user/profile/<?php echo $value['username']; ?>"><?php echo $value['username']; ?></a>
                                            <small> 
                                                <span class="user-meta"><?php if ($value['gender'] == '1') { ?>
                                                        <img src='<?php echo $base_url ?>/img/guy.png' style="height: 17px; width:25px;"/> Guy &nbsp;&nbsp;&nbsp;
                                                    <?php } else { ?>
                                                        &nbsp;<img src='<?php echo $base_url ?>/img/venus.png' style="height: 15px; width:15px;"/>  Girl &nbsp;&nbsp;&nbsp;
                                                    <?php } ?></span> 
                                                <span class="user-meta"><i class="fa fa-fire"></i>&nbsp;<?php echo $value['votecount']; ?></span>
                                            </small>
                                        </div>
                                    </div>
                                <?php } ?>
                             </div>
                            <!-- /RECENT -->
                         </div>
                     <?php } ?>
                  </div>
                <!-- JUSTIFIED TAB -->
             </div>