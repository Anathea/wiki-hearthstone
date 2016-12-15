<?php
$db = require '../db.php';
require '../header.php';

$cardId = intval($_GET['id'] ?? -1);

//Bloc récupération de données
$query = $db->prepare('SELECT nom, classe, mana, description, rarete, img, visibilite
        FROM kerazancards
        WHERE id = :id');
$query->execute( [':id' => $cardId]);
$cards = $query->fetchAll();

// Bloc traitement d'affichage
if (!count($cards)) {
    echo '<div><p>Aucune carte à cette adresse !</p></div>';
}
$card = $cards[0];
    
echo '<h1>Proposer une carte :</h1>
	<form method="post" action="">
                <div class="champ"><img src="../img-content/' . $card['img'] . '" alt="' . $card['nom'] . '" title="' . $card['nom'] . '"></div>
		<!--</div>
                <div class="champ">
			<label for="nom">Nom de la carte :</label>
			<input type="text" name="nom" id="nom" 
                        value="' . $card['nom'] . '" required>
		</div>-->
                <div>
			<label for="nom">Classe de la carte :</label>
                        <select name="rarete" id="rarete">
				<option' . ($card['rarete'] == 'commune' ? ' selected>' : '>') . 'Commune</option>
				<option' . ($card['rarete'] == 'rare' ? ' selected>' : '>') . 'Rare</option>
				<option' . ($card['rarete'] == 'epique' ? ' selected>' : '>') . 'Épique</option>
				<option' . ($card['rarete'] == 'legendaire' ? ' selected>' : '>') . 'Légendaire</option>
			</select>
		</div>
                <div class="champ">
			<label for="classe">Classe :</label>
			<select name="classe" id="classe">
                                <option' . ($card['classe'] == 'demoniste' ? ' selected>' : '>') . 'Démoniste</option>
                                <option' . ($card['classe'] == 'druide' ? ' selected>' : '>') . 'Druide</option>
				<option' . ($card['classe'] == 'mage' ? ' selected>' : '>') . 'Mage</option>
				<option' . ($card['classe'] == 'mage' ? ' selected>' : '>') . 'Mage</option>
                                <option' . ($card['classe'] == 'pretre' ? ' selected>' : '>') . 'Prêtre</option>
                                <option' . ($card['classe'] == 'paladin' ? ' selected>' : '>') . 'Paladin</option>
				<option' . ($card['classe'] == 'voleur' ? ' selected>' : '>') . 'Voleur</option>
				<option' . ($card['classe'] == 'chasseur' ? ' selected>' : '>') . 'Chasseur</option>
                                <option' . ($card['classe'] == 'guerrier' ? ' selected>' : '>') . 'Guerrier</option>
				<option' . ($card['classe'] == 'shaman' ? ' selected>' : '>') . 'Shaman</option>
                                <option' . ($card['classe'] == 'neutre' ? ' selected>' : '>') . 'Neutre</option>
			</select>
		</div>
		<div class="champ">
			<label for="mana">points de Mana :</label>
                        <input type="number" name="mana" id="mana"
                        value="' . $card['mana'] . '" required>
		</div>
		<div class="champ">
			<textarea name="description">' . $card['description'] . '</textarea>
		</div>
                <div>
                    <input type="checkbox" name="visibilite" id="visibilite"' . ($card['visibilite'] ? ' checked>' : '>') . '<label 
                        for="visibilite">Carte visible</label>
                </div>

		<div class="champ">
			<input type="submit" name="action" id="action" 
                        value="Ajouter">
		</div>
	</form>';




require '../footer.php';
