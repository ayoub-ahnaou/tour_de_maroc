<?php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="bg-gray-50 min-h-screen flex items-center justify-center py-8">
    <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-lg font-bold mb-6 text-center">Réinitialiser le mot de passe</h2>

        <form action="" method="POST" class="space-y-4">
            <!-- Email -->
            <div class="space-y-1">
                <label for="email" class="block text-sm font-bold text-gray-700">
                    Entrez votre email :
                </label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    class="w-full px-2.5 py-1.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                >
            </div>

            <!-- Bouton d'envoi -->
            <div class="pt-3">
                <button
                    type="submit"
                    name="ResestPassword"
                    class="w-full bg-black text-white py-2.5 px-4 rounded-md hover:bg-gray-800 transition duration-200"
                >
                    Envoyer la demande
                </button>
            </div>

            <!-- Lien Retour -->
            <div class="text-center pt-2">
                <a href="#" class="text-sm text-yellow-600 hover:text-yellow-700 transition duration-200">
                    Retour à la connexion
                </a>
            </div>
        </form>
    </div>
</div>
</body>
</html>

