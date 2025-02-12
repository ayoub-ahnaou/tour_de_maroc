<?php require_once "./components/header.php"; ?>
<div class="w-full">
    <img src="<?= URL_ROOT ?>/public/assets/images/d8b28.jfif" class="w-full object-cover" alt="">
</div>

<!-- videos et classement general -->
<div class="bg-gray-50">
    <div class="flex max-lg:flex-col w-full ">
        <div class="container mx-auto px-4 py-8 w-4/6">
            <!-- Header Section -->
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-xl font-bold">VIDÉOS À LA UNE</h2>
                <a href="#" class="text-gray-600 hover:text-gray-400 text-sm">VOIR TOUT ></a>
            </div>
    
            <!-- Featured Videos Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12 text-sm">
                <!-- Video Card 1 -->
                <div class="relative overflow-hidden shadow-lg">
                    <img src="https://img.aso.fr/core_app/img-cycling-tdf-jpg/video/61595/7:0,1912:1080-457-0-90/4c91d" alt="Parcours Officiel" class="w-full h-48 object-cover">
                    <div class="absolute bottom-0 left-0 bg-yellow-500 text-black px-3 py-1 m-2 text-sm">#TDF2025</div>
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4">
                        <h3 class="font-bold">LE PARCOURS OFFICIEL</h3>
                    </div>
                </div>
    
                <!-- Video Card 2 -->
                <div class="relative overflow-hidden shadow-lg">
                    <img src="https://img.aso.fr/core_app/img-cycling-tdf-jpg/video/61595/7:0,1912:1080-457-0-90/4c91d" alt="Best of 2024" class="w-full h-48 object-cover">
                    <div class="absolute bottom-0 left-0 bg-yellow-500 text-black px-3 py-1 m-2 text-sm">#TDF2025</div>
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4">
                        <h3 class="font-bold">BEST OF 2024</h3>
                    </div>
                </div>
    
                <!-- Video Card 3 -->
                <div class="relative overflow-hidden shadow-lg">
                    <img src="https://img.aso.fr/core_app/img-cycling-tdf-jpg/video/61595/7:0,1912:1080-457-0-90/4c91d" alt="Le Mont Ventoux" class="w-full h-48 object-cover">
                    <div class="absolute bottom-0 left-0 bg-yellow-500 text-black px-3 py-1 m-2 text-sm">#TDF2025</div>
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4">
                        <h3 class="font-bold">LE MONT VENTOUX</h3>
                    </div>
                </div>
            </div>
    
            <!-- Parcours Section -->
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-xl font-bold">PARCOURS</h2>
                <!-- <h2 class="text-xl font-bold">VIDÉOS À LA UNE</h2> -->
                <a href="#" class="text-gray-600 hover:text-gray-400 text-sm">VOIR TOUT ></a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12 text-sm">
                <!-- Stage 1 -->
                <div class="relative overflow-hidden shadow-lg">
                    <img src="https://img.aso.fr/core_app/img-cycling-tdf-jpg/1/61600/0:0,660:1000-660-0-30/551d9" alt="Étape 1" class="w-full h-80 object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4">
                        <h3 class="text-lg font-bold">ÉTAPE 1 | 05/07</h3>
                        <p>LILLE - ROUBAIX</p>
                    </div>
                </div>
    
                <!-- Stage 2 -->
                <div class="relative overflow-hidden shadow-lg">
                    <img src="https://img.aso.fr/core_app/img-cycling-tdf-jpg/1/61600/0:0,660:1000-660-0-30/551d9" alt="Étape 2" class="w-full h-80 object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4">
                        <h3 class="text-lg font-bold">ÉTAPE 2 | 06/07</h3>
                        <p>LA VILLE BLANCHE</p>
                    </div>
                </div>
    
                <!-- Stage 3 -->
                <div class="relative overflow-hidden shadow-lg">
                    <img src="https://img.aso.fr/core_app/img-cycling-tdf-jpg/1/61600/0:0,660:1000-660-0-30/551d9" alt="Étape 3" class="w-full h-80 object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4">
                        <h3 class="text-lg font-bold">ÉTAPE 3 | 07/07</h3>
                        <p>VALENCIENNES</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rankings Section -->
        <div class="w-2/6 h-auto">
            <div class="bg-white shadow-lg pt-8 pb-4 px-4">
                <h2 class="text-lg font-bold mb-6">CLASSEMENT GÉNÉRAL</h2>
                <div class="space-y-4">
                    <?php for($i=1; $i<=10; $i++) { ?>
                    <!-- Ranking Items -->
                    <div class="grid grid-cols-12 items-center gap-4 hover:bg-gray-50 p-2 text-xs">
                        <div class="col-span-1 font-bold"><?= $i ?></div>
                        <div class="col-span-1">
                            <img src="<?= URL_ROOT ?>/public/assets/icons/flag.svg" >
                        </div>
                        <div class="col-span-4 font-bold">Tadej POGACAR</div>
                        <div class="col-span-4 text-gray-600">UAE TEAM EMIRATES</div>
                        <div class="col-span-2 text-right text-gray-600">83h 38' 56"</div>
                    </div>
                    <?php } ?>
                    <!-- Add more ranking items following the same pattern -->
                </div>
                <a href="#" class="block text-center bg-black text-white py-3 mt-6 hover:bg-gray-800">
                    CLASSEMENT COMPLET
                </a>
            </div>
        </div>
    </div>
</div>
<?php require_once "./components/footer.php"; ?>