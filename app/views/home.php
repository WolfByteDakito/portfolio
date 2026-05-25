<?php /** @var bool $cvDisponible @var string $cvUrl @var string $photoUrl @var bool $photoDisponible */ ?>

<section class="pit-wall">
    <!-- Colonne gauche : ID card façon laissez-passer paddock -->
    <aside class="paddock-id">
        <div class="paddock-id-head">
            <span class="paddock-id-label">PADDOCK PASS</span>
            <span class="paddock-id-code">#AM-2026</span>
        </div>

        <div class="paddock-photo">
            <?php if ($photoDisponible): ?>
                <img src="<?= htmlspecialchars($photoUrl) ?>" alt="Alexis Mottner" loading="lazy">
            <?php else: ?>
                <div class="paddock-photo-placeholder">
                    <span class="paddock-photo-initials">AM</span>
                    <span class="paddock-photo-hint">// photo.jpg manquante</span>
                </div>
            <?php endif; ?>
            <div class="paddock-photo-corners">
                <span></span><span></span><span></span><span></span>
            </div>
        </div>

        <dl class="paddock-id-data">
            <div>
                <dt>Driver</dt>
                <dd>Alexis Mottner</dd>
            </div>
            <div>
                <dt>Team</dt>
                <dd>LISI Automotive</dd>
            </div>
            <div>
                <dt>Series</dt>
                <dd>BTS SIO · SLAM</dd>
            </div>
            <div>
                <dt>Season</dt>
                <dd>2024 → 2026</dd>
            </div>
        </dl>

        <div class="paddock-id-foot">
            <span class="paddock-id-foot-dot"></span>
            <span>ACCESS GRANTED — paddock + pit lane</span>
        </div>
    </aside>

    <!-- Colonne droite : pit-wall (board + console) -->
    <div class="pit-board">
        <div class="pit-board-stripes" aria-hidden="true">
            <span></span><span></span><span></span><span></span><span></span>
        </div>

        <span class="pit-board-tag">// PIT-WALL · ALEXIS.MOTTNER@WORK</span>

        <h1 class="pit-board-name">
            <span class="pit-board-first">Alexis</span>
            <span class="pit-board-last">Mottner</span>
        </h1>

        <p class="pit-board-role">Développeur en formation <span>// full-stack en construction</span></p>

        <p class="pit-board-typewriter">
            <span id="typewriter-text"></span><span class="cursor"></span>
        </p>

        <!-- Start lights (5 rouges + GO vert) -->
        <div class="start-lights" aria-hidden="true">
            <span></span><span></span><span></span><span></span><span></span>
            <span class="go">GO</span>
        </div>

        <div class="pit-board-cta">
            <a href="<?= BASE_URL ?>?page=projets" class="btn btn-primary">Voir mes projets</a>
            <a href="<?= BASE_URL ?>?page=contact" class="btn">Me contacter</a>
            <?php if ($cvDisponible): ?>
                <a href="<?= htmlspecialchars($cvUrl) ?>" class="btn" download>Télécharger CV</a>
            <?php else: ?>
                <a href="<?= BASE_URL ?>?page=profil" class="btn">Voir mon profil</a>
            <?php endif; ?>
        </div>

        <div class="pit-board-social">
            <a href="<?= htmlspecialchars(CANDIDAT['linkedin']) ?>" target="_blank" rel="noopener" class="social-link" aria-label="LinkedIn">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.063 2.063 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                </svg>
                <span>LinkedIn</span>
            </a>
            <a href="<?= htmlspecialchars(CANDIDAT['github']) ?>" target="_blank" rel="noopener" class="social-link" aria-label="GitHub">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                    <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                </svg>
                <span>GitHub</span>
            </a>
        </div>
    </div>
</section>

<!-- SOMMAIRE — grille de départ -->
<section class="grid-start">
    <h2 class="section-title">Sommaire <small>// starting grid</small></h2>
    <div class="grid-start-track">
        <a href="<?= BASE_URL ?>?page=profil" class="grid-slot">
            <span class="grid-slot-pos">P1</span>
            <div class="grid-slot-body">
                <h3>Profil</h3>
                <p>Étudiant BTS SIO SLAM, 3 ans d'alternance en support IT et automatisation.</p>
                <span class="grid-slot-cta">Découvrir →</span>
            </div>
        </a>
        <a href="<?= BASE_URL ?>?page=projets" class="grid-slot">
            <span class="grid-slot-pos">P2</span>
            <div class="grid-slot-body">
                <h3>Projets</h3>
                <p>GSB en PHP POO, scripts statistiques NX en PowerShell, ce portfolio…</p>
                <span class="grid-slot-cta">Explorer →</span>
            </div>
        </a>
        <a href="<?= BASE_URL ?>?page=contact" class="grid-slot">
            <span class="grid-slot-pos">P3</span>
            <div class="grid-slot-body">
                <h3>Objectif</h3>
                <p>BUT Informatique en alternance dès septembre 2026 — full-stack.</p>
                <span class="grid-slot-cta">Discuter →</span>
            </div>
        </a>
    </div>
</section>

<script>
window.typewriterPhrases = [
    "> Étudiant BTS SIO SLAM @ Lycée Condorcet",
    "> Apprenti développeur full-stack",
    "> 3 ans d'alternance chez LISI Automotive",
    "> Passionné de F1 et de tech",
];
</script>
