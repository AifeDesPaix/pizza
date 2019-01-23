<menu class>

<div id='cssmenu'>
    <ul>
        <?php $array = explode('/', $_SERVER['REQUEST_URI']);?> 
        <li <?php if('index.php' == $array[2]) echo 'class="active"';?> ><a href="index.php">Accueil</a></li>

        <li <?php if(('compte.php' == $array[2]) || ('inscription.php' == $array[2]) ) echo 'class="active"';?> >
            <span><?php if( isset($_SESSION['connecte']) && $_SESSION['connecte'] ) {
                            echo '<a href="compte.php">Compte</a>';
                        } else { 
                            echo '<a href="inscription.php">Inscription</a>';
                        }?>
            </span>
        </li>

        <li <?php if(('deconnection.php' == $array[2]) || ('connection.php' == $array[2]) ) echo 'class="active"';?> >
            <span><?php if( isset($_SESSION['connecte']) && $_SESSION['connecte'] ) {
                            echo '<a href="deconnection.php">Déconnexion</a>';
                        } else {
                             echo '<a href="connection.php">Connexion</a>';
                            }?>
            </span>
        </li>

        <li <?php if('nos_pizzas.php' == $array[2]) echo 'class="active"';?> >
            <a href='nos_pizzas.php'><span>Nos Pizzas</span></a>
        </li>

        <li <?php if('nous_trouver.php' == $array[2]) echo 'class="active"';?>>
            <a href='nous_trouver.php'><span>Nous trouver</span></a>
        </li>

        <li <?php if('commander_pizza.php' == $array[2]) echo 'class="active"';?> >
            <span><?php if( isset($_SESSION['connecte']) && $_SESSION['connecte'] ) {
                            echo '<a href="commander_pizza.php">Commander Pizza</a>';
                        }?>
            </span>
        </li>

    </ul>
</div>
</menu>