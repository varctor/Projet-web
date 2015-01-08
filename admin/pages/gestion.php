<?php
$mg = new utilisateurDB($db);
$liste_deroulante = $mg->gestion();
$erreur="";

//nombre d'élt du tableau de resultset
$nbr = count($liste_deroulante);

if (isset($_POST['choix'])) {
        $user = new utilisateurDB($db);
        $user->setALL("", "", "",$_POST['choix'], "");
        $user->cherche();
        if($user->get_id_user()==-1){
            $erreur = "Erreur de connexion";
         
        }
        else{
        $_SESSION['choix']=$user->get_id_user(); 
        $user->suppression();
        echo "compte supprimé";
        }
}

else{
?>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
<table id="tableau2">
        <tr>
            <td>
            </td>
            <td>
                <select name="choix" id="choix"> 

                    <?php
                    for ($i = 0; $i < $nbr; $i++) {
                        if(!($_SESSION['pseudo'] == $liste_deroulante[$i]["pseudo"]))
                    {
                        ?>
                    <option value="<?php print $liste_deroulante[$i]["pseudo"]; ?>">
                        <?php print $liste_deroulante[$i]["pseudo"]; ?>
                    </option>
                        <?php
                    }
                    }
                    ?>
                </select>
                <input type="submit" name="envoi_choix" value="Suppression" id="envoi_choix"/>                
            </td>
        </tr>
        <?php
                    for ($i = 0; $i < $nbr; $i++) {
                        if(!($_SESSION['pseudo'] == $liste_deroulante[$i]["pseudo"]))
                    {
                        ?>
        <tr>
            
            <td style="width:200px;">
                   <img src="../images/lambda.jpg" alt="pas de photo de profil" />
                </td>
            <td colspan="2">
                
           <br/><?php
                     print $liste_deroulante[$i]["pseudo"];
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