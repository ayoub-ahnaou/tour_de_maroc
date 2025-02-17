<?php
use TourDeMaroc\App\Libraries\Session;
require_once "./components/header.php";
?>
<body class="bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-black text-white">
            <!-- Logo -->
            <div class="p-6">
                <a href="#" class="text-xl font-bold text-white">TDF 2025</a>
            </div>

            <!-- User Quick Info -->
            <div class="px-6 py-4 border-t border-gray-700">
                <div class="flex items-center space-x-3">
                    <img src="<?= URL_ROOT ?>/public/assets/images/profile.jpg" alt="Profile" class="w-10 h-10 rounded-full">
                    <div>
                    <p class="text-sm font-semibold"><?= $_SESSION['nom_utilisateur'] ?></p>
                    <p class="text-xs text-gray-400">Fan</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="mt-6">
                
                <a href="<?= URL_ROOT  ."/Cyclistes/show" ?>" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Cyclistes à suivre
                </a>
                <a href="<?= URL_ROOT  ."/Etapes/showSteps" ?>" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Étapes à suivre
                </a>
                <a href="<?= URL_ROOT  ."/Signalement/signal" ?>" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    Réclamations
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <div class="bg-white shadow-sm">
                <div class="px-8 py-4">
                    <h1 class="text-2xl font-bold">Mon Profil</h1>
                </div>
            </div>
<!-- Profile Overview Card - Add this before the update form -->
<div class="p-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden mb-8">
        <div class="p-6">
            <div class="flex items-center space-x-6">
                <!-- Profile Image -->
                <div class="flex-shrink-0">
                    <img src="<?= URL_ROOT ?>/public/assets/images/profile.jpg" alt="Profile" class="w-20 h-20 rounded-full">
                </div>
                
                <!-- Profile Info -->
                <div class="flex-1">
                    <div class="space-y-1">
                        <span class="text-2xl font-bold"><?=$_SESSION["prenom_utilisateur"]?></span><span class="text-2xl font-bold"> <?=$_SESSION["nom_utilisateur"]?></span>
                        <p class="text-gray-600"><?=$_SESSION["prenom_utilisateur"]?>@email.com</p>
                        <div class="flex items-center space-x-2 text-sm text-gray-500">
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded">Fan</span>
                            <span>•</span>
                            <span>Membre depuis 2024</span>
                        </div>
                    </div>
                </div>
                
                <!-- Right side status/actions -->
                <div class="flex-shrink-0 text-right">
                    <div class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 rounded-full">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                        Actif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- The rest of your update form code remains the same -->
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- ... (rest of the existing update form code) ... -->
    </div>
</div>


<!-- Add this CSS in the head section -->


