<?php

$erreur="";
$isLogin=0;
if (isset($_POST["connection"])) {
if(empty($_POST['pseudo'])|| empty($_POST["pass"]))
    {
    $erreur= "Vous devez remplir tout les champs";
    }
    else //On check le mot de passe
    { 
        $user = new utilisateurDB($db);
        $user->setALL("", "", "", $_POST['pseudo'], $_POST['pass']);
        $user->connection();
        
        if($user->get_id_user()==-1){
            $erreur = "Erreur de connexion";
         
        }
        else{
            $_SESSION['pseudo']=$user->get_pseudo();
            $_SESSION['nom']=$user->get_nom();
            $_SESSION['prenom']=$user->get_prenom();
            $_SESSION['password']=$user->get_password();
            $_SESSION['email']=$user->get_email();
            $_SESSION['id_user']=$user->get_id_user();
            $isLogin=1;

                        }
        }
}

if (isset($_POST["inscription"])) {
    $_SESSION['inscription'] = "inscription"
    ?>
<p>Chargement en cours ... </p>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php?page=inscription">
    <?php
}

if($isLogin==1){
    ?>
<p>Connection réussi, rédirection en cours ... </p>
<META HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php?page=accueil">
<?php
    
}

else{
?> 

<form id="connexion" action="#" method="post">
    <fieldset id="field">
            <label for="pseudo">Pseudo</label><br/>
            <input type="text" name="pseudo" id="pseudo" onchange="sessionStorage.pseudo=this.value"/><br/>
            <label for="pass">Mot de passe</label><br/>
            <input type="password" name="pass" id="pass" onchange="sessionStorage.pass=this.value"/><br/><br/>
            <input type="submit" name="connection" value="connection" /><br/>
            <input type="submit" name="inscription" value="inscription" />
            <div style="color:red"><b>
                <?php if(!empty($erreur)){
                echo $erreur;
            }
            ?>
            </b></div>
    </fieldset>
    
</form>  

<script>
// Détection du support
if(typeof sessionStorage!='undefined') {
	if('pseudo' in sessionStorage) {
		document.getElementById('pseudo').value = sessionStorage.getItem('pseudo');
	}
        if('pass' in sessionStorage) {
		document.getElementById('pass').value = sessionStorage.getItem('pass');
	}
        
} else {
	alert("sessionStorage n'est pas supporté");
}
</script>

<?php
   }
?>