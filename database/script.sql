-- Course Table
CREATE TABLE Course (
    course_id SERIAL PRIMARY KEY,
    edition VARCHAR(255) NOT NULL
);

-- Categorie Table
CREATE TABLE Categorie (
    categorie_id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL
);

-- Etape Table
CREATE TABLE Etape (
    etape_id SERIAL PRIMARY KEY,
    lieu_de_depart VARCHAR(255) NOT NULL,
    lieu_d_arrivee VARCHAR(255) NOT NULL,
    distance DECIMAL(10, 2) NOT NULL CHECK (distance > 0),
    date DATE NOT NULL,    
    region VARCHAR(255),
    difficulte VARCHAR(50),
    course_id INT NOT NULL REFERENCES Course(course_id) ON DELETE CASCADE,
    categorie_id INT NOT NULL REFERENCES Categorie(categorie_id) ON DELETE CASCADE
);

ALTER TABLE Etape ADD COLUMN ordre INTEGER UNIQUE; -- e.g: etape 1, etape 2, etape 3, ...

-- Base Utilisateur Table
CREATE TABLE Utilisateur (
    utilisateur_id SERIAL PRIMARY KEY,
    nom_utilisateur VARCHAR(255) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    role VARCHAR(50) NOT NULL
);

-- Child tables inheriting from Utilisateur
CREATE TABLE Administrateur (
) INHERITS (Utilisateur);

CREATE TABLE Fan (
) INHERITS (Utilisateur);

CREATE TABLE Cycliste (
    equipe VARCHAR(255),
    date_de_naissance DATE,
    nationalite VARCHAR(255),
    taille DECIMAL(5, 2),
    photo VARCHAR(255),
    poids DECIMAL(5, 2)
) INHERITS (Utilisateur);

-- Base Publication Table
CREATE TABLE Publication (
    publication_id SERIAL PRIMARY KEY,
    auteur_id INT NOT NULL REFERENCES Utilisateur(utilisateur_id) ON DELETE CASCADE,
    contenu TEXT NOT NULL
);

-- Child tables inheriting from Publication
CREATE TABLE PublicationVideo (
    video VARCHAR(255) NOT NULL
) INHERITS (Publication);

CREATE TABLE PublicationArticle (
    article TEXT NOT NULL
) INHERITS (Publication);

-- Notification Table
CREATE TABLE Notification (
    notification_id SERIAL PRIMARY KEY,
    contenu TEXT NOT NULL,
    destinataire_id INT NOT NULL REFERENCES Utilisateur(utilisateur_id) ON DELETE CASCADE,
    etape_id INT REFERENCES Etape(etape_id) ON DELETE SET NULL
);

-- Commentaire Table
CREATE TABLE Commentaire (
    commentaire_id SERIAL PRIMARY KEY,
    auteur_id INT NOT NULL REFERENCES Utilisateur(utilisateur_id) ON DELETE CASCADE,
    etape_id INT NOT NULL REFERENCES Etape(etape_id) ON DELETE CASCADE
);

-- Question Table
CREATE TABLE Question (
    question_id SERIAL PRIMARY KEY,
    auteur_id INT NOT NULL REFERENCES Utilisateur(utilisateur_id) ON DELETE CASCADE,
    cycliste_id INT NOT NULL REFERENCES Utilisateur(utilisateur_id) ON DELETE CASCADE,
    contenu TEXT NOT NULL,
    reponse TEXT
);

-- Like Table
CREATE TABLE J_aime (
    like_id SERIAL PRIMARY KEY,
    etape_id INT NOT NULL REFERENCES Etape(etape_id) ON DELETE CASCADE,
    auteur_id INT NOT NULL REFERENCES Utilisateur(utilisateur_id) ON DELETE CASCADE
);

-- Soutien Table
CREATE TABLE Soutien (
    soutien_id SERIAL PRIMARY KEY,
    fan_id INT NOT NULL REFERENCES Utilisateur(utilisateur_id) ON DELETE CASCADE,
    cycliste_id INT NOT NULL REFERENCES Utilisateur(utilisateur_id) ON DELETE CASCADE
);

