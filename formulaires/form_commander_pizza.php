<?php
    $listePizza = $bdd->prepare("   select distinct NOMPIZZA from PIZZA");
    $listePizza->execute();
?>

	<table>
	<?php while( $pizza = $listePizza->fetch() ) {
	echo '
		<tr>
			<td>
				<img src="images/'.$pizza['NOMPIZZA'].'.png" width="80px" height="80px" class="img-circle" style="float: left">
				<h3 style="float: left; padding-left: 15px;">'.ucfirst($pizza['NOMPIZZA']).'</h3>
			</td>
			<td align="center">
				Taille
			</td>
			<td align="center">
				Quantité
			</td>
		</tr>
		<tr>
			<td class="p-pizza">';
    $ingredients = $bdd->prepare("	select distinct NOMINGR from INGREDIENT
									join COMPOSE using(NUMEROINGREDIENT)
									join PIZZA using(NUMEROPIZZA)
									where NOMPIZZA = '".$pizza['NOMPIZZA']."'");
	$ingredients->execute();

	$ingredient = $ingredients->fetch();
	do {
		echo $ingredient['NOMINGR'].", ";
	} while ( $ingredient = $ingredients->fetch() );
    echo '
			</td>
			<form method="post" action="commander_pizza.php">
				<input style="display:none;" name="nom" id="nom" value="'.$pizza['NOMPIZZA'].'" />
				<td align="center">
					<SELECT name="Taille" size="1">
					';
	$taillesPizza = $bdd->prepare ("
								select LIBELLETAILLE , PRIXBASE + MODIFICATEURPRIX as PRIX
								from TAILLE
								join PIZZA using(NUMEROTAILLE)
								where NOMPIZZA = '".$pizza['NOMPIZZA']."'
							");
	$taillesPizza->execute();
	while( $taillePizza = $taillesPizza->fetch() )
	{
		echo '<option value="'.$taillePizza['LIBELLETAILLE'].'">'.ucfirst($taillePizza['LIBELLETAILLE']).' ( '.$taillePizza['PRIX'].' €)</option>';
	}
	echo '
				</td>
				<td align="center">
					<SELECT name="Quantite" size="1">
					<OPTION value="1">1</option>
					<OPTION value="2">2</option>
					<OPTION value="3">3</option>
					<OPTION value="4">4</option>
					<OPTION value="5">5</option>
					</SELECT>
				</td>
				<td>
					<input type="submit" value="Ajouter" />
				</td>
			</form>
		</tr>';
	}?>
	</table>
