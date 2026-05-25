/* =====================================================================
   PORTFOLIO ALEXIS MOTTNER — Scripts principaux
   ===================================================================== */

document.addEventListener('DOMContentLoaded', () => {
    initLoadingScreen();
    initMobileNav();
    initSkillBars();
    initFadeIn();
    initProjectsFilter();
    initTypewriter();
    initTrackLive();
});

/* ---------- LOADING SCREEN ---------- */
function initLoadingScreen() {
    const screen = document.getElementById('loading-screen');
    if (!screen) return;
    window.addEventListener('load', () => {
        setTimeout(() => screen.classList.add('hidden'), 1400);
    });
}

/* ---------- MOBILE NAV ---------- */
function initMobileNav() {
    const toggle = document.querySelector('.nav-toggle');
    const nav    = document.querySelector('.main-nav');
    if (!toggle || !nav) return;

    toggle.addEventListener('click', () => {
        const open = nav.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
}

/* ---------- SKILL BARS (animation au scroll) ---------- */
function initSkillBars() {
    const bars = document.querySelectorAll('.skill-bar-fill');
    if (!bars.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const bar = entry.target;
                const percent = bar.dataset.percent || 0;
                bar.style.width = percent + '%';
                observer.unobserve(bar);
            }
        });
    }, { threshold: 0.3 });

    bars.forEach(bar => observer.observe(bar));
}

/* ---------- FADE-IN au scroll ---------- */
function initFadeIn() {
    const elements = document.querySelectorAll('.card, .timeline-item, .skill-group, .interest-chip');
    if (!elements.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    elements.forEach(el => {
        el.classList.add('fade-in');
        observer.observe(el);
    });
}

/* ---------- FILTRE DES PROJETS ---------- */
function initProjectsFilter() {
    const filterBtns = document.querySelectorAll('#projects-filter .filter-btn');
    const cards      = document.querySelectorAll('#projects-grid .project-card');
    if (!filterBtns.length) return;

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('is-active'));
            btn.classList.add('is-active');

            const filter = btn.dataset.filter;
            cards.forEach(card => {
                const cat = card.dataset.category;
                const show = filter === 'all' || cat === filter;
                card.style.display = show ? '' : 'none';
            });
        });
    });
}

