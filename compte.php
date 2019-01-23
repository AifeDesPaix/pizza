<?php session_start(); ?>
<?php include 'constructionPage/connection_BDD.php'; // Ouvertur session BDD => variable : $bdd ?>
<?php
    // Variables :
    $titre='Votre compte';
?>
<?php include 'constructionPage/head.php'; ?>
<?php include 'constructionPage/header.php'; ?>

    <?php include 'constructionPage/menu.php'; ?>

    <h1>Detail du compte :</h1>

    <?php 
    if($_SESSION['connecte']) {
        echo '
        <table>
            <tr>
                <td>
                Nom
                </td>
                <td>
                : '.$_SESSION['nom'].'
                </td>
            </tr>
            <tr>
                <td>
                Prenom
                </td>
                <td>
                : '.$_SESSION['prenom'].'
                </td>
            </tr>
            <tr>
                <td>
                Adresse 
                </td>
                <td>
                : '.$_SESSION['adresse'].'
                </td>
            </tr>
            <tr>
                <td>
                Téléphone
                </td>
                <td>
                : '.$_SESSION['telephone'].'
                </td>
            </tr>
            <tr>
                <td>
                Points
                </td>
                <td>
                : '.$_SESSION['pointsfidelite'].'
                </td>
            </tr>
        </table>
        ';
        } else {
            echo 'Vous n\'êtes pas connecté.';
        }?>
    <?php include 'constructionPage/footer.php'; ?>

</body>

</html> 
