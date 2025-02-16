<?php

use TourDeMaroc\App\models\users;

class SignupController extends Controller {
    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom_utilisateur = trim($_POST["nom_utilisateur"]);
            $mot_de_passe = $_POST["mot_de_passe"];
            $email = trim($_POST["email"]);
            $confirmPassword = $_POST["confirmPassword"];
            $role = $_POST["role"];
            $prenom_utilisateur= trim($_POST["prenom_utilisateur"]);

        
            if (empty($nom_utilisateur) || empty($prenom_utilisateur) || empty($email) || empty($mot_de_passe) || empty($confirmPassword) || empty($role)) {
                echo "Tous les champs sont obligatoires.";
                exit;
            }
        
            if ($mot_de_passe !== $confirmPassword) {
                echo "Les mots de passe ne correspondent pas.";
                exit;
            }
        
            $user = new users();
            if ($user->VerifyEmail($email)) {
                echo "Cet email est déjà utilisé.";
                exit;                    
            }
        
            $hashedPassword = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        
            if ($user->InsertUser($nom_utilisateur, $email, $hashedPassword, $role,$prenom_utilisateur)) {
                echo "Inscription réussie !";
                exit;
            } else {
                echo "Une erreur est survenue lors de l'inscription.";
            }
        }
        $this->view("signup");
    }
}
