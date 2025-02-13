<aside class="fixed left-0 top-14 h-full w-64 bg-white shadow-sm overflow-y-auto lg:block hidden" id="sidebar">
    <nav class="py-2">
        <ul class="text-xs">
            <li>
                <a href="<?= URL_ROOT ?>/dashboard/overview" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Visualisation des données
                </a>
            </li>
            <li>
                <a href="<?= URL_ROOT ?>/dashboard/fans" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Fans
                </a>
            </li>
            <li>
                <a href="<?= URL_ROOT ?>/dashboard/cyclistes" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="6.5" cy="17.5" r="3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <circle cx="17.5" cy="17.5" r="3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5a2 2 0 11-4 0 2 2 0 014 0zM10.5 15l2.5-4-4-2.5m4 2.5l1 3m-1 3h-3.5l-3-5m8.5 2.5h3" />
                    </svg>
                    Cyclistes
                </a>
            </li>
            <li>
                <a href="<?= URL_ROOT ?>/dashboard/etapes" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16M8 6v12M16 6v12" />
                    </svg>
                    Etapes
                </a>
            </li>
            <li>
                <a href="<?= URL_ROOT ?>/dashboard/commentaires" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h8M8 14h6M21 12c0 4.418-4.03 8-9 8a9.45 9.45 0 01-4-.84L3 21l1.506-4.52A7.998 7.998 0 013 12C3 7.582 7.03 4 12 4s9 3.582 9 8z" />
                    </svg>
                    Commentaires
                </a>
            </li>
            <li>
                <a href="<?= URL_ROOT ?>/dashboard/badges" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM4 8v12a2 2 0 002 2h12a2 2 0 002-2V8M16 4h-8a2 2 0 00-2 2v2h12V6a2 2 0 00-2-2z" />
                    </svg>
                    Badges
                </a>
            </li>
            <li>
                <a href="<?= URL_ROOT ?>/dashboard/questions" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10a4 4 0 118 0c0 1.5-1 2.5-2 3s-1 1-1 3M12 18h.01" />
                    </svg>
                    Questions
                </a>
            </li>
            <li>
                <a href="<?= URL_ROOT ?>/dashboard/categories" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Categories
                </a>
            </li>
            <li>
                <a href="<?= URL_ROOT ?>/dashboard/signaux" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.29 3.86L2.82 18a2 2 0 001.71 3h14.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0zM12 9v4M12 17h.01" />
                    </svg>
                    Signaux
                </a>
            </li>
        </ul>
    </nav>
</aside>