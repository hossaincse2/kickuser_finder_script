<?php
error_reporting(0);
session_start();
include_once 'include/class.user.php';
include_once 'include/class.member.php';
  $user = new User();
  $member = new Member();
  $users = $user->getvalue();
 // $user_timeline = $user->getvalue_user_timeline();
  $usersprofile = $member->get_girl_member();
  $allmember = $member->count_all_member();
   $guy = $member->count_guy_member();
  $girl = $member->count_girl_member();
  $recent = $member->count_recent_member();
  $hotest_girl = $member->get_hotest_girl();
 // print_r($hotest_girls);  die();
  $user_id = $_SESSION['user_session'];
?>
<?php include 'part/header.php'; ?>		<!-- 
				FIXED HEIGHT CLASSES
				
				height-300
				height-350
				height-400
				height-450
				height-500
				height-550
				height-600
				height-650
				height-700
				height-750
				height-800
			-->
			<section id="slider" class="height-450">

				<!--
					SWIPPER SLIDER PARAMS
					
					data-effect="slide|fade|coverflow"
					data-autoplay="2500|false"
				-->
				<div class="swiper-container" data-effect="slide" data-autoplay="false">
					<div class="swiper-wrapper">
						<!-- SLIDE 1 -->
						<div class="swiper-slide" style="background-image: url('assets/images/demo/1200x800/26-min.jpg');">
							<div class="overlay dark-7"><!-- dark overlay [1 to 9 opacity] --></div>
							
							<div class="display-table">
								<div class="display-table-cell vertical-align-middle">
									<div class="container">

										<div class="row">
											<div class="text-center col-md-8 col-xs-12 col-md-offset-2">

												<h1 class="bold font-raleway wow fadeInUp" data-wow-delay="0.4s">WELCOME TO SMARTY</h1>
												<p class="lead font-lato weight-300 hidden-xs wow fadeInUp" data-wow-delay="0.6s">Porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam.</p>

											</div>
										</div>
							
									</div>
								</div>
							</div>
							
						</div>
						<!-- /SLIDE 1 -->


						<!-- SLIDE 2 -->
						<div class="swiper-slide" style="background-image: url('assets/images/demo/1200x800/9-min.jpg');">
							<div class="overlay dark-4"><!-- dark overlay [1 to 9 opacity] --></div>
							
							<div class="display-table">
								<div class="display-table-cell vertical-align-middle">
									<div class="container">

										<div class="row">
											<div class="text-center col-md-8 col-xs-12 col-md-offset-2">

												<h1 class="bold font-raleway wow fadeInUp" data-wow-delay="0.4s">WELCOME TO SMARTY</h1>
												<p class="lead font-lato weight-300 hidden-xs wow fadeInUp" data-wow-delay="0.6s">Porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam.</p>

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
			<!-- /SLIDER -->
 

			<!-- -->
			<section>
				<div class="container">
                                        <!-- Portfolio Filter -->
					 <!-- Portfolio Filter -->
					<div class="text-left">
						<ul class="nav nav-tabs nav-bottom-border">
	<li class="active"><a href="#home" data-toggle="tab">All Recent Users</a></li>
	<li><a href="#menu1" data-toggle="tab">Recent Guys</a></li>
        <li><a href="#menu2" data-toggle="tab">Recent Girls</a></li>
 	 
</ul>

					</div>
					<!-- /Portfolio Filter -->

					<div class="divider divider-dotted"><!-- divider --></div>
					<div class="row">

                                       <div class="col-md-9 col-sm-9">

 
								<div class="row mix-grid">

									 <div class="tab-content">
      <!-- All Member -->
    <div id="home" class="tab-pane fade in active">
         
<!-- this will hold all the data -->
<div id="results"></div>
<!-- loading image -->
<div id="loader_image" class="load_buton"><img src="img/LoaderIcon.gif" alt="" width="24" height="24">Loading...please wait</div>
<!-- for message if data is avaiable or not -->
<div id="loader_message"></div>
<br/>
        
     </div>
       <!-- Hotest Guy -->
    <div id="menu1" class="tab-pane fade">
        <div id="results2"></div>
<!-- loading image -->
<div id="loader_image2" class="load_buton"><img src="img/LoaderIcon.gif" alt="" width="24" height="24">Loading...please wait</div>
<!-- for message if data is avaiable or not -->
<div id="loader_message2"></div>
         <br/>
      </div>
       <!-- Hotest Girl -->
    <div id="menu2" class="tab-pane fade">
        <div id="results3"></div>
