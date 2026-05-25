<?php /** @var array $sources @var array $articles */ ?>

<h1>// Veille technologique</h1>

<div class="veille-hero">
    <div class="veille-hero-banner">
        <span class="veille-hero-tag">SUJET</span>
        <h2 class="veille-hero-title">Télémétrie &amp; acquisition de données en sport automobile</h2>
        <p class="veille-hero-desc">
            Comment les écuries de Formule 1 (et plus largement le motorsport) collectent, transmettent
            et exploitent en temps réel des millions de points de données générés par les capteurs embarqués
            sur les monoplaces ?
        </p>
        <p class="veille-hero-bts">
            Croisement direct avec le <strong>BTS SIO SLAM</strong> : IoT &amp; systèmes embarqués,
            big data temps réel, architectures cloud, cybersécurité des transmissions, applications de visualisation.
        </p>
    </div>
    <div class="veille-hero-meta">
        <div class="veille-meta-item">
            <span class="veille-meta-label">Démarrée</span>
            <span class="veille-meta-value">Févr. 2026</span>
        </div>
        <div class="veille-meta-item">
            <span class="veille-meta-label">Outils</span>
            <span class="veille-meta-value">Feedly · RSS · Alerts</span>
        </div>
        <div class="veille-meta-item">
            <span class="veille-meta-label">Fréquence</span>
            <span class="veille-meta-value">Hebdomadaire</span>
        </div>
        <div class="veille-meta-item">
            <span class="veille-meta-label">Liens BTS</span>
            <span class="veille-meta-value">Bloc 2 + 3</span>
        </div>
    </div>
</div>

