<?php
include_once "class.db.php";
 class paginate
{
 
    public function __construct() {
        $db = Db::getInstance();
        $this->_dbh = $db->getConnection();
    }
 
     public function dataview($query)
     {
         $stmt = $this->_dbh->prepare($query);
         $stmt->execute();
 
         if($stmt->rowCount()>0)
         {
                while($value=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                   ?>
                                <div style="padding-bottom:30px;" class="blog-post-item"><!-- .blog-post-item-inverse = image right side [left on RTL] -->

								<div class="blog-item-small-content">

									<h2><a href="blog/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a></h2>

									<ul class="blog-post-info list-inline">
										<li>
											<a href="#">
												<i class="fa fa-clock-o"></i> 
									 			<span class="font-lato"><?php  echo date('F d, Y h:mA', strtotime($value['date']));  //$startdate = $value['date'];   echo date("M d", $startdate); ?></span>
											</a>
										</li>
<!--										<li>
											<a href="#">
												<i class="fa fa-comment-o"></i> 
												<span class="font-lato">28 Comments</span>
											</a>
										</li>-->
									</ul>

									<p><?php
                                                                            $body = $value['description'];
                                                                            if(strlen($body)>100){
                                                                                    preg_match('/^([^.!?\s]*[\.!?\s]+){0,30}/', strip_tags($body), $abstract);
                                                                                    echo $abstract[0];
                                                                            }else{
                                                                                    echo $body;
                                                                            }
                                                                            ?></p>

                                                                        <a href="blog/<?php echo $value['slug']; ?>" class="btn btn-reveal btn-default">
										<i class="fa fa-plus"></i>
										<span>Read More</span>
									</a>
								
								</div>

							</div>
                   <?php
                }
         }
         else
         {
                ?>
                <tr>
                <td>Nothing here...</td>
                </tr>
                <?php
         }
  
 }
 
 public function paging($query,$records_per_page)
 {
        $starting_position=0;
        if(isset($_GET["page_no"]))
        {
             $starting_position=($_GET["page_no"]-1)*$records_per_page;
        }
        $query2=$query." limit $starting_position,$records_per_page";
        return $query2;
 }
 
 public function paginglink($query,$records_per_page)
 {
  
        $self = $_SERVER['PHP_SELF'];
  
        $stmt = $this->_dbh->prepare($query);
        $stmt->execute();
  
        $total_no_of_records = $stmt->rowCount();
  
        if($total_no_of_records > 0)
        {
            ?> <?php
            $total_no_of_pages=ceil($total_no_of_records/$records_per_page);
            $current_page=1;
            if(isset($_GET["page_no"]))
            {
               $current_page=$_GET["page_no"];
            }
            if($current_page!=1)
            {
               $previous =$current_page-1;
               echo "<li class='previous radius-0'><a href='".$self."?page_no=1'>&laquo;</a></li>";
               echo "<li class='next radius-0'><a href='".$self."?page_no=".$previous."'>&raquo;</a></li>";
            }
            for($i=1;$i<=$total_no_of_pages;$i++)
            {
            if($i==$current_page)
            {
                echo "<li class='active'><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
            }
            else
            {
                echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
            }
   }
   if($current_page!=$total_no_of_pages)
   {
        $next=$current_page+1;
        echo "<li class='previous radius-0'><a href='".$self."?page_no=".$next."'>&laquo;</a></li>";
        echo "<li class='next radius-0'><a href='".$self."?page_no=".$total_no_of_pages."'>&raquo;</a></li>";
   }
   ?><?php
  }
 }
}