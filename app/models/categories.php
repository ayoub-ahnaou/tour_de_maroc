<?php 
namespace TourDeMaroc\App\models;
use TourDeMaroc\App\libraries\database;

class categories{
    private $categorie_id;
    private $nom;
    

    public function __construct($categorie_id=null,$nom=null)
    {
        $this->categorie_id=$categorie_id;
        $this->nom=$nom;
   
    }

    public function getId(){
       return $this->categorie_id;
    }
     public function getNom(){
        return $this->nom;
     }


     public function SelectCategorie() {
        $db = database::getInstance()->getConnection();
        $sql = "SELECT * FROM categorie";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
        $categories = []; // ✅ Correction ici
        foreach($result as $row) {
            $obj = new self($row['categorie_id'], $row['nom']);
            $categories[] = $obj;  // ✅ Stocker les objets correctement
        }
        return $categories;  // ✅ Retourner le bon tableau
    }
    

   
  
     
  

}