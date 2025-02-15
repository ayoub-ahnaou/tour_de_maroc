<?php require_once "./components/header.php"; ?>
<?php extract($data); ?>

<div class="container mx-auto p-4 flex-grow">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-xl font-bold">CLASSEMENT 2025 À L'ISSUE DE L'ÉTAPE <?= $etape->getOrdre(); ?></h1>
        <div class="flex items-center gap-4">
            <?php if ($etape->getOrdre() > 1) : ?>
                <a href="<?= URL_ROOT ?>/classements/etape/<?= $etape->getOrdre() - 1; ?>" class="rounded-full p-2 border">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
            <?php endif; ?>
            <span class="font-bold">ÉTAPE <?= $etape->getOrdre(); ?></span>
            <span class="text-gray-500"><?= $etape->getDate(); ?> | <?= $etape->getLieuDeDepart(); ?> › <?= $etape->getLieuDArrivee(); ?></span>

            <?php if ($maxEtapes["max"] > $etape->getOrdre()) : ?>
                <a href="<?= URL_ROOT ?>/classements/etape/<?= $etape->getOrdre() + 1; ?>" class="rounded-full p-2 border">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Navigation -->
    <div class="flex justify-between mb-8">
        <div class="flex gap-6">
            <a href="<?= URL_ROOT ?>/classements/general" class="text-gray-500">CLASSEMENT GÉNÉRAL</a>
            <button class="font-bold pb-2 border-b-2 border-yellow-400">CLASSEMENT DE L'ÉTAPE</button>
        </div>
    </div>

    <!-- Distance info -->
    <div class="flex justify-between items-center mb-6">
        <span class="text-gray-500">Distance totale parcourue : <?= intval($etape->getDistance()); ?> km</span>
    </div>

    <!-- Results table -->
    <div class="w-full">
        <div class="grid grid-cols-6 text-gray-500 text-sm pb-2 border-b">
            <div>Rang</div>
            <div>Cycliste</div>
            <div>Nationalite</div>
            <div>Équipe</div>
            <div>Temps</div>
            <div>Diffirence</div>
        </div>

        <!-- Results rows -->
        <div class="divide-y">
            <!-- Row 1 -->
            <div class="grid grid-cols-6 py-4 bg-green-100">
                <div class="flex items-center">
                    <span class="w-8 h-8 flex items-center justify-center bg-gray-200 text-black font-bold">1</span>
                </div>
                <div class="flex items-center gap-2">
                    <img src="https://img.aso.fr/core_app/img-cycling-tdf-png/71/56045/0:0,400:400-300-0-70/56f65" alt="SI" class="w-6">
                    <span>T. POGACAR</span>
                </div>
                <div>France</div>
                <div>UAE TEAM EMIRATES</div>
                <div>83h 30' 56"</div>
                <div class="text-yellow-600">-</div>
            </div>

            <!-- Row 2 -->
            <div class="grid grid-cols-6 py-4 bg-white">
                <div class="flex items-center">
                    <span class="w-8 h-8 flex items-center justify-center bg-gray-200 text-black font-bold">2</span>
                </div>
                <div class="flex items-center gap-2">
                    <img src="https://img.aso.fr/core_app/img-cycling-tdf-png/1/56074/0:0,400:400-300-0-70/8b05c" alt="DK" class="w-6">
                    <span>J. VINGEGAARD</span>
                </div>
                <div>Belgique</div>
                <div>TEAM VISMA | LEASE A BIKE</div>
                <div>83h 45' 15"</div>
                <div class="text-yellow-600">+00h 06' 19"</div>
            </div>

            <!-- Row 3 -->
            <div class="grid grid-cols-6 py-4">
                <div class="flex items-center">
                    <span class="w-8 h-8 flex items-center justify-center bg-gray-200 text-black font-bold">3</span>
                </div>
                <div class="flex items-center gap-2">
                    <img src="https://img.aso.fr/core_app/img-cycling-tdf-png/11/56077/0:0,400:400-300-0-70/47a4b" alt="BE" class="w-6">
                    <span>R. EVENEPOEL</span>
                </div>
                <div>Saudi Arabia</div>
                <div>SOUDAL QUICK-STEP</div>
                <div>83h 48' 14"</div>
                <div class="text-yellow-600">+00h 09' 18"</div>
            </div>

            <!-- Additional rows... -->
        </div>
    </div>
</div>

<?php require_once "./components/footer.php"; ?>