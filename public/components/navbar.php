<?php
require_once '../config/config.php';
require_once '../app/models/NotificationModel.php';


//session_start();

$db = new \PDO("pgsql:host=" . HOST_NAME . ";dbname=" . DATABASE_NAME, USER_NAME, PASSWORD);

$notifications = [];
if (isset($_SESSION['user_id'])) {
    $notificationModel = new NotificationModel($db);
    $notifications = $notificationModel->getNotificationsByUser($_SESSION['user_id']);
}

?>

<nav class="bg-gray-600 text-white shadow-md sticky top-0 z-10">
    <div class="container mx-auto px-4 flex items-center justify-between h-16">
        <!-- Left Section: Logo -->
        <div class="flex items-center">
            <a href="<?= URL_ROOT . "/"; ?>" class="text-yellow-300 text-lg font-bold flex items-center">Tour de Maroc 
            <span class="text-gray-300 ml-2 text-xs"> -> 2025</span></a>
        </div>

        <!-- Right Section: Icons -->
        <div class="flex max-md:hidden items-center space-x-4 relative">
            <!-- Login Icon -->
            <a href="<?= URL_ROOT . "/login"; ?>" class="flex items-center gap-2">
                <img src="<?= URL_ROOT; ?>/public/assets/icons/user.svg" class="h-5" alt="">
                <span class="text-xs">Se connecter</span>
            </a>

            <!-- Notification Icon -->
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="relative">
                    <button id="notificationButton" class="flex items-center gap-2 focus:outline-none">
                        <img src="<?= URL_ROOT; ?>/public/assets/icons/notification.svg" class="h-5" alt="">
                        <?php if (!empty($notifications)): ?>
                            <span class="bg-red-500 rounded-full w-4 h-4 text-xs text-white flex items-center justify-center ml-[-8px]"><?= count($notifications); ?></span>
                        <?php endif; ?>
                    </button>

                    <!-- Dropdown Notifications Box -->
                    <div id="notificationsDropdown" class="hidden absolute right-0 mt-2 w-64 bg-gray-700 rounded-md shadow-lg py-2 text-white z-50 max-h-96 overflow-y-auto">
                        <?php if (!empty($notifications)): ?>
                            <?php foreach ($notifications as $notification): ?>
                                <div class="px-4 py-2 border-b border-gray-600 cursor-pointer hover:bg-gray-600">
                                    <p class="font-semibold text-sm"><?= htmlspecialchars($notification['contenu']); ?></p>
                                    <?php if ($notification['etape_id']): ?>
                                        <p class="text-xs text-gray-400">Étape ID: <?= htmlspecialchars($notification['etape_id']); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="px-4 py-2 text-center">No notifications available.</div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- JavaScript for Notification Dropdown -->
<script>
    const notificationButton = document.getElementById('notificationButton');
    const notificationsDropdown = document.getElementById('notificationsDropdown');

    notificationButton.addEventListener('click', () => {
        notificationsDropdown.classList.toggle('hidden');
    });

    // Close the dropdown if clicking outside
    document.addEventListener('click', (event) => {
        if (!notificationButton.contains(event.target) && !notificationsDropdown.contains(event.target)) {
            notificationsDropdown.classList.add('hidden');
        }
    });
</script>