


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course de Cyclisme - Montagne</title>
    <link rel="stylesheet" href="<?= URL_ROOT ?>/public/css/output.css">
    <link rel="stylesheet" href="<?= URL_ROOT ?>/public/css/input.css">
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo/Home -->
                <div class="flex items-center">
                    <a href="#" class="text-xl font-bold text-black hover:text-gray-700">
                        TDF 2025
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="flex items-center space-x-4">
                    <a href="<?= URL_ROOT . "/home"; ?>" class="text-gray-600 hover:text-gray-400 text-sm">ACCUEIL</a>
                    <a href="#" class="text-gray-600 hover:text-gray-400 text-sm">SE CONNECTER</a>
                    <a href="#" class="bg-black text-white px-4 py-2 text-sm hover:bg-gray-800">S'INSCRIRE</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section avec image de couverture -->
        <div class="w-full mb-8">
            <img src="<?= URL_ROOT ?>/public/assets/images/d8b28.jfif" class="w-full h-64 object-cover" alt="Cover">
        </div>

        <!-- Grid des catégories -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php      extract($data);      ?>  

            <?php foreach($coursesList as $course): ?>
            <div class="relative overflow-hidden shadow-lg bg-white">
                <!-- Image de la catégorie -->
                <img 
                    src="https://img.aso.fr/core_app/img-cycling-tdf-jpg/1/61600/0:0,660:1000-660-0-30/551d9" 
                    class="w-full h-48 object-cover" 
                   
                >
                
                <!-- Titre de la catégorie -->
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">
                        <?= htmlspecialchars($course->getNom()) ?>
                    </h2>
                    
                    <!-- Bouton voir plus -->
                    <a href="<?= URL_ROOT . "/categorieVisiteur/index/" . $course->getId(); ?>" 
                    class="block text-center bg-black text-white py-2 px-4 mt-4 hover:bg-gray-800">
                        VOIR PLUS
                    </a>



                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-black text-white mt-12">
        <div class="container mx-auto px-4 py-8">
            <div class="text-center">
                <p class="text-sm">© 2025 Tour de France. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
