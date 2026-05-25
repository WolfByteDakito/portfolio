<?php

class ProfilController extends Controller
{
    public function index(): void
    {
        // Compétences présentées en liste simple (à modifier librement)
        $skills = [
            'Développement' => [
                'PHP (POO)',
                'HTML / CSS',
                'JavaScript',
                'Python',
                'C#',
                'Java',
            ],
            'Bases de données' => [
                'MySQL',
                'SQL Server',
                'Modélisation MCD / MLD',
                'Requêtes SQL avancées',
            ],
            'Systèmes & Outils' => [
                'Windows / Linux',
                'PowerShell / Batch',
                'Git / GitHub',
                'VS Code, PHPStorm',
                'Méthode Agile',
            ],
        ];

        $cvPath      = ROOT_PATH . '/public/assets/documents/' . DOCUMENTS['cv'];
        $tableauPath = ROOT_PATH . '/public/assets/documents/' . DOCUMENTS['tableau_e6'];

        $this->render('profil', [
            'currentPage'       => 'profil',
            'pageTitle'         => 'Profil - Alexis Mottner',
            'skills'            => $skills,
            'cvDisponible'      => file_exists($cvPath),
            'cvUrl'             => ASSETS_URL . 'documents/' . DOCUMENTS['cv'],
            'tableauDisponible' => file_exists($tableauPath),
            'tableauUrl'        => ASSETS_URL . 'documents/' . DOCUMENTS['tableau_e6'],
        ]);
    }
}
