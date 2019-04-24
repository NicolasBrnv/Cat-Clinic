<?php
/**
 * Fichier de classe de type Modèle 
 * pour la lecture et la gestion de la table PAGES
 * @author Christian Bonhomme
 * @version 1.0
 * @package EXO-MOOC
 */
class MPages
{
  /**
   * Clef primaire de la table PAGES
   * @var string $file
   */
  private $id_page;

  /**
   * Tableau de gestion de données
   * @var array $value
   */
  private $value;
  
	/**
   * Constructeur de la classe
   * @access public
   * @param int clef primaire
   *        
   * @return none
   */
  public function __construct($_id_page = null)
  {
    // Connexion à la Base de Données
    $this->conn = new PDO(DATABASE, LOGIN, PASSWORD);
    
    // Instanciation du membre $id_page
    $this->id_page = $_id_page;

  	return;
  	
  } // __construct($_id_page = null)
  
  /**
   * Destructeur de la classe
   * @access public
   *        
   * @return none
   */
  public function __destruct() {}

  /**
   * Instancie le membre $value
   * @access public
   * @param array tableau des données
   * 
   * @return none
   */
  public function SetValue($_value)
  {
  	$this->value = $_value;

  	return;
  
  } // SetValue($_value)

  /**
   * Sélection du titre d'une page donnée
   * @access public
   *
   * @return array données du titre
   */
  public function SelectTitre()
  {
  	$query = "select ID_PAGE,
  			         TITRES
  			  from PAGES
  			  where ID_PAGE = :ID_PAGE";

  	$result = $this->conn->prepare($query);

    $result->bindValue(':ID_PAGE', $this->id_page, PDO::PARAM_INT);
  	
  	$result->execute();

  	return $result->fetch();
   
  } // SelectTitre()

  /**
   * Sélection de tous les titres pour le menu
   * @access public
   *
   * @return array données du titre
   */
  public function SelectTitreAll()
  {
    $query = "select ID_PAGE,
                 TITRES
          from PAGES";

    $result = $this->conn->prepare($query);
    
    $result->execute();

    return $result->fetchAll();
   
  } // SelectTitre()
  /**
   * Sélection des sous-titres d'une page donnée
   * @access public
   *
   * @return array données des sous-titres
   */
  public function SelectSousTitresAll()
  {
  	$query = "select SOUS_TITRES.ID_SOUS_TITRE,
               	     SOUS_TITRES
  	          from SOUS_TITRES, PAGES_SOUS_TITRES
  	          where ID_PAGE = :ID_PAGE
  	          and SOUS_TITRES.ID_SOUS_TITRE = PAGES_SOUS_TITRES.ID_SOUS_TITRE";
  
  	$result = $this->conn->prepare($query);

    $result->bindValue(':ID_PAGE', $this->id_page, PDO::PARAM_INT);
  	 
  	$result->execute();
  
  	return $result->fetchAll();
  	 
  } // SelectSousTitresAll()

  /**
   * Sélection des paragraphes d'un sous_titre donné
   * @access public
   *
   * @return array données des sous-titres
   */
  public function SelectParagraphesAll($_id_sous_titre)
  {
  	$query = "select PARAGRAPHES.ID_PARAGRAPHE,
  	                 PARAGRAPHE
  	          from PARAGRAPHES, SOUS_TITRES_PARAGRAPHES
  	          where ID_SOUS_TITRE = :ID_SOUS_TITRE
  	          and PARAGRAPHES.ID_PARAGRAPHE = SOUS_TITRES_PARAGRAPHES.ID_PARAGRAPHE
  	          order by ORDRE";
  
  	$result = $this->conn->prepare($query);

    $result->bindValue(':ID_SOUS_TITRE', $_id_sous_titre, PDO::PARAM_INT);
  
  	$result->execute();
  
  	return $result->fetchAll();
  
  } // SelectParagraphesAll()

  /**
   * Mise à jour d'un titre
   * @access public
   *
   * @return none
   */
  public function UpdateTitre()
  {
    $query = "update PAGES set TITRES = '{$this->value['TITRE']}'
              where ID_PAGE = :ID_PAGE";

    $result = $this->conn->prepare($query);

    $result->bindValue(':ID_PAGE', $this->id_page, PDO::PARAM_INT);
     
    $result->execute() or die ($this->ErrorSQL($result));
    
    return;
  
  } // UpdateTitre()

  /**
   * Mise à jour d'un sous-titre
   * @access public
   *
   * @return none
   */
  public function UpdateSousTitre($_id_sous_titre)
  {
    $query = "update SOUS_TITRES set SOUS_TITRES = :SOUS_TITRES
              where ID_SOUS_TITRE = :ID_SOUS_TITRE";
  
    $result = $this->conn->prepare($query);

    $result->bindValue(':SOUS_TITRES', $this->value['SOUS_TITRE'], PDO::PARAM_STR);

    $result->bindValue(':ID_SOUS_TITRE', $_id_sous_titre, PDO::PARAM_INT);
  
    $result->execute() or die ($this->ErrorSQL($result));
     
    return;
  
  } // UpdateSousTitre()

