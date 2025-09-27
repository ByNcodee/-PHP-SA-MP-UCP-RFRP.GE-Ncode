<?php
session_start();
include "mysql_config.php";
$conn = OpenCon();
$error_message = "";
 

if(isset($_SESSION['web_user']))
{
    header("location: index.php");
    return;
}
 

if(isset($_POST['login_user']) && $_SERVER["REQUEST_METHOD"] == "POST" ){

$username = trim(mysqli_escape_string($conn,$_POST['user_name']));
$password = trim(mysqli_escape_string($conn,$_POST['user_password']));
 

if ( !isset($username , $password)) {
    $error_message = '
        <script>
        toastr["error"]("შეყვანილი პაროლი ან სახელი არასწორია", "შეცდომა");
        </script>
            ';
}
else {
 
    $query = "SELECT * FROM users WHERE Username ='$username' AND pPassword='$password'";
    $results = mysqli_query($conn, $query);

    // $results = 1 means that one user with the
    // entered username exists
    if (mysqli_num_rows($results) == 1) {

        
        $sql = "SELECT * FROM users WHERE Username ='$username' "; 
        $result = $conn->query($sql); 
         
        if ($result->num_rows > 0) { 
   
 
            $error_message = ' <script> toastr["success"]("თქვენ წარმატებით გაიარეთ ავტორიზაცია", "შესრულდა");  </script>';
 
            $row = $result->fetch_assoc(); 
            $_SESSION["user_skin"] = $row["pSkin"];

            $_SESSION["web_user"] = $row["Username"];
 
 
            echo "<meta http-equiv=\"refresh\" content=\"2;url=profile.php?login_user=".$row["Username"]."\"/>";
            
        }
    }
    else {
        $error_message = '
        <script>
        toastr["error"]("შეყვანილი პაროლი ან სახელი არასწორია", "შეცდომა");
        </script>
        ';
    }
}
 
} else {
 
}
 
?>
<!doctype html>
<html lang="ka">
<head>
    <title>Realmforge RolePlay | Official</title>
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
     
    <link rel="stylesheet" href="scripts/Toast/toastr.css">

    <link rel="icon" type="image/x-icon" href="https://rfrp.ge/images/logo.png">
</head>
<body>
 
<!-- Navigation -->
<?php 
    include "navigation.php";
?> 
<!-- Page Content -->
<br>
<br>
<section class="mt-7 py-5 login_section">
    
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <div class="text_login_box">
        <img src="https://rfrp.ge/images/logo.png" class="rfrp_is_brand_login" alt="Realmforge RolePlay">  
        <h4>ანგარიშზე შესვლა</h4>
    </div>
    <label for="formGroupExampleInput" class="text-light">მოთამაშის სახელი</label>
    <input type="text" name="user_name" class="form-control" id="formGroupExampleInput" placeholder="სახელი_გვარი">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" class="text-light mt-1">მოთამაშის პაროლი</label>
    <input type="password" name="user_password" class="form-control" id="formGroupExampleInput2" placeholder="პაროლი">
  </div>  
 
  <p  class="text-light mt-2">დაგავიწყდა პაროლი? <a  rel="nofollow" href="resetpassword.php"  class="text-light">პაროლის აღდგენა</a></p>
  <input type="submit" name='login_user' class="submit_login" value="ავტორიზაცია"> 
</form>

</section>
 
<br>
<br>
<!-- Footer -->
<?php 
    include "footer.php";
?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Footer END -->
<script src="scripts/Toast/toastr.min.js"></script>

<script>
 

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>


<span class="error_text"><?php 
    if($error_message != "")
    {
        echo $error_message;
    }
?></span>

</body>
</html>
 