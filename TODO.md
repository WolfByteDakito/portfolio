# 📋 À FAIRE — Portfolio BTS SIO

État au **3 mai 2026** après la grande passe d'enrichissement.

---

## ✅ DÉJÀ FAIT (par moi)

- [x] Architecture MVC complète (config, router, controllers, models, views)
- [x] 10 pages fonctionnelles (Accueil, Profil, BTS SIO, Compétences, Projets, Veille, Certifications, Documents, Contact, Mentions légales)
- [x] Design Mercedes F1 + cockpit (CSS complet, responsive)
- [x] Loading screen, animations, typewriter, filtres projets, barres de compétences animées
- [x] **Page Compétences référentiel BTS SIO** (Bloc 1, 2 SLAM, 3 — 13 compétences codifiées B1.1 → B3.4)
- [x] **8 projets enrichis** avec contexte, durée, rôle, livrables, compétences BTS, liens GitHub
- [x] **Page Veille télémétrie F1** complète : sujet, méthodologie, 10 sources, 5 articles synthèse
- [x] **Liens LinkedIn + GitHub** dans home, footer, contact
- [x] **Page Documents** avec détection auto des PDF déposés
- [x] **Mentions légales** + **favicon SVG** + **Open Graph** (SEO)
- [x] Formulaire contact avec validation PHP + protection XSS

---

## 🔴 CE QUE TU DOIS APPORTER (PDF + contenus)

### 📄 Documents PDF à déposer dans `public/assets/documents/`

Le portfolio détecte automatiquement leur présence et active le bouton "Télécharger".

| Fichier attendu | Priorité | Description |
|-----------------|----------|-------------|
| `CV_Alexis_Mottner.pdf` | 🚨 **CRITIQUE** | Ton CV à jour (1 page, format pro) |
| `Tableau_synthese_E6.pdf` | 🚨 **CRITIQUE** | Document officiel E6 (à demander à ton lycée) |
| `Attestation_LISI.pdf` | ⚠️ Important | Attestation employeur LISI Automotive |
| `Convention_alternance.pdf` | 🟡 Bonus | Convention de formation |
| `Diplome_Bac_Pro_SN.pdf` | 🟡 Bonus | Diplôme du Bac Pro SN |

> Si tu changes le nom des fichiers, mets à jour `config/config.php` → constante `DOCUMENTS`.

### 🖼️ Images / médias à ajouter

- [ ] **Photo de profil pro** (carrée, 400×400, fond neutre) → `public/assets/images/profile.jpg`
  - Si tu en mets une, dis-moi : je l'intégrerai dans la home et la page Profil
- [ ] **Captures d'écran de tes projets** → `public/assets/images/projets/`
  - 1 capture par projet (1280×720 minimum), nom = `{slug-projet}.png`
  - Quand tu en as, je remplace les emojis par les vraies images

### 📝 Contenus à enrichir / vérifier toi-même

#### `config/config.php`
- [ ] Vérifier l'**email** affiché (actuellement `lololefarmer@gmail.com` — peut-être en mettre un plus pro pour LinkedIn ?)

#### `app/controllers/ProfilController.php`
- [ ] Ajuster les **pourcentages** des compétences techniques selon ton ressenti

#### `app/models/Projet.php`
- [ ] Vérifier que les 8 projets correspondent à ce que tu veux montrer
- [ ] Compléter `livrables` et `competences_bts` si besoin

#### `app/models/Competence.php`
- [ ] Vérifier que chaque compétence du référentiel a au moins 1 production en preuve
- [ ] Ajouter les nouveaux projets/situations dès que tu en as

#### `app/controllers/VeilleController.php`
- [ ] **Continuer la veille hebdomadaire** : ajouter de nouveaux articles régulièrement (objectif minimum E6 : 1 article/mois jusqu'à l'épreuve)
- [ ] Tu peux ajouter des sources si tu en trouves d'autres pertinentes

