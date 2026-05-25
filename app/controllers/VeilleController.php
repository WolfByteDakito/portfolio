<?php

class VeilleController extends Controller
{
    public function index(): void
    {
        // ========== SUJET DE VEILLE ==========
        // Télémétrie & acquisition de données en sport automobile
        // Lien BTS SIO SLAM : IoT, traitement de données massives, systèmes embarqués,
        // architecture logicielle temps réel, sécurité des transmissions.
        // ======================================

        $sources = [
            // Sources techniques F1 / motorsport
            ['nom' => 'OpenF1 API',                'url' => 'https://openf1.org/',                                'type' => 'API / Open Data', 'theme' => 'Données F1'],
            ['nom' => 'Racecar Engineering',       'url' => 'https://www.racecar-engineering.com/',               'type' => 'Magazine spécialisé', 'theme' => 'Ingénierie auto'],
            ['nom' => 'The Race - Tech',           'url' => 'https://www.the-race.com/',                          'type' => 'Site média',          'theme' => 'Actu motorsport'],
            ['nom' => 'Motorsport.com - Tech',     'url' => 'https://www.motorsport.com/',                        'type' => 'Site média',          'theme' => 'Actu motorsport'],
            ['nom' => 'F1 Chronicle - Tech',       'url' => 'https://f1chronicle.com/',                           'type' => 'Blog technique',      'theme' => 'Vulgarisation F1'],
            ['nom' => 'Formula 1 Dictionary',      'url' => 'https://www.formula1-dictionary.net/',               'type' => 'Documentation',       'theme' => 'Glossaire F1'],
            ['nom' => 'AWS Sports Blog',           'url' => 'https://aws.amazon.com/fr/blogs/sports/',            'type' => 'Blog technique',      'theme' => 'Cloud / IA / F1'],
            ['nom' => 'Cadence - F1 Engineering',  'url' => 'https://community.cadence.com/',                     'type' => 'Blog ingénierie',     'theme' => 'Électronique embarquée'],

            // Sources techniques générales (capteurs / IoT / acquisition de données)
            ['nom' => 'Hackaday',                  'url' => 'https://hackaday.com/',                              'type' => 'Site communautaire',  'theme' => 'Hardware / IoT'],
            ['nom' => 'IoT For All',               'url' => 'https://www.iotforall.com/',                         'type' => 'Site spécialisé',     'theme' => 'IoT industriel'],
        ];

        // À MODIFIER : ajoute, modifie ou retire des articles ici.
        // Ces 5 articles couvrent les angles attendus pour une veille BTS SIO :
        // architecture data, IoT, IA, open data, sécurité des transmissions.
        $articles = [
            [
                'date'     => '2026-04-22',
                'titre'    => "OpenF1 : une API open source pour explorer les données de télémétrie F1",
                'theme'    => 'Open Data & API',
                'resume'   => "OpenF1 met à disposition gratuitement les données live et historiques de la Formule 1 (positions, vitesses, secteurs, météo, radio). C'est un excellent terrain de jeu pour un développeur SLAM : on peut consommer l'API en PHP, stocker en MySQL et construire des dashboards de visualisation. Les flux temps réel (websockets) permettent d'expérimenter l'architecture événementielle.",
                'angle_bts'=> 'B2.1 (concevoir une solution applicative) - B2.3 (gérer les données)',
                'source'   => 'https://openf1.org/',
            ],
            [
                'date'     => '2026-04-08',
                'titre'    => "Architecture télémétrie F1 : 300 capteurs, 1.5M points/seconde, latence 2ms",
                'theme'    => 'Acquisition de données / IoT',
                'resume'   => "Une monoplace moderne embarque 150 à 300 capteurs reliés à l'ECU McLaren standard, qui transmet en continu vers le mur des stands via une liaison hertzienne 4G/5G dédiée. Le volume traité atteint 1.5M de points/seconde, avec une latence de 2ms. Cette architecture est un cas d'école pour comprendre les contraintes des systèmes embarqués connectés et le big data temps réel.",
                'angle_bts'=> 'B1.1 (gestion patrimoine) - B3.4 (disponibilité, intégrité, confidentialité)',
                'source'   => 'https://community.cadence.com/cadence_blogs_8/b/life-at-cadence/posts/formula-1-how-f1-teams-use-telemetry-control-analytics-to-go-faster',
            ],
            [
                'date'     => '2026-03-25',
                'titre'    => "AWS et la F1 : comment Amazon analyse les courses en temps réel avec l'IA",
                'theme'    => 'Cloud & IA',
                'resume'   => "Depuis 2018, AWS est partenaire technologique de la F1. Les données issues de la télémétrie sont envoyées sur le cloud AWS, traitées par des modèles ML (SageMaker) pour produire les fameux 'F1 Insights' (probabilité de dépassement, fenêtres d'arrêt aux stands...). Un cas concret de pipeline data : ingestion → stockage → modèle ML → restitution graphique.",
                'angle_bts'=> 'B2.3 (gérer les données) - B1.5 (mettre à disposition un service)',
                'source'   => 'https://aws.amazon.com/fr/blogs/sports/',
            ],
            [
                'date'     => '2026-03-10',
                'titre'    => "Sécurité des transmissions télémétriques : un enjeu compétitif majeur",
                'theme'    => 'Cybersécurité',
                'resume'   => "Les flux télémétriques entre la voiture et le stand sont chiffrés (les écuries craignent l'espionnage industriel). La FIA encadre strictement les fréquences autorisées et impose un protocole standardisé. Cela illustre concrètement les compétences cybersécurité du BTS SIO : confidentialité, intégrité et disponibilité d'un canal de communication critique.",
                'angle_bts'=> 'B3.1 (protéger les données) - B3.4 (disponibilité, intégrité, confidentialité)',
                'source'   => 'https://www.formula1-dictionary.net/telemetry.html',
            ],
            [
                'date'     => '2026-02-28',
                'titre'    => "FastF1 : analyse de données motorsport avec Python",
                'theme'    => 'Outils & langages',
                'resume'   => "FastF1 est une bibliothèque Python qui simplifie l'accès aux données officielles de la F1 (sessions, télémétrie, météo, classements). Elle permet en quelques lignes de récupérer un tour rapide, d'extraire les données de freinage, d'accélération, de tracé idéal. Idéal pour expérimenter le traitement de données scientifiques (pandas, matplotlib).",
                'angle_bts'=> 'B2.1 (concevoir solution) - B1.6 (développement professionnel)',
                'source'   => 'https://docs.fastf1.dev/',
            ],
        ];

        $this->render('veille', [
            'currentPage' => 'veille',
            'pageTitle'   => 'Veille technologique - Alexis Mottner',
            'sources'     => $sources,
            'articles'    => $articles,
        ]);
    }
}
