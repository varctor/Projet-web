<?php
$mg4 = new albumDB($db);
    $liste_deroulante = $mg4->cherche();    
    $nbr=count($liste_deroulante);
    $j=0;
    
    if (!$j==2)
    {
    ?>


<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
<table>
        <tr>
             <td>
                    <ul id="menu2">
                    <li> <a href="index.php?page=donnee">Ses données</a></li>
                    <li> <a href="index.php?page=album">Ses albums</a></li>
                    <li> <a href="index.php?page=discussion">Discussion</a></li>
                    </ul>
                </td>
            
            <td>
            </td>
            <td>
                <select name="choix1" id="choix"> 

                    <?php
                    for ($i = 0; $i < $nbr; $i++) {
                        if($_SESSION['choix'] == $liste_deroulante[$i]["nom_user"])
                    {
                        ?>
                    <option value="<?php print $liste_deroulante[$i]["nom_album"]; ?>">
                        <?php print $liste_deroulante[$i]["nom_album"]; 
                        $j=1;?>
                    </option>
                        <?php
                    }
                    }
                    ?>
                </select>
                <input type="submit" name="envoi_choix" value="Voir profil" id="envoi_choix"/>                
            </td>
        </tr>
    </table>
                </fieldset>
</form>

<?php
    }
if ($j==0){
    echo "pas de photo";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="1; URL=index.php?page=amis">
    <?php
}
if (isset($_POST['choix1'])) {
    $mg3 = new photoDB($db);
    $liste_deroulante2 = $mg3->cherche();    
    $nbr=count($liste_deroulante2);
    
    ?>
<table>
    <?php
   
   
      if(isset($nbr)){
        for($i=0;$i<$nbr;$i++) {
         ?>
        <tr>
            <td>
                <img src="../images/<?php print $liste_deroulante2[$i]["photo"];?>" alt="<?php print $liste_deroulante2[$i]["nom"];?>" />
            </td>
        </tr>
        <?php
        }
    }//fin if isset
    ?>
</table>
<?php
}
    ?>
