<?php
/**
 * Fichier de classe de type Vue
 * pour l'affichage des pages
 * @author Christian Bonhomme
 * @version 1.0
 * @package MVC
 */

/**
 * Classe pour l'affichage des pages
 */
class VPages
{
  /**
   * Constructeur de la classe VPages
   * @access public
   *        
   * @return none
   */
  public function __construct(){}
  
  /**
   * Destructeur de la classe VPages
   * @access public
   *        
   * @return none
   */
  public function __destruct(){}
  
  /**
   * Affichage de la page
   * @access public
   * @param array données de la page
   *
   * @return none
   */

  public function showPageSousTitre($_value)
  {
    // Affichage du titre de la page
    /*echo '<h1><a href="../Php/index.php?EX=page&amp;ID_PAGE='.$_value['PAGES']['ID_PAGE'].'">'.$_value['PAGES']['TITRES'].'</a></h1>';*/
    if (isset($_SESSION['ADMIN'])) 
    {
      //Affichage des Sous-titre du Titre données
      foreach ($_value['SOUS_TITRES'] as $key => $val_sous_titre) 
      {
        echo '<h2 class="text-center"><a href="../Php/admin.php?EX=page_paragraphe&amp;ID_PAGE='.$_value['PAGES']['ID_PAGE'].'&amp;ID_SOUS_TITRE='.$val_sous_titre['ID_SOUS_TITRE'].'">'.$val_sous_titre['SOUS_TITRES'].'</a></h2>' ;

        //echo '<h2 class="text-center">'.$val_sous_titre['SOUS_TITRES'].'</h2>';
      }
    }
    else
    {
      //Affichage des Sous-titre du Titre donné
      foreach ($_value['SOUS_TITRES'] as $key => $val_sous_titre) 
      {
        //echo '<h2 class="text-center"><a href="../Php/index.php?EX=page_paragraphe&amp;ID_PAGE='.$_value['PAGES']['ID_PAGE'].'&amp;ID_SOUS_TITRE='.$val_sous_titre['ID_SOUS_TITRE'].'">'.$val_sous_titre['SOUS_TITRES'].'</a></h2>' ;

       echo '<h2 class="text-center">'.$val_sous_titre['SOUS_TITRES'].'</h2>';
      } 
    }

    return;
    
  } // showPage($_value)

  public function showParagraphe($_value)
  {
    if (isset($_SESSION['ADMIN'])) 
    {
     //Parcours le tableau 
      foreach ($_value['SOUS_TITRES'] as $key => $val_sous_titre) 
      {
        foreach ($_value['PARAGRAPHES'][$val_sous_titre['ID_SOUS_TITRE']] as $val_paragraphe) 
        {
          echo '<strong><p class="text-center">'.$val_paragraphe['PARAGRAPHE'].'</p></strong></br>';
        }
      } 

      echo '<form action="../Php/admin.php?EX=form&amp;ID_PAGE='.$_value['PAGES']['ID_PAGE'].'" method="POST">
      <input type="submit" value="Modifier" /> 
      </form>';
    }
    else
    {
      //Parcours le tableau
      foreach ($_value['SOUS_TITRES'] as $key => $val_sous_titre) 
      {

        foreach ($_value['PARAGRAPHES'][$val_sous_titre['ID_SOUS_TITRE']] as $val_paragraphe) 
        {
          echo "<strong><p class='text-center'>".$val_paragraphe['PARAGRAPHE']."</p></strong>";
        }
      }      
    }

    return;
    
  } // showPage($_value)

