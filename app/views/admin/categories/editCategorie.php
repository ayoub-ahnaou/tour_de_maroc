<?php require_once "./components/header.php"; ?>
<?php extract($data); ?>

<div class="p-6">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Modifier Categorie</h2>
        </div>

        <form class="p-6" action="" method="post" enctype="multipart/form-data">
            <div id="categoriesContainer">
                <div class="category-item mb-6 bg-white rounded-lg">
                    <div class="gap-4 flex flex-col text-sm">

                        <div class="flex flex-col">
                            <label class="text-gray-500" for="category_name">Category name </label>
                            <input value="<?= $category_name ?>" type="text" name="category_name" id="category_name" placeholder="enter the category name" class="bg-gray-100 rounded-sm p-1">
                            <label class="text-red-600"><?= $category_name_err ?></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center mt-6">
                <button
                    type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    Enregistrer Categorie
                </button>
            </div>
        </form>
    </div>
</div>

<?php require_once "./components/footer.php"; ?>