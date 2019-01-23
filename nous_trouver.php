<?php session_start(); ?>
<?php include 'constructionPage/connection_BDD.php'; // Ouvertur session BDD => variable : $bdd ?>
<?php
    // Variables :
    $titre='Nous trouver';
?>
<?php include 'constructionPage/head.php'; ?>
<?php include 'constructionPage/header.php'; ?>

    <?php include 'constructionPage/menu.php'; ?>

    <h1>Nous trouver :</h1>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2610.192732176803!2d-0.34286319999999754!3d49.13996500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480a69e0eff5657d%3A0xf9fca00d5d4ec1e6!2s4+Impasse+des+Carriers!5e0!3m2!1sfr!2sfr!4v1403164037547" width="600" height="450" frameborder="0" style="border:0"></iframe>

    <?php include 'constructionPage/footer.php'; ?>

</body>

</html> 
