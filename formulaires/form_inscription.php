<h1>Inscription :</h1>
<form method="post" action="bdd/ecriture_Inscription.php">
    <label for="Identifiant">Votre Identifiant</label> <input type="text" name="Identifiant" id="Identifiant" placeholder="Entrez votre Identifiant" required  autocomplete="off"/> </br>
    <label for="Mdp">Votre Mot de passe</label> <input type="password" name="Mdp" id="Mdp" placeholder="Entrez votre Mot de passe" required  autocomplete="off"/> </br>
    <label for="Nom">Votre Nom</label> <input type="text" name="Nom" id="Nom" placeholder="Entrez votre Nom" required  autocomplete="off"/> </br>
    <label for="Prenom">Votre Prenom</label> <input type="text" name="Prenom" id="Prenom" placeholder="Entrez votre Prénom" required  autocomplete="off"/> </br>
   
    <label for="Adresse">Votre Adresse</label> <input type="text" name="num_rue" id="num_rue" placeholder="N°" required  autocomplete="off"/> </br>
    <label for="Adresse">&nbsp;</label> <input type="text" name="nom_rue" id="nom_rue" placeholder="Rue" required  autocomplete="off"/> </br>
    <label for="Adresse">&nbsp;</label> <input type="text" name="CP" id="CP" placeholder="Code Postal" required  autocomplete="off" pattern="[0-9]{5}"/> </br>
    <label for="Adresse">&nbsp;</label> <input type="text" name="Ville" id="Ville" placeholder="Ville" required  autocomplete="off"/> </br>
    
    <label for="Tel">Votre Téléphone</label> <input type="text" name="Tel" id="Tel" placeholder="Entrez votre numéro de Téléphone" required pattern="[0-9]{10}"  autocomplete="off"/> </br>
    </br>
    <input type='checkbox' name='majeur' id="majeur" required>
    <label for="majeur" id="CGU">* Vous acceptez les <a href="CGU.php">conditions générales</a> et certifiez être majeur.</label>
    </br>
    </br>
    <input type="submit" value="Envoyer" />
    <input type="reset">
</form>
