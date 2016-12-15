<?php
$db = require_once '../db.php';
require_once 'header.php';

$cardId = $_GET['id'] ?? -1;
$action = $_POST['action'] ?? NULL;
$nom = $_POST['nom'] ?? NULL;
$mana = $_POST['mana'] ?? NULL;
$description = $_POST['description'] ?? NULL;
$rarete = $_POST['rarete'] ?? NULL;
$classe = $_POST['classe'] ?? NULL;
$visibilite = ($_POST['visibilite'] ?? '' == 'visible') ? true : false;

//Bloc de modification
if($action == 'Modifier') {
    if($nom !== null && $mana !== null && $description !== null) {
        $query = $db->prepare('UPDATE kerazancards
            SET 
              nom = :nom,
              classe = :classe,
              description = :description,
              rarete = :rarete,
              mana = :mana,
              visibilite = :visibilite
            WHERE id = :id');
        $query->execute([':id' => intval($cardId),
            ':nom' => htmlentities($nom), 
            ':classe' => htmlentities($classe), 
            ':mana' => intval($mana),
            ':description' => htmlentities($description), 
            ':rarete' => htmlentities($rarete),
            ':visibilite' => intval($visibilite)]);
    }
}

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
echo '<h2>Modifier une carte :</h2>
	<form method="post" action="">
                <div class="cartes"><img src="../img-content/' . $card['img'] . '" alt="' . $card['nom'] . '" title="' . $card['nom'] . '"></div>
		</div>
                <div class="champ">
			<label for="nom">Nom de la carte :</label>
			<input type="text" name="nom" id="nom" 
                        value="' . $card['nom'] . '" required>
		</div>
                <div>
			<label for="nom">Rareté de la carte :</label>
                        <select name="rarete" id="rarete">
				<option value="commune" ' . ($card['rarete'] == 'commune' ? ' selected>' : '>') . 'Commune</option>
				<option value="rare"' . ($card['rarete'] == 'rare' ? ' selected>' : '>') . 'Rare</option>
				<option value="epique"' . ($card['rarete'] == 'epique' ? ' selected>' : '>') . 'Épique</option>
				<option value="legendaire"' . ($card['rarete'] == 'legendaire' ? ' selected>' : '>') . 'Légendaire</option>
			</select>
		</div>
                <div class="champ">
			<label for="classe">Classe de la carte :</label>
			<select name="classe" id="classe">
                                <option value="demoniste"' . ($card['classe'] == 'demoniste' ? ' selected>' : '>') . 'Démoniste</option>
                                <option value="druide"' . ($card['classe'] == 'druide' ? ' selected>' : '>') . 'Druide</option>
				<option value="mage"' . ($card['classe'] == 'mage' ? ' selected>' : '>') . 'Mage</option>
                                <option value="pretre"' . ($card['classe'] == 'pretre' ? ' selected>' : '>') . 'Prêtre</option>
                                <option value="paladin"' . ($card['classe'] == 'paladin' ? ' selected>' : '>') . 'Paladin</option>
				<option value="voleur"' . ($card['classe'] == 'voleur' ? ' selected>' : '>') . 'Voleur</option>
				<option value="chasseur"' . ($card['classe'] == 'chasseur' ? ' selected>' : '>') . 'Chasseur</option>
                                <option value="guerrier"' . ($card['classe'] == 'guerrier' ? ' selected>' : '>') . 'Guerrier</option>
				<option value="shaman"' . ($card['classe'] == 'shaman' ? ' selected>' : '>') . 'Shaman</option>
                                <option value="neutre"' . ($card['classe'] == 'neutre' ? ' selected>' : '>') . 'Neutre</option>
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
                    <input type="checkbox" name="visibilite" id="visibilite"' . ($card['visibilite'] ? ' checked>' : ' value="visible">') . '<label 
                        for="visibilite">Carte visible</label>
                </div>

		<div class="champ">
			<input type="submit" name="action" id="action" 
                        value="Modifier">
		</div>
	</form>';


require_once 'footer.php';
