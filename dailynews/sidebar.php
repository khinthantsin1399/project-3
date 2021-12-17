 <div class="col-md-4 col-sm-4 col-xs-12 sidebar">
              <h3>RECENT NEWS</h3><hr>
                
                <?php
$query1=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category, tblposts.PostingDate as postingdate from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId where tblposts.Is_Active=1  order by pid desc limit 5");
while ($result=mysqli_fetch_array($query1)) {

?>
<div class="row">
  <div class="col-md-4">
      <a href="news-details.php?nid=<?php echo htmlentities($result['pid'])?>"> <img src="images/<?php echo htmlentities($result['PostImage']);?>" alt="<?php echo htmlentities($result['posttitle']);?>" width="110" height="100"></a>
    </div>
    <div class="col-md-8">
                      <a href="news-details.php?nid=<?php echo htmlentities($result['pid'])?>" style="color:black;text-decoration:none;font-size:1em;font-weight:bold;"><?php echo htmlentities($result['posttitle']);?></a><br>
        <a class="badge  text-decoration-none link-light" href="" style="color:#fff;background:#dc0092;border-radius:20px;"><?php echo htmlentities($result['category']);?></a>

         <div class="postDate" style="color:black;font-size:0.8em;">
              <?php echo htmlentities($result['postingdate']);?>
           
            </div>
    </div>
                  
    
                </div><hr class="footerHr" style="border-top:1px solid grey;margin-top:30px;">
            <?php } ?>
                    
     
      <h3>POPULAR NEWS</h3><hr>
                
                <?php
$query1=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category, tblposts.PostingDate as postingdate from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId where tblposts.Is_Active=1  order by viewCounter desc limit 3");
while ($result=mysqli_fetch_array($query1)) {

?>
<div class="row">
  <div class="col-md-4">
      <a href="news-details.php?nid=<?php echo htmlentities($result['pid'])?>"> <img src="images/<?php echo htmlentities($result['PostImage']);?>" alt="<?php echo htmlentities($result['posttitle']);?>" width="110" height="100"></a>
    </div>
    <div class="col-md-8">
                      <a href="news-details.php?nid=<?php echo htmlentities($result['pid'])?>" style="color:black;text-decoration:none;font-size:1em;font-weight:bold;"><?php echo htmlentities($result['posttitle']);?></a><br>
        <a class="badge  text-decoration-none link-light" href="" style="color:#fff;background:#dc0092;border-radius:20px;"><?php echo htmlentities($result['category']);?></a>

         <div class="postDate" style="color:black;font-size:0.8em;">
              <?php echo htmlentities($result['postingdate']);?>
           
            </div>
    </div>
                  
    
                </div><hr class="footerHr" style="border-top:1px solid grey;margin-top:30px;">
            <?php } ?>
                    
                
                
              </div>
              