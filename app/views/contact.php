<?php /** @var array $errors @var bool $success @var array $old */ ?>

<h1>// Contact</h1>
<p style="color: var(--text-muted); margin-bottom: 2.5rem;">
    Une question, un projet d'alternance, une opportunité ? N'hésite pas à me contacter.
</p>

<div class="contact-wrapper">
    <aside class="contact-info">
        <h3>Informations</h3>
        <p><strong>Nom</strong><?= htmlspecialchars(CANDIDAT['nom_complet']) ?></p>
        <p><strong>Localisation</strong><?= htmlspecialchars(CANDIDAT['localisation']) ?></p>
        <p>
            <strong>Email</strong>
            <a href="mailto:<?= htmlspecialchars(CANDIDAT['email']) ?>">
                <?= htmlspecialchars(CANDIDAT['email']) ?>
            </a>
        </p>
        <p><strong>Disponibilité</strong>Alternance dès septembre 2026</p>

        <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid var(--border);">
            <div style="font-family: var(--font-mono); color: var(--cyan); font-size: 0.8rem; letter-spacing: 0.2em; margin-bottom: 0.8rem;">
                // RÉSEAUX
            </div>
            <p style="margin-bottom: 0.5rem;">
                <a href="<?= htmlspecialchars(CANDIDAT['linkedin']) ?>" target="_blank" rel="noopener">→ LinkedIn</a>
            </p>
            <p style="margin-bottom: 1rem;">
                <a href="<?= htmlspecialchars(CANDIDAT['github']) ?>" target="_blank" rel="noopener">→ GitHub</a>
            </p>
            <div style="font-family: var(--font-mono); color: var(--cyan); font-size: 0.8rem; letter-spacing: 0.2em; margin-bottom: 0.8rem;">
                // STATUS
            </div>
            <p style="color: var(--green);">
                <span class="status-dot"></span> Disponible pour échanges
            </p>
        </div>
    </aside>

    <form class="contact-form" method="POST" action="<?= BASE_URL ?>?page=contact" novalidate>
        <?php if ($success): ?>
            <div class="alert alert-success">
                ✓ Message envoyé avec succès. Je te répondrai dès que possible.
            </div>
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-error">
                <?php foreach ($errors as $err): ?>
                    ✗ <?= htmlspecialchars($err) ?><br>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required
                   value="<?= htmlspecialchars($old['nom']) ?>"
                   placeholder="Ton nom">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required
                   value="<?= htmlspecialchars($old['email']) ?>"
                   placeholder="ton.email@exemple.fr">
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" required
                      placeholder="Ton message..."><?= htmlspecialchars($old['message']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer le message</button>
    </form>
</div>