-- Badge Table
CREATE TABLE Badge (
    badge_id SERIAL PRIMARY KEY,
    nom_badge VARCHAR(255) NOT NULL
);

-- Fan_Badge Table
CREATE TABLE Fan_Badge (
    fan_badge_id SERIAL PRIMARY KEY,
    fan_id INT NOT NULL REFERENCES Utilisateur(utilisateur_id) ON DELETE CASCADE,
    badge_id INT NOT NULL REFERENCES Badge(badge_id) ON DELETE CASCADE
);

-- Signalement Table
CREATE TABLE Signalement (
    signalement_id SERIAL PRIMARY KEY,
    contenu TEXT NOT NULL,
    utilisateur_id INT NOT NULL REFERENCES Utilisateur(utilisateur_id) ON DELETE CASCADE
);

-- Historique Table
CREATE TABLE Historique (
    historique_id SERIAL PRIMARY KEY,
    nom_course VARCHAR(255) NOT NULL,
    classement INT NOT NULL,
    temps_total INTERVAL NOT NULL,
    distance_totale DECIMAL(10, 2) NOT NULL CHECK (distance_totale > 0)
);

-- Cycliste_Etape Table
CREATE TABLE Cycliste_Etape (
    cycliste_etape_id SERIAL PRIMARY KEY,
    cycliste_id INT NOT NULL REFERENCES Utilisateur(utilisateur_id) ON DELETE CASCADE,
    etape_id INT NOT NULL REFERENCES Etape(etape_id) ON DELETE CASCADE,
    temps INTERVAL NOT NULL
);
ALTER TABLE Course
ADD COLUMN categorie_id INT NOT NULL;

ALTER TABLE Course
ADD CONSTRAINT fk_categorie
FOREIGN KEY (categorie_id) REFERENCES Categorie(categorie_id)
ON DELETE CASCADE;

ALTER TABLE Cycliste DROP COLUMN IF EXISTS equipe;
CREATE TABLE VirtualTeam (
    virtual_team_id SERIAL PRIMARY KEY,
    fan_id INT NOT NULL REFERENCES Utilisateur(utilisateur_id) ON DELETE CASCADE, -- Corrected: References Utilisateur
    team_name VARCHAR(255) NOT NULL
);

CREATE TABLE VirtualTeamCyclist (
    virtual_team_cyclist_id SERIAL PRIMARY KEY,
    virtual_team_id INT NOT NULL REFERENCES VirtualTeam(virtual_team_id) ON DELETE CASCADE,
    cycliste_id INT NOT NULL REFERENCES Utilisateur(utilisateur_id) ON DELETE SET NULL -- Corrected: References Utilisateur
);
ALTER TABLE Commentaire
ADD COLUMN contenu TEXT NOT NULL;

DO $$ 
BEGIN 
    IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname = 'comment_status') THEN
        CREATE TYPE comment_status AS ENUM ('pending', 'approved', 'rejected');
    END IF;
END $$;
ALTER TABLE commentaire
    ALTER COLUMN commentaire_id SET DEFAULT nextval('commentaire_commentaire_id_seq'), -- Ensure auto-increment
    ALTER COLUMN commentaire_id SET NOT NULL,
    ALTER COLUMN auteur_id SET NOT NULL,
    ALTER COLUMN etape_id SET NOT NULL,
    ALTER COLUMN contenu SET NOT NULL,
    ADD COLUMN IF NOT EXISTS status comment_status DEFAULT 'pending',
    ADD COLUMN IF NOT EXISTS created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE utilisateur 
ADD COLUMN prenom_utilisateur VARCHAR(255);
ALTER TABLE course
DROP COLUMN categorie_id;

ALTER TABLE categorie
ADD COLUMN course_id INT ;

ALTER TABLE categorie
ADD CONSTRAINT fk_course
FOREIGN KEY (course_id) REFERENCES course(course_id)
ON DELETE CASCADE;

ALTER TABLE Etape ADD COLUMN ordre INTEGER UNIQUE
alter table etape add column duree interval;