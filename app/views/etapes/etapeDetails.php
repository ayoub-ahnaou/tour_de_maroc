<?php

use TourDeMaroc\App\Models\LikeModel;

require_once "./components/header.php";

extract($data);
$isEtapeLiked = (new LikeModel())->isEtapeLiked($etape->getId(), 1);
?>

<section class="py-8 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">
        <!-- Stage Header -->
        <div class="bg-black text-white p-6 rounded-t-xl">
            <div class="flex justify-between items-center">
                <div>
                    <span class="text-yellow-400 text-sm">ÉTAPE <?= $etape->getOrdre(); ?></span>
                    <h1 class="text-xl font-bold mt-1"><?= $etape->getLieuDeDepart(); ?> > <?= $etape->getLieuDarrivee(); ?></h1>
                </div>
                <div class="text-right">
                    <span class="text-yellow-400 text-sm">Date</span>
                    <p class="text-lg font-bold"><?= $etape->getDate(); ?></p>
                </div>
            </div>
        </div>

        <!-- Stage Image -->
        <div class="bg-white p-6 shadow-lg relative">
            <?php if (!$isEtapeLiked) : ?>
                <a href="<?= URL_ROOT ?>/like/like/<?= $etape->getId(); ?>" class="cursor-pointer absolute top-8 right-8">
                    <img src="<?= URL_ROOT ?>/public/assets/icons/heart.svg" alt="" class="size-6">
                </a>
            <?php elseif ($isEtapeLiked) : ?>
                <div class="absolute top-8 right-8">
                    <img src="<?= URL_ROOT ?>/public/assets/icons/heart-fill.svg" alt="" class="size-6">
                </div>
            <?php endif; ?>
            <img
                src="https://coffective.com/wp-content/uploads/2018/06/default-featured-image.png.jpg"
                alt="Stage 1 Map"
                class="w-full h-[400px] object-cover rounded-lg mb-8">

            <!-- Key Information Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Distance -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-gray-500 text-sm mb-2">DISTANCE</h3>
                    <p class="text-3xl font-bold text-black"><?= intval($etape->getDistance()); ?> KM</p>
                </div>
                <!-- Type -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-gray-500 text-sm mb-2">TYPE D'ÉTAPE</h3>
                    <div class="flex items-center gap-2">
                        <svg class="h-6 w-6 text-yellow-400" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2L2 12h3v8h6v-6h2v6h6v-8h3L12 2z" />
                        </svg>
                        <p class="text-xl font-bold text-black"><?= $etape->getCategorie(); ?></p>
                    </div>
                </div>
                <!-- Difficulty -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-gray-500 text-sm mb-2">DIFFICULTÉ</h3>
                    <div class="flex gap-1">
                        <p><?= $etape->getDifficulte(); ?></p>
                    </div>
                </div>
            </div>

            <!-- Detailed Information -->
            <div class="grid gap-8">
                <!-- Left Column -->
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-bold mb-4">Informations de Départ</h3>
                        <div class="space-y-3">
                            <p class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Ville de départ</span>
                                <span class="font-medium"><?= $etape->getLieuDeDepart(); ?></span>
                            </p>
                            <p class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Ville d'arrivee</span>
                                <span class="font-medium"><?= $etape->getLieuDarrivee(); ?></span>
                            </p>
                            <p class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Heure de départ</span>
                                <span class="font-medium">7:00 AM</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Download Section -->
            <div class="mt-8 p-6 bg-gray-50 rounded-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-bold">Etapes</h3>
                        <p class="text-gray-600">Basculer vers l'etape suivante</p>
                    </div>
                    <div class="flex gap-4">
                        <button class="flex items-center gap-2 px-4 py-2 bg-black text-white rounded hover:bg-gray-800 transition-colors">
                            Etape suivante
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Comment Section -->
    <div class="mt-12 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Commentaires</h2>

        <!-- Static Comments -->
        <div id="comments-container" class="space-y-4 mb-6">
            <div class="p-4 border rounded bg-gray-50">
                <p class="text-lg font-medium">Jean Dupont</p>
                <p class="text-gray-700">Superbe étape ! J'ai hâte de la voir en direct.</p>
                <span class="text-sm text-gray-500">05 Juillet 2025 - 14:30</span>
            </div>
            <div class="p-4 border rounded bg-gray-50">
                <p class="text-lg font-medium">Sophie Martin</p>
                <p class="text-gray-700">Le parcours a l'air incroyable. Bonne chance aux coureurs !</p>
                <span class="text-sm text-gray-500">05 Juillet 2025 - 15:00</span>
            </div>
            <div class="p-4 border rounded bg-gray-50">
                <p class="text-lg font-medium">Paul Leclerc</p>
                <p class="text-gray-700">J’espère que la météo sera au rendez-vous !</p>
                <span class="text-sm text-gray-500">05 Juillet 2025 - 15:45</span>
            </div>
        </div>

        <!-- Static Comment Form (Non-functional) -->
        <form class="space-y-4">
            <div>
                <label for="name" class="block text-gray-700 font-medium">Nom</label>
                <input type="text" id="name" name="name" required class="w-full p-2 border rounded">
            </div>
            <div>
                <label for="comment" class="block text-gray-700 font-medium">Commentaire</label>
                <textarea id="comment" name="comment" rows="4" required class="w-full p-2 border rounded"></textarea>
            </div>
            <button type="submit" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800 transition-colors">
                Ajouter un commentaire
            </button>
        </form>
    </div>
    <!-- END OF COMMENT SECTION -->

<?php require_once "./components/footer.php"; ?>