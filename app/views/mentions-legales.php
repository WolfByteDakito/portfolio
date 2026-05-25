<h1>// Mentions légales</h1>

<div class="intro-box">
    <h3>Éditeur du site</h3>
    <p>
        Ce site est édité à titre personnel et non commercial par :<br>
        <strong style="color: var(--cyan);"><?= htmlspecialchars(CANDIDAT['nom_complet']) ?></strong><br>
        <?= htmlspecialchars(CANDIDAT['localisation']) ?><br>
        Email : <a href="mailto:<?= htmlspecialchars(CANDIDAT['email']) ?>"><?= htmlspecialchars(CANDIDAT['email']) ?></a>
    </p>
</div>

<h2 class="section-title">Hébergement <small>// hosting</small></h2>
<div class="intro-box">
    <p>
        Site déployé sur une <strong style="color: var(--cyan);">VM mise à disposition dans le cadre du
        BTS SIO du Lycée Condorcet (Belfort)</strong>, accessible via le sous-domaine
        <code style="color: var(--cyan);">alexis.mottner.sio-condorcet.fr</code>.
    </p>
    <div class="meta" style="margin-top: 1rem;">
        <div class="meta-item">
            <div class="meta-label">Système</div>
            <div class="meta-value">Debian 13 (Trixie)</div>
        </div>
        <div class="meta-item">
            <div class="meta-label">Conteneurisation</div>
            <div class="meta-value">Docker · Apache 2.4 · PHP 8.2</div>
        </div>
        <div class="meta-item">
            <div class="meta-label">Établissement</div>
            <div class="meta-value">Lycée Condorcet - Belfort</div>
        </div>
        <div class="meta-item">
            <div class="meta-label">Contact technique</div>
            <div class="meta-value">Service informatique du lycée</div>
        </div>
    </div>
    <p style="margin-top: 1rem; font-family: var(--font-mono); font-size: 0.85rem; color: var(--text-muted);">
        // pour toute question relative à l'hébergement, s'adresser au pôle informatique du Lycée Condorcet
    </p>
</div>

<h2 class="section-title">Propriété intellectuelle <small>// copyright</small></h2>
<div class="intro-box">
    <p>
        L'ensemble du contenu (textes, code source, design) est la propriété d'Alexis Mottner,
        sauf mentions contraires (icônes, polices Google Fonts).
        Toute reproduction sans autorisation est interdite.
    </p>
    <p style="margin-top: 1rem;">
        Le code source du portfolio est consultable sur
        <a href="<?= htmlspecialchars(CANDIDAT['github']) ?>" target="_blank" rel="noopener">GitHub</a>.
    </p>
</div>

<h2 class="section-title">Données personnelles <small>// rgpd</small></h2>
<div class="intro-box">
    <p>
        Conformément au <strong style="color: var(--cyan);">RGPD</strong>, les seules données collectées
        via ce site le sont via le formulaire de contact (nom, email, message).
    </p>
    <p style="margin-top: 1rem;">
        Ces données ne sont ni revendues, ni partagées avec un tiers.
        Elles servent uniquement à répondre à la demande émise.
    </p>
    <p style="margin-top: 1rem;">
        Pour toute demande d'accès, de rectification ou de suppression de tes données,
        contacte-moi à : <a href="mailto:<?= htmlspecialchars(CANDIDAT['email']) ?>"><?= htmlspecialchars(CANDIDAT['email']) ?></a>
    </p>
</div>

<h2 class="section-title">Cookies <small>// tracking</small></h2>
<div class="intro-box">
    <p>
        Ce site n'utilise <strong style="color: var(--cyan);">aucun cookie</strong> de suivi
        ni outil d'analyse tiers (Google Analytics, etc.).
    </p>
</div>
