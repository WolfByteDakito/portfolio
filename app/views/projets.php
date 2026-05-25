<?php /** @var array $projets @var array $categories */ ?>

<h1>// Projets</h1>
<p style="color: var(--text-muted); margin-bottom: 2rem;">
    Sélection de projets réalisés en formation, en entreprise et à titre personnel.
    <strong style="color: var(--cyan);">Clique sur un projet</strong> pour voir le déroulement détaillé.
</p>

<div class="projects-filter" id="projects-filter">
    <?php foreach ($categories as $key => $label): ?>
        <button class="filter-btn <?= $key === 'all' ? 'is-active' : '' ?>" data-filter="<?= $key ?>">
            <?= htmlspecialchars($label) ?>
        </button>
    <?php endforeach; ?>
</div>

<div class="cards-grid" id="projects-grid">
    <?php foreach ($projets as $i => $p):
        $statut    = $p['statut'] ?? 'production';
        $isPending = $statut === 'a_completer';
    ?>
        <a href="<?= BASE_URL ?>?page=projet&slug=<?= urlencode($p['slug']) ?>"
           class="card project-card project-link <?= $isPending ? 'is-pending' : '' ?>"
           data-category="<?= htmlspecialchars($p['categorie']) ?>">

            <div class="card-corner">
                <?php if ($isPending): ?>
                    <span class="status-badge warn">À COMPLÉTER</span>
                <?php else: ?>
                    [<?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?>]
                <?php endif; ?>
            </div>

            <div class="project-image"><?= $p['icon'] ?></div>

            <h3><?= htmlspecialchars($p['titre']) ?></h3>

            <div class="project-meta">
                <span class="project-meta-item">
                    <span class="project-meta-label">Contexte</span>
                    <?= htmlspecialchars($p['contexte']) ?>
                </span>
                <span class="project-meta-item">
                    <span class="project-meta-label">Période</span>
                    <?= htmlspecialchars($p['duree']) ?>
                </span>
            </div>

            <p style="color: var(--text-muted); font-size: 0.95rem; margin-top: 1rem;">
                <?= htmlspecialchars($p['description']) ?>
            </p>

            <div class="project-tags">
                <?php foreach ($p['technos'] as $t): ?>
                    <span class="project-tag"><?= htmlspecialchars($t) ?></span>
                <?php endforeach; ?>
            </div>

            <?php if (!empty($p['competences_bts'])): ?>
                <div class="project-section">
                    <div class="project-section-label">Compétences BTS SIO</div>
                    <div class="project-bts-tags">
                        <?php foreach ($p['competences_bts'] as $c): ?>
                            <span class="bts-tag"><?= htmlspecialchars($c) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="project-cta">
                Voir le déroulement détaillé →
            </div>
        </a>
    <?php endforeach; ?>
</div>
