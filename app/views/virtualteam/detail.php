<?php require APP_ROOT . '/public/components/header.php'; ?>

<div class="flex-grow container mx-auto px-4 py-8">
    <!-- Header with back button -->
    <div class="flex items-center gap-4 mb-8">
        <a href="<?php echo URL_ROOT; ?>/virtualteam/myteams" 
           class="bg-gray-100 hover:bg-gray-200 text-gray-600 p-2 rounded-lg transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-gray-800">
            <?php echo htmlspecialchars($data['virtualTeam']->team_name); ?>
        </h1>
    </div>

    <!-- Flash Messages -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <?php 
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <?php 
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
        </div>
    <?php endif; ?>

    <!-- Grid Container -->
    <div class="grid gap-6 md:grid-cols-2">
        <!-- Cyclists List Section -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-800">Cyclistes de l'équipe</h2>
                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">
                    <?php echo count($data['cyclists']); ?> cyclistes
                </span>
            </div>

            <?php if (empty($data['cyclists'])) : ?>
                <div class="text-center py-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <p class="text-gray-500">Aucun cycliste dans cette équipe.</p>
                </div>
            <?php else : ?>
                <div class="space-y-2">
                    <?php foreach ($data['cyclists'] as $cyclist) : ?>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="bg-gray-200 p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="font-medium text-gray-700">
                                    <?php echo htmlspecialchars($cyclist->nom_utilisateur); ?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Add Cyclist Form Section -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Ajouter un Cycliste</h2>
            <form action="<?php echo URL_ROOT; ?>/virtualteam/addCyclist" method="POST" class="space-y-4">
                <input type="hidden" name="virtual_team_id" value="<?php echo $data['virtualTeam']->virtual_team_id; ?>">
                
                <div>
                    <label for="cyclist_name" class="block text-sm font-medium text-gray-700 mb-1">
                        Nom du Cycliste
                    </label>
                    <div class="relative">
                        <input type="text" 
                               id="cyclist_name" 
                               name="cyclist_name" 
                               required
                               autocomplete="off"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-shadow"
                               placeholder="Rechercher un cycliste...">
                        <div id="searchResults" class="absolute w-full bg-white mt-1 rounded-lg shadow-lg border border-gray-200 hidden"></div>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">
                        Commencez à taper le nom d'un cycliste pour le rechercher
                    </p>
                </div>

                <button type="submit" 
                        class="w-full bg-yellow-400 hover:bg-yellow-500 text-white font-medium py-2 px-4 rounded-lg transition-colors flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Ajouter à l'Équipe
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Add this before the closing body tag -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('cyclist_name');
    const searchResults = document.getElementById('searchResults');
    let debounceTimeout;

    searchInput.addEventListener('input', function() {
        clearTimeout(debounceTimeout);
        
        if (this.value.length < 2) {
            searchResults.innerHTML = '';
            searchResults.classList.add('hidden');
            return;
        }

        debounceTimeout = setTimeout(() => {
            fetch(`${URL_ROOT}/virtualteam/searchCyclists/${this.value}`)
                .then(response => response.json())
                .then(data => {
                    searchResults.innerHTML = '';
                    searchResults.classList.remove('hidden');

                    if (data.length === 0) {
                        searchResults.innerHTML = '<div class="p-3 text-gray-500">Aucun cycliste trouvé</div>';
                        return;
                    }

                    data.forEach(cyclist => {
                        const div = document.createElement('div');
                        div.className = 'p-3 hover:bg-gray-100 cursor-pointer';
                        div.textContent = `${cyclist.prenom_utilisateur} ${cyclist.nom_utilisateur}`;
                        div.addEventListener('click', () => {
                            searchInput.value = cyclist.nom_utilisateur;
                            searchResults.classList.add('hidden');
                        });
                        searchResults.appendChild(div);
                    });
                });
        }, 300);
    });

    // Hide results when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.classList.add('hidden');
        }
    });
});
</script>

<?php require APP_ROOT . '/public/components/footer.php'; ?>