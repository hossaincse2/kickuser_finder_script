<?php
error_reporting(0);
session_start();
include_once 'include/class.user.php'; 
$user = new User();
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 10;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;
$user_id = $_SESSION['user_session'];
if($_GET['type'] == 'hotestuser'){
    $sql = "SELECT *, count(*) as votecount FROM vote INNER JOIN users ON vote.profileid=users.username where users.suspended = 1 and users.kik_img  != '' group by vote.profileid order by votecount DESC LIMIT $limit OFFSET $offset";
  }
 if($_GET['type'] == 'hotestguy'){
     $sql = "SELECT *, count(*) as votecount FROM vote INNER JOIN users ON vote.profileid=users.username where users.gender = 1 and users.suspended = 1 and users.kik_img  != '' group by vote.profileid order by votecount desc LIMIT $limit OFFSET $offset";
 }
 if($_GET['type'] == 'hotestgirl'){
    $sql = "SELECT *, count(*) as votecount FROM vote INNER JOIN users ON vote.profileid=users.username where users.gender = 2 and users.suspended = 1 and users.kik_img  != '' group by vote.profileid order by votecount desc LIMIT $limit OFFSET $offset"; 
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
           <a data-whatever="<?php echo $profile['kikuser']; ?>" data-target="#exampleModal11" data-toggle="modal" style="background-color: #80bf41; color: white; border:none" class="border_user current" href="">
            <b>Ask For Kik Id</b>
           </a>
         </li>
       </ul></div>
        </div>

<?php } ?> 
    
    <div class="modal fade" id="exampleModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Kik UserName</h4>
      </div>
        <form method="post" action="">
      <div class="modal-body">
            <div class="form-group">
             <input class="form-control" id="kik" name="" id="message-text" />
          </div>
          <p>
               Copy and paste <?php echo $profile['kikuser'] ?> Kik username or go directly to their <a target="_blank" id="w3"  href="http://kik.me/u/">Kik online profile</a>.
           </p>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
    </form>
    </div>
  </div>
</div>
    <?php }else{ ?> 
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
           <a data-whatever3="<?php echo $profile['kikuser']; ?>" data-target="#example11" data-toggle="modal" style="background-color: #80bf41; color: white; border:none" class="border_user current" href="">
            <b>Ask For Kik Id</b>
           </a>
         </li>
       </ul></div>
        </div>
        <?php } }?>

   <div class="modal fade" id="example11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Kik UserName</h4>
      </div>
        <form method="post" action="">
      <div class="modal-body">
          <p>You must be logged in to view <b class="modal-title23"></b> Kik username.</p>
      </div>
      <div class="modal-footer">
          <div class="row">
        <div class="col-md-6 col-sm-6">
            <a class="btn btn-primary btn-lg btn-block" href="login.php">Login</a>
        </div>
        <div class="col-md-6 col-sm-6">
            <a class="btn btn-success btn-lg btn-block" href="registration.php">Create Account</a>
        </div>
        </div>
        </div>
    </form>
    </div>
  </div>
</div>
 
<?php
}
?>