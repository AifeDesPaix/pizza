<?php session_start(); ?>
<?php include 'constructionPage/connection_BDD.php' // Ouverture session BDD => variable : $bdd ?>
<?php
    // Variables :
    $titre='Commander des Pizzas';
?>
<?php include 'constructionPage/head.php'; ?>
<?php include 'constructionPage/header.php'; ?>

<?php include 'constructionPage/menu.php'; ?>

<?php

	if( isset($_POST['nom']) ) {
		if(!isset( $_SESSION['NumCommande'])) {
			// Numero Commande
			$commande = $bdd->prepare("	select max(numerocommande)+1 as num 
											from COMMANDE");
			$commande->execute();
			$numCommande = $commande->fetch();

			$_SESSION['NumCommande'] = $numCommande['num'];
		}

		// Numero Client
		
		$nom = $_SESSION['nom'];
		$numClient = $bdd->prepare("	select NUMEROCLIENT
										from CLIENT 
										where nom = :nom");
		$numClient->execute( array( "nom" => $nom));
		$numeroClient = $numClient->fetch();
		
		// Numero Pizza
		$nomPizza = $_POST['nom'];
		$numPizza = $bdd->prepare 	("		select NUMEROPIZZA
											from PIZZA 
											join TAILLE using(NUMEROTAILLE)
											where NOMPIZZA = '".$_POST['nom']."'
											and LIBELLETAILLE = '".$_POST['Taille']."'
									");
		$numPizza->execute();
		$numeroPizza = $numPizza->fetch();
		// Date
		$date = date("Y-m-d"); 
		// Heure
		$heure = date("H:i");


		// insert into
		$insert = $bdd->prepare("INSERT INTO `COMMANDE`(NUMEROCLIENT, NUMEROPIZZA, NOMBREPIZZA, DATECOMMANDE, HEURECOMMANDE, NUMEROCOMMANDE) 
						values (:numeroclient, :numeropizza, :nombrepizza, :datecommande, :heurecommande, :numerocommande)");
		$insert->execute( array(
									"numeroclient" 		=> $numeroClient[0],
									"numeropizza" 		=> $numeroPizza[0],
									"nombrepizza" 		=> $_POST['Quantite'],
									"datecommande"		=> date("Y-m-d"),
									"heurecommande"		=> date("H:i"),
									"numerocommande"	=> $_SESSION['NumCommande']
								)
						);
		}

echo '<h1>Commander vos pizzas :</h1>';

include 'formulaires/form_commander_pizza.php';

if( isset($_SESSION['NumCommande']) ) { 
	echo '<hr widht="50%" style="margin-top: 25px; margin-bottom: 25px;"/>
	<h3>Ma commande :</h3>
	<p>';
	 
		$nb_Pizzas = 0;
		$total_prix = 0;
		$_SESSION['POTENTIELS_PTS_FIDELITE'] = 0;
		$total_duree = 0;
		echo 'Numero de Commande : '.$_SESSION['NumCommande'];

		// Le nombre de pizzas :
		$req_nb_pizzas = $bdd->prepare 	("
											select NOMBREPIZZA
											from COMMANDE
											where NUMEROCOMMANDE = '".$_SESSION['NumCommande']."'
										");
		$req_nb_pizzas->execute();
		while($com = $req_nb_pizzas->fetch())
		{
			$nb_Pizzas += $com['NOMBREPIZZA'];
		}


		$maCommande = $bdd->prepare ("	select NUMEROPIZZA, NOMPIZZA, NOMBREPIZZA, PRIXBASE + MODIFICATEURPRIX as PRIX, LIBELLETAILLE, NUMEROTAILLE
										from PIZZA 
										join COMMANDE using( NUMEROPIZZA )
										join TAILLE using( NUMEROTAILLE )
										where NUMEROCOMMANDE = '".$_SESSION['NumCommande']."'
										order by DATECOMMANDE, HEURECOMMANDE
									");
		$maCommande->execute();

		echo '<table class="border">
				<tr>
					<td><h3>Nombre</h3></td>
					<td><h3>Pizza</h3></td>
					<td><h3>Tps de Cuisson ( min )</h3></td>
					<td><h3>Prix Unitaire ( € )</h3></td>
					<td align="right"><h3>Prix ( € )</h3></td>
				</tr>';
		// Parcours de tous les éléments de la commande :
		while ($repMaCommande = $maCommande->fetch()) {

			$total_prix += $repMaCommande['NOMBREPIZZA']*$repMaCommande['PRIX'];
			$_SESSION['POTENTIELS_PTS_FIDELITE'] += $repMaCommande['NOMBREPIZZA']*$repMaCommande['NUMEROTAILLE'];

			$piz = $bdd->prepare("	
									select max(duree) as DUREE
									from INGREDIENT
									join COMPOSE using(NUMEROINGREDIENT)
									join PIZZA using(NUMEROPIZZA)
									where NUMEROPIZZA = ".$repMaCommande['NUMEROPIZZA']."	
								");
			$piz->execute();
			$pizDuree = $piz->fetch();
			$total_duree += $pizDuree['DUREE']*$repMaCommande['NOMBREPIZZA']; 

			echo '	<tr>
						<td align="center">
							'.$repMaCommande['NOMBREPIZZA'].'
						</td>
						<td>
							('.$repMaCommande['LIBELLETAILLE'].') '.$repMaCommande['NOMPIZZA'].'
						</td>
						<td align="center">
							'.$pizDuree['DUREE'].' min
						</td>
						<td align="center">
							'.$repMaCommande['PRIX'].' €
						</td>
						<td align="right">
							'.$repMaCommande['NOMBREPIZZA']*$repMaCommande['PRIX'].' €
						</td>
					</tr>';
		}


		if( $nb_Pizzas > 5)
		{
			if($total_duree < 15)
				$total_duree = 15;
			else
			{
				if(($total_duree/3) > 15)
					$total_duree /= 3;
			}
		}
		else
		{
			if($total_duree < 15)
				$total_duree = 15;
		}

		$_SESSION['heureCommande'] = $total_duree;

		echo '	<tr>
					<td></td>
					<th align="left">Temps de cuisson total (min) : </th>
					<th>'.$total_duree.' min</th>

					<th align="left"> Total ( € ) : </th>
					<th align="right">'.$total_prix.' € </th>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<th align="left"> Points Gagnés : </th>
					<th align="right"> <font color="green">'.$_SESSION['POTENTIELS_PTS_FIDELITE'].'</font> pts</th>
				</tr>
				</table>';

	echo '</p>';


	echo '<form method="post" action="paiement_CB.php" >
		<input type="submit" value="Payer !" style="display: block; width: 50px; margin-left: auto; margin-right: auto;" />
	</form>';
} 
?>

<?php include 'constructionPage/footer.php'; ?>

</body>

</html> 

