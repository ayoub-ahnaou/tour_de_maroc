<?php 
namespace TourDeMaroc\App\models;
use TourDeMaroc\App\libraries\Database;

class users{
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $role;

    public function __construct($nom=null,$prenom=null,$email=null,$password=null,$role=null)
    {
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->password=$password;
        $this->role=$role;
    }

    // gettters
     public function getNom(){
        return $this->nom;
     }
     public function getPrenom(){
        return $this->prenom;
     }
     public function getEmail(){
        return $this->email;
     }
     public function getRole(){
        return $this->role;
     }

     public function VerifyEmail($email) {
      try {
          $db = Database::getInstance()->getConnection();
          $sql = "SELECT COUNT(*) FROM utilisateur WHERE email = :email";
          $stmt = $db->prepare($sql);
          $stmt->bindParam(":email", $email);
          $stmt->execute();
          $count = $stmt->fetchColumn();
          return $count > 0;
      } catch (\PDOException $e) {
          error_log("Erreur lors de la vérification de l'email : " . $e->getMessage());
          return false;
      }
  }
     public function InsertUser($nom_utilisateur, $email, $mot_de_passe, $role,$prenom_utilisateur) {
          $bd = Database::getInstance()->getConnection();
          $sql = "INSERT INTO utilisateur(nom_utilisateur, mot_de_passe, email, role,prenom_utilisateur) VALUES 
                 (:nom_utilisateur, :mot_de_passe, :email, :role,:prenom_utilisateur)";
          $stmt = $bd->prepare($sql);
          $stmt->bindValue(":nom_utilisateur", $nom_utilisateur);
          $stmt->bindValue(":mot_de_passe", $mot_de_passe);
          $stmt->bindValue(":email", $email);
          $stmt->bindValue(":role", $role);
          $stmt->bindValue(":prenom_utilisateur", $prenom_utilisateur);
         return $stmt->execute();
   }

   // -------login------

   public function GetUserMail($email) { 
      $bd = Database::getInstance()->getConnection(); 
      $sql = "SELECT * FROM utilisateur WHERE email=:email";
       $stmt = $bd->prepare($sql); 
       $stmt->bindValue(":email", $email);
        $stmt->execute(); 
       $resultat = $stmt->fetchAll(\PDO::FETCH_ASSOC);
       return $resultat; 
      }


      public static function verfierData($email, $password) {
         $userModel = new users();
         $user = $userModel->GetUserMail($email); 
         if ($user) { 
             if (password_verify($password, $user['mot_de_passe'])) { 
                 session_start(); 
                //  set("id", 1)
                 $_SESSION["utilisateur_id"] = $user['utilisateur_id']; 
                 $_SESSION["nom_utilisateur"] = $user['nom_utilisateur']; 
                 $_SESSION["prenom_utilisateur"] = $user['prenom_utilisateur']; 

                 $_SESSION["role"] = $user['role']; 
     
                 return true; 
             } else {    
               return "mot de passe incorrecte"; 
             } 
         } else {
             return "Email inexistant"; 
         }
     }

     public function GetUserById($utilisateur_id) { 
        try {
            $bd = Database::getInstance()->getConnection(); 
            $sql = "SELECT * FROM utilisateur WHERE utilisateur_id=:utilisateur_id";
            $stmt = $bd->prepare($sql); 
            $stmt->bindValue(":utilisateur_id", $utilisateur_id);
            $stmt->execute(); 
            return $stmt->fetch(\PDO::FETCH_ASSOC); 
        } catch (\PDOException $e) {
            error_log("Error getting user by ID: " . $e->getMessage());
            return null;
        }
    }


}