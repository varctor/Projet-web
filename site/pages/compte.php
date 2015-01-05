    <fieldset>
        <table id="compte">
            <tr>
                <td>
                    <ul id="menu2">
                    <li> <a href="index.php?page=donnee">Vos données</a></li>
                    <li> <a href="index.php?page=album">Vos albums</a></li>
                    <li> <a href="">Sous-menu1</a></li>
                    <li> <a href="">Sous-menu2</a></li>
                    <li> <a href="">Sous-menu3</a></li>
                    </ul>
                </td>
                <td>
        <div>
        <?php
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