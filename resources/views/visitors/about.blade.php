@extends('layout.visitor', [
    'title' => 'Leading Creative Agency in Gurgaon | About Thumbpin',
    'description' => 'We are a team of creative thinkers, designers, and strategists in Gurgaon helping brands grow through impactful design and intelligent strategy.',
    'footer_black' => 'footer-black'
])

@section('head')
<style>
    /* --- Theme Variables --- */
    :root {
        --tp-red: #ce2d33;
        --tp-black: #000;
        --tp-white: #fff;
        --tp-light: #f8f8f8;
        --tp-gray: #333;
    }

    /* --- Typography & Base --- */
    h1, h2, h3, h4, h5, h6 {
        font-weight: 800;
        text-transform: uppercase;
        margin: 0;
        color: #000;
    }
    .text-red { color: var(--tp-red); }
    .bg-black { background-color: var(--tp-black) !important; color: #fff; }
    p { font-size: 16px; line-height: 1.7; color: #555; }

    /* --- 1. HERO SECTION (Redesigned - Light & Bold) --- */
    .about-hero-sec {
        padding: 180px 0 100px; /* More top padding for breathing room */
        background-color: #fff;
        color: #000;
        position: relative;
        overflow: hidden;
    }
    .hero-label {
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 3px;
        color: var(--tp-red);
        margin-bottom: 20px;
        display: block;
        text-transform: uppercase;
    }
    .about-hero-title {
        font-size: 72px;
        line-height: 0.95;
        margin-bottom: 40px;
        color: #000;
        position: relative;
        z-index: 2;
    }
    .about-hero-desc {
        font-size: 20px;
        line-height: 1.6;
        color: #444;
        max-width: 90%;
        border-left: 4px solid var(--tp-red);
        padding-left: 25px;
    }
    /* Stylish Image Container */
    .hero-img-container {
        position: relative;
        z-index: 1;
    }
    .hero-img-container::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 20px;
        width: 100%;
        height: 100%;
        background-color: var(--tp-red);
        z-index: -1;
        transition: 0.4s;
    }
    .hero-img-container:hover::before {
        top: 10px;
        left: 10px;
    }
    .hero-img-container img {
        width: 100%;
        height: auto;
        display: block;
        filter: grayscale(100%);
        transition: 0.4s;
    }
    .hero-img-container:hover img {
        filter: grayscale(0%);
    }


    /* --- 2. MISSION & VISION (Clean White Layout) --- */
    .sec-mv-light {
        padding: 100px 0;
        background: #fff;
        position: relative;
    }
    .mv-card {
        padding: 0 20px;
        border-left: 1px solid #ddd;
    }
    .mv-heading {
        font-size: 42px;
        margin-bottom: 25px;
        color: #000;
    }
    .mv-text {
        font-size: 17px;
        color: #666;
    }
    

    /* --- 3. CORE VALUES (Light Cards on Grey) --- */
    .sec-values-light {
        padding: 120px 0;
        background: var(--tp-light); /* Light Grey Background */
    }
    .val-card-light {
        background: #fff;
        padding: 40px;
        height: 100%;
        transition: all 0.4s ease;
        position: relative;
        border: 1px solid transparent;
        box-shadow: 0 5px 20px rgba(0,0,0,0.03);
    }
    .val-card-light:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        border-bottom: 4px solid var(--tp-red);
    }
    .val-num {
        font-size: 50px;
        font-weight: 900;
        color: #eee; /* Subtle background number */
        position: absolute;
        top: 20px;
        right: 30px;
        line-height: 1;
        transition: 0.4s;
    }
    .val-card-light:hover .val-num {
        color: var(--tp-red);
        opacity: 0.2;
    }
    .val-title {
        font-size: 24px;
        margin-bottom: 20px;
        position: relative;
        z-index: 2;
        color: #000;
    }
    .val-desc {
        color: #666;
        font-size: 16px;
        position: relative;
        z-index: 2;
    }


    /* --- 4. STRATEGY (Minimalist White) --- */
     /* --- 4. STRATEGY (Redesigned - Typographic Grid) --- */
    .sec-strategy {
        padding: 120px 0;
        background: #fff;
        border-bottom: 1px solid #f0f0f0;
    }
    .strat-head {
        font-size: 60px;
        line-height: 1;
        margin-bottom: 30px;
        color: #000;
        letter-spacing: -2px;
    }
    .strat-desc-main {
        font-size: 18px;
        color: #666;
        margin-bottom: 50px;
        max-width: 90%;
    }
    
    /* Grid Layout */
    .strat-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
    }
    .strat-card {
        padding: 40px 0;
        border-top: 1px solid #ddd;
        transition: 0.4s;
        position: relative;
    }
    .strat-card:hover {
        border-top-color: var(--tp-red);
        transform: translateY(-5px);
    }
    
    .strat-num {
        font-size: 14px;
        font-weight: 700;
        color: var(--tp-red);
        margin-bottom: 20px;
        display: block;
        letter-spacing: 2px;
    }
    .strat-title {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 15px;
        color: #000;
    }
    .strat-text {
        font-size: 16px;
        color: #666;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .strat-grid { grid-template-columns: 1fr; gap: 30px; }
        .strat-head { font-size: 48px; }
    }


    /* --- 5. TEAM (Light Section) --- */
    .sec-team-light {
        padding: 100px 0;
        background: #fff; 
    }
    .team-section-title {
        font-size: 50px;
        text-align: center;
        margin-bottom: 70px;
        color: #000;
    }
    .team-card-light {
        background: #fff;
        margin-bottom: 30px;
        transition: 0.3s;
        border: 1px solid #f0f0f0;
    }
    .team-card-light:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.05);
        border-color: #ddd;
    }
    .team-img-box {
        height: 380px;
        width: 100%;
        overflow: hidden;
        position: relative;
    }
    .team-img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.5s;
        filter: grayscale(100%);
    }
    .team-card-light:hover .team-img-box img {
        filter: grayscale(0%);
    }
    .team-info {
        padding: 25px;
        text-align: left;
    }
    .team-name {
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 5px;
        color: #000;
        text-transform: uppercase;
    }
    .team-role {
        font-size: 13px;
        font-weight: 700;
        color: var(--tp-red);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 15px;
        display: block;
    }
    .team-bio {
        font-size: 14px;
        color: #777;
        line-height: 1.5;
        margin-bottom: 15px;
        min-height: 42px; 
    }
    .team-social a {
        color: #aaa;
        font-size: 16px;
        margin-right: 15px;
        transition: 0.3s;
    }
    .team-social a:hover {
        color: #000;
    }

    /* Mobile adjustments */
    @media (max-width: 768px) {
        .about-hero-title { font-size: 48px; }
        .hero-img-container { margin-top: 40px; }
        .mv-card { border-left: none; border-top: 1px solid #ddd; padding: 20px 0 0 0; margin-top: 30px; }
    }
</style>
@endsection

@section('content')

<main>

    {{-- ====================== 1. HERO SECTION (Redesigned Light) ====================== --}}
    <div class="about-hero-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="hero-label">Who We Are</span>
                    <h1 class="about-hero-title">
                        Ideas That <br>
                        <span class="text-red">Inspire Action.</span>
                    </h1>
                    <div class="about-hero-desc">
                        <p>
                            We are a team of creative thinkers, designers, planners, strategists, and tech experts who share one objective: to help brands like yours grow with ideas that matter. We define how brands connect with people through thoughtful storytelling, impactful design, and intelligent strategy.
                        </p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-img-container">
                        <img src="{{ config('app.url') }}/assets/img/about-sec.png" alt="About Thumbpin Agency">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ====================== 2. MISSION & VISION (Clean Light) ====================== --}}
    <div class="sec-mv-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="mv-card" style="border: none;">
                        <h2 class="mv-heading">Our <span class="text-red">Mission</span></h2>
                        <p class="mv-text">
                            To empower brands with meaningful creativity that moves people and makes a measurable difference. We combine strategic insight with unique design to help you express your story with confidence. We deliver branding solutions that are powerful, purpose-led, and visually compelling.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mv-card">
                        <h2 class="mv-heading">Our <span class="text-red">Vision</span></h2>
                        <p class="mv-text">
                            To become the most trusted and performance-driven creative partner for brands. We strive to lead the future of brand communication through creativity, technology, and human understanding. Our goal is to set new creative standards while helping businesses succeed.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ====================== 3. CORE VALUES (Light Cards) ====================== --}}
    <div class="sec-values-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 style="font-size: 48px; color: #000;">Core <span class="text-red">Values</span></h2>
                </div>
            </div>
            <div class="row g-4">
                <!-- Large Item -->
                <div class="col-lg-6">
                    <div class="val-card-light">
                        <span class="val-num">01</span>
                        <h3 class="val-title">Customer Focus</h3>
                        <p class="val-desc">We begin every project by listening. Understanding your target audience ensures our designs and strategies address real requirements, not assumptions.</p>
                    </div>
                </div>
                <!-- Standard Items -->
                <div class="col-lg-3 col-md-6">
                    <div class="val-card-light">
                        <span class="val-num">02</span>
                        <h3 class="val-title">Quality</h3>
                        <p class="val-desc">Meticulous review processes to ensure every pixel is perfect.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="val-card-light">
                        <span class="val-num">03</span>
                        <h3 class="val-title">Innovation</h3>
                        <p class="val-desc">Pushing boundaries to create advertising that feels future-ready.</p>
                    </div>
                </div>
                <!-- Standard Items -->
                <div class="col-lg-3 col-md-6">
                    <div class="val-card-light">
                        <span class="val-num">04</span>
                        <h3 class="val-title">Integrity</h3>
                        <p class="val-desc">Complete transparency in budgeting, timelines, and expectations.</p>
                    </div>
                </div>
                <!-- Large Item -->
                <div class="col-lg-9">
                    <div class="val-card-light">
                        <span class="val-num">05</span>
                        <h3 class="val-title">Passion for Branding</h3>
                        <p class="val-desc">Our passion drives us to create identities that feel alive. We approach every logo and campaign with curiosity, creativity, and strategic thinking to create memorable brands.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ====================== 4. STRATEGY (Light) ====================== --}}
    {{-- ====================== 4. STRATEGY (Redesigned) ====================== --}}
    <div class="sec-strategy">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div style="position: sticky; top: 100px;">
                        <h2 class="strat-head">Why <br><span class="text-red">Us?</span></h2>
                        <p class="strat-desc-main">We don't just design; we define. Our commitment is to deliver work that reflects honesty, reliability, and excellence.</p>
                        <a href="{{ route('contact') }}" class="btn" style="background: #000; color: #fff; padding: 15px 30px; border-radius: 50px; text-decoration: none; font-weight: 700; margin-top: 20px; display: inline-block;">Start a Project</a>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <div class="strat-grid">
                        <!-- Item 1 -->
                        <div class="strat-card">
                            <span class="strat-num">01</span>
                            <h4 class="strat-title">Strategic Branding</h4>
                            <p class="strat-text">We dig deep. Research-based positioning to align your brand values with audience expectations, ensuring every move is calculated.</p>
                        </div>
                        <!-- Item 2 -->
                        <div class="strat-card">
                            <span class="strat-num">02</span>
                            <h4 class="strat-title">Creative Excellence</h4>
                            <p class="strat-text">Beauty with a purpose. We create ideas that look stunning and serve a strategic function through meticulous design craftsmanship.</p>
                        </div>
                        <!-- Item 3 -->
                        <div class="strat-card">
                            <span class="strat-num">03</span>
                            <h4 class="strat-title">Client-Centric</h4>
                            <p class="strat-text">Your goals are our north star. We collaborate closely, keeping you at the center of the process to optimize ROI and impact.</p>
                        </div>
                        <!-- Item 4 -->
                        <div class="strat-card">
                            <span class="strat-num">04</span>
                            <h4 class="strat-title">End-to-End Solutions</h4>
                            <p class="strat-text">From the first spark of an idea to the final digital execution. We handle brand research, design, development, and performance optimization.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ====================== 5. TEAM SECTION (Light) ====================== --}}
    <div class="sec-team-light">
        <div class="container">
            <h2 class="team-section-title">Meet The <span class="text-red">Team</span></h2>
            
            <div class="row">
                <!-- Team Member 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="team-card-light">
                        <div class="team-img-box">
                            <img src="{{ config('app.url') }}/assets/img/team/DURGESH%20SINGH.jpg" alt="Durgesh Singh">
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">Durgesh Singh</h4>
                            <span class="team-role">Creative Director</span>
                            <p class="team-bio">Story-teller by the day, creator by the night.</p>
                            <div class="team-social">
                                <a href="https://www.linkedin.com/in/durgesh-singh-820b50ab" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Team Member 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="team-card-light">
                        <div class="team-img-box">
                            <img src="{{ config('app.url') }}/assets/img/team/01%20BRAJESH%20PATHAK.jpg" alt="Brajesh Pathak">
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">Brajesh Pathak</h4>
                            <span class="team-role">Founder & Business Head</span>
                            <p class="team-bio">Marketing enthusiast, translating businesses into stories.</p>
                            <div class="team-social">
                                <a href="https://www.linkedin.com/in/brajesh-pathak-415826120" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Team Member 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="team-card-light">
                        <div class="team-img-box">
                            <img src="{{ config('app.url') }}/assets/img/team/02%20RASHID%20ALI.jpg" alt="Rashid Ali">
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">Rashid Ali</h4>
                            <span class="team-role">Co-Founder & Creative Head</span>
                            <p class="team-bio">Believes in a dream world that’s an idea away from conception.</p>
                            <div class="team-social">
                                <a href="https://www.linkedin.com/in/rashid-siddiqui-b4930998" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Team Member 4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="team-card-light">
                        <div class="team-img-box">
                            <img src="{{ config('app.url') }}/assets/img/team/KOMAL%20BHADURIA.jpg" alt="Komal Bhaduria">
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">Komal Bhaduria</h4>
                            <span class="team-role">Digital Specialist</span>
                            <p class="team-bio">Digital marketing maven, and digital connoisseur.</p>
                        </div>
                    </div>
                </div>
                <!-- Team Member 5 -->
                <div class="col-lg-4 col-md-6">
                    <div class="team-card-light">
                        <div class="team-img-box">
                            <img src="{{ config('app.url') }}/assets/img/team/NABEEL%20UR%20REHMAN.jpg" alt="Nabeel">
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">Nabeel Ur Rehman</h4>
                            <span class="team-role">Junior Art Director</span>
                            <p class="team-bio">Artist, beyond the image that comes to mind.</p>
                        </div>
                    </div>
                </div>
                <!-- Team Member 6 -->
                <div class="col-lg-4 col-md-6">
                    <div class="team-card-light">
                        <div class="team-img-box">
                            <img src="{{ config('app.url') }}/assets/img/team/SIDDHARTH%20SHARMA.jpg" alt="Siddharth">
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">Siddharth Sharma</h4>
                            <span class="team-role">Social Media Manager</span>
                            <p class="team-bio">Social Media is an ocean. The deeper you dive, the more you find.</p>
                        </div>
                    </div>
                </div>
                 <!-- Team Member 7 -->
                 <div class="col-lg-4 col-md-6">
                    <div class="team-card-light">
                        <div class="team-img-box">
                            <img src="{{ config('app.url') }}/assets/img/team/LAVISH%20SHIRIDHAR.jpg" alt="Lavish">
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">Lavish Shiridhar</h4>
                            <span class="team-role">Associate Business Head</span>
                            <p class="team-bio">He is a great believer of luck, and he finds that the harder he works the more he has of it.</p>
                        </div>
                    </div>
                </div>
                <!-- Team Member 8 -->
                 <div class="col-lg-4 col-md-6">
                    <div class="team-card-light">
                        <div class="team-img-box">
                            <img src="{{ config('app.url') }}/assets/img/team/SHAYREE.jpg" alt="Shayree">
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">Shayree</h4>
                            <span class="team-role">Copywriter</span>
                            <p class="team-bio">At the end, stories are all that remain.</p>
                        </div>
                    </div>
                </div>
                <!-- Team Member 9 -->
                 <div class="col-lg-4 col-md-6">
                    <div class="team-card-light">
                        <div class="team-img-box">
                            <img src="{{ config('app.url') }}/assets/img/team/RITU%20DANU.jpg" alt="Ritu">
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">Ritu Danu</h4>
                            <span class="team-role">HR Manager</span>
                            <p class="team-bio">Connecting people to places they belong.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</main>

@endsection

@section('script')
<!-- No specific scripts needed for this page unless InstaFeed is required, kept clean as requested -->
@endsection