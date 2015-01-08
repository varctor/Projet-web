<!doctype html>
<?php
include ('./lib/php/classes/connexion.class.php');
include ('./lib/php/db_pg.php');
include ('./lib/php/autoload.php');
$db = Connexion::getInstance($dsn, $user, $pass);
session_start();

$scripts=array(); //stocker tous les fichiers d'inlinemod pour les lier plus loin
$i=0;
foreach(glob('./lib/js/jquery/*.js') as $js) {
    $fichierJs[$i]=$js;
    $i++;
    
}

?>

<html>
    <head>
        <title>Site - Bienvenue</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="./lib/css/mediaqueries.css" />
        <link rel="stylesheet" type="text/css" href="./lib/css/style-pc.css" />
                 <?php
            foreach($fichierJs as $js) {
               ?><script type="text/javascript" src="<?php print $js;?>"></script>
            <?php            
            }
            ?>
        <script type="text/javascript" src="./lib/js/fonctionsJqueryAdmin.js"></script>
    </head>
    <body>
        <section id="page">
            <header>
                <img src="../images/banniere.png" alt="Social-network" />
            </header>
            <section id="posmenu">
                <nav>
                    <?php
                    if (isset($_SESSION['pseudo'])) {
                    if (file_exists('./lib/php/Adminmenu.php')) {
                        include ('./lib/php/Adminmenu.php');
                    }}
                    ?>
                </nav>
            </section>
            <section id="contenu">
                <section id="main">
                    <?php
                    //lorsque l'on arrive sur le site 
                    if (!isset($_SESSION['pseudo'])) {
                            $_SESSION['page'] = "connexion";
                    }
                    else{
                        if (!isset($_SESSION['page'])) {
                            $_SESSION['page'] = "accueil";
                        }  //si on a cliqué sur un lien du menu
                        if (isset($_GET['page'])) {
                            $_SESSION['page'] = $_GET['page'];
                        }
                    }
                    if (file_exists('./pages/' . $_SESSION['page'] . '.php')) {
                        include ('./pages/' . $_SESSION['page'] . '.php');
                    }
                    ?>
                </section>
            </section>

        </section> 
        <footer>
            Developpeur romain-gerard@condorcet.be
        </footer>
    </body>

</html>