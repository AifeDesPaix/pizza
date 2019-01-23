
<?php session_start(); ?>
<?php include 'constructionPage/connection_BDD.php' // Ouverture session BDD => variable : $bdd ?>

<?php 
function Redirect($url, $permanent = false) {
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

/*$nbpizza = $bdd->prepare("select sum(NOMBREPIZZA) as nb from COMMANDE where NUMEROCOMMANDE = ".$_SESSION['numcommande']."");
$nbpizza->execute();
echo $nbpizza;
$nb = $nbpizza->fetch();
echo $nb;*/

	$_SESSION['POTENTIELS_PTS_FIDELITE'];

	$ptsfidelite = $bdd->prepare("select POINTSFIDELITE + ".$_SESSION['POTENTIELS_PTS_FIDELITE']." as PTS from CLIENT where pseudo = '".$_SESSION['pseudo']."'");
	$ptsfidelite->execute();
	$data = $ptsfidelite->fetch();

	$update = $bdd->prepare("update CLIENT set POINTSFIDELITE = ".$data['PTS']." where PSEUDO = '".$_SESSION['pseudo']."'");
	$update->execute();
	$_SESSION['pointsfidelite'] = $data['PTS'];

	$numcomm = $bdd->prepare("update COMMANDE set NUMEROCOMMANDE = ".$_SESSION['NumCommande']." + 1 where pseudo = '".$_SESSION['pseudo']."'"); 
	$numcomm->execute();
	unset($_SESSION['NumCommande']);
	Redirect('index.php', false);
?>
