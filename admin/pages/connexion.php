<?php

$erreur="";
$isLogin=0;
if (isset($_POST["connection"])) {
    
    //$mg = new Login($db);
    //$retour=$mg->isAdmin($_POST['login'],$_POST['password']);
    //if($retour==1) {
    //    $_SESSION['admin']=1;
    //    $message="Authentifié!";
    //    header('Location: http://localhost/Projet_web/admin/index.php');
    //} 
    //else {
    //   $message="Données incorrectes";
    //}
    
    
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
            echo $user->get_id_user();
            echo $user->get_pseudo();
            echo $user->get_password();
         
        }
        else{
            
            if ($_POST['pseudo'] == "Admin" && $_POST["pass"] == "linux") {
        $user = new utilisateurDB($db);
        $user->setALL("", "", "", $_POST['pseudo'], $_POST['pass']);
        $user->connection();
        
        $_SESSION['pseudo']=$user->get_pseudo();
            $_SESSION['nom']=$user->get_nom();
            $_SESSION['prenom']=$user->get_prenom();
            $_SESSION['password']=$user->get_password();
            $_SESSION['email']=$user->get_email();
            $_SESSION['id_user']=$user->get_id_user();
        
        $_SESSION['pseudo'] = "admin";
        $_SESSION['admin'] = 1;?>
        <p>Connection réussi, rédirection en cours ... </p>
<META HTTP-EQUIV="Refresh" CONTENT="1; URL=index.php?page=accueil"><?php
                        }
         else{
             echo "vous n'êtes pas admin";
         }
                        
        }
}
}


if($isLogin==1){
    ?>
<p>Connection réussi, rédirection en cours ... </p>
<META HTTP-EQUIV="Refresh" CONTENT="1; URL=index.php?page=accueil">
<?php
    
}

else{
?> 
<section id="login_form">
 <fieldset id="fieldset_login">
<form id="connexion" action="#" method="post">
            <label for="pseudo">Pseudo</label><br/>
            <input type="text" name="pseudo" id="pseudo" onchange="sessionStorage.pseudo=this.value"/><br/>
            <label for="pass">Mot de passe</label><br/>
            <input type="password" name="pass" id="pass" onchange="sessionStorage.pass=this.value"/><br/><br/>
            <input type="submit" name="connection" value="connection" /><br/>
            <div style="color:red"><b>
                <?php if(!empty($erreur)){
                echo $erreur;
            }
            ?>
            </b></div>
    
</form>  
</fieldset>
    </section>
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