  public function UpdateParagraphe($_id_paragraphe)
  {
    $query = "update PARAGRAPHES set PARAGRAPHE = :PARAGRAPHE
    where ID_PARAGRAPHE = :ID_PARAGRAPHE";
  
    $result = $this->conn->prepare($query);

    $result->bindValue(':PARAGRAPHE', $this->value['PARAGRAPHE'], PDO::PARAM_STR);

    $result->bindValue(':ID_PARAGRAPHE', $_id_paragraphe, PDO::PARAM_INT);
  
    $result->execute() or die ($this->ErrorSQL($result));
  
    return;
  
  } // UpdateParagraphe()

  public function InsertParagraphe($id_sous_titre, $id_paragraphe)
  {
    // Insère un nouveau paragraphe
    $query = "insert into PARAGRAPHES (PARAGRAPHE)
          values (:PARAGRAPHE)";

    $result = $this->conn->prepare($query);

    $result->bindValue(':PARAGRAPHE', $this->value['PARAGRAPHE'], PDO::PARAM_STR);
  
    $result->execute() or die ($this->ErrorSQL($result));
    
    // Récupère l'identifiant du nouveau paragraphe (auto-incrément)
    $id_paragraphe = $this->conn->lastInsertId();
    
    // Récupère l'identifiant du dernier sous-titre
    $query = "select MAX(ID_SOUS_TITRE) as ID_SOUS_TITRE
              from PAGES_SOUS_TITRES
          where ID_PAGE = :ID_PAGE";
     
    $result = $this->conn->prepare($query);

    $result->bindValue(':ID_PAGE', $this->id_page, PDO::PARAM_INT);
    
    $result->execute();
    
    $value = $result->fetch();
    
    $id_sous_titre = $value['ID_SOUS_TITRE'];   

    // Récupère l'identifiant du dernier paragraphe
    $query = "select MAX(ORDRE) as ORDRE
              from SOUS_TITRES_PARAGRAPHES
              where ID_SOUS_TITRE = :ID_SOUS_TITRE";
    
    $result = $this->conn->prepare($query);

    $result->bindValue(':ID_SOUS_TITRE', $id_sous_titre, PDO::PARAM_INT);
     
    $result->execute();
     
    $value = $result->fetch();
    
    // Ajoute 1 à l'ordre 
    $ordre = $value['ORDRE'] + 1;   
    
    // Insère dans EXO_SOUS_TITRES_PARAGRAPHES
    // l'identifiant du dernier sous-titre
    // l'identifiant du nouveau paragraphe
    // l'odre d'affichage de ce paragraphe
    $query = "insert into SOUS_TITRES_PARAGRAPHES (ID_SOUS_TITRE, ID_PARAGRAPHE, ORDRE)
              values (:ID_SOUS_TITRE, :ID_PARAGRAPHE, :ORDRE)";
     
    $result = $this->conn->prepare($query);

    $result->bindValue(':ID_SOUS_TITRE', $id_sous_titre, PDO::PARAM_INT);
    $result->bindValue(':ID_PARAGRAPHE', $id_paragraphe, PDO::PARAM_INT);
    $result->bindValue(':ORDRE', $ordre, PDO::PARAM_INT);
    
    $result->execute() or die ($this->ErrorSQL($result));
     
    // Renvoie l'identifiant du nouveau paragraphe
    return $id_paragraphe;
  
  } // InsertParagraphe()

  /**
   * Suppression d'un paragraphe
   * @access public
   *
   * @return int identifiant du paragraphe
   */
  public function DeleteParagraphe()
  {
    // Suppression dans EXO_SOUS_TITRES_PARAGRAPHES
    $query = "delete from SOUS_TITRES_PARAGRAPHES
              where ID_PARAGRAPHE = :ID_PARAGRAPHE";
  
    $result = $this->conn->prepare($query) or die ($this->ErrorSQL($result));

    $result->bindValue(':ID_PARAGRAPHE', $this->value['ID_PARAGRAPHE'], PDO::PARAM_INT);
  
    $result->execute();
    
  // Suppression dans EXO_PARAGRAPHES
    $query = "delete from PARAGRAPHES
    where ID_PARAGRAPHE = :ID_PARAGRAPHE";
    
    $result = $this->conn->prepare($query) or die ($this->ErrorSQL($result));

    $result->bindValue(':ID_PARAGRAPHE', $this->value['ID_PARAGRAPHE'], PDO::PARAM_INT);
    
    $result->execute();
     
    return $this->value['ID_PARAGRAPHE'];
  
  } // DeleteParagraphe()

  /**
   * Gestion des erreurs
   * @access public
   *
   * @return none
   */
  private function ErrorSQL($result)
  {
    // Récupère le tableau des erreurs
    $error = $result->errorInfo();

    // Instancie le tableau des valeurs
    // pour le formater au format JSON
    $value['TYPE_ERROR'] = $error[0];
    $value['CODE_ERROR'] = $error[1];
    $value['MSG_ERROR'] = $error[2];

    // Met la valeur de l'erreur à true
    $value['ERROR'] = true;
  
    echo json_encode($value);
  
    return;
  
  } // ErrorSQL($result) 

} // MPages
?>