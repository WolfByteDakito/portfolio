<?php /** @var array $blocs */ ?>

<h1>// BTS SIO</h1>

<div class="intro-box">
    <h3>Qu'est-ce que le BTS SIO ?</h3>
    <p>
        Le <strong style="color: var(--cyan);">BTS SIO</strong> (Services Informatiques aux Organisations) est un diplôme
        de niveau Bac+2 qui forme des techniciens supérieurs en informatique. Il se décline en deux options
        complémentaires : <strong>SLAM</strong> (développement) et <strong>SISR</strong> (réseaux &amp; systèmes).
    </p>
    <p style="margin-top: 1rem;">
        Je suis en option <strong style="color: var(--cyan);">SLAM</strong> au Lycée Condorcet de Belfort,
        promo 2024 - 2026. Au programme : développement d'applications, bases de données, cybersécurité,
        gestion de projet et 22 semaines en entreprise.
    </p>
</div>

<h2 class="section-title">Les deux options <small>// slam vs sisr</small></h2>
<div class="compare">
    <div>
        <h3>SLAM <span style="color: var(--text-dim); font-size: 0.6em;">// mon option</span></h3>
        <p style="color: var(--text-muted); margin-bottom: 1rem;">
            Solutions Logicielles et Applications Métiers
        </p>
        <ul>
            <li>Développement d'applications web et desktop</li>
            <li>Programmation orientée objet (PHP, Java, C#)</li>
            <li>Conception et gestion de bases de données</li>
            <li>Architecture logicielle (MVC)</li>
            <li>Méthodes Agile</li>
            <li>Tests, déploiement, maintenance</li>
        </ul>
    </div>
    <div>
        <h3>SISR</h3>
        <p style="color: var(--text-muted); margin-bottom: 1rem;">
            Solutions d'Infrastructure, Systèmes et Réseaux
        </p>
        <ul>
            <li>Administration de serveurs (Windows, Linux)</li>
            <li>Configuration réseaux (routeurs, switchs, VLAN)</li>
            <li>Virtualisation (VMware, Proxmox)</li>
            <li>Sécurité informatique</li>
            <li>Supervision et maintenance</li>
            <li>Cloud et services managés</li>
        </ul>
    </div>
</div>

<!-- =========================================================
     RÉFÉRENTIEL DE COMPÉTENCES (fusionné depuis la page Compétences)
     ========================================================= -->
<h2 class="section-title">Référentiel de compétences <small>// BTS SIO (2020)</small></h2>

<div class="intro-box" style="border-left-color: var(--cyan-bright);">
    <p>
        Cartographie officielle du référentiel BTS SIO, mise en regard avec mes productions
        (projets BTS, missions LISI, formations). Sert de support à
        <strong style="color: var(--cyan);">l'épreuve E5</strong> et alimente le
        tableau de synthèse de <strong style="color: var(--cyan);">l'épreuve E6</strong>.
    </p>
    <p style="margin-top: 0.8rem;">
        <strong style="color: var(--cyan);">3 blocs de compétences :</strong>
        Bloc 1 (Support — commun aux deux options),
        Bloc 2 (Conception &amp; développement — spécifique SLAM),
        Bloc 3 (Cybersécurité — commun).
    </p>
</div>

<?php foreach ($blocs as $bloc): ?>
    <div class="bloc-header">
        <span class="bloc-num">B<?= (int) $bloc['numero'] ?></span>
        <div class="bloc-header-text">
            <h3>Bloc <?= (int) $bloc['numero'] ?> — <?= htmlspecialchars($bloc['titre']) ?></h3>
            <span class="bloc-option bloc-option-<?= htmlspecialchars(strtolower($bloc['option'])) ?>">
                <?= strtoupper(htmlspecialchars($bloc['option'])) ?>
            </span>
        </div>
    </div>

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

<h2 class="section-title">Épreuves <small>// evaluation</small></h2>
<div class="cards-grid">
    <div class="card">
        <div class="card-corner">[E5]</div>
        <h3>Production et fourniture de services informatiques</h3>
        <p>Évaluation pratique des compétences sur des situations professionnelles réelles.</p>
    </div>
    <div class="card">
        <div class="card-corner">[E6]</div>
        <h3>Parcours de professionnalisation</h3>
        <p>Présentation des projets réalisés en formation et en entreprise. Ce portfolio sert de support.</p>
    </div>
    <div class="card">
        <div class="card-corner">[CCF]</div>
        <h3>Contrôles en cours de formation</h3>
        <p>Évaluations continues sur les ateliers de professionnalisation.</p>
    </div>
</div>

<!-- =========================================================
     APRÈS LE BTS — Débouchés + Poursuites pour SLAM ET SISR
     ========================================================= -->
<h2 class="section-title">Après le BTS <small>// next stage</small></h2>

<p class="next-stage-intro">
    Que ce soit en SLAM ou SISR, le BTS SIO ouvre vers la vie active ou la poursuite d'études.
    Les débouchés diffèrent selon l'option, les poursuites d'études sont souvent similaires.
</p>

<!-- Débouchés par option -->
<h3 class="subsection-title">💼 Débouchés professionnels <small>(Bac+2)</small></h3>
<div class="next-stage">
    <article class="next-stage-block">
        <header>
            <span class="next-stage-icon">💻</span>
            <div>
                <h3>Option SLAM</h3>
                <p>Métiers du développement et des applications.</p>
            </div>
        </header>
        <ul class="next-stage-list">
            <li><strong>Développeur d'applications</strong> — web, mobile, logiciels métiers</li>
            <li><strong>Développeur full-stack junior</strong> — front + back + base de données</li>
            <li><strong>Analyste programmeur</strong> — conception et écriture de code</li>
            <li><strong>Technicien d'études informatiques</strong> — spécifications et tests</li>
            <li><strong>Webmaster / intégrateur web</strong> — sites institutionnels, e-commerce</li>
            <li><strong>Administrateur de bases de données junior</strong> — MySQL / SQL Server</li>
            <li><strong>Support applicatif</strong> — accompagnement utilisateur logiciel</li>
        </ul>
    </article>

    <article class="next-stage-block">
        <header>
            <span class="next-stage-icon">🖧</span>
            <div>
                <h3>Option SISR</h3>
                <p>Métiers de l'infrastructure et des réseaux.</p>
            </div>
        </header>
        <ul class="next-stage-list">
            <li><strong>Administrateur systèmes &amp; réseaux</strong> — Windows Server, Linux</li>
            <li><strong>Technicien d'exploitation</strong> — supervision, datacenter, sauvegardes</li>
            <li><strong>Technicien support / Helpdesk N2</strong> — incidents complexes</li>
            <li><strong>Technicien d'infrastructure</strong> — déploiement matériel et logiciel</li>
            <li><strong>Technicien télécoms / VoIP</strong> — téléphonie, réseaux opérateurs</li>
            <li><strong>Technicien cybersécurité junior</strong> — supervision SOC, durcissement</li>
            <li><strong>Technicien cloud junior</strong> — administration Azure / AWS / GCP</li>
        </ul>
    </article>
</div>

<!-- Poursuites d'études : globales (SLAM + SISR) -->
<h3 class="subsection-title">🎓 Poursuites d'études <small>(Bac+3 et au-delà)</small></h3>
<div class="next-stage">
    <article class="next-stage-block next-stage-block-alt">
        <header>
            <span class="next-stage-icon">📚</span>
            <div>
                <h3>Voies orientées SLAM</h3>
                <p>Pour aller plus loin en développement logiciel.</p>
            </div>
        </header>
        <ul class="next-stage-list">
            <li><strong>BUT Informatique</strong> <span class="next-stage-pill">objectif perso</span> — IUT, parcours dev full-stack en alternance</li>
            <li><strong>Bachelor / Bachelor universitaire en informatique</strong> — Epitech, Ynov, EPSI, Hetic…</li>
            <li><strong>Licence pro Métiers de l'informatique</strong> — développement web/mobile, applications</li>
            <li><strong>Licence Informatique générale</strong> — passerelle pour viser un Master</li>
            <li><strong>Master Informatique / écoles d'ingénieurs</strong> via admissions parallèles (Bac+5)</li>
        </ul>
    </article>

    <article class="next-stage-block next-stage-block-alt">
        <header>
            <span class="next-stage-icon">🌐</span>
            <div>
                <h3>Voies orientées SISR</h3>
                <p>Pour aller plus loin en infrastructure et cybersécurité.</p>
            </div>
        </header>
        <ul class="next-stage-list">
            <li><strong>BUT Réseaux &amp; Télécommunications</strong> — administration et sécurité réseaux</li>
            <li><strong>Licence pro Administration et sécurité des réseaux</strong> — Cisco, pare-feu, supervision</li>
            <li><strong>Licence pro Cybersécurité</strong> — SOC, pentest, sécurité offensive/défensive</li>
            <li><strong>Bachelor Cybersécurité</strong> — ESGI, Ynov, EPITA…</li>
            <li><strong>Master / écoles d'ingénieurs</strong> — spécialisations cloud, sécurité, DevOps, SRE</li>
        </ul>
    </article>
</div>
