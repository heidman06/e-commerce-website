<?php

function connectTODB()
{

        try {
                $db = new PDO('mysql:host=localhost;dbname=u613553070_phpProject', 'u613553070_heidman06', 'Rachid1966*');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
        }

        return $db;
}
