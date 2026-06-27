{{-- ====================== Footer Area ====================== --}}
<footer class="{{ $footer_black ?? '' }}">
    <div class="container">
        <div class="footer">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ config('app.url') }}/assets/img/logo/logo.png" alt="logo" class="logo-white">
                    <img src="{{ config('app.url') }}/assets/img/logo/logo-black.png" alt="logo" class="logo-black">
                </a>
            </div>
            <div class="social-links">
                <ul>
                    <li>
                        <a href="https://www.facebook.com/ThumbpinAgency" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/ThumbpinAgency" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/ThumbpinAgency" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://in.linkedin.com/company/thumbpinagency" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.behance.net/thumbpinagency" target="_blank">
                            <i class="fab fa-behance"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="msg">
                <a href="{{ route('terms') }}">
                    © <?php echo date('Y'); ?> Thumbpin
                </a>
                {{-- Desig By Thumbpin --}}
            </div>
        </div>
    </div>
</footer>
{{-- ====================== EndFooter Area ====================== --}}
