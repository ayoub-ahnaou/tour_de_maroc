<?php
use TourDeMaroc\App\Libraries\Session;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podium - Tour de Maroc</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<?php require_once "./components/header.php"; ?>

    <main class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-8">🏆 Podium - Top 3 Cyclistes</h1>
        
        <div class="flex justify-center items-end space-x-8 mb-8">
            <!-- Second Place -->
            <div class="text-center">
                <?php if (isset($data['podiumData'][1])): ?>
                    <div class="w-32 h-32 mx-auto mb-4">
                        <?php if ($data['podiumData'][1]['photo']): ?>
                            <img src="<?= URL_ROOT ?>/public/assets/images/<?= htmlspecialchars($data['podiumData'][1]['photo']) ?>" 
                                 alt="Second Place" 
                                 class="w-full h-full object-cover rounded-full border-4 border-gray-400 shadow-lg">
                        <?php else: ?>
                            <div class="w-full h-full bg-gray-400 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-4xl text-white">2</span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="bg-gray-400 p-4 rounded-lg shadow-lg text-white" style="height: 150px;">
                        <p class="font-bold"><?= htmlspecialchars($data['podiumData'][1]['nom_utilisateur']) ?></p>
                        <p class="text-sm opacity-90"><?= htmlspecialchars($data['podiumData'][1]['equipe']) ?></p>
                        <p class="text-sm mt-2"><?= htmlspecialchars($data['podiumData'][1]['temps_total']) ?></p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- First Place -->
            <div class="text-center -mt-8">
                <?php if (isset($data['podiumData'][0])): ?>
                    <div class="w-40 h-40 mx-auto mb-4">
                        <?php if ($data['podiumData'][0]['photo']): ?>
                            <img src="<?= URL_ROOT ?>/public/assets/images/<?= htmlspecialchars($data['podiumData'][0]['photo']) ?>" 
                                 alt="First Place" 
                                 class="w-full h-full object-cover rounded-full border-4 border-yellow-300 shadow-lg">
                        <?php else: ?>
                            <div class="w-full h-full bg-yellow-300 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-4xl text-gray-800">1</span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="bg-yellow-300 p-4 rounded-lg shadow-lg" style="height: 200px;">
                        <p class="font-bold text-gray-800"><?= htmlspecialchars($data['podiumData'][0]['nom_utilisateur']) ?></p>
                        <p class="text-sm text-gray-700"><?= htmlspecialchars($data['podiumData'][0]['equipe']) ?></p>
                        <p class="text-sm mt-2 text-gray-700"><?= htmlspecialchars($data['podiumData'][0]['temps_total']) ?></p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Third Place -->
            <div class="text-center">
                <?php if (isset($data['podiumData'][2])): ?>
                    <div class="w-32 h-32 mx-auto mb-4">
                        <?php if ($data['podiumData'][2]['photo']): ?>
                            <img src="<?= URL_ROOT ?>/public/assets/images/<?= htmlspecialchars($data['podiumData'][2]['photo']) ?>" 
                                 alt="Third Place" 
                                 class="w-full h-full object-cover rounded-full border-4 border-orange-600 shadow-lg">
                        <?php else: ?>
                            <div class="w-full h-full bg-orange-600 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-4xl text-white">3</span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="bg-orange-600 p-4 rounded-lg shadow-lg text-white" style="height: 150px;">
                        <p class="font-bold"><?= htmlspecialchars($data['podiumData'][2]['nom_utilisateur']) ?></p>
                        <p class="text-sm opacity-90"><?= htmlspecialchars($data['podiumData'][2]['equipe']) ?></p>
                        <p class="text-sm mt-2"><?= htmlspecialchars($data['podiumData'][2]['temps_total']) ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <?php require_once "./components/footer.php"; ?></body>
</html>