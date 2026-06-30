@extends('layout.visitor', [
    'title' => 'Real Estate Video Ads Agency in Gurgaon | Thumbpin',
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
    background: url('{{ asset('assets/img/real-estate-hero.jpg') }}') center/cover no-repeat;
    opacity: 0.4;
    filter: saturate(0.6) contrast(1.1);
    z-index: 1;
}

.film-hero-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.6);
    z-index: 2;
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
    padding: 60px 0;
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

.film-reels-section .film-section-header {
    margin-bottom: 30px;
}

.reels-cinema-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-top: 60px;
}

.reel-cinema-item {
    position: relative;
    border-radius: 20px;
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

.reel-preview-iframe {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    border: none;
    z-index: 1;
    pointer-events: none;
}

.reel-cinema-item.is-previewing .yt-play {
    opacity: 0 !important;
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
    padding: 60px 0;
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

.film-longform-section .film-section-header {
    margin-bottom: 30px;
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
    border-radius: 20px;
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
    padding: 60px 0;
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

.film-beyond-section .film-section-header {
    margin-bottom: 30px;
}

.beyond-services-grid {
    display: flex;
    flex-direction: column;
    gap: 0;
}

.beyond-service-card {
    background: #fff;
    border-left: none;
    border-top: 1px solid #eee;
    padding: 0;
    display: flex;
    flex-direction: row;
    overflow: hidden;
    min-height: 320px;
}

.beyond-service-card:first-child {
    border-top: none;
}

.beyond-service-card--reverse {
    flex-direction: row-reverse;
}

.beyond-panel-img {
    width: 42%;
    flex-shrink: 0;
    overflow: hidden;
    position: relative;
}

.beyond-panel-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
}

.beyond-panel-img--icon {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
}

.beyond-panel-img--icon img {
    width: auto;
    height: auto;
    max-width: 320px;
    max-height: 320px;
    object-fit: contain;
}

.beyond-corner-img {
    display: none;
}

.beyond-service-img {
    display: none;
}

.beyond-service-body {
    flex: 1;
    padding: 50px 50px 55px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    border-left: 4px solid var(--film-red);
}

.beyond-service-card--reverse .beyond-service-body {
    border-left: none;
    border-right: 4px solid var(--film-red);
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
    padding: 60px 0;
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

.film-logistics-section .film-section-header {
    margin-bottom: 30px;
}

.logistics-note-card {
    background: #fff;
    border-left: 3px solid var(--film-red);
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
    padding: 70px 20px;
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
        padding: 10px 25px 30px;
    }

    .beyond-service-card {
        flex-direction: column !important;
        min-height: unset;
    }
    .beyond-panel-img {
        width: 100%;
        height: 220px;
    }
    .beyond-service-body {
        border-left: 4px solid var(--film-red) !important;
        border-right: none !important;
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

    .beyond-service-body {
        padding: 35px 25px 40px;
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
        padding: 50px 0;
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
        padding: 50px 20px;
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
        <div class="film-hero-overlay"></div>
        <div class="film-hero-content">
            <h1 class="film-hero-title">Real Estate <span>Video Ads</span></h1>
            <p class="film-hero-desc">
                From high-fashion model walkthroughs to precise, high-end editing, we produce premium video ads engineered to grab attention and sell properties faster.
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
                <div class="reel-cinema-item film-reveal" data-video-id="OaWH39sli8I">
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/OaWH39sli8I/hqdefault.jpg" alt="Product Launch Ad" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>Reach Buzz 114</h4>
                        <span>Commercial Content</span>
                    </div>
                </div>

                {{-- Reel 2: Brand Awareness --}}
                <div class="reel-cinema-item film-reveal" data-video-id="iqq0wHrYodA">
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/iqq0wHrYodA/hqdefault.jpg" alt="Brand Awareness Reel" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>Yashika Group</h4>
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
                <div class="reel-cinema-item film-reveal" data-video-id="AtbeokcSRW0">
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/AtbeokcSRW0/hqdefault.jpg" alt="Testimonial UGC" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>Cinematic Reel</h4>
                        <span>Photoshoot</span>
                    </div>
                </div>

                {{-- Reel 5 --}}
                <div class="reel-cinema-item film-reveal" data-video-id="vHdLpqGBSHc">
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/vHdLpqGBSHc/hqdefault.jpg" alt="Cinematic Reel" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>Creator Reel</h4>
                        <span>UGC Content</span>
                    </div>
                </div>

                {{-- Reel 6 --}}
                <div class="reel-cinema-item film-reveal" data-video-id="QaSbbGlLOkk">
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/QaSbbGlLOkk/hqdefault.jpg" alt="Cinematic Reel" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>London Screen Mohali</h4>
                        <span>Commercial Content</span>
                    </div>
                </div>

                {{-- Reel 7 --}}
                <div class="reel-cinema-item film-reveal" data-video-id="LnahKtDOZII">
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/LnahKtDOZII/hqdefault.jpg" alt="Cinematic Reel" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>Platinum Park</h4>
                        <span>Commercial Content</span>
                    </div>
                </div>

                {{-- Reel 8 --}}
                <div class="reel-cinema-item film-reveal" data-video-id="mjtbisBMB-A">
                    <div class="reel-cinema-thumb">
                        <div class="yt-facade">
                            <img src="https://img.youtube.com/vi/mjtbisBMB-A/hqdefault.jpg" alt="Cinematic Reel" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="reel-cinema-overlay">
                        <h4>Grand Emporio</h4>
                        <span>UGC content</span>
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
                <p class="film-section-subtitle">Cinematic tours and detailed walkthroughs. Designed to keep buyers watching and drive deep engagement.</p>
            </div>

            <div class="longform-video-list">
                {{-- Long-Form 1 --}}
                <div class="longform-video-card film-reveal" data-video-id="iaLUi722K9g">
                    <div class="longform-video-thumb">
                        <div class="yt-facade">
                            <img src="{{ asset('assets/img/long-1.jpg') }}" alt="Luxury Flat Walkthrough" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="longform-video-info">
                        <h3 class="longform-video-title">LUXURY FLATS WALKTHROUGH</h3>
                        <p class="longform-video-desc">
                            A guided cinematic tour of premium flats. We capture the layout, finishes, and amenities to give buyers a true sense of the space.
                        </p>
                        <span class="longform-video-tag">Property Tour</span>
                    </div>
                </div>

                {{-- Long-Form 2 --}}
                <div class="longform-video-card reverse film-reveal" data-video-id="4Fw2xtyUIWs">
                    <div class="longform-video-thumb">
                        <div class="yt-facade">
                            <img src="{{ asset('assets/img/long-2.jpg') }}" alt="Commercial Project Walkthrough" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="longform-video-info">
                        <h3 class="longform-video-title">Commercial Project Walkthrough</h3>
                        <p class="longform-video-desc">
                            A guided tour through the commercial space showcasing the design, floor plans, and modern infrastructure designed to maximize footfall and business visibility.
                        </p>
                        <span class="longform-video-tag">Drone & Aerial</span>
                    </div>
                </div>

                {{-- Long-Form 3 --}}
                <div class="longform-video-card film-reveal" data-video-id="-_522mOv58w">
                    <div class="longform-video-thumb">
                        <div class="yt-facade">
                            <img src="{{ asset('assets/img/long-3.jpg') }}" alt="Plotted Land Walkthrough" loading="lazy" decoding="async">
                            <div class="yt-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                    <div class="longform-video-info">
                        <h3 class="longform-video-title">Plotted Land Walkthrough</h3>
                        <p class="longform-video-desc">
                            A guided walkthrough of a plotted land development — boundaries, roads and
                            surroundings captured to give buyers a clear sense of the plot.
                        </p>
                        <span class="longform-video-tag">Property Tour</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ====================== REAL ESTATE LEAD FORM ====================== --}}
    <section class="re-lead-section">

        {{-- Clickable strip --}}
        <button type="button" id="re-lead-strip" class="re-lead-strip" aria-expanded="false">
            <span class="rls-left">Start A Project Now</span>
            <span class="rls-cta">Let's Get Started</span>
            <span class="rls-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
            </span>
        </button>

        {{-- Collapsible form body --}}
        <div id="re-lead-form-wrap" class="re-lead-form-wrap">
            <div class="film-container">
                <form id="re-lead-form" class="re-lead-form" novalidate>
                    @csrf
                    <div class="re-lead-row">
                        <div class="re-lead-field">
                            <input type="text" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="re-lead-field">
                            <input type="text" name="company_name" placeholder="Company Name" required>
                        </div>
                    </div>
                    <div class="re-lead-row">
                        <div class="re-lead-field">
                            <input type="email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="re-lead-field">
                            <input type="tel" name="contact" placeholder="Contact Number" required>
                        </div>
                    </div>
                    <div class="re-lead-row">
                        <div class="re-lead-field re-lead-field--full">
                            <input type="text" name="requirement" placeholder="Requirement" required>
                        </div>
                    </div>
                    <div class="re-lead-row re-lead-row--submit-inline">
                        <div class="re-lead-field">
                            <input type="text" name="marketing_budget" placeholder="Marketing Budget (e.g. ₹25,000)" required>
                        </div>
                        <button type="submit" class="re-lead-btn" id="re-lead-submit">
                            <span class="btn-text">Send Enquiry</span>
                            <span class="btn-loading" style="display:none;">Sending…</span>
                        </button>
                    </div>
                    <div id="re-lead-success" class="re-lead-success" style="display:none;"></div>
                    <div id="re-lead-error" class="re-lead-error" style="display:none;"></div>
                </form>
            </div>
        </div>

        <style>
        /* Strip */
        .re-lead-strip {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            background: #111;
            border: none;
            border-top: 1px solid #1e1e1e;
            border-bottom: 1px solid #1e1e1e;
            padding: 24px 60px;
            cursor: pointer;
        }

        .rls-left {
            font-family: var(--font-body);
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--film-red);
        }

        .rls-cta {
            font-family: var(--font-body);
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #fff;
            background: var(--film-red);
            padding: 14px 36px;
            transition: background 0.25s;
        }

        .re-lead-strip:hover .rls-cta {
            background: #c40812;
        }

        .rls-icon svg {
            width: 22px;
            height: 22px;
            color: #555;
            transition: transform 0.35s ease, color 0.25s;
        }

        .re-lead-strip[aria-expanded="true"] .rls-icon svg {
            transform: rotate(180deg);
            color: var(--film-red);
        }

        /* Collapsible body */
        .re-lead-form-wrap {
            overflow: hidden;
            max-height: 0;
            opacity: 0;
            transition: max-height 0.45s ease, opacity 0.35s ease;
            background: #0d0d0d;
            border-bottom: 1px solid #1e1e1e;
        }

        .re-lead-form-wrap.is-open {
            max-height: 900px;
            opacity: 1;
        }

        .re-lead-form {
            display: flex;
            flex-direction: column;
            gap: 0;
            padding: 48px 0 56px;
        }

        .re-lead-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 60px;
        }

        .re-lead-field {
            position: relative;
            padding-bottom: 36px;
        }

        .re-lead-field--full {
            grid-column: 1 / -1;
        }

        .re-lead-field input,
        .re-lead-field select {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid #2a2a2a;
            color: #fff;
            font-family: var(--font-body);
            font-size: 15px;
            padding: 14px 0;
            outline: none;
            transition: border-color 0.3s;
            appearance: none;
            -webkit-appearance: none;
        }

        .re-lead-field input::placeholder {
            color: #444;
        }

        .re-lead-field select option {
            background: #111;
            color: #fff;
        }

        .re-lead-field select:invalid,
        .re-lead-field select option[value=""] {
            color: #444;
        }

        .re-lead-field input:focus,
        .re-lead-field select:focus {
            border-bottom-color: var(--film-red);
        }

        .re-lead-row--submit-inline {
            display: flex;
            align-items: flex-end;
            gap: 16px;
            padding-bottom: 0;
        }

        .re-lead-row--submit-inline .re-lead-field {
            flex: 1;
            padding-bottom: 0;
        }

        .re-lead-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--film-red);
            color: #fff;
            border: none;
            padding: 14px 28px;
            font-family: var(--font-body);
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            cursor: pointer;
            transition: background 0.3s;
            white-space: nowrap;
            flex-shrink: 0;
            /* align with the input bottom border */
            margin-bottom: 1px;
        }

        .re-lead-btn:hover  { background: #b00710; }
        .re-lead-btn:disabled { opacity: 0.6; cursor: not-allowed; }

        .re-lead-success {
            margin-top: 20px;
            padding: 14px 18px;
            background: rgba(0,200,100,0.08);
            border-left: 3px solid #00c864;
            color: #00c864;
            font-size: 14px;
        }

        .re-lead-error {
            margin-top: 20px;
            padding: 14px 18px;
            background: rgba(229,9,20,0.08);
            border-left: 3px solid var(--film-red);
            color: #ff4d4d;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .re-lead-strip {
                flex-direction: column;
                align-items: center;
                gap: 14px;
                padding: 22px 24px;
                text-align: center;
            }
            .rls-left { font-size: 10px; }
            .rls-cta  { font-size: 12px; padding: 12px 28px; }
            .rls-icon svg { width: 20px; height: 20px; }
            .re-lead-row { grid-template-columns: 1fr; gap: 0; }
            .re-lead-row--submit-inline { flex-direction: column; align-items: stretch; }
            .re-lead-row--submit-inline .re-lead-field { padding-bottom: 36px; }
            .re-lead-btn { width: 100%; justify-content: center; }
        }
        </style>

        <script>
        (function () {
            var strip = document.getElementById('re-lead-strip');
            var wrap  = document.getElementById('re-lead-form-wrap');

            strip.addEventListener('click', function () {
                var isOpen = wrap.classList.toggle('is-open');
                strip.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            });

            document.getElementById('re-lead-form').addEventListener('submit', function (e) {
                e.preventDefault();
                var form      = this;
                var btn       = document.getElementById('re-lead-submit');
                var successEl = document.getElementById('re-lead-success');
                var errorEl   = document.getElementById('re-lead-error');

                btn.disabled = true;
                btn.querySelector('.btn-text').style.display = 'none';
                btn.querySelector('.btn-loading').style.display = '';
                successEl.style.display = 'none';
                errorEl.style.display   = 'none';

                var data = new FormData(form);

                fetch('{{ route('real-estate-lead') }}', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': data.get('_token'), 'Accept': 'application/json' },
                    body: data,
                })
                .then(function (res) { return res.json(); })
                .then(function (json) {
                    btn.disabled = false;
                    btn.querySelector('.btn-text').style.display = '';
                    btn.querySelector('.btn-loading').style.display = 'none';
                    if (json.success) {
                        successEl.textContent = json.message;
                        successEl.style.display = 'block';
                        form.reset();
                        setTimeout(function () {
                            wrap.classList.remove('is-open');
                            strip.setAttribute('aria-expanded', 'false');
                            successEl.style.display = 'none';
                        }, 3000);
                    } else {
                        errorEl.textContent = json.message;
                        errorEl.style.display = 'block';
                    }
                })
                .catch(function () {
                    btn.disabled = false;
                    btn.querySelector('.btn-text').style.display = '';
                    btn.querySelector('.btn-loading').style.display = 'none';
                    errorEl.textContent = 'Something went wrong. Please try again.';
                    errorEl.style.display = 'block';
                });
            });
        }());
        </script>
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
                {{-- Card 1: text left, image right --}}
                <div class="beyond-service-card film-reveal">
                    <div class="beyond-service-body">
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
                    <div class="beyond-panel-img beyond-panel-img--icon">
                        <img src="{{ asset('assets/img/real-estate-video-ads/web_design.png') }}" alt="Landing Page Design" loading="lazy">
                    </div>
                </div>
                {{-- Card 2: image left, text right --}}
                <div class="beyond-service-card beyond-service-card--reverse film-reveal">
                    <div class="beyond-service-body">
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
                    <div class="beyond-panel-img beyond-panel-img--icon">
                        <img src="{{ asset('assets/img/real-estate-video-ads/ads.png') }}" alt="Meta & Google Ads" loading="lazy">
                    </div>
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
                <p class="film-section-subtitle">Addressing the logistics upfront so there are no surprises later here's exactly how travel works.</p>
            </div>

            <div class="logistics-note-card film-reveal">
                <p class="logistics-note-statement">
                    We shoot anywhere in India travel and accommodation
                    expenses for our team are covered by the client.
                </p>
                <div class="logistics-checklist">
                    <div class="logistics-checklist-item">
                        <span class="logistics-checklist-icon ok">+</span>
                        <span><strong>Delhi NCR and beyond</strong> our production team covers Delhi, Gurgaon, Noida, the rest of the NCR region, and anywhere else in India.</span>
                    </div>
                    <div class="logistics-checklist-item">
                        <span class="logistics-checklist-icon note">−</span>
                        <span><strong>Travel and accommodation expenses</strong> for our team and equipment, within NCR or outside, are covered by the client.</span>
                    </div>
                    <div class="logistics-checklist-item">
                        <span class="logistics-checklist-icon note">−</span>
                        <span><strong>Travel arrangements for our team and equipment</strong> to and from the shoot location are arranged by the client.</span>
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

    // ===== CLICK-TO-PLAY (Long-form cards only) =====
    var longformCards = document.querySelectorAll('.longform-video-card[data-video-id]');
    longformCards.forEach(function(card) {
        card.addEventListener('click', function() {
            var vid = this.getAttribute('data-video-id');
            if (vid) openLightbox(vid);
        });
    });

    // ===== HOVER-TO-PLAY (Reel/short-form cards) =====
    var reelCards = document.querySelectorAll('.reel-cinema-item[data-video-id]');
    reelCards.forEach(function(card) {
        var vid = card.getAttribute('data-video-id');
        var thumb = card.querySelector('.reel-cinema-thumb');
        var iframe = null;

        function startPreview() {
            if (iframe || !vid) return;
            iframe = document.createElement('iframe');
            iframe.className = 'reel-preview-iframe';
            iframe.src = 'https://www.youtube.com/embed/' + vid +
                '?autoplay=1&controls=0&loop=1&playlist=' + vid +
                '&rel=0&modestbranding=1&playsinline=1';
            iframe.setAttribute('allow', 'autoplay; encrypted-media');
            thumb.appendChild(iframe);
            card.classList.add('is-previewing');
        }

        function stopPreview() {
            if (!iframe) return;
            iframe.remove();
            iframe = null;
            card.classList.remove('is-previewing');
        }

        card.addEventListener('mouseenter', startPreview);
        card.addEventListener('mouseleave', stopPreview);
        card.addEventListener('click', function() {
            if (iframe) {
                stopPreview();
            } else {
                startPreview();
            }
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
