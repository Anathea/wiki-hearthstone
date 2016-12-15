<?php
//En cas de problème, retourner à 1.
$page = intval($_GET['page'] ?? 1);

//Nombre de cartes sur une page
$maxcards = 8 ;

//Connexion à la base de donnée + récupération du header
$db = require 'db.php';
require 'header.php';


//Bloc récupération de données et limited'affichage des cartes à 8
$query = $db->prepare('SELECT id, nom, img
        FROM kerazancards
        WHERE visibilite = 1
        ORDER BY classe ASC, mana DESC, nom ASC
        LIMIT ' . $maxcards * ($page - 1) . ', ' . ($maxcards + 1)); //Hack page suivante, ne pas modifier
$query->execute();
$cards = $query->fetchAll();

//Code pour page suivante
$isLastPage = FALSE;
if (count($cards) <= $maxcards) {
    $isLastPage = TRUE;
} else {
    array_pop($cards); //Supprime le 9ème élément
}


// Bloc traitement d'affichage
//Message d'erreur
if (!count($cards)) {
    echo '<div><p>Aucune carte à cette adresse !</p></div>';
}

//Si on clique sur une carte
foreach ($cards as $card) {
    echo '<div class="cartes"><a href="card.php?id=' . $card['id'] . '">';
    echo '<img src="img-content/' . $card['img'] . '" alt="' . $card['nom'] . '" title="' . $card['nom'] . '">';
    echo '</a></div>';
}

echo '<div class="fleches clearfix">';
if ($page > 1) {
    echo '<a href="cards.php?page=' . ($page - 1) . '" class="precedent" >Page précédente</a>';
}

if (!$isLastPage) {
    echo '<a href="cards.php?page=' . ($page + 1) . '" class="suivant" >Page suivante</a>';
}
echo '</div>';

require 'footer.php';
