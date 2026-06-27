<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thumbpin | Cinematic Video Production</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Oswald:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-red: #E50914;
            --primary-red-dim: #b2070f;
            --black: #050505;
            --dark-grey: #0a0a0a;
            --text-white: #ffffff;
            --text-grey: #888888;
            --easing: cubic-bezier(0.19, 1, 0.22, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            cursor: none; /* Custom cursor only */
        }

        html, body {
            background-color: var(--black);
            color: var(--text-white);
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            width: 100%;
        }

        /* === SMOOTH SCROLL CONTAINER === */
        /* Note: For a real production site, consider using Lenis.js for smooth scrolling. 
           Here we use native smooth behavior for simplicity. */
        html {
            scroll-behavior: smooth;
        }

        /* === TYPOGRAPHY === */
        h1, h2, h3, h4, h5 {
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            line-height: 1;
        }
        
        .text-outline {
            -webkit-text-stroke: 1px rgba(255,255,255,0.3);
            color: transparent;
            transition: 0.3s;
        }
        
        .hover-fill:hover .text-outline {
            -webkit-text-stroke: 0px;
            color: var(--primary-red);
        }

        /* === CUSTOM CURSOR === */
        .cursor-dot {
            width: 8px;
            height: 8px;
            background-color: var(--primary-red);
            position: fixed;
            top: 0; left: 0;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            z-index: 9999;
            pointer-events: none;
        }

        .cursor-outline {
            width: 50px;
            height: 50px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            position: fixed;
            top: 0; left: 0;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            z-index: 9998;
            pointer-events: none;
            transition: width 0.3s, height 0.3s, background-color 0.3s, border-color 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .cursor-text {
            font-size: 10px;
            font-weight: 700;
            opacity: 0;
            text-transform: uppercase;
            color: #000;
            transition: opacity 0.2s;
        }

        body.hovering .cursor-outline {
            width: 80px;
            height: 80px;
            background-color: var(--text-white);
            border-color: transparent;
            mix-blend-mode: difference;
        }
        
        body.video-hover .cursor-outline {
            width: 100px;
            height: 100px;
            background-color: var(--primary-red);
            border-color: transparent;
            mix-blend-mode: normal;
        }
        
        body.video-hover .cursor-text {
            opacity: 1;
            color: #fff;
        }

        /* === NOISE OVERLAY === */
        .noise-overlay {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            pointer-events: none;
            z-index: 9000;
            opacity: 0.07;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        }

        /* === NAV === */
        .nav-wrapper {
            position: fixed;
            top: 0; left: 0; width: 100%;
            padding: 30px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            mix-blend-mode: difference;
        }

        .logo {
            font-family: 'Oswald', sans-serif;
            font-weight: 700;
            font-size: 24px;
            letter-spacing: 2px;
        }

        .menu-btn {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        /* === HERO SECTION === */
        .hero {
            height: 100vh;
            width: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .hero-video-bg {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            object-fit: cover;
            opacity: 0.6;
            filter: contrast(1.1) brightness(0.8);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            mix-blend-mode: overlay; /* Creates cool blending with video */
        }
        
        /* Fallback for mix-blend-mode visibility */
        .hero-content h1 {
            color: #fff;
            mix-blend-mode: normal;
        }

        .hero-title {
            font-size: 12vw;
            font-weight: 700;
            line-height: 0.85;
            letter-spacing: -4px;
            margin-bottom: 20px;
            opacity: 0;
            transform: translateY(50px);
            animation: heroReveal 1s var(--easing) 0.5s forwards;
        }

        .hero-subtitle {
            font-size: 18px;
            letter-spacing: 4px;
            text-transform: uppercase;
            opacity: 0;
            animation: heroReveal 1s var(--easing) 0.8s forwards;
        }

        @keyframes heroReveal {
            to { opacity: 1; transform: translateY(0); }
        }

        /* === INTERACTIVE WORKS SECTION (THE POP) === */
        .works-section {
            padding: 150px 50px;
            position: relative;
            background-color: var(--black);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        /* The Fixed Background Video Changer */
        .work-bg-preview {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: 0;
            opacity: 0.2;
            transition: opacity 0.5s ease;
            pointer-events: none;
        }
        
        .work-bg-video {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 0.6s ease;
        }
        
        .work-bg-video.active {
            opacity: 1;
        }

        .work-list {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .work-item {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding: 40px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: padding 0.4s var(--easing);
            cursor: pointer; /* Logic handled by JS cursor */
        }
        
        .work-item:last-child {
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .work-item:hover {
            padding: 60px 20px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.03), transparent);
        }

        .work-title {
            font-size: 60px;
            font-weight: 700;
            color: transparent;
            -webkit-text-stroke: 1px rgba(255,255,255,0.5);
            transition: 0.4s;
        }

        .work-item:hover .work-title {
            color: #fff;
            -webkit-text-stroke: 0px;
            transform: translateX(20px);
        }

        .work-meta {
            text-align: right;
            opacity: 0.5;
            transition: 0.4s;
        }
        
        .work-item:hover .work-meta {
            opacity: 1;
            transform: translateX(-20px);
        }

        /* === REELS STRIP (SKEW EFFECT) === */
        .reels-section {
            padding: 100px 0;
            background: #080808;
            overflow: hidden;
        }
        
        .section-head {
            padding: 0 50px;
            margin-bottom: 60px;
        }
        
        .section-head h2 {
            font-size: 80px;
            margin-bottom: 20px;
        }

        .reels-container {
            display: flex;
            gap: 30px;
            padding: 0 50px;
            overflow-x: auto;
            padding-bottom: 50px;
            /* Hide Scrollbar */
            scrollbar-width: none; 
            -ms-overflow-style: none;
        }
        
        .reels-container::-webkit-scrollbar { 
            display: none; 
        }

        .reel-card {
            min-width: 300px;
            height: 533px; /* 9:16 Aspect Ratio */
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            transform: scale(1);
            transition: transform 0.1s; /* Quick transition for skew effect */
            background: #111;
        }
        
        .reel-card video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.7;
            transition: 0.4s;
        }
        
        .reel-card:hover video {
            opacity: 1;
            transform: scale(1.05);
        }
        
        .reel-info {
            position: absolute;
            bottom: 20px; left: 20px;
            z-index: 2;
        }

        /* === SHOWCASE GRID (BENTO STYLE) === */
        .grid-section {
            padding: 100px 50px;
            max-width: 1600px;
            margin: 0 auto;
        }

        .bento-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            grid-template-rows: repeat(2, 400px);
            gap: 20px;
        }

        .bento-item {
            position: relative;
            background: #111;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #222;
        }
        
        .bento-item.large { grid-column: span 8; }
        .bento-item.tall { grid-column: span 4; grid-row: span 2; }
        .bento-item.medium { grid-column: span 4; }
        .bento-item.small { grid-column: span 4; }

        .bento-media {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.6s var(--easing);
            filter: grayscale(100%);
        }
        
        .bento-item:hover .bento-media {
            transform: scale(1.05);
            filter: grayscale(0%);
        }

        .bento-overlay {
            position: absolute;
            bottom: 0; left: 0;
            width: 100%;
            padding: 30px;
            background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
            transform: translateY(20px);
            opacity: 0;
            transition: 0.4s;
        }
        
        .bento-item:hover .bento-overlay {
            transform: translateY(0);
            opacity: 1;
        }
        
        /* === FOOTER CTA === */
        .footer-cta {
            height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: var(--primary-red);
            color: #fff;
        }
        
        .big-cta-text {
            font-size: 8vw;
            font-weight: 900;
            line-height: 0.9;
        }

        /* === UTILS === */
        .red-text { color: var(--primary-red); }

        /* Responsive */
        @media (max-width: 1024px) {
            .bento-grid { display: flex; flex-direction: column; height: auto; }
            .bento-item { height: 400px; }
            .hero-title { font-size: 18vw; }
            .work-title { font-size: 32px; }
        }
    </style>
</head>
<body>

    <!-- Noise Texture -->
    <div class="noise-overlay"></div>

    <!-- Custom Cursor -->
    <div class="cursor-dot"></div>
    <div class="cursor-outline"><span class="cursor-text">View</span></div>

    <!-- Navigation -->
    <nav class="nav-wrapper">
        <div class="logo hover-trigger">THUMBPIN</div>
        <div class="menu-btn hover-trigger">MENU</div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <!-- Background Video -->
        <video class="hero-video-bg" autoplay muted loop playsinline>
            <source src="https://assets.mixkit.co/videos/preview/mixkit-set-of-plateaus-seen-from-the-heights-in-a-sunset-26070-large.mp4" type="video/mp4">
        </video>
        
        <div class="hero-content">
            <div class="hero-subtitle">VISUAL STORYTELLING HOUSE</div>
            <h1 class="hero-title">WE CRAFT<br>LEGACIES</h1>
        </div>
    </section>

    <!-- Project List (Hover Reveal Interaction) -->
    <section class="works-section">
        <!-- Background Videos Container -->
        <div class="work-bg-preview">
            <!-- These are placeholders. Replace with your actual project video URLs -->
            <video id="bg-vid-1" class="work-bg-video active" muted loop playsinline src="https://assets.mixkit.co/videos/preview/mixkit-stars-in-space-1610-large.mp4"></video>
            <video id="bg-vid-2" class="work-bg-video" muted loop playsinline src="https://assets.mixkit.co/videos/preview/mixkit-ink-swirling-in-water-1920-large.mp4"></video>
            <video id="bg-vid-3" class="work-bg-video" muted loop playsinline src="https://assets.mixkit.co/videos/preview/mixkit-people-working-in-a-call-center-4890-large.mp4"></video>
            <video id="bg-vid-4" class="work-bg-video" muted loop playsinline src="https://assets.mixkit.co/videos/preview/mixkit-heavy-rain-falling-on-leaves-in-the-jungle-2384-large.mp4"></video>
        </div>

        <div class="work-list">
            <div style="margin-bottom: 60px; font-size: 14px; color: #666; letter-spacing: 2px;">SELECTED WORKS (2024-2025)</div>

            <!-- List Item 1 -->
            <div class="work-item video-trigger" data-bg="bg-vid-1">
                <div class="work-title">MRF TYRES</div>
                <div class="work-meta">
                    <h4>Brand Film</h4>
                    <span>Automotive</span>
                </div>
            </div>

            <!-- List Item 2 -->
            <div class="work-item video-trigger" data-bg="bg-vid-2">
                <div class="work-title">COLLEGE VIDYA</div>
                <div class="work-meta">
                    <h4>Viral Campaign</h4>
                    <span>EdTech</span>
                </div>
            </div>

            <!-- List Item 3 -->
            <div class="work-item video-trigger" data-bg="bg-vid-3">
                <div class="work-title">TECHSPARKS</div>
                <div class="work-meta">
                    <h4>Event Coverage</h4>
                    <span>Technology</span>
                </div>
            </div>

            <!-- List Item 4 -->
            <div class="work-item video-trigger" data-bg="bg-vid-4">
                <div class="work-title">URBAN COMPANY</div>
                <div class="work-meta">
                    <h4>TV Commercial</h4>
                    <span>Service</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Bento Grid Showcase -->
    <section class="grid-section">
        <div class="section-head" style="padding-left:0;">
            <h2 style="font-size: 40px;">CINEMATIC <span class="red-text">UNIVERSE</span></h2>
        </div>
        
        <div class="bento-grid">
            <!-- Large Hero Item -->
            <div class="bento-item large video-trigger">
                <img src="https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?q=80&w=2070&auto=format&fit=crop" class="bento-media" alt="Film 1">
                <div class="bento-overlay">
                    <h3>The Last Horizon</h3>
                    <p>Documentary • 2024</p>
                </div>
            </div>

            <!-- Tall Vertical Item -->
            <div class="bento-item tall video-trigger">
                <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?q=80&w=1925&auto=format&fit=crop" class="bento-media" alt="Film 2">
                <div class="bento-overlay">
                    <h3>Neon Dreams</h3>
                    <p>Music Video</p>
                </div>
            </div>

            <!-- Medium Item -->
            <div class="bento-item medium video-trigger">
                <img src="https://images.unsplash.com/photo-1535016120720-40c6874c3b1c?q=80&w=2064&auto=format&fit=crop" class="bento-media" alt="Film 3">
                <div class="bento-overlay">
                    <h3>Corporate Edge</h3>
                    <p>Brand Identity</p>
                </div>
            </div>

            <!-- Medium Item -->
            <div class="bento-item medium video-trigger">
                <img src="https://images.unsplash.com/photo-1598899134739-24c46f58b8c0?q=80&w=2056&auto=format&fit=crop" class="bento-media" alt="Film 4">
                <div class="bento-overlay">
                    <h3>Raw Emotion</h3>
                    <p>Short Film</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Reels Section with Skew Effect -->
    <section class="reels-section">
        <div class="section-head">
            <h2>MICRO <span class="red-text">MOMENTS</span></h2>
            <p style="color:#666; max-width: 400px;">High-impact vertical storytelling designed to stop the scroll.</p>
        </div>

        <div class="reels-container" id="reelsContainer">
            <!-- Reel 1 -->
            <div class="reel-card video-trigger">
                <video src="https://assets.mixkit.co/videos/preview/mixkit-girl-dancing-in-neon-light-4240-large.mp4" muted loop playsinline></video>
                <div class="reel-info">
                    <h3>FASHION</h3>
                </div>
            </div>
            <!-- Reel 2 -->
            <div class="reel-card video-trigger">
                <video src="https://assets.mixkit.co/videos/preview/mixkit-man-runs-past-ground-level-shot-32809-large.mp4" muted loop playsinline></video>
                <div class="reel-info">
                    <h3>FITNESS</h3>
                </div>
            </div>
            <!-- Reel 3 -->
            <div class="reel-card video-trigger">
                <video src="https://assets.mixkit.co/videos/preview/mixkit-hands-holding-a-smart-phone-with-a-green-screen-43477-large.mp4" muted loop playsinline></video>
                <div class="reel-info">
                    <h3>TECH</h3>
                </div>
            </div>
            <!-- Reel 4 -->
            <div class="reel-card video-trigger">
                <video src="https://assets.mixkit.co/videos/preview/mixkit-chef-putting-spices-on-a-steak-in-a-restaurant-kitchen-43759-large.mp4" muted loop playsinline></video>
                <div class="reel-info">
                    <h3>FOOD</h3>
                </div>
            </div>
            <!-- Reel 5 -->
            <div class="reel-card video-trigger">
                <video src="https://assets.mixkit.co/videos/preview/mixkit-woman-doing-yoga-meditation-at-sunrise-40960-large.mp4" muted loop playsinline></video>
                <div class="reel-info">
                    <h3>LIFESTYLE</h3>
                </div>
            </div>
        </div>
    </section>

    <div class="footer-cta hover-trigger">
        <div class="big-cta-text">LET'S<br>ROLL</div>
        <div style="margin-top: 30px; letter-spacing: 4px;">START YOUR PROJECT</div>
    </div>

    <script>
        // === CUSTOM CURSOR ===
        const cursorDot = document.querySelector('.cursor-dot');
        const cursorOutline = document.querySelector('.cursor-outline');
        const cursorText = document.querySelector('.cursor-text');

        window.addEventListener('mousemove', (e) => {
            const posX = e.clientX;
            const posY = e.clientY;

            // Dot follows instantly
            cursorDot.style.left = `${posX}px`;
            cursorDot.style.top = `${posY}px`;

            // Outline follows with lag (handled by CSS transition usually, but let's do simple JS for smoothness)
            cursorOutline.animate({
                left: `${posX}px`,
                top: `${posY}px`
            }, { duration: 500, fill: "forwards" });
        });

        // Hover Effects
        document.querySelectorAll('.hover-trigger').forEach(el => {
            el.addEventListener('mouseenter', () => {
                document.body.classList.add('hovering');
                cursorText.textContent = "";
            });
            el.addEventListener('mouseleave', () => document.body.classList.remove('hovering'));
        });

        document.querySelectorAll('.video-trigger').forEach(el => {
            el.addEventListener('mouseenter', () => {
                document.body.classList.add('video-hover');
                cursorText.textContent = "PLAY";
                
                // Play video if it's a reel
                const vid = el.querySelector('video');
                if(vid) vid.play();
            });
            el.addEventListener('mouseleave', () => {
                document.body.classList.remove('video-hover');
                cursorText.textContent = "";
                
                // Pause video
                const vid = el.querySelector('video');
                if(vid) vid.pause();
            });
        });

        // === WORK SECTION HOVER REVEAL ===
        const workItems = document.querySelectorAll('.work-item');
        const bgVideos = document.querySelectorAll('.work-bg-video');

        workItems.forEach(item => {
            item.addEventListener('mouseenter', () => {
                // Remove active class from all videos
                bgVideos.forEach(vid => {
                    vid.classList.remove('active');
                    vid.pause();
                });

                // Add active to target video
                const targetId = item.getAttribute('data-bg');
                const targetVid = document.getElementById(targetId);
                if(targetVid) {
                    targetVid.classList.add('active');
                    targetVid.play();
                }
            });
        });

        // === REELS SKEW EFFECT ===
        const reelsContainer = document.getElementById('reelsContainer');
        let currentScroll = 0;
        let targetScroll = 0;
        let skewDiff = 0;

        // Listen for scroll in container
        reelsContainer.addEventListener('scroll', () => {
           // Basic skew based on horizontal movement
           // In a real production app, we would use requestAnimationFrame for smoother interpolation
           const newScroll = reelsContainer.scrollLeft;
           const diff = newScroll - currentScroll;
           
           // Clamp skew
           const skew = Math.min(Math.max(diff * 0.2, -10), 10);
           
           // Apply skew to children
           const cards = document.querySelectorAll('.reel-card');
           cards.forEach(card => {
               card.style.transform = `skewX(${-skew}deg)`;
           });

           currentScroll = newScroll;

           // Reset skew after stop
           clearTimeout(reelsContainer.skewTimer);
           reelsContainer.skewTimer = setTimeout(() => {
                cards.forEach(card => {
                   card.style.transform = `skewX(0deg)`;
               });
           }, 100);
        });

    </script>
</body>
</html>