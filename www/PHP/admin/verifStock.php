<?php require './../../includeConnect.php';
session_start();

//Récupération des données de stock

function verifAdmin(){

$DB = connectTODB();
$query = "SELECT * FROM gestion_stock";
$stmt = $DB->query($query);
$results = $stmt->fetchAll();


foreach($results as $row) {
  $nom_article = $row['nom_article'];
  $quantite = $row['quantite'];
  $seuil_critique = $row['seuil_critique'];

  if($quantite <= $seuil_critique) {
    echo "Le seuil a etait atteint";
    // Envoi d'une notification à l'administrateur pour signaler le stock critique
    $to = "heidman06@desktopbuilder06.store";
    $subject = "Stock critique pour l'article $nom_article";
    $message = "L'article $nom_article a atteint un niveau critique de stock. Veuillez passer une commande immédiatement.";
    $headers = "From: no-reply@desktopbuilder06.store";
    mail($to, $subject, $message, $headers);
  }else{
    echo "Le stock va bien";
  }
}
}

verifAdmin();

?>