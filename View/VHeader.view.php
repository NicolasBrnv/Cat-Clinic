<?php
/**
 * Fichier de classe de type Vue
 * pour l'affichage de l'entête
 * @author Christian Bonhomme
 * @version 1.0
 * @package EXERCICE-MOOC
 */

/**
 * Classe pour l'affichage de l'entête
 */
class VHeader
{
  /**
   * Constructeur de la classe
   * @access public
   *        
   * @return none
   */
  public function __construct(){}

  /**
   * Destructeur de la classe
   * @access public
   *
   * @return none
   */
  public function __destruct(){}

  /**
   * Affichage de l'entête
   * @access public
   *
   * @return none
   */
  public function showHeader()
  {
    $index = 'index';
    $admin = 'admin';
    $controller = '';

    if (isset($_SESSION['ADMIN'])) 
    {
      $controller = $admin;
      $deconnexion = '<li class="is-active"><a href="../Php/admin.php?EX=deconnect">Deconnexion</a></li>';
      $contact = "";
      $li_specialite = "<li id='2'><a href='../Php/$controller.php?EX=page_sous_titre&amp;ID_PAGE=3'>Prévention</a></li>";
      $connexion = '';
    }
    else 
    {
      $controller = $index;
      $deconnexion = '';
      $contact = "<li><a href='../Php/index.php?EX=form'>Contact</a></li>";
      $li_specialite = "<li id='2'><a>Prévention</a></li>";
      $connexion = "<li class='is-active'><a href='../Php/admin.php?EX=home_admin'>Connexion</a></li>";
    }

    echo "<div class='top-bar'>";
    echo "<div class='top-bar-left'>";
    echo "<ul class='breadcrumbs'>";
    echo "<li class='menu-text'><img src='../Img/Cat_Clinic_Draw.png' alt='Logo du site'></li>";
    echo "<li><a href='../Php/$controller.php?EX=home'>Accueil</a></li>";
          //echo "<li id='1'><a href='../Php/$controller.php?EX=page_sous_titre&amp;ID_PAGE=1'>Spécialité de la clinique</a></li>";
    echo "<li id='1'><a>Spécialité de la clinique</a></li>";
    echo "<li><a href='../Php/$controller.php?EX=page_sous_titre&amp;ID_PAGE=2'>Equipe</a></li>";
    echo $li_specialite;
    echo $connexion;
    echo $contact;
    echo $deconnexion;
    echo "</ul>";
    echo "</div>";
    echo "</div>";




    
  } // showHeader()  
  
} // VHeader
?>