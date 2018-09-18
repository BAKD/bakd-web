<footer>
    <div class="footy-sec mn no-margin">
        <div class="container">
            <ul>
                <li>
                    <a href="{{ route('frontend.home') }}">
                        <i class="fa fa-home"></i> {{ __('Home') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('frontend.about') }}">
                        <i class="fa fa-users"></i> {{ __('About Us') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('frontend.terms') }}">
                        <i class="fa fa-file-text"></i> {{ __('Terms & Conditions') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('frontend.privacy') }}">
                        <i class="fa fa-cubes"></i> {{ __('Privacy Policy') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('frontend.contact') }}">
                        <i class="fa fa-envelope"></i> {{ __('Contact Us') }}
                    </a>
                </li>
            </ul>
            <p><img src="{{ asset('images/copy-icon2.png') }}" alt="Copyright &copy; {{ config('bakd.copyright', 'BAKD') }} {{ \Carbon\Carbon::now()->format('Y') }}" title="Copyright &copy; {{ config('bakd.copyright', 'BAKD') }} {{ \Carbon\Carbon::now()->format('Y') }}">Copyright {{ config('bakd.copyright', 'BAKD') }} {{ \Carbon\Carbon::now()->format('Y') }}</p>
            <img class="fl-rgt bakd-logo" src="{{ config('bakd.logo.regular') }}" alt="{{ config('bakd.logo.alt') }}" title="{{ config('bakd.logo.alt') }}">
        </div>
    </div>
</footer>
