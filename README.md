# tour_de_maroc
Plateforme digitale pour le "Tour de Maroc", permettant aux fans de suivre les étapes, aux cyclistes de partager leurs parcours, et aux organisateurs de gérer l'événement efficacement.

### Structure de projet
``` 
tour_de_maroc/
    app/
        controllers/
        models/
        views/
        librairies/
        helpers/
        .htaccess
    config/
        config.php
    database/
        postgres.sql
    diagramms/
        class_diagram.jpg
        usecase_diagram.jpg
    public/
        assets/
            images/
        css/
        components/
            header.twig
            footer.twig
            ...
        index.php
        .htaccess
    .gitignore
    .../
```

### Planification
- creation des diagrammes UML.
    - diagramme de cas d'utilisation.
    - diagramme de classe.

- Conception de la base de donnée.
    - creation des tableuax.
    - creation de script postgreSQL.

- creation de la presentation Canva.

- creation du structure de projet.
    - creation la classe Core pour le routage.
    - configurer l'environement de travail (tailwindcss).
    - configurer et installer le composer.
    - configuration de fichier .htaccess dans les dossiers nécessaire.
    - creation de class Controller pour l'extender dans les autres controllers.

- creation d'un middleware pour controller les previlliges d'utilisateurs.

- authentification (frontend et backend).
    - implementer le login.
    - implementer l'inscription d'un fan.
    - implementer l'inscription d'un cycliste.

- implementation de l'envoie du mails.
    - renitialiser le mot de passe d'un utilisateur.

- acceuille (frontend et backend).
    - visualisation d'etapes de course (information detaillées).
    - profile des cyclistes.
    - classement general des cyclistes.
    - barre de recherche avancée.
    - l'historique du tour de maroc (videos et artivles).

- implementation des notifications.
    - recoie des notification sur les etapes preferées.

- ajout des cyclistes dans une equipe virtuelle (following concept).

- implementation des commentaires par utilisateurs.
    - ajout un commmentaire sur une etape.
    - suppression d'un commentaire par son utilisateur.
    - modification de commentaire par utilisateur.

- implementation du badges et interaction utilisateur.
    - ajouter ou supprimer un like sur une etape.
    - soutenir un cycliste.
    - gagner des badges selon un logic precis.

- creation du page 'etapes du course'.
    - visualisation de tous les etapes.
    - systeme de filtrage des etapes selon (region, diificulte, date).
    - signaler un probleme sur une etape de course.

- creation d'une page pour afficher un podium des cyclistes (les trois premiers cyclistes).

- gestionnaire de profile.
    - acceder au profile d'utilisateur.
    - acceder au historique de mes courses pour les cyclistes utilisateurs.
    - ajouter des photos et des performance pour les cyclistes.
    - afficher un analyse detailées pour un cycliste utilisateur (vitesse moyene par etape, comparaison entre autres cyclistes, points, classement...).

- gestaionnaire des categories.
    - ajouter un categorie (montange, plaine, terrain...).
    - modifier un categorie.
    - supprimer un categorie.

- gestionnaire des etapes.
    - ajouter une etape avec un categorie, defis(meilleur sprinteur, quick course...).

- gestionnaire des commentaires par administrateur.
    - accepter les commentaires ajoutée par l'administrateur.
    - supprimer commentaires.

- gestionnaire des contenus.
    - supprimer une etape.

- statistiques pour l'administrateur.
    - nombre de visiteurs.
    - interactions sur le site.
    - cyclistes les plus suivis.
    - les plus interactifs fans (plus de commentaires, likes et suivis ...).

- page details d'un cycliste.
    - afficher les details de cycliste (image profile, informations personneles).
    - classemenet general et plus de details.