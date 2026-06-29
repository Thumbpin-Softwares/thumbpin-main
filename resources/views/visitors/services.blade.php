@extends('layout.visitor', [
    'title' => 'Creative Agency Services in Gurgaon & Gurugram | Thumbpin',
    'description' => 'Explore Thumbpin’s branding, advertising, digital marketing, web design, website development, video production, social media marketing, event marketing, and real estate marketing services in Gurgaon and Gurugram.',
    'keywords' => 'Thumbpin services, branding agency Gurgaon, branding agency Gurugram, advertising agency Gurgaon, advertising agency Gurugram, digital marketing agency Gurgaon, digital marketing agency Gurugram, creative agency Gurgaon, creative agency Gurugram, social media marketing Gurgaon, social media marketing Gurugram, web design agency Gurgaon, web design agency Gurugram, website development Gurgaon, website development Gurugram, video production agency Gurgaon, video production agency Gurugram, event marketing agency Gurgaon, event marketing agency Gurugram, real estate marketing agency Gurgaon, real estate advertising agency Gurgaon'
])

@section('head')

@endsection

@section('content')

<main>

    {{-- ====================== Service-Hero-Sec Area (Three.js Revamp) ====================== --}}
    <div class="service-hero-sec top-sec bg-black" style="position: relative; overflow: hidden; padding: 150px 0 100px;">
        <div class="container h-100-only">
            <div class="row align-items-center h-100-only">
                <div class="col-lg-6">
                    <div class="content-box">
                        <div class="title" style="font-size: 80px; line-height: 0.9; font-weight: 800; color: #fff; letter-spacing: -2px; margin-bottom: 30px;">
                            WE ARE <br>
                            <span class="text-red">BEST AT</span>
                        </div>
                        <div class="des" style="border-left: 4px solid var(--tp-red);">
                            <p style="font-size: 20px; color: #ccc; line-height: 1.6; max-width: 90%;">
                                Creating unique business identities under our roof with integrated marketing solutions. We weave stories that make noise, amplify reach, and create wins.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div style="position: relative; height: 800px; display: flex; align-items: flex-end; justify-content: center; margin-left:20px;">
                        <!-- Three.js Canvas Container (Floating above) -->
                        <div id="cube-canvas-container" style="width: 80%; height: 80%; position: absolute; top: 110px; left: 0; z-index: 10;"></div>
                        
                        <!-- Hand Image -->
                        <div class="hand-img-container" style="position: relative; z-index: 1; width: 100%; text-align: center;">
                            <img src="{{ config('app.url') }}/assets/img/hand.png" alt="hand" style="max-width: 95%; display: block; margin: 0 auto; margin-bottom:-30px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Service-Hero-Sec Area ====================== --}}

    {{-- ====================== Sec-9 Area (Card-Based Grid) ====================== --}}
    <div class="sec-9" id="sec-9" style="padding: 100px 0; background: #fff;">
        <div class="container">
            <div class="services-grid">
                <!-- Item 1 - Branding -->
                <div class="service-card">
                    <div class="card-accent"></div>
                    <span class="card-number">01</span>
                    <h3 class="card-title">Branding</h3>
                    <p class="card-desc">Undertaking brand and market research to fathom brand goals and positioning, along with building on the existing voice and visual language.</p>
                    <div class="card-arrow">→</div>
                </div>

                <!-- Item 2 - Strategy -->
                <div class="service-card">
                    <div class="card-accent"></div>
                    <span class="card-number">02</span>
                    <h3 class="card-title">Strategy</h3>
                    <p class="card-desc">Deploying a research-based strategy with room for innovative developments, across all forms of traditional & non-traditional media.</p>
                    <div class="card-arrow">→</div>
                </div>

                <!-- Item 3 - Digital Marketing (Clickable) -->
                <a href="{{ route('digital-marketing') }}" class="service-card service-card-link">
                    <div class="card-accent"></div>
                    <span class="card-number">03</span>
                    <h3 class="card-title">Digital Marketing</h3>
                    <p class="card-desc">We integrate marketing strategies & solutions to create distinctive conversations and reach a diverse audience through a unique online presence.</p>
                    <div class="card-arrow">→</div>
                </a>

                <!-- Item 4 - Real Estate Ads (Clickable) -->
                <a href="{{ route('real-estate-ads') }}" class="service-card service-card-link">
                    <div class="card-accent"></div>
                    <span class="card-number">04</span>
                    <h3 class="card-title">Real Estate Ads</h3>
                    <p class="card-desc">Cinematic property walkthroughs, drone aerials and promo films that help builders and brokers showcase their projects and sell faster.</p>
                    <div class="card-arrow">→</div>
                </a>

                <!-- Item 5 - Web Designing -->
                <div class="service-card">
                    <div class="card-accent"></div>
                    <span class="card-number">05</span>
                    <h3 class="card-title">Web Designing</h3>
                    <p class="card-desc">Working with innovative UI/UX designs and infographics to establish a platform to connect with people.</p>
                    <div class="card-arrow">→</div>
                </div>

                <!-- Item 6 - Events & Live -->
                <div class="service-card">
                    <div class="card-accent"></div>
                    <span class="card-number">06</span>
                    <h3 class="card-title">Events & Live</h3>
                    <p class="card-desc">We take your brand out on a walk amidst society & concerts.</p>
                    <div class="card-arrow">→</div>
                </div>

                <!-- Item 7 - Disruptive Ideas -->
                <div class="service-card">
                    <div class="card-accent"></div>
                    <span class="card-number">07</span>
                    <h3 class="card-title">Disruptive Ideas</h3>
                    <p class="card-desc">We plan unprecedented solutions and ideas that take your brand to the front line of unique marketing campaigns.</p>
                    <div class="card-arrow">→</div>
                </div>

                <!-- Item 8 - Friendship With Benefits -->
                <div class="service-card">
                    <div class="card-accent"></div>
                    <span class="card-number">08</span>
                    <h3 class="card-title">Friendship With Benefits</h3>
                    <p class="card-desc">Got a specific project for us? We're here to provide our expertise.</p>
                    <div class="card-arrow">→</div>
                </div>
            </div>
        </div>

        <style>
            /* Services Grid Layout */
            .services-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
                margin-top: 60px;
            }

            /* Service Card Base Styles */
            .service-card {
                position: relative;
                background: #fff;
                border: 1px solid #e5e5e5;
                border-radius: 8px;
                padding: 40px 35px;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                cursor: pointer;
                overflow: hidden;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
                display: block;
                text-decoration: none;
            }

            /* Red Accent Line */
            .card-accent {
                position: absolute;
                left: 0;
                top: 0;
                width: 4px;
                height: 0;
                background: var(--tp-red);
                transition: height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }

            /* Card Number Badge */
            .card-number {
                display: inline-block;
                font-size: 14px;
                font-weight: 700;
                color: var(--tp-red);
                font-family: 'Courier New', monospace;
                margin-bottom: 20px;
                padding: 6px 12px;
                border: 1px solid var(--tp-red);
                border-radius: 4px;
                transition: all 0.3s ease;
            }

            /* Card Title */
            .card-title {
                font-size: 28px;
                font-weight: 800;
                color: #000;
                margin: 0 0 15px 0;
                text-transform: uppercase;
                letter-spacing: -0.5px;
                transition: color 0.3s ease;
            }

            /* Card Description */
            .card-desc {
                font-size: 16px;
                color: #666;
                line-height: 1.7;
                margin: 0 0 20px 0;
                transition: color 0.3s ease;
            }

            /* Card Arrow */
            .card-arrow {
                font-size: 24px;
                color: #ccc;
                transition: all 0.3s ease;
                opacity: 0;
                transform: translateX(-10px);
            }

            /* Hover Effects */
            .service-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
                border-color: var(--tp-red);
            }

            .service-card:hover .card-accent {
                height: 100%;
            }

            .service-card:hover .card-number {
                background: var(--tp-red);
                color: #fff;
            }

            .service-card:hover .card-title {
                color: var(--tp-red);
            }

            .service-card:hover .card-desc {
                color: #333;
            }

            .service-card:hover .card-arrow {
                opacity: 1;
                transform: translateX(0);
                color: var(--tp-red);
            }

            /* Link-specific styles */
            .service-card-link {
                color: inherit;
            }

            .service-card-link:hover {
                text-decoration: none;
            }

            /* Responsive Design */
            @media (max-width: 991px) {
                .services-grid {
                    grid-template-columns: 1fr;
                    gap: 25px;
                }

                .service-card {
                    padding: 35px 30px;
                }

                .card-title {
                    font-size: 24px;
                }

                .card-desc {
                    font-size: 15px;
                }
            }

            @media (max-width: 576px) {
                .services-grid {
                    gap: 20px;
                }

                .service-card {
                    padding: 30px 25px;
                }

                .card-title {
                    font-size: 22px;
                }

                .card-number {
                    font-size: 12px;
                    padding: 5px 10px;
                }
            }
        </style>
    </div>
    {{-- ====================== End Sec-9 Area ====================== --}}

    {{-- ====================== Sec-3 Area (Refined) ====================== --}}
    <div class="sec-3 bg-black" style="padding: 120px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="sec-img-1" style="position: relative;">
                        <div class="img" style="border-radius: 0; overflow: hidden; transition: 0.5s;">
                            <img src="{{ config('app.url') }}/assets/img/service-01.png" alt="img" style="width: 100%; display: block;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="content-box">
                        <div class="sec-title" style="margin-bottom: 40px;">
                            <p style="font-size: 18px; letter-spacing: 4px; color: var(--tp-red); text-transform: uppercase; margin-bottom: 10px; font-weight: 700;">Brand</p>
                            <b style="font-size: 60px; line-height: 1; color: #fff; font-weight: 800; display: block;">
                                Your St<span style="color: var(--tp-red);">o</span>ry
                            </b>
                        </div>
                        <div class="des" style="color: #ccc; font-size: 18px; line-height: 1.7; margin-bottom: 40px;">
                            <p style="margin-bottom: 20px;">
                                We are creatively strategic and strategically creative. We follow a research-based strategy to create memorable brand identities.
                            </p>
                            <p>
                                Advertising is the aftertaste of a good story. So, Thumbpin weaves a unique tale for your brand punched together with design and production.
                            </p>
                        </div>
                        <div class="link">
                            <!-- Changed button to Red Background -->
                            <a href="{{ route('contact') }}" class="btn" style="background: var(--tp-red); color: #fff; padding: 15px 40px; border-radius: 50px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; transition: 0.3s; text-decoration: none; display: inline-block;">
                                Get In Touch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Sec-3 Area ====================== --}}

