<?php require_once "./components/header.php"; ?>
<?php require_once "./components/aside-dashboard.php"; ?>
<?php extract($data); ?>

<main class="flex-1 ml-0 lg:ml-64 p-4">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Badges</h1>
    </div>

    <div class="bg-white rounded-lg shadow-sm mb-4">
        <form method="post" action="" class="p-4 border-b border-gray-200 flex">
            <input type="text" class="bg-gray-100 w-full px-2" name="badge" id="">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex gap-2 text-xs">
                    <button type="submit" class="py-2 rounded-lg flex items-center gap-2 w-64 bg-black text-white px-4">
                        Ajoutez Nouvelle Badge
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">nom de badge</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($badges as $badge) : ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-900">#<?= $badge->getId(); ?></td>
                            <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-900">badge <?= $badge->getNomBadge(); ?></td>
                            <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex gap-2">
                                    <a href="<?php echo URL_ROOT ?>/badges/editBadge/<?= $badge->getId(); ?>" class="p-1 hover:text-blue-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4h2m4.2 0.8l-9 9a2 2 0 00-.6 1.4v3.8a1 1 0 001 1h3.8a2 2 0 001.4-.6l9-9a2 2 0 000-2.8l-2.8-2.8a2 2 0 00-2.8 0z" />
                                        </svg>
                                    </a>
                                    <a href="<?php echo URL_ROOT ?>/badges/deleteBadge/<?= $badge->getId(); ?>" class="p-1 hover:text-red-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7L5 7M10 11v6M14 11v6M6 7v12a2 2 0 002 2h8a2 2 0 002-2V7M9 7V5a2 2 0 012-2h2a2 2 0 012 2v2" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</main>

<?php require_once "./components/footer.php"; ?>