<?php
error_reporting(0);
session_start();
include_once 'include/class.user.php'; 
$user = new User();
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 10;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;
$user_id = $_SESSION['user_session'];

$sql = "SELECT *, count(*) as votecount FROM vote INNER JOIN users ON vote.profileid=users.id where users.suspended = 1  group by vote.profileid and users.kik_img  != '' order by vote.id DESC LIMIT $limit OFFSET $offset";
try {
  $stmt = $user->_dbh->prepare($sql);
  $stmt->execute();
  $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}
if (count($results) > 0) {
     if($user_id != ''){  
  foreach ($results as $profile) { ?>
     <div class="row user">
            <div class="col-md-2 blog_img"><?php if($profile['kik_img']!=''){ ?><img src="<?php echo $profile['kik_img'] ?>"  class="img img-circle"/><?php }else { ?><img src="img/noimage.jpg"  class="img img-circle"/> <?php } ?></div>
            <div class="col-md-5 name_content">
                <h2><?php echo $profile['username'] ?></h2>
                <p>  <?php if($profile['gender']=='1'){ ?>
                    <img style="height: 17px; width:25px;" src="img/guy.png"> Guy
                    <?php }else{ ?>
                    <img src='img/venus.png' style="height: 17px; width:13px;"/> Girl
                     <?php } ?>
                    <img style="height: 35px; width: 35px;" src="img/location.png"><?php echo $profile['country'] ?></p>
            </div>
            <div class="col-md-5 view_content"><ul class="nav navbar-nav navbar-nav3 ul">
                    <li><a href="user/profile/<?php echo $profile['username'] ?>" class="border_user">View Profile</a></li>
          <li class="dropdown">
           <a data-whatever3="<?php echo $profile['kikuser']; ?>" data-target="#exampleModal" data-toggle="modal" style="background-color: #80bf41; color: white; border:none" class="border_user current" href="3">
            <b>Ask For Kik Id</b>
           </a>
         </li>
       </ul></div>
        </div>

<?php } }else{ ?> 
         <?php foreach ($results as $profile){ ?>
        <div class="row user">
            <div class="col-md-2 blog_img"><?php if($profile['kik_img']!=''){ ?><img src="<?php echo $profile['kik_img'] ?>"  class="img img-circle"/><?php }else { ?><img src="img/noimage.jpg"  class="img img-circle"/> <?php } ?></div>
            <div class="col-md-5 name_content">
                <h2><?php echo $profile['username'] ?></h2>
                <p>  <?php if($profile['gender']=='1'){ ?>
                    <img style="height: 17px; width:25px;" src="img/guy.png"> Guy
                    <?php }else{ ?>
                    <img src='img/venus.png' style="height: 17px; width:13px;"/> Girl
                     <?php } ?>
                    <img style="height: 35px; width: 35px;" src="img/location.png">United Kingdom</p>
            </div>
            <div class="col-md-5 view_content"><ul class="nav navbar-nav navbar-nav3 ul">
                    <li><a href="user/profile/<?php echo $profile['username'] ?>" class="border_user">View Profile</a></li>
          <li class="dropdown">
           <a data-whatever3="<?php echo $profile['kikuser']; ?>" data-target="#exampleModal" data-toggle="modal" style="background-color: #80bf41; color: white; border:none" class="border_user current" href="3">
            <b>Ask For Kik Id</b>
           </a>
         </li>
       </ul></div>
        </div>
        
         <?php } }
}
?>