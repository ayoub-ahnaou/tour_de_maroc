<?php require_once "./components/header.php"; ?>
<?php extract($data); ?>

<div class="p-6">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Nouvelle Etape</h2>
        </div>

        <form class="p-6" action="" method="post">
            <div id="categoriesContainer">
                <div class="category-item mb-6 bg-white rounded-lg">
                    <div class="gap-4 flex flex-col text-sm">

                        <div class="flex flex-col">
                            <label class="text-gray-500" for="ordre">Ordre d'etape</label>
                            <input value="<?= $ordre ?>" type="number" name="ordre" id="ordre" placeholder="entrer l'ordre d'etape" class="bg-gray-100 rounded-sm p-1">
                            <label class="text-red-600"><?= $ordre_err ?></label>
                        </div>

                        <div class="flex w-full gap-2">
                            <div class="flex flex-col w-1/2">
                                <label class="text-gray-500" for="lieu_depart">Lieu de depart</label>
                                <input value="<?= $lieu_depart ?>" type="text" name="lieu_depart" id="lieu_depart" placeholder="entrer le lieu de depart" class="bg-gray-100 rounded-sm p-1">
                                <label class="text-red-600"><?= $lieu_depart_err ?></label>
                            </div>
                            <div class="flex flex-col w-1/2">
                                <label class="text-gray-500" for="lieu_arrive">Lieu d'arrive</label>
                                <input value="<?= $lieu_arrive ?>" type="text" name="lieu_arrive" id="lieu_arrive" placeholder="entrer le lieu d'arrive" class="bg-gray-100 rounded-sm p-1">
                                <label class="text-red-600"><?= $lieu_arrive_err ?></label>
                            </div>
                        </div>

                        <div class="flex w-full gap-2">
                            <div class="flex flex-col w-1/2">
                                <label class="text-gray-500" for="distance">Distance</label>
                                <input value="<?= $distance ?>" type="number" name="distance" id="distance" placeholder="entrer la distance" class="bg-gray-100 rounded-sm p-1">
                                <label class="text-red-600"><?= $distance_err ?></label>
                            </div>
                            <div class="flex flex-col w-1/2">
                                <label class="text-gray-500" for="difficulte">Difficulte</label>
                                <input value="<?= $difficulte ?>" type="text" name="difficulte" id="difficulte" placeholder="choisis la difficulte" class="bg-gray-100 rounded-sm p-1">
                                <label class="text-red-600"><?= $difficulte_err ?></label>
                            </div>
                        </div>

                        <div class="flex w-full gap-2">
                            <div class="flex flex-col w-1/2">
                                <label class="text-gray-500" for="date">Date</label>
                                <input value="<?= $date ?>" type="date" name="date" id="date" placeholder="entrer la date d'etape" class="bg-gray-100 rounded-sm p-1">
                                <label class="text-red-600"><?= $date_err ?></label>
                            </div>
                            <div class="flex flex-col w-1/2">
                                <label class="text-gray-500" for="duree">Durée</label>
                                <input value="<?= $duree ?>" type="text" name="duree" id="duree" placeholder="entrer la durée d'etape en minute" class="bg-gray-100 rounded-sm p-1">
                                <label class="text-red-600"><?= $duree_err ?></label>
                            </div>
                        </div>
                        
                        <div class="flex flex-col">
                            <label class="text-gray-500" for="categorie">Categorie</label>
                            <select name="categorie" id="categorie" class="w-full bg-gray-100 rounded-sm p-1">
                                <option value="" selected disabled>Choisi un categorie</option>
                                <?php foreach($categories as $categorie) : ?>
                                    <option value="<?= $categorie->getId() ?>" name="categorie"><?= $categorie->getNom(); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label class="text-red-600"><?= $categorie_err ?></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center mt-6">
                <button
                    type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    Enregistrer Etape
                </button>
            </div>
        </form>
    </div>
</div>

<?php require_once "./components/footer.php"; ?>