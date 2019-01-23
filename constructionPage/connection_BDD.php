<?php
try {
	$bdd = new PDO('mysql:host=localhost;dbname=MLR12', 'root', 'qalpSZKOtg');
} catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
}
?>
