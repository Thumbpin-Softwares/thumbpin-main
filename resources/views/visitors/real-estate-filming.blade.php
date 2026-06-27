@extends('layout.visitor', [
    'title' => 'Film & Video Production Portfolio | Thumbpin',
    'description' => 'Explore Thumbpin\'s award-worthy film portfolio — cinematic corporate films, ad commercials, product shoots, and scroll-stopping reels. View our best video production work.',
    'footer_black' => 'footer-black',
])

@section('head')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://www.youtube.com">
<link rel="preconnect" href="https://i.ytimg.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
<noscript>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</noscript>

<style>
/* ====================== CSS VARIABLES ====================== */
:root {
    --film-red: #E50914;
    --film-red-dim: #b2070f;
    --film-black: #0a0a0a;
    --film-dark: #111;
    --film-card: #161616;
    --film-white: #f4f4f4;
    --film-gray: #888;
    --font-display: 'Oswald', sans-serif;
    --font-body: 'Poppins', 'AcuminVariableConcept', sans-serif;
    --transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
}

/* ====================== GLOBAL ====================== */
.film-page-wrapper {
    background: var(--film-black);
    color: #fff;
    font-family: var(--font-body);
    overflow-x: hidden;
}

.film-page-wrapper *,
.film-page-wrapper *::before,
.film-page-wrapper *::after {
    box-sizing: border-box;
}

.film-container {
    max-width: 1300px;
    margin: 0 auto;
    padding: 0 20px;
}

/* ====================== HERO ====================== */
.film-hero {
    position: relative;
    min-height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: #000;
    padding: 140px 20px 100px;
}

.film-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse at center, transparent 30%, #000 85%);
    z-index: 2;
}

.film-hero::after {
    content: 'FILM';
    position: absolute;
    bottom: -60px;
    right: -20px;
    font-size: clamp(120px, 20vw, 300px);
    font-family: var(--font-display);
    font-weight: 700;
    color: rgba(255,255,255,0.02);
    z-index: 1;
    line-height: 1;
    pointer-events: none;
}

.film-hero-bg {
    position: absolute;
    inset: 0;
    background: url('https://img.youtube.com/vi/UJtRgvgHdxQ/maxresdefault.jpg') center/cover no-repeat;
    opacity: 0.15;
    filter: saturate(0) contrast(1.2);
    z-index: 1;
}

.film-hero-content {
    position: relative;
    z-index: 3;
    text-align: center;
    max-width: 900px;
}

.film-hero-badge {
    display: inline-block;
    padding: 6px 20px;
    background: rgba(229, 9, 20, 0.15);
    border: 1px solid rgba(229, 9, 20, 0.4);
    color: var(--film-red);
    font-weight: 700;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 3px;
    margin-bottom: 30px;
    border-radius: 2px;
}

.film-hero-title {
    font-family: var(--font-display);
    font-size: clamp(48px, 10vw, 120px);
    font-weight: 700;
    line-height: 0.9;
    text-transform: uppercase;
    margin-bottom: 25px;
    color: #fff;
    opacity: 0;
    transform: translateY(30px);
    animation: heroFadeIn 1s ease forwards 0.3s;
}

.film-hero-title span {
    color: transparent;
    -webkit-text-stroke: 2px rgba(255,255,255,0.6);
}

.film-hero-desc {
    font-size: 18px;
    color: #999;
    max-width: 600px;
    margin: 0 auto 40px;
    line-height: 1.7;
    font-weight: 300;
    opacity: 0;
    animation: heroFadeIn 1s ease forwards 0.6s;
}

.film-hero-stats {
    display: flex;
    justify-content: center;
    gap: 50px;
    opacity: 0;
    animation: heroFadeIn 1s ease forwards 0.9s;
}

.film-stat {
    text-align: center;
}

.film-stat-num {
    font-family: var(--font-display);
    font-size: 42px;
    font-weight: 700;
    color: var(--film-red);
    line-height: 1;
}

.film-stat-label {
    font-size: 11px;
    color: #666;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-top: 5px;
}

@keyframes heroFadeIn {
    to { opacity: 1; transform: translateY(0); }
}

/* ====================== SECTION HEADERS ====================== */
.film-section-header {
    margin-bottom: 60px;
    position: relative;
}

.film-section-tag {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 3px;
    color: var(--film-red);
    margin-bottom: 15px;
}

.film-section-title {
    font-family: var(--font-display);
    font-size: clamp(36px, 5vw, 56px);
    font-weight: 700;
    text-transform: uppercase;
    line-height: 1.1;
    color: #fff;
    margin-bottom: 15px;
}

