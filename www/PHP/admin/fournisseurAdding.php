<?php
ob_start();
require './itemProcess.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- REQUIRE -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TITLE -->
    <title>Desktop Builder ADMIN</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="../../CSS/addItem.css">
    <link rel="stylesheet" href="../../CSS/navAdmin.css">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&family=Oleo+Script&family=Roboto:wght@100;400;500;900&display=swap" rel="stylesheet">
</head>

<body>
    <!-- NAV ADMIN -->
    <?php
    require './adminGeneralPartPage/adminNavbar.php';
    ?>

    <!-- CONTENT -->
    <div class="container">
        <div class="title-add-item">ADD A FOURNISSEUR</div>
        <form method="post">
            <div class="general part"><span class="span-title">General</span>
                <div class="div-cat-item form-group">
                    <label for="cat-item">Write the fournisseur name : </label>
                    <input type="text" id="cat-item" name="name-item" class="form-control" required>
                </div>
                <div class="div-name-item form-group">
                    <label for="name-item">Write the fournisseur city : </label>
                    <input type="text" id="name-item" name="city-item" class="form-control" required>
                </div>
                <div class="div-img-item form-group">
                    <label for="img-item">Choose the fournisseur picture : </label>
                    <input type="text" id="img-item" name="img-item">
                </div>
                <div class="div-name-item form-group">
                    <label for="name-item">Write the fournisseur country: </label>
                    <input type="text" id="name-item" name="country-item" class="form-control" required>
                </div>
                <div class="div-name-item form-group">
                    <label for="name-item">Write the fournisseur phone number: </label>
                    <input type="text" id="name-item" name="number-item" class="form-control" required>
                </div>
                <div class="div-name-item form-group">
                    <label for="name-item">Write the fournisseur email: </label>
                    <input type="text" id="name-item" name="mail-item" class="form-control" required>
                </div>
            <div class="form-group add-item" id="last-form-group">
                <button type="submit" name="submit-form" class="btn btn-primary btn-block">SUBMIT</button>
            </div>
    </div>
    </form>
    </div>

    <?php
    require './../generalPartPage/footerGeneral.php';
    ?>
    <!-- SCRIPT -->
    <script src="../../JS/fonctionsSite.js"></script>

    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/9e3559e954.js" crossorigin="anonymous"></script>
</body>

</html>

<?php

function createProductReference($name, $id)
{
    return $name . "-" . $id;
}

if (isset($_POST['submit-form'])) {
    if ((!empty($_POST['name-item'])) && (!empty($_POST['city-item'])) && (!empty($_POST['country-item'])) && (!empty($_POST['number-item'])) && (!empty($_POST['mail-item'])) && (!empty($_POST['img-item']))) {

        $nom_fournisseur = htmlspecialchars(strip_tags($_POST['name-item']));
        $ville_fournisseur = htmlspecialchars(strip_tags($_POST['city-item']));
        $img = htmlspecialchars(strip_tags($_POST['img-item']));
        $pays_fournisseur = htmlspecialchars(strip_tags($_POST['country-item']));
        $telephone_fournisseur = htmlspecialchars(strip_tags($_POST['number-item']));
        $email_fournisseur = htmlspecialchars(strip_tags($_POST['mail-item']));
        
        try {
            $conn = connectTODB();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->beginTransaction();
            $stmt = $conn->prepare("INSERT INTO fournisseur (nom_fournisseur, ville_fournisseur, pays_fournisseur, telephone_fournisseur, email_fournisseur, img) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute(array($nom_fournisseur, $ville_fournisseur, $pays_fournisseur, $telephone_fournisseur, $email_fournisseur, $img));
            $conn->commit();
            echo "The request was created successfully";
        } catch (Exception $e) {
            $conn->rollback();
            echo $e->getMessage();
        }
        $conn = null;
        //header('Location: adminListItem.php');
    }
    
    
}
