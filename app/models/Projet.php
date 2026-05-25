<?php

/**
 * =====================================================================
 *  MODÈLE PROJET
 * =====================================================================
 *
 * Pour CHAQUE projet, tu peux régler :
 *   - 'statut' : 'production' (visible, soigné), 'a_completer' (visible avec
 *                badge "à compléter"), 'a_supprimer' (NON affiché)
 *
 * Les champs marqués "[A REMPLIR]" sont des templates : remplace-les par
 * tes vrais contenus avant l'épreuve.
 *
 * Pour ajouter un projet : copie un bloc, change le slug (unique), remplis.
 * Pour supprimer : passe 'statut' à 'a_supprimer' OU supprime le bloc.
 *
 * Plus tard, tu pourras remplacer ce tableau par une vraie requête SQL :
 *   $stmt = db()->query('SELECT * FROM projets ORDER BY ordre');
 *   return $stmt->fetchAll();
 * =====================================================================
 */
class Projet
{
    /** @return array tous les projets (filtrer 'a_supprimer' avant affichage) */
    public static function all(): array
    {
        return [

            // ═══════════════════════════════════════════════════════════
            // PROJETS BTS SIO
            // ═══════════════════════════════════════════════════════════

            [
                'slug'            => 'gsb',
                'statut'          => 'production',
                'titre'           => 'Application GSB — Gestion des frais de services',
                'icon'            => '📊',
                'categorie'       => 'bts',
                'contexte'        => 'BTS SIO SLAM — Lycée Condorcet (Belfort)',
                'duree'           => '2025 - 2026',
                'role'            => 'Développeur full-stack (seul)',
                'description'     => "Application web de gestion des notes de frais pour Galaxy Swiss Bourdin (GSB), entreprise pharmaceutique issue de la fusion de deux groupes. Projet officiel du référentiel BTS SIO SLAM (réalisation professionnelle n°1, épreuve E6).",
                'technos'         => ['PHP 8 POO', 'MySQL 8.0', 'phpMyAdmin', 'HTML5', 'CSS3', 'MVC'],
                'features'        => [
                    "Authentification sécurisée (rôles visiteur / comptable)",
                    "Saisie de fiches mensuelles : frais forfaitisés (repas, nuitées, km) + frais hors forfait avec justificatif",
                    "Workflow complet : saisie → clôture → validation → mise en paiement → remboursement",
                    "Contrôle et validation des fiches par le service comptable (validation, refus, correction)",
                    "Export PDF récapitulatif",
                    "Statistiques : total remboursé, demandes en attente, suivi par visiteur",
                ],
                'competences_bts' => ['B1.4', 'B2.1', 'B2.2', 'B2.3'],
                'livrables'       => [
                    'Code source PHP POO (architecture MVC)',
                    'Modèle conceptuel de données (MCD, MLD)',
                    'Modélisation UML de l\'application',
                    'Maquette des IHM',
                    'Dossier technique BTS SIO 2026 (annexe VII-1-B)',
                ],
                'github'          => 'https://github.com/WolfByteDakito/gsb_frais',
                'dossier'         => 'FR - GSB frais de service - MOTTNER - BTS SIO 2026.docx',
                'comptes_demo'    => [
                    ['login' => 'visiteur@gsb.fr',  'pwd' => 'Visiteur123!',  'role' => 'Visiteur médical — crée et soumet ses fiches de frais'],
                    ['login' => 'comptable@gsb.fr', 'pwd' => 'Comptable123!', 'role' => 'Comptable — valide ou refuse les demandes de remboursement'],
                ],

                'deroulement' => [
                    "Contexte : GSB, issue d'une fusion, doit centraliser la gestion des notes de frais générées par sa force commerciale de visiteurs médicaux répartis sur plusieurs zones. Budget annuel conséquent → besoin d'optimiser le contrôle et de fiabiliser le suivi.",
                    "Étape 1 — Analyse du cahier des charges fourni avec le sujet GSB : identification des rôles utilisateurs (visiteur, comptable), des types de frais (forfaitisés / hors forfait), et du processus de validation.",
                    "Étape 2 — Modélisation des données : MCD (entité-association), passage au MLD, schéma SQL implémenté sous MySQL 8.0 via phpMyAdmin.",
                    "Étape 3 — Modélisation UML de l'application et maquettage des interfaces homme-machine (IHM) : page de connexion, dashboard visiteur, création/édition de fiche, vue récapitulative PDF, dashboard comptable, vues de validation/refus.",
                    "Étape 4 — Mise en place de l'architecture MVC en PHP POO (modèles métier, contrôleurs, vues, routeur).",
                    "Étape 5 — Développement des fonctionnalités : authentification, saisie de fiche mensuelle (frais forfait + hors forfait), suivi des états (saisie en cours, clôturée, validée, mise en paiement, remboursée).",
                    "Étape 6 — Côté comptable : interface de contrôle, validation, refus avec motif, correction si besoin.",
                    "Étape 7 — Exploitation des données : totaux remboursés, demandes en attente, statistiques par utilisateur.",
                    "Étape 8 — Tests fonctionnels avec les comptes de démo, sécurisation (requêtes préparées PDO, échappement HTML), documentation et dépôt sur GitHub.",
                ],
                'difficultes' => [
                    "Bien séparer la logique métier de l'affichage au début (tentation de tout mettre dans la vue).",
                    "Gérer proprement les états successifs d'une fiche de frais (machine à états).",
                    "Sécuriser les accès utilisateurs : sessions PHP, échappement des entrées, autorisations selon le rôle.",
                ],
                'solutions' => [
                    "Refactor strict en classes Modèle / Contrôleur / Vue, application rigoureuse du pattern MVC.",
                    "Définition d'une énumération d'états (saisie, clôturée, validée, en paiement, remboursée) et transitions encadrées côté contrôleur.",
                    "Utilisation systématique de PDO avec requêtes préparées et de htmlspecialchars sur tout affichage.",
                ],
                'bilan' => "Premier projet web d'envergure du référentiel BTS SIO SLAM. M'a permis de mettre en pratique le cycle complet : analyse → modélisation (MCD/MLD/UML) → architecture MVC → développement → tests → documentation. Sensibilisation forte à la sécurité (injections SQL, XSS, gestion des sessions). Code maintenable et extensible, prêt pour une présentation en épreuve E6.",
                'captures' => [],
            ],

            [
                'slug'            => 'web-php-mvc',
                'statut'          => 'a_supprimer',
                'titre'           => 'Atelier MVC PHP',
                'icon'            => '🛠️',
                'categorie'       => 'bts',
                'contexte'        => 'BTS SIO - Atelier de professionnalisation',
                'duree'           => '2024 - 2025',
                'role'            => 'Développeur',
                'description'     => "Mise en pratique de l'architecture MVC en PHP : routeur, contrôleurs, modèles, vues. Base technique réutilisable pour d'autres projets.",
                'technos'         => ['PHP POO', 'MVC', 'HTML5', 'CSS3'],
                'features'        => [
                    'Routeur maison (front controller)',
                    'Séparation logique/affichage',
                    'Modèle de données réutilisable',
                ],
                'competences_bts' => ['B1.3', 'B1.4', 'B2.1'],
                'livrables'       => ['Code source GitHub', 'Schéma d\'architecture'],
                'github'          => 'https://github.com/WolfByteDakito/web-php-mvc',

                'deroulement' => [
                    "[A REMPLIR] Étape 1 : étude du pattern MVC à partir d'exemples Symfony.",
                    "[A REMPLIR] Étape 2 : implémentation d'un mini-framework maison.",
                    "[A REMPLIR] Étape 3 : test sur un cas concret.",
                ],
                'difficultes' => ["[A REMPLIR]"],
                'solutions'   => ["[A REMPLIR]"],
                'bilan'       => "[A REMPLIR] Comprendre comment fonctionne un framework de l'intérieur (avant de pouvoir en utiliser un comme Laravel ou Symfony).",
                'captures'    => [],
            ],

            [
                'slug'            => 'projets-bts',
                'statut'          => 'a_supprimer',
                'titre'           => 'Recueil exercices BTS SIO',
                'icon'            => '📚',
                'categorie'       => 'bts',
                'contexte'        => 'BTS SIO - TP et exercices',
                'duree'           => '2024 - en cours',
                'role'            => 'Étudiant développeur',
                'description'     => "Exercices et projets réalisés dans le cadre de mon BTS SIO : Python, PHP, C#, SQL. Permet de retracer la progression et la diversité des langages abordés.",
                'technos'         => ['Python', 'PHP', 'C#', 'SQL'],
                'features'        => [
                    'Exercices Python (algorithmique, scripts)',
                    'TP PHP (POO, formulaires, BDD)',
                    'Exercices C# (logique, fenêtres)',
                    'Requêtes SQL avancées',
                ],
                'competences_bts' => ['B1.6', 'B2.1', 'B2.3'],
                'livrables'       => ['Code source organisé par langage'],
                'github'          => 'https://github.com/WolfByteDakito/projets-bts',

                'deroulement' => [
                    "[A REMPLIR] Description générale de la progression au fil de l'année.",
                ],
                'difficultes' => ["[A REMPLIR]"],
                'solutions'   => ["[A REMPLIR]"],
                'bilan'       => "[A REMPLIR] Vue d'ensemble de la progression sur l'année.",
                'captures'    => [],
            ],

            // ═══════════════════════════════════════════════════════════
            // PROJETS ENTREPRISE (LISI Automotive)
            // ═══════════════════════════════════════════════════════════

            [
                'slug'            => 'stats-nx',
                'statut'          => 'production',
                'titre'           => "Application d'analyse des licences NX",
                'icon'            => '📈',
                'categorie'       => 'pro',
                'contexte'        => 'LISI Automotive (Delle) — Alternance',
                'duree'           => '2025 - 2026',
                'role'            => 'Développeur / analyste (seul)',
                'description'     => "Système automatisé de collecte, stockage et analyse de l'utilisation des licences logicielles NX (Siemens CAO) à l'échelle internationale. Suit l'usage par utilisateur, machine et pays pour aider à dimensionner le parc de licences. Réalisation professionnelle n°2 du BTS SIO SLAM (épreuve E6).",
                'technos'         => ['PowerShell', 'MySQL 8.0', 'phpMyAdmin', 'SQL', 'Batch', 'Tâche planifiée Windows'],
                'features'        => [
                    "Script PowerShell interrogeant le serveur de licences NX à intervalle régulier (tâche planifiée)",
                    "Parsing et extraction : nom du poste, utilisateur, date/heure, licence utilisée",
                    "Stockage structuré dans une base SQL — chaque utilisation = un enregistrement",
                    "Analyses par utilisateur / machine / pays / période",
                    "Recherche multi-critères : sans filtre, par pays, par ville (ex. Livonia USA), par utilisateur, par PC, par nom de licence (SOLIDWORKS…)",
                    "Export CSV pour Excel et reporting externe",
                    "Lancement via raccourci batch sur poste Windows",
                ],
                'competences_bts' => ['B1.1', 'B1.4', 'B1.5', 'B2.1', 'B2.3'],
                'livrables'       => [
                    'Script PowerShell complet',
                    'Schéma SQL (MCD / MLD)',
                    'Maquette IHM',
                    'Raccourci batch de lancement',
                    'Dossier technique BTS SIO 2026 (annexe VII-1-B)',
                ],
                'github'          => 'https://github.com/WolfByteDakito/stat_nx',
                'dossier'         => 'FR - Stat licence NX - MOTTNER - BTS SIO 2026.docx',

                'deroulement' => [
                    "Contexte : dans un environnement industriel international, les licences NX sont partagées entre plusieurs utilisateurs, machines et pays. Elles sont limitées et coûteuses → besoin d'un suivi précis pour optimiser leur gestion. Le suivi existant était insuffisant pour identifier les gros consommateurs, les pics d'utilisation, ou vérifier si le parc de licences est dimensionné aux besoins réels.",
                    "Étape 1 — Étude du fonctionnement du serveur de licences NX et des informations exploitables à interroger.",
                    "Étape 2 — Modélisation : MCD entité-association, passage au MLD, création du schéma SQL sous MySQL 8.0.",
                    "Étape 3 — Maquettage IHM : interface unique de recherche multi-critères, sélection d'une période par date de début / date de fin.",
                    "Étape 4 — Développement du script PowerShell d'interrogation du serveur de licences et d'insertion en base.",
                    "Étape 5 — Mise en place de la tâche planifiée Windows pour automatiser la collecte à intervalles réguliers.",
                    "Étape 6 — Création de l'interface de recherche et des vues d'analyse (par pays, ville, utilisateur, PC, licence).",
                    "Étape 7 — Ajout de l'export CSV et du raccourci batch pour lancement par les utilisateurs IT.",
                    "Étape 8 — Recréation de jeux de données fictifs pour la démonstration en E6 (le projet est interne et confidentiel ; les données présentées sont anonymisées).",
                ],
                'difficultes' => [
                    "Données réelles confidentielles : impossible de les présenter directement en E6, il a fallu créer des jeux de données fictifs représentatifs.",
                    "Pas de page de connexion native (outil interne, accès restreint au responsable et à moi-même) → repenser la sécurité pour une éventuelle ouverture future.",
                    "Recherches devant obligatoirement porter sur une période définie : valider que les bornes de dates sont cohérentes.",
                ],
                'solutions' => [
                    "Génération de fausses données représentatives reproduisant la diversité géographique réelle (pays, villes, utilisateurs, licences).",
                    "Verrouillage logique des dates : si date de fin < date de début, message d'erreur. Période obligatoire pour toute requête.",
                    "Préparation d'un module d'authentification activable pour un éventuel déploiement étendu.",
                ],
                'bilan' => "Projet professionnel mené pour LISI Automotive : passage d'un suivi manuel et peu exploitable à un système automatisé qui produit des statistiques exploitables sur l'usage des licences NX. M'a fait pratiquer l'automatisation système (PowerShell + tâche planifiée), la conception de base de données pour de l'analyse de données, et la création d'une IHM de recherche multicritères. Servira d'aide à la décision pour le dimensionnement du parc de licences.",
                'captures' => [],
            ],

            [
                'slug'            => 'scripts-correctifs',
                'statut'          => 'a_supprimer',
                'titre'           => 'Scripts correctifs incidents critiques',
                'icon'            => '🔧',
                'categorie'       => 'pro',
                'contexte'        => 'LISI Automotive - Alternance',
                'duree'           => '2023 - 2026',
                'role'            => 'Support IT / scripteur',
                'description'     => "Développement de scripts PowerShell et Batch pour corriger automatiquement des incidents récurrents (réinitialisation profils, nettoyage cache CAO, redémarrage services).",
                'technos'         => ['PowerShell', 'Batch', 'Windows Server'],
                'features'        => [
                    'Diagnostic automatique des incidents',
                    'Correction sans intervention utilisateur',
                    "Journalisation des actions",
                    "Réduction du temps moyen de résolution (MTTR)",
                ],
                'competences_bts' => ['B1.1', 'B1.2', 'B2.2', 'B3.3'],
                'livrables'       => ['Bibliothèque de scripts', 'Procédures de déclenchement'],
                'github'          => null,

                'deroulement' => [
                    "[A REMPLIR] Identification des incidents les plus fréquents via le ticketing.",
                    "[A REMPLIR] Pour chaque incident type : diagnostic, écriture du script de correction, tests, déploiement.",
                ],
                'difficultes' => ["[A REMPLIR]"],
                'solutions'   => ["[A REMPLIR]"],
                'bilan'       => "[A REMPLIR] Réduction du temps de résolution de X% sur les tickets concernés.",
                'captures'    => [],
            ],

            // ═══════════════════════════════════════════════════════════
            // PORTFOLIO (toujours pertinent)
            // ═══════════════════════════════════════════════════════════

            [
                'slug'            => 'portfolio',
                'statut'          => 'a_supprimer',
                'titre'           => 'Portfolio personnel',
                'icon'            => '🌐',
                'categorie'       => 'perso',
                'contexte'        => "Projet personnel - support de l'épreuve E6",
                'duree'           => '2026 (en cours)',
                'role'            => 'Concepteur, intégrateur, mainteneur',
                'description'     => "Le site que tu visites. Architecture MVC en PHP pur, design inspiré de Mercedes AMG F1. Conçu pour servir de support à l'épreuve E6 du BTS SIO et de vitrine pour mes candidatures.",
                'technos'         => ['PHP 8 POO', 'HTML5', 'CSS3', 'JavaScript', 'MVC', 'Apache', 'XAMPP'],
                'features'        => [
                    'Architecture MVC maison (front controller + router + contrôleurs + modèles + vues)',
                    'Routage par liste blanche, sécurisé contre les inclusions arbitraires',
                    "Layout commun avec partials (header, footer) injectés via output buffering",
                    "Page Projets dynamique avec filtres JS et fiches détaillées par projet",
                    "Cartographie automatique des compétences BTS SIO (modèle Compétence)",
                    "Page Documents qui détecte automatiquement la présence des PDF déposés",
                    "Formulaire de contact avec validation PHP serveur (XSS, longueurs, format email)",
                    "Design system cohérent : variables CSS, palette F1, typo Orbitron/Rajdhani/JetBrains Mono",
                    "Responsive complet (menu burger mobile, grilles auto-fit)",
                    "SEO : Open Graph, favicon SVG, meta description, mentions légales RGPD",
                ],
                'competences_bts' => ['B1.3', 'B1.4', 'B1.6', 'B2.1', 'B2.2', 'B3.1'],
                'livrables'       => [
                    'Code source PHP/HTML/CSS/JS sur GitHub',
                    'Documentation : README (cahier des charges) + TODO (suivi)',
                    'Site déployable sur n\'importe quel hébergeur LAMP',
                    'Schéma SQL prêt si activation BDD',
                ],
                'github'          => 'https://github.com/WolfByteDakito/portfolio',

                'deroulement' => [
                    "Étape 1 - Cahier des charges : j'ai rédigé un brief précis (objectifs, stack technique, design voulu, pages à créer, contraintes BTS). Ce document est conservé dans le README.md du repo.",
                    "Étape 2 - Choix du parti pris design : Mercedes AMG F1 (palette noir / cyan turquoise / gris) + influences Java (tech, structuré). Inspiration : cockpit, télémétrie, HUD.",
                    "Étape 3 - Conception de l'architecture : MVC maison sans framework (pour rester maître du code et pouvoir le modifier facilement). Front controller unique (public/index.php), routeur par liste blanche, classe Controller de base, modèles métier, vues + partials.",
                    "Étape 4 - Mise en place avec assistance IA : j'ai utilisé Claude Code (assistant de développement) pour générer rapidement la structure de base et le design. Ce choix est assumé : c'est un outil professionnel moderne, et j'ai pris le temps de comprendre, relire et adapter chaque partie du code livré.",
                    "Étape 5 - Personnalisation et appropriation : j'ai défini les contenus (CV, projets, compétences BTS SIO, sujet de veille télémétrie F1), corrigé/affiné les sections, et intégré mes vraies données.",
                    "Étape 6 - Validation technique : tests page par page sur XAMPP, vérification des en-têtes HTTP, lint PHP, validation responsive sur mobile.",
                    "Étape 7 (à venir) - Déploiement sur VM (Proxmox + Debian + LAMP), configuration HTTPS Let's Encrypt, mise en ligne pour l'épreuve E6.",
                ],
                'difficultes' => [
                    "Démarrer from scratch sans framework : risque de réinventer la roue ou d'écrire du code peu maintenable.",
                    "Définir un design qui se démarque sans tomber dans le gadget visuel.",
                    "Bien comprendre chaque partie du code généré avec assistance IA pour pouvoir le maintenir et le défendre à l'oral.",
                    "Cartographier proprement les productions sur le référentiel BTS SIO (compétences B1.x, B2.x, B3.x).",
                ],
                'solutions' => [
                    "MVC minimal : un dossier par couche, constantes centralisées dans /config, conventions de nommage strictes.",
                    "Charte graphique unique inspirée de la livrée Mercedes Petronas + composants 'HUD cockpit' subtils.",
                    "Lecture, annotation et test de chaque fichier généré ; reformulation des parties peu claires ; rejet des suggestions hors contexte.",
                    "Création d'un modèle Competence dédié + page Compétences listant chaque code du référentiel avec ses preuves (productions associées).",
                ],
                'bilan' => "Ce projet m'a fait pratiquer toutes les étapes d'un cycle de développement : cahier des charges, architecture, design, intégration, tests, déploiement. L'utilisation assumée de Claude Code comme assistant m'a permis de me concentrer sur les choix structurants (architecture, contenu, personnalisation) plutôt que sur la saisie de boilerplate. C'est aussi un usage que je revendique car c'est aujourd'hui une compétence professionnelle attendue : savoir piloter un assistant IA, comprendre ce qu'il produit, le valider et l'adapter — ce qui rejoint la compétence B1.6 du référentiel (organiser son développement professionnel en utilisant les outils modernes du métier).",
                'captures' => [],
            ],

            // ═══════════════════════════════════════════════════════════
            // PROJETS PERSONNELS — ⚠️ À RÉÉVALUER
            // Si ces projets ne sont pas représentatifs, passe leur 'statut'
            // à 'a_supprimer' ou supprime carrément le bloc.
            // ═══════════════════════════════════════════════════════════

            [
                'slug'            => 'budget-investissement',
                'statut'          => 'a_supprimer', // [DÉCIDER : garder ou virer ?]
                'titre'           => 'Suivi budget & investissement',
                'icon'            => '💰',
                'categorie'       => 'perso',
                'contexte'        => 'Projet personnel',
                'duree'           => '2025',
                'role'            => 'Développeur',
                'description'     => "Outil personnel de gestion budgétaire et de suivi d'investissements.",
                'technos'         => ['HTML', 'CSS', 'JavaScript'],
                'features'        => ['Saisie revenus/dépenses', 'Visualisation', 'Suivi placements'],
                'competences_bts' => ['B1.6', 'B2.1'],
                'livrables'       => ['Application web statique'],
                'github'          => 'https://github.com/WolfByteDakito/budget_investissement',
                'deroulement'     => ["[A REMPLIR si tu gardes ce projet]"],
                'difficultes'     => [],
                'solutions'       => [],
                'bilan'           => "[A REMPLIR si tu gardes ce projet]",
                'captures'        => [],
            ],

            [
                'slug'            => 'sport-prog',
                'statut'          => 'a_supprimer', // [DÉCIDER : garder ou virer ?]
                'titre'           => 'Programme sportif',
                'icon'            => '🏃',
                'categorie'       => 'perso',
                'contexte'        => 'Projet personnel',
                'duree'           => '2025',
                'role'            => 'Développeur',
                'description'     => "Outil web de planification et de suivi d'un programme sportif.",
                'technos'         => ['HTML', 'CSS', 'JavaScript'],
                'features'        => ['Planning hebdo', 'Suivi séances', 'Statistiques'],
                'competences_bts' => ['B1.6', 'B2.1'],
                'livrables'       => ['Application web statique'],
                'github'          => 'https://github.com/WolfByteDakito/sport_prog',
                'deroulement'     => ["[A REMPLIR si tu gardes ce projet]"],
                'difficultes'     => [],
                'solutions'       => [],
                'bilan'           => "[A REMPLIR si tu gardes ce projet]",
                'captures'        => [],
            ],
        ];
    }

    /** Liste des projets visibles (filtre 'a_supprimer') */
    public static function visibles(): array
    {
        return array_filter(self::all(), fn($p) => ($p['statut'] ?? 'production') !== 'a_supprimer');
    }

    /** Récupère un projet par son slug (ou null si introuvable / supprimé) */
    public static function findBySlug(string $slug): ?array
    {
        foreach (self::visibles() as $p) {
            if ($p['slug'] === $slug) {
                return $p;
            }
        }
        return null;
    }

    /** Catégories disponibles pour le filtre */
    public static function categories(): array
    {
        return [
            'all'   => 'Tous',
            'bts'   => 'BTS SIO',
            'pro'   => 'Entreprise (LISI)',
            'perso' => 'Personnels',
        ];
    }
}
