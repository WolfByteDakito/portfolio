# 🏗️ Comment fonctionne ton portfolio — guide de compréhension

Document destiné à **toi**, pour que tu comprennes ce qui tourne sous le capot et que tu puisses le **défendre à l'oral E6**.

---

## 1. La vue d'ensemble : c'est quoi une architecture MVC ?

**MVC** = **M**odel - **V**iew - **C**ontroller. C'est un **patron de conception** qui sépare une application en 3 couches :

| Couche | Rôle | Exemple chez nous |
|--------|------|-------------------|
| **M**odel | Gérer les **données** (récupérer, modifier, valider) | `app/models/Projet.php` (liste des projets) |
| **V**iew | Gérer l'**affichage** (HTML/CSS) | `app/views/projets.php` (la page projets) |
| **C**ontroller | Faire le **lien** entre les deux (logique métier) | `app/controllers/ProjetsController.php` |

**Pourquoi c'est utile ?**
- Tu peux changer le design (V) sans toucher aux données (M)
- Tu peux changer la BDD (M) sans toucher à l'affichage (V)
- Le code est plus **lisible** et **maintenable**
- C'est ce que tous les frameworks pro utilisent (Symfony, Laravel, Django, Rails, Spring...)

---

## 2. Le parcours d'une requête (étape par étape)

Quand quelqu'un tape `http://localhost/portoflio-mottner/?page=projets` dans son navigateur, voici ce qui se passe :

```
1. Navigateur ─────► Apache (XAMPP)
                         │
2. Apache lit /.htaccess │  redirige tout vers /public/
                         ▼
3. Apache lit /public/.htaccess
                         │  toute URL → public/index.php?page=...
                         ▼
4. PHP exécute /public/index.php  ← FRONT CONTROLLER
                         │  ① charge config/config.php (constantes)
                         │  ② charge config/database.php (PDO)
                         │  ③ charge Controller + Router
                         │  ④ appelle Router::dispatch('projets')
                         ▼
5. Router::dispatch('projets')
                         │  cherche 'projets' dans la liste blanche
                         │  → ProjetsController::index()
                         ▼
6. ProjetsController::index()
                         │  ① demande au modèle : Projet::visibles()
                         │  ② appelle $this->render('projets', [...])
                         ▼
7. Controller::render('projets')
                         │  ① ouvre app/views/projets.php → HTML
                         │  ② ouvre app/views/layouts/main.php
                         │       qui injecte header + content + footer
                         ▼
8. PHP renvoie le HTML complet → Apache → Navigateur
```

**Le secret du layout commun** : on utilise `ob_start()` / `ob_get_clean()` (output buffering) pour capturer le HTML de la vue dans une variable `$content`, puis le layout principal injecte cette variable au bon endroit.

---

## 3. Le rôle de chaque dossier

```
portoflio-mottner/
├── .htaccess             ← Apache : redirige tout vers /public
│
├── public/               ← SEUL DOSSIER ACCESSIBLE PAR LE WEB
│   ├── index.php         ← Front controller (UNIQUE point d'entrée)
│   ├── .htaccess         ← Réécriture d'URL (jolies URLs)
│   └── assets/           ← Fichiers statiques (CSS, JS, images, PDF)
│       ├── css/style.css
│       ├── js/main.js
│       ├── images/
│       └── documents/    ← Tu déposes tes PDF ici
│
├── config/               ← Configuration centralisée
│   ├── config.php        ← Constantes (BASE_URL, CANDIDAT, DOCUMENTS)
│   └── database.php      ← Connexion MySQL (fonction db())
│
├── app/                  ← Code applicatif (PROTÉGÉ, hors webroot)
│   ├── core/
│   │   ├── Controller.php   ← Classe abstraite parent de tous les contrôleurs
│   │   └── Router.php       ← Liste blanche des routes + dispatch
│   ├── controllers/      ← Un contrôleur par page
│   │   ├── HomeController.php
│   │   ├── ProjetsController.php
│   │   └── ...
│   ├── models/           ← Données et logique métier
│   │   ├── Projet.php
│   │   └── Competence.php
│   └── views/            ← Templates HTML/PHP
│       ├── layouts/main.php   ← Squelette de toutes les pages
│       ├── partials/          ← Header + footer réutilisables
│       └── home.php, projets.php, ...
│
├── database/
│   └── portfolio.sql     ← Schéma SQL prêt si tu actives MySQL
│
├── README.md             ← Le cahier des charges initial
├── TODO.md               ← Suivi de ce qu'il reste à faire
└── ARCHITECTURE.md       ← (ce fichier)
```

