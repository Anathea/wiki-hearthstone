<?php

$action = $_POST['action'] ?? null;
$nom = $_POST['nom'] ?? null;
$mana = $_POST['mana'] ?? null;
$description = $_POST['description'] ?? null;
$rarete = $_POST['rarete'] ?? null;
$classe = $_POST['classe'] ?? null;

        
$db = require 'db.php';
require 'header.php';

echo '<h1>Proposer une carte :</h1>
	<form method="post" action="">
		<div>
			<label for="nom">Nom de carte :</label>
			<input type="text" name="nom" id="nom" 
                        placeholder="Ex: Illidan Hurlorage" required>
		</div>
                <div>
			<label for="rarete">Rareté de la carte :</label>
			<select name="rarete" id="rarete">
				<option value="commune"> Commune</option>
				<option value="rara"> Rare</option>
				<option value="epique"> Épique</option>
				<option value="legendaire"> Légendaire</option>
			</select>
		</div>
                <div>
			<label for="classe">Classe :</label>
			<select name="classe" id="classe">
				<option value="demoniste">Démoniste</option>
				<option value="druide">Druide</option>
				<option value="mage">Mage</option>
				<option value="pretre"> Prêtre</option>
				<option value="paladin">Paladin</option>
				<option value="voleur">Voleur</option>
				<option value="chasseur">Chasseur</option>
				<option value="guerrier">Guerrier</option>
				<option value="shaman">Shaman</option>
                                <option value="9points">Neutre</option>
			</select>
		</div>
		<div>
			<label for="mana">points de Mana :</label>
                        <input type="number" name="mana" id="mana" required>
		</div>
		<div>
			<textarea placeholder="Écrivez votre description ici"
                        name="description"></textarea>
		</div>
		<div>
			<span>Insérez votre image :</span>
			<input type="file" name="img" id="img">
		</div>
		<div>
			<input type="submit" name="action" id="action" 
                        value="Ajouter">
		</div>
	</form>';

if($action == 'Ajouter') {
    if($nom !== null && $mana !== null && $description !== null) {
        $query = $db->prepare('INSERT 
            INTO kerazancards (nom, classe, mana, description, rarete, visibilite)
            VALUES (:nom, :classe, :mana, :description, :rarete, 0)');
        $query->execute([':nom' => htmlentities($nom), 
            ':classe' => htmlentities($classe), ':mana' => intval($mana),
            ':description' => htmlentities($description), 
            ':rarete' => htmlentities($rarete)]);
    }
}


require 'footer.php';