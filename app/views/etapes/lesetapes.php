
            <?php
require_once "./components/header.php";
 extract($data); ?>

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
                    <h1 class="text-2xl font-bold">Étapes</h1>
                </div>
            </div>


<!-- ------------------------------------------------------ -->
<?php

?>

<form action="" method="POST" class="bg-white border-b p-4">
    <div class="grid grid-cols-2 gap-4">
        <!-- Sélection de la région -->
        <div>
            <label for="region" class="text-sm font-medium text-gray-700">Région:</label>
            <select name="region" id="region" class="form-select border rounded px-2 py-1 w-full">
    <option value="">Toutes les régions</option>
    <?php if (isset($etapesList) && is_array($etapesList)): ?>
        <?php foreach ($etapesList as $etape): ?>
            <option value="<?php echo htmlspecialchars($etape->getRegion()); ?>" 
                <?php echo (isset($_POST['region']) && $_POST['region'] === $etape->getRegion()) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($etape->getRegion()); ?>
            </option>
        <?php endforeach; ?>
    <?php endif; ?>
</select>
        </div>
        
        <!-- Sélection de la difficulté -->
        <div>
            <label for="difficulte" class="text-sm font-medium text-gray-700">Difficulté:</label>
            <select name="difficulte" id="difficulte" class="form-select border rounded px-2 py-1 w-full">
    <option value="">Toutes les difficultés</option>
    <?php if (isset($etapesList) && is_array($etapesList)): ?>
        <?php foreach ($etapesList as $etape): ?>
            <option value="<?php echo htmlspecialchars($etape->getDifficulte()); ?>" 
                <?php echo (isset($_POST['difficulte']) && $_POST['difficulte'] === $etape->getDifficulte()) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($etape->getDifficulte()); ?>
            </option>
        <?php endforeach; ?>
    <?php endif; ?>
</select>
        </div>
    </div>

    <!-- Bouton de soumission -->
    <div class="mt-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filtrer</button>
    </div>
</form>



    <!-- ------------------------------------------------------  -->

            <!-- Stages Cards -->
            <div class="p-8 space-y-6">
                
            <?php foreach($etapesList as $etape): ?>
                
                    

                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6">
                    <a href="<?= URL_ROOT . "/Etapes/etape/"  . $etape->getId();  ?> ">
                        
                        <div class="flex items-center space-x-6">
                         
                            <div class="flex-1">
                                <div class="space-y-1">
                                    <h2 class="text-2xl font-bold"><?php echo htmlspecialchars($etape->getLieuDeDepart()) ?> → <?php echo htmlspecialchars($etape->getLieuDarrivee()) ?></h2>
                                    <p class="text-gray-600"><?php echo htmlspecialchars($etape->getRegion()) ?></p>
                                    <div class="flex items-center space-x-4">
                                        <!-- <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">
                                            Plaine
                                        </span> -->
                                        <span class="text-sm text-gray-500"><?php echo htmlspecialchars($etape->getDistance()) ?> km</span>
                                        <span class="text-sm text-gray-500"><?php echo htmlspecialchars($etape->getDate()) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-shrink-0 text-right">
                                <div class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 rounded-full">
                                <?php echo htmlspecialchars($etape->getDifficulte()) ?>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- Étape 2 -->
            </div>
        </div>
    </div>
</body>
</html>