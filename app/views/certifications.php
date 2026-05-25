<?php /** @var array $certifs */ ?>

<h1>// Certifications</h1>

<p style="color: var(--text-muted); margin-bottom: 2rem;">
    Formations et certifications obtenues au cours de mon parcours.
</p>

<div class="cards-grid">
    <?php foreach ($certifs as $i => $c): ?>
        <article class="card">
            <div class="card-corner">[<?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?>]</div>
            <div class="project-image"><?= $c['icon'] ?></div>
            <h3><?= htmlspecialchars($c['titre']) ?></h3>
            <p style="color: var(--cyan); font-family: var(--font-mono); font-size: 0.85rem; margin-bottom: 0.4rem;">
                <?= htmlspecialchars($c['organisme']) ?> &middot; <?= htmlspecialchars($c['date']) ?>
            </p>
            <p style="color: var(--text-muted);"><?= htmlspecialchars($c['description']) ?></p>
        </article>
    <?php endforeach; ?>

    <article class="card" style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; opacity: 0.7;">
        <div style="font-family: var(--font-mono); color: var(--text-dim); letter-spacing: 0.2em; margin-bottom: 0.5rem;">
            [ + ]
        </div>
        <h3 style="color: var(--text-muted);">À venir</h3>
        <p style="color: var(--text-dim); font-size: 0.9rem;">
            D'autres certifications seront ajoutées prochainement.
        </p>
    </article>
</div>
