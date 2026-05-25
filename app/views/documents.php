
<?php /** @var array $sections @var array $stats */ ?>

<h1>// Certifications</h1>

<div class="docs-hero">
    <div class="docs-hero-text">
        <p>
            Liste des <strong style="color: var(--cyan);">certifications et MOOC</strong> obtenus
            au cours de mon parcours. Chaque entrée indique l'organisme qui la délivre
            et le lien pour la passer.
        </p>
    </div>
    <div class="docs-hero-stats">
        <div class="docs-stat">
            <span class="docs-stat-value"><?= $stats['disponibles'] ?>/<?= $stats['total'] ?></span>
            <span class="docs-stat-label">disponibles</span>
        </div>
        <div class="docs-stat">
            <span class="docs-stat-value"><?= count($sections) ?></span>
            <span class="docs-stat-label">catégories</span>
        </div>
    </div>
</div>

<?php foreach ($sections as $key => $section): ?>
    <section class="docs-section docs-section-<?= htmlspecialchars($key) ?>">
        <header class="docs-section-head">
            <span class="docs-section-icon"><?= htmlspecialchars($section['icon']) ?></span>
            <div>
                <h2 class="docs-section-title"><?= htmlspecialchars($section['titre']) ?></h2>
                <p class="docs-section-sub"><?= htmlspecialchars($section['sous_titre']) ?></p>
            </div>
            <span class="docs-section-count"><?= count($section['docs']) ?></span>
        </header>

        <!-- Toutes les sections utilisent maintenant le même format "certif-card" (encadré façon BTS) -->
        <div class="certif-list">
            <?php foreach ($section['docs'] as $doc): ?>
                <?php $isCertif = ($key === 'certifications'); ?>
                <article class="certif-card <?= $doc['disponible'] ? 'is-available' : 'is-pending' ?>">
                    <div class="certif-card-frame">
                        <span class="certif-card-icon"><?= $doc['icon'] ?></span>
                        <div class="certif-card-headline">
                            <span class="certif-card-badge"><?= htmlspecialchars($doc['badge']) ?></span>
                            <h3 class="certif-card-title"><?= htmlspecialchars($doc['titre']) ?></h3>
                            <span class="certif-card-organisme">
                                <?php if ($isCertif): ?>
                                    par <strong><?= htmlspecialchars($doc['organisme'] ?? 'Organisme') ?></strong>
                                <?php else: ?>
                                    <strong><?= htmlspecialchars($doc['organisme'] ?? 'Document') ?></strong>
                                <?php endif; ?>
                            </span>
                        </div>
                        <div class="certif-card-status">
                            <?php if ($doc['disponible']): ?>
                                <span class="certif-status certif-status-ok">
                                    ✓ <?= $isCertif ? 'obtenue' : 'disponible' ?>
                                </span>
                            <?php else: ?>
                                <span class="certif-status certif-status-todo">
                                    ○ <?= $isCertif ? 'à passer' : 'à fournir' ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <p class="certif-card-desc"><?= htmlspecialchars($doc['description']) ?></p>

                    <dl class="certif-card-meta">
                        <div>
                            <dt><?= $isCertif ? 'Organisme' : 'Origine' ?></dt>
                            <dd><?= htmlspecialchars($doc['organisme'] ?? '—') ?></dd>
                        </div>
                        <div>
                            <dt><?= $isCertif ? 'Durée' : 'Format' ?></dt>
                            <dd><?= htmlspecialchars($doc['duree'] ?? '—') ?></dd>
                        </div>
                        <div>
                            <dt><?= $isCertif ? 'Niveau' : 'Statut' ?></dt>
                            <dd><?= htmlspecialchars($doc['niveau'] ?? '—') ?></dd>
                        </div>
                        <div>
                            <dt>Catégorie</dt>
                            <dd><?= htmlspecialchars($doc['badge']) ?></dd>
                        </div>
                    </dl>

                    <div class="certif-card-actions">
                        <?php if (!empty($doc['lien_passer'])): ?>
                            <a href="<?= htmlspecialchars($doc['lien_passer']) ?>"
                               target="_blank" rel="noopener"
                               class="btn">
                                Passer la certification
                            </a>
                        <?php endif; ?>
                        <?php if ($doc['disponible']): ?>
                            <a href="<?= htmlspecialchars($doc['url']) ?>"
                               class="btn btn-primary"
                               download>
                                ↓ Télécharger <?= $isCertif ? "l'attestation" : 'le PDF' ?>
                            </a>
                        <?php else: ?>
                            <span class="doc-pending-pill">
                                <span class="status-dot"></span>
                                <?= $isCertif ? 'ATTESTATION À VENIR' : 'À VENIR' ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
<?php endforeach; ?>

<div class="intro-box" style="margin-top: 3rem;">
    <h3>➕ D'autres certifications à venir</h3>
    <p style="font-family: var(--font-mono); font-size: 0.9rem; color: var(--text-muted);">
        Cette liste s'enrichit au fil de mon parcours. De nouvelles certifications viendront compléter cette page (cybersécurité, développement, bases de données).
    </p>
</div>
