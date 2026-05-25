<?php

/**
 * Modèle Compétence : référentiel officiel BTS SIO (2020).
 * Pour chaque compétence, on liste les projets/situations qui la mobilisent.
 */
class Competence
{
    /**
     * Référentiel BTS SIO option SLAM, organisé par bloc.
     * À MODIFIER : pour chaque compétence, mets le tableau "preuves"
     * avec les noms des projets qui la mobilisent (cf. Projet.php).
     */
    public static function blocs(): array
    {
        return [
            [
                'numero'  => 1,
                'titre'   => 'Support et mise à disposition de services informatiques',
                'option'  => 'commun',
                'couleur' => 'cyan',
                'items'   => [
                    [
                        'code'    => 'B1.1',
                        'libelle' => 'Gérer le patrimoine informatique',
                        'preuves' => ['LISI - Administration Teamcenter / NX'],
                    ],
                    [
                        'code'    => 'B1.2',
                        'libelle' => "Répondre aux incidents et aux demandes d'assistance et d'évolution",
                        'preuves' => ['LISI - Support utilisateur', 'LISI - Scripts correctifs'],
                    ],
                    [
                        'code'    => 'B1.3',
                        'libelle' => "Développer la présence en ligne de l'organisation",
                        'preuves' => ['Portfolio personnel'],
                    ],
                    [
                        'code'    => 'B1.4',
                        'libelle' => 'Travailler en mode projet',
                        'preuves' => ['Application GSB', 'Stats licences NX'],
                    ],
                    [
                        'code'    => 'B1.5',
                        'libelle' => 'Mettre à disposition des utilisateurs un service informatique',
                        'preuves' => ['LISI - Déploiement de postes', 'Stats licences NX'],
                    ],
                    [
                        'code'    => 'B1.6',
                        'libelle' => 'Organiser son développement professionnel',
                        'preuves' => ['Veille technologique', 'Portfolio'],
                    ],
                ],
            ],
            [
                'numero'  => 2,
                'titre'   => "Conception et développement d'applications",
                'option'  => 'SLAM',
                'couleur' => 'cyan',
                'items'   => [
                    [
                        'code'    => 'B2.1',
                        'libelle' => 'Concevoir et développer une solution applicative',
                        'preuves' => ['Application GSB', 'Web PHP MVC', 'Portfolio'],
                    ],
                    [
                        'code'    => 'B2.2',
                        'libelle' => "Assurer la maintenance corrective ou évolutive d'une solution applicative",
                        'preuves' => ['LISI - Scripts correctifs', 'Application GSB'],
                    ],
                    [
                        'code'    => 'B2.3',
                        'libelle' => 'Gérer les données',
                        'preuves' => ['Application GSB (MySQL)', 'Stats licences NX (SQL Server)'],
                    ],
                ],
            ],
            [
                'numero'  => 3,
                'titre'   => 'Cybersécurité des services informatiques',
                'option'  => 'commun',
                'couleur' => 'cyan',
                'items'   => [
                    [
                        'code'    => 'B3.1',
                        'libelle' => 'Protéger les données à caractère personnel',
                        'preuves' => ['Formulaire contact (validation)', 'MOOC ANSSI'],
                    ],
                    [
                        'code'    => 'B3.2',
                        'libelle' => "Préserver l'identité numérique de l'organisation",
                        'preuves' => ['LISI - Création comptes utilisateurs', 'MOOC ANSSI'],
                    ],
                    [
                        'code'    => 'B3.3',
                        'libelle' => 'Sécuriser les équipements et les usages des utilisateurs',
                        'preuves' => ['LISI - Procédures IT', 'MOOC ANSSI'],
                    ],
                    [
                        'code'    => 'B3.4',
                        'libelle' => "Garantir la disponibilité, l'intégrité et la confidentialité des services informatiques et des données",
                        'preuves' => ['LISI - Administration Teamcenter', 'MOOC ANSSI'],
                    ],
                ],
            ],
        ];
    }
}
