/**
 * Fichier Javascript d'initialisation des écouteurs
 * @author Christian Bonhomme
 * @version 1.0
 * @package EXERCICE-MOOC
 */

/**
 * Fonction générique de déclenchement des listeners
 * @param HTMLElement élément à écouter
 * @param array tableau des objets de type événement
 * @param function fonction déclenchée par l'écouteur
 *
 * @return none
 */
function Listener(elem ,event, fnct) 
{
  // Teste si l'élément existe
  if (elem)
  {
    // Associe à  l'événement click la fonction (Non IE)
    elem.addEventListener(event , fnct, false);
		
    // Si l'événement est un click on change le curseur de souris
    if ('click' == event) 
    { 
      elem.style.cursor = 'pointer';
    }
  }
  
  return;
    
} // Listener(elem ,event, fnct)

/**
 * Fonction générique de supppression des listeners
 * @param HTMLElement élément à ne plus écouter
 * @param array tableau des objets de type événement
 * @param function fonction déclenchée par l'écouteur
 *
 * @return none
 */
function Remove(elem, event, fnct) 
{
  if (elem)
  {
    // Associe à  l'événement click la fonction (Non IE)
    elem.removeEventListener(event, fnct, false);
 		
    // Si l'événement est un click on change le curseur de souris
    if ('click' == event) 
    { 
      elem.style.cursor = 'default';
    }
  }
  
  return;
    
} // Remove(elem, event, fnct)

/************************************************/
/* Initialistion des écouteurs de l'application */
/* au chargement des pages                      */
/************************************************/

// Récupère les éléments <li>
var click_li = document.querySelectorAll('li');
// Compte les éléments <li>
var nb_click_li = click_li.length;
for( var i = 0; i < nb_click_li; ++i)
{
  // Pour chaque élément <li>,
  // on associe un événement click
  // avec comme fonction associée pages
  Listener(click_li[i], 'click', pages);
}
