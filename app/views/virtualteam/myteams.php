<?php require APP_ROOT . '/public/components/header.php'; ?>

<div class="flex-grow container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">My Virtual Teams</h1>
        <a href="<?php echo URL_ROOT; ?>/virtualteam/create" 
           class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg text-sm flex items-center gap-2 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Create New Team
        </a>
    </div>

    <?php if (empty($data['virtualTeams'])) : ?>
        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <p class="text-gray-600 text-lg mb-2">No Virtual Teams Yet</p>
            <p class="text-gray-400 text-sm mb-6">Create your first virtual team to start managing cyclists!</p>
            <a href="<?php echo URL_ROOT; ?>/virtualteam/create" 
               class="inline-flex items-center text-yellow-400 hover:text-yellow-500 font-medium gap-2">
                <span>Create Your First Team</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    <?php else : ?>
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($data['virtualTeams'] as $team) : ?>
                <a href="<?php echo URL_ROOT; ?>/virtualteam/detail/<?php echo $team['virtual_team_id']; ?>" 
                   class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow p-6 block">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">
                                <?php echo htmlspecialchars($team['team_name']); ?>
                            </h3>
                            <p class="text-sm text-gray-500">Managed by <?php echo htmlspecialchars($data['username']); ?></p>
                        </div>
                        <div class="text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php require APP_ROOT . '/public/components/footer.php'; ?>