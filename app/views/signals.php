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
               
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <div class="bg-white shadow-sm">
                <div class="px-8 py-4">
                    <h1 class="text-2xl font-bold">Soumettre une réclamation</h1>
                </div>
            </div>

            <!-- Complaint Form -->
            <div class="p-8">
                <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
                    <form action="" method="POST" class="p-6 space-y-6">
                        <!-- Sujet de la réclamation -->
                     

                        <!-- Étape concernée -->
                       

                        <!-- Commentaire -->
                        <div>
                            <label for="commentaire" class="block text-sm font-medium text-gray-700 mb-2">
                                Votre réclamation
                            </label>
                            <textarea id="commentaire" name="sujet" rows="6" required
                                class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                                placeholder="Décrivez votre réclamation en détail..."></textarea>
                        </div>

                        <!-- Boutons -->
                        <div class="flex justify-end space-x-4">
                            <button type="reset" class="px-6 py-2 border rounded-md text-gray-700 hover:bg-gray-100">
                                Annuler
                            </button>
                            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                Envoyer la réclamation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>