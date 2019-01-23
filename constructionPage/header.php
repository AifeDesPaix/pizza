<body>
<div id="contenu">
<header>
    <table>
        <tr>
        	<td width="200px"><a href="images/pubs/smile.jpg"><img width="100px" height="100px" src="images/donatello.gif" /></a></td>
            <td><a href="index.php"><img src="images/banniere.png" alt="Ouais c'est la bannière gros !" /></a></td>
			<td width="200px">
				<?php 
			    if(isset($_SESSION['connecte']) && $_SESSION['connecte']) {
			        echo 'Bonjour '.$_SESSION['prenom'].' '.$_SESSION['nom'].' !<br/>Vous avez '.$_SESSION['pointsfidelite'].' point';
			        if($_SESSION['pointsfidelite'] > 0) {
			        	echo 's :)';
			        } else echo ' :(';
			        if( isset($_SESSION['afficheHeure']) )
			        {
				        if( isset($_SESSION['heureCommande']) )
				        	echo '</br></br> Commande disponible dans '.$_SESSION['heureCommande'].' minutes.';
			    	}
			    } else {
			            echo 'Vous n\'êtes pas connecté.';
			    }?>
		</td>        
        </tr>
    </table>
    
    
    <div style="margin:auto; visibility: hidden">
    <audio src="media/tortue.mp3" controls="controls" title="Donatello" autoplay loop>
		<source src="media/tortue.mp3"/>
   	</audio>
    </div>
	
</header>
