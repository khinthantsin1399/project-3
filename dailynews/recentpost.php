<?php 
    date_default_timezone_set("Asia/Yangon");
    $current_time = date_create(date('Y-m-d H:i:s'));
    $recent_post = array();
    $selectdate = mysqli_query($conn, "SELECT * FROM tblposts");
        while ($row = mysqli_fetch_assoc($selectdate)) {
            $post_date = date_create($row['PostingDate']);
            $interval =  date_diff($current_time, $post_date);
            $min = $interval -> days * 24 * 60;
            $min += $interval -> h * 60;
            $min += $interval -> i;
            // echo ("Difference in minute1 is : " .$min. "<br>");
            if($min <= 30) {
                array_push($recent_post, $row);
                // echo "It is recent post <br>";
            }
    }?>
<p> <?php echo htmlentities($row['recent_post']);?></p>
    
