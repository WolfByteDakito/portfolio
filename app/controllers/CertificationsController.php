<?php

class CertificationsController extends Controller
{
    public function index(): void
    {
        // À MODIFIER : ajoute tes certifications ici
        $certifs = [
            [
                'titre'        => 'MOOC SecNumacadémie',
                'organisme'    => 'ANSSI',
                'date'         => '2023',
                'description'  => "Formation en ligne sur les bases de la cybersécurité, dispensée par l'Agence Nationale de la Sécurité des Systèmes d'Information.",
                'icon'         => '🛡️',
            ],
            // Ajoute d'autres certifications ici
        ];

        $this->render('certifications', [
            'currentPage' => 'certifications',
            'pageTitle'   => 'Certifications - Alexis Mottner',
            'certifs'     => $certifs,
        ]);
    }
}
