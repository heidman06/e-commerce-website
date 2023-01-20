<?php

include "../includeConnect.php";

$firstName = $_POST['name'];
$surName = $_POST['surname'];
$email = $_POST['email'];
$pass = $_POST['password'];

if (strlen($pass) <= 6 || empty($pass)) {
        $error = "";
        header('Location: signUp.php?error=Choose a password longer then 6 character ' . urlencode($error));
} else {
        $password = password_hash($pass, PASSWORD_DEFAULT);
}


if (!isset($error)) {

        try {
                //On se connecte a la base de données
                $db = connectTODB();
                $checkMail = $db->prepare("SELECT * FROM registerclient WHERE email = :email");
                $checkMail->bindParam(':email', $email);
                $checkMail->execute();

                //On verifie que le mail n'existe pas déjà
                if ($checkMail->rowCount() > 0) {
                        header('Location: signUp.php?error=Mail already registred ' . urlencode($error));
                } else {

                        //Si il n'existe pas on ajoute l'utilisateur
                        $sql = "INSERT INTO registerclient (firstname, surname, email, password)
                        VALUES (:firstName,:surName,:email,:password)";

                        $statement = $db->prepare($sql);
                        $statement->execute([':firstName' => $firstName, ':surName' => $surName, ':email' => $email, ':password' => $password]);
                        echo "Successfully registred.......";
                        $to = $email;
                        $subject = "Account creation";
                        $message = "Your account has been created successfully";
                        $headers = "From: no-reply@desktopbuilder06.store" . "\r\n" .
                                "Reply-to: no-reply@desktopbuilder06.store";
                        if (mail($to, $subject, $message, $headers)) {
                                $to2 = "heidman06@desktopbuilder06.store";
                                $subject2 = "User registred in the website";
                                $message2 = "User : " . $firstName . " " . $surName . " " . "$email". " has been registred in the website";
                                $headers2 = "From: no-reply@desktopbuilder06.store" . "\r\n" .
                                        "Reply-to: no-reply@desktopbuilder06.store";
                                        mail($to2, $subject2, $message2, $headers2);
                        }
                        header("refresh:2;signIn.php");
                }
        } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
        }
}
$db = null;
