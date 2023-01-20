<?php

session_start();
if (isset($_SESSION["username"]) && $_SESSION["username"] != "admin@gmail.com") {
    header("location: gamerCat.php");
} else {
    header("refresh:5; ./admin/indexAdmin.php");
}

include "../includeConnect.php";



$email = $_POST['email'];
$password = $_POST['password'];

if (empty($password) || empty($email)) {
    $error = "Something is missing";
} else {
    try {
        //On se connecte a la base de données et on selectonne le mail ou mdp que l'utilisateur a tappée
        $db = connectTODB();
        $check = $db->prepare("SELECT * FROM registerclient WHERE email = :email OR password = :password");
        $check->execute(array(':email' => $email, ':password' => $password));
        $row = $check->fetch(PDO::FETCH_ASSOC);

        //On verifie que le mail est dans la base de données
        if ($check->rowCount() > 0) {
            if ($email == $row["email"]) {

                //On verifie que le mot de passe est bien le bon
                if (password_verify($password, $row["password"])) {
                    $_SESSION["username"] = $row["email"];

                    //On set le cookie ici
                    $hour = time() + 180;
                    setcookie('name', $row["email"], $hour, true);
                    if ($_SESSION["username"] == "admin@gmail.com") {


                        //ADMIN MAIL : admin@gmail.com   ADMIN MDP : admin123

                        echo "Welcome back admin.......";
                        $query = "SELECT stock FROM gestion_stock";
                        $stmt = $db->query($query);
                        $results = $stmt->fetchAll();

                        $seuil_atteint = FALSE;
                        foreach ($results as $row) {
                            $quantitie = $row['stock'];
                            $seuil_critique = $row['seuil_critique'];

                            if ($quantitie <= $seuil_critique) {
                                $seuil_atteint = TRUE;
                            }
                        }
                        if ($seuil_atteint === FALSE) {
                            echo '<br><h2 style="color : red;">Please check the stock some products may be or are at the threshold</h2>';
                        } else {
                            echo "Le stock va bien";
                        }

                        header("refresh:5; ./admin/indexAdmin.php");
                        exit();
                    } else {
                        echo "Successfully logged.......";
                        header("refresh:2; ../index.php");
                        exit();
                    }
                } else {
                    header('Location: signIn.php?error=Wrong password' . urlencode($error));
                }
            } else {
                header('Location: signIn.php?error=Wrong mail or password' . urlencode($error));
            }
        } else {
            header('Location: signIn.php?error=Wrong mail or password' . urlencode($error));
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
session_destroy();
