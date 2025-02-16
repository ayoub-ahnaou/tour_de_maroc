<?php

use TourDeMaroc\App\Models\SoutienModel;

require_once "./components/header.php"; ?>
<?php extract($data); ?>

<?php $isCyclisteSoutainedByFan = (new SoutienModel())->isCyclisteSoutainedByFan(1, 2); ?>

<header class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-white py-6 shadow-lg">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">Tour de France 2025</h1>
    </div>
</header>

<main class="container mx-auto px-4 py-12">

    <div class="bg-white rounded-xl shadow-2xl overflow-hidden mb-12 relative">

        <div class="md:flex">
            <div class="md:flex-shrink-0 relative">
                <img class="h-96 w-full object-cover md:w-96" src="<?php echo $data['photo']?>" alt="Tadej Pogačar">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent text-white p-6">
                    <h2 class="text-4xl font-bold leading-t ight"><?php echo $data['name']?></h2>
                    <p class="text-xl mt-2"><?php $data['name']?></p>
                </div>
            </div>
            <div class="p-8 md:p-12 flex flex-col justify-between">
                <div>
                    <div class="inline-block px-3 py-1 bg-yellow-400 text-black text-sm font-semibold rounded-full mb-4">
                        Cycliste Professionnel
                    </div>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        Tadej Pogačar est un phénomène du cyclisme moderne, connu pour ses victoires spectaculaires et sa polyvalence exceptionnelle sur tous les terrains.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-4 text-center">

                    <div class="bg-gray-100 rounded-lg p-4">
                        <p class="text-4xl font-bold text-yellow-500"><?php echo $data['birth_date']?></p>
                        <p class="text-gray-600">La date de naicance</p>
                    </div>

                    <div class="bg-gray-100 rounded-lg p-4">
                        <p class="text-4xl font-bold text-yellow-500"><?php echo $data['height']?></p>
                        <p class="text-gray-600">Taille</p>
                    </div>
                    <div class="bg-gray-100 rounded-lg p-4">
                        <p class="text-4xl font-bold text-yellow-500"><?php echo $data['weight']?></p>
                        <p class="text-gray-600">Poids</p>
                    </div>
                    <div class="bg-gray-100 rounded-lg p-4">
                        <p class="text-4xl font-bold text-yellow-500"><?php echo $data['nationality']?></p>
                        <p class="text-gray-600">Nationalité</p>
                    </div>
                </div>
            </div>
        </div>

        <?php if (!$isCyclisteSoutainedByFan): ?>
            <div class="bg-black h-8 text-white px-6 flex justify-end pt-1">
                <a href="<?= URL_ROOT ?>/cyclistes/soutenir/1/2" class="cursor-pointer">Soutenir cyclist <span class="bg-yellow-300 text-black px-1 text-xs rounded-full">+1</span></a>
            </div>
        <?php else: ?>
            <div class="bg-black h-8 text-white px-6 flex justify-end pt-1">
                <p class="cursor-pointer">Vous avez soutené ce cycliste <span class="bg-yellow-300 text-black px-1 text-xs rounded-full">✔</span></p>
            </div>
        <?php endif; ?>
    </div>

    <div class="grid md:grid-cols-2 gap-8 mb-12">
        <section class="bg-white rounded-xl shadow-lg p-8">
            <h3 class="text-2xl font-bold mb-6 text-gray-800">Performances Récentes</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <span class="text-gray-700 font-semibold">Tour de France 2024</span>
                    <span class="px-4 py-2 bg-yellow-400 text-black font-bold rounded-full">1er</span>
                </div>
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <span class="text-gray-700 font-semibold">Giro d'Italia 2024</span>
                    <span class="px-4 py-2 bg-gray-200 text-black font-bold rounded-full">2ème</span>
                </div>
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <span class="text-gray-700 font-semibold">Vuelta a España 2023</span>
                    <span class="px-4 py-2 bg-yellow-400 text-black font-bold rounded-full">1er</span>
                </div>
            </div>
        </section>

        <section class="bg-white rounded-xl shadow-lg p-8">
            <h3 class="text-2xl font-bold mb-6 text-gray-800">Palmarès</h3>
            <ul class="space-y-3 text-gray-700">
                <li class="flex items-center">
                    <svg class="w-6 h-6 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Vainqueur du Tour de France 2023, 2024
                </li>
                <li class="flex items-center">
                    <svg class="w-6 h-6 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Vainqueur du Giro d'Italia 2022
                </li>
                <li class="flex items-center">
                    <svg class="w-6 h-6 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Vainqueur de la Vuelta a España 2023
                </li>
                <li class="flex items-center">
                    <svg class="w-6 h-6 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Champion de Slovénie sur route 2022, 2023
                </li>
            </ul>
        </section>
    </div>

    <section class="bg-white rounded-xl shadow-lg p-8 mb-12">
        <h3 class="text-2xl font-bold mb-6 text-gray-800">Biographie</h3>
        <p class="text-gray-700 leading-relaxed mb-6">
            Tadej Pogačar, né le 21 septembre 1998 à Komenda, en Slovénie, est rapidement devenu l'un des cyclistes les plus prometteurs de sa génération. Dès son plus jeune âge, il a montré un talent exceptionnel pour le cyclisme, remportant de nombreuses courses juniors.
        </p>
        <p class="text-gray-700 leading-relaxed mb-6">
            Sa carrière professionnelle a débuté en 2019 avec l'équipe UAE Team Emirates. Dès sa première saison, il a fait sensation en remportant trois étapes du Tour d'Espagne et en terminant troisième au classement général.
        </p>
        <p class="text-gray-700 leading-relaxed">
            Mais c'est en 2020 que Pogačar a vraiment marqué l'histoire du cyclisme en remportant le Tour de France à seulement 21 ans, devenant ainsi le deuxième plus jeune vainqueur de l'épreuve. Il a confirmé sa domination en remportant à nouveau le Tour en 2021 et 2022.
        </p>
    </section>

    <section class="bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-xl shadow-lg p-8">
        <h3 class="text-2xl font-bold mb-6 text-white">Statistiques de Carrière</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div class="bg-white rounded-lg p-4">
                <p class="text-3xl font-bold text-yellow-500">158</p>
                <p class="text-gray-600">Victoires</p>
            </div>
            <div class="bg-white rounded-lg p-4">
                <p class="text-3xl font-bold text-yellow-500">3</p>
                <p class="text-gray-600">Grands Tours</p>
            </div>
            <div class="bg-white rounded-lg p-4">
                <p class="text-3xl font-bold text-yellow-500">12</p>
                <p class="text-gray-600">Victoires d'étapes TDF</p>
            </div>
            <div class="bg-white rounded-lg p-4">
                <p class="text-3xl font-bold text-yellow-500">5</p>
                <p class="text-gray-600">Classements par points</p>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 p-8 rounded-xl mt-8 flex flex-col gap-2">
        <h1 class="text-xl">Poser une question à Richard Morphy</h1>
        <form action="<?= URL_ROOT ?>/questions/ask/1/2" method="post" class="mt-4">
            <input type="text" name="question" id="question" value="" placeholder="Ecrit votre question ici..." class="bg-white w-full p-2">
            <button class="bg-black text-white px-4 mt-2 text-sm">Envoyer</button>
        </form>
        <hr class="text-gray-400">
        <div class="flex flex-col gap-4">
            <div class="flex flex-col">
                <span class="text-gray-600 font-bold">Question</span>
                <?php foreach ($questions as $question) : ?>
                    <div class="flex flex-col my-2 bg-white p-2 shadow-md">
                        <span class="text">
                            <span class="pr-1"><?= $question["prenom_utilisateur"] ?> <?= $question["nom_utilisateur"] ?></span>
                            -
                            <span class="pl-1 text-xs"><?= $question["email"]; ?></span>
                        </span>
                        <p class="text-sm text-gray-600"><?= $question["contenu"] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- <?php if (sizeof($reponses) > 0) : ?>
                <?php foreach ($reponses as $reponse): ?>
                    <div class="bg-white p-4 flex flex-col">
                        <span class="text-blue-700"><?= $reponse["prenom_utilisateur"] ?> <?= $reponse["nom_utilisateur"] ?></span>
                        <p class="text-sm text-gray-600"><?= $reponse["reponse"] ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-gray-500 text-sm p-2 bg-white w-full">Aucune reponse pour l'instant</div>
            <?php endif; ?> -->
        </div>
    </section>
</main>

<?php require_once "./components/footer.php"; ?>