<!-- loading image -->
<div id="loader_image3" class="load_buton"><img src="img/LoaderIcon.gif" alt="" width="24" height="24">Loading...please wait</div>
<!-- for message if data is avaiable or not -->
<div id="loader_message3"></div>
<br/>
    </div>
      <!-- Recent -->
       
  </div>
							</div>


						</div>
                                            
                                            
                                            
						<!-- LEFT -->
						 

						<!-- RIGHT -->
						<div class="col-md-3 col-sm-3">

							<!-- INLINE SEARCH -->
							<div class="inline-search clearfix margin-bottom-30">
								<form action="" method="get" class="widget_search">
									<input type="search" placeholder="Start Searching..." id="s" name="s" class="serch-input">
									<button type="submit">
										<i class="fa fa-search"></i>
									</button>
								</form>
							</div>
							<!-- /INLINE SEARCH -->

							<hr />

							<!-- side navigation -->
							<div class="side-nav margin-bottom-60 margin-top-30">

								<div class="side-nav-head">
									<button class="fa fa-bars"></button>
									<h4>CATEGORIES</h4>
								</div>
								<ul class="list-group list-group-bordered list-group-noicon uppercase">
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(12)</span> All Members</a></li>
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(8)</span> Kik Guys</a></li>
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(32)</span> Kik Girls</a></li>
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(16)</span> Recent Users</a></li>
 								</ul>
								<!-- /side navigation -->

							
							</div>

<div class="kik_img">
                    <img src="img/kik.png"/>
                </div>
                 <div class="kik_img">
                     <img class="" src="img/kik2.png"/>
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
								<div class="tab-content margin-bottom-60 margin-top-30">

									<!-- POPULAR -->
									<div id="tab_1" class="tab-pane active">

										<div class="row tab-post"><!-- post -->
											<div class="col-md-3 col-sm-3 col-xs-3">
												<a href="blog-sidebar-left.html">
													<img src="assets/images/demo/people/300x300/1-min.jpg" width="50" alt="" />
												</a>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-9">
												<a href="blog-sidebar-left.html" class="tab-post-link">Maecenas metus nulla</a>
												<small>June 29 2014</small>
											</div>
										</div><!-- /post -->

										<div class="row tab-post"><!-- post -->
											<div class="col-md-3 col-sm-3 col-xs-3">
												<a href="blog-sidebar-left.html">
													<img src="assets/images/demo/people/300x300/2-min.jpg" width="50" alt="" />
												</a>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-9">
												<a href="blog-sidebar-left.html" class="tab-post-link">Curabitur pellentesque neque eget diam</a>
												<small>June 29 2014</small>
											</div>
										</div><!-- /post -->

										<div class="row tab-post"><!-- post -->
											<div class="col-md-3 col-sm-3 col-xs-3">
												<a href="blog-sidebar-left.html">
													<img src="assets/images/demo/people/300x300/3-min.jpg" width="50" alt="" />
												</a>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-9">
												<a href="blog-sidebar-left.html" class="tab-post-link">Nam et lacus neque. Ut enim massa, sodales</a>
												<small>June 29 2014</small>
											</div>
										</div><!-- /post -->

									</div>
									<!-- /POPULAR -->


									<!-- RECENT -->
									<div id="tab_2" class="tab-pane">

										<div class="row tab-post"><!-- post -->
											<div class="col-md-3 col-sm-3 col-xs-3">
												<a href="blog-sidebar-left.html">
													<img src="assets/images/demo/people/300x300/4-min.jpg" width="50" alt="" />
												</a>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-9">
												<a href="blog-sidebar-left.html" class="tab-post-link">Curabitur pellentesque neque eget diam</a>
												<small>June 29 2014</small>
											</div>
										</div><!-- /post -->

										<div class="row tab-post"><!-- post -->
											<div class="col-md-3 col-sm-3 col-xs-3">
												<a href="blog-sidebar-left.html">
													<img src="assets/images/demo/people/300x300/5-min.jpg" width="50" alt="" />
												</a>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-9">
												<a href="blog-sidebar-left.html" class="tab-post-link">Maecenas metus nulla</a>
												<small>June 29 2014</small>
											</div>
										</div><!-- /post -->

										<div class="row tab-post"><!-- post -->
											<div class="col-md-3 col-sm-3 col-xs-3">
												<a href="blog-sidebar-left.html">
													<img src="assets/images/demo/people/300x300/6-min.jpg" width="50" alt="" />
												</a>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-9">
												<a href="blog-sidebar-left.html" class="tab-post-link">Quisque ut nulla at nunc</a>
												<small>June 29 2014</small>
											</div>
										</div><!-- /post -->
									</div>
									<!-- /RECENT -->

								</div>
                                                                
                                                               

							</div>
							<!-- JUSTIFIED TAB -->
 
						</div>

					</div>


				</div>
			</section>
			<!-- / -->
                         
 
 <script type="text/javascript">
var busy = false;
var limit = 10
var offset = 0;
   
