

$(document).ready(function() {
   //LISTE DEROULANTE SANS VALIDATION
  //cacher le bouton Go du form. liste déroulante ds réservation
  $('#submit_search_td').remove();
  
  $('#choix_liste_deroulante').change(function() {   
    // trouver le nom de l'attribut
     var attribut=$(this).attr('name');
     //récupérer la valeur du select 
     var val = $(this).val();  
     //construire la chaîne d'url
     var refresh = 'index.php?'+attribut+'='+val;
     //alert(refresh);
     window.location.href = refresh;
  });
   
  //VERIFIER FORMULAIRE AVEC REGEX --> privilégier validate.js
  //www.sitepoint.com/jquery-basic-regex-selector-examples/ 
  $('input#nom').blur(function() {
     var regex= new RegExp(/[0-9\?!\.,;]/);
     var ch = $(this).val();
     if(regex.test(ch)){   
         $('input#nom').val('');
         $('div#error').css({
             'color':'red',
             'font-size' : '70%',
             'font-weight':'bold'
         }),
         $('div#error').html("Veuillez n'entrer que des lettres"),
         $('input#nom').focus(function() {
             $('div#error').fadeOut();
         })         
     }     
  });

  //ENVOYER FORMULAIRE INSCRIPTION PAR AJAX
  
  $('input#inscription').on ('click',function(event) {
      event.preventDefault();// ou return false à la fin
      //alert("arrivé");
      var nom_m = $('input#nom').val();
      var email_m = $('input#email').val();
      var prenom_m = $('input#prenom').val();
      var pass_m = $('input#password').val();  
      var pseudo_m = $('input#pseudo').val(); 

      if($.trim(nom_m)!='' && $.trim(email_m)!='' && $.trim(prenom_m)!='' && $.trim(pass_m)!='' && $.trim(pseudo_m)!='') {
          
          var data_form=$('form#form_inscription').serialize();
          //alert(data_form);
          $.ajax({               
            type : 'GET',            
            data : data_form,
            dataType : "json",//type du retour des données par le php
            url : '../admin/lib/php/ajax/AjaxInscription_submit.php',
            //callback exécuté en cas de succès uniquement :
            success : function(data){ //data : ce qui est retourné par le fichier php 
                //effacer les valeurs
                $('form').find('input[type=text]').val('');
                $('form').find('input[type=text]').val('');
                $('form').find('input[type=text]').val('');
                $('form').find('input[type=text]').val('');
                $('form').find('input[type=text]').val('');
                if(data.retour === 1) {  //stricte égalité type compris (sinon valeurs peuvent être de types != et rester =
                    $('section#resultat').css({
                        'color':'green',
                        'font-weight':'bold'
                    }),
                    $('section#resultat').html("Votre demande a bien été envoyée.");
                }
                else if(data.retour === 2){    
                    $('section#resultat').css({
                        'color':'red',
                        'font-weight':'bold'
                    }),
                    $('section#resultat').html("Votre inscription figure déjà dans la base de données");
                }
                else {  
                    $('section#resultat').css({
                        'color':'red',
                        'font-weight':'bold'
                    }),
                    $('section#resultat').html("Echec de la réservation.");
                }
               // $('form#form_reservation').reset(); // ne fonctionne pas
            },
          //callback en cas d'échec
            fail : function() {
              alert("échec url");           
          }
        })//fin $.ajax    
      } //fin if
      //si champs manquants
      else {
         $('section#resultat').css({
                        'color':'red',
                        'font-weight':'bold'
                    }),
          $('section#resultat').html("Remplissez tous les champs.");                
      }
    });    
        
  //cacher ou afficher une div  
  $('#cacher').click(function(){
    $('#avertisst').toggle();
    if($('#avertisst').is(':visible')){
        $(this).val('Cacher le conseil');
    }
    else {
        $(this).val('Afficher le conseil');
    }
  });
  /*
  $('<strong>Avant</strong>').prependTo('#avertisst');
  $('<strong>Après</strong>').appendTo('#avertisst');
  */
 
 //ne pas afficher div quand javascript est déjà actif.
  $('#no-js').remove();
  
  //vérifier les champs d'un formulaire
  $('#form_inscription').on('submit', function(event) { // on idem que bind
    $('[type=text]').each(function() {
       
      if(!$(this).val().length) {	
	    event.preventDefault();
        $(this).css('border', 'px solid red');
      }
    });
  });
  
  
 //JUSTE UN TEST : 
    $('#form_inscription').submit(function(){
        //alert("Formulaire envoyé !");
    });
});