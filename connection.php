<?php session_start(); ?>
<?php include 'constructionPage/connection_BDD.php' // Ouverture session BDD => variable : $bdd ?>
<?php
    // Variables :
    $titre='Connection';
?>
<?php include 'constructionPage/head.php'; ?>
<?php include 'constructionPage/header.php'; ?>

    <?php include 'constructionPage/menu.php'; ?>

<?php
    if( isset($_POST['Identifiant']) && isset($_POST['Mdp']) ) {

    	$identifiant = $_POST['Identifiant'];
    	$mdp = $_POST['Mdp'];

        $connection = $bdd->prepare("   select pseudo, nom, prenom, adresse, telephone, pointsfidelite 
                                        from CLIENT
                                        where pseudo = :identifiant and motdepasse = :mdp");
        $connection->execute( array("identifiant" => $identifiant, "mdp" => $mdp) );
        $resultat = $connection->fetch(PDO::FETCH_ASSOC);

        if( !$resultat ) {
            include_once 'formulaires/form_connection.php';
            echo '<p class="rouge">Identifiants incorrects</p>';
        } else {
            $_SESSION['pseudo'] = $resultat['pseudo'];
            $_SESSION['nom'] = $resultat['nom'];
            $_SESSION['prenom'] = $resultat['prenom'];
            $_SESSION['adresse'] = $resultat['adresse'];
            $_SESSION['telephone'] = $resultat['telephone'];
            $_SESSION['pointsfidelite'] = $resultat['pointsfidelite'];
            $_SESSION['connecte'] = true;

            header('Location: connection.php');
        }
    } 
  
    if(isset($_SESSION['connecte']) && $_SESSION['connecte']) {
        echo "Vous êtes bien connecté !";
    } else {
        include_once 'formulaires/form_connection.php';
    } 
?>
    <?php include 'constructionPage/footer.php'; ?>

</body>

</html> 