  public function showPageForm($_value)
  {

    //Formulaire de modification du <h1>
    echo <<<HERE
    <form action="../Php/admin.php?EX=update&amp;ID_PAGE={$_value['PAGES']['ID_PAGE']}" method="POST">
    <div class="grid-container">
    <div class="grid-x grid-padding-x">
    <div class="medium-6 cell">
    <label>Titre
    <input type="text" name="TITRE" placeholder="{$_value['PAGES']['TITRES']}" />
    <input type="hidden" name="TAG" value="H1" />
    </label>
    </div>
    </div>
    </div> 
    </form>
    <hr>
HERE;

    // Affichage des sous_titres de la page et de ses paragraphes
    foreach($_value['SOUS_TITRES'] as $val_sous_titres)
    {
      //Formulaire de modification du <h2>
      echo <<<HERE
      <form action="../Php/admin.php?EX=update&amp;ID_PAGE={$_value['PAGES']['ID_PAGE']}&amp;ID_SOUS_TITRE={$val_sous_titres['ID_SOUS_TITRE']}" method="POST">
      <div class="grid-container">
      <div class="grid-x grid-padding-x">
      <div class="medium-6 cell">
      <label>Modifier sous-titre
      <input type="text" name="SOUS_TITRE" placeholder="Sous-titre" />
      <input type="hidden" name="TAG" value="H2" />
      </label>
      </div>
      </div>
      </div>    
      </form>

      <form action="../Php/admin.php?EX=insert&amp;ID_PAGE={$_value['PAGES']['ID_PAGE']}&amp;ID_SOUS_TITRE={$val_sous_titres['ID_SOUS_TITRE']}" method="POST" id="form">
      <div class="grid-container">
      <div class="grid-x grid-padding-x">
      <div class="medium-6 cell">       
      <label>Insérer un sous-titre
      <input name="SOUS_TITRE" placeholder="Insérer un texte" maxlenght="100"/>
      <input type="submit" formenctype="application/x-www-form-urlencoded" value="Valider">
      </label>
      </div>
      </div>
      </div>      
      </form>

      <hr>
HERE;
      
      
      // Affichage des paragraphes des sous-titres
      foreach($_value['PARAGRAPHES'][$val_sous_titres['ID_SOUS_TITRE']] as $val_paragraphes)
      {

        echo <<<HERE
        <form action="../Php/admin.php?EX=update&amp;ID_PAGE={$_value['PAGES']['ID_PAGE']}&amp;ID_SOUS_TITRE={$val_sous_titres['ID_SOUS_TITRE']}&amp;ID_PARAGRAPHE={$val_paragraphes['ID_PARAGRAPHE']}" method="POST" id="form">
        <div class="grid-container">
        <div class="grid-x grid-padding-x">
        <div class="medium-6 cell">
        <label>Modifier le paragraphe
        <textarea name="PARAGRAPHE" id="PARAGRAPHE" placeholder={$val_paragraphes['PARAGRAPHE']} maxlenght="100" ></textarea>
        <input type="submit" formenctype="application/x-www-form-urlencoded" value="Valider">
        <input type="hidden" name="TAG" value="P" />         
        </label>
        </div>
        </div>
        </div> 
        </form>

        <form action="../Php/admin.php?EX=insert&amp;ID_PAGE={$_value['PAGES']['ID_PAGE']}&amp;ID_SOUS_TITRE={$val_sous_titres['ID_SOUS_TITRE']}&amp;ID_PARAGRAPHE={$val_paragraphes['ID_PARAGRAPHE']}" method="POST" id="form">
        <div class="grid-container">
        <div class="grid-x grid-padding-x">
        <div class="medium-6 cell">
        <label>Insérer paragraphe
        <input name="PARAGRAPHE" placeholder="Insérer un contenu" maxlenght="100"/>
        <input type="submit" formenctype="application/x-www-form-urlencoded" value="Valider">
        </label>
        </div>
        </div>
        </div> 
        </form>


        <form action="../Php/admin.php?EX=delete&amp;ID_PAGE={$_value['PAGES']['ID_PAGE']}&amp;ID_SOUS_TITRE={$val_sous_titres['ID_SOUS_TITRE']}&amp;ID_PARAGRAPHE={$val_paragraphes['ID_PARAGRAPHE']}" method="POST" id="form">
        <div class="grid-container">
        <div class="grid-x grid-padding-x">
        <div class="medium-6 cell">        
        <label>Supprimer paragraphe
        <input type="text" name="PARAGRAPHE" value={$val_paragraphes['PARAGRAPHE']} />
        <input type="submit" formenctype="application/x-www-form-urlencoded" value="Supprimer">
        </label>
        </div>
        </div>
        </div>       
        </form>
        <hr>
HERE;
      }

    }
    
    //Formulaire d'insertion Avec Utilisation de <textarea> <p>.
    /*echo <<<HERE
    <form action="../Php/admin.php?EX=insert&amp;ID_PAGE={$_value['PAGES']['ID_PAGE']}&amp;ID_SOUS_TITRE={$val_sous_titres['ID_SOUS_TITRE']}&amp;ID_PARAGRAPHE={$val_paragraphes['ID_PARAGRAPHE']}" method="POST" id="form">

    <p><textarea name="PARAGRAPHE" placeholder="Insérer un texte" maxlenght="100"></textarea></p>

    <input type="submit" formenctype="application/x-www-form-urlencoded" value="Valider">
    </form>
    HERE;*/

    //Formulaire de Delete <paragraphe>.s
    /*echo <<<HERE
    <form action="../Php/admin.php?EX=delete&amp;ID_PAGE={$_value['PAGES']['ID_PAGE']}&amp;ID_SOUS_TITRE={$val_sous_titres['ID_SOUS_TITRE']}&amp;ID_PARAGRAPHE={$val_paragraphes['ID_PARAGRAPHE']}" method="POST" id="form">
    <input type="text" name="PARAGRAPHE" value={$val_paragraphes['PARAGRAPHE']} />
    <input type="submit" formenctype="application/x-www-form-urlencoded" value="Supprimer">
    </form>
    HERE;*/

    return;

  }//showPageForm($_value)

  public function showPageContact()
  {

    echo <<<HERE

    <h3>Renseigner les champs et envoyé un message</h3>

    <form action="../Php/index.php?EX=insert_message" method="POST">
    <div class="grid-container">
    <div class="grid-x grid-padding-x">
    <div class="medium-6 cell"> 
    <label>Nom
    <p><input type="text" name="NOM" id="Nom" placeholder="Votre Nom" required/></p>
    </label>
    </div>
    </div>
    </div> 

    <div class="grid-container">
    <div class="grid-x grid-padding-x">
    <div class="medium-6 cell"> 
    <label>Prénom
    <p><input type="text" name="PRENOM" id="Prenom" placeholder="Votre Prénom" required/></p>
    </label>
    </div>
    </div>
    </div> 

    <div class="grid-container">
    <div class="grid-x grid-padding-x">
    <div class="medium-6 cell"> 
    <label>Mail
    <input type="text" name="MAIL" id="Mail" placeholder="Votre Mail" required/>
    </label>
    </div>
    </div>
    </div>     

    <div class="grid-container">
    <div class="grid-x grid-padding-x">
    <div class="medium-6 cell"> 
    <label>Message
    <p><textarea name="PARAGRAPHE" placeholder="Insérer un texte" maxlenght="100" required></textarea></p>
    <p><input type="submit" name="Valider" /></p>
    </label>
    </div>
    </div>
    </div> 
    </form>   
HERE;

    return;

  }

  public function showMessage()
  {
    echo "Votre Message a bien été envoyé !";

    return;
  }

} // VPages

?>