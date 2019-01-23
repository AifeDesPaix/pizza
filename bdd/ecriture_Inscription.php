<?php session_start(); ?>
<?php include '../constructionPage/connection_BDD.php'; // Ouverture session BDD => variable : $bdd ?>
<?php

if (isset($_POST['Identifiant']) 
    && isset($_POST['Mdp']) 
    && isset($_POST['Nom']) 
    && isset($_POST['Prenom'])
    && isset($_POST['num_rue'])
    && isset($_POST['nom_rue'])
    && isset($_POST['CP'])
    && isset($_POST['Ville'])
    && isset($_POST['Tel']) ) {


    // On récupère les données :
    $id = $_POST['Identifiant'];
    $mdp = $_POST['Mdp'];
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];    
    $adresse = $_POST['num_rue']." ". $_POST['nom_rue']." ". $_POST['CP']." ".$_POST['Ville'];
    $tel = $_POST['Tel'];

    $req = $bdd->prepare('insert into CLIENT(PSEUDO, NOM, PRENOM, ADRESSE, TELEPHONE, POINTSFIDELITE, MOTDEPASSE) values(:pseudo, :nom, :prenom, :adresse, :telephone, :ptsFidelite, :mdp)');
    $req->execute( array("pseudo" => $id, "nom" => $nom, "prenom" => $prenom, "adresse" => $adresse, "telephone" => $tel, "ptsFidelite" => 0, "mdp" => $mdp) );

    $_SESSION['pseudo'] = $id;
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['adresse'] = $adresse;
    $_SESSION['telephone'] = $tel;
    $_SESSION['pointsfidelite'] = 0;
    $_SESSION['connecte'] = true;

    header('Location: ../inscription.php');
}

?>
