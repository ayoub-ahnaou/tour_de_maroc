<?php require_once "./components/header.php"; ?>

<?php require_once "./components/aside-dashboard.php"; ?>

    <!-- Main Content -->
    <main class="flex-1 ml-0 lg:ml-64 p-4">
        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Liste des Commentaires</h1>
        </div>

        <div class="bg-white rounded-lg shadow-sm mb-4">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Author ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Author Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Etap ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-900">#<?= "author_id"; ?></td>
                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-900"><?= "author_name"; ?></td>
                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-900 <?php echo ("status" === "pending") ? "text-yellow-500" : (("status" === "approved") ? "text-green-500" : "text-red-500"); ?>">
                            <?= "status"; ?>
                        </td>
                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-900"><?= "etap_id"; ?></td>
                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex gap-2">
                                <!-- Accept Comment -->
                                <a href="<?php echo URL_ROOT . "/dashboard/acceptComment/" . "comment_id"; ?>" class="p-1 hover:text-green-600" title="Accept Comment">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </a>

                                <!-- Delete Comment -->
                                <a href="<?php echo URL_ROOT . "/dashboard/deleteComment/" . "comment_id"; ?>" class="p-1 hover:text-red-600" title="Delete Comment">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-14 0M10 11v6M14 11v6M6 7v12a2 2 0 002 2h8a2 2 0 002-2V7M9 7V5a2 2 0 012-2h2a2 2 0 012 2v2"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

<?php require_once "./components/footer.php"; ?>