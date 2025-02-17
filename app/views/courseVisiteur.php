<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour de Maroc 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
        .modal {
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        .modal.active {
            opacity: 1;
            visibility: visible;
        }
        .modal-content {
            transform: translateY(-20px);
            transition: all 0.3s ease;
        }
        .modal.active .modal-content {
            transform: translateY(0);
        }
    
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Navbar -->
    <nav class="bg-black shadow-lg">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <a href="#" class="text-3xl font-bold text-yellow-500">TDM</a>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-white hover:text-yellow-500 transition duration-300">Accueil</a>
                    <a href="#" class="text-white hover:text-yellow-500 transition duration-300">Parcours</a>
                    <a href="#" class="text-white hover:text-yellow-500 transition duration-300">Équipes</a>
                    <a href="#" class="bg-yellow-500 text-black px-6 py-2 rounded-full hover:bg-yellow-400 transition duration-300 font-semibold">S'inscrire</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative bg-black text-white py-32">
        <div class="container mx-auto px-6 text-center relative z-10">
            <h1 class="text-7xl font-bold mb-4 leading-tight animate-pulse">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 to-yellow-600">
                    Tour De Maroc
                </span>
            </h1>
            <p class="text-4xl font-light mb-8">Édition 2025</p>
            <div class="flex justify-center items-center space-x-6 mb-12">
                <div class="h-1 w-24 bg-yellow-500"></div>
                <span class="text-2xl text-yellow-500 font-semibold">L'aventure commence</span>
                <div class="h-1 w-24 bg-yellow-500"></div>
            </div>
          
        </div>
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <img 
            src="https://img.aso.fr/core_app/img-cycling-tdf-jpg/1/61600/0:0,660:1000-660-0-30/551d9"
            class="absolute inset-0 w-full h-full object-cover"
            alt="Tour background"
        >
    </section>

    <!-- Categories Section -->

</head>
<body class="bg-gray-100">
<section class="container mx-auto p-6">
    <h2 class="text-5xl font-bold text-center mb-16">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-800">
            Catégories Tour de Maroc
        </span>
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php extract($data); ?>
        <?php foreach($categoriesList as $categorie): ?>
        <a href="<?= URL_ROOT ."/Etapes/show/" . $categorie->getId(); ?>" class="relative group cursor-pointer">
 <div class="group">


 <div class="absolute inset-0 bg-blue-600 rounded-xl opacity-75 group-hover:opacity-70 transition-opacity duration-300"></div>
                <div class="relative bg-white rounded-xl overflow-hidden">
                    <div class="h-40 bg-gradient-to-br from-blue-500 to-blue-700 flex items-end">
                        <img src="/api/placeholder/400/320" alt="Cycliste espoir" class="w-full h-full object-cover mix-blend-overlay opacity-75">
                    </div>
                    <div class="p-6">
                        <h3 class="text-3xl font-bold text-blue-900 mb-3"><?= htmlspecialchars($categorie->getNom()) ?></h3>
                        <div class="flex justify-between text-sm text-gray-600">
                            <div>
                                <p class="font-semibold">PARTICIPANTS</p>
                                <p class="text-2xl font-bold text-blue-600">60</p>
                            </div>
                            <div>
                                <p class="font-semibold">ÉTAPES</p>
                                <p class="text-2xl font-bold text-blue-600">4</p>
                            </div>
                        </div>
                    </div>
                </div>


        </div>        
        </a>
        <?php endforeach; ?>
    </div>
 
</section>
<!-- Modal -->
<div id="modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 px-4">
        <div class="modal-content bg-white rounded-xl max-w-3xl w-full max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-white border-b border-gray-200 p-6 flex justify-between items-center">
                <h3 id="modalTitle" class="text-2xl font-bold text-blue-900">bdjh</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="modalContent" class="p-6"></div>
        </div>
    </div>
    <!-- Modal -->
<div id="modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 px-4">
    <div class="modal-content bg-white rounded-xl max-w-3xl w-full max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-white border-b border-gray-200 p-6 flex justify-between items-center">
            <h3 id="modalTitle" class="text-2xl font-bold text-blue-900"></h3>
            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">×</button>
        </div>
        <div id="modalContent" class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6"></div>
    </div>
</div>


<!-- ////////////////////footer -->
    <footer class="bg-black text-white py-12">
        <div class="container mx-auto px-6 text-center">
            <p class="text-xl">&copy; 2025 Tour De Maroc. Tous droits réservés.</p>
            <div class="mt-4 flex justify-center space-x-6">
                <a href="#" class="text-gray-400 hover:text-yellow-500">Facebook</a>
                <a href="#" class="text-gray-400 hover:text-yellow-500">Twitter</a>
                <a href="#" class="text-gray-400 hover:text-yellow-500">Instagram</a>
            </div>
        </div>
    </footer>
    <!-- --------------------------- -->

    <script>
function openModal(categoryId, categoryName, etapes) {
    const modal = document.getElementById('modal');
    const modalTitle = document.getElementById('modalTitle');
    const modalContent = document.getElementById('modalContent');

    modalTitle.textContent = `Étapes - ${categoryName}`;
    
    let contentHTML = '';
    etapes.forEach(etape => {
        contentHTML += `
            <div class="bg-white rounded-2xl overflow-hidden shadow-xl transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <div class="bg-gradient-to-r from-yellow-400 to-yellow-600 p-6">
                    <h2 class="text-3xl font-bold text-white">Étape: ${etape.lieuDeDepart} - ${etape.lieuDarrivee}</h2>
                </div>
                <div class="p-8">
                    <ul class="space-y-4 mb-6">
                        <li class="flex justify-between text-lg">
                            <span class="font-semibold">Distance:</span>
                            <span class="text-yellow-500 font-bold">${etape.distance} km</span>
                        </li>
                        <li class="flex justify-between text-lg">
                            <span class="font-semibold">Date:</span>
                            <span class="text-yellow-500 font-bold">${new Date(etape.date).toLocaleDateString()}</span>
                        </li>
                        <li class="flex justify-between text-lg">
                            <span class="font-semibold">Région:</span>
                            <span class="text-yellow-500 font-bold">${etape.region}</span>
                        </li>
                        <li class="flex justify-between text-lg">
                            <span class="font-semibold">Difficulté:</span>
                            <span class="text-yellow-500 font-bold">${etape.difficulte}</span>
                        </li>
                    </ul>
                </div>
            </div>
        `;
    });

    modalContent.innerHTML = contentHTML;
    modal.classList.add('active');
}

function closeModal() {
    document.getElementById('modal').classList.remove('active');
}
</script>
</body>
</html>












