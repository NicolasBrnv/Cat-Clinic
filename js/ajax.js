/**
 * Fonctions javascript utilisant les appels aux serveur http
 * @author Christian Bonhomme
 * @version 1.0
 * @package EXERCICE-MOOC
 */
var DEBUG_AJAX = false;

/**
 * Modification du contenu d'un élément en mode asynchrone
 * @param string identifiant de l'élément à modifier
 * @param string programme de modification
 * @param string paramètres de modification
 * @param string programme d'appel après la modification
 *  
 * @return none
 */
function changeContent(id, url, param, callback)
{
  // Récupère l'élément cible dont l'identifiant vaut id
  var c = document.getElementById(id);
  
  // Met une image animée afin de montrer le chargement en cours du contenu
  c.innerHTML = '<img src="../Img/loading.gif" alt="Chargement" />';

  //Récupère la connexion au serveur http
  var xhr = new XMLHttpRequest();

  // Ouvre la connexion en mode asynchrone avec le serveur http avec comme adresse url
  xhr.open('POST', url, true);

  // Envoie des entêtes pour l'encodage
  xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

  //Envoie les paramètres param (même vide)
  xhr.send(param);
  
  // Exécution en mode asynchrone de la fonction anonyme dès que l'on obtient une réponse du serveur http
  xhr.onreadystatechange = function() 
  {
    // Debuggage
	if (DEBUG_AJAX) alert(xhr.responseText);
	
    // Test si le serveur a tout reçu (200) et que le serveur ait fini (4)
    if (xhr.status == 200 && xhr.readyState == 4)
    {
      // Modifie l'élément ayant pour identificateur id suivant le programme url
      c.innerHTML = xhr.responseText;

      //Test s'il y a une callback 
      if (callback != null)
      {
    	// Exécution du script contenu dans la callback
        window.eval(callback);
      }

      // Si on a du javascript dans le nouveau contenu on identifie les scripts et on force l'éxécution avec eval()
      var allscript = c.getElementsByTagName('script');
      for (var i = 0; i < allscript.length; ++i)
      {
    	// Exécution du script
        window.eval(allscript[i].text);
      }
    }
  };
  
  return;

} // changeContent(id, url, param, callback)