function displayRecords(lim, off) {
        $.ajax({
          type: "GET",
          async: false,
          url: "getkik_girl.php",
          data: "limit=" + lim + "&offset=" + off,
          cache: false,
          beforeSend: function() {
            $("#loader_message").html("").hide();
            $('#loader_image').show();
          },
          success: function(html) {
            $("#results").append(html);
            $('#loader_image').hide();
           if (html == "") {
              $("#loader_message").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No more records.</button>').show()
            } else {
              $("#loader_message").html('<button class="btn btn-default load_buton" type="button">Load more data</button><br/>').show();
            }
            window.busy = false;
 
          }
        });
}
$(document).ready(function() {
if (busy == false) {
  busy = true;
  // start to load the first set of data
  displayRecords(limit, offset);
}
});
  
$(document).ready(function() {
        // start to load the first set of data
        displayRecords(limit, offset);

        $('#loader_message').click(function() {

          // if it has no more records no need to fire ajax request
          var d = $('#loader_message').find("button").attr("data-atr");
          if (d != "nodata") {
            offset = limit + offset;
            displayRecords(limit, offset);
          }
        });

      });



function displayRecords2(lim, off) {
        $.ajax({
          type: "GET",
          async: false,
          url: "getgirlresult.php",
          data: "limit=" + lim + "&offset=" + off,
          cache: false,
          beforeSend: function() {
            $("#loader_message2").html("").hide();
            $('#loader_image2').show();
          },
          success: function(html) {
            $("#results2").append(html);
            $('#loader_image2').hide();
           if (html == "") {
              $("#loader_message2").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No more records.</button>').show()
            } else {
              $("#loader_message2").html('<button class="btn btn-default load_buton" type="button">Load more data</button><br/>').show();
            }
            window.busy = false;
 
          }
        });
}
$(document).ready(function() {
if (busy == false) {
  busy = true;
  // start to load the first set of data
  displayRecords2(limit, offset);
}
});
  
$(document).ready(function() {
        // start to load the first set of data
        displayRecords2(limit, offset);

        $('#loader_message2').click(function() {

          // if it has no more records no need to fire ajax request
          var d = $('#loader_message2').find("button").attr("data-atr");
          if (d != "nodata") {
            offset = limit + offset;
            displayRecords2(limit, offset);
          }
        });

      });

    

function displayRecords3(lim, off) {
        $.ajax({
          type: "GET",
          async: false,
          url: "getkik_girl_recent.php",
          data: "limit=" + lim + "&offset=" + off,
          cache: false,
          beforeSend: function() {
            $("#loader_message3").html("").hide();
            $('#loader_image3').show();
          },
          success: function(html) {
            $("#results3").append(html);
            $('#loader_image3').hide();
            if (html == "") {
              $("#loader_message3").html('<button data-atr="nodata" class="btn btn-default load_buton" type="button">No more records.</button>').show()
            } else {
              $("#loader_message3").html('<button class="btn btn-default load_buton" type="button">Load more data</button>').show();
            }
            window.busy = false;
 
          }
        });
}
  $(document).ready(function() {
if (busy == false) {
  busy = true;
  // start to load the first set of data
  displayRecords3(limit, offset);
}
});
  
$(document).ready(function() {
        // start to load the first set of data
        displayRecords3(limit, offset);

        $('#loader_message3').click(function() {

          // if it has no more records no need to fire ajax request
          var d = $('#loader_message3').find("button").attr("data-atr");
          if (d != "nodata") {
            offset = limit + offset;
            displayRecords3(limit, offset);
          }
        });

      });






$(document).ready(function() {
      
      
       $('#exampleModal6').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
   //alert('sdsd');
  console.log(recipient);
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title')
  modal.find("#w3").attr("href", "http://kik.me/u/" + recipient);
  //$("#w3").attr("href", "http://www.w3schools.com/jquery");
  modal.find('#kik').val(recipient)
  //modal.find('.kikuser').html(recipient)
});

  $('#example6').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
   //alert('sdsd');
  console.log(recipient);
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title23')
  //$("#w3").attr("href", "http://www.w3schools.com/jquery");
  modal.find('#kik323').val(recipient)
  //modal.find('.kikuser').html(recipient)
});

});



$(document).ready(function() {
      
      
       $('#exampleModal10').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
   //alert('sdsd');
  console.log(recipient);
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
 var link = modal.find('.modal-title')
  //$("#w3").attr("href", "http://www.w3schools.com/jquery");
  modal.find('#kik').val(recipient)
  //modal.find('.kikuser').html(recipient)
});

  $('#example10').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
   //alert('sdsd');
  console.log(recipient);
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title23')
  //$("#w3").attr("href", "http://www.w3schools.com/jquery");
  modal.find('#kik323').val(recipient)
  //modal.find('.kikuser').html(recipient)
});

}); 
  </script>
<?php include 'part/footer.php'; ?>

