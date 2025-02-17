<?php
use TourDeMaroc\App\models\users;

class SignupController extends controller {
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
                echo "<script>alert('Les mots de passe ne correspondent pas.');</script>";
                exit;
            }
        
            $user = new users();
            if ($user->VerifyEmail($email)) {
                echo "<script>alert('Cet email est déjà utilisé.');</script>";
                exit;                    
            }
        
            $hashedPassword = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        
            if ($user->InsertUser($nom_utilisateur, $email, $hashedPassword, $role,$prenom_utilisateur)) {
                echo "<script>alert('inscription réussie');</script>";
                exit;
            } else {
                echo "<script>alert('Une erreur est survenue lors de l'inscription.');</script>";
            }
        }
        $this->view("signup");
    }
}
