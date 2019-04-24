<?php
/**
 * Contr�leur
 * @author Christian Bonhomme
 * @version 1.0
 * @package MVC
 */

// Inclusion des constantes et des fonctions de l'application
// en particulier l'Autoload
require('../Inc/require.inc.php');
session_name('ADMIN');
session_start();
$_SESSION['ADMIN'] = true;

// Variable de contr�le
$EX = isset ($_REQUEST['EX']) ? $_REQUEST['EX'] : 'home_admin';

// Contr�leur
switch ($EX)
{
  case 'home_admin'     : home_admin();
  break;
  case 'deconnect'      : deconnect();
  break;                
  case 'page'           : page();
  break;
  case 'page_sous_titre': page_sous_titre();
  break;
  case 'page_paragraphe': page_paragraphe();
  break;                        
  case 'update'         : update();
  break;
  case 'insert'         : insert();
  break; 
  case 'delete'         : delete();
  break;            
  case 'form'           : form();
  break; 
  case 'form_insert'    : form_insert();
  break;                              
  default               : home_admin();
}

// Mise en page
require('../layout.view.php');

/**
 *  Affichage de l'accueil
 *
 *  @return none
 */
function home_admin()
{

  // Instanciation de l'objet $mpages avec la classe MPages
  // et pour une page donn�e
  $mpages = new MPages();

  //Tab Menu 
  $value['MENU'] = $mpages->SelectTitreAll();

  global $content;

  $content['title'] = 'Accueil';
  $content['class'] = 'VHtml';
  $content['method'] = 'showHtml';
  $content['arg'] = '../Html/home_admin.html';
  $content['arg_menu'] = $value;

  return;

} // home()

function deconnect()
{
  $_SESSION = array();
  $_COOKIE  = array();

  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
      $params["path"], $params["domain"],
      $params["secure"], $params["httponly"]
    );
  }

  session_destroy();
  
  //home_admin();

  header('location: ../Php/index.php');
  
  return;
}

function page_sous_titre()
{

  // Instanciation de l'objet $mpages avec la classe MPages
  // et pour une page donn�e
  $mpages = new MPages($_GET['ID_PAGE']);

  //Tab Menu 
  $value['MENU'] = $mpages->SelectTitreAll();

  // R�cup�re le titre de la page
  $value['PAGES'] = $mpages->SelectTitre();

  //Recupere les sous titres d'une page donn�e
  $value['SOUS_TITRES'] = $mpages->SelectSousTitresAll();

  foreach($value['SOUS_TITRES'] as $val)
  {
    // R�cup�re les paragraphes d'un sous-titre
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
  // et pour une page donn�e
  $mpages = new MPages($_GET['ID_PAGE']);

  //Tab Menu 
  $value['MENU'] = $mpages->SelectTitreAll();

  // R�cup�re le titre de la page
  $value['PAGES'] = $mpages->SelectTitre();

  //Recupere les sous titres d'une page donn�e
  $value['SOUS_TITRES'] = $mpages->SelectSousTitresAll();

  foreach($value['SOUS_TITRES'] as $val)
  {
    // R�cup�re les paragraphes d'un sous-titre
    $value['PARAGRAPHES'][$val['ID_SOUS_TITRE']] = $mpages->SelectParagraphesAll($val['ID_SOUS_TITRE']);
  }
  
  global $content;

  $content['title'] = 'Paragraphes';
  $content['class'] = 'VPages';
  $content['method'] = 'showParagraphe';
  $content['arg'] = $value;
  $content['arg_menu'] = $value;
  
  return;
  
} // page_paragraphe()

/**
 * Mise � jour du texte dans la page
 *
 * @return none
 */
function update()
{
    // Instanciation de l'objet $mpages avec la classe MPages
    // et pour une page donn�e
  $mpages = new MPages($_GET['ID_PAGE']);
    // Instancie le membre $value avec les valeurs des param�tres
  $mpages->SetValue($_POST);

  $TAG = isset($_POST['TAG']) ? $_POST['TAG'] : '';

  switch ($TAG) 
  {

    case 'H1'    : // Modifie le titre dans le fichier
    $mpages->UpdateTitre();
                  // R�cup�re le TITRE modifi�
    $value['TEXT'] = $_POST['TITRE'];

    break;

    case 'H2'    : $mpages->UpdateSousTitre($_GET['ID_SOUS_TITRE']);
                   // R�cup�re le SOUS_TITRE modifi�
    $value['TEXT'] = $_POST['SOUS_TITRE'];

    break;

    case 'P'     : $mpages->UpdateParagraphe($_GET['ID_PARAGRAPHE']);
                   // R�cup�re le PARAGRAPHE modifi�
    $value['TEXT'] = $_POST['PARAGRAPHE'];

    break;                       
  }

  home_admin();

  return;
  
} // update()

function insert()
{
  $mpages = new MPages($_GET['ID_PAGE']);
  $mpages->SetValue($_POST); 
  $mpages->InsertParagraphe($_GET['ID_SOUS_TITRE'], $_GET['ID_PARAGRAPHE']);
  //R�cup�re le paragraphe � ins�rer.
  $value['TEXT'] = $_POST['PARAGRAPHE'];

  home_admin();

  return;
}//insert()

function delete()
{
  $mpages = new MPages($_GET['ID_PAGE']);
  $mpages->SetValue($_GET); 
  $mpages->DeleteParagraphe();
  //R�cup�re le paragraphe � supprimer.
  $value['TEXT'] = $_POST['PARAGRAPHE'];

  home_admin();

  return;
}//delete()

function form()
{
  // Instanciation de l'objet $mpages avec la classe MPages
  // et pour une page donn�e
  $mpages = new MPages($_GET['ID_PAGE']);

  //Tab Menu 
  $value['MENU'] = $mpages->SelectTitreAll();

  // R�cup�re le titre de la page
  $value['PAGES'] = $mpages->SelectTitre();

  //Recupere les sous titres d'une page donn�e
  $value['SOUS_TITRES'] = $mpages->SelectSousTitresAll();

  foreach($value['SOUS_TITRES'] as $val)
  {
    // R�cup�re les paragraphes d'un sous-titre
    $value['PARAGRAPHES'][$val['ID_SOUS_TITRE']] = $mpages->SelectParagraphesAll($val['ID_SOUS_TITRE']);
  }
  
  global $content;

  $content['title'] = 'Formulaire';
  $content['class'] = 'VPages';
  $content['method'] = 'showPageForm';
  $content['arg'] = $value;
  $content['arg_menu'] = $value;
  
  return;
}

function form_insert()
{
    //VHeader : R�cup�re le menu.
  $vheader = new VHeader();
  $vheader->showHeader();

  // Instanciation de l'objet $mpages avec la classe MPages
  // et pour une page donn�e
  $mpages = new MPages($_GET['ID_PAGE']);
  // R�cup�re le titre de la page
  $value['PAGES'] = $mpages->SelectTitre();
  // R�cup�re les sous-titres de la page
  $value['SOUS_TITRES'] = $mpages->SelectSousTitresAll();

  foreach($value['SOUS_TITRES'] as $val)
  {
    // R�cup�re les paragraphes d'un sous-titre
    $value['PARAGRAPHES'][$val['ID_SOUS_TITRE']] = $mpages->SelectParagraphesAll($val['ID_SOUS_TITRE']);
  }

  $vpages = new VPages();
  $vpages->showPageFormInsert($value);

  return; 
}
?>