**Pourquoi `/public` est le seul dossier accessible par le web ?**
C'est une **bonne pratique de sécurité** : si Apache pouvait servir directement `config/database.php`, n'importe qui pourrait voir tes mots de passe. En mettant tout sauf `/public` hors de portée, c'est protégé.

---

## 4. Les 5 fichiers clés expliqués

### `public/index.php` — le **front controller**
```php
require config.php          // constantes
require database.php        // fonction db() pour MySQL
require Controller.php      // classe parente
require Router.php          // dispatcher

$page = $_GET['page'] ?? 'accueil';   // récupère la page demandée
Router::dispatch($page);              // l'envoie au bon contrôleur
```
**À retenir** : *toutes* les requêtes passent ici. C'est l'**unique point d'entrée**.

### `app/core/Router.php` — le **routeur**
```php
private const ROUTES = [
    'accueil' => ['HomeController', 'index'],
    'projets' => ['ProjetsController', 'index'],
    'projet'  => ['ProjetsController', 'show'],
    // ...
];
```
**À retenir** : c'est une **liste blanche**. Si quelqu'un tape `?page=hack`, le routeur ne trouve pas, retombe sur `accueil`. **Aucune inclusion arbitraire de fichier possible** = sécurisé.

### `app/core/Controller.php` — la **classe parente**
```php
abstract class Controller {
    protected function render(string $view, array $data) {
        extract($data);                      // transforme array en variables
        ob_start();                          // commence à capturer la sortie
        require VIEW_PATH . "/$view.php";    // exécute la vue
        $content = ob_get_clean();           // récupère le HTML produit
        require VIEW_PATH . '/layouts/main.php';  // injecte dans le layout
    }
}
```
**À retenir** : tous les contrôleurs **héritent** de cette classe et utilisent `render()`. Le **output buffering** (`ob_start`/`ob_get_clean`) permet de séparer le contenu de la page du layout commun.

### `app/controllers/ProjetsController.php` — un **contrôleur**
```php
class ProjetsController extends Controller {
    public function index() {
        $this->render('projets', [
            'projets' => Projet::visibles(),  // demande au modèle
        ]);
    }
    public function show() {
        $slug = $_GET['slug'] ?? '';
        $projet = Projet::findBySlug($slug);
        $this->render('projet-detail', ['p' => $projet]);
    }
}
```
**À retenir** : un contrôleur **ne contient pas de HTML**. Il demande des données au modèle, puis demande à la vue de les afficher.

### `app/models/Projet.php` — un **modèle**
```php
class Projet {
    public static function all() {
        return [ /* tableau de projets en dur */ ];
    }
    public static function visibles() {
        return array_filter(self::all(), fn($p) => $p['statut'] !== 'a_supprimer');
    }
    public static function findBySlug(string $slug) {
        // cherche un projet par son identifiant URL
    }
}
```
**À retenir** : aujourd'hui les données sont en **dur** (tableau PHP). Demain tu pourras les remplacer par une vraie requête SQL via `db()->query(...)` sans toucher au reste du code. C'est exactement ça l'avantage du MVC.

---

## 5. Comment ajouter une nouvelle page

3 étapes toujours :

1. **Ajouter la route** dans `app/core/Router.php` :
   ```php
   'maPage' => ['MaPageController', 'index'],
   ```
   Et dans `menu()` si tu veux qu'elle apparaisse dans le menu.

2. **Créer le contrôleur** `app/controllers/MaPageController.php` :
   ```php
   class MaPageController extends Controller {
       public function index() {
           $this->render('ma-page', [
               'currentPage' => 'maPage',
               'pageTitle'   => 'Ma page',
               // données à passer à la vue...
           ]);
       }
   }
   ```

