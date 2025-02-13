<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="<?= URL_ROOT ?>/public/css/output.css">
    <link rel="stylesheet" href="<?= URL_ROOT ?>/public/css/input.css">
</head>
<body>
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-lg font-bold mb-6 text-center">Formulaire d'inscription</h2>
                
                <form action="" method="POST" class="space-y-4">
                    <!-- Prénom -->
                    <div class="space-y-1">
                        <label for="firstName" class="block text-sm font-bold text-gray-700">
                            Prénom :
                        </label>
                        <input 
                            type="text" 
                            id="firstName" 
                            name="nom_utilisateur" 
                            required
                            class="w-full px-2.5 py-1.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Nom -->
                    <div class="space-y-1">
                        <label for="lastName" class="block text-sm font-bold text-gray-700">
                            Nom :
                        </label>
                        <input 
                            type="text" 
                            id="lastName" 
                            name="prenom_utilisateur" 
                            required
                            class="w-full px-2.5 py-1.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Email -->
                    <div class="space-y-1">
                        <label for="email" class="block text-sm font-bold text-gray-700">
                            Email :
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required
                            class="w-full px-2.5 py-1.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Mot de passe -->
                    <div class="space-y-1">
                        <label for="password" class="block text-sm font-bold text-gray-700">
                            Mot de passe :
                        </label>
                        <input 
                            type="password" 
                            id="password" 
                            name="mot_de_passe" 
                            required
                            class="w-full px-2.5 py-1.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Confirmer le mot de passe -->
                    <div class="space-y-1">
                        <label for="confirmPassword" class="block text-sm font-bold text-gray-700">
                            Confirmer le mot de passe :
                        </label>
                        <input 
                            type="password" 
                            id="confirmPassword" 
                            name="confirmPassword" 
                            required
                            class="w-full px-2.5 py-1.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Rôle -->
                    <div class="space-y-1">
                        <label for="role" class="block text-sm font-bold text-gray-700">
                            Choisissez votre rôle :
                        </label>
                        <select 
                            id="role" 
                            name="role" 
                            required
                            class="w-full px-2.5 py-1.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                        >
                            <option value="">-- Sélectionnez un rôle --</option>
                            <option value="cycliste">Cycliste</option>
                            <option value="fan">Fan</option>
                        </select>
                    </div>

                    <!-- Button -->
                    <div class="pt-3">
                        <button 
                            type="submit" 
                            class="w-full bg-black text-white py-2.5 px-4 rounded-md hover:bg-gray-800 transition duration-200"
                        >
                            S'inscrire
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
