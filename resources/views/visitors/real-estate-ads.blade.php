@extends('layout.visitor', [
    'title' => 'Real Estate Ads Agency in Gurgaon | Thumbpin',
    'description' => 'Thumbpin produces cinematic real estate ad films, drone walkthroughs and property promo reels that help builders and brokers sell faster.',
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
    background: #fff;
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
    color: rgba(0,0,0,0.03);
    pointer-events: none;
    line-height: 1;
}

.film-reels-section .film-section-tag {
    color: var(--film-red);
}

.film-reels-section .film-section-title {
    color: #000;
}

.film-reels-section .film-section-subtitle {
    color: #555;
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

/* ====================== LONG-FORM VIDEOS ====================== */
.film-longform-section {
    padding: 100px 0;
    background: #fff;
}

.film-longform-section .film-section-tag {
    color: var(--film-red);
}

.film-longform-section .film-section-title {
    color: #000;
}

.film-longform-section .film-section-subtitle {
    color: #555;
}

.longform-video-list {
    display: flex;
    flex-direction: column;
    gap: 50px;
}

.longform-video-card {
    display: flex;
    align-items: stretch;
    background: #f7f7f7;
    border: 1px solid #e5e5e5;
    overflow: hidden;
    transition: var(--transition);
}

.longform-video-card:hover {
    border-color: rgba(229, 9, 20, 0.3);
    transform: translateY(-5px);
    box-shadow: 0 30px 60px rgba(0,0,0,0.12);
}

.longform-video-card.reverse {
    flex-direction: row-reverse;
}

.longform-video-thumb {
    flex: 1;
    position: relative;
    min-height: 320px;
}

.longform-video-thumb .yt-facade {
    position: relative;
    width: 100%;
    height: 100%;
    cursor: pointer;
    overflow: hidden;
}

.longform-video-thumb .yt-facade img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
}

.longform-video-card:hover .yt-facade img {
    transform: scale(1.05);
}

.longform-video-thumb .yt-play {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 64px;
    height: 64px;
    background: var(--film-red);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
}

.longform-video-card:hover .yt-play {
    transform: translate(-50%, -50%) scale(1.15);
    box-shadow: 0 15px 50px rgba(229,9,20,0.5);
}

.longform-video-thumb .yt-play svg {
    width: 24px;
    height: 24px;
    fill: #fff;
    margin-left: 3px;
}

.longform-video-info {
    flex: 0.6;
    padding: 50px 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.longform-video-title {
    font-size: 24px;
    font-weight: 700;
    color: #000;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: -0.5px;
}

.longform-video-desc {
    font-size: 14px;
    color: #555;
    line-height: 1.6;
    margin-bottom: 25px;
}

.longform-video-tag {
    display: inline-block;
    padding: 5px 12px;
    background: rgba(0,0,0,0.04);
    border: 1px solid #ddd;
    border-radius: 2px;
    font-size: 11px;
    color: #555;
    text-transform: uppercase;
    letter-spacing: 1px;
    width: fit-content;
}

/* ====================== BEYOND THE SHOOT (ADDITIONAL SERVICES) ====================== */
.film-beyond-section {
    padding: 100px 0;
    background: #fff;
}

.film-beyond-section .film-section-tag {
    color: var(--film-red);
}

.film-beyond-section .film-section-title {
    color: #000;
}

.film-beyond-section .film-section-subtitle {
    color: #555;
}

.beyond-services-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
}

.beyond-service-card {
    background: #f5f5f5;
    border: 1px solid #e5e5e5;
    border-radius: 8px;
    padding: 45px 40px;
    transition: var(--transition);
    display: flex;
    flex-direction: column;
}

.beyond-service-card:hover {
    border-color: rgba(229, 9, 20, 0.3);
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.08);
}

.beyond-service-tag {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: var(--film-red);
    margin-bottom: 15px;
}

.beyond-service-title {
    font-family: var(--font-display);
    font-size: 26px;
    font-weight: 700;
    text-transform: uppercase;
    color: #000;
    margin-bottom: 15px;
}

.beyond-service-desc {
    font-size: 15px;
    color: #555;
    line-height: 1.7;
    margin-bottom: 25px;
    flex-grow: 1;
}

