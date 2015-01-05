<h2>Vos amis</h2>
<?php
$mg = new utilisateurDB($db);
$liste_deroulante = $mg->getnewcontact();
$erreur="";

//nombre d'élt du tableau de resultset
$nbr = count($liste_deroulante);

if (isset($_POST['choix'])) {
    $resume = $mg->connection($_POST['choix']); // servira à afficher le profil de la personne choisit
        ?>
    <fieldset>
        <table id="compte">
            <tr>
                <td>
                    <ul id="menu2">
                    <li> <a href="index.php?page=donnee">Ses données</a></li>
                    <li> <a href="index.php?page=album">Ses albums</a></li>
                    <li> <a href="index.php?page=discussion">Discussion</a></li>
                    </ul>
                </td>
                <td>
        <div>
        <?php
        echo $_POST['choix'];
        $user = new utilisateurDB($db);
        $user->setALL("", "", "",$_POST['choix'], "");
        $user->cherche();
        if($user->get_id_user()==-1){
            $erreur = "Erreur de connexion";
         
        }
        else{
        $_SESSION['choix']=$user->get_id_user();
        $_POST['pseudo']=$user->get_pseudo();
        $_POST['nom']=$user->get_nom();
        $_POST['prenom']=$user->get_prenom();
        $_POST['email']=$user->get_email();
            
          echo "<p>Son compte : <br/><br/> ";
	  echo "NOM : ".$_POST['nom']."<br/>";
	  echo "PRENOM : ".$_POST['prenom']."<br/>";
	  echo "EMAIL : ".$_POST['email']."<br/>";
          echo "PSEUDO : ".$_POST['pseudo']."<br/>";
        }
          ?>
        </div>
                </td>
        </tr>
        </table>
    </fieldset>
<?php
}
else{
?>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
<table id="tableau2">
        <tr>
            <th>
                    Amis
            </th>
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
                <input type="submit" name="envoi_choix" value="Voir profil" id="envoi_choix"/>                
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