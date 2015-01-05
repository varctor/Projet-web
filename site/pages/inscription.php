<h2 id="titre_page">Inscription</h2>
<?php

if(isset($_GET['inscription']))
  $s=$_GET['inscription'];
$flag=0;

if(isset($_POST['submit_inscr']))  //changer le nom du bouton de soumission du formulaire car le nom envoyer a déjà été utilisé dans le formulaire recherche.php. Ce qui pose problème 
// vu qu'ils sont utilisés dans l'index en même temps.
{ if($_POST['nom']!=""&&$_POST['prenom']!=""&&$_POST['email'])
  {  
	  //insertion dans la table inscription 
	  $query="insert into utilisateur (nom,prenom,email, pseudo,password)
    values ('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['email']."','".$_POST['pseudonyme']."','".$_POST['password']."')";  
    
      $result=pg_query($cnx,$query);
      if($result)
	  { //récupération de l'id_client dans la table inscription
	    $query="select * from utilisateur where pseudo='".$_POST['pseudo']."' and email='".$_POST['email']."'";
    
	    $result=pg_query($cnx,$query);
	    if($result)
		{$id=pg_result($result,0,'id_user');
	     $result=pg_query($cnx,$query);
		  if($result)
		  {
		   echo '<h3>Votre inscription est enregistrée.</h3>';
	       $flag=1;
	      }
       }
	  } 
  }
  else echo '<h3 class="rouge">Votre formulaire est incomplet</h3>'; //ajouter la classe rouge dans le css
  
} 


//on affiche le formulaire lorsque celui-ci a été envoyé mais n'est pas complet ou bien lorsque celui-ci n'a pas encore été envoyé une seule fois
if($flag==0)  //vrai si formulaire incomplet  ou si pas encore envoyé une seule fois
{
?> 
<section id="inscrire">
    <form id="form_inscription" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="pensionnaire">
        <legend class="txtRoseLogo txtGras">Renseignements</legend>
        <table>
            <tr>
                <td>Nom : </td>
                <td><input type="text" name="nom" id="nom" /></td>
            </tr>
            <tr>
                <td>Prénom : </td>
                <td><input type="text" name="prenom" id="prenom" /></td>
            </tr>
            <tr>
                <td>Email : </td>
                <td><input type="email" name="email" id="email" /></td>
            </tr>
            <tr>
                <td>Mot de passe : </td>
                <td><input type="password" name="password" id="password" /></td>
            </tr>
            <tr>
                <td>Genre : </td>
                <td>Homme <input type="radio" name="type" id="typeHomme" value="Homme" />
                Femme <input type="radio" name="type" id="typeFemme" value="Femme" />
                </td>
            </tr>
            <tr>
                <td>Choississez votre question secréte : </td>
                <td>Blablabla1 <input type="radio" name="type" id="typeQuestion1" value="Question1" />
                Blablabla2 <input type="radio" name="type" id="typeQuestion2" value="Question2" />
                </td>
            </tr>
            <tr>
                <td>Réponse </td>
                <td><input type="text" name="reponse" id="reponse" /></td>									
            </tr>
            <tr>
                <td>Comment avez-vous connu ce site ? : </td>
                <td>Blablabla1 <input type="radio" name="type" id="typeQuestion1" value="Question1" />
                &nbsp;&nbsp;&nbsp;Blablabla2 <input type="radio" name="type" id="typeQuestion2" value="Question2" />
                </td>
            </tr>
            <tr>
                <td colspan="3">
                <input type="submit" name="submit_inscr" id="submit_inscr" value="S'inscrire" />
                &nbsp;&nbsp;&nbsp;
                <input class="grosbouton" type="reset" id="reset" value="R&eacute;initialiser le formulaire" />
                &nbsp;&nbsp;&nbsp;
                <a class="bouton" href="index.php?page=connexion"><input type="button" value="Retour" /></a>
                </td>
            </tr>
            
        </table>
        </fieldset>
    </form>
</section>
<?php 
}
?>
