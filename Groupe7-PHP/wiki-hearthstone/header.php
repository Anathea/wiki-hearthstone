<?php
$classeParam = "";
if(isset($_GET['classe'])){
    $classeParam = "&classe=".$_GET['classe'];
}
$manaParam = "";
if(isset($_GET['mana'])){
    $manaParam = "&mana=".$_GET['mana'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Asul" rel="stylesheet">
    <link href="styles/frontpage.css" rel="stylesheet" type="text/css">
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
    echo "<a href='/cards.php?mana=".$i.$classeParam."' class='mana".$i."'><img class='mana' src='img-layout/mana_".$i.".png' alt=''></a>";
}
?>
            <a href="/cards.php" class="mana_retour"> <img src="img-layout/mana_retour.png" class="mana"></a>
        </div>


        <aside class="selection clearfix">
            
<?php
$classes = [
    'voleur',
    'mage',
    'shaman',
    'demoniste',
    'druide',
    'pretre',
    'guerrier',
    'chasseur',
    'paladin',
    'all',
];
foreach($classes as $uneClasse){
    echo "<a href='/cards.php?classe=".$uneClasse.$manaParam."' class='mana".$uneClasse."'><img class='classe' src='img-layout/icone-".$uneClasse.".png' alt=''></a>\n";
}
?>
        </aside>

        <section class="cartescontainer">


