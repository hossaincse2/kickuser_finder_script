<?php
error_reporting(0);
session_start();
include_once 'include/class.user.php';
include_once 'include/class.member.php';
$user = new User();
$member = new Member();
$users = $user->getvalue();
$blog_comments_show = $user->blog_comments_show();
$blog_comments_count = $user->blog_comments_count();
$blog = $member->blog_show_detail();
$title = $_GET['blog'];
$user_id = $_SESSION['user_session'];

if (isset($_POST['submit'])) {
    $blog_id = trim($_POST['blog_id']);
    $author = trim($_POST['author']);
    $contact_email = trim($_POST['contact_email']);
    $website = trim($_POST['website']);
    $comment = trim($_POST['comment']);
    $myarray = array("blog_id" => $blog_id, "author" => $author, "contact_email" => $contact_email, "website" => $website, "comment" => $comment);

    if ($comment == '') {
        $error = 'Please Comments';
        $user->redirect("details.php?blog=$title");
    } else {
        if ($user->blog_comments($myarray)) {
            $user->redirect("details.php?blog=$title");
        } else {
            echo 'error';
        }
    }
}

if (isset($_POST['submitreply'])) {
    $comment_id = trim($_POST['comment_id']);
    $blog_id = trim($_POST['blog_id']);
    $replycomment = trim($_POST['replycomment']);
    $myarray = array("replycomment" => $replycomment, "comment_id" => $comment_id, "blog_id" => $blog_id);
    if ($replycomment == '') {
        echo 'Please Reply';
    } else {
        try {
            if ($user->reply_blog_comments($myarray)) {
                $sucess[] = 'Update Sucessfully';
            } else {
                $error[] = 'Update Fail';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
<?php include 'part/header.php'; ?> 
<section>
    <div class="container">
        <div class="row">
            <!-- LEFT -->
            <div class="col-md-9 col-sm-9">

                <h1 class="blog-post-title"><?php echo $blog['title']; ?></h1>
                <!-- article content -->
                <p class="dropcap"><?php echo $blog['description']; ?></p>

                <div class="divider divider-dotted"><!-- divider --></div>

 
                <div class="clearfix margin-top-30">

                    <span class="pull-left margin-top-6 bold hidden-xs">
                        Share Post: 
                    </span>
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//findkikuser.com/blog/<?php echo $blog['title']; ?>" class="social-icon social-icon-sm social-icon-transparent social-facebook pull-right" data-toggle="tooltip" data-placement="top" title="Facebook">
                        <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                    </a>
                    <a target="_blank" href="https://twitter.com/home?share=http%3A//findkikuser.com/blog/<?php echo $blog['title']; ?>" class="social-icon social-icon-sm social-icon-transparent social-twitter pull-right" data-toggle="tooltip" data-placement="top" title="Twitter">
                        <i class="icon-twitter"></i>
                        <i class="icon-twitter"></i>
                    </a>
                    <a target="_blank" href="https://plus.google.com/share?url=http%3A//findkikuser.com/blog/<?php echo $blog['title']; ?>" class="social-icon social-icon-sm social-icon-transparent social-gplus pull-right" data-toggle="tooltip" data-placement="top" title="Google plus">
                        <i class="icon-gplus"></i>
                        <i class="icon-gplus"></i>
                    </a>
                </div>
                <!-- /SHARE POST -->
            </div>
            <!-- RIGHT -->
            <div class="col-md-3 col-sm-3">
                <hr />
                <div class="kik_img">
                    <a href="<?php echo $base_url ?>/kikguys.php"><img src="<?php echo $base_url ?>/img/kik.png"/></a> 
                </div>
                <div class="kik_img">
                    <a href="<?php echo $base_url ?>/kikgirl.php"><img class="" src="<?php echo $base_url ?>/img/kik2.png"/></a> 
                </div>
                <!-- side navigation -->
             </div>
         </div>
     </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) 
            var recipient = button.data('whatever') 
            var username = button.data('user')
            console.log(recipient);
            var modal = $(this)
            modal.find('.modal-title').text('Reply message to ' + recipient)
            modal.find('#comment_id').val(recipient)
        });
    });

</script>		 
<!-- / -->
<?php include 'part/footer.php'; ?>

