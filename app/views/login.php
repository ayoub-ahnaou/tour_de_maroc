<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="<?= URL_ROOT ?>/public/css/output.css">
    <link rel="stylesheet" href="<?= URL_ROOT ?>/public/css/input.css">
</head>
<body>
    <div class="bg-gray-50 min-h-screen flex items-center justify-center py-8">
        <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-lg font-bold mb-6 text-center">Formulaire de connexion</h2>
            

<!-- Affichage du message de notification (succès ou erreur) -->
<?php if (isset($messageKey) && isset($messages[$messageKey])): ?>
                <div class="max-w-md mx-auto mb-4 p-3 rounded-md text-white <?php echo $messages[$messageKey]['style']; ?>">
                    <?php echo $messages[$messageKey]['message']; ?>
                </div>
            <?php endif; ?>



            <form action="" method="POST" class="space-y-4">
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
                
                <!-- Bouton de connexion -->
                <div class="pt-3">
                    <button 
                        type="submit" 
                        class="w-full bg-black text-white py-2.5 px-4 rounded-md hover:bg-gray-800 transition duration-200"
                    >
                        Se connecter
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