.beyond-service-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #000;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-decoration: none;
    transition: var(--transition);
}

.beyond-service-link svg {
    width: 16px;
    height: 16px;
    transition: transform 0.3s;
}

.beyond-service-link:hover {
    color: var(--film-red);
}

.beyond-service-link:hover svg {
    transform: translateX(4px);
}

/* ====================== TRANSPARENCY & LOGISTICS ====================== */
.film-logistics-section {
    padding: 100px 0;
    background: #fff;
}

.film-logistics-section .film-section-tag {
    color: var(--film-red);
}

.film-logistics-section .film-section-title {
    color: #000;
}

.film-logistics-section .film-section-subtitle {
    color: #555;
}

.logistics-note-card {
    background: #f5f5f5;
    border: 1px solid #e5e5e5;
    border-left: 3px solid var(--film-red);
    border-radius: 6px;
    padding: 50px;
}

.logistics-note-tag {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: var(--film-red);
    margin-bottom: 20px;
}

.logistics-note-tag::before {
    content: '';
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--film-red);
}

.logistics-note-statement {
    font-family: var(--font-display);
    font-size: clamp(24px, 3vw, 34px);
    font-weight: 700;
    color: #000;
    line-height: 1.3;
    margin-bottom: 30px;
    max-width: 700px;
}

.logistics-checklist {
    display: flex;
    flex-direction: column;
    gap: 18px;
}

.logistics-checklist-item {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    font-size: 15px;
    color: #555;
    line-height: 1.6;
}

.logistics-checklist-item strong {
    color: #000;
}

.logistics-checklist-icon {
    flex-shrink: 0;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 700;
    margin-top: 2px;
}

.logistics-checklist-icon.ok {
    background: rgba(34, 197, 94, 0.15);
    color: #22c55e;
}

.logistics-checklist-icon.note {
    background: rgba(229, 9, 20, 0.15);
    color: var(--film-red);
}

/* ====================== CTA SECTION ====================== */
.film-cta-section {
    padding: 120px 20px;
    background: #fff;
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
    background: radial-gradient(circle, rgba(229,9,20,0.05), transparent 70%);
    pointer-events: none;
}

.film-cta-title {
    font-family: var(--font-display);
    font-size: clamp(36px, 6vw, 72px);
    font-weight: 700;
    text-transform: uppercase;
    margin-bottom: 20px;
    line-height: 1;
    color: #000;
}

.film-cta-title span {
    color: var(--film-red);
}

.film-cta-desc {
    font-size: 18px;
    color: #555;
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
    background: #000;
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.25);
}

.film-cta-btn svg {
    width: 18px;
    height: 18px;
    transition: transform 0.3s;
}

.film-cta-btn:hover svg {
    transform: translateX(5px);
}

.film-cta-form {
    max-width: 700px;
    margin: 0 auto;
    text-align: left;
    position: relative;
    z-index: 1;
}

.film-cta-row {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    margin-bottom: 35px;
}

.film-cta-field {
    position: relative;
    flex: 1 1 calc(50% - 20px);
}

.film-cta-field.full-width {
    flex: 1 1 100%;
}

.film-cta-field::after {
    content: '';
    display: block;
    width: 30px;
    height: 1px;
    background-color: #999;
    position: absolute;
    right: 0;
    bottom: 0;
    transform-origin: left center;
    transform: translateX(100%) rotate(-35deg);
}

.film-cta-field input {
    width: 100%;
    padding: 16px 4px;
    background: transparent;
    border: none;
    border-bottom: 1px solid #ccc;
    color: #000;
    font-family: var(--font-body);
    font-size: 14px;
    transition: var(--transition);
}

.film-cta-field input::placeholder {
    color: #888;
}

.film-cta-field input:focus {
    outline: none;
    border-bottom-color: var(--film-red);
}

