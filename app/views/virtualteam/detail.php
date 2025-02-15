<?php require APP_ROOT . '/views/includes/header.php'; ?>

<div class="container mx-auto px-4 py-8">
   
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="<?php echo URL_ROOT; ?>/virtualteam" 
                   class="inline-flex items-center justify-center p-2 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h1 class="text-3xl font-bold text-gray-900">
                    <?php echo htmlspecialchars($data['team']->team_name); ?>
                </h1>
            </div>
            <div class="text-sm text-gray-500">
                Créé le <?php echo date('d/m/Y', strtotime($data['team']->created_at)); ?>
            </div>
        </div>
    </div>

    <!-- Flash Messages -->
    <?php flash('virtual_team_message'); ?>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Left Column - Team Members -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-gray-900">Membres de l'équipe</h2>
                    <span class="px-3 py-1 text-sm font-medium text-yellow-800 bg-yellow-100 rounded-full">
                        <?php echo count($data['cyclists']); ?> cyclistes
                    </span>
                </div>

                <?php if (empty($data['cyclists'])) : ?>
                    <div class="text-center py-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p class="mt-4 text-gray-500">Aucun cycliste dans cette équipe</p>
                        <p class="text-sm text-gray-400">Ajoutez des cyclistes pour commencer</p>
                    </div>
                <?php else : ?>
                    <div class="space-y-3">
                        <?php foreach ($data['cyclists'] as $cyclist) : ?>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0">
                                        <?php if (!empty($cyclist->photo)) : ?>
                                            <img class="h-10 w-10 rounded-full" src="<?php echo URL_ROOT; ?>/img/cyclists/<?php echo htmlspecialchars($cyclist->photo); ?>" alt="">
                                        <?php else : ?>
                                            <div class="h-10 w-10 rounded-full bg-yellow-200 flex items-center justify-center">
                                                <span class="text-yellow-700 font-medium text-sm">
                                                    <?php echo strtoupper(substr($cyclist->prenom_utilisateur, 0, 1)); ?>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">
                                            <?php echo htmlspecialchars($cyclist->prenom_utilisateur . ' ' . $cyclist->nom_utilisateur); ?>
                                        </div>
                                        <?php if (!empty($cyclist->nationalite)) : ?>
                                            <div class="text-sm text-gray-500">
                                                <?php echo htmlspecialchars($cyclist->nationalite); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if ($data['team']->fan_id === $_SESSION['user_id']) : ?>
                                    <form action="<?php echo URL_ROOT; ?>/virtualteam/removeCyclist" method="POST" class="flex-shrink-0">
                                        <input type="hidden" name="cyclist_id" value="<?php echo $cyclist->utilisateur_id; ?>">
                                        <input type="hidden" name="team_id" value="<?php echo $data['team']->virtual_team_id; ?>">
                                        <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Right Column - Add Cyclist Form -->
        <?php if ($data['team']->fan_id === $_SESSION['user_id']) : ?>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6">Ajouter un cycliste</h2>
                    <form action="<?php echo URL_ROOT; ?>/virtualteam/addCyclist" method="POST">
                        <input type="hidden" name="virtual_team_id" value="<?php echo $data['team']->virtual_team_id; ?>">
                        
                        <div class="space-y-4">
                            <div>
                                <label for="cyclist_name" class="block text-sm font-medium text-gray-700">Nom du cycliste</label>
                                <div class="relative mt-1">
                                    <input type="text" 
                                           id="cyclist_name" 
                                           name="cyclist_name" 
                                           class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500" 
                                           placeholder="Commencez à taper un nom..."
                                           required
                                           autocomplete="off">
                                    <div id="searchResults" class="absolute z-10 w-full mt-1 bg-white rounded-lg shadow-lg border border-gray-200 hidden"></div>
                                </div>
                            </div>

                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                Ajouter à l'équipe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('cyclist_name');
    const searchResults = document.getElementById('searchResults');
    let debounceTimer;

    searchInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        const searchTerm = this.value.trim();

        if (searchTerm.length < 2) {
            searchResults.classList.add('hidden');
            return;
        }

        debounceTimer = setTimeout(() => {
            fetch(`<?php echo URL_ROOT; ?>/virtualteam/searchCyclists/${searchTerm}`)
                .then(response => response.json())
                .then(data => {
                    searchResults.innerHTML = '';
                    
                    if (data.length > 0) {
                        data.forEach(cyclist => {
                            const div = document.createElement('div');
                            div.className = 'p-3 hover:bg-gray-50 cursor-pointer border-b last:border-b-0';
                            div.innerHTML = `
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0">
                                        <div class="h-8 w-8 rounded-full bg-yellow-200 flex items-center justify-center">
                                            <span class="text-yellow-700 font-medium text-sm">
                                                ${cyclist.prenom_utilisateur.charAt(0)}
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">
                                            ${cyclist.prenom_utilisateur} ${cyclist.nom_utilisateur}
                                        </div>
                                    </div>
                                </div>
                            `;
                            div.onclick = () => {
                                searchInput.value = cyclist.nom_utilisateur;
                                searchResults.classList.add('hidden');
                            };
                            searchResults.appendChild(div);
                        });
                        searchResults.classList.remove('hidden');
                    } else {
                        const div = document.createElement('div');
                        div.className = 'p-3 text-sm text-gray-500';
                        div.textContent = 'Aucun cycliste trouvé';
                        searchResults.appendChild(div);
                        searchResults.classList.remove('hidden');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    searchResults.classList.add('hidden');
                });
        }, 300);
    });

    
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.classList.add('hidden');
        }
    });
});
</script>

<?php require APP_ROOT . '/views/includes/footer.php'; ?>