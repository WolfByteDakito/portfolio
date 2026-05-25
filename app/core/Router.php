<?php
// =====================================================================
// Routeur minimal : associe une URL "?page=xxx" à un contrôleur
// =====================================================================

class Router
{
    /** Liste blanche des pages disponibles : page => [Controller, methode] */
    private const ROUTES = [
        'accueil'         => ['HomeController',          'index'],
        'profil'          => ['ProfilController',        'index'],
        'bts-sio'         => ['BtsSioController',        'index'],
        'competences'     => ['CompetencesController',   'index'],
        'projets'         => ['ProjetsController',       'index'],
        'projet'          => ['ProjetsController',       'show'],
        'veille'          => ['VeilleController',        'index'],
        'certifications'  => ['CertificationsController','index'],
        'documents'       => ['DocumentsController',     'index'],
        'contact'         => ['ContactController',       'index'],
        'mentions-legales'=> ['MentionsLegalesController','index'],
    ];

    public static function dispatch(string $page): void
    {
        $page = strtolower(trim($page));
        if ($page === '' || !isset(self::ROUTES[$page])) {
            $page = 'accueil';
        }
        [$controller, $method] = self::ROUTES[$page];

        $controllerFile = APP_PATH . '/controllers/' . $controller . '.php';
        if (!file_exists($controllerFile)) {
            http_response_code(500);
            echo "Contrôleur introuvable : $controller";
            return;
        }
        require_once $controllerFile;
        $instance = new $controller();
        $instance->$method();
    }

    /** Liste des entrées de menu (label, slug) — modifie ici pour réorganiser le menu */
    public static function menu(): array
    {
        return [
            ['Accueil',   'accueil'],
            ['Profil',    'profil'],
            ['BTS SIO',   'bts-sio'],
            ['Projets',   'projets'],
            ['Veille',    'veille'],
            ['Certifications', 'documents'],
            ['Contact',   'contact'],
        ];
    }
}
