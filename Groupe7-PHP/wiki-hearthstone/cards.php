<?php

//En cas de problème, retourner à 1.
$page = intval($_GET['page']);

$db = require 'db.php';
require 'header.php';

$sql = "SELECT id, nom, img, classe
FROM kerazancards
WHERE 1
";

if (isset($_GET['classe']) && $_GET['classe'] != "all") {
    $sql .= "AND classe = :classe\n";
}

//Bloc récupération de données
if(isset($_GET['mana'])){
    if($_GET['mana'] > 0 && $_GET['mana'] <= 6) {
        $sql .= 'AND mana = :mana';
        $query = $db->prepare($sql);
        $query->bindValue(':mana',$_GET['mana']);
    } else if($_GET['mana'] >= 7) {
        $sql .= 'AND mana >= 7';
        $query = $db->prepare($sql);
    } else {
        $sql .= 'ORDER BY classe ASC, mana DESC';
        $query = $db->prepare($sql);
    }
} else if(isset($_GET['carte'])){
    $sql .= 'AND (nom LIKE :carte OR rarete LIKE :carte OR description LIKE :carte)';
    $query = $db->prepare($sql);
    $query->bindValue(':carte','%'.$_GET['carte'].'%');

} else{
    $sql .= 'ORDER BY classe ASC, mana DESC';
    $query = $db->prepare($sql); //Hack page suivante
}
if (isset($_GET['classe']) && $_GET['classe'] != "all") {
    $query->bindValue(':classe',$_GET['classe']);
}
$query->execute();
$cards = $query->fetchAll();




//Code pour page suivante
$isLastPage = FALSE;
if (count($cards) <= 4) {
    $isLastPage = TRUE;
} else {
    array_pop($cards);
}

// Bloc traitement d'affichage des cartes
//Message d'erreur
if (!count($cards)) {
    echo '<div><p>Aucune carte à cette adresse !</p></div>';
}

//Les cartes
foreach ($cards as $card) {
    echo '<div class="cartes" data-classe="'.$card['classe'].'"><a href="card.php?id=' . $card['id'] . '">';
    echo '<img src="img-content/' . $card['img'] . '">';
    echo '</a></div>';
}

//Bloc traitement d'affichage des pages suivantes
/*if ($page > 1 && $page < count($cards)) {
    echo '<a href="cards.php?page=' . ($page - 1) . '" >Page précédente</a>';
}

if (!$isLastPage) {
    echo '<a href="cards.php?page=' . ($page + 1) . '">Page suivante</a>';
}*/


require 'footer.php';