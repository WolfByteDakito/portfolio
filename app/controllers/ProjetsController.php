<?php
require_once APP_PATH . '/models/Projet.php';

class ProjetsController extends Controller
{
    /** Liste de tous les projets */
    public function index(): void
    {
        $this->render('projets', [
            'currentPage' => 'projets',
            'pageTitle'   => 'Projets - Alexis Mottner',
            'projets'     => Projet::visibles(),
            'categories'  => Projet::categories(),
        ]);
    }

    /** Fiche détaillée d'un projet (URL : ?page=projet&slug=xxx) */
    public function show(): void
    {
        $slug    = $_GET['slug'] ?? '';
        $projet  = Projet::findBySlug($slug);

        if (!$projet) {
            // Projet inconnu : on retombe sur la liste
            header('Location: ' . BASE_URL . '?page=projets');
            exit;
        }

        $this->render('projet-detail', [
            'currentPage' => 'projets',
            'pageTitle'   => $projet['titre'] . ' - Alexis Mottner',
            'p'           => $projet,
        ]);
    }
}
