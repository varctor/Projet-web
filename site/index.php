<!doctype html>
<?php
include ('./lib/php/classes/connexion.class.php');
include ('./lib/php/Pliste_include.php');
$db = Connexion::getInstance($dsn, $user, $pass);
session_start();

$scripts=array(); //stocker tous les fichiers d'inlinemod pour les lier plus loin
$i=0;
foreach(glob('../admin/lib/js/jquery/*.js') as $js) {
    $fichierJs[$i]=$js;
    $i++;
    
}

?>

<html>
    <head>
        <title>Site - Bienvenue</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="../admin/lib/css/mediaqueries.css" />
        <link rel="stylesheet" type="text/css" href="../admin/lib/css/style-pc.css" />
           <?php
    foreach($fichierJs as $js) {
       ?><script type="text/javascript" src="<?php print $js;?>"></script>
    <?php            
    }
    ?>
    <script type="text/javascript" src="../admin/lib/js/jquery/jquery-validation-1.13.1/dist/jquery.validate.js"></script>   
    <script type="text/javascript" src="../admin/lib/js/fonctionsJquery.js"></script>  
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
                    if (file_exists('./lib/php/Pmenu.php')) {
                        include ('./lib/php/Pmenu.php');
                    }}
                    ?>
                </nav>
            </section>
            <section id="contenu">
                <div id="main">
                    <?php
                    //lorsque l'on arrive sur le site 
                    if (!isset($_SESSION['pseudo'])) {
                        if(!isset($_SESSION['inscription'])){
                            $_SESSION['page'] = "connexion";
                        }
                    else{
                        $_SESSION['page'] = "inscription";
                        }
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
                </div>
            </section>

        </section> 
        <footer>
            <a class="condition" href="index.php?page=conditions">Conditions d'utilisation</a>
            Developpeur romain-gerard@condorcet.be
        </footer>
    </body>

</html>

