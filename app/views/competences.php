<?php /** @var array $blocs */ ?>

<h1>// Compétences BTS SIO</h1>

<div class="intro-box">
    <h3>Référentiel officiel BTS SIO (2020)</h3>
    <p>
        Cartographie des compétences du référentiel BTS SIO option SLAM, mises en regard avec mes
        productions (projets BTS, missions LISI, formations).
    </p>
    <p style="margin-top: 1rem;">
        <strong style="color: var(--cyan);">3 blocs de compétences :</strong>
        Bloc 1 (Support, commun aux deux options),
        Bloc 2 (Conception/dev, spécifique SLAM),
        Bloc 3 (Cybersécurité, commun).
    </p>
</div>

<?php foreach ($blocs as $bloc): ?>
    <h2 class="section-title">
        Bloc <?= $bloc['numero'] ?> - <?= htmlspecialchars($bloc['titre']) ?>
        <small>// <?= strtoupper($bloc['option']) ?></small>
    </h2>

    <div class="competences-grid">
        <?php foreach ($bloc['items'] as $item): ?>
            <article class="competence-card">
                <div class="competence-code"><?= htmlspecialchars($item['code']) ?></div>
                <h3 class="competence-libelle"><?= htmlspecialchars($item['libelle']) ?></h3>
                <div class="competence-preuves">
                    <div class="competence-preuves-label">Productions associées</div>
                    <?php if (!empty($item['preuves'])): ?>
                        <ul>
                            <?php foreach ($item['preuves'] as $p): ?>
                                <li><?= htmlspecialchars($p) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <em style="color: var(--text-dim);">À compléter</em>
                    <?php endif; ?>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>

<div class="intro-box" style="margin-top: 3rem;">
    <h3>📌 À propos de cette page</h3>
    <p>
        Cette page sert de support à l'épreuve <strong style="color: var(--cyan);">E5 (Production
        et fourniture de services informatiques)</strong> et alimente le tableau de synthèse de
        l'épreuve <strong style="color: var(--cyan);">E6 (Parcours de professionnalisation)</strong>.
    </p>
</div>
