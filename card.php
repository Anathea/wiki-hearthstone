<?php
$db = require 'db.php';
require 'header.php';

$cardId = intval($_GET['id']);

//Bloc récupération de données
// /!\ SUPPRIMER L'ÉTOILE DANS LE SELECT
$query = $db->prepare('SELECT nom, classe, mana, description, rarete, img
        FROM kerazancards
        WHERE id = :id');
$query->execute( [':id' => $cardId]);
$cards = $query->fetchAll();

// Bloc traitement d'affichage
if (!count($cards)) {
    echo '<div><p>Aucune carte à cette adresse !</p></div>';
}
$card = $cards[0];
    echo '<div class="cartes" id="brontis"><img src="img-content/' . $card['img'] . '" alt="' . $card['nom'] . '" title="' . $card['nom'] . '"></div>';
    echo '<div class=descriptioncontainer>';
    echo '<div class="cartesunique"><h3 >Nom : </h3><article>' . $card['nom'] . '</article></div><br>';
    echo '<div class="cartesunique"><h3>Classe : </h3><p>' . $card['classe'] . '</p></div><br>';
    echo '<div class="cartesunique"><h3>Coût en mana : </h3><p>' . $card['mana'] . '</p></div><br>';
    echo '<div class="cartesunique"><h3>Raretée : </h3><p>' . $card['rarete'] . '</p></div><br>';
    echo '<div class="cartesunique"><h3>Description : </h3><p>' . $card['description'] . '</p></div><br>';
    echo '</div>';




require 'footer.php';
