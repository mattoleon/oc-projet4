<?php
try
{
	// On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On ajoute une entrée dans la table jeux_video
$reponse = $bdd->query('SELECT COUNT(nbre_joueurs_max) AS nbjeux FROM jeux_video');

while ($donnees = $reponse->fetch())
{
	echo $donnees['nbjeux'] . '<br />';
}

?>
    
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ma page web</title>
    </head>
    <body>
        <h1>Ma page web</h1>
        <?php
        $donnees = $reponse->fetch();
        echo fetch();
        ?>

    </body>
</html>