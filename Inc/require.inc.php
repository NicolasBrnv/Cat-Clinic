<?php
/**
 * Autoload
 * @author Christian Bonhomme
 * @version 1.0
 * @package EXERCICE-MOOC
 */

define('DEBUG', true);
// Connexion Base de Données
define('DATABASE', 'mysql:host=localhost;dbname=cat_clinic;charset=utf8');
define('LOGIN', 'root');
define('PASSWORD', '');

/**
 * Chargement automatique des classes
 * @param string classe appelée
 *
 * @return none
 */
 spl_autoload_register(function ($class) {

    switch ($class[0])
    {
      // Inclusion des classe de type View
      case 'V' : require_once('../View/'.$class.'.view.php');
                  break;
      // Inclusion des classe de type Mod
      case 'M' : require_once('../Mod/'.$class.'.mod.php');
                  break;
    }
    
    return;
  });

 // Visualisation des erreurs

  function debug($Tab)
  {
    echo '<pre>Tab';
    print_r($Tab);
    echo '</pre>';
    
    return;
         
  } // debug($Tab)

?>
