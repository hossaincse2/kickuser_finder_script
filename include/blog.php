<?php
error_reporting(0);
session_start();
include_once 'include/class.user.php';
include_once 'include/class.member.php';
include_once 'include/class.paging.php';
$paginate = new paginate();
$user = new User();
$member = new Member();
$users = $user->getvalue();
$blog = $member->blog_show();
$country = $user->getcountry();
$user_id = $_SESSION['user_session'];
?>
<?php include 'part/header.php'; ?>	 
			<section class="page-header page-header-xs dark">
				<div class="container">
					<h1>Blogs</h1>
				</div>
			</section>
			<!-- /PAGE HEADER -->
<section>
    <div class="container">
         <div class="row">
             <!-- LEFT -->
            <div class="col-md-9 col-sm-8">
                <?php
                $query = "SELECT * FROM blog";
                $records_per_page = 2;
                $newquery = $paginate->paging($query, $records_per_page);
                $paginate->dataview($newquery);
                ?>
                <!-- PAGINATION -->
                <div class="text-left">
                    <ul class="pagination pager nomargin">
                    <?php $paginate->paginglink($query, $records_per_page); ?>
                   </ul>
                <!-- /PAGINATION -->
             </div>
             <!-- RIGHT -->
            <div class="col-md-3 col-sm-4">
                  <hr />
                <div class="kik_img">
                    <a href="<?php echo $base_url ?>/kikguys"><img src="<?php echo $base_url ?>/img/kik.png"/></a> 
                </div>
                <div class="kik_img">
                    <a href="<?php echo $base_url ?>/kikgirl"><img class="" src="<?php echo $base_url ?>/img/kik2.png"/></a> 
                </div>
                <!-- side navigation -->
            </div>
        </div>
     </div>
</section>
  <!-- / -->
  <style>
      
  </style>
<?php include 'part/footer.php'; ?>

