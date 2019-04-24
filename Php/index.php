<?php
/**
 * Contrôleur
 * @author Christian Bonhomme
 * @version 1.0
 * @package MVC
 */
// Inclusion des constantes et des fonctions de l'application
// en particulier l'Autoload
require('../Inc/require.inc.php');

// Variable de contrôle
$EX = isset ($_REQUEST['EX']) ? $_REQUEST['EX'] : 'home';

// Contrôleur
switch ($EX)
{
  case 'home'           : home();
  break;
  case 'page'           : page();
  exit;
  case 'page_sous_titre': page_sous_titre();
  break;
  case 'page_paragraphe': page_paragraphe();
  break;                                                           
  case 'form'           : form();
  break; 
  case 'insert_message' : insert_message();
  break;                      
  default               : home();
}

// Mise en page
require('../layout.view.php');

/**
 *  Affichage de l'accueil
 *
 *  @return none
 */

function home()
{	

  // Instanciation de l'objet $mpages avec la classe MPages
  // et pour une page donnée
  $mpages = new MPages();

  //Tab Menu 
  $value['MENU'] = $mpages->SelectTitreAll();

  global $content;

  $content['title'] = 'Accueil';
  $content['class'] = 'VHtml';
  $content['method'] = 'showHtml';
  $content['arg'] = '../Html/home.html';
  $content['arg_menu'] = $value;

  return;

} // home()

/**
 *  Affichage des pages
 *  
 *  @return none
 */
function page()
{
  // Aiguille suivant le numéro de page
  switch($_POST['ID_PAGE'])
  {
    case 1 : $html = '../Html/specialites.html';
             break;
    case 2 : $html = '../Html/fiches.html';
             break;             
  }

  if (empty($_POST['ID_PAGE'])) 
  {
    $html = '../Html/home.html';
  }

  // Affiche la page
  $vhtml = new VHtml();
  $vhtml->showHtml($html);
  
  return;
  
} // page()

function page_sous_titre()
{

  // Instanciation de l'objet $mpages avec la classe MPages
  // et pour une page donnée
  $mpages = new MPages($_GET['ID_PAGE']);

  //Tab Menu 
  $value['MENU'] = $mpages->SelectTitreAll();

  // Récupère le titre de la page
  $value['PAGES'] = $mpages->SelectTitre();

  //Recupere les sous titres d'une page donnée
  $value['SOUS_TITRES'] = $mpages->SelectSousTitresAll();

  foreach($value['SOUS_TITRES'] as $val)
  {
    // Récupère les paragraphes d'un sous-titre
    $value['PARAGRAPHES'][$val['ID_SOUS_TITRE']] = $mpages->SelectParagraphesAll($val['ID_SOUS_TITRE']);
  }

  global $content;

  $content['title'] = 'Sous-Titres';
  $content['class'] = 'VPages';
  $content['method'] = 'showPageSousTitre';
  $content['arg'] = $value;
  $content['arg_menu'] = $value;


  
  return;
  
} // page_sous_titre()

function page_paragraphe()
{

  // Instanciation de l'objet $mpages avec la classe MPages
  // et pour une page donnée
  $mpages = new MPages($_GET['ID_PAGE']);

  //Tab Menu 
  $value['MENU'] = $mpages->SelectTitreAll();

  // Récupère le titre de la page
  $value['PAGES'] = $mpages->SelectTitre();

  //Recupere les sous titres d'une page donnée
  $value['SOUS_TITRES'] = $mpages->SelectSousTitresAll();

  foreach($value['SOUS_TITRES'] as $val)
  {
    // Récupère les paragraphes d'un sous-titre
    $value['PARAGRAPHES'][$val['ID_SOUS_TITRE']] = $mpages->SelectParagraphesAll($val['ID_SOUS_TITRE']);
  }

  global $content;

  $content['title'] = 'Paragraphes';
  $content['class'] = 'VPages';
  $content['method'] = 'showParagraphe';
  $content['arg'] = $value;
  $content['arg_menu'] = $value;
  
  return;
  
} // page_sous_titre()

function form()
{

  // Instanciation de l'objet $mpages avec la classe MPages
  // et pour une page donnée
  $mpages = new MPages();
  //Tab Menu 
  $value['MENU'] = $mpages->SelectTitreAll();
  // Récupère le titre de la page
  $value['PAGES'] = $mpages->SelectTitre();
  // Récupère les sous-titres de la page
  $value['SOUS_TITRES'] = $mpages->SelectSousTitresAll();

  foreach($value['SOUS_TITRES'] as $val)
  {
    // Récupère les paragraphes d'un sous-titre
    $value['PARAGRAPHES'][$val['ID_SOUS_TITRE']] = $mpages->SelectParagraphesAll($val['ID_SOUS_TITRE']);
  }

  global $content;

  $content['title'] = 'Formulaire';
  $content['class'] = 'VPages';
  $content['method'] = 'showPageContact';
  $content['arg'] = $value;
  $content['arg_menu'] = $value;

  return;
}

function insert_message()
{
  $mpages = new MPages();

  //Tab Menu 
  $value['MENU'] = $mpages->SelectTitreAll();

  global $content;

  $content['title'] = 'Notification';
  $content['class'] = 'VPages';
  $content['method'] = 'showMessage';
  $content['arg'] = '';
  $content['arg_menu'] = $value;

  return;

}

?>