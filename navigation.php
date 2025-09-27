<div class="loader_block" id="l_ss">
    <div class="cardloader">
    <img src="images/RFRP.png" class="rfrp_is_brand" alt="Realmforge RolePlay Logo">
    <div class="loader">
        <p>იტვირთება</p>
        <div class="words">
        <span class="word">ნავიგაცია</span>
        <span class="word">ფოტოები</span>
        <span class="word">ღილაკები</span>
        <span class="word">ტექსტები</span>
        <span class="word">ობიექტები</span>
        </div>
    </div>
    </div>
</div> 

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
    <a class="navbar-brand rfrp_logo" href="index.php" >
        <img src="images/RFRP.png" class="rfrp_is_brand" alt="Realmforge RolePlay Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
            <a class="nav-link text-light" target="_blank" href="https://rfrpforum.ncode.ge/">ფორუმი</a>
        </li> 
 
        <?php if (!isset($_SESSION['web_user'])) { ?>
            <li class="nav-item active">
                <a class="nav-link text-light control_panel" rel="nofollow" href="login.php"> ავტორიზაცია </a>
            </li>
        <?php } ?>
 
 
        <?php if (isset($_SESSION['web_user'])) { ?>
            <li class="nav-item active">
                <a class="nav-link text-light control_panel" rel="nofollow" href="profile.php?login_user=<?php echo $_SESSION["web_user"] ?>">   
                <img class='avatar_img' src='skins/<?php echo $_SESSION["user_skin"]; ?>.png'>
                <h4><?php echo $_SESSION["web_user"]; ?> </h4>
                <span>პროფილის ნახვა</span>
                </a>
            </li>
        <?php } ?>

 
 
        </ul>
    </div>
    </div>
</nav>
 
