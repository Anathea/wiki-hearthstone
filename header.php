<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Asul" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet" type="text/css">
    <title>Hearthstone Wiki</title>
</head>
<body>
	<main class="clearfix">
          <div class="logodiv">
            <img class="logo" src="img-layout/hearthstone_logo.png" alt="Logo Hearthstone">
        </div></a>
        <!-- Page Carte -->

        <div >
            <img class="wallpaper" src="img-content/hearthstone-wallpaper1.jpg" alt="wallpaper">
        </div>

        <div class="nav clearfix">
            <form id="formreaserch" action="">
                <input type="text" id="carte" name="carte" placeholder="Rechercher une carte..." required>
                <input type="submit" >
            </form>
            <?php
            for($i = 1; $i < 8; $i++){
                echo "<a href='/cards.php?mana=".$i."' class='mana".$i."'> <img class='mana' src='img-layout/mana_".$i.".png' alt=''></a>";
            }
            ?>
        </div>
        <aside class="selection clearfix">
            <form action="" id="Select">
                <img src="img-layout/icone-voleur.png" alt=""><label for="voleur">Voleur</label> <input type="checkbox" class="chek" id="voleur"> <br>
                <img src="img-layout/icone-mage.png" alt=""><label for="mage">Mage</label> <input type="checkbox" class="chek" id="mage"> <br>
                <img src="img-layout/icone-shaman.png" alt=""><label for="shaman">Shaman</label> <input type="checkbox" class="chek" id="shaman"> <br>
                <img src="img-layout/icone-demoniste.png" alt=""><label for="demoniste">Démoniste</label><input type="checkbox" class="chek" id="demoniste"><br>
                <img src="img-layout/icone-druide.png" alt=""><label for="druide">Druide</label><input type="checkbox" class="chek" id="druide"><br>
                <img src="img-layout/icone-pretre.png" alt=""><label for="pretre">Prêtre</label> <input type="checkbox" class="chek" id="pretre"><br>
                <img src="img-layout/icone-guerrier.png" alt=""><label for="guerrier">Guerrier</label><input type="checkbox" class="chek" id="guerrier"><br>
                <img src="img-layout/icone-chasseur.png" alt=""><label for="chasseur">Chasseur</label><input type="checkbox" class="chek" id="chasseur"><br>
                <img src="img-layout/icone-paladin.png" alt=""><label for="paladin">Paladin</label><input type="checkbox" class="chek" id="paladin"><br>
                <img src="img-layout/icone-all.png" alt=""><label for="all">Toute les Cartes</label> <input type="checkbox" class="chek" id="all"> <br>
            </form>
        </aside>

        <section class="cartescontainer">
