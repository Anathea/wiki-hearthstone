<?php
$db = require 'db.php';
require 'header.php';

$cardId = intval($_GET['id'] ?? -1);

//Bloc récupération de données
// /!\ SUPPRIMER L'ÉTOILE DANS LE SELECT
$query = $db->prepare('SELECT *
        FROM kerazancards
        WHERE id = :id');
$query->execute( [':id' => $cardId]);
$cards = $query->fetchAll();

// Bloc traitement d'affichage
if (!count($cards)) {
    echo '<div><p>Aucune carte à cette adresse !</p>';
    echo '<p><a href="cards.php">Cliquez ici pour revenir à la page d\'accueil';
    echo '</a></p></div>';
}
$card = $cards[0];
    echo '<div class="cartes"><p>' . $card['nom'] . '</p></div>';




require 'footer.php';
