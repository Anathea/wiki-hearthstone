<?php
//
$page = intval($_GET['page'] ?? 1);

$db = require 'db.php';
require 'header.php';


//Bloc récupération de données
// /!\ SUPPRIMER L'ÉTOILE DANS LE SELECT
$query = $db->prepare('SELECT *
        FROM kerazancards
        ORDER BY classe ASC, mana DESC
        LIMIT ' . 15 * ($page - 1) . ', ' . (15 + 1)); //Hack page suivante
$query->execute();
$cards = $query->fetchAll();

//Code pour page suivante
$isLastPage = FALSE;
if (count($cards) <= 15) {
    $isLastPage = TRUE;
} else {
    array_pop($cards);
}


// Bloc traitement d'affichage
if (!count($cards)) {
    echo '<div><p>Aucune carte à cette adresse !</p>';
    echo '<p><a href="cards.php">Cliquez ici pour revenir à la page d\'accueil';
    echo '</a></p></div>';
}
foreach ($cards as $card) {
    echo '<div class="cartes"><a href="card.php?id=' . $card['id'] . '">';
    echo '<p>' . $card['nom'] . '</p>';
    echo '</a></div>';
}


if ($page > 1 && $page < count($cards)) {
    echo '<a href="cards.php?page=' . ($page - 1) . '" >Page précédente</a>';
}

if (!$isLastPage) {
    echo '<a href="cards.php?page=' . ($page + 1) . '">Page suivante</a>';
}


require 'footer.php';
