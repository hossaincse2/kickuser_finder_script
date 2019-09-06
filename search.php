<?php
error_reporting(0);
session_start();
include_once 'include/class.user.php';
include_once 'include/class.member.php';
  $user = new User();
  $member = new Member();
  $users = $user->getvalue();
   $usersprofile = $user->get_all_user();
  $countries = $user->getcountry();
  $cities = $user->select_city();
   $user_id = $_SESSION['user_session'];
 if(isset($_POST['submit']))
{
 $username = $_POST['username'];
  
 $myarray = array('username'=>$username);
 $stmt = $user->_dbh->prepare("SELECT * from users where username like '%$username%' order by id DESC");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($results[0]['username'] == ''){ 
                $message1 = '<p>Sorry,No User Found From this Username</p>';
             }  
 }
  if(isset($_POST['submit2']))
{
 $country = $_POST['country'];
  
 $myarray = array('username'=>$country);
 $stmt = $user->_dbh->prepare("SELECT * from users where country like '%$country%' order by id DESC");
        $stmt->execute();
        $results2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($results2[0]['username'] == ''){ 
                $message2 = '<p>Sorry,No User Found From this Country</p>';
             } 
    }
 if(isset($_POST['submit3']))
{
 $city = $_POST['city'];
  
 $myarray = array('username'=>$country);
 $stmt = $user->_dbh->prepare("SELECT * from users where city like '%$city%' order by id DESC");
        $stmt->execute();
        $results3 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($results3[0]['username'] == ''){ 
                $message3 = '<p>Sorry,No User Found From this City</p>';
             } 
 }