3. **Créer la vue** `app/views/ma-page.php` (juste du HTML/PHP) :
   ```php
   <h1>Ma nouvelle page</h1>
   <p>Contenu...</p>
   ```

C'est tout. Le layout commun s'applique automatiquement.

---

## 6. Comment ça gère la sécurité

| Risque | Comment c'est géré |
|--------|-------------------|
| **Inclusion arbitraire de fichier** | Liste blanche dans `Router::ROUTES` — impossible d'inclure un fichier non prévu |
| **Injection XSS** | Toutes les sorties utilisateur passent par `htmlspecialchars()` |
| **Injection SQL** | Connexion PDO avec `prepare()` (requêtes préparées). Aujourd'hui on n'utilise pas de SQL mais c'est prêt |
| **CSRF (formulaire contact)** | Validation côté serveur : longueur, format email, échappement |
| **Accès direct aux fichiers PHP de l'app** | `/app` et `/config` sont **hors webroot** — Apache ne les sert jamais |

---

## 7. Phrases utiles pour l'oral E6

Voici comment **présenter ton portfolio en 30 secondes** :

> *"J'ai développé un portfolio web personnel en PHP orienté objet, avec une architecture MVC maison sans framework, pour rester maître du code et pouvoir le faire évoluer facilement.*
>
> *Le site comporte 10 pages dont une page Compétences qui cartographie mes productions sur le référentiel BTS SIO, une page Veille technologique sur la télémétrie en sport automobile, et une page Documents qui détecte automatiquement les PDF déposés.*
>
> *Le design est inspiré de l'écurie Mercedes AMG F1, qui rejoint mon centre d'intérêt pour le sport automobile, tout en gardant une identité tech sobre.*
>
> *Pour gagner en efficacité, j'ai utilisé Claude Code (un assistant de développement IA) pour générer la structure de base et le design, puis j'ai relu, compris et adapté chaque partie du code à mes besoins. C'est un usage que je revendique car c'est aujourd'hui une compétence professionnelle attendue."*

### Si on te demande "qu'as-tu vraiment fait toi-même ?"
- Le **cahier des charges** (README) : choix de la stack, design, fonctionnalités, structure des pages
- La **personnalisation des contenus** : tes vraies données (CV, projets, compétences, sujet de veille)
- La **compréhension et la validation** de chaque fichier généré
- Le **débogage** et l'adaptation (corrections de l'email, choix de garder/virer des projets, etc.)
- Le **déploiement** (à venir sur la VM)

### Si on te demande "explique-moi comment fonctionne le routage"
- *"Toutes les URLs passent par un point d'entrée unique : `public/index.php`. Ce fichier appelle un routeur qui contient une liste blanche associant chaque nom de page à un contrôleur. Le contrôleur demande les données au modèle, puis appelle une méthode `render()` qui injecte la vue dans un layout commun via output buffering. C'est le pattern MVC."*

### Si on te demande "pourquoi pas un framework comme Laravel ?"
- *"Pour deux raisons : 1) je voulais comprendre comment fonctionne un framework de l'intérieur avant d'en utiliser un ; 2) un framework comme Laravel demande Composer, des migrations, plus de prérequis serveur — pour un portfolio de quelques pages, le code maison est plus simple à déployer et à maintenir."*

---

## 8. Glossaire express

- **MVC** : Model-View-Controller, séparation des responsabilités
- **Front controller** : point d'entrée unique de l'application (`index.php`)
- **Routeur** : composant qui décide quel contrôleur appeler selon l'URL
- **Output buffering** : mécanisme PHP qui capture la sortie HTML dans une variable au lieu de l'envoyer directement
- **POO** : Programmation Orientée Objet (classes, méthodes, héritage)
- **PDO** : PHP Data Objects, l'API standard pour parler aux BDD en PHP
- **Webroot** : dossier servi publiquement par le serveur web (chez nous : `/public`)
- **Liste blanche** (whitelist) : autoriser uniquement ce qui est explicitement listé (l'inverse : blacklist)
- **htmlspecialchars** : fonction PHP qui échappe les caractères HTML pour empêcher les attaques XSS
