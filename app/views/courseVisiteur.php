<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses de Cyclisme</title>
    <link rel="stylesheet" href="<?= URL_ROOT ?>/public/css/output.css">
    <link rel="stylesheet" href="<?= URL_ROOT ?>/public/css/input.css">
</head>
<body class="bg-gray-50">
    <!-- Navbar (même que précédemment) -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="#" class="text-xl font-bold text-black hover:text-gray-700">
                        TDF 2025
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-600 hover:text-gray-400 text-sm">ACCUEIL</a>
                    <a href="#" class="text-gray-600 hover:text-gray-400 text-sm">SE CONNECTER</a>
                    <a href="#" class="bg-black text-white px-4 py-2 text-sm hover:bg-gray-800">S'INSCRIRE</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-xl font-bold">NOS COURSES</h2>
            <a href="#" class="text-gray-600 hover:text-gray-400 text-sm">VOIR TOUT ></a>
        </div>

        <!-- Course Card -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden w-80 h-[450px]"> <!-- Ajouter largeur et hauteur -->
    <div class="relative">
        <img 
            src="https://img.aso.fr/core_app/img-cycling-tdf-jpg/1/61600/0:0,660:1000-660-0-30/551d9" 
            class="w-full h-72 object-cover" 
            alt="Tour du Maroc"
        >
        <div class="absolute bottom-0 left-0 bg-yellow-500 text-black px-3 py-1 m-2 text-sm">
            #TOURDUMAROC2023
        </div>
    </div>
    
    <div class="p-6">
        <h3 class="text-2xl font-bold mb-4">Tour du Maroc 2023</h3>
        <div class="space-y-4">
            <div class="flex items-center text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                </svg>
                <span>Du 21 Mai au 30 Mai 2023</span>
            </div>
            <div class="flex items-center text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
                <span>Maroc</span>
            </div>
        </div>
        <div class="mt-6">
            <a href="#" class="block text-center bg-black text-white py-3 hover:bg-gray-800">
                VOIR LES ÉTAPES
            </a>
        </div>
    </div>
</div>

    </div>
</body>
</html>