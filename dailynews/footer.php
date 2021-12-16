 <footer class="py-5 bg-dark">
      <div class="container">
          
          
          <div class="row footerContent">
          <div class="col-md-4 col-sm-4 col-xs-12 ">
              <h3>ABOUT US</h3><hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
              
              <div class="row">
                  <div class="col-md-2">
                      <i class="fa fa-map-marker icon" aria-hidden="true"></i></div>
                  
                  
                  <div class="col-md-10">    <p>123,Main Street,Yangon</p></div></div><br>
              
              <div class="row">
                  <div class="col-md-2">
                      <i class="fa fa-phone icon" aria-hidden="true"></i></div>
                 
                  <div class="col-md-10">
                  <p>+01 2345 6789</p>
                  <p>+01 2345 6789</p></div></div><br>
                  
                  
              <div class="row">
                  <div class="col-md-2">
                       <i class="fa fa-envelope icon" aria-hidden="true"></i></div>
             <div class="col-md-10">
              <p>REPORT@DAILYNEWS.COM</p>
                 <p>WWW.DAILYNEWS.COM</p></div></div>
            <hr class="footerHr" style="border-top:1px solid white;">
              </div>
              
            <div class="col-md-4 col-sm-4 col-xs-12">
              <h3>POPULAR POST</h3><hr>
                
                <?php
$query1=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category, tblposts.PostingDate as postingdate from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId where tblposts.Is_Active=1  order by viewCounter desc limit 3");
while ($result=mysqli_fetch_array($query1)) {

?>
<div class="row">
  <div class="col-md-4">
      <a href="news-details.php?nid=<?php echo htmlentities($result['pid'])?>"> <img src="images/<?php echo htmlentities($result['PostImage']);?>" alt="<?php echo htmlentities($result['posttitle']);?>" width="110" height="100"></a>
    </div>
    <div class="col-md-8">
                      <a href="news-details.php?nid=<?php echo htmlentities($result['pid'])?>" style="color:white;text-decoration:none;font-size:.8em;"><?php echo htmlentities($result['posttitle']);?></a><br>
        <a class="badge  text-decoration-none link-light" href="" style="color:#fff;background:#dc0092;"><?php echo htmlentities($result['category']);?></a>

         <div class="postDate" style="color:white;">
              <?php echo htmlentities($result['postingdate']);?>
           
            </div>
    </div>
                  
    
                </div><hr class="footerHr" style="border-top:1px solid white;margin-top:30px;">
            <?php } ?>
                    
                
              </div>
              
              
              
              
              <div class="col-md-4 col-sm-4 col-xs-12">
              <h3>NEWSLETTER</h3><hr>
                  <div class="input-group mb-4" >
                      <input type="text" placeholder="Enter Your Email Address" class="form-control" style="border-radius:20px;border:none;"></div>
                  <a href="#" class="btn subscribe" style="color:white;text-decoration:none;background:#dc0092;border-radius:20px;font-size:0.7em;padding:5px 20px;">SUBSCRIBE</a><hr class="footerHr" style="border-top:1px solid white;margin-top:40px;">
             
              <h3 style="margin-bottom:30px;">CATEGORIES</h3>
                  <div class="row">
                  <div class="col-md-6" >
                      <ul class="list-unstyled" >
                          <li>  <a href="business.php">BUSINESS</a></li>
                          <li><a href="fashion.php">FASHION</a></li>
                       <li><a href="travel.php">TRAVEL</a></li>
                      </ul>
                      </div>
                      
                      <div class="col-md-6" >
                      <ul class="list-unstyled" >
                          <li>  <a href="#">TECH</a></li>
                          <li><a href="lifestyle.php">LIFESTYLE</a></li>
                
                      </ul>
                      </div> 
                      
                      
                  </div>
                  
                  
                  
              </div>
          </div>
          
          
          
          
          
          
        <p class="m-0 text-center text-white">Copyright &copy; Team-5 <?php echo date('Y');?></p>
      </div>
      <!-- /.container -->
    </footer>