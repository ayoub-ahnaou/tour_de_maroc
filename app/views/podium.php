<?php require_once "./components/header.php"; ?>

<header class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-white py-6 shadow-lg">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">Podium - Tour de Maroc 2025</h1>
    </div>
</header>

<main class="container mx-auto px-4 py-12">
    <div class="flex justify-center items-end space-x-8 mb-12">
        <!-- Second Place -->
        <div class="text-center">
            <?php if (isset($data['podiumData'][1])): ?>
                <div class="relative">
                    <img class="w-32 h-32 object-cover rounded-full border-4 border-gray-300 shadow-lg" 
                         src="<?php echo $data['podiumData'][1]['photo'] ? $data['podiumData'][1]['photo'] : URL_ROOT . '/public/assets/images/default-avatar.jpg'; ?>" 
                         alt="Second Place">
                    <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center text-white font-bold shadow">2</div>
                </div>
                <div class="bg-white mt-4 p-6 rounded-xl shadow-lg" style="height: 150px;">
                    <h3 class="font-bold text-xl text-gray-800"><?php echo htmlspecialchars($data['podiumData'][1]['nom_utilisateur']); ?></h3>
                    <p class="text-gray-600"><?php echo htmlspecialchars($data['podiumData'][1]['equipe']); ?></p>
                    <p class="text-sm text-gray-500 mt-2">Temps total: <?php echo htmlspecialchars($data['podiumData'][1]['temps_total']); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <!-- First Place -->
        <div class="text-center -mt-12">
            <?php if (isset($data['podiumData'][0])): ?>
                <div class="relative">
                    <img class="w-40 h-40 object-cover rounded-full border-4 border-yellow-400 shadow-lg" 
                         src="<?php echo $data['podiumData'][0]['photo'] ? $data['podiumData'][0]['photo'] : URL_ROOT . '/public/assets/images/default-avatar.jpg'; ?>" 
                         alt="First Place">
                    <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center text-white font-bold shadow">1</div>
                </div>
                <div class="bg-white mt-4 p-6 rounded-xl shadow-lg" style="height: 170px;">
                    <h3 class="font-bold text-2xl text-gray-800"><?php echo htmlspecialchars($data['podiumData'][0]['nom_utilisateur']); ?></h3>
                    <p class="text-gray-600"><?php echo htmlspecialchars($data['podiumData'][0]['equipe']); ?></p>
                    <p class="text-sm text-gray-500 mt-2">Temps total: <?php echo htmlspecialchars($data['podiumData'][0]['temps_total']); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Third Place -->
        <div class="text-center">
            <?php if (isset($data['podiumData'][2])): ?>
                <div class="relative">
                    <img class="w-32 h-32 object-cover rounded-full border-4 border-orange-500 shadow-lg" 
                         src="<?php echo $data['podiumData'][2]['photo'] ? $data['podiumData'][2]['photo'] : URL_ROOT . '/public/assets/images/default-avatar.jpg'; ?>" 
                         alt="Third Place">
                    <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold shadow">3</div>
                </div>
                <div class="bg-white mt-4 p-6 rounded-xl shadow-lg" style="height: 150px;">
                    <h3 class="font-bold text-xl text-gray-800"><?php echo htmlspecialchars($data['podiumData'][2]['nom_utilisateur']); ?></h3>
                    <p class="text-gray-600"><?php echo htmlspecialchars($data['podiumData'][2]['equipe']); ?></p>
                    <p class="text-sm text-gray-500 mt-2">Temps total: <?php echo htmlspecialchars($data['podiumData'][2]['temps_total']); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php require_once "./components/footer.php"; ?>