<?php 
session_start();
include('config.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
 $_SESSION['token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['submit']))
{
  //Verifying CSRF Token
if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$postid=intval($_GET['nid']);
$st1='0';
$query=mysqli_query($con,"insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
if($query):
  echo "<script>alert('comment successfully submit.');</script>";
  unset($_SESSION['token']);
else :
 echo "<script>alert('Something went wrong. Please try again.');</script>";  

endif;

}
}
}
$postid=intval($_GET['nid']);

    $sql = "SELECT viewCounter FROM tblposts WHERE id = '$postid'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $visits = $row["viewCounter"];
            $sql = "UPDATE tblposts SET viewCounter = $visits+1 WHERE id ='$postid'";
    $con->query($sql);

        }
    } else {
        echo "no results";
    }
    


?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DailyNews | Home Page</title>

    <!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    <!-- Custom styles for this template --->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
       <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      
    <link rel="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      
  </head>
    <!-- Navigation -->
<style>
<?php include('main.css');?>
</style>
    <body>
   <?php include('header.php');?>
      
      


  <div class="container">


     
      <div class="row" style="margin-top: 4%">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
  
          <!-- Blog Post -->
<?php
$pid=intval($_GET['nid']);
$currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
 $query=mysqli_query($con,"select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url,tblposts.UpdationDate from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId where tblposts.id='$pid'");
while ($row=mysqli_fetch_array($query)) {
?>

          <div class="card mb-4">
      <img class="img-fluid rounded" src="images/<?php echo htmlentities($row['PostImage']);?>"  alt="<?php echo htmlentities($row['posttitle']);?>">
  
            <div class="card-body">
              <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
<!--category-->
                <a class="badge  text-decoration-none link-light" href="<?php echo htmlentities($row['category']);?>.php" style="color:#fff;background:#dc0092;border-radius:20px;"><?php echo htmlentities($row['category']);?></a> <br><br>
                <p class="postDate">Posted on <?php echo htmlentities($row['postingdate']);?></p>





 
              <p class="card-text"><?php 
$pt=$row['postdetails'];
              echo  (substr($pt,0));?></p>
             
            </div>
            <div class="card-footer text-muted">
              
           
            </div>
          </div>
<?php } ?>
       

      

     

        </div>

        <!-- Sidebar Widgets Column -->
    
      </div>
      <!-- /.row -->
<!---Comment Section --->

 <div class="row" style="margin-top: -8%">
   <div class="col-md-8">
<div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form name="Comment" method="post">
      <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
 <div class="form-group">
<input type="text" name="name" class="form-control" placeholder="Enter your fullname" required>
</div>

 <div class="form-group">
 <input type="email" name="email" class="form-control" placeholder="Enter your Valid email" required>
 </div>


                <div class="form-group">
                  <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </form>
            </div>
          </div>

  <!---Comment Display Section --->

 <?php 
 $sts=1;
 $query=mysqli_query($con,"select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
while ($row=mysqli_fetch_array($query)) {
?>
<div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?php echo htmlentities($row['name']);?> <br />
                  <span style="font-size:11px;"><b>at</b> <?php echo htmlentities($row['postingDate']);?></span>
            </h5>
           
             <?php echo htmlentities($row['comment']);?>            </div>
          </div>
<?php } ?>

        </div>
      </div>
    </div>

  
      <?php include('footer.php');?>


  

  </body>

</html>