.film-section-subtitle {
    font-size: 16px;
    color: #666;
    max-width: 500px;
    line-height: 1.6;
}

/* ====================== KINETIC TEXT DIVIDER ====================== */
.film-kinetic-wrap {
    background: var(--film-red);
    padding: 15px 0;
    overflow: hidden;
    margin: 0;
}

.film-kinetic-text {
    white-space: nowrap;
    font-size: 50px;
    font-family: var(--font-display);
    font-weight: 700;
    color: rgba(0,0,0,0.2);
    animation: filmMarquee 20s linear infinite;
    will-change: transform;
}

@keyframes filmMarquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

/* ====================== REELS / SHORT CONTENT ====================== */
.film-reels-section {
    padding: 100px 0;
    background: #050505;
    position: relative;
    overflow: hidden;
}

.film-reels-section::before {
    content: 'REELS';
    position: absolute;
    bottom: 50px;
    left: -20px;
    font-size: 200px;
    font-family: var(--font-display);
    font-weight: 700;
    color: rgba(255,255,255,0.015);
    pointer-events: none;
    line-height: 1;
}

.reels-cinema-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-top: 60px;
}

.reel-cinema-item {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    background: #000;
    cursor: pointer;
    transition: var(--transition);
}

.reel-cinema-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.5);
}

/* Stagger effect */
.reel-cinema-item:nth-child(2) { transform: translateY(30px); }
.reel-cinema-item:nth-child(4) { transform: translateY(30px); }
.reel-cinema-item:nth-child(6) { transform: translateY(30px); }
.reel-cinema-item:nth-child(8) { transform: translateY(30px); }
.reel-cinema-item:nth-child(2):hover { transform: translateY(22px); }
.reel-cinema-item:nth-child(4):hover { transform: translateY(22px); }
.reel-cinema-item:nth-child(6):hover { transform: translateY(22px); }
.reel-cinema-item:nth-child(8):hover { transform: translateY(22px); }

.reel-cinema-thumb {
    position: relative;
    padding-bottom: 177.77%; /* 9:16 */
}

.reel-cinema-thumb .yt-facade {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.reel-cinema-thumb .yt-facade img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.reel-cinema-item:hover .yt-facade img {
    transform: scale(1.08);
}

.reel-cinema-thumb .yt-play {
    position: absolute;
    z-index: 3;
    width: 50px;
    height: 50px;
    background: rgba(229, 9, 20, 0.85);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transform: scale(0.8);
    transition: var(--transition);
}

.reel-cinema-item:hover .yt-play {
    opacity: 1;
    transform: scale(1);
}

.reel-cinema-thumb .yt-play svg {
    width: 18px;
    height: 18px;
    fill: #fff;
    margin-left: 2px;
}

.reel-cinema-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 25px 15px 15px;
    background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, transparent 100%);
    z-index: 2;
}

