/**
 * Fichier Javascript de l'application
 * @author Christian Bonhomme
 * @version 1.0
 * @package EXERCICE-MOOC
 */

/**
 * Modifie le contenu de l'élément <div id="content">
 * 
 */
function pages()
{
  // this.id (valeur de l'attribut id de l'élément déclenchant)
  // contient l'identifiant de la page 
  changeContent('content', '../Php/index.php', 'EX=page&ID_PAGE=' + this.id);
  
  return;
  
} // pages()