.film-cta-submit-row {
    text-align: center;
    margin-top: 10px;
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

    .longform-video-card,
    .longform-video-card.reverse {
        flex-direction: column;
    }

    .longform-video-thumb {
        min-height: 280px;
    }

    .longform-video-info {
        padding: 30px 25px;
    }

    .beyond-services-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .film-hero {
        min-height: 55vh;
        padding: 120px 20px 80px;
    }

    .film-beyond-section {
        padding: 60px 0;
    }

    .beyond-service-card {
        padding: 35px 25px;
    }

    .film-cta-field {
        flex: 1 1 100%;
    }

    .film-logistics-section {
        padding: 60px 0;
    }

    .logistics-note-card {
        padding: 30px 25px;
    }

    .film-hero-stats {
        gap: 30px;
    }

    .film-stat-num {
        font-size: 32px;
    }

    .film-reels-section,
    .film-longform-section {
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

    .longform-video-title {
        font-size: 18px;
    }

    .longform-video-desc {
        font-size: 13px;
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
            <h1 class="film-hero-title">Real Estate <span>Ads</span></h1>
            <p class="film-hero-desc">
                From cinematic indoor walkthroughs to sweeping drone shots, we produce premium video ads engineered to grab attention and sell properties faster.
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
                <div class="film-section-tag">What It Is — 01 — Short-Form Videos</div>
                <h2 class="film-section-title">Scroll-Stopping<br>Short Content</h2>
                <p class="film-section-subtitle">Fast-paced vertical videos tailored for real estate. Capture attention instantly and generate quick leads.</p>
            </div>

            <div class="reels-cinema-grid">
                {{-- Reel 1: Product Launch Ad --}}
                <div class="reel-cinema-item film-reveal" data-video-id="vxP6PPDu-I8">
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/vxP6PPDu-I8/hqdefault.jpg" alt="Product Launch Ad" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>Veenasana Interior Solutions</h4>
                        <span>UGC Content</span>
                    </div>
                </div>

                {{-- Reel 2: Brand Awareness --}}
                <div class="reel-cinema-item film-reveal" data-video-id="ESDd09xZ1_w">
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/ESDd09xZ1_w/hqdefault.jpg" alt="Brand Awareness Reel" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>SCDA M3M Capital</h4>
                        <span>Featured Reel</span>
                    </div>
                </div>

                {{-- Reel 3: Conversion Campaign --}}
                <div class="reel-cinema-item film-reveal" data-video-id="_Dd1WU4yNvk">
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/_Dd1WU4yNvk/hqdefault.jpg" alt="Conversion Campaign" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>Gaurs Real Estate</h4>
                        <span>Branded Ad</span>
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

    {{-- ====================== LONG-FORM VIDEOS ====================== --}}
    <section class="film-longform-section" id="sec-longform">
        <div class="film-container">
            <div class="film-section-header film-reveal">
                <div class="film-section-tag">What It Is — 02 — Long-Form Videos</div>
                <h2 class="film-section-title">Cinematic<br>Property Walkthroughs</h2>
                <p class="film-section-subtitle">Cinematic YouTube walkthroughs, property tours, and horizontal website feature videos. Perfect for deep engagement.</p>
            </div>

            <div class="longform-video-list">
                {{-- Long-Form 1 --}}
                <div class="longform-video-card film-reveal" data-video-id="iaLUi722K9g">
                    <div class="longform-video-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/iaLUi722K9g/maxresdefault.jpg" alt="Luxury Flat Walkthrough" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="longform-video-info">
                        <h3 class="longform-video-title">Luxury Flat Walkthrough</h3>
                        <p class="longform-video-desc">
                            A guided, cinematic tour through a premium flat — layout, finish and amenities
                            captured to give buyers a real sense of the space.
                        </p>
                        <span class="longform-video-tag">Property Tour</span>
                    </div>
                </div>

                {{-- Long-Form 2 --}}
                <div class="longform-video-card reverse film-reveal" data-video-id="8MfZGeMuMlE">
                    <div class="longform-video-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/8MfZGeMuMlE/maxresdefault.jpg" alt="Commercial Project Walkthrough" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="longform-video-info">
                        <h3 class="longform-video-title">Commercial Project Walkthrough</h3>
                        <p class="longform-video-desc">
                            Aerial and ground coverage of a commercial development, highlighting scale,
                            location advantages and connectivity for investors.
                        </p>
                        <span class="longform-video-tag">Drone & Aerial</span>
                    </div>
                </div>

                {{-- Long-Form 3 --}}
                <div class="longform-video-card film-reveal" data-video-id="ok2COviyVHg">
                    <div class="longform-video-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/ok2COviyVHg/maxresdefault.jpg" alt="Penthouse Walkthrough" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="longform-video-info">
                        <h3 class="longform-video-title">Penthouse Walkthrough</h3>
                        <p class="longform-video-desc">
                            A cinematic walkthrough of a premium penthouse — layout, views and finish
                            captured to give buyers a real sense of the space.
                        </p>
                        <span class="longform-video-tag">Property Tour</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ====================== BEYOND THE SHOOT (ADDITIONAL SERVICES) ====================== --}}
    <section class="film-beyond-section" id="sec-beyond">
        <div class="film-container">
            <div class="film-section-header film-reveal">
                <div class="film-section-tag">03 — Beyond The Shoot</div>
                <h2 class="film-section-title">We Don't Just Shoot.<br>We Build The Machine.</h2>
                <p class="film-section-subtitle">We're not just a camera crew — we build the full system that turns these videos into actual leads.</p>
            </div>

            <div class="beyond-services-grid">
                <div class="beyond-service-card film-reveal">
                    <div class="beyond-service-tag">Additional Service</div>
                    <h3 class="beyond-service-title">Landing Page Design</h3>
                    <p class="beyond-service-desc">
                        We build custom, high-converting landing pages tailored to the property or the
                        agent's brand — built to turn video views into enquiries.
                    </p>
                    <a href="{{ route('web-design-agency') }}" class="beyond-service-link">
                        Explore This Service
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                    </a>
                </div>
                <div class="beyond-service-card film-reveal">
                    <div class="beyond-service-tag">Additional Service</div>
                    <h3 class="beyond-service-title">Meta & Google Ads</h3>
                    <p class="beyond-service-desc">
                        We set up the targeting and optimization to put these videos in front of actual
                        buyers and sellers, not just random views.
                    </p>
                    <a href="{{ route('performance-marketing-agency') }}" class="beyond-service-link">
                        Explore This Service
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ====================== TRANSPARENCY & LOGISTICS ====================== --}}
    <section class="film-logistics-section" id="sec-logistics">
        <div class="film-container">
            <div class="film-section-header film-reveal">
                <div class="film-section-tag">04 — Transparency & Logistics</div>
                <h2 class="film-section-title">No Surprises.<br>Just Clarity.</h2>
                <p class="film-section-subtitle">Addressing the logistics upfront so there are no surprises later — here's exactly how travel works.</p>
            </div>

            <div class="logistics-note-card film-reveal">
                <p class="logistics-note-statement">
                    We exclusively shoot within the Delhi NCR region. No hidden charges,
                    no surprise travel bills.
                </p>
                <div class="logistics-checklist">
                    <div class="logistics-checklist-item">
                        <span class="logistics-checklist-icon ok">+</span>
                        <span><strong>Delhi NCR only</strong> — our production team covers Delhi, Gurgaon, Noida and the rest of the NCR region.</span>
                    </div>
                    <div class="logistics-checklist-item">
                        <span class="logistics-checklist-icon ok">+</span>
                        <span><strong>All filming within NCR is fully inclusive</strong> — no hidden charges.</span>
                    </div>
                    <div class="logistics-checklist-item">
                        <span class="logistics-checklist-icon note">−</span>
                        <span><strong>Travel arrangements for our team and equipment</strong> to and from the shoot location are arranged by the client.</span>
                    </div>
                    <div class="logistics-checklist-item">
                        <span class="logistics-checklist-icon note">−</span>
                        <span><strong>We currently do not service projects outside Delhi NCR.</strong></span>
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

            <form class="film-cta-form" action="{{ route('project-form') }}" method="post">
                @csrf
                <input type="hidden" name="url" value="{{ Request::url() }}">
                <div class="film-cta-row">
                    <div class="film-cta-field">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="film-cta-field">
                        <input type="text" name="company_name" placeholder="Company Name" required>
                    </div>
                    <div class="film-cta-field">
                        <input type="email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="film-cta-field">
                        <input type="number" name="mobile" placeholder="Contact Number" required>
                        @error('mobile')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="film-cta-field full-width">
                        <input type="text" name="requirement" placeholder="Requirement" required>
                    </div>
                </div>
                <div class="film-cta-submit-row">
                    <button type="submit" class="film-cta-btn">
                        Start Your Project
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                    </button>
                </div>
            </form>
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
