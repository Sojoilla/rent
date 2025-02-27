<?php
session_start();
$conn=mysqli_connect("localhost","root","", "chatrabash");
if($_GET['id']){
    $postId = $_GET['id'];
    $sql = "SELECT * FROM property_list WHERE list_id=$postId";
    $query = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($query);
    if($data['status'] == "pending"){
        $color = "red";
    }


    
    $waterSign = "&#10060;";
    $electricitySign = "&#10060;";
    $maintenanceSign = "&#10060;";
    $securitySign = "&#10060;";
    $wifiSign = "&#10060;";
    $furnitureSign = "&#10060;";
    $acSign = "&#10060;";
    $mealSign = "&#10060;";
    $gurbageSign = "&#10060;";


    if($data['water'] == "yes"){
        $waterSign = "&#10003;";
    }
    if($data['electricity'] == "yes"){
        $electricitySign = "&#10003;";
    }
    if($data['maintenance'] == "yes"){
        $maintenanceSign = "&#10003;";
    }
    if($data['security_service'] == "yes"){
        $securitySign = "&#10003;";
    }
    if($data['wifi'] == "yes"){
        $wifiSign = "&#10003;";
    }
    if($data['furniture'] == "yes"){
        $furnitureSign = "&#10003;";
    }
    if($data['ac'] == "yes"){
        $acSign = "&#10003;";
    }
    if($data['meal_system'] == "yes"){
        $mealSign = "&#10003;";
    }
    if($data['garbage'] == "yes"){
        $gurbageSign = "&#10003;";
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Post - Chatrabash</title>
    <meta name="description" content="Online accommodation system for university students. 
Design by @Sazib.Gub">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dokdo&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/Slider.css">
</head>

<body style="background: #f6f7f9;">
    <?php
    require_once'include/navbar.php';
    ?>
    <section>
        <div class="container">
        <div class="row" style="margin-top: 10px;">
                <div class="col-lg-12">
                    <div class="simple-slider">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
<?php

$postId = $_GET['id'];
$sql = "SELECT * FROM property_images WHERE property_id= $postId";
$query2 = mysqli_query($conn,$sql);


while ($dataImg = mysqli_fetch_assoc($query2)) {
?>
                                <div class="swiper-slide" style="background: url(imag/listingImg/<?php echo $dataImg['photo'];?>) center center / cover no-repeat;"></div>
<?php
}
?>
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row" style="margin-top: 10px;">

            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            
                            <span class="text-secondary"><small><?=date('F jS,Y',strtotime($data['submit_date']))?></small></span>
                            <h4 class="card-title"><strong><?php echo $data['property_name'];?></strong><br></h4>
                            <p class="card-text"><span style="color: rgb(102, 102, 102);"><?php echo $data['rent_rate'];?> TK</span><br></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">Property Description</span></strong><br></h4>
                            <p class="card-text"><?php echo $data['description'];?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">University Name</span></strong><br></h4>
                            <p class="card-text"><?php echo $data['university_name'];?></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">Approximate Distance From University</span></strong><br></h4>
                            <p class="card-text"><span style="color: rgb(102, 102, 102);"><?php echo $data['proximity'];?></span><br></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">Property Details</span></strong><br></h4>
                            <p class="card-text">Location:<?php echo $data['full_address'];?></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">Gender</span></strong><br></h4>
                            <p class="card-text">Location:<?php echo $data['gender'];?></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">Property Type</span></strong><br></h4>
                            <p class="card-text"><span style="color: rgb(102, 102, 102);"><?php echo $data['property_type'];?></span><br></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
<?php

?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">Available Services/Amenities:</span></strong><br></h4>
                            <p class="card-text"><span style="color: rgb(102, 102, 102);"><?php echo $waterSign;?>Water,&nbsp;&nbsp;<?php echo $electricitySign;?>Electricity&nbsp;&nbsp;, <?php echo $maintenanceSign;?>Maintenance, <?php echo $securitySign;?>Security Service, <?php echo $wifiSign;?>WIFI, <?php echo $furnitureSign;?>Furniture, <?php echo $acSign;?>AC, <?php echo $mealSign;?>Meal System, <?php echo $gurbageSign;?>Gurbage</span><br></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">Rules</span></strong><br></h4>
                            <p class="card-text"><?php echo $data['rules'];?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 10px;">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">Schedule A Visit</span></strong><br></h4>
                            <form>
                                <div><label class="form-label" for="date"><strong>Select date:&nbsp;</strong></label><input class="form-control form-control-lg" id="date" type="datetime-local" required=""><label class="form-label" for="num"><strong>Phone Number:&nbsp;</strong></label><input class="form-control" type="number" id="num" required=""><label class="form-label" for="ema"><strong>Email:&nbsp;</strong></label><input class="form-control" type="email" id="ema"><label class="form-label" for="name"><strong>Name:&nbsp;</strong></label><input class="form-control" type="text" id="name" required=""><label class="form-label" for="msg"><strong>Message:&nbsp;</strong></label><textarea class="form-control" id="msg" rows="3" autocomplete="on" spellcheck="true" required="">I am Interested in your property and would like to make a visit.</textarea></div><button class="btn btn-warning" type="submit" style="margin-top: 10px;margin-bottom: 5px;">Book Schedule</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php
$fullname = $_SESSION['USER_F_NAME']." ".$_SESSION['USER_NAME'];
if(isset($_POST['addcomment'])){
    $comment=$_POST['comment'];
    $query3="INSERT INTO comments (post_id,names,comment) VALUES ('$postId','$fullname','$comment')";
    if(mysqli_query($conn,$query3)){
    }else{
        echo"comment is not added.";
    }  
}
?>
            <div class="row" style="margin-top: 10px;">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><strong><span style="color: rgb(51, 51, 51);">Make a Comment</span></strong><br></h4>
                            <form action="single_property.php?id=<?php echo $postId; ?>"  method="post">
                                <div>
                                    <input type="hidden" name="post_id" value="<?=$postId?>"><br>
                                    <label class="form-label" for="msg"><strong>Comment:&nbsp;</strong></label>
                                    <textarea class="form-control" id="msg" placeholder="Write Your Comment...." name="comment"></textarea></div>
                                    <input name="addcomment" class="btn btn-warning" type="submit" style="margin-top: 10px;margin-bottom: 5px;" value="Post Comment">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
        


            <div class="card mb-12">
            <h5 class="card-header"><b>Comments</b></h5>
          <?php

          $sqlComment = "SELECT * FROM comments WHERE post_id=$postId";
          $queryComment = mysqli_query($conn,$sqlComment);
          
          while($dataComment = mysqli_fetch_assoc($queryComment)){
            ?>
                            <div class="card-body">
                  <h5 class="card-title text-capitalize" style="margin-bottom:0;"><b><?php echo $dataComment['names'];?></b></h5>
                  <span class="text-secondary"><small><?=date('F jS,Y',strtotime($dataComment['created_at']))?></small></span>
                  <p class="card-text"><?php echo $dataComment['comment'];?></p>
                </div><hr>
            
            <?php
          }
            ?>

          </div>
            <?php
          //}
          ?>
          
          
    </div>
        </div>
    </section>
    
    <?php
    require_once'include/footer.php';
    ?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Slider.js"></script>
    <script src="assets/js/ssmodern.js"></script>
</body>

</html>