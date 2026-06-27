@extends('layout.visitor', [
    'title' => 'Best Web-Design And Development Agency in Gurgaon | Thumbpin',
    'description' => 'Thumbpin is a digital advertising agency in Gurgaon that can help your business expand and stay connected effectively with your customer throughout their digital journey.',
    'footer_black' => 'footer-black',
])

@section('head')
<link rel="stylesheet" href="{{ config('app.url') }}/assets/css/new-home-page.css">
    <style>
        .sec-1 .sec-img-2 img {
            width: 48%;
        }

        .our-work-sec {
            padding-top: 0px
        }

        .sec-1 .content-box .highlight-text {
            margin-top: 40px;
        }

        .sec-1 {
            padding-bottom: 0px;
        }

        .sec-2 {
            padding: 80px 0px;
        }

        .sec-3 .sec-title p {
            font-size: 56px;
        }

        .sec-3 .sec-title b {
            font-size: 66px;
        }

        .sec-3 .sec-title b img {
            width: 78px;
            margin: -80px -16px -32px -10px;
        }
        
        .sec-new {
           font-family: sans-serif !important;
        }
        .sec-new .container{
            max-width: 1000px;
        }
        .sec-new .sec-2 {
            padding: 0px 0;
        }
        .sec-new .sec-3 {
            padding: 0px 0px 100px;
        }
        .sec-new .about-hero-sec .content-box .des {
    font-family: sans-serif;
    font-weight: 100;
    font-size: 18px;
    color: #fff;
    letter-spacing: 0.2px;
}
        .about-exp  {
            margin: 20px 0px;
        }
        .about-exp .blog-card {
            text-align: center;
        }
        .about-exp .blog-card h5{
            text-transform: uppercase;
        }
        .about-exp .blog-card span{
            font-weight: 400;
    font-size: 32px;
    line-height: 1.0;
    color: #eb1c24;
    margin-bottom: 8px;
        }
        .our-work-sec-title{
            margin: 30px 0px;
        }
        .our-work-sec-title h4, h2{
           font-weight: 600;
    font-size: 42px;
    /*margin-bottom: 20px; */
    text-align:center;
        }
        .our-work-sec-title p{
            margin-bottom: 5px; 
            text-align:center;
            color: #999999;
            font-size:25px;
        }
        .sec-new .our-work-sec{
            background-color: #ffffff;
        }
        .sec-new .our-work-sec .mkt-box{
    display: flex;
    flex-direction: column;
    justify-content: center;
        }
        .sec-new .our-work-sec .case-study-box .des {
    font-size: 18px;
    color: #999999;
}
        .sec-new .our-work-sec .case-study-box .c-pl {
    padding-left: 30px;
}
        .sec-new .our-work-sec .case-study-box .c-pr {
    padding-right: 30px;
}
        .sec-new .our-work-sec .case-study-box .title {
    text-transform: capitalize;
    font-size: 38px;
    color: #101010;
    margin-bottom: 25px;
}
        .sec-new .our-work-sec .cta-btn a {
    color: #101010;
}
        .sec-new .our-work-sec .explore-btn a {
    text-decoration: none;
    font-size: 34px;
    color: #101010;
}
.impact-sec{ 
    margin: 90px 0px;
    
}

.impact-title{
    text-align:center;
        }
.impact-title h4{
           font-weight: 400;
    font-size: 42px;
    text-align:center;
    margin-bottom:0px;
        }
.impact-title span{
           font-weight: 600;
    font-size: 42px;
    text-align:center;
        }
        .impact-sec p{
            margin-bottom: 5px; 
            text-align:center;
            color: #999999;
            font-size:25px;
        }
        .impact-sec .load-btn {
              text-align: center;
              margin-top:50px;
        }
        .impact-sec .load-btn a{
               text-decoration: none;
                font-size: 34px;
                color: #101010;
        }
        .quotes-sec{
            margin-top:50px;
        }
.quote-container {
            position: relative;
    font-family: Arial, sans-serif;
    font-size: 35px;
    font-weight: 500;
    line-height: 1.5;
    color: #000000;
    text-align: center;
    margin: 50px;
        }
