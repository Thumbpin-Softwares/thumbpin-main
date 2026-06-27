{{-- ====================== Header Area ====================== --}}
<header class="header_anime">
    <div class="main-header {{ $header_black ?? '' }}">
        <div class="container-fluid">
            <div class="header">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ config('app.url') }}/assets/img/logo/logo.png" alt="logo">
                    </a>
                </div>
                <div class="nav">
                    <ul>
                        <li>
                            <a href="{{ route('home') }}" class="{{ (request()->is('/')) ? 'active' : '' }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="{{ (request()->is('about')) ? 'active' : '' }}">About</a>
                        </li>
                        <li>
                            <a href="{{ route('services') }}" class="{{ (request()->is('services')) ? 'active' : '' }}">Services</a>
                        </li>
                        <li>
                            <a href="{{ route('work') }}" class="{{ (request()->is('work')) ? 'active' : '' }}">Work</a>
                        </li>
                        <li>
                            <a href="{{ route('blog') }}" class="{{ (request()->is('blog')) ? 'active' : '' }}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="{{ (request()->is('contact')) ? 'active' : '' }}">Contact</a>
                        </li>
                    </ul>
                </div>
                <button type="button" class="side_menu_btn">
                    <img src="{{ config('app.url') }}/assets/img/menu.png" alt="menu">
                </button>
            </div>
        </div>
    </div>
</header>
{{-- ====================== End Header Area ====================== --}}

{{-- ====================== Side-Menu Area ====================== --}}
<div class="side-menu-area">
    <div class="side-menu-box">
        <div class="side-menu">
            <div class="header">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ config('app.url') }}/assets/img/logo/logo.png" alt="logo">
                    </a>
                </div>
                <div class="close-btn">
                    <button type="button"><i class="far fa-times"></i></button>
                </div>
            </div>
            <div class="nav">
                <ul>
                    <li>
                        <a href="{{ route('home') }}" class="active">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">About</a>
                    </li>
                    <li>
                        <a href="{{ route('services') }}">Services</a>
                    </li>
                    <li>
                        <a href="{{ route('work') }}">Work</a>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}">Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</div>
{{-- ====================== End Side-Menu Area ====================== --}}
