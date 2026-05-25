<?php

class DocumentsController extends Controller
{
    public function index(): void
    {
        // Page Certifications : uniquement les certifications & MOOC.
        // Le CV et le Tableau de synthèse E6 sont désormais présentés sur la page Profil.
        $sections = [
            'certifications' => [
                'titre'       => 'Certifications & MOOC',
                'sous_titre'  => 'Cybersécurité, conformité, programmation et compétences numériques.',
                'icon'        => '✓',
                'docs' => [
                    [
                        'titre'        => 'MOOC ANSSI - SecNumAcadémie',
                        'description'  => 'Formation officielle en cybersécurité dispensée par l\'Agence Nationale de la Sécurité des Systèmes d\'Information. Couvre les fondamentaux : panorama de la SSI, sécurité de l\'authentification, sécurité sur Internet, sécurité du poste de travail et nomadisme.',
                        'fichier'      => DOCUMENTS['mooc_anssi'],
                        'icon'         => '🛡️',
                        'badge'        => 'CYBERSÉCURITÉ',
                        'duree'        => '~26 h',
                        'niveau'       => 'Débutant à intermédiaire',
                        'organisme'    => 'ANSSI',
                        'lien_passer'  => 'https://secnumacademie.gouv.fr/',
                    ],
                    [
                        'titre'        => 'MOOC CNIL - RGPD',
                        'description'  => 'Formation officielle de la Commission Nationale Informatique et Libertés sur la protection des données personnelles : principes, droits des personnes, responsabilités des organismes, sécurité des données.',
                        'fichier'      => DOCUMENTS['mooc_cnil'],
                        'icon'         => '⚖️',
                        'badge'        => 'RGPD',
                        'duree'        => '~20 h',
                        'niveau'       => 'Tous niveaux',
                        'organisme'    => 'CNIL',
                        'lien_passer'  => 'https://atelier-rgpd.cnil.fr/',
                    ],
                    [
                        'titre'        => 'Python Essentials 1',
                        'description'  => 'Formation officielle Cisco/OpenEDG couvrant les fondamentaux du langage Python : syntaxe, types de données, structures de contrôle, fonctions, manipulation de chaînes et bases de la programmation orientée objet.',
                        'fichier'      => DOCUMENTS['certif_python'],
                        'icon'         => '🐍',
                        'badge'        => 'PROGRAMMATION',
                        'duree'        => '~30 h',
                        'niveau'       => 'Débutant',
                        'organisme'    => 'Cisco · OpenEDG',
                        'lien_passer'  => 'https://www.netacad.com/courses/programming/pcap-programming-essentials-python',
                    ],
                    [
                        'titre'        => 'Certification Pix',
                        'description'  => 'Service public de certification officielle des compétences numériques, aligné sur le référentiel européen DIGCOMP. Évalue 16 compétences réparties en 5 domaines : information, communication, contenus, sécurité, environnement numérique.',
                        'fichier'      => DOCUMENTS['certif_pix'],
                        'icon'         => '🏅',
                        'badge'        => 'COMPÉTENCES NUM.',
                        'duree'        => '~2 h (test)',
                        'niveau'       => 'Tous niveaux',
                        'organisme'    => 'Pix.fr',
                        'lien_passer'  => 'https://pix.fr/',
                    ],
                ],
            ],
        ];

        $stats = ['total' => 0, 'disponibles' => 0];

        foreach ($sections as &$section) {
            foreach ($section['docs'] as &$doc) {
                $path = ROOT_PATH . '/public/assets/documents/' . $doc['fichier'];
                $doc['disponible'] = file_exists($path);
                $doc['url']        = ASSETS_URL . 'documents/' . $doc['fichier'];
                $stats['total']++;
                if ($doc['disponible']) $stats['disponibles']++;
            }
            unset($doc);
        }
        unset($section);

        $this->render('documents', [
            'currentPage' => 'documents',
            'pageTitle'   => 'Certifications - Alexis Mottner',
            'sections'    => $sections,
            'stats'       => $stats,
        ]);
    }
}