</main>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Scene Setup
        const container = document.getElementById('cube-canvas-container');
        if (!container) return;

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        
        renderer.setSize(container.clientWidth, container.clientHeight);
        container.appendChild(renderer.domElement);

        // Lighting (Required for Solid Material)
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.6); // Soft white light
        scene.add(ambientLight);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
        directionalLight.position.set(5, 5, 5);
        scene.add(directionalLight);

        // Solid Red Cube
        const geometry = new THREE.BoxGeometry(2.2, 2.2, 2.2);
        // Using MeshStandardMaterial for better lighting reaction
        const material = new THREE.MeshStandardMaterial({ 
            color: 0xff0000, // Red
            roughness: 0.4,
            metalness: 0.1
        });
        const cube = new THREE.Mesh(geometry, material);
        cube.position.y = 0.5; // Move up slightly to float above hand
        scene.add(cube);

        // Camera Position
        camera.position.z = 5;

        // Animation Loop
        function animate() {
            requestAnimationFrame(animate);

            // Rotate Cube
            cube.rotation.x += 0.005;
            cube.rotation.y += 0.005;

            renderer.render(scene, camera);
        }
        animate();

        // Handle Resize
        window.addEventListener('resize', function() {
            if (container) {
                const width = container.clientWidth;
                const height = container.clientHeight;
                renderer.setSize(width, height);
                camera.aspect = width / height;
                camera.updateProjectionMatrix();
            }
        });
    });
</script>
@endsection
