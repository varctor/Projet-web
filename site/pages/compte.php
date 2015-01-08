    <fieldset id="field">
        <table id="compte">
            <tr>
                <td>
                    <ul id="menu2">
                    <li> <a href="index.php?page=donnee">Vos données</a></li>
                    <li> <a href="index.php?page=album">Vos albums</a></li>
                    <li> <a href="">Paramètres de confidentialité</a></li>
                    <li> <a href="">Historique personnel</a></li>
                    <li> <a href="">Aide</a></li>
                    </ul>
                </td>
                <td>
        <div>
        <?php
          $_SESSION['choix'] = $_SESSION['id_user'];
          echo "<p>Votre compte : <br/><br/> ";
	  echo "NOM : ".$_SESSION['nom']."<br/>";
	  echo "PRENOM : ".$_SESSION['prenom']."<br/>";
	  echo "EMAIL : ".$_SESSION['email']."<br/>";
          echo "PSEUDO : ".$_SESSION['pseudo']."<br/>";
	  echo "MOT DE PASSE : ".$_SESSION['password']."<br/></p>";
          ?>
        </div>
                </td>
        </tr>
        </table>
    </fieldset>