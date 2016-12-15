<?php
//En cas de problème, retourner à 1.
$page = intval($_GET['page'] ?? 1);
$action = $_POST['action'] ?? NULL;
$id = intval($_POST['id'] ?? NULL);

//Nombre de cartes sur une page
$maxcards = 8 ;

$db = require '../db.php';
require 'header.php';

// Traitement des actions
if($action == 'Supprimer') {
    $query = $db->prepare('DELETE
        FROM kerazancards
        WHERE id = :id');
    $query->execute([':id' => $id]);
}

//Bloc récupération de données
$query = $db->prepare('SELECT id, nom, img, visibilite
        FROM kerazancards
        ORDER BY visibilite ASC, classe ASC, mana DESC, nom ASC
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
    echo '<div class="cartesadmin"><div class="cartes">';
    echo '<a href="card.php?id=' . $card['id'] . '">';
    echo '<img src="../img-content/' . $card['img'] . '" alt="' . $card['nom'] 
            . '" title="' . $card['nom'] . '">';
    echo '</a></div>';
    if (!$card['visibilite']) {
        echo '<p>Carte à valider</p>';
    }
    echo '<div class=moderation"><form method="post" action=""><input '
    . 'type="hidden" name="id" value="' . $card['id'] 
            . '"><input type="submit" name="action" id="action" 
                        value="Supprimer"></form></div></div>';
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