<h2 class="section-title">Comprendre la télémétrie F1 <small>// schéma data flow</small></h2>
<div class="telemetry-flow">
    <svg viewBox="0 0 1000 280" xmlns="http://www.w3.org/2000/svg" class="telemetry-flow-svg" aria-label="Schéma du flux de données télémétrique en Formule 1">
        <!-- définition flèche -->
        <defs>
            <marker id="arrow" viewBox="0 0 10 10" refX="9" refY="5" markerWidth="6" markerHeight="6" orient="auto-start-reverse">
                <path d="M0,0 L10,5 L0,10 z" fill="#00d2be"/>
            </marker>
            <linearGradient id="flowGlow" x1="0" y1="0" x2="1" y2="0">
                <stop offset="0%"  stop-color="#00d2be" stop-opacity="0.0"/>
                <stop offset="50%" stop-color="#00d2be" stop-opacity="0.9"/>
                <stop offset="100%" stop-color="#00d2be" stop-opacity="0.0"/>
            </linearGradient>
        </defs>

        <!-- lignes de connexion -->
        <line x1="155" y1="140" x2="245" y2="140" stroke="#00d2be" stroke-width="1.5" marker-end="url(#arrow)"/>
        <line x1="355" y1="140" x2="445" y2="140" stroke="#00d2be" stroke-width="1.5" marker-end="url(#arrow)"/>
        <line x1="555" y1="140" x2="645" y2="140" stroke="#00d2be" stroke-width="1.5" marker-end="url(#arrow)"/>
        <line x1="755" y1="140" x2="845" y2="140" stroke="#00d2be" stroke-width="1.5" marker-end="url(#arrow)"/>

        <!-- impulsion lumineuse animée -->
        <rect x="150" y="138" width="700" height="4" fill="url(#flowGlow)" class="telemetry-pulse"/>

        <!-- Étape 1 : Capteurs -->
        <g class="flow-node">
            <rect x="40" y="80" width="115" height="120" rx="4" fill="#161c24" stroke="#2a3540"/>
            <text x="97.5" y="110" text-anchor="middle" font-family="JetBrains Mono" font-size="22" fill="#00d2be">⚙</text>
            <text x="97.5" y="145" text-anchor="middle" font-family="Orbitron" font-size="13" fill="#e6edf3" font-weight="700">CAPTEURS</text>
            <text x="97.5" y="165" text-anchor="middle" font-family="JetBrains Mono" font-size="9" fill="#8b96a3">150 - 300</text>
            <text x="97.5" y="180" text-anchor="middle" font-family="JetBrains Mono" font-size="9" fill="#8b96a3">embarqués</text>
        </g>

        <!-- Étape 2 : ECU -->
        <g class="flow-node">
            <rect x="245" y="80" width="110" height="120" rx="4" fill="#161c24" stroke="#2a3540"/>
            <text x="300" y="110" text-anchor="middle" font-family="JetBrains Mono" font-size="22" fill="#00d2be">▤</text>
            <text x="300" y="145" text-anchor="middle" font-family="Orbitron" font-size="13" fill="#e6edf3" font-weight="700">ECU</text>
            <text x="300" y="165" text-anchor="middle" font-family="JetBrains Mono" font-size="9" fill="#8b96a3">McLaren</text>
            <text x="300" y="180" text-anchor="middle" font-family="JetBrains Mono" font-size="9" fill="#8b96a3">TAG-320</text>
        </g>

        <!-- Étape 3 : Radio -->
        <g class="flow-node">
            <rect x="445" y="80" width="110" height="120" rx="4" fill="#161c24" stroke="#2a3540"/>
            <text x="500" y="110" text-anchor="middle" font-family="JetBrains Mono" font-size="22" fill="#00d2be">((•))</text>
            <text x="500" y="145" text-anchor="middle" font-family="Orbitron" font-size="13" fill="#e6edf3" font-weight="700">RADIO</text>
            <text x="500" y="165" text-anchor="middle" font-family="JetBrains Mono" font-size="9" fill="#8b96a3">chiffrée</text>
            <text x="500" y="180" text-anchor="middle" font-family="JetBrains Mono" font-size="9" fill="#8b96a3">latence 2 ms</text>
        </g>

        <!-- Étape 4 : Pit-wall / Cloud -->
        <g class="flow-node">
            <rect x="645" y="80" width="110" height="120" rx="4" fill="#161c24" stroke="#2a3540"/>
            <text x="700" y="110" text-anchor="middle" font-family="JetBrains Mono" font-size="22" fill="#00d2be">☁</text>
            <text x="700" y="145" text-anchor="middle" font-family="Orbitron" font-size="13" fill="#e6edf3" font-weight="700">CLOUD</text>
            <text x="700" y="165" text-anchor="middle" font-family="JetBrains Mono" font-size="9" fill="#8b96a3">AWS / ML</text>
            <text x="700" y="180" text-anchor="middle" font-family="JetBrains Mono" font-size="9" fill="#8b96a3">SageMaker</text>
        </g>

        <!-- Étape 5 : Dashboard -->
        <g class="flow-node">
            <rect x="845" y="80" width="115" height="120" rx="4" fill="#161c24" stroke="#00d2be" stroke-width="1.5"/>
            <text x="902.5" y="110" text-anchor="middle" font-family="JetBrains Mono" font-size="22" fill="#00d2be">▦</text>
            <text x="902.5" y="145" text-anchor="middle" font-family="Orbitron" font-size="13" fill="#00d2be" font-weight="700">DASHBOARD</text>
            <text x="902.5" y="165" text-anchor="middle" font-family="JetBrains Mono" font-size="9" fill="#8b96a3">ingénieurs</text>
            <text x="902.5" y="180" text-anchor="middle" font-family="JetBrains Mono" font-size="9" fill="#8b96a3">+ broadcast</text>
        </g>

        <!-- débits affichés sous les flèches -->
        <text x="200" y="225" text-anchor="middle" font-family="JetBrains Mono" font-size="10" fill="#5a6573">signaux analogiques</text>
        <text x="400" y="225" text-anchor="middle" font-family="JetBrains Mono" font-size="10" fill="#5a6573">~1.5M pts/sec</text>
        <text x="600" y="225" text-anchor="middle" font-family="JetBrains Mono" font-size="10" fill="#5a6573">4G/5G dédié</text>
        <text x="800" y="225" text-anchor="middle" font-family="JetBrains Mono" font-size="10" fill="#5a6573">API / WebSocket</text>

        <!-- titre + sous-titre -->
        <text x="500" y="30" text-anchor="middle" font-family="Orbitron" font-size="14" fill="#e6edf3" font-weight="700" letter-spacing="2">CHAÎNE D'ACQUISITION TÉLÉMÉTRIQUE</text>
        <text x="500" y="50" text-anchor="middle" font-family="JetBrains Mono" font-size="10" fill="#8b96a3" letter-spacing="2">de la monoplace au mur des stands — en temps réel</text>
    </svg>
    <p class="telemetry-flow-caption">
        <span class="telemetry-flow-bts">// lien BTS SIO :</span>
        chaque maillon de la chaîne fait écho à un bloc SLAM — capteurs &amp; ECU (B1 gestion patrimoine), radio (B3 cybersécurité),
        cloud &amp; pipeline data (B2 développement &amp; bases de données), dashboard (B2 mise à disposition d'un service).
    </p>
</div>

<h2 class="section-title">Méthodologie <small>// process</small></h2>
<div class="veille-method">
    <div class="veille-step">
        <div class="veille-step-num">01</div>
        <h3>Collecte</h3>
        <p>Agrégation de flux RSS via <strong>Feedly</strong> + alertes <strong>Google Alerts</strong> sur des mots-clés ciblés (telemetry, F1 data, IoT motorsport, OpenF1...).</p>
    </div>
    <div class="veille-step">
        <div class="veille-step-num">02</div>
        <h3>Sélection</h3>
        <p>Tri hebdomadaire des articles : pertinence par rapport au BTS SIO (data, IoT, sécurité, dev), qualité et actualité de la source.</p>
    </div>
    <div class="veille-step">
        <div class="veille-step-num">03</div>
        <h3>Synthèse</h3>
        <p>Rédaction d'une fiche par article retenu : résumé, angle BTS SIO, lien source. Production d'un livrable consultable ici.</p>
    </div>
    <div class="veille-step">
        <div class="veille-step-num">04</div>
        <h3>Restitution</h3>
        <p>Publication sur cette page + intégration dans la documentation du portfolio. Sert de support à l'épreuve E6.</p>
    </div>
</div>

<!-- =========================================================
     CIRCUIT SUZUKA (JAPON) + STATS LIVE (simulation pédagogique)
     ========================================================= -->
<h2 class="section-title">Live track <small>// circuit de Suzuka — stats simulées</small></h2>
<div class="track-live">
    <div class="track-live-head">
        <div class="track-live-head-left">
            <span class="track-live-badge">
                <span class="track-live-dot"></span> LIVE SIM
            </span>
            <h3>Grand Prix du Japon — Suzuka</h3>
            <p>Démonstration de visualisation télémétrique sur le seul circuit en <strong>forme de 8</strong> du calendrier F1. Données simulées côté navigateur pour illustrer ce qu'on peut faire avec une API type <strong>OpenF1</strong>.</p>
        </div>
        <dl class="track-live-info">
            <div><dt>Longueur</dt><dd>5,807 km</dd></div>
            <div><dt>Tours</dt><dd>53</dd></div>
            <div><dt>Virages</dt><dd>18</dd></div>
            <div><dt>Record</dt><dd>1:30.983</dd></div>
        </dl>
    </div>

    <div class="track-live-body">
        <!-- Carte circuit Suzuka (figure-of-eight) -->
        <div class="track-map">
            <?php
                // Path SVG officiel Suzuka (inkscape:original-d de path3610 du fichier Wikipedia Commons
                // créé par Will Pittenger, CC-BY-SA 3.0). On l'utilise comme base précise pour dessiner
                // notre propre tracé stylisé — pas d'image affichée, c'est mon SVG qui est rendu.
                $suzukaPath = 'm -28.87484,911.44041 c -45.786359,6.76483 -91.38624,14.77857 -137.15549,21.65613 -32.90422,4.94438 -65.85991,10.02512 -98.86494,13.8097 -6.22709,0.71404 -12.60683,0.29749 -18.83142,-0.31385 -5.49273,-0.53946 -11.13885,-1.32986 -16.32056,-3.13857 -5.9079,-2.06219 -11.85737,-4.83151 -16.94828,-8.47414 -7.04489,-5.04074 -13.71207,-11.06988 -19.45913,-17.57599 -5.34255,-6.04817 -10.35741,-12.91669 -13.80971,-20.08685 -1.98789,-4.12869 -2.51085,-9.1976 -2.51085,-13.8097 0,-5.22208 0.56161,-10.92803 2.51085,-15.69285 1.81704,-4.44165 5.35878,-8.44458 8.788,-11.92656 3.37101,-3.42287 7.36892,-6.58553 11.6127,-8.788 4.02112,-2.08691 8.66463,-3.4065 13.182,-4.08014 7.4092,-1.10488 15.05871,-0.98544 22.5977,-1.25543 30.4377,-1.09006 61.05671,-0.89222 91.33237,-2.82471 4.14399,-0.26451 8.257,-1.88563 11.92657,-3.76628 4.69995,-2.40873 9.37711,-5.45775 13.18199,-9.10186 3.62307,-3.46998 6.48174,-7.90369 9.10185,-12.24042 3.44779,-5.70669 5.30414,-12.49954 9.10185,-17.88984 2.68867,-3.81617 6.42891,-7.20765 10.35728,-9.72957 4.54577,-2.91827 9.84729,-5.22724 15.06514,-6.591 3.98862,-1.04248 8.38034,-0.77503 12.55428,-0.62771 4.71868,0.16654 9.52954,0.46671 14.12356,1.56928 13.714299,3.29143 27.094234,8.22276 40.801404,11.61271 5.751961,1.42253 11.747408,2.93468 17.57599,2.82471 5.261031,-0.0993 10.753541,-1.53718 15.692848,-3.45242 5.313354,-2.06028 10.522722,-5.03821 15.065134,-8.47414 3.617869,-2.73659 6.751829,-6.3257 9.4157091,-10.04342 6.8564477,-9.56889 12.139597,-20.38019 19.1452749,-29.81641 3.246983,-4.37349 7.241351,-8.42419 11.612707,-11.61271 4.521257,-3.29786 9.835697,-5.7659 15.065134,-7.84643 4.500129,-1.79037 9.329958,-3.08148 14.123564,-3.76628 5.459055,-0.77986 11.230826,-1.35945 16.634419,-0.62771 4.63983,0.62831 9.248651,2.64324 13.495849,4.70785 3.285369,1.59705 6.458044,3.74828 9.101852,6.27714 4.574901,4.37599 8.532692,9.49133 12.554275,14.43742 5.08027,6.24815 9.5771,12.9803 14.75128,19.14528 4.66001,5.55235 9.03983,11.75005 14.75128,16.0067 5.37816,4.00825 12.11653,6.59157 18.51756,8.788 4.2701,1.46523 8.97179,2.05561 13.49585,2.19699 5.51937,0.17248 11.37929,0.27733 16.63442,-1.25542 7.29915,-2.12892 14.37645,-5.85685 21.02841,-9.72957 8.62241,-5.0199 17.10624,-10.60396 24.7947,-16.94828 7.27206,-6.00072 13.88991,-12.96956 20.08685,-20.08684 4.36958,-5.01852 8.17878,-10.61281 11.61271,-16.32056 4.30787,-7.16039 8.58488,-14.53963 11.6127,-22.28385 2.41237,-6.17011 3.4702,-12.90984 4.70786,-19.45913 1.2732,-6.73732 2.31478,-13.56758 2.82471,-20.4007 0.53626,-7.18583 0.80239,-14.47472 0.31386,-21.65613 -0.55766,-8.19758 -1.43055,-16.53116 -3.45243,-24.48084 -2.58135,-10.1494 -6.75044,-19.93311 -10.35728,-29.81642 -9.67977,-26.5241 -21.22782,-52.7428 -29.50255,-79.40581 -1.14098,-3.67649 -0.23522,-8.0375 1.25542,-11.6127 11.90059,-28.54283 24.90784,-57.2885 38.91827,-84.74138 1.47318,-2.88663 4.66305,-5.0018 7.53256,-6.27714 2.77991,-1.23552 6.41341,-2.21541 9.41571,-1.25543 63.74462,20.38229 128.45146,41.37238 190.82504,65.28225 6.67495,2.55873 11.74735,8.6103 16.32056,14.12356 14.2582,17.18906 25.61519,37.5607 40.17369,53.9834 2.59901,2.93181 7.5547,4.02341 11.29885,4.08014 3.16071,0.0479 7.16722,-1.56776 9.41571,-3.76629 2.45936,-2.40471 4.27349,-6.56855 4.70785,-10.04342 0.40259,-3.22075 -0.70247,-6.99901 -2.197,-10.04342 -4.1549,-8.46368 -10.0253,-16.21039 -14.75127,-24.48084 -6.99136,-12.23487 -13.96329,-24.50513 -20.40071,-37.03512 -5.2799,-10.27695 -10.95415,-20.53678 -14.75127,-31.3857 -3.52621,-10.07488 -5.99654,-20.81396 -7.21871,-31.3857 -0.87021,-7.52735 -0.0783,-15.37604 0.94157,-22.91156 0.8633,-6.37881 2.50383,-12.77036 4.70785,-18.83141 3.65465,-10.05028 7.59638,-20.21652 12.86814,-29.50256 6.13171,-10.80081 13.73015,-20.89965 21.34227,-30.75798 5.15139,-6.67147 10.86898,-12.98898 16.94828,-18.83142 10.03202,-9.64117 20.36719,-19.13949 31.38569,-27.61941 10.32378,-7.94526 21.18093,-15.52625 32.64113,-21.65613 11.03288,-5.90131 22.88502,-10.77714 34.83812,-14.43742 9.91227,-3.03534 20.42821,-4.51429 30.75798,-5.64943 8.71089,-0.95724 17.64297,-1.57163 26.36399,-0.62771 35.74205,3.86855 71.42677,11.94246 107.02522,15.06513 6.14452,0.53899 12.77137,-1.38845 18.2037,-4.08014 6.18038,-3.06235 12.21296,-7.81307 16.63442,-13.18199 5.8312,-7.08074 10.53859,-15.63372 14.12357,-24.16698 3.84297,-9.14735 6.81627,-19.10023 8.16028,-28.87484 0.95761,-6.96443 1.01054,-14.83993 -1.25543,-21.34228 -2.5465,-7.30735 -7.70465,-14.6095 -13.18199,-20.08684 -3.51989,-3.51989 -8.94717,-5.4124 -13.80971,-6.90486 -5.70398,-1.750726 -11.93621,-3.041996 -17.88985,-2.824709 -8.37916,0.30581 -16.96956,2.062731 -25.10855,4.393999 -12.68019,3.63202 -24.99345,8.75133 -37.34898,13.49585 -13.79922,5.2989 -27.58708,10.68856 -41.11526,16.63442 -12.41733,5.45761 -24.71498,11.26611 -36.72127,17.57599 -16.65931,8.75526 -33.46601,17.4459 -49.27554,27.61941 -18.81935,12.11034 -36.87615,25.54647 -54.61111,39.23212 -18.46321,14.24762 -35.93445,29.77825 -53.9834,44.56769 -20.76469,17.01474 -41.82698,33.6699 -62.45753,50.84483 -21.21705,17.66319 -42.27235,35.53139 -63.08525,53.66954 -31.28736,27.26649 -63.05016,54.26436 -93.21552,82.54438 -3.31272,3.10567 -5.92092,7.29505 -7.21871,11.6127 -4.1424,13.78143 -7.26331,28.31049 -9.10185,42.68455 -1.61388,12.61764 -2.6735,25.66298 -1.25543,38.29055 2.97593,26.49993 8.79863,52.90789 14.43742,79.09195 4.92773,22.88224 13.36877,45.15661 17.26213,68.10696 2.06992,12.20163 1.5234,25.25734 0.62772,37.34898 -0.15051,2.03192 -1.8921,4.26796 -3.76629,5.02171 -7.75075,3.11715 -17.63824,3.08453 -25.10855,6.591 -2.78235,1.306 -5.52681,4.8423 -5.64943,7.84642 -0.29586,7.24854 2.27126,15.19919 2.894,22.91156 0.73731,9.13129 0.94222,18.6285 -0.31386,27.61941 -0.73168,5.23728 -1.9704,10.17563 -4.14942,15.06514 -2.11036,4.73544 -4.37031,9.49117 -7.21871,13.80971 -3.63798,5.51564 -7.56443,11.07121 -12.24043,15.69284 -4.32123,4.27099 -9.47717,7.89216 -14.75127,10.985 -11.67417,6.84596 -23.73445,13.33129 -36.09355,18.83141 -7.62313,3.39249 -15.78725,5.66192 -23.85313,7.84643 -6.99925,1.89563 -14.1575,3.33713 -21.34228,4.394 -70.33789,10.3466 -140.885016,19.42373 -211.22573,29.81641 z';
            ?>
            <svg viewBox="0 0 1272.6819 983.40576" xmlns="http://www.w3.org/2000/svg"
                 preserveAspectRatio="xMidYMid meet" aria-label="Tracé du circuit de Suzuka">

                <!-- Grille subtile de fond -->
                <defs>
                    <pattern id="grid-suzuka" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M 60 0 L 0 0 0 60" fill="none" stroke="#00d2be" stroke-opacity="0.04" stroke-width="1"/>
                    </pattern>
                </defs>
                <rect width="1272.6819" height="983.40576" fill="url(#grid-suzuka)"/>

                <!-- Titre + drapeau Japon stylisé -->
                <g>
                    <circle cx="60" cy="60" r="22" fill="#0a0e12" stroke="#fff" stroke-width="1.5"/>
                    <circle cx="60" cy="60" r="13" fill="#ff3860"/>
                    <text x="100" y="56" font-family="Orbitron" font-size="28" font-weight="900"
                          fill="#e6edf3" letter-spacing="6">SUZUKA</text>
                    <text x="100" y="82" font-family="JetBrains Mono" font-size="14" fill="#5a6573" letter-spacing="3">
                        JAPAN GRAND PRIX · 5.807 KM · 18 TURNS · FIGURE-OF-EIGHT
                    </text>
                </g>

                <!-- Tracé : on calque le path officiel dans le repère du fichier source -->
                <g transform="translate(371.29038,-31.096124)">
                    <!-- Glow halo discret -->
                    <path d="<?= $suzukaPath ?>"
                          fill="none" stroke="#00d2be" stroke-width="36"
                          stroke-linecap="round" stroke-linejoin="round" opacity="0.10"/>
                    <!-- Asphalte (gris foncé, large) -->
                    <path d="<?= $suzukaPath ?>"
                          fill="none" stroke="#2a2f36" stroke-width="22"
                          stroke-linecap="round" stroke-linejoin="round"/>
                    <!-- Bord intérieur (bandage clair) -->
                    <path d="<?= $suzukaPath ?>"
                          fill="none" stroke="#1d242d" stroke-width="14"
                          stroke-linecap="round" stroke-linejoin="round"/>
                    <!-- Ligne médiane pointillée cyan (le path d'animation aussi) -->
                    <path id="circuit-track" d="<?= $suzukaPath ?>"
                          fill="none" stroke="#00d2be" stroke-width="1.5"
                          stroke-dasharray="3 14" opacity="0.6"/>

                    <!-- Voiture animée -->
                    <g id="car-marker">
                        <circle r="32" fill="none" stroke="#00d2be" stroke-width="3" opacity="0.5">
                            <animate attributeName="r" values="22;42;22" dur="1.5s" repeatCount="indefinite"/>
                            <animate attributeName="opacity" values="0.7;0;0.7" dur="1.5s" repeatCount="indefinite"/>
                        </circle>
                        <circle r="16" fill="#00d2be" stroke="#0a0e12" stroke-width="4">
                            <animate attributeName="r" values="16;19;16" dur="1s" repeatCount="indefinite"/>
                        </circle>
                    </g>
                </g>

                <!-- Annotations virages signature (positions calées sur le tracé visible) -->
                <g font-family="JetBrains Mono" font-size="16" fill="#8b96a3" letter-spacing="1">
                    <text x="240" y="930" text-anchor="middle">Turn 1</text>
                    <text x="500" y="430" text-anchor="middle">Esses</text>
                    <text x="800" y="280" text-anchor="middle">Dunlop</text>
                    <text x="950" y="365" text-anchor="middle">Degner</text>
                    <text x="1110" y="200" text-anchor="middle">Hairpin</text>
                    <text x="430" y="845" text-anchor="middle">Spoon</text>
                    <text x="540" y="585" text-anchor="middle">130R</text>
                    <text x="700" y="785" text-anchor="middle">Casio Triangle</text>
                </g>

                <!-- Indicateurs de secteurs -->
                <g font-family="JetBrains Mono" font-size="15">
                    <circle cx="640" cy="430" r="6" fill="#00d2be"/>
                    <text x="655" y="436" fill="#00d2be">S1</text>
                    <circle cx="1000" cy="380" r="6" fill="#ffd966"/>
                    <text x="1015" y="386" fill="#ffd966">S2</text>
                    <circle cx="480" cy="800" r="6" fill="#ff3860"/>
                    <text x="495" y="806" fill="#ff3860">S3</text>
                </g>

                <!-- Ligne start/finish (damier) -->
                <g transform="translate(345, 905) rotate(90)">
                    <rect x="-20" y="-4" width="6" height="8" fill="#fff"/>
                    <rect x="-14" y="-4" width="6" height="8" fill="#0a0e12"/>
                    <rect x="-8"  y="-4" width="6" height="8" fill="#fff"/>
                    <rect x="-2"  y="-4" width="6" height="8" fill="#0a0e12"/>
                    <rect x="4"   y="-4" width="6" height="8" fill="#fff"/>
                    <rect x="10"  y="-4" width="6" height="8" fill="#0a0e12"/>
                    <rect x="-20" y="-12" width="6" height="8" fill="#0a0e12"/>
                    <rect x="-14" y="-12" width="6" height="8" fill="#fff"/>
                    <rect x="-8"  y="-12" width="6" height="8" fill="#0a0e12"/>
                    <rect x="-2"  y="-12" width="6" height="8" fill="#fff"/>
                    <rect x="4"   y="-12" width="6" height="8" fill="#0a0e12"/>
                    <rect x="10"  y="-12" width="6" height="8" fill="#fff"/>
                </g>
                <text x="345" y="975" text-anchor="middle" font-family="JetBrains Mono" font-size="13"
                      fill="#fff" letter-spacing="3">START / FINISH</text>
            </svg>
        </div>

        <!-- Panneau de stats live -->
        <aside class="track-stats">
            <div class="track-stat">
                <span class="track-stat-label">Vitesse</span>
                <div class="track-stat-bar">
                    <div class="track-stat-bar-fill" id="stat-speed-bar"></div>
                </div>
                <div class="track-stat-line">
                    <span class="track-stat-value" id="stat-speed">0</span>
                    <span class="track-stat-unit">km/h</span>
                </div>
            </div>
            <div class="track-stat">
                <span class="track-stat-label">Régime moteur</span>
                <div class="track-stat-bar">
                    <div class="track-stat-bar-fill track-stat-bar-fill-rpm" id="stat-rpm-bar"></div>
                </div>
                <div class="track-stat-line">
                    <span class="track-stat-value" id="stat-rpm">0</span>
                    <span class="track-stat-unit">tr/min</span>
                </div>
            </div>
            <div class="track-stat track-stat-grid">
                <div class="track-stat-mini">
                    <span class="track-stat-label">Rapport</span>
                    <span class="track-stat-value" id="stat-gear">N</span>
                </div>
                <div class="track-stat-mini">
                    <span class="track-stat-label">Tour</span>
                    <span class="track-stat-value" id="stat-lap">1<small>/78</small></span>
                </div>
                <div class="track-stat-mini">
                    <span class="track-stat-label">Secteur</span>
                    <span class="track-stat-value" id="stat-sector">S1</span>
                </div>
                <div class="track-stat-mini">
                    <span class="track-stat-label">DRS</span>
                    <span class="track-stat-value" id="stat-drs" data-state="off">OFF</span>
                </div>
            </div>
            <div class="track-stat">
                <span class="track-stat-label">Pédales</span>
                <div class="track-pedals">
                    <div class="pedal pedal-throttle">
                        <span>THR</span>
                        <div class="pedal-bar"><div class="pedal-bar-fill" id="pedal-throttle"></div></div>
                    </div>
                    <div class="pedal pedal-brake">
                        <span>BRK</span>
                        <div class="pedal-bar"><div class="pedal-bar-fill" id="pedal-brake"></div></div>
                    </div>
                </div>
            </div>
            <div class="track-stat-footer">
                <span class="track-stat-foot-label">Dernier tour</span>
                <span class="track-stat-foot-value" id="stat-laptime">--:--.---</span>
            </div>
        </aside>
    </div>
</div>

<h2 class="section-title">Sources suivies <small>// <?= count($sources) ?> sources</small></h2>
<div class="sources-grid">
    <?php foreach ($sources as $s): ?>
        <a href="<?= htmlspecialchars($s['url']) ?>" target="_blank" rel="noopener" class="source-tile">
            <div class="source-tile-head">
                <span class="source-tile-type"><?= htmlspecialchars($s['type']) ?></span>
                <span class="source-tile-arrow">→</span>
            </div>
            <h3 class="source-tile-name"><?= htmlspecialchars($s['nom']) ?></h3>
            <p class="source-tile-theme"><?= htmlspecialchars($s['theme']) ?></p>
            <p class="source-tile-host">
                <?= htmlspecialchars(parse_url($s['url'], PHP_URL_HOST) ?? $s['url']) ?>
            </p>
        </a>
    <?php endforeach; ?>
</div>

<h2 class="section-title">Articles &amp; synthèses <small>// <?= count($articles) ?> publiés</small></h2>
<div class="veille-timeline">
    <?php foreach ($articles as $a): ?>
        <article class="veille-entry">
            <div class="veille-entry-date">
                <span class="veille-entry-day"><?= htmlspecialchars(date('d', strtotime($a['date']))) ?></span>
                <span class="veille-entry-month"><?= htmlspecialchars(strtoupper(date('M', strtotime($a['date'])))) ?></span>
                <span class="veille-entry-year"><?= htmlspecialchars(date('Y', strtotime($a['date']))) ?></span>
            </div>
            <div class="veille-entry-body">
                <span class="veille-entry-theme"><?= htmlspecialchars($a['theme']) ?></span>
                <h3 class="veille-entry-title"><?= htmlspecialchars($a['titre']) ?></h3>
                <p class="veille-entry-resume"><?= htmlspecialchars($a['resume']) ?></p>
                <?php if (!empty($a['angle_bts'])): ?>
                    <div class="veille-entry-bts">
                        <span class="veille-entry-bts-label">Lien BTS SIO</span>
                        <span><?= htmlspecialchars($a['angle_bts']) ?></span>
                    </div>
                <?php endif; ?>
                <?php if (!empty($a['source'])): ?>
                    <a href="<?= htmlspecialchars($a['source']) ?>"
                       target="_blank" rel="noopener"
                       class="veille-entry-source">
                        Source originale →
                    </a>
                <?php endif; ?>
            </div>
        </article>
    <?php endforeach; ?>
</div>