.reel-cinema-overlay h4 {
    font-size: 13px;
    font-weight: 700;
    color: #fff;
    margin: 0 0 4px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.reel-cinema-overlay span {
    font-size: 10px;
    color: #888;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.reel-cinema-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    padding: 3px 10px;
    background: var(--film-red);
    color: #fff;
    font-size: 9px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-radius: 2px;
    z-index: 4;
}

/* ====================== CTA SECTION ====================== */
.film-cta-section {
    padding: 120px 20px;
    background: linear-gradient(135deg, #111 0%, #000 100%);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.film-cta-section::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(229,9,20,0.08), transparent 70%);
    pointer-events: none;
}

.film-cta-title {
    font-family: var(--font-display);
    font-size: clamp(36px, 6vw, 72px);
    font-weight: 700;
    text-transform: uppercase;
    margin-bottom: 20px;
    line-height: 1;
}

.film-cta-title span {
    color: var(--film-red);
}

.film-cta-desc {
    font-size: 18px;
    color: #666;
    margin-bottom: 40px;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

.film-cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 18px 45px;
    background: var(--film-red);
    color: #fff;
    font-weight: 700;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: var(--transition);
    clip-path: polygon(5% 0, 100% 0, 95% 100%, 0 100%);
}

.film-cta-btn:hover {
    background: #fff;
    color: #000;
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(229,9,20,0.3);
}

.film-cta-btn svg {
    width: 18px;
    height: 18px;
    transition: transform 0.3s;
}

.film-cta-btn:hover svg {
    transform: translateX(5px);
}

/* ====================== VIDEO LIGHTBOX ====================== */
.film-lightbox {
    position: fixed;
    inset: 0;
    z-index: 99999;
    background: rgba(0,0,0,0.95);
    display: none;
    align-items: center;
    justify-content: center;
    padding: 40px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.film-lightbox.active {
    display: flex;
    opacity: 1;
}

.film-lightbox-inner {
    position: relative;
    width: 100%;
    max-width: 900px;
    aspect-ratio: 16/9;
    background: #000;
}

.film-lightbox-inner iframe {
    width: 100%;
    height: 100%;
    border: none;
}

.film-lightbox-close {
    position: absolute;
    top: -45px;
    right: 0;
    background: none;
    border: none;
    color: #fff;
    font-size: 30px;
    cursor: pointer;
    transition: var(--transition);
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.film-lightbox-close:hover {
    color: var(--film-red);
    transform: rotate(90deg);
}

/* ====================== SCROLL REVEAL ====================== */
.film-reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.7s ease;
}

.film-reveal.visible {
    opacity: 1;
    transform: translateY(0);
}

/* ====================== RESPONSIVE ====================== */
@media (max-width: 1024px) {
    .reels-cinema-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
    }
}

@media (max-width: 768px) {
    .film-hero {
        min-height: 55vh;
        padding: 120px 20px 80px;
    }

    .film-hero-stats {
        gap: 30px;
    }

    .film-stat-num {
        font-size: 32px;
    }

    .film-reels-section {
        padding: 70px 0;
    }

    .reels-cinema-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }

    /* Remove stagger on mobile */
    .reel-cinema-item:nth-child(n) {
        transform: none !important;
    }
    .reel-cinema-item:hover {
        transform: translateY(-5px) !important;
    }

    .film-cta-section {
        padding: 80px 20px;
    }

    .film-reels-section::before {
        display: none;
    }

    .film-lightbox {
        padding: 20px;
    }
}

@media (max-width: 480px) {
    .film-hero {
        min-height: 50vh;
        padding: 100px 15px 60px;
    }
    
    .film-hero-desc {
        font-size: 15px;
    }
    
    .film-hero-stats {
        flex-wrap: wrap;
        gap: 20px;
    }
    
    .reels-cinema-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }
    
    .reel-cinema-overlay h4 {
        font-size: 11px;
    }
    
    .film-kinetic-text {
        font-size: 35px;
    }
}
</style>
@endsection