<!-- Cyclists Carousel Section -->
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden mb-8">
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Cyclistes suivis</h2>
        <div class="carousel flex overflow-x-auto space-x-4 cursor-grab" id="cyclistsCarousel">
            <!-- Cyclist Card 1 -->
            <div class="flex-shrink-0 w-80 bg-gray-50 rounded-lg p-4">
                <div class="flex items-center space-x-4">
                    <img src="<?= URL_ROOT ?>/public/assets/images/cyclist1.jpg" alt="Cyclist" class="w-16 h-16 rounded-full">
                    <div>
                        <h3 class="font-bold">Tadej POGACAR</h3>
                        <p class="text-sm text-gray-600">UAE Team Emirates</p>
                        <div class="flex items-center mt-2">
                            <img src="<?= URL_ROOT ?>/public/assets/icons/flag.svg" class="w-5 h-5 mr-2">
                            <span class="text-sm">Slovénie</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cyclist Card 2 -->
            <div class="flex-shrink-0 w-80 bg-gray-50 rounded-lg p-4">
                <div class="flex items-center space-x-4">
                    <img src="<?= URL_ROOT ?>/public/assets/images/cyclist2.jpg" alt="Cyclist" class="w-16 h-16 rounded-full">
                    <div>
                        <h3 class="font-bold">Jonas VINGEGAARD</h3>
                        <p class="text-sm text-gray-600">Team Visma</p>
                        <div class="flex items-center mt-2">
                            <img src="<?= URL_ROOT ?>/public/assets/icons/flag.svg" class="w-5 h-5 mr-2">
                            <span class="text-sm">Danemark</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cyclist Card 3 -->
            <div class="flex-shrink-0 w-80 bg-gray-50 rounded-lg p-4">
                <div class="flex items-center space-x-4">
                    <img src="<?= URL_ROOT ?>/public/assets/images/cyclist3.jpg" alt="Cyclist" class="w-16 h-16 rounded-full">
                    <div>
                        <h3 class="font-bold">Remco EVENEPOEL</h3>
                        <p class="text-sm text-gray-600">Soudal Quick-Step</p>
                        <div class="flex items-center mt-2">
                            <img src="<?= URL_ROOT ?>/public/assets/icons/flag.svg" class="w-5 h-5 mr-2">
                            <span class="text-sm">Belgique</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cyclist Card 4 -->
            <div class="flex-shrink-0 w-80 bg-gray-50 rounded-lg p-4">
                <div class="flex items-center space-x-4">
                    <img src="<?= URL_ROOT ?>/public/assets/images/cyclist4.jpg" alt="Cyclist" class="w-16 h-16 rounded-full">
                    <div>
                        <h3 class="font-bold">Wout VAN AERT</h3>
                        <p class="text-sm text-gray-600">Team Visma</p>
                        <div class="flex items-center mt-2">
                            <img src="<?= URL_ROOT ?>/public/assets/icons/flag.svg" class="w-5 h-5 mr-2">
                            <span class="text-sm">Belgique</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stages Carousel Section -->
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden mb-8">
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Étapes suivies</h2>
        <div class="carousel flex overflow-x-auto space-x-4 cursor-grab" id="stagesCarousel">
            <!-- Stage Card 1 -->
            <div class="flex-shrink-0 w-80 bg-gray-50 rounded-lg p-4">
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="bg-yellow-500 text-black px-2 py-1 rounded text-sm">Étape 1</span>
                        <span class="text-sm text-gray-600">05/07/2025</span>
                    </div>
                    <div>
                        <div class="flex items-center text-sm">
                            <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                            <div>
                                <p class="font-bold">Départ: Lille</p>
                                <p class="font-bold">Arrivée: Roubaix</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Distance: 150 km</p>
                    </div>
                </div>
            </div>

            <!-- Stage Card 2 -->
            <div class="flex-shrink-0 w-80 bg-gray-50 rounded-lg p-4">
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="bg-yellow-500 text-black px-2 py-1 rounded text-sm">Étape 2</span>
                        <span class="text-sm text-gray-600">06/07/2025</span>
                    </div>
                    <div>
                        <div class="flex items-center text-sm">
                            <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                            <div>
                                <p class="font-bold">Départ: Roubaix</p>
                                <p class="font-bold">Arrivée: Calais</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Distance: 165 km</p>
                    </div>
                </div>
            </div>

            <!-- Stage Card 3 -->
            <div class="flex-shrink-0 w-80 bg-gray-50 rounded-lg p-4">
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="bg-yellow-500 text-black px-2 py-1 rounded text-sm">Étape 3</span>
                        <span class="text-sm text-gray-600">07/07/2025</span>
                    </div>
                    <div>
                        <div class="flex items-center text-sm">
                            <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                            <div>
                                <p class="font-bold">Départ: Calais</p>
                                <p class="font-bold">Arrivée: Dunkerque</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Distance: 170 km</p>
                    </div>
                </div>
            </div>

            <!-- Stage Card 4 -->
            <div class="flex-shrink-0 w-80 bg-gray-50 rounded-lg p-4">
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="bg-yellow-500 text-black px-2 py-1 rounded text-sm">Étape 4</span>
                        <span class="text-sm text-gray-600">08/07/2025</span>
                    </div>
                    <div>
                        <div class="flex items-center text-sm">
                            <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                            <div>
                                <p class="font-bold">Départ: Dunkerque</p>
                                <p class="font-bold">Arrivée: Boulogne</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Distance: 155 km</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


          
        </div>
    </div>

<script>
    function enableDragScroll(elementId) {
        const carousel = document.getElementById(elementId);
        let isDown = false;
        let startX;
        let scrollLeft;

        carousel.addEventListener('mousedown', (e) => {
            isDown = true;
            carousel.style.cursor = 'grabbing';
            startX = e.pageX - carousel.offsetLeft;
            scrollLeft = carousel.scrollLeft;
        });

        carousel.addEventListener('mouseleave', () => {
            isDown = false;
            carousel.style.cursor = 'grab';
        });

        carousel.addEventListener('mouseup', () => {
            isDown = false;
            carousel.style.cursor = 'grab';
        });

        carousel.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - carousel.offsetLeft;
            const walk = (x - startX); 
            carousel.scrollLeft = scrollLeft - walk;
        });
    }

    enableDragScroll('cyclistsCarousel');
    enableDragScroll('stagesCarousel');
</script>
</body>
</html>