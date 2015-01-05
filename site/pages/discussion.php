<?php
if(isset($_POST['Enregistrer'])){
    if($_POST['message']!=""){
        $query="insert into discussion (message,id_user_envoi,id_user_reception)
    values ('".$_POST['message']."','".$_SESSION['id_user']."','".$_SESSION['choix']."')";  
    
      $result=pg_query($cnx,$query);
      if($result){
	    $query="select * from discussion where message='".$_POST['message']."' and id_user_envoi='".$_SESSION['id_user']."' and id_user_reception='".$_SESSION['choix']."'";
    
	    $result=pg_query($cnx,$query);
	    if($result)
		{$id=pg_result($result,0,'id_message');
	     $result=pg_query($cnx,$query);
		  if($result)
		  {
                      ?>
		   <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php?page=discussion">
                   <?php
	      }
       }
      }
    }
}

//affichage de la discussion


?>

    <form method="POST" action="valideedito.php">
        <p><textarea rows="5" id="message" name="message" cols="100" ></textarea><br/><br/></p>
        <input type=submit name="Enregistrer" value="Enregistrer"> 
    </form>