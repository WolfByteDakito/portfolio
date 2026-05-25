<?php /** @var array $skills @var bool $cvDisponible @var string $cvUrl @var bool $tableauDisponible @var string $tableauUrl */ ?>

<h1>// Profil</h1>

<div class="intro-box">
    <h3>Qui suis-je ?</h3>
    <p>
        Étudiant en informatique avec <strong style="color: var(--cyan);">3 ans d'expérience en alternance</strong>
        chez LISI Automotive, spécialisé en support technique et automatisation.
    </p>
    <p style="margin-top: 1rem;">
        Solides bases en développement et scripting, avec une volonté claire d'évoluer vers un profil
        <strong style="color: var(--cyan);">développeur full-stack</strong>. Motivé, rigoureux et curieux,
        avec une capacité à résoudre des problèmes techniques et à apprendre rapidement de nouvelles technologies
        (notamment Java et JavaScript).
    </p>

    <div class="meta">
        <div class="meta-item">
            <div class="meta-label">Nom</div>
            <div class="meta-value"><?= htmlspecialchars(CANDIDAT['nom_complet']) ?></div>
        </div>
        <div class="meta-item">
            <div class="meta-label">Localisation</div>
            <div class="meta-value"><?= htmlspecialchars(CANDIDAT['localisation']) ?></div>
        </div>
        <div class="meta-item">
            <div class="meta-label">Permis</div>
            <div class="meta-value">B + véhicule</div>
        </div>
        <div class="meta-item">
            <div class="meta-label">Disponibilité</div>
            <div class="meta-value">Sept. 2026</div>
        </div>
    </div>
</div>

<h2 class="section-title">Formation <small>// education</small></h2>
<div class="timeline">
    <div class="timeline-item">
        <div class="timeline-date">2021 - 2024 (obtenue)</div>
        <h3>Bac Professionnel SN</h3>
        <p class="place">Lycée Denis Diderot - Bavilliers</p>
        <p>Systèmes Numériques.</p>
    </div>
    <div class="timeline-item">
        <div class="timeline-date">2024 - 2026 (en cours)</div>
        <h3>BTS SIO - option SLAM</h3>
        <p class="place">Lycée Condorcet - Belfort</p>
        <p>Services Informatiques aux Organisations - Solutions Logicielles et Applications Métiers.</p>
    </div>
    <div class="timeline-item">
        <div class="timeline-date">2026 - 2028 (objectif)</div>
        <h3>BUT Informatique</h3>
        <p class="place">IUT Nord Franche-Comté - Belfort</p>
        <p>En alternance, pour évoluer vers un profil développeur full-stack.</p>
    </div>
</div>

<h2 class="section-title">Expérience professionnelle <small>// experience</small></h2>
<div class="timeline">
    <div class="timeline-item">
        <div class="timeline-date">2023 - 2026 &middot; ALTERNANCE</div>
        <h3>LISI Automotive - Support IT / Automatisation / CAO</h3>
        <p class="place">Delle</p>
        <ul>
            <li>Déploiement et administration des environnements Teamcenter et NX (~300 utilisateurs)</li>
            <li>Automatisation via scripts PowerShell et Batch</li>
            <li>Développement de scripts correctifs pour incidents critiques</li>
            <li>Support technique utilisateurs (logiciel, système, CAO)</li>
            <li>Participation au renouvellement de matériel informatique</li>
            <li>Mise en place et amélioration des procédures IT</li>
            <li>Coordination avec les équipes techniques</li>
        </ul>
    </div>
    <div class="timeline-item">
        <div class="timeline-date">2022 - 2023 &middot; STAGES</div>
        <h3>LISI Automotive - Support IT</h3>
        <p class="place">Delle</p>
        <ul>
            <li>Création de comptes utilisateurs via PowerShell</li>
            <li>Préparation et déploiement de postes informatiques</li>
            <li>Installation d'équipements IT</li>
            <li>Support utilisateur niveau 1</li>
            <li>Organisation des postes (méthode 5S)</li>
            <li>Formation cybersécurité (MOOC ANSSI)</li>
        </ul>
    </div>
