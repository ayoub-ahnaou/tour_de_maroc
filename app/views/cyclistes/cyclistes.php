<?php
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
                    <img src="/api/placeholder/40/40" alt="Profile" class="w-10 h-10 rounded-full">
                    <div>
                        <p class="text-sm font-semibold"><?= $_SESSION['nom_utilisateur'] ?></p>
                        <p class="text-xs text-gray-400">Fan</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="mt-6">
            <a href="<?= URL_ROOT  ."/Fan/index" ?>" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Profile
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
                    <h1 class="text-2xl font-bold">Cyclistes</h1>
                </div>
            </div>

            <!-- Cyclists Cards -->
            <div class="p-8 space-y-6">

            <?php extract($data); ?>
            <?php foreach($cyclistesList as $cycliste): ?>


                <!-- Cyclist 3 -->
                <div  class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6">
                        <a href="">
                        <div class="flex items-center space-x-6">
                            <div class="flex-shrink-0">
                                <img src="/api/placeholder/80/80" alt="Remco EVENEPOEL" class="w-20 h-20 rounded-full object-cover">
                            </div>
                            <div class="flex-1">
                                <div class="space-y-1">
                                    <h2 class="text-2xl font-bold"><?php echo htmlspecialchars($cycliste->getNomUtilisateur())?></h2>
                                    <p class="text-gray-600">Soudal Quick-Step</p>
                                    <div class="flex items-center space-x-4">
                                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">
                                            Belgique
                                        </span>
                                        <span class="text-sm text-gray-500">23 ans</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-shrink-0 text-right">
                                <div class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 rounded-full">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                    3ème au classement
                                </div>
                            </div>
                        </div>
                        </a>
                     </div>
            </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
</body>
</html>