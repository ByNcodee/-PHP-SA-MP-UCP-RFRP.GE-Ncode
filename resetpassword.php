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
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

 
/*
 
$developmentMode = false;
$mailer = new PHPMailer($developmentMode);
 
$mailer->SMTPDebug = 3;

if ($developmentMode) {
$mailer->SMTPOptions = [
    'ssl'=> [
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    ]
];
}


$mailer->Host = 'mail.ncode.ge';
$mailer->SMTPAuth = true;
$mailer->Username = 'rfrp@ncode.ge';
$mailer->Password = 'NodoMariShanidze18';
$mailer->SMTPSecure = 'tls'; //'tls'
// $mailer->SMTPAutoTLS = false;
$mailer->Port = 587; //587, 465, 25, 2525 have been tested

$mailer->setFrom('rfrp@ncode.ge', 'Sender');
$mailer->addAddress('shanidzenodo0@gmail.com', 'Recipient');

 
$mailer->Subject = 'PHPMailer GMail SMTP test';
$mailer->msgHTML("test body"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mailer->AltBody = 'HTML messaging not supported';
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

 */

$SENDED = 0;
 

if(isset($_POST['submit_verification']) && $_SERVER["REQUEST_METHOD"] == "POST" ){
    $sended_code = trim(mysqli_escape_string($conn,$_POST['verification_input']));
    
    if($_SESSION['code_'] == $sended_code)
    {
        $SENDED = 2;
    }
    else {
        $SENDED = 1;
        $error_message = '
        <script>
        toastr["error"]("არასწორია", "შეცდომა");
        </script>
            ';
    }
 

}

if(isset($_POST['reset_password_user']) && $_SERVER["REQUEST_METHOD"] == "POST" ){

    $username = trim(mysqli_escape_string($conn,$_POST['user_name']));
    $email = trim(mysqli_escape_string($conn,$_POST['user_email']));
    $_SESSION['email'] =  $email;

    if ( !isset($username , $email)) {
        $error_message = '
            <script>
            toastr["error"]("შეყვანილი მონაცემები არ ემთხვევა", "შეცდომა");
            </script>
                ';
    }
    else {
 
 
    $sql = "SELECT Username,pEmail FROM users WHERE Username = '$username' AND pEmail = '$email'";
    $result = $conn->query($sql); 
    
    if ($result->num_rows > 0) { 

    
           
        $verifi_code = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 18)), 0, 18);//random string
        $_SESSION['code_'] = $verifi_code;
        $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'lukai3oss@gmail.com';
        $mail->Password = 'vjvendgygxhrqful';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet  = 'UTF-8';
        // Sender and recipient settings
        $mail->setFrom('lukai3oss@gmail.com', 'Realmforge RolePlay Administration');
        $mail->addAddress($email, 'Recipient');
         
      
        // Email content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = "Realmforge RolePlay პაროლის აღდგენა";
        $mail->Body = "  
        <center> 
        <div style='border-radius: 45px; background-color: #921fff; width: 400px; padding: 45px; '>
        <a href='https://rfrp.ge' target='_blank'>
            <img src='https://i.ibb.co/vmhhKXc/logo-3.png' style='width: 310px;'>
        </a>
        <h1 style='color:#fff'>პაროლის აღდგენა</h1>
        <h3 style='color:#fff'>ვერიფიკაციის კოდი</h3>
        <span style='    color: #0dff00;
        font-weight: 800;'  >
            <h1>".$verifi_code."</h1>
        </span>
    
     
        </div></center>
        "; // Example HTML body
            $mail->AltBody = 'This is the plain text version of the email content';
    
            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                $SENDED = 0;
            } else {
                
                $SENDED = 1;
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        



        }
        else {
            $error_message = '
            <script>
            toastr["error"]("შეყვანილი მონაცემები არ ემთხვევა", "შეცდომა");
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
 
  <?php if($SENDED == 0) {?>

  <div class="form-group">
    <div class="text_login_box">
        <img src="https://rfrp.ge/images/logo.png" class="rfrp_is_brand_login" alt="Realmforge RolePlay">  
        <h4>პაროლის აღდგენა</h4>
    </div>
    <label for="formGroupExampleInput" class="text-light">მოთამაშის სახელი</label>
    <input type="text" name="user_name" class="form-control" id="formGroupExampleInput" placeholder="სახელი_გვარი">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" class="text-light mt-1">მოთამაშის ელ.ფოსტა</label>
    <input type="email" name="user_email" class="form-control" id="formGroupExampleInput2" placeholder="ელ. ფოსტა">
  </div>  
 
  <p  class="text-light mt-2">იცით პაროლი? <a  rel="nofollow" href="login.php"  class="text-light">ავტორიზაცია</a></p>
  <input type="submit" name='reset_password_user' class="submit_login" value="აღდგენა"> 
  
  <?php } ?>

  <?php if($SENDED == 1) {?>

    <div class="form-group">
    <div class="text_login_box">
        <img src="https://rfrp.ge/images/logo.png" class="rfrp_is_brand_login" alt="Realmforge RolePlay">  
        <h4>ვერიფიკაცია</h4>
    </div>
    <label for="formGroupExampleInput" class="text-light">შეიყვანეთ ვერიფიკაციის კოდი</label>
    <input type="text" name="verification_input" class="form-control" id="formGroupExampleInput" placeholder="ვერიფიკაციის კოდი">
    </div>

    <p  class="text-light mt-2">ელ.ფოსტა <?php echo $email;?> - გამოგეგზავნათ დადასტურების კოდი  <a href="#"  class="text-light">ხელახლა გაგზავნა</a></p>
    <input type="submit" name='submit_verification' class="submit_login" value="აღდგენა"> 

    <?php } ?>
 
    
<?php if($SENDED == 2) {?>

<div class="form-group">
<div class="text_login_box">
    <img src="https://rfrp.ge/images/logo.png" class="rfrp_is_brand_login" alt="Realmforge RolePlay">  
    <h4>პაროლის აღდგენა</h4>
</div>
<label for="formGroupExampleInput" class="text-light">ახალი პაროლი</label>
<input type="text" name="verification_input" class="form-control" id="formGroupExampleInput" placeholder="ახალი პაროლი">
</div>
<label for="formGroupExampleInput1" class="text-light">გაიმეორეთ ახალი პაროლი</label>
<input type="text" name="verification_input" class="form-control" id="formGroupExampleInput1" placeholder="გაიმეორეთ პაროლი">
</div>
 
<input type="submit" name='submit_verification' class="submit_login" value="შენახვა"> 

<?php } ?>
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
 