
<?php
extract($data);  ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Étapes du Tour de Maroc 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Navbar -->
    <nav class="bg-black shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <a href="#" class="text-2xl font-bold text-white hover:text-yellow-400 transition duration-300">Tour De Maroc</a>
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#" class="text-white hover:text-yellow-400 transition duration-300">Accueil</a>
                    <a href="#" class="text-white hover:text-yellow-400 transition duration-300">Se Connecter</a>
                    <a href="#" class="bg-yellow-500 text-black px-4 py-2 rounded-full hover:bg-yellow-400 transition duration-300">S'inscrire</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8 text-black">Étapes du Tour de Maroc 2025</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
           
        <?php foreach($etapes as $etape) : ?>
            <div class="bg-white rounded-2xl overflow-hidden shadow-xl transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
    <div class="bg-gradient-to-r from-yellow-400 to-yellow-600 p-6">
        <h2 class="text-3xl font-bold text-white">Étape: <?php echo htmlspecialchars($etape->getLieuDeDepart()) ?> - <?php echo htmlspecialchars($etape->getLieuDarrivee()) ?></h2>
    </div>
    <div class="p-8">
        <ul class="space-y-4 mb-6">
            <li class="flex justify-between text-lg">
                <span class="font-semibold">Distance:</span>
                <span class="text-yellow-500 font-bold"><?php echo htmlspecialchars($etape->getDistance()) ?> km</span>
            </li>
            <li class="flex justify-between text-lg">
                <span class="font-semibold">Date:</span>
                <span class="text-yellow-500 font-bold"><?php echo htmlspecialchars($etape->getdate()) ?></span>
            </li>
            <li class="flex justify-between text-lg">
                <span class="font-semibold">Région:</span>
                <span class="text-yellow-500 font-bold"><?php echo htmlspecialchars($etape->getRegion()) ?></span>
            </li>
            <li class="flex justify-between text-lg">
                <span class="font-semibold">Difficulté:</span>
                <span class="text-yellow-500 font-bold"><?php echo htmlspecialchars($etape->getDifficulte()) ?></span>
            </li>
        </ul>
     
    </div>
</div>
                    <?php endforeach; ?>
        </div>
    </main>

    <footer class="bg-black text-white py-4 mt-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2025 Tour De Maroc. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>