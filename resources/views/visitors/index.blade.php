@extends('layout.visitor', [
    'title' => 'Best Branding & Advertising Agency In Gurgaon - Gurugram',
    'description' => 'Thumbpin is a 360 creative and digital advertising agency in Gurgaon that will help your business flourish with its effective strategy and ideas.'
    ])

@section('head')
<style>
    header.header_anime .main-header .nav,
    header.header_anime .main-header .side_menu_btn{
        margin-left: auto;
    }

    header.header_anime .main-header .logo{
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 99;
        width: 100vw;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    header.header_anime .main-header .logo a{
        flex: none;
        display: block;
        width: 100%;
    }
    header.header_anime .main-header .logo img{
        width: 100%;
        position: absolute;
        animation: header_anime_img .5s ease 4.5s 1;
        animation-fill-mode: both;
    }
    .hero-sec .content-box .content .menus ul{
        transform: translateY(35px);
    }

    @media screen and (min-width: 1200px){
        .hero-sec .content-box .content .menus ul li a{
            font-size: 48px;
        }
        .hero-sec .content-box .content .menus ul{
            transform: translateY(40px);
        }
        @keyframes header_anime_img{
            0%{
                top: 50%;
                left: 50%;
                transform: translate(-50%, calc(-50% - 40px));
                max-width: 680px;
            }
            100%{
                top: 42px;
                left: 52px;
                transform: translate(0, 0);
                max-width: 180px;
            }
        }
    }

    @media screen and (min-width: 992px){
        @keyframes header_anime_img{
            0%{
                top: 50%;
                left: 50%;
                transform: translate(-50%, calc(-50% - 35px));
                max-width: 680px;
            }
            100%{
                top: 42px;
                left: 52px;
                transform: translate(0, 0);
                max-width: 180px;
            }
        }
    }

    @media screen and (max-width: 991px){
        @keyframes header_anime_img{
            0%{
                top: 50%;
                left: 50%;
                transform: translate(-50%, calc(-50% - 35px));
                max-width: 580px;
            }
            100%{
                top: 42px;
                left: 52px;
                transform: translate(0, 0);
                max-width: 180px;
            }
        }
    }

    @media screen and (max-width: 575px){
        .hero-sec .content-box .content .menus ul{
            transform: translateY(15px);
        }

        @keyframes header_anime_img{
            0%{
                top: 50%;
                left: 50%;
                transform: translate(-50%, calc(-50% - 15px));
                max-width: 260px;
            }
            100%{
                top: 28px;
                left: 12px;
                transform: translate(0, 0);
                max-width: 180px;
            }
        }
    }


</style>
@endsection

@section('content')

<main>

    <div id="loader">
        <img src="{{ config('app.url') }}/assets/img/loader.gif" alt="loader">
    </div>


    {{-- ====================== Hero-Sec Area ====================== --}}
    <div class="hero-sec top-sec bg-black">
        <div class="container h-100-only">
            <div class="content-box">
                <div class="content">
                    <div class="hero-img">
                        {{-- <img src="{{ config('app.url') }}/assets/img/home/hero-sec.png" alt="thumbpin"> --}}
                    </div>
                    <div class="menus">
                        <ul>
                            <li>
                                <a href="#">
                                    Strategy
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Design
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Stories
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Hero-Sec Area ====================== --}}

    {{-- ====================== Sec-1 Area ====================== --}}
    <div class="sec-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xl-4">
                    <div class="sec-img-1">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/home/home-01.png" alt="img">
                        </div>
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/home/home-02.png" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-8">
                    <div class="sec-img-2">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/home/home-02.png" alt="img">
                        </div>
                    </div>
                    <div class="content-box">
                        <div class="des">
                            <p>
                                We bring to you integrated marketing solutions under one roof that all begin with a story. Stories have the power to reach all people, at all corners. Our experienced team of designers, writers, media planners, and creators work collaboratively to hook your story in peoples’ minds precisely with a Thumbpin.
                            </p>
                        </div>
                        <div class="highlight-text">
                            WHAT SETS US APART IS THAT
                            <br>
                            WE’RE NOT JUST ALL ABOUT BUSINESS,
                            <br>
                            <span>WE’RE ABOUT STORIES OF PEOPLE.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Sec-1 Area ====================== --}}

    {{-- ====================== Sec-2 Area ====================== --}}
    <div class="sec-2 bg-black">
        <div class="container">
            <div class="sec-title">
                <div class="title">
                    <b>Friends</b>
                    <p>
                        On B
                            <img src="{{ config('app.url') }}/assets/img/shape-01.png" alt="img">
                        ard
                    </p>
                </div>
                <div class="img">
                    <img src="{{ config('app.url') }}/assets/img/home/home-03.png" alt="img">
                </div>
            </div>
            <div class="brand-images">
                <div class="row">
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/logo-01.png" alt="img">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/logo-02.png" alt="img">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/logo-03.png" alt="img">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/logo-04.png" alt="img">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/logo-05.png" alt="img">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/logo-06.png" alt="img">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/logo-07.png" alt="img">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/logo-08.png" alt="img">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/logo-09.png" alt="img">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/logo-10.png" alt="img">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/logo-11.png" alt="img">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/logo-12.png" alt="img">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/logo-13.png" alt="img">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/logo-14.png" alt="img">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/logo-15.png" alt="img">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/logo-16.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Sec-2 Area ====================== --}}

    {{-- ====================== Our-Work-Sec Area ====================== --}}
    <div class="our-work-sec">
        <div class="container">
            <div class="sec-heading">
                <h2>OUR WORK</h2>
            </div>
            <div class="filter-menus">
                <button type="button" data-filter=".branding" class="active">branding</button>
                <button type="button" data-filter=".print">Print</button>
                <button type="button" data-filter=".digital">Digital</button>
                <button type="button" data-filter=".website">Website</button>
            </div>
            <div class="row filter-content">
                <div class="col-6 col-md-4 branding">
                    <a href="#" class="filter-img">
                        <img src="{{ config('app.url') }}/assets/img/home-work/branding/01.jpg" alt="image">
                    </a>
                </div>
                <div class="col-6 col-md-4 branding">
                    <a href="#" class="filter-img">
                        <img src="{{ config('app.url') }}/assets/img/home-work/branding/02.jpg" alt="image">
                    </a>
                </div>
                <div class="col-6 col-md-4 branding">
                    <a href="#" class="filter-img">
                        <img src="{{ config('app.url') }}/assets/img/home-work/branding/03.jpg" alt="image">
                    </a>
                </div>
                <div class="col-6 col-md-4 print">
                    <a href="#" class="filter-img">
                        <img src="{{ config('app.url') }}/assets/img/home-work/print/01.jpg" alt="image">
                    </a>
                </div>
                <div class="col-6 col-md-4 print">
                    <a href="#" class="filter-img">
                        <img src="{{ config('app.url') }}/assets/img/home-work/print/02.jpg" alt="image">
                    </a>
                </div>
                <div class="col-6 col-md-4 print">
                    <a href="#" class="filter-img">
                        <img src="{{ config('app.url') }}/assets/img/home-work/print/03.jpg" alt="image">
                    </a>
                </div>
                <div class="col-6 col-md-4 digital">
                    <a href="#" class="filter-img">
                        <img src="{{ config('app.url') }}/assets/img/home-work/digital/01.jpg" alt="image">
                    </a>
                </div>
                <div class="col-6 col-md-4 digital">
                    <a href="#" class="filter-img">
                        <img src="{{ config('app.url') }}/assets/img/home-work/digital/02.jpg" alt="image">
                    </a>
                </div>
                <div class="col-6 col-md-4 digital">
                    <a href="#" class="filter-img">
                        <img src="{{ config('app.url') }}/assets/img/home-work/digital/03.jpg" alt="image">
                    </a>
                </div>
                <div class="col-6 col-md-4 website">
                    <a href="#" class="filter-img">
                        <img src="{{ config('app.url') }}/assets/img/home-work/website/01.jpg" alt="image">
                    </a>
                </div>
                <div class="col-6 col-md-4 website">
                    <a href="#" class="filter-img">
                        <img src="{{ config('app.url') }}/assets/img/home-work/website/02.jpg" alt="image">
                    </a>
                </div>
                <div class="col-6 col-md-4 website">
                    <a href="#" class="filter-img">
                        <img src="{{ config('app.url') }}/assets/img/home-work/website/03.jpg" alt="image">
                    </a>
                </div>
            </div>
            <div class="cta-btn">
                <a href="{{ route('work') }}">Explore More</a>
            </div>
        </div>
    </div>
    {{-- ====================== End Our-Work-Sec Area ====================== --}}

    {{-- ====================== Sec-3 Area ====================== --}}
    <div class="sec-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="sec-img-1">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/home/home-04.png" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="content-box">
                        <div class="sec-title">
                            <p>Brand</p>
                            <b>
                                Your St
                                <img src="{{ config('app.url') }}/assets/img/shape-03.png" alt="img">
                                ry
                            </b>
                        </div>
                        <div class="des">
                            <p>
                                We are creatively strategic and strategically creative. We follow a research-based strategy to create memorable brand identities.
                            </p>
                            <p>
                                Advertising is the aftertaste of a good story. So, Thumbpin weaves a unique tale for your brand punched together with design and production.
                            </p>
                        </div>
                        <div class="link">
                            <a href="{{ route('contact') }}" class="btn-1">
                                Get In Touch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Sec-3 Area ====================== --}}

    {{-- ====================== Sec-4 Area ====================== --}}
    <div class="sec-4 bg-black">
        <div class="container">
            <div class="sec-title">
                News on Board
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="h-100">
                        <div class="news-link">
                            <a href="#news-link">
                                Got the Bollhoff account
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="h-100">
                        <div class="news-link">
                            <a href="#news-link">
                                Calpro is on Board
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="h-100">
                        <div class="news-link">
                            <a href="#news-link">
                                Got the Bollhoff account
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="h-100">
                        <div class="news-link">
                            <a href="#news-link">
                                Calpro is on Board
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Sec-4 Area ====================== --}}

</main>

@endsection

@section('script')
<script>
    // Loader Function ==================

    $(window).scrollTop(0);

    $('body').css({'overflow' : 'hidden'});
    setTimeout(function(){
        $('#loader').fadeOut();
    }, 3500);

    setTimeout(function(){
        $('header').removeClass('header_anime');
        $('body').css({'overflow' : ''});
    }, 5500);
</script>


<!-- iso-Tope Filter -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js" integrity="sha512-S5PZ9GxJZO16tT9r3WJp/Safn31eu8uWrzglMahDT4dsmgqWonRY9grk3j+3tfuPr9WJNsfooOR7Gi7HL5W2jw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous"></script>

<script>
    var work_filter_btns = $('.our-work-sec .filter-menus button');
    var work_filter_box = $('.our-work-sec .filter-content');

    var $home_filter = $(work_filter_box).isotope({
        filter: '.branding'
    });

    $home_filter.imagesLoaded().progress( function() {
        $home_filter.isotope('layout');
    });

    $(work_filter_btns).click(function(){
        $(work_filter_btns).removeClass('active');
        $(this).addClass('active');

        var selector = $(this).attr('data-filter');

        $(work_filter_box).isotope({
            filter: selector
        });

        return false;
    });

</script>

@endsection
