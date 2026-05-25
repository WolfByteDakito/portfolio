<?php
// =====================================================================
// Classe de base pour tous les contrôleurs
// Fournit une méthode "render" qui charge une vue dans le layout commun
// =====================================================================

abstract class Controller
{
    /**
     * Affiche une vue à l'intérieur du layout principal.
     *
     * @param string $view  Nom de la vue (ex: "home" → views/home.php)
     * @param array  $data  Variables passées à la vue
     */
    protected function render(string $view, array $data = []): void
    {
        // Variables disponibles dans le layout + la vue
        $data['currentPage'] = $data['currentPage'] ?? '';
        $data['pageTitle']   = $data['pageTitle']   ?? 'Portfolio - Alexis Mottner';

        extract($data, EXTR_SKIP);

        $viewFile = VIEW_PATH . '/' . $view . '.php';
        if (!file_exists($viewFile)) {
            http_response_code(500);
            echo "Vue introuvable : $view";
            return;
        }

        // On capture le contenu de la vue dans $content puis on charge le layout
        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        require VIEW_PATH . '/layouts/main.php';
    }
}