.quote-container p{
    margin: 0px;
        }

        .quote-container::before {
                content: '“';
    font-size: 250px;
    color: rgba(255, 182, 193, 0.5);
    position: absolute;
    left: 14%;
    transform: translateX(-50%);
    top: -100px;
    z-index: -1;
        }
        @media screen and (max-width: 575px) {
            .sec-3 .sec-title b img {
                width: 52px;
                margin: -28px -12px 0 -8px;
            }

            .sec-3 .sec-title p {
                font-size: 38px;
                margin-bottom: 5px;
            }

            .sec-3 .sec-title b {
                font-size: 42px;
            }
            .quote-container {
        margin: 0px;
        font-size: 22px;
        }
        .quote-container::before {
    font-size: 190px;
    left: 14%;
    top: -85px;
}
*, ::after, ::before {
    box-sizing: border-box;
}

        @media screen and (min-width: 768px) and (max-width: 1023px) {
            .quote-container {
        margin: 0px;
        }
        .quote-container::before {
    left: 5%;
    top: -100px;
}
        }
    </style>
@endsection

@section('content')
<main>
     {{-- ====================== About-Hero-Sec Area ====================== --}}
     <div class="sec-new">
    <div class="about-hero-sec top-sec bg-black">
        <div class="container h-100-only">
            <div class="row h-100-only">
                <div class="col-lg-7">
                    <div class="content-box">
                       <h1 class="title" style="font-family: Arial, sans-serif; text-transform: none;">
                            Best Web Design Agency
                            
                        </h1>
                        <div class="des">
                            <p>
                                We create detail-oriented websites that resonate with your audience and increase your brand presence and visibility.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="sec-img">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/artboard.png" alt="Website Design Agency">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="about-exp">
        <div class="container">
            <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="blog-card">
                                <h5>Team Experience</h5>
                                <span>100+</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="blog-card">
                                <h5>Audience Reached</h5>
                                <span>1000+</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="blog-card">
                                <h5>Campaings</h5>
                                <span>10000+</span>
                            </div>
                        </div>

            </div>
        </div>
    </div>
    {{-- ====================== End About-Hero-Sec Area ====================== --}}
    {{-- ====================== Our-Work-Sec-title Area ====================== --}}
    <div class="our-work-sec-title">
            <div class="container">
                    <div class="row">
                        
                        <h2>web designing impact your brand?</h2>
                        <!--<h4>How Does SEO Impact -->
                        <!--    Digital Marketing Strategies & Outcomes?</h4>-->
                            <p>Although we excel at making your website looks visually appealing, web design also includes creating intuitive journeys that fulfill the curiosity of the users to effortless engagement. We dive into understanding your brand's essence, 
                            target audience and industry landscape to ensure that every design decision aligns with your brand’s objectives.</p>
                    </div>
                </div>
            </div>
    {{-- ====================== End Our-Work-Sec-title Area ====================== --}}
   {{-- ====================== Our-Work-Sec Area ====================== --}}
        <!--<div class="our-work-sec">-->
        <div class="our-work-sec">
            <div class="container">
                <div class="case-study-box">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/web-design-&-Development.png" alt="website design and development Company">
                            </div>
                        </div>
                        <div class="col-lg-6 c-pl mkt-box">
                            <h3 class="title">
                                Web Design & Development
                            </h3>
                            <div class="des">
                                <p>
                                   Web design and development are the foundational elements of creating and maintaining a website. It involves both the design and the technical functionalities that make a website functional and attractive. 
                                   It is our responsibility to ensure that the design aligns with the brand's identity and communicates effectively with the target audience.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="case-study-box">
                    <div class="row">
                        <div class="col-lg-6 order-lg-1">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/software-development.png" alt="Software Development Agency in Gurgaon">
                            </div>
                        </div>
                        <div class="col-lg-6 c-pr mkt-box">
                            <h3 class="title">
                               Software Development
                            </h3>
                            <div class="des">
                                <p>
                                    Software development creates applications and programs that run on a variety of platforms, including desktops, mobile devices and web browsers. 
                                    Software development involves custom solutions and integrating existing software to enhance the functionality of a website.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="case-study-box">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/mobile-apps-development.png" alt="App and Website developer">
                            </div>
                        </div>
                        <div class="col-lg-6 c-pl mkt-box">
                            <h3 class="title">
                                Mobile Apps Development
                            </h3>
                            <div class="des">
                                <p>
                                   Mobile app development focuses on creating applications specifically designed to run on mobile devices such as smartphones and tablets. 
                                   While web design primarily caters to websites accessed via web browsers, mobile app development involves building apps on iOS or android that are user friendly. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="case-study-box">
                    <div class="row">
                        <div class="col-lg-6 order-lg-1">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/ux-design.png" alt="UX Design agency in Gurgaon">
                            </div>
                        </div>
                        <div class="col-lg-6 c-pr mkt-box">
                            <h3 class="title">
                               UX Design
                            </h3>
                            <div class="des">
                                <p>
                                   UX design enhances user satisfaction by improving the usability and accessibility provided in the interaction between users and a product. 
                                   This can be a website, web application or mobile app. We conduct research, create user personas and develop prototypes to understand user behaviour.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="explore-btn">
                    <a href="{{ route('work') }}">
                        <span>
                            Explore More
                        </span>
                        {{-- <i class="fal fa-long-arrow-right"></i> --}}
                        <i class="far fa-long-arrow-alt-right"></i>
                    </a>
                </div>
            </div>
        </div>
        {{-- ====================== End Our-Work-Sec Area ====================== --}}
     {{-- ====================== Sec-2 Area ====================== --}}
        <div class="sec-2">
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
                    {{-- <div class="img">
                    <img src="{{ config('app.url') }}/assets/img/home/home-03.png" alt="img">
                </div> --}}
                </div>
                <div class="brand-images">
                    <div class="row">
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/1.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/2.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/3.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/4.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/5.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/6.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/7.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/8.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/9.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/10.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/11.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/12.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/13.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/14.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/15.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/16.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/17.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/18.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/19.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/20.png" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ====================== End Sec-2 Area ====================== --}}
          {{-- ====================== Impact-Sec Area ====================== --}}
    <div class="impact-sec">
            <div class="container">
                    <div class="row">
                        <div class="impact-title">
                            <h4>How Does SEO Impact </h4>
                            <span>Digital Marketing Strategies & Outcomes?</span>
                        </div>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh 
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad 
                                minim veniam, quis nostrud exerci tation</p>
                    </div>
                </div>
            </div>
    {{-- ====================== End Impact-Sec Area Area ====================== --}}
         {{-- ====================== Start-Project-Sec Area ====================== --}}
        <div class="start-project-sec">
            <div class="container">
                <div class="heading-sec">
                    <span>Start A Project</span>
                </div>
                <div class="form">
                    <form action="{{ route('project-form') }}" method="post">
                        @csrf
                        <input type="hidden" name="url" value="{{ Request::url() }}">
                        <div class="row">
                            <div class="col-md-6 pe-md-4">
                                <div class="input-field">
                                    <input type="text" name="name" placeholder="Your Name" required>
                                </div>
                            </div>
                            <div class="col-md-6 ps-md-4">
                                <div class="input-field">
                                    <input type="text" name="company_name" placeholder="Company Name" required>
                                </div>
                            </div>
                            <div class="col-md-6 pe-md-4">
                                <div class="input-field">
                                    <input type="email" name="email" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="col-md-6 ps-md-4">
                                <div class="input-field">
                                    <input type="number" name="mobile" placeholder="Contact Number" required>
                                </div>
                                @error('mobile')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="input-field">
                                    <input type="text" name="requirement" placeholder="Requirement" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="form-btn">
                                    <span>Send</span> <i class="fal fa-long-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- ====================== End Start-Project-Sec Area ====================== --}}
        {{-- ======================  Quotes-Sec Area ====================== --}}
        <div class="quotes-sec">
            <div class="container">
                <div class="row">
                    <div class="quote-container">
                    <p>Good marketing makes the company look smart.</p>
                    <p>Great marketing makes the customer feel smart</p>
    </div>
                </div>
            </div>
            
        </div>
        {{-- ====================== End Quotes-Sec Area ====================== --}}
        
 {{-- ====================== Impact-Sec Area ====================== --}}
    <div class="impact-sec">
            <div class="container">
                    <div class="row">
                        <div class="impact-title">
                            <h4>Pinning Designs That Stand Out </h4>
                            <span>Top-notch Website Design Agency in Gurgaon</span>
                        </div>
                            <p>Our web design services are powered by the current technology and best practices in user experience design. We deliver websites that give quick load times, optimise for all devices and ensure accessibility for your users. 
                            We combine your vision with our expertise to create digital masterpieces that inspire, engage and drive results.</p>
                    <div class="load-btn">
                    <a href="#">
                        <span>
                            Load More
                        </span>
                        {{-- <i class="fal fa-long-arrow-right"></i> --}}
                        <i class="far fa-long-arrow-alt-right"></i>
                    </a>
                </div>
                    </div>
                </div>
            </div>
    {{-- ====================== End Impact-Sec Area Area ====================== --}}
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
                                    We are creatively strategic and strategically creative. We follow a research-based
                                    strategy to create memorable brand identities.
                                </p>
                                <p>
                                    Advertising is the aftertaste of a good story. So, Thumbpin weaves a unique tale for
                                    your brand punched together with design and production.
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

    </div>
</main>
@endsection

@section('script')

@endsection