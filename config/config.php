<?php
// =====================================================================
// Configuration générale du portfolio
// =====================================================================
// À MODIFIER : adapte BASE_URL si tu changes le nom du dossier ou le déploies
// sur une VM (ex: 'http://monportfolio.local/' ou 'https://exemple.fr/')
// =====================================================================

// BASE_URL : variable d'environnement prioritaire (utile en prod / Docker),
// sinon valeur par défaut adaptée au XAMPP local.
define('BASE_URL', getenv('PORTFOLIO_BASE_URL') ?: '/portoflio-mottner/public/');
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('VIEW_PATH', APP_PATH . '/views');
define('ASSETS_URL', BASE_URL . 'assets/');

// Mode développement : affiche les erreurs PHP
define('DEV_MODE', true);

if (DEV_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
}

// Informations du candidat (centralisées pour faciliter les modifications)
define('CANDIDAT', [
    'nom_complet'  => 'Alexis Mottner',
    'localisation' => 'Bourogne (France)',
    'email'        => 'mottner90alexis@gmail.com',
    'formation'    => 'BTS SIO SLAM',
    'lycee'        => 'Lycée Condorcet - Belfort',
    'objectif'     => 'BUT Informatique - Alternance Septembre 2026',
    'linkedin'     => 'https://www.linkedin.com/in/alexis-mottner-94129527b/',
    'github'       => 'https://github.com/WolfByteDakito',
]);

// Chemins vers les documents (à déposer dans /public/assets/documents/)
// Le portfolio gère gracieusement leur absence (affiche "à venir")
define('DOCUMENTS', [
    'cv'             => 'CV_Alexis_MOTTNER.pdf',
    'tableau_e6'     => 'SLAM-BTS_SIO_Tableau_de_synthese_2026_Alexis_Mottner.pdf',
    'mooc_anssi'     => 'MOTTNER_Alexis_MOOC_ANSSI_BTSSIO1.pdf',
    'mooc_cnil'      => 'certificat_cnil.pdf',
    'certif_python'  => 'Python_Essentials_1_certificate_mottner90alexis-gmail-com_1c8b6994-6fdd-46d6-846f-ee9b95f81e11.pdf',
    'certif_pix'     => 'certification-pix-20260323.pdf',
    'attestation'    => 'Attestation_LISI.pdf',
    'convention'     => 'Convention_alternance.pdf',
    'diplome_bac'    => 'Diplome_Bac_Pro_SN.pdf',
]);
