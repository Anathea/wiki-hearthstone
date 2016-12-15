<?php
$db = require 'db.php';
require 'header.php';

$cardId = intval($_GET['id'] ?? -1);

//Bloc récupération de données
// /!\ SUPPRIMER L'ÉTOILE DANS LE SELECT
$query = $db->prepare('SELECT nom, classe, mana, description, rarete, img
        FROM kerazancards
        WHERE id = :id
            AND visibilite = 1');
$query->execute( [':id' => $cardId]);
$cards = $query->fetchAll();

// Bloc traitement d'affichage
if (!count($cards)) {
    echo '<div><p>Aucune carte à cette adresse !</p></div>';
}
$card = $cards[0];
    echo '<div class="cartes"><img src="img-content/' . $card['img'] . '" alt="' . $card['nom'] . '" title="' . $card['nom'] . '"></div>';
    echo '<div class="cartes"><p>' . $card['nom'] . '</p></div>';
    echo '<div class="cartes"><p>' . $card['classe'] . '</p></div>';
    echo '<div class="cartes"><p>' . $card['mana'] . '</p></div>';
    echo '<div class="cartes"><p>' . $card['rarete'] . '</p></div>';
    echo '<div class="cartes"><p>' . $card['description'] . '</p></div>';




require 'footer.php';
