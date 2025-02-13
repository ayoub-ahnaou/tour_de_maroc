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

    <div class="h-full w-full bg-white py-6">
        <div class="container mx-auto">

            <?php foreach ($results as $etape) : ?>
                <?php var_dump($etape); ?>
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
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once "./components/footer.php"; ?>