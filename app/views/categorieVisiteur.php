<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses de Cyclisme</title>
    <link rel="stylesheet" href="<?= URL_ROOT ?>/public/css/output.css">
    <link rel="stylesheet" href="<?= URL_ROOT ?>/public/css/input.css">
</head>
<body class="bg-gray-100">
    <!-- Navbar with gradient -->
    <nav class="bg-gradient-to-r from-gray-900 to-gray-800 shadow-xl">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center">
                    <a href="#" class="text-2xl font-extrabold text-white hover:text-yellow-400 transition duration-300">
                        TDF 2025
                    </a>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="#" class="text-gray-300 hover:text-yellow-400 transition duration-300 text-sm font-medium">ACCUEIL</a>
                    <a href="#" class="text-gray-300 hover:text-yellow-400 transition duration-300 text-sm font-medium">SE CONNECTER</a>
                    <a href="#" class="bg-yellow-500 text-black px-6 py-2 rounded-full text-sm font-bold hover:bg-yellow-400 transition duration-300">S'INSCRIRE</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-12">
        <!-- Header Section with decorative element -->
        <div class="flex justify-between items-center mb-12 border-b border-gray-200 pb-4">
            <div class="flex items-center space-x-4">
                <div class="w-1 h-8 bg-yellow-500"></div>
                <h2 class="text-2xl font-bold text-gray-900">NOS COURSES</h2>
            </div>
            <a href="#" class="text-gray-600 hover:text-yellow-500 transition duration-300 text-sm font-medium flex items-center">
                VOIR TOUT
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <!-- Course Card with hover effects -->
        <div class="bg-white shadow-xl rounded-xl overflow-hidden w-96 transform hover:-translate-y-1 transition duration-300">
            <div class="relative">
                <img 
                    src="https://img.aso.fr/core_app/img-cycling-tdf-jpg/1/61600/0:0,660:1000-660-0-30/551d9"
                    class="w-full h-80 object-cover transition duration-300 hover:scale-105"
                    alt="Tour du Maroc"
                >
                <div class="absolute top-0 right-0 bg-yellow-500 text-black px-4 py-2 m-4 rounded-full text-sm font-bold">
                    #TOURDUMAROC2023
                </div>
            </div>

            <div class="p-8">
                <h3 class="text-2xl font-bold mb-6 text-gray-900">Tour du Maroc 2023</h3>
                <div class="space-y-4">
                    <div class="flex items-center text-gray-600 group hover:text-yellow-500 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 group-hover:scale-110 transition duration-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium">Du 21 Mai au 30 Mai 2023</span>
                    </div>
                    <div class="flex items-center text-gray-600 group hover:text-yellow-500 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 group-hover:scale-110 transition duration-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium">Maroc</span>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#" class="block text-center bg-black text-white py-4 rounded-lg font-bold hover:bg-yellow-500 hover:text-black transition duration-300">
                        VOIR LES ÉTAPES
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>