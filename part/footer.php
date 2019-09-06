<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Kik UserName</h4>
              </div>
                <form method="post" action="">
                  <div class="modal-body">
                        <div class="form-group">
                         <input class="form-control" id="kik" name=""  />
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

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ask For Kik Username Login Please</h4>
      </div>

      <!-- Modal Body -->
    <div class="modal-body">
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <a class="btn btn-primary btn-lg btn-block" style="color:white" href="login.php">Login</a>
        </div>
        <div class="col-md-6 col-sm-6">
            <a class="btn btn-success btn-lg btn-block" style="color:white" href="registration.php">Create Account</a>
        </div>
        </div>
  </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
 <!-- FOOTER -->
<footer id="footer">
    <div class="container">
         <div class="row">
             <div class="col-md-4">
                <!-- Footer Logo -->
                <img class="footer-logo" style="width: 250px; height: 40px;" src="<?php echo $base_url ?>/assets/images/kiklogo.png" alt="" />
                  <address>
                    <ul class="list-unstyled">
                        <p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet.Integer posuere erat a ante venenatis dapibus posuere velit aliquet.Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p> 
                    </ul>
                </address>
              </div>
             <div class="col-md-4">
                 <!-- Latest Blog Post -->
                <h4 class="letter-spacing-1">LATEST BLOG</h4>
                <ul class="footer-posts list-unstyled">
                    <?php foreach ($latest_blog as $profile) { ?>
                        <li style="padding-bottom: 0px;">
                             <div class="clearfix margin-bottom-0"><!-- post item -->
                                <h4 class="size-14 nomargin noborder nopadding"><a href="blog/<?php echo $profile['slug'] ?>"><?php echo $profile['title'] ?></a></h4>
                             </div><!-- /post item -->
                         </li>
                    <?php } ?>
                 </ul>
                <!-- /Latest Blog Post -->
             </div>
             <div class="col-md-4">
                 <!-- Newsletter Form -->
                <h4 class="letter-spacing-1">KEEP IN TOUCH</h4>
                <p>Subscribe to Our Newsletter to get Important News &amp; Offers</p>
                 <form   id="search-form" action="" method="post">
                    <input type="hidden" name="ip_address2" value='<?php echo $ip ?>'/>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email"  id="email" name="email" class="form-control required" placeholder="Enter your Email">
                        <span class="input-group-btn">
                            <button class="btn btn-success"  name="submitmail" type="submit">Subscribe</button>
                        </span>
                    </div>
                </form>
                  <!-- Social Icons -->
                <div class="margin-top-20">
                    <a href="https://www.facebook.com/" class="social-icon social-icon-border social-facebook pull-left" data-toggle="tooltip" data-placement="top" title="Facebook">
                         <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                    </a>
                     <a href="https://twitter.com/" class="social-icon social-icon-border social-twitter pull-left" data-toggle="tooltip" data-placement="top" title="Twitter">
                        <i class="icon-twitter"></i>
                        <i class="icon-twitter"></i>
                    </a>
                     <a href="https://plus.google.com/" class="social-icon social-icon-border social-gplus pull-left" data-toggle="tooltip" data-placement="top" title="Google plus">
                        <i class="icon-gplus"></i>
                        <i class="icon-gplus"></i>
                    </a>
                 </div>
                <!-- /Social Icons -->
             </div>
         </div>
     </div>
     <div class="copyright">
        <div class="container">
            <ul class="pull-right nomargin list-inline mobile-block">
                <li><a href="<?php echo $base_url ?>/terms.php">Terms &amp; Conditions</a></li>
                <li>&bull;</li>
                <li><a href="<?php echo $base_url ?>/privice.php">Privacy</a></li>
            </ul>
            We are not affiliated with or endorsed by kik interactive inc.
        </div>
     </div>
</footer>
<!-- /FOOTER -->
 </div>
<!-- /wrapper -->
<!-- SCROLL TO TOP -->
<a href="#" id="toTop"></a>
<!-- JAVASCRIPT FILES -->
<script>
    	$(document).ready(function() {
    $('#exampleModal').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget)  
       var recipient = button.data('whatever')  
       console.log(recipient);
       var modal = $(this)
       modal.find('.modal-title')
       modal.find("#w3").attr("href", "http://kik.me/u/" + recipient);
       modal.find('#kik').val(recipient);
       modal.find('#copykik').html(recipient);
    });

    $('#example2').on('show.bs.modal', function (event) {
        var button3 = $(event.relatedTarget)  
        var recipient3 = button3.data('whatever3')  
        console.log(recipient3);
        var modal = $(this)
        modal.find('.modal-title23')
        modal.find('#kik323').val(recipient3)
   });

});
    </script>
     
<script type="text/javascript" src="<?php echo $base_url ?>/assets/js/custom.js"></script>
<script type="text/javascript">var plugin_path = '<?php echo $base_url ?>/assets/plugins/';</script>
<script type="text/javascript" src="<?php echo $base_url ?>/assets/js/scripts.js"></script>
<script type="text/javascript" src="<?php echo $base_url ?>/assets/plugins/slider.swiper/dist/js/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url ?>/assets/js/view/demo.swiper_slider.js"></script>
</body>
</html>