/* ---------- TRACK LIVE (Monaco — voiture animée + stats simulées) ---------- */
function initTrackLive() {
    const path = document.getElementById('circuit-track');
    const car  = document.getElementById('car-marker');
    if (!path || !car) return;

    const totalLen = path.getTotalLength();
    let progress   = 0;          // 0 → totalLen
    let lap        = 1;
    let lapStart   = performance.now();

    const elSpeed     = document.getElementById('stat-speed');
    const elSpeedBar  = document.getElementById('stat-speed-bar');
    const elRpm       = document.getElementById('stat-rpm');
    const elRpmBar    = document.getElementById('stat-rpm-bar');
    const elGear      = document.getElementById('stat-gear');
    const elLap       = document.getElementById('stat-lap');
    const elSector    = document.getElementById('stat-sector');
    const elDrs       = document.getElementById('stat-drs');
    const elThr       = document.getElementById('pedal-throttle');
    const elBrk       = document.getElementById('pedal-brake');
    const elLaptime   = document.getElementById('stat-laptime');

    // Zones du circuit SUZUKA (Japon) — profil de vitesse réaliste sur les sections clés
    const zones = [
        { from: 0.00, to: 0.10, vmax: 320, label: 'S1', drs: true  }, // pit straight (start)
        { from: 0.10, to: 0.15, vmax: 150, label: 'S1', drs: false }, // Turn 1
        { from: 0.15, to: 0.30, vmax: 230, label: 'S1', drs: false }, // Esses (rapides en S)
        { from: 0.30, to: 0.36, vmax: 250, label: 'S1', drs: false }, // Dunlop curve
        { from: 0.36, to: 0.42, vmax: 180, label: 'S2', drs: false }, // Degner 1
        { from: 0.42, to: 0.46, vmax: 130, label: 'S2', drs: false }, // Degner 2 (serré)
        { from: 0.46, to: 0.54, vmax: 220, label: 'S2', drs: false }, // descente vers pont (crossover ↑)
        { from: 0.54, to: 0.60, vmax:  75, label: 'S2', drs: false }, // HAIRPIN (la plus lente)
        { from: 0.60, to: 0.68, vmax: 170, label: 'S2', drs: false }, // sortie hairpin
        { from: 0.68, to: 0.78, vmax: 200, label: 'S3', drs: false }, // SPOON CURVE (longue gauche)
        { from: 0.78, to: 0.85, vmax: 320, label: 'S3', drs: true  }, // 130R (gauche flat-out)
        { from: 0.85, to: 0.92, vmax: 305, label: 'S3', drs: true  }, // ligne droite sous le pont (crossover ↓)
        { from: 0.92, to: 0.97, vmax:  95, label: 'S3', drs: false }, // CASIO TRIANGLE chicane
        { from: 0.97, to: 1.00, vmax: 280, label: 'S3', drs: false }, // retour S/F
    ];

    function zoneAt(frac) {
        for (const z of zones) {
            if (frac >= z.from && frac < z.to) return z;
        }
        return zones[zones.length - 1];
    }

    // vitesse moyenne ~ 160 km/h en sim → ~75s de tour, on accélère pour la démo
    // on travaille en "fraction du tour par tick" calé sur la vitesse
    const TIMESCALE = 0.06; // accélère la démo
    let lastT = performance.now();

    function frame(now) {
        const dt = (now - lastT) / 1000; // sec
        lastT   = now;

        const frac = progress / totalLen;
        const z    = zoneAt(frac);
        const v    = z.vmax;

        // avance proportionnellement à v
        progress += v * TIMESCALE * dt;
        if (progress >= totalLen) {
            const lapTime = (now - lapStart) / 1000;
            const m = Math.floor(lapTime / 60);
            const s = (lapTime % 60).toFixed(3).padStart(6, '0');
            elLaptime.textContent = `${m}:${s}`;
            lap += 1;
            if (lap > 78) lap = 1;
            elLap.innerHTML = `${lap}<small>/78</small>`;
            lapStart = now;
            progress = 0;
        }

        // position voiture
        const pt = path.getPointAtLength(progress);
        car.setAttribute('transform', `translate(${pt.x}, ${pt.y})`);

        // jitter sur la vitesse pour donner vie aux stats
        const noisy = v * (0.93 + Math.random() * 0.07);
        elSpeed.textContent = Math.round(noisy);
        elSpeedBar.style.width = Math.min(100, (noisy / 320) * 100) + '%';

        // RPM (3000 → 13000 calé sur la vitesse / rapport)
        const rpm = Math.round(3000 + (noisy / 320) * 10000);
        elRpm.textContent = rpm.toLocaleString('fr-FR');
        elRpmBar.style.width = Math.min(100, (rpm / 13000) * 100) + '%';

        // Rapport approximatif
        let gear;
        if (noisy < 60)       gear = 1;
        else if (noisy < 90)  gear = 2;
        else if (noisy < 130) gear = 3;
        else if (noisy < 170) gear = 4;
        else if (noisy < 210) gear = 5;
        else if (noisy < 245) gear = 6;
        else if (noisy < 275) gear = 7;
        else                   gear = 8;
        elGear.textContent = gear;

        // Secteur + DRS
        elSector.textContent = z.label;
        elDrs.textContent  = z.drs ? 'ON' : 'OFF';
        elDrs.setAttribute('data-state', z.drs ? 'on' : 'off');

        // Pédales : compare v à la vmax suivante pour deviner freinage
        const next = zoneAt(Math.min(1, frac + 0.04));
        const braking = next.vmax < v - 60;
        const thrust  = !braking;
        elThr.style.width = thrust ? (60 + Math.random() * 40) + '%' : '0%';
        elBrk.style.width = braking ? (60 + Math.random() * 40) + '%' : '0%';

        requestAnimationFrame(frame);
    }
    requestAnimationFrame(frame);
}

/* ---------- TYPEWRITER (page d'accueil) ---------- */
function initTypewriter() {
    const target  = document.getElementById('typewriter-text');
    const phrases = window.typewriterPhrases || [];
    if (!target || !phrases.length) return;

    let i = 0;       // phrase actuelle
    let pos = 0;     // position dans la phrase
    let deleting = false;

    const typeSpeed   = 60;
    const eraseSpeed  = 30;
    const pauseAfter  = 2000;
    const pauseBefore = 500;

    function tick() {
        const phrase = phrases[i];
        if (!deleting) {
            target.textContent = phrase.substring(0, ++pos);
            if (pos === phrase.length) {
                deleting = true;
                setTimeout(tick, pauseAfter);
                return;
            }
            setTimeout(tick, typeSpeed);
        } else {
            target.textContent = phrase.substring(0, --pos);
            if (pos === 0) {
                deleting = false;
                i = (i + 1) % phrases.length;
                setTimeout(tick, pauseBefore);
                return;
            }
            setTimeout(tick, eraseSpeed);
        }
    }
    tick();
}
