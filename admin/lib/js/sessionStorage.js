//<script>
// Détection du support
if(typeof sessionStorage!='undefined') {
 if('message' in sessionStorage) {
   alert("Message récupéré");
   document.getElementById('message').value = sessionStorage.getItem('message');
 }
} else {
 alert("sessionStorage n'est pas supporté");
}
//</script>