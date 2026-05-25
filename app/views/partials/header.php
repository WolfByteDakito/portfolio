<?php /** @var string $currentPage */ ?>
<header class="site-header">
    <div class="header-inner">
        <a href="<?= BASE_URL ?>?page=accueil" class="logo">
            <span class="logo-bracket">[</span>
            <span class="logo-text">A.MOTTNER</span>
            <span class="logo-bracket">]</span>
            <span class="logo-status">ONLINE</span>
        </a>

        <button class="nav-toggle" aria-label="Menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        <nav class="main-nav">
            <ul>
                <?php foreach (Router::menu() as [$label, $slug]): ?>
                    <li>
                        <a href="<?= BASE_URL ?>?page=<?= $slug ?>"
                           class="nav-link <?= $currentPage === $slug ? 'is-active' : '' ?>">
                            <?= htmlspecialchars($label) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
    <!-- Bande HUD style cockpit -->
    <div class="hud-bar">
        <span class="hud-dot"></span>
        <span class="hud-label">PORTFOLIO_v1.0</span>
        <span class="hud-sep">//</span>
        <span class="hud-label">BTS_SIO_SLAM</span>
        <span class="hud-sep">//</span>
        <span class="hud-label">2024-2026</span>
    </div>
</header>
