<?php
use TourDeMaroc\App\Libraries\Session;
?>
<style>
    .carousel {
        -ms-overflow-style: none;  
        scrollbar-width: none;    
    }
    .carousel::-webkit-scrollbar {
        display: none;           
    }
</style>
<nav class="bg-gray-600 text-white shadow-md sticky top-0 z-10">
    <div class="container mx-auto px-4 flex items-center justify-between h-16">
        <div class="flex items-center">
            <a href="<?= URL_ROOT . "/"; ?>" class="text-yellow-300 text-lg font-bold flex items-center">
                Tour de maroc
                <span class="text-gray-300 ml-2 text-xs"> -> 2025</span>
            </a>
        </div>

        <div class="flex max-md:hidden items-center space-x-4 relative">
            <a href="<?= URL_ROOT . "/classements/general"; ?>" class="flex items-center gap-2">
                <span class="text-xs">Classements</span>
            </a>
            
            <a href="<?= URL_ROOT . "/etapes"; ?>" class="flex items-center gap-2">
                <span class="text-xs">Etapes</span>
            </a>

            <a href="<?= URL_ROOT . "/podium"; ?>" class="flex items-center gap-2">
                <span class="text-xs">Podium</span>
            </a>

            <?php if (isset($_SESSION["user_id"])): ?>
                <a href="<?= URL_ROOT . "/profile"; ?>" class="flex items-center gap-2">
                    <span class="text-xs">Profile</span>
                </a>
                <div class="relative">
                    <button id="notificationButton" class="flex items-center gap-2 focus:outline-none">
                        <img src="<?= URL_ROOT; ?>/public/assets/icons/notification.svg" class="h-5" alt="">
                    </button>
                    <div id="notificationsDropdown" class="hidden absolute right-0 mt-2 w-64 bg-gray-700 rounded-md shadow-lg py-2 text-white z-50 max-h-96 overflow-y-auto">
                        <div id="notifications-container">
                        </div>
                    </div>
                </div>
                <a href="<?= URL_ROOT . "/profile"; ?>" class="flex items-center gap-2">
                    <img src="<?= URL_ROOT; ?>/public/assets/icons/user.svg" class="h-5" alt="">
                    <span class="text-xs"><?= htmlspecialchars($session->getUsername() ?? 'User') ?></span>
                </a>
                <a href="<?= URL_ROOT . "/Lougout/logout"; ?>" class="flex items-center gap-2">
                    <img src="<?= URL_ROOT; ?>/public/assets/icons/user.svg" class="h-5" alt="">
                    <span class="text-xs">Se Deconnecter</span>
                </a>
            <?php else: ?>
                <a href="<?= URL_ROOT . "/courseVisiteur"; ?>" class="flex items-center gap-2">
                    <!-- <img src="<?= URL_ROOT; ?>/public/assets/icons/user.svg" class="h-5" alt=""> -->
                    <span class="text-xs">Explorer Plus</span>
                </a>
                <a href="<?= URL_ROOT . "/login"; ?>" class="flex items-center gap-2">
                    <img src="<?= URL_ROOT; ?>/public/assets/icons/user.svg" class="h-5" alt="">
                    <span class="text-xs">Se connecter</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const notificationButton = document.getElementById('notificationButton');
        const notificationsDropdown = document.getElementById('notificationsDropdown');
        const notificationsContainer = document.getElementById('notifications-container');

        function loadNotifications() {
            fetch('<?= URL_ROOT ?>/notifications/get')
                .then(response => response.json())
                .then(data => {
                    if (data.notifications && data.notifications.length > 0) {
                        notificationsContainer.innerHTML = data.notifications
                            .map(notification => `
                            <div class="px-4 py-2 border-b border-gray-600">
                                <p class="text-sm">${notification.contenu}</p>
                                ${notification.etape_id ? 
                                    `<p class="text-xs text-gray-400">
                                        ${notification.lieu_de_depart} - ${notification.lieu_d_arrivee}
                                    </p>` : ''
                                }
                            </div>
                        `).join('');
                    } else {
                        notificationsContainer.innerHTML = `
                        <div class="px-4 py-2 text-center text-gray-400 text-sm">
                            No notifications
                        </div>
                    `;
                    }
                })
                .catch(error => {
                    console.error('Error loading notifications:', error);
                });
        }

        notificationButton?.addEventListener('click', () => {
            notificationsDropdown.classList.toggle('hidden');
            if (!notificationsDropdown.classList.contains('hidden')) {
                loadNotifications();
            }
        });

        document.addEventListener('click', (event) => {
            if (!notificationButton?.contains(event.target) &&
                !notificationsDropdown?.contains(event.target)) {
                notificationsDropdown?.classList.add('hidden');
            }
        });

        if (notificationButton) {
            loadNotifications();
            setInterval(loadNotifications, 60000);
        }
    });

    function subscribeToStage(etapeId) {
        fetch('<?= URL_ROOT ?>/notifications/subscribe', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `etape_id=${etapeId}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Successfully subscribed to stage notifications');
                }
            })
            .catch(error => {
                console.error('Error subscribing to stage:', error);
            });
    }
</script>