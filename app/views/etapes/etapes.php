<?php require_once "./components/header.php"; ?>

<section class="py-8 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">
        <h1 class="text-2xl">PARCOURS 2025</h1>
        <!-- Total Distance Header -->
        <div class="mb-6">
            <h2 class="text-lg font-bold text-gray-500">TOTAL : 3 320 KM</h2>
        </div>

        <!-- Download Button -->
        <!-- <div class="mb-8">
            <button class="bg-black text-white px-6 py-3 rounded flex items-center gap-2 hover:bg-gray-800 transition-colors">
                <span>TÉLÉCHARGER LE PARCOURS 2025</span>
                <span class="text-yellow-400">(PDF | 4895kB)</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div> -->

        <!-- Stages Table -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
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
                <tbody class="divide-y divide-gray-200">
                    <!-- Stage 1 -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4">
                            <span class="flex items-center gap-2">
                                <!-- <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 3v14M3 10h14" />
                                </svg> -->
                                PLAT
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">SAM. 05/07/2025</td>
                        <td class="px-6 py-4 font-medium">LILLE MÉTROPOLE > LILLE MÉTROPOLE</td>
                        <td class="px-6 py-4">185 KM</td>
                        <td class="px-6 py-4">
                            <button class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition-colors flex items-center gap-2">
                                ÉTAPE 1
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Stage 2 -->
                    <?php for($i=1; $i<=10; $i++) { ?>
                    <tr class="bg-gray-50 hover:bg-gray-100">
                        <td class="px-6 py-4">2</td>
                        <td class="px-6 py-4">
                            <span class="flex items-center gap-2">
                                <!-- <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M4 10l6-6 6 6M4 14l6-6 6 6" />
                                </svg> -->
                                ACCIDENTÉE
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">DIM. 06/07/2025</td>
                        <td class="px-6 py-4 font-medium">LAUWIN-PLANQUE > BOULOGNE-SUR-MER</td>
                        <td class="px-6 py-4">212 KM</td>
                        <td class="px-6 py-4">
                            <a href="<?= URL_ROOT ?>/etapes/etape/<?= $i; ?>" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition-colors flex items-center gap-2">
                                ÉTAPE 2
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    <!-- Additional stages would follow the same pattern -->
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php require_once "./components/footer.php"; ?>