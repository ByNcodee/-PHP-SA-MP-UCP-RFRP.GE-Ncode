<?php

session_start();
include "mysql_config.php";
$conn = OpenCon();
 

?>
<!doctype html>
<html lang="ka">
<head>
    <title>Realmforge RolePlay</title>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Realmforge RolePlay ქართული SA-MP პროექტი, შექმენი შენი ვირტუალური სამყარო აქ! ">
    <meta name="keywords" content="samp, georgian, realmforge role play, ქართული სამპი, SA-MP Georgia, RFRP georgia, Realmforge RP, realmforge role play launcher, rfrp launcher, RFRP Official Website, tamashebi,samp, ქართული, samp ლაუნჩერი, realmforge roleplay, Realmforge, rfrp.ncode.ge">
    <meta name="googlebot" content="noarchive" data-rh="true">
    <meta name="robots" content="noarchive" data-rh="true">
    <meta name="author" content="rfrp.ncode.ge">
    <meta property="og:url" content="https://rfrp.ncode.ge/rfrp_shared.png" />
    <meta property="og:image" content="https://rfrp.ncode.ge/rfrp_shared.png" />
    <meta property="og:title" content="Realmforge RolePlay Official Website">
    <meta property="og:description" content="Realmforge RolePlay ქართული SA-MP პროექტი, შექმენი შენი ვირტუალური სამყარო აქ!">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="stylee/main.css">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
</head>
<body>

<!-- Navigation -->
<?php 
    include "navigation.php";
?> 
<!-- Page Content -->
<header>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <img src="images/thumb.svg" alt="RFRP THUMB" class="w-100 thumb_">
        <div class="carousel-caption">
        <h5>შემოგვიერთდი</h5>
        <p>ჩაიწერე და გახდი ჩვენი წევრი შენც.</p>
        </div>
    </div>
    </div>
</header>
<!-- Page Content -->
<br>
<br>
<section class="mt-7 py-5 launcher_section">
    <div class="container d-flex launcher_div">
    <div>
        <img src="images/gasgasgas.png" alt="" class="image_launcher_container" srcset="">
    </div>
    <div class="launcher_download_container_block">
        <div class="effect_01"></div>
        <img src="images/wow.png" class="emoji_01" alt="" srcset="">
        <h1 class="fw-light text-light">ქართული SA-MP პროექტი Realmforge Role Play</h1>
        <p class="lead"> შექმენი შენი ვირტუალური რეალობა აქ! ჩაიწერე ლაუნჩერი და შემოგვიერთდი.</p>
        <div class="download_rfrp" data-tooltip="მზადებაშია">
        <div class="download_rfrp-wrapper">
            <div class="text">ლაუნჩერის ჩაწერა</div>
            <span class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="2em" height="2em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15V3m0 12l-4-4m4 4l4-4M2 17l.621 2.485A2 2 0 0 0 4.561 21h14.878a2 2 0 0 0 1.94-1.515L22 17"></path>
            </svg>
            </span>
        </div>
        </div>
    </div>
    </div>
</section>

<section class="mt-7 py-5">
    <div class="container">
    <div class="row" bis_skin_checked="1">
        <div class="col text-center mb-5" bis_skin_checked="1">
        <h1 class="display-4 font-weight-bolder text-light">Realmforge RolePlay - ადმინისტრაცია</h1>
                
        <?php 
 
                        // შეკვეთის მომზადება
                        $queryf = "SELECT * FROM users WHERE pAdmin >= 1 ";
                        $resultss = mysqli_query($conn, $queryf);
 
                        // it return number of rows in the table. 
                        $roww = mysqli_num_rows($resultss); 
                        
                        if ($roww) 
                        { 
                                            
                            echo '<p class="lead">ადმინისტრატორების რაოდენობა: '.$roww.'/5 </p>';
 
                        } 
                        // close the result. 
                        mysqli_free_result($resultss); 
 
                        ?>
   
        </div>
    </div>
        <div class="list_owners">
        
        <?php 
    
        // შეკვეთის მომზადება
        $query = "SELECT * FROM users WHERE pAdmin >= 1  LIMIT 3";
        $results = mysqli_query($conn, $query);

        // თუ არსებული ჩანაწერი არის (ანუ, შედეგები მოიძებნა)
        if (mysqli_num_rows($results) > 0) {

            // გამოტანა ყველა შედეგის
            while ($row = mysqli_fetch_assoc($results)) {
                echo "
                <a  rel='nofollow' href='profile.php?login_user=".$row["Username"]."' target='_blank'>
                <div class='admins_list_card'>
                    <div class='admins_list_card_img'>
                        <img src='skins/".$row['pSkin'].".png'>
                    </div>

                    <div class='admins_list_card_content'>
                        <h3 class='text-light'>".$row['Username']."</h3>
                        <h6 class='text-danger'>ადმინისტრატორი</h6>
                        <h6 class='text-danger'> ".$row['pAdmin']." LEVEL</h6>
                        <h6 class='text-success'> ".$row['pEmail']."</h6>   
                        <p class='text-light'>LEVEL: ".$row['pScore']."  •  MONEY: ".$row['pMoney']."$ </p>
                    </div>

                </div>
                </a>
                ";  
            }
            mysqli_free_result($results); 
        } else {

        }
 
        ?>

 
        </div>

        
    </div>
