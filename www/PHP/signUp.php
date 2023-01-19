<!DOCTYPE html>
<html lang="en">

<head>
    <!-- REQUIRE -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TITLE -->
    <title>Desktop Builder</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/nav.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/sign.css">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&family=Oleo+Script&display=swap" rel="stylesheet">
</head>

<body>
    <!-- NAVBAR -->
    <?php
    require './generalPartPage/navbar.php';
    ?>



    <!-- FORM -->
    <div class="login-form">

        <form action="signUpProcess.php" method="post">
            <h2 class="text-center">Sign Up</h2>
            <div class="form-group">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="name" class="form-control" placeholder="Name" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="surname" class="form-control" placeholder="Surname" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <i class="fa-solid fa-key"></i>
                <input type="password" name="password" class="form-control" placeholder="Password" required="required" autocomplete="off">
            </div>
            <div class="form-group" id="last-form-group">
                <button type="submit" class="btn btn-primary btn-block">Register</button>

                <?php

                if (isset($_GET['error'])) {
                    echo "<br><br>" . $_GET['error'];
                }
                ?>
            </div>
        </form>
    </div>



    <?php
    require './generalPartPage/footerGeneral.php';
    ?>
    <!-- SCRIPT -->
    <script src="../JS/fonctionsSite.js"></script>

    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/9e3559e954.js" crossorigin="anonymous"></script>
</body>


</html>