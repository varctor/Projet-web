<h2 id="titre_page">Inscription</h2>
<?php
$flag = 0;
if (isset($_GET['submit_inscr'])){
$flag = 1;
    extract($_GET,EXTR_OVERWRITE);
    if(trim($nom)!='' && trim($email)!='' && trim($prenom)!='' && $password!='' && $pseudo!='') {
        $mg2 = new UtilisateurDB($db);
        $retour = $mg2->addUtilisateur($_GET);
        if($retour==1){
            $texte="<span class='txtGras'>Votre demande d'inscription a bien été enregistrée.<br />Nous vous contacterons dans les meilleurs délais.</span>";
        }
        else if ($retour==2) {
            $texte="<span class='txtGras'>Déjà dans la base de données</span>";
        }    
        if(isset($_SESSION['form'])) {unset($_SESSION['form']);}                
    }
    else {
        $texte="Complétez tous les champs.";
        if(trim($nom)!='') {$_SESSION['form']['nom']=$nom;}
        if(trim($email)!='') {$_SESSION['form']['email']=$email;}
        if(trim($prenom)!='') {$_SESSION['form']['prenom']=$prenom;}
        if(trim($password)!='') {$_SESSION['form']['password']=$password;}
        if(trim($pseudo)!='') {$_SESSION['form']['pseudo']=$pseudo;}   
}}
/**
if (isset($_POST['submit_inscr'])) { //changer le nom du bouton de soumission du formulaire car le nom envoyer a déjà été utilisé dans le formulaire recherche.php. Ce qui pose problème
// vu qu'ils sont utilisés dans l'index en même temps.
    if ($_POST['nom'] != "" && $_POST['prenom'] != "" && $_POST['email']) {
//insertion dans la table inscription
        $query = "insert into utilisateur (nom,prenom,email, pseudo,password)
values ('" . $_POST['nom'] . "','" . $_POST['prenom'] . "','" . $_POST['email'] . "','" . $_POST['pseudonyme'] . "','" . $_POST['password'] . "')";
        $result = pg_query($cnx, $query);
        if ($result) { //récupération de l'id_client dans la table inscription
            $query = "select * from utilisateur where pseudo='" . $_POST['pseudo'] . "' and email='" . $_POST['email'] . "'";
            $result = pg_query($cnx, $query);
            if ($result) {
                $id = pg_result($result, 0, 'id_user');
                $result = pg_query($cnx, $query);
                if ($result) {
                    echo '<h3>Votre inscription est enregistrée.</h3>';
                    $flag = 1;
                }
            }
        }
    } else
        echo '<h3 class="rouge">Votre formulaire est incomplet</h3>'; //ajouter la classe rouge dans le css
}*/

if(isset($_GET['retour']))
		  {
                     session_destroy();
                      ?>
		   <p>Deconnexion réussis, redirection en cours ...</p>
                   <META HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php?page=accueil"><?php
	       $flag=1;
	      }


//on affiche le formulaire lorsque celui-ci a été envoyé mais n'est pas complet ou bien lorsque celui-ci n'a pas encore été envoyé une seule fois
if ($flag == 0) { //vrai si formulaire incomplet ou si pas encore envoyé une seule fois
    ?>
    <section id="inscrire">
        <form id="form_inscripti" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
            <fieldset>
                <legend class=txtGras">Renseignements</legend>
                <table>
            <tr>
                <td class="taille1">Nom : </td>
                <td colspan="4"><input type="text" name="nom" id="nom" /></td>
            </tr>
            <tr>
                <td class="taille1">Prénom : </td>
                <td><input type="text" name="prenom" id="prenom" /></td>
            </tr>
            <tr>
                <td class="taille1">Email : </td>
                <td><input type="email" name="email" id="email" /></td>
            </tr>
            <tr>
                <td class="taille1">Mot de passe : </td>
                <td><input type="password" name="password" id="password" /></td>
            </tr>
            <tr>
                <td class="taille1">Pseudo : </td>
                <td><input type="pseudo" name="pseudo" id="pseudo" /></td>
            </tr>
            <tr>
                <td class="taille1">Genre : </td>
                <td>Homme</td> <td><input type="radio" name="type" id="typeHomme" value="Homme" /></td>
                <td>Femme</td> <td><input type="radio" name="type" id="typeFemme" value="Femme" /></td>
            </tr>
            <tr>
                <td class="taille1">Comment avez-vous connu ce site ? : </td>
                <td>Par hasard</td> <td><input type="radio" name="type2" id="typeQuestion1" value="Question3" /></td>
                <td>Un conseil</td> <td><input type="radio" name="type2" id="typeQuestion2" value="Question4" /></td>
            </tr>
                    <tr>
                        <td colspan="4">
                            <input type="submit" name="submit_inscr" id="submit_inscr" value="S'inscrire" />
                            &nbsp;&nbsp;&nbsp;
                            <input class="grosbouton" type="reset" id="reset" value="R&eacute;initialiser le formulaire" />
                            &nbsp;&nbsp;&nbsp;
                            <input type="submit" name="retour" value="Retour" />
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </section>
    <?php
}
?>

