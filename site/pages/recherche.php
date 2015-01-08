<h2>Rechercher de nouveaux contacts</h2>
<?php
$mg = new utilisateurDB($db);
$liste_deroulante = $mg->getnewcontact();

$mg2 = new contactDB($db);
$liste_deroulante1 = $mg2->cherche();
$erreur="";

//nombre d'élt du tableau de resultset
$nbr = count($liste_deroulante);
$nbr1 = count($liste_deroulante1);

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
<table id="tableau2">
        <tr>
            <th>
                    Contacts
            </th>
            <td>
            </td>
            <td>
                <select name="choix" id="choix"> 

                    <?php
                    for ($i = 0; $i < $nbr; $i++) {
                        
                    if(!($_SESSION['pseudo'] == $liste_deroulante[$i]["pseudo"]))
                    {$trouve=0;
                        for ($j = 0; $j < $nbr1; $j++) {
                    if(!(($_SESSION['id_user'] == $liste_deroulante1[$j]["id_user1"])&&($liste_deroulante[$i]["id_user"] == $liste_deroulante1[$j]["id_user2"]))&&!(($_SESSION['id_user'] == $liste_deroulante1[$j]["id_user2"])&&($liste_deroulante[$i]["id_user"] == $liste_deroulante1[$j]["id_user1"]))&&(!($trouve==1))){
                        ?>
                    <option value="<?php print $liste_deroulante[$i]["id_user"]; ?>">
                        <?php print $liste_deroulante[$i]["pseudo"]; ?>
                    </option>
                        <?php
                        $trouve=1;
                    }}}
                    }
                    ?>
                </select>
                <input type="submit" name="envoi_choix" value="Ajouter" id="envoi_choix"/>                
            </td>
        </tr>
        <?php
                    for ($i = 0; $i < $nbr; $i++) {
                        if(!($_SESSION['pseudo'] == $liste_deroulante[$i]["pseudo"]))
                    {$trouve=0;
                            for ($j = 0; $j < $nbr1; $j++) {
                             if(!(($_SESSION['id_user'] == $liste_deroulante1[$j]["id_user1"])&&($liste_deroulante[$i]["id_user"] == $liste_deroulante1[$j]["id_user2"]))&&!(($_SESSION['id_user'] == $liste_deroulante1[$j]["id_user2"])&&($liste_deroulante[$i]["id_user"] == $liste_deroulante1[$j]["id_user1"]))&&(!($trouve==1))){
                        ?>
        <tr>
            
            <td style="width:200px;">
                   <img src="../images/lambda.jpg" alt="pas de photo de profil" />
                </td>
            <td colspan="2">
                
           <br/><?php
           $trouve=1;
                     print $liste_deroulante[$i]["pseudo"];
                     ?>
                
            </td>
            
        </tr>
        <?php
                    }}}
                    }
                    ?>
    </table>
</form>
<?php
}
?>