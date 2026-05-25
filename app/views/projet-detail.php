<?php /** @var array $p */
$badgeStatut = '';
if (($p['statut'] ?? '') === 'a_completer') {
    $badgeStatut = '<span class="status-badge warn">FICHE À COMPLÉTER</span>';
}
?>

<a href="<?= BASE_URL ?>?page=projets" class="back-link">← Retour aux projets</a>

<header class="project-hero">
    <div class="project-hero-icon"><?= $p['icon'] ?></div>
    <div class="project-hero-text">
        <div class="project-hero-tag">
            <?= htmlspecialchars(strtoupper($p['categorie'])) ?>
            <?= $badgeStatut ?>
        </div>
        <h1><?= htmlspecialchars($p['titre']) ?></h1>
        <p class="project-hero-desc"><?= htmlspecialchars($p['description']) ?></p>

        <div class="project-meta" style="margin-top: 1.5rem;">
            <span class="project-meta-item">
                <span class="project-meta-label">Contexte</span>
                <?= htmlspecialchars($p['contexte']) ?>
            </span>
            <span class="project-meta-item">
                <span class="project-meta-label">Période</span>
                <?= htmlspecialchars($p['duree']) ?>
            </span>
            <span class="project-meta-item">
                <span class="project-meta-label">Rôle</span>
                <?= htmlspecialchars($p['role']) ?>
            </span>
        </div>

        <div class="project-tags" style="margin-top: 1.2rem;">
            <?php foreach ($p['technos'] as $t): ?>
                <span class="project-tag"><?= htmlspecialchars($t) ?></span>
            <?php endforeach; ?>
        </div>

        <?php
        // Vérification de la présence physique du dossier technique (.docx)
        $dossierUrl = null;
        if (!empty($p['dossier'])) {
            $dossierPath = ROOT_PATH . '/public/assets/documents/' . $p['dossier'];
            if (file_exists($dossierPath)) {
                $dossierUrl = ASSETS_URL . 'documents/' . rawurlencode($p['dossier']);
            }
        }
        ?>
        <?php if (!empty($p['github']) || $dossierUrl): ?>
            <div style="margin-top: 1.5rem; display: flex; gap: 0.8rem; flex-wrap: wrap;">
                <?php if (!empty($p['github'])): ?>
                    <a href="<?= htmlspecialchars($p['github']) ?>" target="_blank" rel="noopener" class="btn btn-primary">
                        Voir sur GitHub
                    </a>
                <?php endif; ?>
                <?php if ($dossierUrl): ?>
                    <a href="<?= $dossierUrl ?>" class="btn" download>
                        ↓ Dossier technique (.docx)
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</header>

<?php if (!empty($p['captures'])): ?>
    <h2 class="section-title">Captures d'écran <small>// screenshots</small></h2>
    <div class="captures-grid">
        <?php foreach ($p['captures'] as $img): ?>
            <a href="<?= ASSETS_URL ?>images/<?= htmlspecialchars($img) ?>" target="_blank" class="capture-card">
                <img src="<?= ASSETS_URL ?>images/<?= htmlspecialchars($img) ?>" alt="Capture <?= htmlspecialchars($p['titre']) ?>" loading="lazy">
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if (!empty($p['features'])): ?>
    <h2 class="section-title">Fonctionnalités principales <small>// features</small></h2>
    <div class="cards-grid">
        <?php foreach ($p['features'] as $i => $f): ?>
            <div class="card" style="padding: 1.2rem;">
                <div class="card-corner">[<?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?>]</div>
                <p style="color: var(--text); margin-top: 0.3rem;"><?= htmlspecialchars($f) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if (!empty($p['deroulement'])): ?>
    <h2 class="section-title">Déroulement du projet <small>// process</small></h2>
    <div class="timeline" style="margin-top: 1rem;">
        <?php foreach ($p['deroulement'] as $i => $etape): ?>
            <div class="timeline-item">
                <div class="timeline-date">ÉTAPE <?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
                <p style="color: var(--text); margin-top: 0.3rem;"><?= htmlspecialchars($etape) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if (!empty($p['difficultes']) || !empty($p['solutions'])): ?>
    <h2 class="section-title">Difficultés &amp; solutions <small>// learnings</small></h2>
    <div class="compare">
        <div>
            <h3>Difficultés rencontrées</h3>
            <?php if (!empty($p['difficultes'])): ?>
                <ul>
                    <?php foreach ($p['difficultes'] as $d): ?>
                        <li><?= htmlspecialchars($d) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p style="color: var(--text-dim); font-style: italic;">À compléter</p>
            <?php endif; ?>
        </div>
        <div>
            <h3>Solutions apportées</h3>
            <?php if (!empty($p['solutions'])): ?>
                <ul>
                    <?php foreach ($p['solutions'] as $s): ?>
                        <li><?= htmlspecialchars($s) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p style="color: var(--text-dim); font-style: italic;">À compléter</p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php if (!empty($p['comptes_demo'])): ?>
    <h2 class="section-title">Comptes de démonstration <small>// test access</small></h2>
    <div class="demo-accounts">
        <?php foreach ($p['comptes_demo'] as $compte): ?>
            <div class="demo-account">
                <div class="demo-account-head">
                    <span class="demo-account-key">Identifiant</span>
                    <code><?= htmlspecialchars($compte['login']) ?></code>
                </div>
                <div class="demo-account-head">
                    <span class="demo-account-key">Mot de passe</span>
                    <code><?= htmlspecialchars($compte['pwd']) ?></code>
                </div>
                <p class="demo-account-role"><?= htmlspecialchars($compte['role']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if (!empty($p['competences_bts'])): ?>
    <h2 class="section-title">Compétences BTS SIO mobilisées <small>// référentiel</small></h2>
    <div class="project-bts-tags" style="gap: 0.6rem;">
        <?php foreach ($p['competences_bts'] as $c): ?>
            <a href="<?= BASE_URL ?>?page=bts-sio#competences" class="bts-tag" style="font-size: 0.95rem; padding: 0.5rem 1rem; text-decoration: none;">
                <?= htmlspecialchars($c) ?>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if (!empty($p['livrables'])): ?>
    <h2 class="section-title">Livrables <small>// outputs</small></h2>
    <ul class="project-features" style="font-size: 1rem;">
        <?php foreach ($p['livrables'] as $l): ?>
            <li><?= htmlspecialchars($l) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (!empty($p['bilan'])): ?>
    <h2 class="section-title">Bilan personnel <small>// retour d'expérience</small></h2>
    <div class="intro-box">
        <p><?= nl2br(htmlspecialchars($p['bilan'])) ?></p>
    </div>
<?php endif; ?>

<div style="margin-top: 3rem; text-align: center;">
    <a href="<?= BASE_URL ?>?page=projets" class="btn">← Retour aux projets</a>
</div>
