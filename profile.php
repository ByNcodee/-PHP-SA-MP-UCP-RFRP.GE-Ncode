<?php
session_start();
include "mysql_config.php";
$conn = OpenCon();
$error_message = "";
 
 
$username = $_GET['login_user'];
$is_not_owned = 0;

if($username == $_SESSION['web_user'])
{
    $is_not_owned = 1;
}
 
?>
<!doctype html>
<html lang="ka">
<head>
    <title>RFRP მოთამაშე: <?php echo $_GET['login_user']?></title>
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
    <link rel="icon" type="image/x-icon" href="https://rfrp.ge/images/logo.png">
</head>
<body>
  
<!-- Navigation -->
<?php 
    include "navigation.php";
?>
<br>
<br>
<br>
<br>
<br>
<br>
<?php 

$query = "SELECT * FROM users WHERE Username ='$username'";
$results = mysqli_query($conn, $query);
 
if (mysqli_num_rows($results) == 1) {
 
    $sql = "SELECT * FROM users WHERE Username ='$username' "; 
    $result = $conn->query($sql); 
     
    if ($result->num_rows > 0) { 

        $row = $result->fetch_assoc(); 
        ?>

        <section class="mt-5 py-5 user_profile_box">
            
            <div class="user_profile_block">
                <div class="user_avatar">

                    <h3>სახელი: <?php  echo $row["Username"] ?></h3>
                    
                    <img src="skins/<?php  echo $row["pSkin"] ?>.png" alt="Realmforge RolePlay Player <?php  echo $username ?> ">
                    <?php if($is_not_owned == 1 ) {?>
                    <div class="user_control_container">
                        <a  rel="nofollow"href="donation.php">ფულის ყიდვა</a>
                        <a  rel="nofollow"href="#">სკინის ყიდვა</a>
                        <a  rel="nofollow"href="#">ტრანსპორტის ყიდვა</a>
                        <a  rel="nofollow"href="#">პაროლის შეცვლა</a>
                        <a  rel="nofollow"href="logout.php?logout=<?php  echo $row["Username"] ?>">გასვლა</a>
                    </div>
                    <?php } ?>
                    <?php if($is_not_owned == 0 ) {?>
                    <div class="user_control_container">
                        <a  rel="nofollow" class="disabled">ფულის ყიდვა</a>
                        <a  rel="nofollow"class="disabled">სკინის ყიდვა</a>
                        <a  rel="nofollow"class="disabled">ტრანსპორტის ყიდვა</a>
                        <a  rel="nofollow"class="disabled">პაროლის შეცვლა</a>
                        <a  rel="nofollow"class="disabled">გასვლა</a>
                    </div>
                    <?php } ?>
                </div>

                <div class="user_right_container">

                    <ul>

                        <h3>მოთამაშის სტატისტიკა</h3>
                        <li class="h-100">ლეველი                      <span><?php  echo $row["pScore"] ?> (3/14 EXP)</span></li>
                        <li class="h-100">პერსონაჟის სკინი              <span>ID: <?php  echo $row["pSkin"] ?> </span></li>
                        <li class="h-100">ფული                        <span><?php  echo $row["pMoney"] ?> $</span> </li>
                        <li class="h-100">სახლი                        <span>კი (ID:33)</span></li>
                        <li class="h-100">ელ. ფოსტა                    <span>shanidzenodo0@gmail.com <span class='green_text'>[ შეცვლა ]</span> </span></li>
                         
                        <li class="h-100">სტატუსი       <span><?php  
                        if($row["pAdmin"] > 0)
                        {
                            echo "[ ადმინისტრატორი ] ".$row["pAdmin"]. " Level";
                        }else {
                            echo "[ მოთამაშე ]";
                        }
                        ?></span></li>
                        <?php if($is_not_owned == 1 ) {?>
                            <li  class="h-100">IP ADDRESS     <span><?php  echo $row["pAddress"] ?></span></li>
                            <li  class="h-100">PIN SECURE CODE     <span><?php  
                                if(strlen($row["pAddress"]) > 1)
                                {
                                    echo "<span class='green_text'> [ დაცვა ჩართულია ] </span> (( პინ კოდი: ".$row["pPincode"]. " )) ";
                                }
                            ?></span></li>
                        <?php } ?>
                        <?php if($is_not_owned == 0 ) {?>
                            <li  class="h-100">IP ADDRESS     <span>###########</span></li>
                            <li  class="h-100">PIN SECURE CODE     <span><?php  
                                if(strlen($row["pAddress"]) > 1)
                                {
                                    echo "####################";
                                }
                            ?></span></li>
                        <?php } ?>

                    </ul>

                </div>
 
               
                <div class="user_right_container">

                
                    <ul>
                    <?php 
                    if($row["pVehicle_1"] == 0 && $row["pVehicle_2"] == 0 && $row["pVehicle_3"] == 0 && $row["pVehicle_4"] == 0 && $row["pVehicle_5"] == 0 &&
                    $row["pVehicle_6"] == 0 ) { echo "ტრანსპორტი არ არის!"; }
                    
                    ?>
                    <?php  if($row["pVehicle_1"] > 0) { ?>
                        <li>
                            <div class="object_preview_block">
                            <span class="text-light">ტრანსპორტი <span class="green_text">ID: <?php echo $row["pVehicle_1"]?></span></span>
                                <div class="vehicle_preview">
                                    <img src='cars/<?php echo $row["pVehicle_1"] ?>.png'>
                                </div>
                            </div>    
                        </li>
                    <?php  }?>

                    <?php  if($row["pVehicle_2"] > 0) { ?>
                        <li>
                            <div class="object_preview_block">
                            <span class="text-light">ტრანსპორტი <span class="green_text">ID: <?php echo $row["pVehicle_2"]?></span></span>
                                <div class="vehicle_preview">
                                    <img src='cars/<?php echo $row["pVehicle_2"] ?>.png'>
                                </div>
                            </div>    
                        </li>
                    <?php  }?>

                    <?php  if($row["pVehicle_3"] > 0) { ?>
                        <li>
                            <div class="object_preview_block">
                            <span class="text-light">ტრანსპორტი <span class="green_text">ID: <?php echo $row["pVehicle_3"]?></span></span>
                                <div class="vehicle_preview">
                                    <img src='cars/<?php echo $row["pVehicle_3"] ?>.png'>
                                </div>
                            </div>    
                        </li>
                    <?php  }?>

                    <?php  if($row["pVehicle_4"] > 0) { ?>
                        <li>
                            <div class="object_preview_block">
                            <span class="text-light">ტრანსპორტი <span class="green_text">ID: <?php echo $row["pVehicle_4"]?></span></span>
                                <div class="vehicle_preview">
                                    <img src='cars/<?php echo $row["pVehicle_4"] ?>.png'>
                                </div>
                            </div>    
                        </li>
                    <?php  }?>

                    <?php  if($row["pVehicle_5"] > 0) { ?>
                        <li>
                            <div class="object_preview_block">
                            <span class="text-light">ტრანსპორტი <span class="green_text">ID: <?php echo $row["pVehicle_5"]?></span></span>
                                <div class="vehicle_preview">
                                    <img src='cars/<?php echo $row["pVehicle_5"] ?>.png'>
                                </div>
                            </div>    
                        </li>
                    <?php  }?>
                    
                    <?php  if($row["pVehicle_6"] > 0) { ?>
                        <li>
                            <div class="object_preview_block">
                            <span class="text-light">ტრანსპორტი <span class="green_text">ID: <?php echo $row["pVehicle_6"]?></span></span>
                                <div class="vehicle_preview">
                                    <img src='cars/<?php echo $row["pVehicle_6"] ?>.png'>
                                </div>
                            </div>    
                        </li>
                    <?php  }?>
                        
 
                    </ul>

 
                </div>
                
 
            </div>
        
        </section>

        <?php
    }
}
else {
    $error_message = "სახელი ან პაროლი, არასწორია!";
}

?>

<br>
<br>
<br>
<br>
<br>
<br>


<!-- Footer -->
<?php 
    include "footer.php";
?>
<!-- Footer END -->
 
 

</body>
</html>
 