</div>

<h2 class="section-title">Compétences techniques <small>// skills</small></h2>
<div class="skills-grid">
    <?php foreach ($skills as $groupName => $items): ?>
        <div class="skill-group">
            <h3><?= htmlspecialchars($groupName) ?></h3>
            <ul class="skill-list">
                <?php foreach ($items as $label): ?>
                    <li><?= htmlspecialchars($label) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endforeach; ?>
</div>

<h2 class="section-title">Centres d'intérêt <small>// off duty</small></h2>
<div class="interests-grid">
    <div class="interest-chip"><div class="interest-icon">🏎️</div>Sport automobile (F1)</div>
    <div class="interest-chip"><div class="interest-icon">💻</div>Développement</div>
    <div class="interest-chip"><div class="interest-icon">🏃</div>Course à pied</div>
    <div class="interest-chip"><div class="interest-icon">🐕</div>Éducation canine</div>
</div>

<h2 class="section-title">Documents officiels <small>// downloads</small></h2>

<div class="profil-docs">
    <article class="profil-doc-card">
        <div class="profil-doc-head">
            <span class="profil-doc-icon">👤</span>
            <div>
                <h3 class="profil-doc-title">CV - Alexis Mottner</h3>
                <p class="profil-doc-sub">Curriculum Vitae à jour · BTS SIO SLAM · Alternance LISI Automotive</p>
            </div>
        </div>
        <p class="profil-doc-desc">
            Présente ma formation, mes 3 années d'alternance chez LISI Automotive, mes compétences techniques
            (PHP, Python, PowerShell, MySQL…) et mon objectif d'alternance en BUT Informatique pour septembre 2026.
        </p>
        <div class="profil-doc-actions">
            <?php if ($cvDisponible): ?>
                <a href="<?= htmlspecialchars($cvUrl) ?>" class="btn btn-primary" download>
                    ↓ Télécharger le CV (PDF)
                </a>
            <?php else: ?>
                <span class="doc-pending-pill">
                    <span class="status-dot"></span>
                    CV À VENIR
                </span>
            <?php endif; ?>
        </div>
    </article>

    <article class="profil-doc-card">
        <div class="profil-doc-head">
            <span class="profil-doc-icon">📊</span>
            <div>
                <h3 class="profil-doc-title">Tableau de synthèse E6</h3>
                <p class="profil-doc-sub">Référentiel BTS SIO · Support de la soutenance orale E6</p>
            </div>
        </div>
        <p class="profil-doc-desc">
            Document officiel imposé par le référentiel BTS SIO. Liste les productions réalisées
            (projets BTS, missions LISI) et les compétences du référentiel qu'elles mobilisent.
            Sert de support à la soutenance orale de l'épreuve E6 (Parcours de professionnalisation).
        </p>
        <div class="profil-doc-actions">
            <?php if ($tableauDisponible): ?>
                <a href="<?= htmlspecialchars($tableauUrl) ?>" class="btn btn-primary" download>
                    ↓ Télécharger le tableau (PDF)
                </a>
                <a href="<?= htmlspecialchars($tableauUrl) ?>" class="btn" target="_blank" rel="noopener">
                    ↗ Ouvrir dans un nouvel onglet
                </a>
            <?php else: ?>
                <span class="doc-pending-pill">
                    <span class="status-dot"></span>
                    TABLEAU À VENIR
                </span>
            <?php endif; ?>
        </div>

        <?php if ($tableauDisponible): ?>
            <div class="profil-doc-preview">
                <div class="profil-doc-preview-bar">
                    <span class="profil-doc-preview-dot"></span>
                    <span class="profil-doc-preview-label">// preview · Tableau_synthese_E6.pdf</span>
                </div>
                <iframe
                    src="<?= htmlspecialchars($tableauUrl) ?>#view=FitH"
                    title="Tableau de synthèse E6 - Alexis Mottner"
                    loading="lazy"></iframe>
            </div>
        <?php endif; ?>
    </article>
</div>
