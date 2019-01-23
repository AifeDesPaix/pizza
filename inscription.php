<?php session_start(); ?>
<?php
    // Variables :
    $titre='Inscription';
?>
<?php include 'constructionPage/head.php'; ?>
<?php include 'constructionPage/header.php'; ?>

    
    <?php include 'constructionPage/menu.php'; ?>

    <?php 
    if( isset($_SESSION['connecte']) && $_SESSION['connecte'] ) {
        echo '<p>Bravo, vous êtes inscrit et connecté !</p>';
    } else {
        include 'formulaires/form_inscription.php';
    }
    ?>

    <?php include 'constructionPage/footer.php'; ?>

</body>
</html>
