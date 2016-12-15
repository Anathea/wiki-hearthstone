<?php
//En cas de problème, retourner à 1.
$page = intval($_GET['page'] ?? 1);

//Nombre de cartes sur une page
$maxcards = 8 ;

$db = require 'db.php';
require 'header.php';


//Bloc récupération de données
$query = $db->prepare('SELECT id, nom, img
        FROM kerazancards
        WHERE visibilite = 1
        ORDER BY classe ASC, mana DESC, nom ASC
        LIMIT ' . $maxcards * ($page - 1) . ', ' . ($maxcards + 1)); //Hack page suivante
$query->execute();
$cards = $query->fetchAll();

//Code pour page suivante
$isLastPage = FALSE;
if (count($cards) <= $maxcards) {
    $isLastPage = TRUE;
} else {
    array_pop($cards);
}


// Bloc traitement d'affichage
if (!count($cards)) {
    echo '<div><p>Aucune carte à cette adresse !</p></div>';
}
foreach ($cards as $card) {
    echo '<div class="cartes"><a href="card.php?id=' . $card['id'] . '">';
    echo '<img src="img-content/' . $card['img'] . '" alt="' . $card['nom'] . '" title="' . $card['nom'] . '">';
    echo '</a></div>';
}


if ($page > 1 && $page < count($cards)) {
    echo '<a href="cards.php?page=' . ($page - 1) . '" >Page précédente</a>';
}

if (!$isLastPage) {
    echo '<a href="cards.php?page=' . ($page + 1) . '">Page suivante</a>';
}


require 'footer.php';
