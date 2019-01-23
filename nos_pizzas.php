<?php session_start(); ?>
<?php include 'constructionPage/connection_BDD.php'; // Ouverture session BDD => variable : $bdd ?>
<?php
	// Variables :
$titre='Nos Pizzas';
?>
<?php include 'constructionPage/head.php'; ?>
<?php include 'constructionPage/header.php'; ?>

<?php include 'constructionPage/menu.php'; ?>

<?php 
    $listePizza = $bdd->prepare("select distinct NOMPIZZA from PIZZA");
    $listePizza->execute();

    echo '	<table>
    			<tr align="center">
    				<td></td>
    				<td><h3>Pizzas</h3></td>
    				<td><h3>Ingrédients</h3></td>
    				<td><h3>Prix Unitaire ( € )</h3></td>
    			</tr>
    	';

		while ( $infos = $listePizza->fetch(PDO::FETCH_ASSOC) ) {
		?>
		        <tr>
		        	<td>
		            	<?php echo '<img src="images/'.$infos['NOMPIZZA'].'.png" width="120px" height="120px" class="img-rounded">'; ?>
		            </td>
		            <td align = "center">
			        <?php echo '<p style="margin-left: 25px; margin-right: 25px;"><font size=4 color="black" face="Arial">' . htmlspecialchars(ucfirst($infos['NOMPIZZA'])) . '</font></p>'; ?>			        
		            </td>

		            <td>
		            <?php 
    $listeIngredient = $bdd->prepare("select distinct NOMINGR from INGREDIENT join COMPOSE using (NUMEROINGREDIENT) join PIZZA using (NUMEROPIZZA) where NOMPIZZA = '".$infos['NOMPIZZA']."'" );
    $listeIngredient->execute();
    ?>
		            	<?php while ( $infos = $listeIngredient->fetch(PDO::FETCH_ASSOC) ) {
						?>
						
			   				  <?php echo '<font size=3 color="black" face="Arial"><i>' . htmlspecialchars(ucfirst($infos['NOMINGR'])).', '.'</i></font>'; ?>
		    			
		    	    	
		   			 <?php		
		}

    $listeIngredient->closeCursor();
?>
		            </td>
		            <td>
						<?php
							$taillesPizza = $bdd->prepare 	("
																select LIBELLETAILLE , PRIXBASE + MODIFICATEURPRIX as PRIX
																from TAILLE
																join PIZZA using(NUMEROTAILLE)
																where NOMPIZZA = '".$infos['NOMPIZZA']."'
															");
							$taillesPizza->execute();
							while( $taillePizza = $taillesPizza->fetch() )
							{
								echo 	'<p>'.
											ucfirst($taillePizza['LIBELLETAILLE']).' ( '.$taillePizza['PRIX'].
										' €) </br>';
							}
						?>
		            </td>
		        </tr>
		    <?php
		}
    echo '</table>';

    $listePizza->closeCursor();
?>

<?php

if (isset($_SESSION['connecte']) && strcmp($_SESSION['connecte'], true) == 0)
	echo '<a href="commander_pizza.php"><h3 align="center">Pour commander cliquez ici !</h3></a>';
else {
	echo 	'<h3 align="center"><a href="connection.php"><h3>Connectez vous pour commander !</h3></a>';
			'<h3 align="center">Vous n\'avez pas encore de compte ? <a href="inscription.php">Inscrivez vous ici.</h3></a>';
	}
?>

<?php include 'constructionPage/footer.php'; ?>

</body>

</html> 
