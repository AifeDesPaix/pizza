



<?php session_start(); ?>
<?php include 'constructionPage/connection_BDD.php'; // Ouvertur session BDD => variable : $bdd ?>
<?php
    // Variables :
    $titre='Votre compte';
?>
<?php include 'constructionPage/head.php'; ?>
<?php include 'constructionPage/header.php'; ?>

    <?php include 'constructionPage/menu.php'; ?>

	<h1>A propos </h1>
	<fieldset>
	Ce projet est réalisé dans le cadre de nos études à l'IUT de Caen, antenne d'Ifs, dans le cadre de notre DUT.<br/>
	Il a pour but de nous apprendre à réaliser un projet de manière agile au sein d'un groupe de travail.
	</fieldset>

    <?php include 'constructionPage/footer.php'; ?>

</body>

</html> 
