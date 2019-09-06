<?php
error_reporting(0);
session_start();
include_once 'include/class.user.php'; 
$user = new User();
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 10;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;
$options = (intval($_GET['type']) != 0 ) ? $_GET['type'] : 0;
$user_id = $_SESSION['user_session'];

  if($_GET['type'] == 'all'){
      $sql = "SELECT * FROM users where suspended = 1 and kik_img != '' order by id ASC LIMIT $limit OFFSET $offset";
 }if($_GET['type'] == 'guy'){
     $sql = "SELECT * FROM `users` WHERE `gender` = 1 and suspended = 1 and kik_img != '' order by id ASC LIMIT $limit OFFSET $offset";
 }if($_GET['type'] == 'girl'){
     $sql = "SELECT * FROM `users` WHERE `gender` = 2 and suspended = 1 and kik_img != '' order by id ASC LIMIT $limit OFFSET $offset";
 }
 if($_GET['type'] == 'recent'){
     $sql = "SELECT * FROM users WHERE kik_img != '' order by id DESC LIMIT $limit OFFSET $offset";
 }
 if($_GET['type'] == 'hotestguy'){
     $sql = "SELECT *, count(*) as votecount FROM vote INNER JOIN users ON vote.profileid=users.username where users.gender = 1 and users.suspended = 1 and users.kik_img  != '' group by vote.profileid order by votecount desc LIMIT $limit OFFSET $offset";
 }
 if($_GET['type'] == 'hotestgirl'){
    $sql = "SELECT *, count(*) as votecount FROM vote INNER JOIN users ON vote.profileid=users.username where users.gender = 2 and users.suspended = 1 and users.kik_img  != '' group by vote.profileid order by votecount desc LIMIT $limit OFFSET $offset"; 
  }
 if($_GET['type'] == 'hotestuser'){
    $sql = "SELECT *, count(*) as votecount FROM vote INNER JOIN users ON vote.profileid=users.username where users.suspended = 1 and users.kik_img  != '' group by vote.profileid order by votecount DESC LIMIT $limit OFFSET $offset";
  }
 if($_GET['type'] == 'recenthotest'){
    $sql = "SELECT *, count(*) as votecount FROM vote INNER JOIN users ON vote.profileid=users.id where users.suspended = 1  group by vote.profileid and users.kik_img  != '' order by vote.id DESC LIMIT $limit OFFSET $offset";
}
if($_GET['type'] == 'recentguy'){
    $sql = "SELECT * FROM `users` WHERE `gender` = 1 and suspended = 1 and kik_img  != '' order by id DESC LIMIT $limit OFFSET $offset";
}
if($_GET['type'] == 'recentgirl'){
    $sql = "SELECT * FROM `users` WHERE `gender` = 2 and suspended = 1 and kik_img  != '' order by id DESC LIMIT $limit OFFSET $offset";
}
     try {
  $stmt = $user->_dbh->prepare($sql);
  $stmt->execute();
  $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}
?>
<!--<h1><?php echo $_GET['type'];?></h1>-->
<?php
if (count($results) > 0) {
     if($user_id != ''){  
  foreach ($results as $profile) { ?>

	<div class="blog-post-item"><!-- .blog-post-item-inverse = image right side [left on RTL] -->

		<div class="row user">
            <div class="col-md-2 col-sm-2 col-xs-12 blog_img"><?php if($profile['kik_img']!=''){ ?><img src="<?php echo $profile['kik_img'] ?>"  class="img img-circle"/><?php }else { ?><img src="<?php echo $base_url ?>/img/noimage.jpg"  class="img img-circle"/> <?php } ?></div>
            <div class="col-md-5 col-sm-5 col-xs-12 name_content">
                <h2><?php echo $profile['username'] ?></h2>
                <p>  <?php if($profile['gender']=='1'){ ?>
                    <img style="height: 17px; width:25px;" src="<?php echo $base_url ?>/img/guy.png"> Guy
                    <?php }else{ ?>
                    <img src='<?php echo $base_url ?>/img/venus.png' style="height: 17px; width:13px;"/> Girl
                     <?php } ?>
                       <?php if($_GET['type'] == 'hotestuser' || $_GET['type'] == 'hotestguy' || $_GET['type'] == 'hotestgirl'){ ?>
                     <span class="user-meta"><i class="fa fa-fire"></i>&nbsp;&nbsp;<?php echo $profile['votecount']; ?></span>
                      <?php }else{ ?>
                      <img style="height: 35px; width: 35px;" src="<?php echo $base_url ?>/img/location.png"><?php echo $profile['country'] ?>
                      <?php } ?>
                </p>
             </div>
            <div class="col-md-5 col-sm-5 col-xs-12 view_content">
				<ul class="nav navbar-nav navbar-nav3 ul">
                                        <li><a href="user/profile/<?php echo $profile['username'] ?>" class="border_user">View Profile</a></li>
					<li class="dropdown">
						<a data-whatever="<?php echo $profile['kikuser']; ?>" data-target="#exampleModal" data-toggle="modal" style="background-color: #80bf41; color: white; border:none" class="border_user current" href="">
						<b>See kik id</b>
						</a>
					</li>
				</ul>
			</div>
        </div>
 
	</div>
      

<?php } ?> 
    
     
    <?php }else{ ?> 
         <?php foreach ($results as $profile){ ?>
        <div class="row user">
            <div class="col-md-2 col-sm-2 blog_img"><?php if($profile['kik_img']!=''){ ?><img src="<?php echo $profile['kik_img'] ?>"  class="img img-circle"/><?php }else { ?><img src="<?php echo $base_url ?>/img/noimage.jpg"  class="img img-circle"/> <?php } ?></div>
            <div class="col-md-5 col-sm-5 name_content">
                <h2><?php echo $profile['username'] ?></h2>
				 <p>  <?php if($profile['gender']=='1'){ ?>
                    <img style="height: 17px; width:25px;" src="<?php echo $base_url ?>/img/guy.png"> Guy
                    <?php }else{ ?>
                    <img src='<?php echo $base_url ?>/img/venus.png' style="height: 17px; width:13px;"/> Girl
                     <?php } ?>
                       <?php if($_GET['type'] == 'hotestuser' || $_GET['type'] == 'hotestguy' || $_GET['type'] == 'hotestgirl'){ ?>
                     <span class="user-meta"><i class="fa fa-fire"></i>&nbsp;&nbsp;<?php echo $profile['votecount']; ?></span>
                      <?php }else{ ?>
                      <img style="height: 35px; width: 35px;" src="<?php echo $base_url ?>/img/location.png"><?php echo $profile['country'] ?>
                      <?php } ?>
                </p>
                
            </div>
            <div class="col-md-5 col-sm-5 view_content"><ul class="nav navbar-nav navbar-nav3 ul">
                    <li><a href="user/profile/<?php echo $profile['username'] ?>" class="border_user">View Profile</a></li>
          <li class="dropdown">
           <a  class="border_user" style="background-color: #80bf41; color: white; border:none" data-toggle="modal" data-target="#myModal" href="">
            <b>Ask For Kik Id</b>
           </a>
         </li>
       </ul></div>
        </div>
        
         <?php } }?>
<?php
}
?>
