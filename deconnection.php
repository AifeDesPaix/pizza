<?php session_start(); ?>
<?php include 'constructionPage/connection_BDD.php'; // Ouverture session BDD => variable : $bdd ?>
<?php
	// Variables :
	$titre='Déconnection';
?>
<?php include 'constructionPage/head.php'; ?>
<?php include 'constructionPage/header.php'; ?>

<?php include 'constructionPage/menu.php'; ?>

<?php
	if(isset($_SESSION['connecte']) && $_SESSION['connecte'] ) {
	    $_SESSION['connecte'] = false;
		unset($_SESSION['NumCommande']);
		$_SESSION['CommandePassee'] = false;
		unset($_SESSION['afficheHeure']);
	    header('Location: deconnection.php');
	}
?>
<p>Vous êtes déconnecté.</p>

<?php include 'constructionPage/footer.php'; ?>

</body>

</html> 