?>
<?php include 'part/header.php'; ?>  

      <!-- /PAGE HEADER -->
                         <?php if($user_id != ''){ ?>
  
<section>
          <div class="container">
          <div class="row">
            <!-- RIGHT -->
            <div class="col-md-9 col-sm-9">
                         <h3>Search By Username</h3>
            <!-- SEARCH -->
                              <form method="post" action="" class="clearfix well well-sm search-big margin-bottom-20">
                                <div class="input-group">
                                  <input class="form-control input-lg" type="text" name="username" placeholder="Search By Username...">
                                  <div class="input-group-btn">
                                    <button type="submit" name="submit" class="btn btn-default input-lg noborder-left">
                                      <i class="fa fa-search fa-lg nopadding"></i>
                                    </button>
                                  </div>
                                </div>

                              </form>
          <!-- /SEARCH -->  <!-- SEARCH RESULTS -->
                                        <?php if($results[0]['username'] == ''){?>
                                             <?php echo $message1; ?>
                                           <?php }else{  ?>
                                      <?php foreach ($results as $profile) { ?>
     <div class="row user">
            <div class="col-md-2 blog_img"><?php if($profile['kik_img']!=''){ ?><img src="<?php echo $profile['kik_img'] ?>"  class="img img-circle"/><?php }else { ?><img src="img/noimage.jpg"  class="img img-circle"/> <?php } ?></div>
            <div class="col-md-5 name_content">
                <h2><?php echo $profile['username'] ?></h2>
                <p> <?php if($profile['gender']=='1'){ ?>
                    <img src='img/guy.png' style="height: 17px; width:25px;"/> Guy
                <?php }else{ ?>
                    <img src='img/venus.png' style="height: 17px; width:13px;"/> Girl
                 <?php } ?>
                  <img  src='img/location.png' style="height: 35px; width: 35px;" /><?php echo $profile['country'] ?></p>
            </div>
            <div class="col-md-5 name_content"><ul class="nav navbar-nav navbar-nav3 ul">
                    <li><a class="border_user" href="<?php echo $base_url ?>/user/profile/<?php echo $profile['username'] ?>">View Profile</a></li>
          <li class="dropdown">
           <a href="<?php echo $profile['id'] ?>" class="border_user current" style="background-color: #80bf41; color: white; border:none" data-toggle="modal" data-target="#exampleModal62,<?php echo $profile['id']; ?>" data-whatever="<?php echo $profile['kikuser']; ?>">
            <b>Ask For Kik Id</b>
           </a>
         </li>
       </ul></div>
        </div>
                 
              <?php } } ?> 
 <br/> 
                      <h3>Search By Country</h3>
              <form method="post" action="" class="clearfix well well-sm search-big  margin-bottom-20">
                                   <div class="input-group">
                                                    <div class="fancy-form fancy-form-select">
                                                       <select class="form-control" name="country">
                                                           <option value="" title="United Kingdom">Select Country</option>
                                                        <?php foreach ($countries as $value) { ?>
                                                         <option value="<?php echo $value['counrty_name']; ?>" title="<?php echo $value['counrty_name']; ?>"><?php echo $value['counrty_name']; ?></option>
                                                     <?php } ?> </select>
                                                        <i class="fancy-arrow"></i>
                                                    </div>
                                                    <div class="input-group-btn">
                                                      <button type="submit" name="submit2" class="btn btn-default input-lg noborder-left">
                                                        <i class="fa fa-search fa-lg nopadding"></i>
                                                      </button>
                                                    </div>
                                 </div>
              </form>
                                           <?php if($results2[0]['username'] == ''){?>
                                             <?php echo $message2; ?>
                                           <?php }else{  ?>
                                            <?php foreach ($results2 as $profile) { ?>
     <div class="row user">
            <div class="col-md-2 blog_img"><?php if($profile['kik_img']!=''){ ?><img src="<?php echo $profile['kik_img'] ?>"  class="img img-circle"/><?php }else { ?><img src="img/noimage.jpg"  class="img img-circle"/> <?php } ?></div>
            <div class="col-md-5 name_content">
                <h2><?php echo $profile['username'] ?></h2>
                <p> <?php if($profile['gender']=='1'){ ?>
                    <img src='img/guy.png' style="height: 17px; width:25px;"/> Guy
                <?php }else{ ?>
                    <img src='img/venus.png' style="height: 17px; width:13px;"/> Girl
                 <?php } ?>
                  <img  src='img/location.png' style="height: 35px; width: 35px;" /><?php echo $profile['country'] ?></p>
            </div>
            <div class="col-md-5 name_content"><ul class="nav navbar-nav navbar-nav3 ul">
                    <li><a class="border_user" href="<?php echo $base_url ?>/user/profile/<?php echo $profile['username'] ?>">View Profile</a></li>
          <li class="dropdown">
           <a href="<?php echo $profile['id'] ?>" class="border_user current" style="background-color: #80bf41; color: white; border:none" data-toggle="modal" data-target="#exampleModal62,<?php echo $profile['id']; ?>" data-whatever="<?php echo $profile['kikuser']; ?>">
            <b>Ask For Kik Id</b>
           </a>
         </li>
       </ul>
   </div>
</div>
 <?php } }?> 
                                          <br/>
                                           
                                           <h3>Search By City</h3>
                                        <form method="post" action="" class="clearfix well well-sm search-big  margin-bottom-20">
            <div class="input-group">
                                                    <div class="fancy-form fancy-form-select">
                                                       <select class="form-control" name="city">
                                                           <option value="" title="">Select City</option>
                                                        <?php foreach ($cities as $value) { ?>
                                                         <option value="<?php echo $value['city']; ?>" title="<?php echo $value['city']; ?>"><?php echo $value['city']; ?></option>
                                                     <?php } ?> </select>
                                                        <i class="fancy-arrow"></i>
</div>
              <div class="input-group-btn">
                <button type="submit" name="submit3" class="btn btn-default input-lg noborder-left">
                  <i class="fa fa-search fa-lg nopadding"></i>
                </button>
              </div>
            </div>

          </form>
                                           <?php if($results3[0]['username'] == ''){?>
                                             <?php echo $message3; ?>
                                           <?php }else{  ?>
                                            <?php foreach ($results3 as $profile) { ?>
     <div class="row user">
            <div class="col-md-2 blog_img"><?php if($profile['kik_img']!=''){ ?><img src="<?php echo $profile['kik_img'] ?>"  class="img img-circle"/><?php }else { ?><img src="img/noimage.jpg"  class="img img-circle"/> <?php } ?></div>
            <div class="col-md-5 name_content">
                <h2><?php echo $profile['username'] ?></h2>
                <p> <?php if($profile['gender']=='1'){ ?>
                    <img src='img/guy.png' style="height: 17px; width:25px;"/> Guy
                <?php }else{ ?>
                    <img src='img/venus.png' style="height: 17px; width:13px;"/> Girl
                 <?php } ?>
                  <img  src='img/location.png' style="height: 35px; width: 35px;" /><?php echo $profile['country'] ?></p>
            </div>
            <div class="col-md-5 name_content"><ul class="nav navbar-nav navbar-nav3 ul">
                    <li><a class="border_user" href="<?php echo $base_url ?>/user/profile/<?php echo $profile['username'] ?>">View Profile</a></li>
          <li class="dropdown">
           <a href="<?php echo $profile['id'] ?>" class="border_user current" style="background-color: #80bf41; color: white; border:none" data-toggle="modal" data-target="#exampleModal62,<?php echo $profile['id']; ?>" data-whatever="<?php echo $profile['kikuser']; ?>">
            <b>Ask For Kik Id</b>
           </a>
         </li>
       </ul></div>
        </div>
                 
<?php } } ?> 
  </div>
             <!-- LEFT -->
   <div class="col-md-3 col-md-3">
              <div class="kik_img">
                  <a href="kikguys.php"><img src="img/kik.png"/> </a>
              </div>
              <div class="kik_img">
                     <a href="kikgirl.php"><img class="" src="img/kik2.png"/></a> 
               </div>
            </div>
    </div>

         </div>
      </section>
      <div class="modal fade" id="exampleModal62" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
               Copy and paste <span id="copykik"></span> Kik username or go directly to their <a target="_blank" id="w3"  href="http://kik.me/u/">Kik online profile</a>.
           </p>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
    </form>
    </div>
  </div>
</div>
  <?php }else { ?>
                                                        
    <section>
         <div class="container">
           <div class="row">
             <!-- RIGHT -->
            <div class="col-md-9 col-sm-9">
                                                    <h3>Search By Username</h3>
            <!-- SEARCH -->
          <form method="post" action="" class="clearfix well well-sm search-big margin-bottom-20">
            <div class="input-group">
                <input class="form-control input-lg" type="text" name="username" placeholder="Search By Username...">
              <div class="input-group-btn">
                <button type="submit" name="submit" class="btn btn-default input-lg noborder-left">
                  <i class="fa fa-search fa-lg nopadding"></i>
                </button>
              </div>
            </div>

          </form>
          <!-- /SEARCH -->  <!-- SEARCH RESULTS -->
               
                                                       <?php if($results[0]['username'] == ''){?>
                                                           <?php echo $message1; ?>
                                                          <?php } else{  ?>
                                                         <?php foreach ($results as $profile) { ?>
     <div class="row user">
            <div class="col-md-2 blog_img"><?php if($profile['kik_img']!=''){ ?><img src="<?php echo $profile['kik_img'] ?>"  class="img img-circle"/><?php }else { ?><img src="img/noimage.jpg"  class="img img-circle"/> <?php } ?></div>
            <div class="col-md-5 name_content">
                <h2><?php echo $profile['username'] ?></h2>
                <p> <?php if($profile['gender']=='1'){ ?>
                    <img src='img/guy.png' style="height: 17px; width:25px;"/> Guy
                <?php }else{ ?>
                    <img src='img/venus.png' style="height: 17px; width:13px;"/> Girl
                 <?php } ?>
                  <img  src='img/location.png' style="height: 35px; width: 35px;" /><?php echo $profile['country'] ?></p>
            </div>
            <div class="col-md-5 name_content"><ul class="nav navbar-nav navbar-nav3 ul">
                    <li><a class="border_user" href="<?php echo $base_url ?>/user/profile/<?php echo $profile['username'] ?>">View Profile</a></li>
          <li class="dropdown">
           <a href="<?php echo $profile['id'] ?>" class="border_user current" style="background-color: #80bf41; color: white; border:none" data-toggle="modal" data-target="#example62,<?php echo $profile['id']; ?>" data-whatever="<?php echo $profile['kikuser']; ?>">
            <b>Ask For Kik Id</b>
           </a>
         </li>
       </ul></div>
        </div>
                 
<?php } } ?> 
                                         <br/>    
                                        
                                          <h3>Search By Country</h3>
                                  <form method="post" action="" class="clearfix well well-sm search-big  margin-bottom-20">
                                        <div class="input-group">
                                                    <div class="fancy-form fancy-form-select">
                                                       <select class="form-control" name="country">
                                                           <option value="" title="United Kingdom">Select Country</option>
                                                        <?php foreach ($countries as $value) { ?>
                                                         <option value="<?php echo $value['counrty_name']; ?>" title="United Kingdom"><?php echo $value['counrty_name']; ?></option>
                                                     <?php } ?> </select>
                                                        <i class="fancy-arrow"></i>
                                                  </div>
                                                  <div class="input-group-btn">
                                                    <button type="submit" name="submit2" class="btn btn-default input-lg noborder-left">
                                                      <i class="fa fa-search fa-lg nopadding"></i>
                                                    </button>
                                                  </div>
                                         </div>

                                  </form>
                                           <?php if($results2[0]['username'] == ''){?>
                                                           <?php echo $message2; ?>
                                                          <?php }else{  ?>
                                            <?php foreach ($results2 as $profile) { ?>
     <div class="row user">
            <div class="col-md-2 blog_img"><?php if($profile['kik_img']!=''){ ?><img src="<?php echo $profile['kik_img'] ?>"  class="img img-circle"/><?php }else { ?><img src="img/noimage.jpg"  class="img img-circle"/> <?php } ?></div>
            <div class="col-md-5 name_content">
                <h2><?php echo $profile['username'] ?></h2>
                <p> <?php if($profile['gender']=='1'){ ?>
                    <img src='img/guy.png' style="height: 17px; width:25px;"/> Guy
                <?php }else{ ?>
                    <img src='img/venus.png' style="height: 17px; width:13px;"/> Girl
                 <?php } ?>
                  <img  src='img/location.png' style="height: 35px; width: 35px;" /><?php echo $profile['country'] ?></p>
            </div>
            <div class="col-md-5 name_content"><ul class="nav navbar-nav navbar-nav3 ul">
                    <li><a class="border_user" href="<?php echo $base_url ?>/user/profile/<?php echo $profile['username'] ?>">View Profile</a></li>
          <li class="dropdown">
           <a href="<?php echo $profile['id'] ?>" class="border_user current" style="background-color: #80bf41; color: white; border:none" data-toggle="modal" data-target="#example62,<?php echo $profile['id']; ?>" data-whatever="<?php echo $profile['kikuser']; ?>">
            <b>Ask For Kik Id</b>
           </a>
         </li>
       </ul></div>
        </div>
                 
<?php } } ?> 
              
  <br/>
                                           
                                           <h3>Search By City</h3>
                                  <form method="post" action="" class="clearfix well well-sm search-big  margin-bottom-20">
                                         <div class="input-group">
                                                    <div class="fancy-form fancy-form-select">
                                                       <select class="form-control" name="city">
                                                           <option value="" title="">Select City</option>
                                                        <?php foreach ($cities as $value) { ?>
                                                         <option value="<?php echo $value['city']; ?>" title="<?php echo $value['city']; ?>"><?php echo $value['city']; ?></option>
                                                     <?php } ?> </select>
                                                        <i class="fancy-arrow"></i>
                                          </div>
                                                    <div class="input-group-btn">
                                                      <button type="submit" name="submit3" class="btn btn-default input-lg noborder-left">
                                                        <i class="fa fa-search fa-lg nopadding"></i>
                                                      </button>
                                                    </div>
                                                  </div>

                                 </form>
                                           <?php if($results3[0]['username'] == ''){?>
                                                           <?php echo $message3; ?>
                                                          <?php }else{  ?>
                                            <?php foreach ($results3 as $profile) { ?>
     <div class="row user">
            <div class="col-md-2 blog_img"><?php if($profile['kik_img']!=''){ ?><img src="<?php echo $profile['kik_img'] ?>"  class="img img-circle"/><?php }else { ?><img src="img/noimage.jpg"  class="img img-circle"/> <?php } ?></div>
            <div class="col-md-5 name_content">
                <h2><?php echo $profile['username'] ?></h2>
                <p> <?php if($profile['gender']=='1'){ ?>
                    <img src='img/guy.png' style="height: 17px; width:25px;"/> Guy
                <?php }else{ ?>
                    <img src='img/venus.png' style="height: 17px; width:13px;"/> Girl
                 <?php } ?>
                  <img  src='img/location.png' style="height: 35px; width: 35px;" /><?php echo $profile['country'] ?></p>
            </div>
            <div class="col-md-5 name_content"><ul class="nav navbar-nav navbar-nav3 ul">
                    <li><a class="border_user" href="<?php echo $base_url ?>/user/profile/<?php echo $profile['username'] ?>">View Profile</a></li>
          <li class="dropdown">
           <a href="<?php echo $profile['id'] ?>" class="border_user current" style="background-color: #80bf41; color: white; border:none" data-toggle="modal" data-target="#example62,<?php echo $profile['id']; ?>" data-whatever="<?php echo $profile['kikuser']; ?>">
            <b>Ask For Kik Id</b>
           </a>
         </li>
       </ul></div>
        </div>
                 
<?php } } ?> 
             </div>

            <!-- LEFT -->
            <div class="col-md-3 col-md-3">
                  <div class="kik_img">
                        <a href="kikguys.php"><img src="img/kik.png"/> </a>
                  </div>
                 <div class="kik_img">
                     <a href="kikgirl.php"><img class="" src="img/kik2.png"/></a> 
                </div>
            </div>
        </div>
    </div>
</section>
      <div class="modal fade" id="example62" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
                                                <?php  } ?> 

         <script>
$(document).ready(function() {
      
    $('#exampleModal62').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)  
      var recipient = button.data('whatever')  
      console.log(recipient);
      var modal = $(this)
      modal.find('.modal-title')
      modal.find("#w3").attr("href", "http://kik.me/u/" + recipient);
      modal.find('#kik').val(recipient);
      modal.find('#copykik').html(recipient);
    });

    $('#example62').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)  
      var recipient = button.data('whatever')  
      console.log(recipient);
      var modal = $(this)
      modal.find('.modal-title23')
      modal.find('#kik323').val(recipient)
    });

});
 
 
</script>
      <!-- / -->
<?php include 'part/footer.php'; ?>

