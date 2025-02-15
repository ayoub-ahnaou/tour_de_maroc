<?php require_once "./components/header.php"; ?>
<?php extract($data); ?>
<?php require_once "./components/aside-dashboard.php"; ?>

<!-- Main Content -->
<main class="flex-1 ml-0 lg:ml-64 p-4">
    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">List des Questions</h1>
        <!-- <p class="text-gray-600">Requests comming from users who want be instractor.</p> -->
    </div>

    <div class="bg-white rounded-lg shadow-sm mb-4">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">prenom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">question</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">reponse</th>
                        <!-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th> -->
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach($questions as $question): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-900">#<?= $question["question_id"] ?></td>
                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-900"><?= $question["nom_utilisateur"] ?></td>
                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-900"><?= $question["prenom_utilisateur"] ?></td>
                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-900"><?= $question["contenu"] ?></td>
                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-900"><?= $question["reponse"] ?? "N/A"; ?></td>
                        <!-- <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex gap-2">
                                <a href="<?php echo URL_ROOT . "/dashboard/deleteUser/" . "id"; ?>" class="p-1 hover:text-red-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7L5 7M10 11v6M14 11v6M6 7v12a2 2 0 002 2h8a2 2 0 002-2V7M9 7V5a2 2 0 012-2h2a2 2 0 012 2v2" />
                                    </svg>
                                </a>
                            </div>
                        </td> -->
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php require_once "./components/footer.php"; ?>