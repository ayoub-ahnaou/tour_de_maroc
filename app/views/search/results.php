<?php require_once "./components/header.php"; ?>
<?php extract($data); ?>

<section class="flex-grow bg-gray-100">
    <div class="container mx-auto px-4 p-4">
        <h1 class="text-2xl">Search Results for: <b>"<?= $query; ?>"</b></h1>
        <!-- Total Distance Header -->
        <div class="">
            <!-- <h2 class="text-lg font-bold text-gray-500">TOTAL : 3 320 KM</h2> -->
        </div>
    </div>

    <?php if (empty($results)) { ?>
        <div class="container mx-auto px-4 pb-4 text-red-500">Aucun resultats a été trouvée</div>
    <?php } ?>

    <div class="h-full w-full bg-white py-6">
        <?php foreach ($results as $result) : ?>
            <?php if ($result["type"] == "etapes") { ?>
                <div class="container mx-auto">
                    <p class="text-2xl font-bold px-4 mb-4">Etapes</p>
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 text-sm uppercase">
                                <th class="px-6 py-4 text-left text-gray-700">ÉTAPE</th>
                                <th class="px-6 py-4 text-left text-gray-700">TYPE</th>
                                <th class="px-6 py-4 text-left text-gray-700">DATE</th>
                                <th class="px-6 py-4 text-left text-gray-700">DÉPART ET ARRIVÉE</th>
                                <th class="px-6 py-4 text-left text-gray-700">DISTANCE</th>
                                <th class="px-6 py-4 text-left text-gray-700">DÉTAILS</th>
                            </tr>
                        </thead>
                        <?php foreach ($result["results"] as $etape) : ?>
                            <tr class="">
                                <td class="px-6 py-4"><?= $etape["ordre"] ?></td>
                                <td class="px-6 py-4">
                                    <span class="flex items-center gap-2">
                                        PLAT
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-600"><?= $etape["date"] ?></td>
                                <td class="px-6 py-4 font-medium"><?= $etape["lieu_de_depart"] ?> > <?= $etape["lieu_d_arrivee"] ?></td>
                                <td class="px-6 py-4"><?= $etape["distance"] ?> KM</td>
                                <td class="px-6 py-4">
                                    <a href="<?= URL_ROOT ?>/etapes/etape/<?= $etape["etape_id"] ?>" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition-colors flex items-center gap-2">
                                        ÉTAPE <?= $etape["ordre"] ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php } ?>
        <?php endforeach; ?>
    </div>

    <div class="h-full w-full bg-white py-6">
        <?php foreach ($results as $result) : ?>
            <?php if ($result["type"] == "cyclistes") { ?>
                <div class="container mx-auto">
                    <p class="text-2xl font-bold px-4 mb-4">Cyclistes</p>
                    <div class="w-full">
                        <?php foreach ($result["results"] as $etape) : ?>
                            <div class="">

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php } ?>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once "./components/footer.php"; ?>