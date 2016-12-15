<?php

//En cas de problème, retourner à 1.
$page = intval($_GET['page']);

$db = require 'db.php';
require 'header.php';

//Bloc récupération de données
if(isset($_GET['mana'])){
    if($_GET['mana'] > 0 && $_GET['mana'] <= 6){
        $query = $db->prepare('SELECT id, nom, img, classe
        FROM kerazancards WHERE mana = '.$_GET['mana']);
        $query->execute();
        $cards = $query->fetchAll();
    }
    else if($_GET['mana'] >= 7){
        $query = $db->prepare('SELECT id, nom, img, classe
        FROM kerazancards WHERE mana >= 7');
        $query->execute();
        $cards = $query->fetchAll();
    }
    else{
        $query = $db->prepare('SELECT id, nom, img, classe
        FROM kerazancards
        ORDER BY classe ASC, mana DESC');
        $query->execute();
        $cards = $query->fetchAll();
    }
}
else if(isset($_GET['carte'])){
    $query = $db->prepare('SELECT id, nom, img, classe
        FROM kerazancards WHERE nom LIKE :carte');
    $query->bindValue(':carte','%'.$_GET['carte'].'%');
    $query->execute();

    $cardsName = $query->fetchAll();

    $query = $db->prepare('SELECT id, nom, img, classe
        FROM kerazancards WHERE rarete LIKE :carte');
    $query->bindValue(':carte','%'.$_GET['carte'].'%');
    $query->execute();

    $cardsRare = $query->fetchAll();

    $query = $db->prepare('SELECT id, nom, img, classe
        FROM kerazancards WHERE description LIKE :carte');
    $query->bindValue(':carte','%'.$_GET['carte'].'%');
    $query->execute();

    $cardsDesc = $query->fetchAll();

    $cards = array();
    if(count($cardsName)> 0){
        foreach($cardsName as $name){
            array_push($cards,$name);
        }
    }
    if(count($cardsRare)> 0){
        foreach($cardsRare as $rare){
            array_push($cards,$rare);
        }
    }
    if(count($cardsDesc)> 0){
        foreach($cardsDesc as $desc){
            array_push($cards,$desc);
        }
    }
}
else{
    $query = $db->prepare('SELECT id, nom, img, classe
        FROM kerazancards
        ORDER BY classe ASC, mana DESC'); //Hack page suivante
    $query->execute();
    $cards = $query->fetchAll();
}



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