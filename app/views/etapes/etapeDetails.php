<?php require_once "./components/header.php"; ?>

<section class="py-8 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">
        <!-- Stage Header -->
        <div class="bg-black text-white p-6 rounded-t-xl">
            <div class="flex justify-between items-center">
                <div>
                    <span class="text-yellow-400 text-sm">ÉTAPE 1</span>
                    <h1 class="text-2xl font-bold mt-1">LILLE MÉTROPOLE > LILLE MÉTROPOLE</h1>
                </div>
                <div class="text-right">
                    <span class="text-yellow-400 text-sm">SAMEDI</span>
                    <p class="text-xl font-bold">05 JUILLET 2025</p>
                </div>
            </div>
        </div>

        <!-- Stage Image -->
        <div class="bg-white p-6 shadow-lg">
            <img
                src="/api/placeholder/1200/400"
                alt="Stage 1 Map"
                class="w-full h-[400px] object-cover rounded-lg mb-8" />

            <!-- Key Information Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Distance -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-gray-500 text-sm mb-2">DISTANCE</h3>
                    <p class="text-3xl font-bold text-black">185 KM</p>
                </div>
                <!-- Type -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-gray-500 text-sm mb-2">TYPE D'ÉTAPE</h3>
                    <div class="flex items-center gap-2">
                        <svg class="h-6 w-6 text-yellow-400" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2L2 12h3v8h6v-6h2v6h6v-8h3L12 2z" />
                        </svg>
                        <p class="text-xl font-bold text-black">PLAT</p>
                    </div>
                </div>
                <!-- Difficulty -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-gray-500 text-sm mb-2">DIFFICULTÉ</h3>
                    <div class="flex gap-1">
                        <div class="w-4 h-4 bg-yellow-400 rounded"></div>
                        <div class="w-4 h-4 bg-gray-300 rounded"></div>
                        <div class="w-4 h-4 bg-gray-300 rounded"></div>
                        <div class="w-4 h-4 bg-gray-300 rounded"></div>
                        <div class="w-4 h-4 bg-gray-300 rounded"></div>
                    </div>
                </div>
            </div>

            <!-- Detailed Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Left Column -->
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-bold mb-4">Informations de Départ</h3>
                        <div class="space-y-3">
                            <p class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Ville de départ</span>
                                <span class="font-medium">LILLE MÉTROPOLE</span>
                            </p>
                            <p class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Heure de départ</span>
                                <span class="font-medium">12:00</span>
                            </p>
                            <p class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Point de rassemblement</span>
                                <span class="font-medium">Place Centrale</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-bold mb-4">Informations d'Arrivée</h3>
                        <div class="space-y-3">
                            <p class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Ville d'arrivée</span>
                                <span class="font-medium">LILLE MÉTROPOLE</span>
                            </p>
                            <p class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Heure d'arrivée estimée</span>
                                <span class="font-medium">16:30</span>
                            </p>
                            <p class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Zone d'arrivée</span>
                                <span class="font-medium">Boulevard Principal</span>
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
<?php require_once "./components/footer.php"; ?>