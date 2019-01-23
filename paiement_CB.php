<?php session_start(); ?>
<?php include 'constructionPage/connection_BDD.php' // Ouverture session BDD => variable : $bdd ?>

<?php include 'constructionPage/head.php'; ?>
<?php include 'constructionPage/header.php'; ?>

<?php
if( !isset($_POST['ok']) ) {
	echo '<h1> Paiement par CB </h1>';
	$_SESSION['afficheHeure'] = "ok";
	include 'formulaires/form_paiement.php';

} else {
	unset($_SESSION['NumCommande']);
	echo '<h1>Bravo t\'as payé, vbiens chercher tes pizzas dans 5 minutes !</h1>';
}


include 'constructionPage/footer.php'; ?>

</body>

</html>