#### `app/controllers/CertificationsController.php`
- [ ] Si tu obtiens d'autres certifications (TOEIC, autre MOOC...), les ajouter ici

#### `app/controllers/ContactController.php`
- [ ] **Activer l'envoi de mail** réel : décommenter le bloc `mail()` ou utiliser PHPMailer
- [ ] OU activer l'enregistrement BDD (créer la table `contacts` via `database/portfolio.sql`)

#### `app/views/mentions-legales.php`
- [ ] Renseigner l'**hébergeur** une fois la VM en ligne (nom, adresse, contact)

---

## 🎯 PROCHAINES AMÉLIORATIONS POSSIBLES (si tu veux)

Dis-moi laquelle t'intéresse, je peux la coder :

- [ ] **Page Stages dédiée** — détail mois par mois de tes missions LISI (utile pour valoriser tes 3 ans)
- [ ] **Espace privé "Jury"** — accès par mot de passe pour partager des docs internes pendant l'oral
- [ ] **Galerie photos projets** avec lightbox
- [ ] **Mode clair / sombre** togglable
- [ ] **Blog / tutoriels** (façon Aymeric Cucherousset) — utile si tu veux montrer que tu sais documenter
- [ ] **Intégration BDD MySQL** — passer de tableaux PHP à des vraies tables (admin pour ajouter projets/articles depuis une interface)
- [ ] **Statistiques de visite** anonymes (sans cookie)

---

## 🚀 DÉPLOIEMENT VM PROXMOX (à faire avant l'épreuve)

### Avant
- [ ] Passer `DEV_MODE` à `false` dans `config/config.php`
- [ ] Adapter `BASE_URL` au chemin/domaine final (probablement `/`)
- [ ] Vérifier les identifiants BDD si activée

### Sur la VM
- [ ] OS : Debian 12 ou Ubuntu Server 22.04 LTS
- [ ] Stack : `apt install apache2 php8 php8-mysql mariadb-server`
- [ ] Activer `mod_rewrite` Apache (`a2enmod rewrite && systemctl restart apache2`)
- [ ] VirtualHost dédié pour ton domaine
- [ ] Nom de domaine (gratuit : sous-domaine duckdns.org / dynv6.net)
- [ ] Certificat SSL Let's Encrypt (`certbot --apache`)
- [ ] Pare-feu UFW : ports 22, 80, 443 uniquement

### Transfert
- Push GitHub depuis ton poste, puis `git clone` sur la VM dans `/var/www/portfolio`
- Permissions : `chown -R www-data:www-data /var/www/portfolio`

---

## 📊 CHECKLIST AVANT ÉPREUVE E6

Une semaine avant :

- [ ] Site accessible publiquement (URL stable, certificat HTTPS valide)
- [ ] CV PDF téléchargeable depuis la home (le bouton apparaît dès que `CV_Alexis_Mottner.pdf` est déposé)
- [ ] Tableau de synthèse E6 disponible dans Documents
- [ ] Tous les projets ont contexte + technos + compétences BTS
- [ ] Page Veille avec au moins 5-6 articles (continuer la veille jusqu'au jour J)
- [ ] Au moins 1 certification visible (ANSSI déjà là)
- [ ] Formulaire de contact fonctionnel (testé en réception)
- [ ] Responsive testé sur mobile
- [ ] Mentions légales complètes (hébergeur renseigné)
- [ ] Backup du code (push GitHub) et de la BDD (mysqldump)

---

## ❓ Questions pour la prochaine session

1. **CV** : tu en as déjà un PDF ou tu veux que je te génère un template HTML/CSS imprimable ?
2. **Photo pro** : tu en as une ou il faut en faire une ?
3. **Tableau E6** : ton lycée t'a fourni le modèle officiel ?
4. **Email pro** : tu gardes celui-ci ou tu veux en créer un dédié (alexis.mottner.dev@... par ex) ?
5. **Captures projets** : tu peux faire des screenshots de l'app GSB et de l'outil PowerShell NX ?
