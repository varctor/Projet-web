<h2>Bienvenue</h2>
<?php
?>
<section id="pseudo" class="up txtBlue">
    <?php print $_SESSION['pseudo'];?>
</section>

<h2>Rechercher de nouveaux contacts</h2>
<?php

$mg = new utilisateurDB($db);
$liste_deroulante = $mg->getnewcontact();
$erreur="";

$mg1 = new statutDB($db);
$liste_deroulante2 = $mg1->cherche();

$mg2 = new contactDB($db);
$liste_deroulante1 = $mg2->cherche();
$erreur="";

//nombre d'élt du tableau de resultset
$nbr = count($liste_deroulante);
$nbr1 = count($liste_deroulante1);
$nbr2 = count($liste_deroulante2);

$trouve=0;

if (isset($_GET['choix'])) {
    $resume = $mg->connection($_GET['choix']); // servira à afficher le profil de la personne choisit
    $_SESSION['choix']=$_GET['choix'];
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php?page=discussion">

    <?php
}
else{
?>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
<table id="tableau5">
        <tr>
            <th>
                    Votre statut:    
            </th>
            <td>
                <?php
                for ($i = 0; $i < $nbr2; $i++) {
                        
                    if(($_SESSION['id_user'] == $liste_deroulante2[$i]["nom_user"]))
                    {
                        print $liste_deroulante2[$i]["statut"];
                    }
                    
                    }
                ?>
            </td>
        </tr>
        <?php
                     for ($i = 0; $i < $nbr2; $i++) {
                        if(!($_SESSION['id_user'] == $liste_deroulante2[$i]["nom_user"]))
                    {?>
        <tr>
            <th>
                    Statut de vos amis:    
            </th>
            <td colspan="2">
                
           <br/><?php
           
           for ($j = 0; $j < $nbr; $j++) {
                        if(($liste_deroulante2[$i]["nom_user"] == $liste_deroulante[$j]["id_user"]))
                    {
                     print $liste_deroulante[$j]["pseudo"] ." : ";
           }}
                     print $liste_deroulante2[$i]["statut"];
                     ?>
                
            </td>
            
        </tr>
        <?php
                    }
                    }
                    ?>
    </table>
</form>
<?php
}
?>