@section('content')
<main class="film-page-wrapper">

    {{-- ====================== HERO ====================== --}}
    <section class="film-hero" id="film-hero">
        <div class="film-hero-bg"></div>
        <div class="film-hero-content">
            <div class="film-hero-badge">Real Estate Filming</div>
            <h1 class="film-hero-title">Real Estate <span>Filming</span></h1>
            <p class="film-hero-desc">
                Cinematic property walkthroughs and drone aerials that help builders and brokers showcase
                every project at its best and sell faster.
            </p>
            <div class="film-hero-stats">
                <div class="film-stat">
                    <div class="film-stat-num">50+</div>
                    <div class="film-stat-label">Projects Filmed</div>
                </div>
                <div class="film-stat">
                    <div class="film-stat-num">20+</div>
                    <div class="film-stat-label">Brokers Served</div>
                </div>
                <div class="film-stat">
                    <div class="film-stat-num">200+</div>
                    <div class="film-stat-label">Shooting Hours</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ====================== KINETIC DIVIDER ====================== --}}
    <div class="film-kinetic-wrap">
        <div class="film-kinetic-text">
            REELS • SHORTS • ADS • INSTAGRAM • YOUTUBE • PERFORMANCE • SOCIAL • 
            REELS • SHORTS • ADS • INSTAGRAM • YOUTUBE • PERFORMANCE • SOCIAL •
        </div>
    </div>

    {{-- ====================== REELS & SHORT CONTENT ====================== --}}
    <section class="film-reels-section" id="sec-reels">
        <div class="film-container">
            <div class="film-section-header film-reveal">
                <div class="film-section-tag">02 — Reels & Short Content</div>
                <h2 class="film-section-title">Scroll-Stopping<br>Short Content</h2>
                <p class="film-section-subtitle">High-conversion ad films, reels, and UGC content engineered for social media performance.</p>
            </div>

            <div class="reels-cinema-grid">
                {{-- Reel 1: Product Launch Ad --}}
                <div class="reel-cinema-item film-reveal" data-video-id="_UagDA4XyFM">
                    <div class="reel-cinema-badge">Instagram</div>
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/_UagDA4XyFM/hqdefault.jpg" alt="Product Launch Ad" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>Product Launch Ad</h4>
                        <span>Performance Marketing</span>
                    </div>
                </div>

                {{-- Reel 2: Brand Awareness --}}
                <div class="reel-cinema-item film-reveal" data-video-id="MoEvrnlSy7U">
                    <div class="reel-cinema-badge">YouTube</div>
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/MoEvrnlSy7U/hqdefault.jpg" alt="Brand Awareness Reel" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>Brand Awareness Reel</h4>
                        <span>UGC Content</span>
                    </div>
                </div>

                {{-- Reel 3: Conversion Campaign --}}
                <div class="reel-cinema-item film-reveal" data-video-id="sQcTZugZne0">
                    <div class="reel-cinema-badge">Meta Ad</div>
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/sQcTZugZne0/hqdefault.jpg" alt="Conversion Campaign" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>Conversion Campaign</h4>
                        <span>Performance Ad</span>
                    </div>
                </div>

                {{-- Reel 4: Testimonial UGC --}}
                <div class="reel-cinema-item film-reveal" data-video-id="V_-e9JaCnuM">
                    <div class="reel-cinema-badge">UGC</div>
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/V_-e9JaCnuM/hqdefault.jpg" alt="Testimonial UGC" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>Testimonial UGC</h4>
                        <span>User Generated</span>
                    </div>
                </div>

                {{-- Reel 5: App Install Ad --}}
                <div class="reel-cinema-item film-reveal" data-video-id="Oj4FmmUoCKA">
                    <div class="reel-cinema-badge">Reel Ad</div>
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/Oj4FmmUoCKA/hqdefault.jpg" alt="App Install Ad" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>App Install Ad</h4>
                        <span>Performance</span>
                    </div>
                </div>

                {{-- Reel 6: High-Retention Reel --}}
                <div class="reel-cinema-item film-reveal" data-video-id="CiKv3ezY9b8">
                    <div class="reel-cinema-badge">Sales Ad</div>
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/CiKv3ezY9b8/hqdefault.jpg" alt="High-Retention Reel" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>High-Retention Reel</h4>
                        <span>Conversion Focus</span>
                    </div>
                </div>

                {{-- Reel 7 --}}
                <div class="reel-cinema-item film-reveal" data-video-id="ee1nPF5evyQ">
                    <div class="reel-cinema-badge">Reel</div>
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/ee1nPF5evyQ/hqdefault.jpg" alt="Brand Reel" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>Brand Reel</h4>
                        <span>Social Content</span>
                    </div>
                </div>

                {{-- Reel 8 --}}
                <div class="reel-cinema-item film-reveal" data-video-id="4T8YyPqliog">
                    <div class="reel-cinema-badge">Short</div>
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/4T8YyPqliog/hqdefault.jpg" alt="Engagement Short" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>Engagement Short</h4>
                        <span>Social Content</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ====================== CTA ====================== --}}
    <section class="film-cta-section">
        <div class="film-container film-reveal">
            <h2 class="film-cta-title">Your Story.<br><span>Our Lens.</span></h2>
            <p class="film-cta-desc">Ready to create something cinematic? Let's bring your brand to life with world-class production.</p>
            <a href="{{ route('contact') }}" class="film-cta-btn">
                Start Your Project
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
            </a>
        </div>
    </section>

    {{-- ====================== LIGHTBOX ====================== --}}
    <div class="film-lightbox" id="filmLightbox">
        <div class="film-lightbox-inner">
            <button class="film-lightbox-close" id="filmLightboxClose">&times;</button>
            <iframe id="filmLightboxIframe" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
    </div>

</main>
@endsection

@section('script')
<script>
(function() {
    'use strict';

    // ===== LIGHTBOX =====
    var lightbox = document.getElementById('filmLightbox');
    var lightboxIframe = document.getElementById('filmLightboxIframe');
    var lightboxClose = document.getElementById('filmLightboxClose');

    function openLightbox(videoId) {
        lightboxIframe.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('active');
        lightboxIframe.src = '';
        document.body.style.overflow = '';
    }

    lightboxClose.addEventListener('click', closeLightbox);
    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) closeLightbox();
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeLightbox();
    });

    // ===== CLICK-TO-PLAY (All facade items) =====
    var allCards = document.querySelectorAll('[data-video-id]');
    allCards.forEach(function(card) {
        card.addEventListener('click', function() {
            var vid = this.getAttribute('data-video-id');
            if (vid) openLightbox(vid);
        });
    });

    // ===== SCROLL REVEAL =====
    var reveals = document.querySelectorAll('.film-reveal');
    
    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        reveals.forEach(function(el) { observer.observe(el); });
    } else {
        // Fallback: just show everything
        reveals.forEach(function(el) { el.classList.add('visible'); });
    }

})();
</script>
@endsection