</section>
 
<br>
<br>
<section class="py-5">
    <div class="container" bis_skin_checked="1">
    <div class="row" bis_skin_checked="1">
        <div class="col text-center mb-5" bis_skin_checked="1">
        <h1 class="display-4 font-weight-bolder text-light">Realmforge RolePlay - ბოლო განცხადებები</h1>
        <p class="lead">აქ იხილავთ ბოლო განახლებებს / აქციებს და სხვადასხვა კარგ ინფორმაციას! </p>
        </div>
    </div>
    <div class="row" bis_skin_checked="1">
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4" bis_skin_checked="1">
        <div class="card text-dark card-has-bg click-col" style="background-image:url('images/1344450.jpeg');" bis_skin_checked="1">
            <div class="card-img-overlay d-flex flex-column" bis_skin_checked="1">
            <div class="card-body" bis_skin_checked="1">
                <small class="card-meta mb-2 text-light">განახლება</small>
                <h4 class="card-title mt-0 text-light"> განახლდა სათამაშო მოდი / გასწორდა ბაგები </h4>
                <small class="text-light">
                <i class="far fa-clock"></i>11/11/2024 </small>
            </div>
            <div class="card-footer" bis_skin_checked="1">
                <div class="media" bis_skin_checked="1">
                <img class="mr-3 rounded-circle" src="images/ncode.jpg" alt="Generic placeholder image" style="max-width:50px">
                <div class="media-body" bis_skin_checked="1">
                    <h6 class="my-0 text-light d-block">N.Shanidze</h6>
                    <small class="text-light">Developer</small>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4" bis_skin_checked="1">
        <div class="card text-dark card-has-bg click-col" style="background-image:url('images/1344450.jpeg');" bis_skin_checked="1">
            <div class="card-img-overlay d-flex flex-column" bis_skin_checked="1">
            <div class="card-body" bis_skin_checked="1">
                <small class="card-meta mb-2 text-light">განახლება</small>
                <h4 class="card-title mt-0 text-light"> განახლდა სათამაშო მოდი / გასწორდა ბაგები </h4>
                <small class="text-light">
                <i class="far fa-clock"></i>11/11/2024 </small>
            </div>
            <div class="card-footer" bis_skin_checked="1">
                <div class="media" bis_skin_checked="1">
                <img class="mr-3 rounded-circle" src="images/ncode.jpg" alt="Generic placeholder image" style="max-width:50px">
                <div class="media-body" bis_skin_checked="1">
                    <h6 class="my-0 text-light d-block">N.Shanidze</h6>
                    <small class="text-light">Developer</small>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4" bis_skin_checked="1">
        <div class="card text-dark card-has-bg click-col" style="background-image:url('images/1344450.jpeg');" bis_skin_checked="1">
            <div class="card-img-overlay d-flex flex-column" bis_skin_checked="1">
            <div class="card-body" bis_skin_checked="1">
                <small class="card-meta mb-2 text-light">განახლება</small>
                <h4 class="card-title mt-0 text-light"> განახლდა სათამაშო მოდი / გასწორდა ბაგები </h4>
                <small class="text-light">
                <i class="far fa-clock"></i>11/11/2024 </small>
            </div>
            <div class="card-footer" bis_skin_checked="1">
                <div class="media" bis_skin_checked="1">
                <img class="mr-3 rounded-circle" src="images/ncode.jpg" alt="Generic placeholder image" style="max-width:50px">
                <div class="media-body" bis_skin_checked="1">
                    <h6 class="my-0 text-light d-block">N.Shanidze</h6>
                    <small class="text-light">Developer</small>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
<!-- Footer -->
<?php 
    include "footer.php";
?>
<!-- Footer END -->
 </body>
</html>
 