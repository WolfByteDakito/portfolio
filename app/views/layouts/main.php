<?php /** @var string $content @var string $currentPage @var string $pageTitle */ ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio d'Alexis Mottner - Étudiant BTS SIO SLAM au Lycée Condorcet de Belfort, en alternance chez LISI Automotive. Futur développeur full-stack.">
    <meta name="author" content="Alexis Mottner">
    <meta name="keywords" content="Alexis Mottner, portfolio, BTS SIO, SLAM, développeur, full-stack, Belfort, alternance, LISI Automotive">
    <title><?= htmlspecialchars($pageTitle) ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="<?= ASSETS_URL ?>images/favicon.svg">

    <!-- Open Graph (partage LinkedIn, Twitter, etc.) -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta property="og:description" content="Portfolio d'Alexis Mottner - Étudiant BTS SIO SLAM, futur développeur full-stack">
    <meta property="og:locale" content="fr_FR">
    <meta name="twitter:card" content="summary">

    <!-- Polices : tech + monospace -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;900&family=Rajdhani:wght@300;500;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">

    <?php
        // Cache-bust automatique : utilise le mtime des fichiers
        $cssPath = ROOT_PATH . '/public/assets/css/style.css';
        $jsPath  = ROOT_PATH . '/public/assets/js/main.js';
        $cssVer  = file_exists($cssPath) ? filemtime($cssPath) : time();
        $jsVer   = file_exists($jsPath)  ? filemtime($jsPath)  : time();
    ?>
    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/style.css?v=<?= $cssVer ?>">
</head>
<body>

<!-- Loading screen (cockpit boot) -->
<div id="loading-screen">
    <div class="loader-content">
        <div class="loader-logo">AM</div>
        <div class="loader-bar"><div class="loader-bar-fill"></div></div>
        <div class="loader-text">SYSTEM BOOT...</div>
    </div>
</div>

<?php require VIEW_PATH . '/partials/header.php'; ?>

<main class="main-content">
    <?= $content ?>
</main>

<?php require VIEW_PATH . '/partials/footer.php'; ?>

<script src="<?= ASSETS_URL ?>js/main.js?v=<?= $jsVer ?>"></script>
</body>
</html>
