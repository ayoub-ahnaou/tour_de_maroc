<nav class="bg-gray-600 text-white shadow-md sticky top-0 z-10">
    <div class="container mx-auto px-4 flex items-center justify-between h-10">
        <!-- Left Section: Logo -->
        <div class="flex items-center">
            <a href="<?= URL_ROOT . "/"; ?>" class="text-yellow-300 text-lg font-bold flex items-center">Tour de maroc 
            <span class="text-gray-300 ml-2 text-xs"> -> 2025</span></a>
        </div>

        <!-- Right Section: Icons -->
        <div class="flex max-md:hidden items-center space-x-4">
            <!-- login Icon -->
            <a href="<?= URL_ROOT . "/login"; ?>" class="flex items-center gap-2">
                <img src="<?= URL_ROOT; ?>/public/assets/icons/user.svg" class="h-5" alt="">
                <span class="text-xs">Se connecter</span>
            </a>
            <a href="<?= URL_ROOT . "/signup"; ?>" class="flex items-center gap-2">
                <img src="<?= URL_ROOT; ?>/public/assets/icons/user.svg" class="h-5" alt="">
                <span class="text-xs">S'inscrire</span>
            </a>

            <a href="<?= URL_ROOT . "/login"; ?>" class="flex items-center gap-2">
                <img src="<?= URL_ROOT; ?>/public/assets/icons/notification.svg" class="h-5" alt="">
                <!-- <span class="text-xs">Se </span> -->
            </a>
        </div>
    </div>
</nav>