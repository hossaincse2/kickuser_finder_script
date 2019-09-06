<?php
error_reporting(0);
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include_once 'include/class.user.php';
include_once 'include/class.member.php';
$user = new User();
$member = new Member();
$users = $user->getvalue();
$usersprofile = $user->get_all_user();
$recent_member = $member->get_recent_member();
$allmember = $member->count_all_member();
$guy = $member->count_guy_member();
$girl = $member->count_girl_member();
$hotest_girl = $member->get_hotest_girl();
$hotest_guy = $member->get_hotest_guys();
$recent = $member->count_recent_member();
$get_girl_top5 = $member->get_girl_top5();
$get_guys_top5 = $member->get_guys_top5();
$user_id = $_SESSION['user_session'];
?>
<?php include 'part/header.php'; ?>	
 <section id="slider" class="height-400">
     <div class="swiper-container" data-effect="slide" data-autoplay="false">
        <div class="swiper-wrapper">
            <!-- SLIDE 1 -->
            <div class="swiper-slide" style="background-image: url('img/kik-slider-1.jpg');">
                <div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

                <div class="display-table">
                    <div class="display-table-cell vertical-align-middle">
                        <div class="container">
                             <div class="row">
                                <div class="margin-top-40 text-center col-md-8 col-xs-12 col-md-offset-2">
                                     <h1 class="bold font-raleway wow fadeInUp" data-wow-delay="0.4s">WELCOME TO FIND KIK USER</h1>
                                    <p class="lead font-lato weight-300 hidden-xs wow fadeInUp" data-wow-delay="0.6s">Perfect site to find best kik usernames. Find girls kik usernames or boys.</p>
                                 </div>
                            </div>
                         </div>
                    </div>
                </div>
             </div>
             <!-- SLIDE 2 -->
            <div class="swiper-slide" style="background-image: url('img/kik-slider-2.jpg');">
                <div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>
                <div class="display-table">
                    <div class="display-table-cell vertical-align-middle">
                        <div class="container">
                            <div class="row">
                                <div class="margin-top-40 text-center col-md-8 col-xs-12 col-md-offset-2">
                                    <h1 class="bold font-raleway wow fadeInUp" data-wow-delay="0.4s">List Your Username For Free</h1>
                                    <p class="lead font-lato weight-300 hidden-xs wow fadeInUp" data-wow-delay="0.6s">Find thousands of friends from your location or get known by just submitting your kik username.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /SLIDE 2 -->
        </div>
        <!-- Swiper Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Swiper Arrows -->
        <div class="swiper-button-next"><i class="icon-angle-right"></i></div>
        <div class="swiper-button-prev"><i class="icon-angle-left"></i></div>
    </div>
 </section>
 <section>
    <div class="container">
        <!-- Portfolio Filter -->
        <div class="text-left">
            <ul class="nav nav-tabs nav-bottom-border">
                <li class="active"><a href="#home" data-toggle="tab">All Users</a></li>
                <li><a href="#menu1" data-toggle="tab">Guys</a></li>
                <li><a href="#menu2" data-toggle="tab">Girls</a></li>
                <li><a href="#menu3" data-toggle="tab">Recent Users</a></li>
             </ul>
         </div>
          <div class="divider divider-dotted"><!-- divider --></div>
        <div class="row">
             <div class="col-md-9 col-sm-9">
                  <div class="mix-grid">
                     <div class="tab-content">
                        <!-- All Member -->
                        <div id="home" class="tab-pane fade in active">

                            <!-- this will hold all the data -->
                            <div id="results"></div>
                            <!-- loading image -->
                            <div class="loader_image" class="load_buton2"><img src="<?php echo $base_url ?>/img/LoaderIcon.gif" alt="" width="24" height="24">Loading...please wait</div>
                            <!-- for message if data is avaiable or not -->
                            <div class="loader_message"></div>
                            <br/>

                        </div>
                        <!-- Hotest Guy -->
                        <div id="menu1" class="tab-pane fade">
                            <div id="results2"></div>
                            <!-- loading image -->
                            <div class="loader_image" class="load_buton2"><img src="<?php echo $base_url ?>/img/LoaderIcon.gif" alt="" width="24" height="24">Loading...please wait</div>
                            <!-- for message if data is avaiable or not -->
                            <div class="loader_message2"></div>
                            <br/>
                        </div>
                        <!-- Hotest Girl -->
                        <div id="menu2" class="tab-pane fade">
                            <div id="results3"></div>
                            <!-- loading image -->
                            <div class="loader_image" class="load_buton2"><img src="<?php echo $base_url ?>/img/LoaderIcon.gif" alt="" width="24" height="24">Loading...please wait</div>
                            <!-- for message if data is avaiable or not -->
                            <div class="loader_message3"></div>
                            <br/>
                        </div>
                        <!-- Recent -->
                        <div id="menu3" class="tab-pane fade">
                            <div id="results4"></div>
                            <!-- loading image -->
                            <div class="loader_image" class="load_buton2"><img src="<?php echo $base_url ?>/img/LoaderIcon.gif" alt="" width="24" height="24">Loading...please wait</div>
                            <!-- for message if data is avaiable or not -->
                            <div class="loader_message4"></div>
                            <br/>
                        </div>
                    </div>
                </div>
              </div>     
              <!-- Right Side -->
             <?php include 'part/rightsideber.php'; ?>
         </div>
      </div>
</section>
<!-- Ajax -->
<style>
   .loader_image,.loader_message,.loader_message2,.loader_message3,.loader_message4{
        text-align: center;
    }
</style>
<script type="text/javascript" src="<?php echo $base_url ?>/assets/js/index.js"></script>    
<?php include 'part/footer.php'; ?>

