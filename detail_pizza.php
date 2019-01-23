<?php session_start(); ?>
<?php include 'constructionPage/connection_BDD.php'; // Ouverture session BDD => variable : $bdd ?>
<?php
	// Variables :
$titre='Détail de la Pizza';
?>
<?php include 'constructionPage/head.php'; ?>
<?php include 'constructionPage/header.php'; ?>

<?php include 'constructionPage/menu.php'; ?>

<?php
	
	if (isset ($_GET['nompizza']))
		echo '<p><h1>' . ucfirst($_GET['nompizza']) . '</h1></p>';
		echo '<img height = 150 whidth = 150 src = "images/'.$_GET['nompizza'].'.png">';
?>

<?php 
    $listeIngredient = $bdd->prepare("select distinct NOMINGR from INGREDIENT join COMPOSE using (NUMEROINGREDIENT) join PIZZA using (NUMEROPIZZA) where NOMPIZZA = '".$_GET['nompizza']."'");
    $listeIngredient->execute();

		while ( $infos = $listeIngredient->fetch(PDO::FETCH_ASSOC) ) {
		?>
		<ul>
		    <li>
			     <?php echo '<p>' . ucfirst(htmlspecialchars($infos['NOMINGR'])) . '<p>'; ?>
		    </li>
		</ul>
		    
		    	
		    <?php
		}

    $listeIngredient->closeCursor();
?>
<?php

if (isset($_SESSION['connecte']) && strcmp($_SESSION['connecte'], true) == 0)
	echo '<a href="commander_pizza.php"><h3>Pour commander cliquez ici !</h3></a>';
else {
	echo '<a href="connection.php"><h3>Connectez vous pour commander !</h3></a>';
	echo '<h3>Vous n\'avez pas encore de compte ? <a href="inscription.php">Inscrivez vous ici.</h3></a>';
	}
?>

<?php include 'constructionPage/footer.php'; ?>

</body>

</html> 
